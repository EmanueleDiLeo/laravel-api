 @php
    use App\Functions\Helper;
@endphp

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card p-5">

        @if ($project->image !== null)
            <div class="w-50">
                <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}">
                <p>{{ $project->image_name }}</p>
            </div>
        @endif


        <div class="card-body">
            <h2>{{ $project->name }}</h2>

            @if ($project->technologies)
                @foreach ($project->technologies as $technology)
                    <span class="badge text-bg-info">{{ $technology->name }}</span>
                @endforeach
            @endif

            @if ($project->type)
                <p>Tipo: <strong>{{ $project->type->name }}</strong></p>
            @endif

            <p>Data ultimo aggiornamento: {{ Helper::formatDate($project->date_updated) }}</p>
            <p>Ultima Versione: v-{{ $project->version }}</p>
            <p>{!! $project->description !!}</p>
            <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Torna indietro</a>
        </div>
    </div>
</div>

@endsection
