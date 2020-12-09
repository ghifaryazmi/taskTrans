@extends('layouts.app')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="container">
    
    {{
          Form::model($companies, [
            "method" => "PUT",
            "route" => ["companies.update", $companies->id],
            "files" => true
          ])
        }}
    <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" id="name" value="{{ old('name', $companies->name) }}">

            @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" value="{{ old('email', $companies->email) }}">

            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" class="form-control @error('file') is-invalid @enderror" name="file" id="file">

            @error('file')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="web">Website</label>
            <input type="text" name="web" class="form-control @error('web') is-invalid @enderror" placeholder="Website" id="web" value="{{ old('name', $companies->web) }}">

            @error('web')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    {{ Form::close() }}
</div>
@endsection