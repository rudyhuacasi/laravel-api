@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div>
        <h1>Lista di project</h1>
    </div>
    
    <div class="row row-gap-4 my-5">
        @foreach ($projects as $project)
        <div class="col-4 ">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title">{{$project->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{$project->slug}}</h6>
                    <p class="card-text">{{$project->content}}</p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

<div class="container text-center">
</div>
@endsection