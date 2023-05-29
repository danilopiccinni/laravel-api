@extends('layouts/admin')


@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card" >
          <div class="card-body d-flex flex-column gap-3">
            <h5 class="card-title">{{$type->name}}</h5>
            <p class="card-text">{{$type->description}}</p>
            <div>
              <strong>Progetti correlati: </strong>
              @foreach($type->projects as $project)
                <span class="badge rounded-pill text-bg-secondary">
                  <a class="nav-link" href="{{ route('admin.projects.show', $project) }}">
                    {{ $project->title }}
                  </a>
                  </span>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="d-flex justify-content-center gap-5 my-5">
      <a href="{{ route('admin.types.edit', $type) }}" class="card-link btn btn-primary">Modifica</a>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#typesDeleteModal">
        Elimina
      </button>

    </div>
    
  </div>

        
  
<!-- Modal -->
<div class="modal fade" id="typesDeleteModal" tabindex="-1" aria-labelledby="typesDeleteModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
     <div class="modal-header">
       <h1 class="modal-title fs-5" id="typesDeleteModalLabel">Modal title</h1>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
       Sicuro di voler eliminare il progetto: {{$type->title}}
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