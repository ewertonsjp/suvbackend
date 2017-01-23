@extends('layouts.app')

@section('content')
  <h1>Nova Familia</h1>

  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="/family" method="POST">

    <input type="hidden" name="_token"     value="{{{ csrf_token() }}}" />

    <div class="form-group">
      <label>Nome</label>
      <input class="form-control" name="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
      <label>Descrição</label>
      <input class="form-control" name="description" value="{{ old('description') }}">
    </div>

    <button type="submit" class="btn btn-primary btn-block">Submit</button>

  </form>

@stop
