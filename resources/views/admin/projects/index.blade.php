@extends('layouts/admin')

@section('content')


<div class="container">

  <table class="table table-striped align-middle table-responsive">
      <thead>
          <tr>
              <th class="text-center" style="width: 50px" scope="col">Anteprima</th>
              <th class="text-center" style="min-width: 150px" scope="col">Titolo</th>
              <th scope="col">Description</th>
              <th scope="col">Tipologia</th>
              <th scope="col">Technologie</th>
              <th scope="col">Repo</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
          @foreach($projects as $project)
              <tr>
                  <td  scope="row"><img class="img-fluid h-50" src="{{ asset('storage/' . $project->thumb) }}" alt=""></td>
                  <td>{{$project->title}}</td>
                  <td>{{$project->description}}</td>
                  <td><a class="nav-link" href="{{ route('admin.types.show', $project->type) }}">{{$project->type->name}}</a></td>
                  <td><div class="d-flex flex-column gap-1">
                    @foreach($project->technologies as $technology)<span class="badge rounded-pill" style="background-color: {{$technology->color}}; "> <a class="nav-link"  href="{{ route('admin.technologies.show', $technology) }}">{{$technology->name}}</a>  </span> @endforeach</td>
                  </div>
                  <td><a href="">git</a></td>
                  <td><div class="d-flex flex-column gap-1">
                    <a class="btn btn-secondary " href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-magnifying-glass"></i></a>
                    <a class="btn btn-success" href="{{route('admin.projects.edit', $project) }}"><i class="fa-solid fa-pencil"></i></a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteProjectModal"><i class="fa-solid fa-trash"></i></button>
                  </div></td>
              </tr>
              @endforeach
      </tbody>
    </table>
</div>


<!--Delete Modal Projects -->
<div class="modal fade" id="DeleteProjectModal" tabindex="-1" aria-labelledby="DeleteProjectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="DeleteProjectModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sicuro di voler eliminare il progetto: {{$project->title}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{ route('admin.projects.destroy' , $project) }}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Elimina</button>
      </form>
      </div>
    </div>
  </div>
</div>

  

{{-- <section class="section-admin-index">

    <div class="my-5">

      <div class="d-flex justify-content-center my-3">
        <a class="btn btn-secondary my-3" href="{{route('admin.projects.create')}}">Crea nuovo progetto</a>

      </div>

        <ul>
            @foreach ($projects as $project)
                <li>
                    <a style="color: black ; text-decoration: none" class="cont-card" href="{{ route('admin.projects.show', $project) }}">
                      <div class="card mb-1" >
                        <div class="row g-0">
                          <div class="col-md-4 d-flex align-items-center">
                            <img src="{{asset('storage/' . $project->thumb)}}" class="img-fluid rounded-start" alt="...">
                          </div>
                          <div class="col-md-4 ">
                            <div class="card-body d-flex flex-column gap-5 ">
                              <h2 class="card-title text-center">{{ $project->title }}</h2>
                              <div class="d-flex gap-3 justify-content-center">
                                @foreach($project->technologies as $tecnology)
                                  <p class="card-title text-center"><em>{{ $tecnology->name}}</em></p>
                                @endforeach
                              </div>
                              <h4 class="text-center">{{$project->type?->name}}</h4>
                            </div>
                          </div>
                          <div class="col-md-4 ">
                            <div class="card-body d-flex gap-3 justify-content-center">
                              <p class="card-text">{{$project->description}}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section> --}}

@endsection