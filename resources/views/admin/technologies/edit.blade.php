@extends('layouts/admin')

@section('content')

    <div class="container px-5 my-5" >

        <h2 class="mb-5 text-center">Modifica tecnologia</h2>

        <form action="{{ route('admin.technologies.update' ,$technology) }}" method="POST">
    
            @csrf
            @method('PUT')

            <div class="mb-5 form-check" >
                <label class="form-label" for="name">Nome:</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name') ?? $technology->name}}">
                @error('name')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
    
            <div class="mb-5 form-check" >
                <label class="form-label" for="description">Descrizione:</label>
                <textarea style="height: 150px" class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description">{{old('description') ?? $technology->description}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>

            <div class="mb-5 form-check d-flex justify-content-center align-items-center gap-" >
                <label class="form-label" for="color">colore:</label>
                <input style="width: 100px; height: 50px" class="form-control @error('color') is-invalid @enderror" type="color" id="color" name="color" value="{{old('name') ?? $technology->color}}">
                @error('color')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>

            <button class="btn btn-secondary ms-4 mt-3" type="submit">Modifica tecnologia</button>
     
        </form>
    </div>

@endsection