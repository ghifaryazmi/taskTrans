@extends('layouts.app')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="container">
  <h2>Daftar Perusahaan</h2>
  <div class="col text-right">
  <a href="{{ route('companies.create') }}" class="btn btn-sm btn-success cl-sm-12 m-2">
      + Add
  </a>

  </div>
  <table class="table">
    <thead>
      <tr>
        <th>No.</th>
        <th>Logo</th>  
        <th>Nama</th>
        <th>Email</th>
        <th>Website</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach($companies as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
            <img class="mr-2" src="{{ asset('storage/'.$item->logo) }}" style="height: 50px;" />
            </td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->web }}</td>
            <td>
                <div class="row">
                    <div class="col m-1">
                        <a href="{{ route('companies.edit', $item->id) }}" class="btn btn-sm btn-info col-sm-12">
                            Edit
                        </a>
                    </div>
                    <div class="col m-1">
                        <form action="{{ route('companies.destroy', $item->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger col-sm-12">Delete</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $companies->links() }}
</div>
@endsection