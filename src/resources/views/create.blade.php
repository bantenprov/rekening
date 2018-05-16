
@extends('master')
@section('content')

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <h1>Add New Rekening</h1>
        <hr>
        <div class="card">
          <div class="card-header">
            <strong>Rekening</strong>
          </div>
          <div class="card-body">
            <form action="{{route('rekening.store')}}" method="post">
              {{ csrf_field() }}

              <div class="form-group">
								<label for="kode">Kode</label>
								<input type="text" class="form-control" id="kode" name="kode">
							</div>

              <div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama">
							</div>

              <div class="form-group">
                <label for="level">Level</label>
                <select id="level" name="level" class="form-control form-control">
                  <option value="">Please Select</option>
                  <option value="1">1</option>
                </select>
              </div>

              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
