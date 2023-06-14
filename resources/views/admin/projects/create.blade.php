@extends('layouts.admin')

@section("content")
<div class="container">
  @include('partials.validation')
  <form class="text-light p-5 bg-dark m-3 rounded" action="{{route('admin.projects.store')}}" method="post">
    @csrf
    <div class="mb-3 row">
      <label for="name" class="col-3 col-form-label text-uppercase">name:</label>
      <div class="col-6">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required placeholder="only name there" value="{{old('name')}}">
      </div>
      @error('name')
      <div class="alert alert-danger p-3 m-3 text-center" role="alert">
        <strong>error : </strong>{{$message}}
      </div>
      @enderror
    </div>
      <div class="text-center d-flex justify-content-center align-items-center gap-3">
        <button type="submit" class="btn btn-primary text-uppercase">ADD</button>
        <button type="reset" class="btn btn-danger text-uppercase">RESET</button>
        <a class="btn btn-secondary text-uppercase" href="{{route('admin.projects.index')}}">back</a>
      </div>
    </div>
  </form>
</div>
@endsection