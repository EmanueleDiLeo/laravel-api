@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center w-100">Progetti per categorie</h1>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Tipo</th>
            <th scope="col">Progetti in relazione</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name}}</td>
                    <td>
                        <ul class="list-group">
                            @foreach ($type->projects as $project)
                                <li class="list-group-item">
                                    <a href="{{ route('admin.projects.show',$project)}}">{{ $project->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>

    </div>
@endsection

@section('title')
    |  Progetti per catecorie
@endsection

