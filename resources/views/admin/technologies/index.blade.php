@extends('layouts/admin')

@section('content')
    
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th>Badge Color</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($technologies as $technology)
                    <tr>
                        <td scope="row">{{$technology->name}}</td>
                        <td>{{$technology->description}}</td>
                        <td><div class="btn d-flex justify-content-center align-items-center" style=" background-color: {{$technology->color}};">{{$technology->color}}</div></td>
                        <td><a class="btn btn-secondary ms-5" href="{{route('admin.technologies.show', $technology)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td> 
                        <td><a class="btn btn-success" href="{{route('admin.technologies.edit', $technology) }}"><i class="fa-solid fa-pencil"></i></a></td>
                        <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteTechnologyModal"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Delete Modal Technologies -->
<div class="modal fade" id="DeleteTechnologyModal" tabindex="-1" aria-labelledby="DeleteTechnologyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="DeleteTechnologyModalLabel">Eliminazione tecnologia</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sicuro di voler eliminare il progetto: "{{$technology->name}}"
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{route('admin.technologies.destroy', $technology)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">ELIMINA</button>
          </form>
        </div>
      </div>
    </div>
</div>



@endsection