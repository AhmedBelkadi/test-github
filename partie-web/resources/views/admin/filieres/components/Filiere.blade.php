@props( ["filiere","index"] )
    <div class="col">
        <div class="card text-center mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$filiere->name}}</h5>
                <h6 class="card-title">Chef de Filiere : {{$filiere->chef->user->name}}</h6>
                <div class="d-flex justify-content-center">
                    <div class="p-2 bg-primary text-white rounded me-2">
                        {{count($filiere->etudiants)}} etudiant
                    </div>
                    <a class="btn btn-success me-2 rounded-3 " href="{{route("filieres.edit", $filiere )}}">
                        <i class="menu-icon tf-icons bx bx-pencil"></i>
                    </a>
{{--                    <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#editFiliereModal">--}}
{{--                        modifier--}}
{{--                    </button>--}}

                    <button type="button" class="btn btn-danger rounded-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="menu-icon tf-icons bx bx-trash"></i>

                    </button>
                    <x-delete-modal>
                        <form method="POST" class=" me-2" action="{{route("filieres.destroy",$filiere)}}" >
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </x-delete-modal>
                </div>
            </div>
        </div>
    </div>

