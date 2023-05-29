@extends('layouts/admin')

@section('content')

    <div class="container px-5 my-5" >

        <h2 class="mb-5 text-center">Creazione nuova tipologia di progetto</h2>

        <form action="{{ route('admin.types.store') }}" method="POST">
    
            @csrf

            <div class="mb-5 form-check" >
                <label class="form-label" for="name">Nome:</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name')}}">
                @error('name')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
    
            <div class="mb-5 form-check" >
                <label class="form-label" for="description">Descrizione:</label>
                <textarea style="height: 150px" class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>

            <button class="btn btn-secondary ms-4 mt-3" type="submit">Crea nuova tipologia di progetto</button>
     
        </form>
    </div>

@endsection