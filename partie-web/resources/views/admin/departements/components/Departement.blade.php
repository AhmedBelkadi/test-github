@props(["departement", "index"])

<div class="col">
    <div class="card text-center mb-3">

@include("admin.departements.delete")

        <div class="card-body">
            <div class="d-flex justify-content-end position-absolute top-0 end-0">
                <div class="dropdown">
                    <button class="btn " type="button" id="dropdownMenuButton{{$index}}" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="menu-icon tf-icons bx bx-dots-vertical-rounded"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$index}}">
                        <li>
                            <a class="dropdown-item" href="{{route("departements.edit", $departement)}}">
                                <i class="menu-icon tf-icons bx bx-pencil"></i> Edit
                            </a>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deletModal{{$departement->id}}">
                                <i class="menu-icon tf-icons bx bx-trash"></i> Delete
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Rest of the card body content -->
            <h5 class="card-title">{{$departement->name}}</h5>
            <h6 class="card-title">Chef de département : {{$departement->chef->user->name}}</h6>
        </div>
        <div class="p-2 bg-primary text-white rounded me-0">
            {{count($departement->filieres)}} filières
        </div>
    </div>
</div>
