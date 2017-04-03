<?php

namespace suvinando\Http\Controllers;

use Request;
use suvinando\Invoice;
use suvinando\Family;
use suvinando\Payment;

class InvoiceController extends Controller {

    public function __construct() {
        // $this->middleware('auth');
    }

    /**
    * Busca a Fatura que está ativa e redireciona para o show.
    */
    public function index() {
        $activeInvoice = Invoice::where('closed',0)->first();
        return redirect('/invoice/' . $activeInvoice->id);
    }

    /**
     * Exibe os dados da Fatura correspondente ao $id informado.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $invoice = Invoice::find($id);
        if (empty($invoice)) {
          return "Não foi encontrado nenhuma Fatura com esse ID!";
        }
        return view('invoice.show') -> with('invoice',$invoice);
    }

    public function listAsJson() {
      $familyId = Request::input('familyId',0);
      $invoice = Invoice::with('payments','transactions')
        ->where('family_id',$familyId)
        ->where('closed',0)
        ->first();

      if (!$invoice) {
        $invoice = new Invoice();
        $invoice['description'] = 'Invoice' . Invoice::max('id');
        $invoice['family_id'] = $familyId;
        $invoice['amount'] = 0;
        $invoice->save();

        $family = Family::find($familyId);
        foreach ($family->users as $user) {
          $payment = new Payment();
          $payment->amount = 0;

          $payment->user_id = $user->id;
          $payment->invoice_id = $invoice->id;

          $invoice->payments->push($payment);
        }

        $invoice->push();
      }

      $response = response()->json($invoice);
      $response->header('Content-Type', 'application/json');
      $response->header('charset', 'utf-8');
      return $response;
    }

    public function close() {
      $invoice = Invoice::find(Request::input('invoiceId',0));
      $invoice['closed'] = true;
      $invoice->save();

      $response = response()->json($invoice);
      $response->header('Content-Type', 'application/json');
      $response->header('charset', 'utf-8');
      return $response;
    }

}
