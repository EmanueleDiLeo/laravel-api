@extends('layouts.admin')

@section('content')
<div class="container">

    <h1 class="text-center my-4">Lista tecnologie</h1>

    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{ session('deleted') }}
        </div>
    @endif
    <h4 class="py-3">Nuova Tecnologia <a class="btn btn-primary" href="{{route('admin.technologies.create')}}"><i class="fa-solid fa-plus"></i></a></h4>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Tecnologie</th>
            <th scope="col">Ultimo aggiornamento</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($technologies as $technology)
                <tr>
                    <td>{{ $technology->id }}</td>
                    <td>{{ $technology->name }}</td>
                    <td>{{ $technology->date_updated }} </td>
                    <td>
                        <a href="{{route('admin.technologies.show', $technology)}}" class="btn btn-success "><i class="fa-solid fa-eye"></i></a>
                        <a href="{{route('admin.technologies.edit', $technology)}}" class="btn btn-warning my-2"><i class="fa-solid fa-pencil"></i></a>
                        @include('admin.partials.form-delete',[
                            'route' => route('admin.technologies.destroy', $technology),
                            'message' => 'Sei sicuro di voler eliminare questa tecnologia?',
                        ])
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    {{$technologies->links()}}
</div>

@endsection

@section('title')
    | Lista tecnologie
@endsection

