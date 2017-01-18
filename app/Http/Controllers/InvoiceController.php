<?php

namespace suvinando\Http\Controllers;

use Illuminate\Http\Request;
use suvinando\Invoice;

class InvoiceController extends Controller {

    public function __construct() {
        $this->middleware('auth');
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

}
