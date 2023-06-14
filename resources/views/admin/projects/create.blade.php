@extends('layouts.admin')

@section("content")
<div class="container">
  @include('partials.validation')
  <form class="text-light p-5 bg-dark m-3 rounded" action="{{route('admin.projects.store')}}" method="post" enctype="multipart/form-data">
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
    <div class="mb-3 d-flex row">
      <label for="type_id" class="col-3 col-form-label text-uppercase">type:</label>
      <select class="w-50 fs-6 text-muted col-3 p-1 form-select form-select-lg bg-white" name="type_id" id="type_id">
        <option>Choose the project type</option>
        @foreach($types as $type)
        <option value="{{$type->id}}">{{$type->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3 row">
      <label for="image" class="col-3 col-form-label text-uppercase">image:</label>
      <div class="col-6">
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" required placeholder="only image there">
      </div>
    </div>
      @foreach($technologies as $technology)
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="{{$technology->id}}" id="technologies" name="technologies[]">
        <label class="form-check-label text-white" for="technologies">
          {{$technology->name}}
        </label>
      </div>
      @endforeach
      <div class="text-center d-flex justify-content-center align-items-center gap-3">
        <button type="submit" class="btn btn-warning text-uppercase">ADD</button>
        <button type="reset" class="btn btn-danger text-uppercase">RESET</button>
        <a class="btn btn-secondary text-uppercase" href="{{route('admin.projects.index')}}">back</a>
      </div>
    </div>
  </form>
</div>
@endsection
