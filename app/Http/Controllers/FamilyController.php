<?php

namespace suvinando\Http\Controllers;

use suvinando\Family;
use Request;

class FamilyController extends Controller {

    public function index() {
      return view('family.list') -> with('families',Family::all());
    }

    public function create() {
      return view('family.create');
    }

    public function store() {
      Family::create(Request::all());
      return redirect('/family')->with('message', "Transação cadastrada com sucesso!");
    }

}
