@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-lg-6">
      <h1>Fatura: {{$invoice->description}} - R$ {{$invoice->amount}} ({{$invoice->closed}})</h1>
    </div>
    <div class="col-lg-6">
      <h1>
        <a href="/transaction/create">
          <span class="glyphicon glyphicon-search"></span>
        </a>
      </h1>
    </div>
  </div>

  @if(empty($invoice->transactions()))
     <div class="alert alert-danger">
       Você não tem nenhuma transação cadastrada.
     </div>
  @else
    <div class="row">
      <div class="col-lg-6">
        <table class="table table-striped table-bordered table-hover">
          <th>Descrição</th>
          <th>Valor</th>
          @foreach ($invoice->transactions as $t)
            <tr>
              <td>{{$t->description}}</td>
              <td>R$ {{$t->amount}}</td>
            </tr>
          @endforeach
        </table>
      </div>
      <div class="col-lg-6">
        <table class="table table-striped table-bordered table-hover">
          <th>Descrição</th>
          <th>Valor</th>
          @foreach ($invoice->payments as $p)
            <tr>
              <td>{{$p->user->name}}</td>
              <td>R$ {{$p->amount}}</td>
            </tr>
          @endforeach
        </table>
     </div>
    </div>
  @endif
@stop
