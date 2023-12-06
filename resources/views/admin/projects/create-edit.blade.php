@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="py-3">{{ $title }}</h1>

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
    @endif

    <div class="row">
        <div class="col-8">
            <form
            action="{{ $route }}"
            method="POST"
            enctype="multipart/form-data"
            >
                @csrf
                @method($method)
                <div class="mb-3">
                    <label for="title" class="form-label">Nome Progetto *</label>
                    <input
                    id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    type="text"
                    value="{{ old('title', $project?->name) }}"
                    >
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date_updated" class="form-label">Data ultimo aggiornamento *</label>
                    <input
                    id="date_updated"
                    class="form-control @error('date_updated') is-invalid @enderror"
                    name="date_updated"
                    type="date"
                    value="{{ old('reading_time', $project?->date_updated) }}"
                    >
                    @error('date_updated')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">Tipo</label>
                    <select class="form-select" name="type_id" id="type_id">
                        <option value="">Seleziona un tipo</option>

                        @foreach ($types as $type)
                        <option
                        value="{{$type->id}}"
                        {{ old('type_id', $project?->type_id) == $type->id?'selected' : '' }}>
                        {{$type->name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <span for="">Seleziona la Tecnologia</span>
                    <div class="btn-group" role="group">
                        @foreach ($technologies as $technology)
                        <input type="checkbox"
                            class="btn-check"
                            autocomplete="off"
                            name="technologies[]"
                            id="technology_{{$technology->id}}"
                            value="{{ $technology->id}}"
                                @if (($errors->any() && in_array($technology->id, old('technologies',[])))
                                    || (!$errors->any() && $project?->technologies->contains($technology)))
                                    checked
                                @endif
                        >
                        <label class="btn btn-outline-success " for="technology_{{$technology->id}}">{{$technology->name}}</label>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label for="version" class="form-label">Numero versione</label>
                    <input
                    id="version"
                    class="form-control @error('version') is-invalid @enderror"
                    name="version"
                    type="text"
                    value="{{ old('version', $project?->version) }}"
                    >
                    @error('version')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-floating mb-5">
                    <textarea class="form-control"
                    placeholder="Descrizione *"
                    id="description"
                    name="description"
                    style="height: 200px">{{old('description',$project?->description)}}</textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
                <button type="reset" class="btn btn-secondary">Annulla</button>

            </form>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
