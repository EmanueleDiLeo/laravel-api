@php
    use App\Functions\Helper;
@endphp

@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card p-5">
        <div class="card-body">
            <h2>{{ $technology->name }}</h2>
            <p>Data ultimo aggiornamento: {{ Helper::formatDate($technology->date_updated) }}</p>
            <p>Ultima Versione: v-{{ $technology->version }}</p>
            <p>{!! $technology->description !!}</p>
            <a href="{{route('admin.technologies.index')}}" class="btn btn-primary">Torna indietro</a>
        </div>
    </div>
</div>

@endsection
