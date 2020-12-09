@extends('layouts.app')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="container">
  <h2>Daftar Pegawai</h2>
  <div class="col text-right">
  <a href="{{ route('companies.create') }}" class="btn btn-sm btn-success cl-sm-12 m-2">
      + Add
  </a>

  </div>
  <table class="table">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Perusahaan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach($employees as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->company->name }}</td>
            <td>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('employees.edit', $item->id) }}" class="btn btn-sm btn-info col-sm-12">
                            Edit
                        </a>
                    </div>
                    <div class="col">
                        <form action="{{ route('employees.destroy', $item->id) }}" method="POST">
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
  {{ $employees->links() }}
</div>
@endsection