<?php

namespace suvinando\Http\Controllers;

use Request;
use suvinando\Invoice;
use suvinando\Transaction;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
      $activeInvoice = Invoice::where('closed',0)->first();
      return view('transaction.create')->with('invoice_id',$activeInvoice->id);
    }

    /**
    * Cria uma nova Transação para a Fatura Atual!
    */
    public function store() {
      Transaction::create(Request::all());
      Invoice::where('closed',0)->first()->recalculate();
      return redirect('/invoice')->with('message', "Transação cadastrada com sucesso!");
    }

}
