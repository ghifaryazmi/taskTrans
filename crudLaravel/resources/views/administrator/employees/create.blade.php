@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('employees.store') }}" method="POST">
    @csrf
    <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" id="name">

            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="company">Perusahaan</label>
            <select class="form-control @error('company') is-invalid @enderror" id="company" name="company" placeholder="Pilih Perusahaan">
                <option value="">Pilih Perusahaan</option>
                @foreach($companies as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>

            @error('company')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email">

            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection