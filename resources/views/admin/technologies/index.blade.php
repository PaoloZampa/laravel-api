@extends('layouts.admin')

@section("content")
<div class="container">
    @if(Session::has('added'))
    <div class="alert alert-success alert-dismissible fade show text-center fw-bold my-3" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <span>{{Session::get('added')}}</span>
    </div>
    @elseif(Session::has('deleted'))
    <div class="alert alert-danger alert-dismissible fade show text-center fw-bold my-3" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <span>{{Session::get('deleted')}}</span>
    </div>
    @endif
    <a name="add" id="add" class="text-uppercase btn btn-warning mb-3" href="{{ route('admin.technologies.create') }}" role="button">Add New Tech</a>
    <p class="text-uppercase fw-bold text-black">Results Shown in Descending Order</p>

    <div class="table-responsive pb-3 rounded-3">
        <table class="table table-dark m-0">
            <thead>
                <tr class="text-uppercase">
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Color</th>
                    <th class="text-center" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($technologies as $technology)
                <tr>
                    <td class="text-center align-middle" width="4%" scope="row">
                        <span class="text-uppercase">{{$technology->id}}</span>
                    </td>
                    <td class="text-center align-middle" width="25%" scope="row">
                        <span class="text-uppercase badge bg-white text-black">{{$technology->name}}</span>
                    </td>
                    <td class="text-center align-middle" width="25%" scope="row">
                        <span class="text-uppercase badge bg-yellow text-black">{{$technology->color}}</span>
                    </td>
                    <td class="text-center align-middle">
                        <a class="btn border-primary" href="{{route('admin.technologies.show', $technology)}}">
                            <i class="fa-solid fa-eye text-primary"></i>
                        </a>
                        <a class="btn border-success my-3" href="{{route('admin.technologies.edit', $technology)}}">
                            <i class="fa-regular fa-pen-to-square text-success"></i>
                        </a>
                        <button type="button" class="btn border-danger" data-bs-toggle="modal" data-bs-target="#modal-{{$technology->id}}">
                            <i class="fa-regular fa-trash-can text-danger"></i>
                        </button>
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
                                        <p class="mb-0 text-danger text-uppercase">Once confirmed, there</p>
                                        <p class="mb-0 text-danger text-uppercase">will be no going back</p>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center align-items-center gap-2">
                                        <form action="{{route('admin.technologies.destroy', $technology)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Confirm</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="close">Return</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection