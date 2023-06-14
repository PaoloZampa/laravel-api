@extends('layouts.admin')

@section('content')
<div class="w-50 text-center mx-auto">
    <div class="bg-dark text-light mx-auto rounded-3 py-2 d-flex align-items-center justify-content-center">
        <h2 class="text-uppercase my-1">latest project</h2>
    </div>
    <div class="bg-dark text-light mx-auto rounded-3 py-2 my-3 d-flex align-items-center justify-content-center">
        <p class="fw-normal mb-0">"{{$project['0']->name}}"</p>
    </div>
</div>
@endsection