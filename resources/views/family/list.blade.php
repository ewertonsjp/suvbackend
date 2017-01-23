@extends('layouts.app')

@section('content')

  <table class="table table-striped table-bordered table-hover">
    <th>Código</th>
    <th>Nome</th>
    <th>Descrição</th>
    @foreach ($families as $f)
      <tr>
        <td>{{$f->code}}</td>
        <td>{{$f->name}}</td>
        <td>{{$f->description}}</td>
      </tr>
    @endforeach
  </table>

@stop
