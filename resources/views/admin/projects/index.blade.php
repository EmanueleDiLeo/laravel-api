@extends('layouts.admin')

@section('content')
<div class="container">

    <h1 class="text-center my-4">Lista Progetti</h1>

    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    <h4 class="py-3">Nuovo Progetto <a class="btn btn-primary" href="{{route('admin.projects.create')}}"><i class="fa-solid fa-plus"></i></a></h4>
    <table class="table table-striped ">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Progetto</th>
            <th scope="col">Ultimo aggiornamento</th>
            <th scope="col">Tipo</th>
            <th scope="col">Tecnologia</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->date_updated }} </td>
                    <td>{{ $project->type?->name ?? '-' }} </td>
                    <td>
                        @forelse ($project->technologies as $technology)
                            <a href="{{route('admin.technology-projects',$technology )}}" class="badge text-bg-info">{{ $technology->name}}</a>
                        @empty
                            -
                        @endforelse
                    </td>
                    <td>
                        <a href="{{route('admin.projects.show', $project)}}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning my-2"><i class="fa-solid fa-pencil"></i></a>
                        @include('admin.partials.form-delete',[
                            'route' => route('admin.projects.destroy', $project),
                            'message' => 'Sei sicuro di voler eliminare questo progetto?',
                        ])
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    {{$projects->links()}}
</div>

@endsection

@section('title')
    | Lista Progetti
@endsection

