@extends('layouts.admin')

@section('content')
    <div class="container pb-5">
        @if (Session::has('edited'))
            <div class="alert alert-warning alert-dismissible fade show text-center fw-bold my-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span>{{ Session::get('edited') }}</span>
            </div>
        @endif
        <h4 class="text-dark mx-auto my-2 text-center text-uppercase">You are watching the item #{{ $type->id }}</h4>
        <div class="d-flex justify-content-center align-items-center my-3 gap-3">
            <a class="btn btn-warning text-uppercase fw-bold" href="{{ route('admin.types.edit', $type->id) }}">edit</a>
            <a class="btn btn-secondary text-uppercase fw-bold" href="{{ route('admin.types.index') }}">back</a>
            <button type="button" class="btn btn-danger text-uppercase fw-bold" data-bs-toggle="modal"
                data-bs-target="#modal-{{ $type->id }}">delete</button>
            <div class="modal fade" id="modal-{{ $type->id }}" tabindex="-1" data-bs-backdrop="static"
                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $type->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header d-flex flex-column">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                            <h5 class="text-muted fs-6 text-uppercase">You are going to delete</h5>
                            <h5 class="modal-title mb-2 text-uppercase fw-bold" id="modalTitle-{{ $type->id }}">
                                {{ $type->name }}</h5>
                            <h5 class="modal-title mb-2 fs-6 text-muted" id="modalTitle-{{ $type->id }}">No.
                                {{ $type->id }}</h5>
                            <img width="120" src="{{ $type->thumb }}" alt="">
                        </div>
                        <div class="modal-body">
                            <p class="mb-0 text-danger text-uppercase text-center">Once confirmed, there</p>
                            <p class="mb-0 text-danger text-uppercase text-center">will be no going back</p>
                        </div>
                        <div class="modal-footer d-flex justify-content-center align-items-center gap-2">
                            <form action="{{ route('admin.types.destroy', $type->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                aria-label="close">Return</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card w-50 mx-auto bg-warning">
            <div class="card-body rounded">
                <h4 class="fw-bold">{{ $type->name }}</h4>
                <span class="text-uppercase badge {{ $type->color }}">{{ $type->name }}</span>
                <p class="fw-light">{{ $type->color }}</p>
            </div>
        </div>
    </div>
@endsection
