<?php

namespace suvinando\Http\Controllers;

use Request;
use suvinando\Invoice;
use suvinando\Transaction;
use suvinando\Services\PaymentDividerService;
use suvinando\Services\PaymentService;

class TransactionController extends Controller {

    public function __construct(PaymentService $paymentService, PaymentDividerService $paymentDividerService) {
        $this->middleware('auth');
        $this->paymentDividerService = $paymentDividerService;
        $this->paymentService = $paymentService;
    }

    public function create() {
      $activeInvoice = Invoice::where('closed',0)->first();
      return view('transaction.create')->with('invoice_id',$activeInvoice->id);
    }

    //TODO - Isso deveria ser feito dentro de uma transação!
    public function store() {
      Transaction::create(Request::all());

      $invoice = Invoice::where('closed',0)->first();
      $this->paymentService->createPaymentForNewUsersOfFamily($invoice);

      $this->paymentDividerService->divide($invoice);
      $invoice->push();

      return redirect('/invoice')->with('message', "Transação cadastrada com sucesso!");
    }

}
