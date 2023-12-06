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
                    <label for="title" class="form-label">Nome tecnologia *</label>
                    <input
                    id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    type="text"
                    value="{{ old('title', $technology?->name) }}"
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
                    value="{{ old('reading_time', $technology?->date_updated) }}"
                    >
                    @error('date_updated')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="version" class="form-label">Numero versione</label>
                    <input
                    id="version"
                    class="form-control @error('version') is-invalid @enderror"
                    name="version"
                    type="text"
                    value="{{ old('version', $technology?->version) }}"
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
                    style="height: 200px">{{old('description',$technology?->description)}}</textarea>
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
