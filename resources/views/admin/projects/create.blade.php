@extends('layouts/admin')

@section('content')

    <div class="container px-5 my-5" >

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    
            @csrf

            <div class="my-5 form-check" >
                <label class="form-label" for="title">Titolo progetto:</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title')}}">
                @error('title')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
    
            <div class="my-5 form-check" >
                <label class="form-label" for="repo">Nome repo git:</label>
                <input class="form-control @error('repo') is-invalid @enderror" type="text" id="repo" name="repo" value="{{old('repo')}}">
                @error('repo')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>

            <div class="my-5 form-check" >
                <label class="form-label" for="type_id">Categoria:</label>
                <select class="ms-2" style="width: 200px; text-align: center; border-radius:4px;border:1px solid grey" name="type_id" id="type_id">
                    <option value="">nessuna</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}" {{old('type_id') == $type->id ? 'selected' : ''}}>{{$type->name}} </option>
                    @endforeach
                </select>
                @error('repo')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>

            <div class="form-group form-check my-5 form-group d-flex gap-3 align-items-center">
                <label>Technologia:</label>
                <div class="row">
                    @foreach($technologies as $technology)
                    <div class="form-check col-2">
                        <input type="checkbox" id="technology-{{$technology->id}}" name="technologies[]" value="{{$technology->id}}" @checked(in_array($technology->id, old('technologies', [])))>
                        <label for="technology-{{$technology->id}}">{{$technology->name}}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            
    
            <div class="my-5 form-check" >
                <label class="form-label" for="description">Descrizione:</label>
                <textarea style="height: 250px" class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
    
            <div class="my-5 form-check" >
                <label class="form-label" for="thumb">Link immagine anteprima:</label>
                <input class="form-control @error('thumb') is-invalid @enderror" type="file" id="thumb" name="thumb" >
                @error('thumb')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
    
            <button class="btn btn-secondary ms-4 mt-3" type="submit">Crea progetto</button>
     
        </form>
    </div>

@endsection


