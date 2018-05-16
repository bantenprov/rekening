@extends('master')
@section('content')
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Customer
            <a href="{{ route('rekening.create') }}" class="float-right">
              <button type="button" class="btn btn-warning">Add new</button>
            </a>&nbsp;
          </div>
          <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Level</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($rekenings as $key=>$rekening)
                <tr>
                  <th scope="row" uuid="{{$rekening->id}}">{{ ++$key }}</th>
                  <td>
                    <a href="{{route('rekening.show',$rekening->id)}}">{{$rekening->kode}}</a>
                  </td>
                  <td>{{$rekening->nama}}</td>
                  <td>{{$rekening->level}}</td>
                  <td>{{$rekening->created_at->toFormattedDateString()}}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{ route('rekening.edit',$rekening->id) }}">
                        <button type="button" class="btn btn-warning">Edit</button>
                      </a>&nbsp;
                      <form action="{{route('rekening.destroy',$rekening->id)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="Delete" />
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <nav>
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <!--/.col-->
    </div>
    <!--/.row-->
  </div>
</div>

@endsection
