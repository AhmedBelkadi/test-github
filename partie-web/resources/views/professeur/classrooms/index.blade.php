@extends("layouts.professeur_layout")

@section( "classrooms-active" , "active" )

@section("main")
{{--    <x-professeur-sidebar />--}}
<x-sidebar />


{{--    <div class="d-flex gap-4 align-items-center" >--}}
@forelse(Auth::user()->professeur->elements->chunk(2) as $chunk)
    <div class="row">
        @foreach($chunk as $element)
            <div class="col-md-6 mb-5">
                <a class="card-link" href="{{ route('classrooms.show', $element->classRoom) }}">
                    <div class="card h-100" style="transition: transform 0.2s;">

                        <!-- Add hover effect using :hover -->
                        <style>
                            .card:hover {
                                transform: scale(1.05);
                            }
                        </style>

                        <div class="aspect-ratio-square">
                            <img class="card-img-top" src="{{ asset("assets/img/avatars/img_reachout.jpg") }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $element->name }}</h5>
                        </div>
                    </div>
                </a>

            </div>
        @endforeach
    </div>
@empty
    <h1>no classrooms</h1>
@endforelse



{{--    </div>--}}



{{--    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#chercherEtdsParFiliereModal">chercher Etudiants ou le Code Qr </button>--}}
{{--    <div class="modal fade" id="chercherEtdsParFiliereModal" tabindex="-1" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel1">chercher Etudiants Par Filiere</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <form method="post" action="{{route("etudiants.chercherEtdsParFiliere")}}">--}}
{{--                    @csrf--}}
{{--                    <div class="modal-body">--}}

{{--                        <div class="col-12" >--}}
{{--                            <div class="row g-2">--}}
{{--                                <div class="col px-0  mb-0">--}}
{{--                                    <div class=" px-0 mb-3">--}}
{{--                                        <label for="filiere" class="form-label">Filiere</label>--}}
{{--                                        <select name="id_filiere" id="filiere" class="form-select-lg form-select">--}}
{{--                                            <option value="" selected disabled>Select Filiere</option>--}}
{{--                                            @foreach($filieres as $filiere)--}}
{{--                                                <option data-type="{{ $filiere->type }}" value="{{ $filiere->id }}" >{{ $filiere->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                        @error("id_filiere")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12" >--}}
{{--                            <div class="row g-2">--}}
{{--                                <div class="col px-0  mb-0">--}}
{{--                                    <div class=" px-0 mb-3">--}}
{{--                                        <label for="emailBasic" class="form-label">Semestre</label>--}}
{{--                                        <select name="name_semestre" id="semestre" class="form-select-lg form-select">--}}
{{--                                            <option value="" selected disabled>Select Semestre</option>--}}
{{--                                        </select>--}}
{{--                                        @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="col-12" >--}}
{{--                            <div class="row" >--}}
{{--                                <div class="col-6" >--}}
{{--                                    <div class="row g-2">--}}
{{--                                        <div class="col px-0  mb-0">--}}
{{--                                            <div class=" px-0 mb-3">--}}
{{--                                                <label for="element" class="form-label">Element</label>--}}
{{--                                                <select name="id_element" id="element" class="form-select-lg form-select">--}}
{{--                                                    <option value="" selected disabled>Select Element</option>--}}
{{--                                                    @foreach($elements as $element)--}}
{{--                                                        <option value="{{ $element->id }}" >{{ $element->name }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                                @error("id_element")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-6" >--}}
{{--                                    <div class="row g-2">--}}
{{--                                        <div class="col px-0  mb-0">--}}
{{--                                            <div class=" px-0 mb-3">--}}
{{--                                                <label for="nameBasic" class="form-label">Date</label>--}}
{{--                                                <input type="date" value="{{old("date")}}" name="date" id="nameBasic" class="form-control form-control-lg"  />--}}
{{--                                                @error("date")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12" >--}}
{{--                            <div class="row" >--}}
{{--                                <div class="col-6" >--}}
{{--                                    <div class="row g-2">--}}
{{--                                        <div class="col px-0  mb-0">--}}
{{--                                            <div class=" px-0 mb-3">--}}
{{--                                                <label for="largeSelect" class="form-label">Type</label>--}}
{{--                                                <select name="type" id="largeSelect" class="form-select-lg form-select">--}}
{{--                                                    <option selected disabled >select type</option>--}}
{{--                                                    <option value="tp" {{ old('type') == 'tp' ? 'selected' : '' }} >Traveaux Pratique</option>--}}
{{--                                                    <option value="cour" {{ old('type') == 'cour' ? 'selected' : '' }} >Cour</option>--}}
{{--                                                </select>--}}
{{--                                                @error("type")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-6" >--}}
{{--                                    <div class="row g-2">--}}
{{--                                        <div class="col px-0  mb-0">--}}
{{--                                            <div class=" px-0 mb-3">--}}
{{--                                                <label for="periode" class="form-label">Periode</label>--}}
{{--                                                <select name="id_periode" id="periode" class="form-select-lg form-select">--}}
{{--                                                    <option value="" selected disabled>Select Periode</option>--}}
{{--                                                    @foreach($periodes as $periode)--}}
{{--                                                        <option value="{{ $periode->id }}" >{{ $periode->libelle }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                                @error("id_periode")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{--                        <div class="col-12" >--}}
{{--                        --}}{{--                            <div class="row" >--}}
{{--                        --}}{{--                                <div class="col-12  " >--}}
{{--                        --}}{{--                                    <button type="submit"  class="btn-lg btn-danger w-100 ">envoyer</button>--}}
{{--                        --}}{{--                                </div>--}}
{{--                        --}}{{--                            </div>--}}
{{--                        --}}{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn-lg btn-outline-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                        <button type="submit"  class="btn-lg btn-danger ">envoyer</button>--}}
{{--                    </div>--}}
{{--                </form>--}}


{{--                --}}{{--                <form method="post" action="{{route("etudiants.chercherEtdsParFiliere")}}" class="row mx-0  h-100" >--}}
{{--                --}}{{--                    @csrf--}}
{{--                --}}{{--                    <div class="col-12" >--}}
{{--                --}}{{--                        <div class="row g-2">--}}
{{--                --}}{{--                            <div class="col px-0  mb-0">--}}
{{--                --}}{{--                                <div class=" px-0 mb-3">--}}
{{--                --}}{{--                                    <label for="filiere" class="form-label">Filiere</label>--}}
{{--                --}}{{--                                    <select name="id_filiere" id="filiere" class="form-select-lg form-select">--}}
{{--                --}}{{--                                        <option value="" selected disabled>Select Filiere</option>--}}
{{--                --}}{{--                                        @foreach($filieres as $filiere)--}}
{{--                --}}{{--                                            <option data-type="{{ $filiere->type }}" value="{{ $filiere->id }}" >{{ $filiere->name }}</option>--}}
{{--                --}}{{--                                        @endforeach--}}
{{--                --}}{{--                                    </select>--}}
{{--                --}}{{--                                    @error("id_filiere")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                --}}{{--                                </div>--}}
{{--                --}}{{--                            </div>--}}
{{--                --}}{{--                        </div>--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                    <div class="col-12" >--}}
{{--                --}}{{--                        <div class="row g-2">--}}
{{--                --}}{{--                            <div class="col px-0  mb-0">--}}
{{--                --}}{{--                                <div class=" px-0 mb-3">--}}
{{--                --}}{{--                                    <label for="emailBasic" class="form-label">Semestre</label>--}}
{{--                --}}{{--                                    <select name="name_semestre" id="semestre" class="form-select-lg form-select">--}}
{{--                --}}{{--                                        <option value="" selected disabled>Select Semestre</option>--}}
{{--                --}}{{--                                    </select>--}}
{{--                --}}{{--                                    @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                --}}{{--                                </div>--}}
{{--                --}}{{--                            </div>--}}
{{--                --}}{{--                        </div>--}}

{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                    <div class="col-12" >--}}
{{--                --}}{{--                        <div class="row" >--}}
{{--                --}}{{--                            <div class="col-6" >--}}
{{--                --}}{{--                                <div class="row g-2">--}}
{{--                --}}{{--                                    <div class="col px-0  mb-0">--}}
{{--                --}}{{--                                        <div class=" px-0 mb-3">--}}
{{--                --}}{{--                                            <label for="element" class="form-label">Element</label>--}}
{{--                --}}{{--                                            <select name="id_element" id="element" class="form-select-lg form-select">--}}
{{--                --}}{{--                                                <option value="" selected disabled>Select Element</option>--}}
{{--                --}}{{--                                                @foreach($elements as $element)--}}
{{--                --}}{{--                                                    <option value="{{ $element->id }}" >{{ $element->name }}</option>--}}
{{--                --}}{{--                                                @endforeach--}}
{{--                --}}{{--                                            </select>--}}
{{--                --}}{{--                                            @error("id_element")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                --}}{{--                                        </div>--}}
{{--                --}}{{--                                    </div>--}}
{{--                --}}{{--                                </div>--}}
{{--                --}}{{--                            </div>--}}
{{--                --}}{{--                            <div class="col-6" >--}}
{{--                --}}{{--                                <div class="row g-2">--}}
{{--                --}}{{--                                    <div class="col px-0  mb-0">--}}
{{--                --}}{{--                                        <div class=" px-0 mb-3">--}}
{{--                --}}{{--                                            <label for="nameBasic" class="form-label">Date</label>--}}
{{--                --}}{{--                                            <input type="date" value="{{old("date")}}" name="date" id="nameBasic" class="form-control form-control-lg"  />--}}
{{--                --}}{{--                                            @error("date")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                --}}{{--                                        </div>--}}
{{--                --}}{{--                                    </div>--}}
{{--                --}}{{--                                </div>--}}
{{--                --}}{{--                            </div>--}}
{{--                --}}{{--                        </div>--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                    <div class="col-12" >--}}
{{--                --}}{{--                        <div class="row" >--}}
{{--                --}}{{--                            <div class="col-6" >--}}
{{--                --}}{{--                                <div class="row g-2">--}}
{{--                --}}{{--                                    <div class="col px-0  mb-0">--}}
{{--                --}}{{--                                        <div class=" px-0 mb-3">--}}
{{--                --}}{{--                                            <label for="largeSelect" class="form-label">Type</label>--}}
{{--                --}}{{--                                            <select name="type" id="largeSelect" class="form-select-lg form-select">--}}
{{--                --}}{{--                                                <option selected disabled >select type</option>--}}
{{--                --}}{{--                                                <option value="tp" {{ old('type') == 'tp' ? 'selected' : '' }} >Traveaux Pratique</option>--}}
{{--                --}}{{--                                                <option value="cour" {{ old('type') == 'cour' ? 'selected' : '' }} >Cour</option>--}}
{{--                --}}{{--                                            </select>--}}
{{--                --}}{{--                                            @error("type")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                --}}{{--                                        </div>--}}
{{--                --}}{{--                                    </div>--}}
{{--                --}}{{--                                </div>--}}
{{--                --}}{{--                            </div>--}}
{{--                --}}{{--                            <div class="col-6" >--}}
{{--                --}}{{--                                <div class="row g-2">--}}
{{--                --}}{{--                                    <div class="col px-0  mb-0">--}}
{{--                --}}{{--                                        <div class=" px-0 mb-3">--}}
{{--                --}}{{--                                            <label for="periode" class="form-label">Periode</label>--}}
{{--                --}}{{--                                            <select name="id_periode" id="periode" class="form-select-lg form-select">--}}
{{--                --}}{{--                                                <option value="" selected disabled>Select Periode</option>--}}
{{--                --}}{{--                                                @foreach($periodes as $periode)--}}
{{--                --}}{{--                                                    <option value="{{ $periode->id }}" >{{ $periode->libelle }}</option>--}}
{{--                --}}{{--                                                @endforeach--}}
{{--                --}}{{--                                            </select>--}}
{{--                --}}{{--                                            @error("id_periode")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                --}}{{--                                        </div>--}}
{{--                --}}{{--                                    </div>--}}
{{--                --}}{{--                                </div>--}}
{{--                --}}{{--                            </div>--}}
{{--                --}}{{--                        </div>--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                    <div class="col-12" >--}}
{{--                --}}{{--                        <div class="row" >--}}
{{--                --}}{{--                            <div class="col-12  " >--}}
{{--                --}}{{--                                <button type="submit"  class="btn-lg btn-danger w-100 ">envoyer</button>--}}
{{--                --}}{{--                            </div>--}}
{{--                --}}{{--                            --}}{{----}}{{--                            <div class="col-6 " >--}}
{{--                --}}{{--                            --}}{{----}}{{--                                <button type="submit" formaction="{{route("etudiants.codeQrParSeance")}}" class="btn-lg btn-danger w-100 ">code Qr</button>--}}
{{--                --}}{{--                            --}}{{----}}{{--                            </div>--}}
{{--                --}}{{--                        </div>--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                </form>--}}




{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row  " style="height: 90%" >--}}
{{--        <div class="col-12   " >--}}

{{--            @if(isset($etudiants) )--}}

{{--                <div class="nav-align-top   h-100 p-3">--}}
{{--                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">--}}
{{--                        <li class="nav-item">--}}
{{--                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#codeQr" aria-controls="codeQr" aria-selected="true">--}}
{{--                                <i class="tf-icons bx bx-home"></i> code qr--}}
{{--                            </button>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#etdsLists" aria-controls="etdsLists" aria-selected="false">--}}
{{--                                <i class="tf-icons bx bx-user"></i> list of etudiant--}}
{{--                            </button>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <div class="tab-content h-100">--}}
{{--                        <div class="tab-pane fade active show   h-100" id="codeQr" role="tabpanel">--}}
{{--                            <div class="d-flex justify-content-center align-items-center h-100" >--}}

{{--                                {!! $qrCode !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="etdsLists" role="tabpanel">--}}
{{--                            <div class="mt-3 card">--}}
{{--                                <div class="table-responsive text-nowrap">--}}
{{--                                    <table class="table">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th class="text-center" >Name</th>--}}
{{--                                            <th class="text-center" >CIN</th>--}}
{{--                                            <th class="text-center" >Apogee</th>--}}
{{--                                            <th  class="text-center" >CNE</th>--}}
{{--                                            <th  class="text-center"  >Absence</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody class="table-border-bottom-0">--}}
{{--                                        @forelse($etudiants as $etudiant )--}}
{{--                                            <tr>--}}
{{--                                                <td class="text-center" >{{$etudiant->user->name}}</td>--}}
{{--                                                <td class="text-center" >{{$etudiant->user->cin}}</td>--}}
{{--                                                <td class="text-center" >{{$etudiant->apogee}}</td>--}}
{{--                                                <td class="text-center" >{{$etudiant->cne}}</td>--}}
{{--                                                <td class="text-center" >hhh</td>--}}
{{--                                            </tr>--}}
{{--                                        @empty--}}
{{--                                            <tr>--}}
{{--                                                <td>no etudiants</td>--}}
{{--                                            </tr>--}}
{{--                                        @endforelse--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            @else--}}
{{--                <div class="d-flex align-items-center justify-content-center h-100" >--}}
{{--                    <img src="{{asset("assets/img/avatars/Mar-Business_2-removebg-preview.png")}}" class="h-50 border rounded-3" >--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

@section( "scripts" )
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const filiereSelect = document.getElementById('filiere');
            const semestreSelect = document.getElementById('semestre');
            semestreSelect.disabled = true;

            filiereSelect.addEventListener('change', function () {
                const selectedFiliereId = filiereSelect.value;
                const selectedFiliereOption = filiereSelect.options[filiereSelect.selectedIndex];
                const selectedFiliereType = selectedFiliereOption.getAttribute('data-type');
                semestreSelect.innerHTML = ''; // Clear previous options

                if (selectedFiliereType === 'dut') {
                    semestreSelect.disabled = false;

                    for (let i = 1; i <= 4; i++) {
                        const option = document.createElement('option');
                        option.value = 'Semestre ' + i;
                        option.textContent = 'Semestre ' + i;
                        semestreSelect.appendChild(option);
                    }
                } else if (selectedFiliereType === 'lp') {
                    semestreSelect.disabled = false;

                    for (let i = 5; i <= 6; i++) {
                        const option = document.createElement('option');
                        option.value = 'Semestre ' + i;
                        option.textContent = 'Semestre ' + i;
                        semestreSelect.appendChild(option);
                    }
                }
            });
        });

    </script>
@endsection


