@extends('layouts/admin')

@section('content')

    <div class="container px-5 my-5" >

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
    
            @csrf
            @method('PUT')

            <div class="my-5 form-check" >
                <label class="form-label" for="title">Titolo progetto:</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{old('title') ?? $project->title}}">
                @error('title')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
    
            <div class="my-5 form-check" >
                <label class="form-label" for="repo">Nome repo git:</label>
                <input class="form-control @error('repo') is-invalid @enderror" type="text" id="repo" name="repo" value="{{old('repo') ?? $project->repo}}">
                @error('repo')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>


            <div class="my-5 form-check" >
                <label class="form-label" for="type_id">Categoria:</label>
                <select class="ma-2" style="width: 200px; text-align: center; border-radius:4px;border:1px solid grey" name="type_id" id="type_id" >
                    <option value="">nessuna</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}" {{$type->id == old('type_id', $project->type_id) ? 'selected' : ''}}>{{$type->name ?? old($type->name)}}</option>
                    @endforeach
                </select>
                @error('repo')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>


            <div class=" my-5 form-check form-group d-flex gap-3 align-items-center">
                <label>Technologia:</label>
                <div class="row">
                    @foreach($technologies as $technology)
                    <div class="form-check col-2">
                        @if ($errors->any())
                        <input type="checkbox" id="technology-{{$technology->id}}" name="technologies[]" value="{{$technology->id}}" @checked(in_array($technology->id, old('technologies', [])))>
                        @else
                        <input type="checkbox" id="technology-{{$technology->id}}" name="technologies[]" value="{{$technology->id}}" @checked($project->technologies->contains($technology))>
                        @endif
                        <label for="technology-{{$technology->id}}">{{$technology->name}}</label>
                    </div>
                    @endforeach
                </div>
                @error('technologies')
                <div class="invalid-feedback">
                    <em> {{$message}} </em>
                </div>
                @enderror
            </div>
            

    
            <div class="my-5 form-check" >
                <label class="form-label" for="description">Descrizione:</label>
                <textarea style="height: 250px" class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description">{{old('description') ?? $project->description}}</textarea>
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
    
            <button class="btn btn-secondary ms-4 mt-3" type="submit">Effettua modifiche</button>
     
        </form>
    </div>

@endsection