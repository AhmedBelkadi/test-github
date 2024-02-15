@extends("layouts.index")

@section( "professeurs-active" , "active" )


@section("main")
    <!-- Basic Bootstrap Table -->

{{--    <a class="btn btn-primary" href="{{route("modules.store")}}">Ajouter </a>--}}
    <!-- Button trigger modal -->
    <button
        type="button"
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#basicModal"
    >
        Ajouter un professeur
    </button>
    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Ajouter un professeur</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                   <form method="post" action="{{route("professeurs.store")}}">
                       @csrf
                        <div class="modal-body">
                               <div class="row">
                                   <div class="col mb-3">
                                       <label for="nameBasic" class="form-label">Name</label>
                                       <input type="text" name="name" id="nameBasic" class="form-control" placeholder="Enter name" />
                                       @error("name")
                                       <span class="text-danger" >{{$message}}</span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="row g-2">
                                   <div class="col mb-0">
                                       <label for="emailBasic" class="form-label">CIN</label>
                                       <input type="text" id="emailBasic"  name="cin" class="form-control" placeholder="enter cin" />
                                       @error("cin")
                                       <span class="text-danger" >{{$message}}</span>
                                       @enderror
                                   </div>
                               </div>
                               <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">Role</label>
                                    <input type="text" id="emailBasic"  name="role" class="form-control" placeholder="enter role" />
                                    @error("role")
                                    <span class="text-danger" >{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                               <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">Email</label>
                                    <input type="email" id="emailBasic"  name="email" class="form-control" placeholder="enter email" />
                                    @error("email")
                                    <span class="text-danger" >{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">Tele</label>
                                    <input type="email" id="emailBasic"  name="tele" class="form-control" placeholder="enter tele" />
                                    @error("tele")
                                    <span class="text-danger" >{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="emailBasic" class="form-label">Adresse</label>
                                    <input type="text" id="emailBasic"  name="adresse" class="form-control" placeholder="enter adresse" />
                                    @error("adresse")
                                    <span class="text-danger" >{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">ajouter</button>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <div class="mt-3 card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center" >Name</th>
                    <th class="text-center" >CIN</th>
                    <th class="text-center" >Role</th>
                    <th class="text-center" >Email</th>
                    <th class="text-center" >Tele</th>
                    <th class="text-center" >Adresse</th>
                    <th  class="text-center"  >Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach( $professeurs as $professeur )
                    <tr>
                        <td class="text-center" >{{$professeur->user->name}}</td>
                        <td class="text-center" >{{$professeur->user->cin}}</td>
                        <td class="text-center" >{{$professeur->user->role}}</td>
                        <td class="text-center" >{{$professeur->user->email}}</td>
                        <td class="text-center" >{{$professeur->user->tele}}</td>
                        <td class="text-center" >{{$professeur->user->adresse}}</td>

                                                <td class="text-center" >
                            <button
                                type="button"
                                class="btn btn-danger text-white"
                                data-bs-toggle="modal"
                                data-bs-target="#basicModal"
                            >
                                Delete
                            </button>
                                 <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="modal-header ">
                            <h1 class="modal-title fs-5 w-100" id="exampleModalLabel">delete confirmation</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">

                            <form method="POST" class=" me-2" action="{{route("professeurs.destroy",$professeur)}}" >
                                @csrf
                                @method("DELETE")
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
                            <a class="btn btn-success text-white" >Modifier</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection











