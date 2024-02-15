@props(["departement","index"])
<div>
    <div class="col">
        <div class="card text-center mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$departement->name}}</h5>
                <h6 class="card-title">Chef de departement : {{$departement->chef->user->name}}</h6>
                <div class="d-flex justify-content-center">
                    <div class="p-2 bg-primary text-white rounded me-2">
                        {{count($departement->filieres)}} filieres
                    </div>
                    <a class="btn btn-success me-2 rounded-3 " href="{{route("departements.edit", $departement->id )}}">Update <i class="bi bi-pencil"></i></a>
                    {{--                            <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#editFiliereModal">--}}
                    {{--                                modifier--}}
                    {{--                            </button>--}}

                    <button type="button" class="btn btn-danger rounded-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                    <x-delete-modal>
                        <form method="POST" class=" me-2" action="{{route("departements.destroy",$departement->id)}}" >
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </x-delete-modal>
                </div>
            </div>
        </div>
    </div>
    @if (($index + 1) % 2 === 0) </div> <div class="row row-cols-2"> @endif
</div>
