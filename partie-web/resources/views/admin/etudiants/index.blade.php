@extends("layouts.index")

@section("main")
    <!-- Basic Bootstrap Table -->

{{--    <a class="btn btn-primary" href="{{route("modules.store")}}">Ajouter </a>--}}
    <!-- Button trigger modal -->
    <div class="container-xxl flex-grow-1 container-p-y">


    @include('admin.etudiants.create')


    <div class="mt-3 card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center" >Name</th>
                    <th class="text-center" >CIN</th>
                    <th class="text-center" >Apogeer</th>
                    <th  class="text-center" >CNE</th>
                    <th class="text-center" >Email</th>
                    <th class="text-center" >Tele</th>
                    <th class="text-center" >Adresse</th>
                    <th class="text-center" >Filiere</th>
                    <th class="text-center" >Role</th>

                    <th  class="text-center"  >Actions</th>

                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach( $etudiants as $etudiant )
                    <tr>
                        <td class="text-center" >{{$etudiant->user->name}}</td>
                        <td class="text-center" >{{$etudiant->user->cin}}</td>
                        <td class="text-center" >{{$etudiant->apogee}}</td>
                        <td class="text-center" >{{$etudiant->cne}}</td>
                        <td class="text-center" >{{$etudiant->user->email}}</td>
                        <td class="text-center" >{{$etudiant->user->tele}}</td>
                        <td class="text-center" >{{$etudiant->user->adresse}}</td>
                        <td class="text-center" >{{$etudiant->filiere->name}}</td>
                        <td class="text-center" >{{$etudiant->user->role}}</td>

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

                                                    <form method="POST" class=" me-2" action="{{route("etudiants.destroy",$etudiant)}}" >
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
    </div>

@endsection











