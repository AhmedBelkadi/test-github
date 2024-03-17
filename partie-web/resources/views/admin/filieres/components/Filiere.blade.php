@props(["filiere", "index"])

<div class="col">
    <div class="card text-center mb-3">
        <div class="card-body">
            <!-- Move the dropdown to the top-right corner -->
            <div class="d-flex justify-content-end position-absolute top-0 end-0">
                <div class="dropdown">
                    <button class="btn " type="button" id="dropdownMenuButton{{$index}}" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="menu-icon tf-icons bx bx-dots-vertical-rounded"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$index}}">
                        <li>
                            <a class="dropdown-item" href="{{route("filieres.edit", $filiere)}}">
                                <i class="menu-icon tf-icons bx bx-pencil"></i> Edit
                            </a>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal{{$index}}">
                                <i class="menu-icon tf-icons bx bx-trash"></i> Delete
                            </button>
                            <x-delete-modal :index="$index" :filiere="$filiere" />
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End of dropdown -->

            <!-- Rest of the card body content -->
            <h5 class="card-title">{{$filiere->name}}</h5>
            <h6 class="card-title">Chef de Filiere : {{$filiere->chef->user->name}}</h6>
        </div>
        <div class="p-2 bg-primary text-white rounded me-0">
            {{count($filiere->etudiants)}} etudiant
        </div>
    </div>
</div>
