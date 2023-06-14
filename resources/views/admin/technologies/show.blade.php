@extends("layouts.admin")

@section("content")
<div class="container pb-5">
    @if(Session::has('edited'))
    <div class="alert alert-warning alert-dismissible fade show text-center fw-bold my-3" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <span>{{Session::get('edited')}}</span>
    </div>
    @endif
    <h4 class="text-dark mx-auto my-2 text-center text-uppercase">You are watching the item #{{$technology->id}}</h4>
    <div class="d-flex justify-content-center align-items-center my-3 gap-3">
        <a class="btn btn-warning text-uppercase fw-bold" href="{{route('admin.technologies.edit', $technology->id)}}">edit</a>
        <a class="btn btn-secondary text-uppercase fw-bold" href="{{route('admin.technologies.index')}}">back</a>
        <button type="button" class="btn btn-danger text-uppercase fw-bold" data-bs-toggle="modal" data-bs-target="#modal-{{$technology->id}}">delete</button>
        <div class="modal fade" id="modal-{{$technology->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$technology->id}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex flex-column">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                        <h5 class="text-muted fs-6 text-uppercase">You are going to delete</h5>
                        <h5 class="modal-title mb-2 text-uppercase fw-bold" id="modalTitle-{{$technology->id}}">{{$technology->name}}</h5>
                        <h5 class="modal-title mb-2 fs-6 text-muted" id="modalTitle-{{$technology->id}}">No. {{$technology->id}}</h5>
                        <img width="120" src="{{$technology->thumb}}" alt="">
                    </div>
                    <div class="modal-body">
                        <p class="mb-0 text-danger text-uppercase text-center">Once confirmed, there</p>
                        <p class="mb-0 text-danger text-uppercase text-center">will be no going back</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center gap-2">
                        <form action="{{route('admin.technologies.destroy', $technology->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Confirm</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="close">Return</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card w-50 mx-auto">
        <div class="card-header rounded">
            <h4 class="fw-bold">{{$technology->name}}</h4>
            <span class="text-uppercase badge {{$technology->color}}">{{$technology->name}}</span>
        </div>
        <div class="card-body">
        <p class="fw-light">{{$technology->color}}</p>
        </div>
    </div>
</div>
@endsection