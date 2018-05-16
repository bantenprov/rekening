@extends('master')
@section('content')
<div class="jumbotron text-center">
  <h1>Kode : {{ $rekening->kode }}</h1>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title"><h2>{{ $rekening->nama }}</h2></h5>
    <h6 class="card-subtitle mb-2 text-muted">Created : {{ $rekening->created_at }}</h6>
    <hr />

    <a href="{{ route('rekening.create') }}">
      <button type="button" class="btn btn-success">Add New</button>
    </a>
    <a href="{{ route('rekening.edit',$rekening->id) }}">
      <button type="button" class="btn btn-warning">Edit</button>
    </a>
  </div>
  <div class="card-footer">
    <span class="pull-left">Created by : {{ $rekening->getUserCreated->name }}</span>
    <span class="pull-right">Updated by : {{ $rekening->getUserUpdated->name }}</span>
  </div>
</div>

@endsection
