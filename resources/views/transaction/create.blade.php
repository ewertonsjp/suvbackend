@extends('layouts.app')

@section('content')
  <h1>Nova Transação</h1>

  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="/transaction" method="POST">

    <input type="hidden" name="_token"     value="{{{ csrf_token() }}}" />
    <input type="hidden" name="invoice_id" value="{{ $invoice_id }}"   />

    <div class="form-group">
      <label>Descrição</label>
      <input class="form-control" name="description" value="{{ old('description') }}">
    </div>
    <div class="form-group">
      <label>Valor</label>
      <input class="form-control" name="amount" value="{{ old('amount') }}">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit</button>

  </form>

@stop
