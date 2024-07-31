@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between">
        <div>
            <h1>lista project</h1>
        </div>
        <div>
            <a href="{{route('admin.projects.create')}}" as="button" class="btn btn-primary">Creare</a>
        </div>
    </div>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th class="col-1" scope="col">#</th>
                <th class="col-8" scope="col">Title</th>
                <th class="col-3" scope="col">Buttoni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->title}}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{route('admin.projects.show', $project)}}" as="button" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></a>
                        <a href="{{route('admin.projects.edit', $project)}}" as="button" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                        <form action="{{route('admin.projects.destroy', $project)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-bomb"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection