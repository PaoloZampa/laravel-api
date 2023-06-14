@extends("layouts.app")

@section("content")
<div class="container p-5">
    @include('partials.validation')
    <h2 class="text-center text-dark text-uppercase">you are currently editing the item #{{$technology->id}}</h2>
    <h2 class="text-center text-dark text-uppercase">{{$technology->name}}</h2>
    <form action="{{route('admin.technologies.update', $technology->id)}}" method="post" class="text-light bg-dark rounded p-5">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="name" class="form-label text-uppercase">name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required placeholder="only name there" aria-describedby="nameHelper" value="{{old('name', $technology->name)}}">
            <small id="nameHelper" class="text-muted text-uppercase">insert the name</small>
            @error('name')
            <div class="alert alert-danger p-3 m-3" role="alert">
                <strong>error: </strong>{{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="color" class="form-label text-uppercase">color</label>
            <input type="text" name="color" id="color" class="form-control @error('color') is-invalid @enderror" required placeholder="only color there (text-bg-****)" aria-describedby="nameHelper" value="{{old('color', $technology->color)}}">
            <small id="nameHelper" class="text-muted text-uppercase">insert the color</small>
            @error('color')
            <div class="alert alert-danger p-3 m-3" role="alert">
                <strong>error: </strong>{{$message}}
            </div>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-warning text-uppercase mx-3">Save</button>
            <button type="reset" class="btn btn-danger text-uppercase mx-3">Reset</button>
            <a class="btn btn-secondary text-uppercase mx-3" href="{{route('admin.types.index')}}">back</a>
        </div>
    </form>
</div>
@endsection