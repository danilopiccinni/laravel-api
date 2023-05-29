@extends('layouts/admin')


@section('content')

    <div class="d-flex justify-content-center gap-5 my-5">
        <a class="btn btn-primary" href="{{route('admin.projects.edit', $project)}}">modifica</a>
        
                    <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina
        </button>
        
    </div>

    <section class="section-admin-show">
        <section>
            <div class="image py-5">
                <div class="container-fliud py-5">
                    <div class="col-10 offset-1">
                        <div class="container-image" style="background-image: url({{ asset('storage/' . $project->thumb)}})">
                            <h1>{{$project->title}}</h1>
                            <div class="opacity"></div>
                            {{-- <img class="inner-bottom-svg" src="{{Vite::asset('resources/img/wave.svg')}}" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
            <img class="svg" src="{{Vite::asset('resources/img/wave.svg')}}" alt="">
            
        </section>


        <section class="my-5">
            
            <div class="container">

                <p>
                    <strong>Tecnologia:</strong>
                    @foreach ($project->technologies as $technology)
                    <span class="badge" style=" background-color: {{$technology->color}}">
                        <a class="nav-link" href="{{route('admin.technologies.show', $technology)}}">
                            {{$technology->name}}
                        </a>
                    </span>
                    @endforeach
                </p>

                <p>
                    <strong>Tipologia:</strong>

                    <span class="badge rounded-pill text-bg-info">
                        <a class="nav-link" href="{{ route('admin.types.show', $project->type) }}">
                            {{$project->type?->name}}
                        </a>
                    </span>

                </p>

                <p>
                    {{$project->description}}{{$project->description}}{{$project->description}}
                </p>
            </div>

        </section>

        <section>
            <div class="container text-center">
               <em>Git-Hub link: </em><a href="">{{ $project->repo }}</a>  
            </div>
        </section>

        <section class="details-project my-5">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 column-1">
                        asd
                    </div>
                    <div class="col-8 column-2">
                        <div class="p-5">
                            <div class="row my-5">
                                <h3>Progetto</h3>
                                <div class="col-4">
                                    <h6>CLIENTE</h6>
                                    <span>Aereonautica spaziale Elon</span> 
                                </div>
                                <div class="col-4">
                                    <h6>LOCATION</h6>
                                    <span>Presso la Luna</span>  
                                </div>
                                <div class="col-4">
                                    <h6>ANNO</h6>
                                    <span>2056</span>
                                </div>
                            </div>
                            <div class="row my-5">
                                <h3>TASK</h3>
                                <div class="col-4 pt-3">
                                    <h4>1</h4>
                                    <h6>UN TITOLINO DEL TASK</h6>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo voluptas asperiores distinctio alias molestiae laboriosam accusamus exercitationem necessitatibus dolores error porro eligendi deleniti, hic aspernatur quam? Eius nisi nesciunt quod.</span> 
                                </div>
                                <div class="col-4 pt-3">
                                    <h4>2</h4>
                                    <h6>UN TITOLINO DEL TASK</h6>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo voluptas asperiores distinctio alias molestiae laboriosam accusamus exercitationem necessitatibus dolores error porro eligendi deleniti, hic aspernatur quam? Eius nisi nesciunt quod.</span>  
                                </div>
                                <div class="col-4 pt-3">
                                    <h4>3</h4>
                                    <h6>UN TITOLINO DEL TASK</h6>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo voluptas asperiores distinctio alias molestiae laboriosam accusamus exercitationem necessitatibus dolores error porro eligendi deleniti, hic aspernatur quam? Eius nisi nesciunt quod.</span>
                                </div>
                                <div class="col-4 pt-3">
                                    <h4>4</h4>
                                    <h6>UN TITOLINO DEL TASK</h6>
                                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo voluptas asperiores distinctio alias molestiae laboriosam accusamus exercitationem necessitatibus dolores error porro eligendi deleniti, hic aspernatur quam? Eius nisi nesciunt quod.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="section-color-font">

            <div class="container py-5">
                <div class="row my-5 ">
                    <div class="col-2">
                        <h4>Color Scheme</h4>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-2 cont-color">
                                <div class="color-square"></div>
                                <span>#ffffff</span>
                            </div>
                            <div class="col-2 cont-color">
                                <div class="color-square"></div>
                                <span>#ffffff</span>
                            </div>
                            <div class="col-2 cont-color">
                                <div class="color-square"></div>
                                <span>#ffffff</span>
                            </div>
                            <div class="col-2 cont-color">
                                <div class="color-square"></div>
                                <span>#ffffff</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col-2">
                        <h4>Font Family</h4>
                    </div>
                    <div class="col-10">
                        <div class="row ">
                            <div class="col-2">
                                <span>Font 1</span>
                            </div>
                            <div class="col-2">
                                <span>Font 2</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section class="section-previews">
            @for($i=0 ; $i < 4 ; $i++)
            <div class="row my-5">
                <div class="col-8 d-flex justify-content-center">
                    <div class="cont-image">
                        img
                    </div>
                </div>
                <div class="col-4">
                    <div class="cont-details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus porro maiores quaerat in ea praesentium repudiandae illo repellendus nesciunt maxime voluptas ipsam, repellat cupiditate incidunt odit atque accusantium at. Consequuntur.</p>
                    </div>
                </div>
            </div>
            @endfor


        </section>

        <div class="d-flex justify-content-center gap-5 my-5">
            <a class="btn btn-primary" href="{{route('admin.projects.edit', $project)}}">modifica</a>
            
                        <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Elimina
              </button>
              
        </div>
            
            
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
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




    </section>



@endsection