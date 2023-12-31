@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="bg-dark text-light text-center rounded-3 py-3 mb-4">
            <h2 class="text-uppercase">Latest Project</h2>
        </div>
        <div class="bg-light text-center rounded-3 py-2 bg-dark">
            <img class="img-fluid" src="{{ asset('storage/' . $project['0']->image) }}" alt="{{ $project['0']->name }}">
            <p class="fw-normal fs-4 mb-0 text-white">{{ $project['0']->name }}</p>
            <div class="d-flex justify-content-center mt-3">
                <span class="badge bg-warning text-dark mx-1">{{ $type['0']->name }}</span>
                <span class="badge bg-danger text-dark mx-1">{{ $technology['0']->name }}</span>
            </div>
            <a class="text-decoration-none mt-3 text-white" href="{{ $project['0']->repo }}">{{ $project['0']->repo }}</a>
        </div>
    </div>
@endsection
