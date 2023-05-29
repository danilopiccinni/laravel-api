@extends('layouts/admin')

@section('content')

<div class="container">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
                <tr>
                    <td scope="row">{{$type->name}}</td>
                    <td>{{$type->description}}</td>
                    <td><a class="btn btn-secondary ms-5" href="{{route('admin.types.show', $type)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                    <td><a class="btn btn-success" href="{{route('admin.types.edit', $type)}}"><i class="fa-solid fa-pencil"></i></a></td>
                    <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#typesDeleteModal"><i class="fa-solid fa-trash"></i></button></td>
                </tr>
                @endforeach
            </table>
        </tbody>
</div>


<!-- Modal -->
<div class="modal fade" id="typesDeleteModal" tabindex="-1" aria-labelledby="typesDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="typesDeleteModalLabel">Eliminazione tipologia</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sicuro di voler eliminare il progetto: "{{$type->name}}"
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{route('admin.types.destroy', $type)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">ELIMINA</button>
          </form>
        </div>
      </div>
    </div>
   </div>

@endsection