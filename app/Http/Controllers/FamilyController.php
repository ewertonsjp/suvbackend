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

    public function listAsJson() {
      //$families = DB::table('families')->join('users', 'users._id', '=', Request::input('userId','0'));
      $response = response()->json(Family::all());
      $response->header('Content-Type', 'application/json');
      $response->header('charset', 'utf-8');
      return $response;
    }

}
