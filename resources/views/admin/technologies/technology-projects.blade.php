@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1 class="text-center w-100">Elenco progetti per la tecnologia {{$technology->name}}</h1>

        @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{ session('deleted') }}
        </div>
    @endif

    <table class="table table-striped ">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Progetto</th>
            <th scope="col">Tipo</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($technology->projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->type?->name ?? '-' }} </td>
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
    </div>

@endsection

@section('title')
    | Homepage
@endsection

