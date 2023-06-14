@extends('layouts.admin')

@section("content")
<div class="container">
    @include('partials.validation')
    <form class="text-light p-5 bg-dark m-3 rounded" action="{{route('admin.types.store')}}" method="post">
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-3 col-form-label text-uppercase">name:</label>
            <div class="col-6">
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required placeholder="only name there" value="{{old('name')}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="color" class="col-3 col-form-label text-uppercase">color:</label>
            <div class="col-6">
                <input type="text" class="form-control @error('color') is-invalid @enderror" name="color" id="color" required placeholder="only color there (text-bg-****)" value="{{old('color')}}">
            </div>
        </div>
        <div class="text-center d-flex justify-content-center align-items-center gap-3">
            <button type="submit" class="btn btn-primary text-uppercase">ADD</button>
            <button type="reset" class="btn btn-danger text-uppercase">RESET</button>
            <a class="btn btn-secondary text-uppercase" href="{{route('admin.types.index')}}">back</a>
        </div>
</div>
</form>
</div>
@endsection