<?php

namespace suvinando\Http\Controllers;

use suvinando\Family;
use Request;
use Illuminate\Support\Facades\Auth;

class FamilyController extends Controller {

    public function index() {
      return view('family.list') -> with('families',Family::all());
    }

    public function create() {
      return view('family.create');
    }

    public function store() {
      $params = Request::all();
      $params['code'] = rand();

      $family = Family::create($params);
      $family->users->push(Auth::user());
      $family->save();

      return redirect('/family')->with('message', "Transação cadastrada com sucesso!");
    }

}
