@props(["filiere", "index"])

<div class="col">
    <div class="card text-center mb-3">
{{--        <style>--}}
{{--            /* Add hover effect */--}}
{{--            .card {--}}
{{--                transition: transform 0.3s, box-shadow 0.3s;--}}
{{--            }--}}
{{--            .card:hover {--}}
{{--                transform: translateX(-5px); /* Move card slightly up on hover */--}}
{{--                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add subtle shadow on hover */--}}
{{--            }--}}
{{--            .dropdown {--}}
{{--                transition: opacity 0.3s;--}}
{{--            }--}}
{{--            .dropdown:hover {--}}
{{--                opacity: 1; /* Show dropdown on hover */--}}
{{--            }--}}
{{--        </style>--}}
            @include("admin.filieres.delete")
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
                            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deletModal{{$filiere->id}}">
                                <i class="menu-icon tf-icons bx bx-trash"></i> Delete
                            </button>
{{--                            <x-delete-modal :index="$index" :filiere="$filiere" />--}}
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
