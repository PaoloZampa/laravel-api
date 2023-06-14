@extends('layouts.admin')

@section("content")

<div class="container">
    @include('partials.validation')
    <form class="text-light p-5 bg-dark m-3 rounded" action="{{route('admin.technologies.store')}}" method="post">
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-3 col-form-label text-uppercase text-white">Name:</label>
            <div class="col-6">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required placeholder="Only name there" value="{{old('name')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="color" class="col-3 col-form-label text-uppercase text-white">Color:</label>
            <div class="col-6">
                <input type="text" class="form-control @error('color') is-invalid @enderror" name="color" id="color" required placeholder="Only color there (text-bg-****)" value="{{old('color')}}">
            </div>
        </div>
        <div class="text-center d-flex justify-content-center align-items-center gap-3">
            <button type="submit" class="btn btn-warning text-uppercase">ADD</button>
            <button type="reset" class="btn btn-danger text-uppercase">RESET</button>
            <a class="btn btn-secondary text-uppercase" href="{{route('admin.technologies.index')}}">Back</a>
        </div>
    </form>
</div>
@endsection
