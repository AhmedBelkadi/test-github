@extends("layouts.index")

@section("absences-active", "active")

@section("main")
<div class="container-xxl container">
    <div class="row mt-2">
        <div class="col p-0">
            <div class="">
                @if(\Illuminate\Support\Facades\Auth::user()->role === "admin")
                    <form method="post" class="row mx-0 mb-4" action="{{route("absences.chercher")}}">
                    @csrf
                    <div class="col-11 ps-0">
                        <div class="row">
                            <div class="col-6">
                                <div class="row g-2">
                                    <div class="col px-0 mb-0">
                                        <div class="px-0 mb-3">
                                            <select name="id_filiere" id="filiere" class="form-select form-select-lg">
                                                <option value="" selected disabled>Select Filiere</option>
                                                @foreach($filieres as $filiere)
                                                <option data-type="{{ $filiere->type }}" value="{{ $filiere->id }}">{{ $filiere->name }}</option>
                                                @endforeach
                                            </select>
                                            @error("id_filiere")<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row g-2">
                                    <div class="col px-0 mb-0">
                                        <div class="px-0 mb-3">
                                            <select name="name_semestre" id="semestre" class="form-select-lg form-select">
                                                <option value="" selected disabled>Select Semestre</option>
                                            </select>
                                            @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col mb-3">
                                        <input type="date" value="{{old("date")}}" name="date" id="nameBasic" class="form-control form-control-lg" />
                                        @error("date")<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <div class="  mb-0">
                                            <select name="id_element" id="id_element" class="form-select form-select-lg">
                                                <option value="">Select Element</option>
                                                @foreach($elements as $element)
                                                <option value="{{ $element->id }}" {{ old('id_element') == $element->id ? 'selected' : '' }}>
                                                    {{ $element->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_element')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <div class="  mb-0">
                                            <select name="id_periode" id="id_periode" class="form-select form-select-lg">
                                                <option value="">Select Periode</option>
                                                @foreach($periodes as $periode)
                                                <option value="{{ $periode->id }}" {{ old('id_periode') == $periode->id ? 'selected' : '' }}>
                                                    {{ $periode->libelle }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_periode')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <div class="  mb-0">
                                            <select name="etat" id="etat" class="form-select form-select-lg">
                                                <option value="" disabled>Select Etat</option>
                                                    <option value="en_revue">En revue</option>
                                                    <option value="non justifier">Non justifier</option>
                                                    <option value="justifier">Justifier</option>
                                            </select>
                                            @error('etat')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-1 ps-1 pe-0">
                        <button type="submit" class="btn btn-primary h-100 pe-3 w-100"><i class='bx bx-search-alt bx-lg'></i></button>
                    </div>
                </form>
                @elseif(\Illuminate\Support\Facades\Auth::user()->role === "professeur")
                    <form method="post" class="row mx-0 mb-4 " action="{{route("absences.chercher")}}">
                        @csrf
                        <div class="col-11 ps-0">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <div class="  mb-0">
                                                <select name="id_element" id="id_element" class="form-select form-select-lg">
                                                    <option value="">Select Element</option>
                                                    @foreach( \Illuminate\Support\Facades\Auth::user()->professeur->elements  as $element)
                                                        <option value="{{ $element->id }}" {{ old('id_element') == $element->id ? 'selected' : '' }}>
                                                            {{ $element->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('id_element')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <div class="mb-0">
                                                <select name="id_periode" id="id_periode" class="form-select form-select-lg">
                                                    <option value="">Select Periode</option>
                                                    @foreach($periodes as $periode)
                                                        <option value="{{ $periode->id }}" {{ old('id_periode') == $periode->id ? 'selected' : '' }}>
                                                            {{ $periode->libelle }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('id_periode')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col mt-3">
                                            <input type="date" value="{{old("date")}}" name="date" id="nameBasic" class="form-control form-control-lg" />
                                            @error("date")<span class="text-danger">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row g-2">
                                        <div class="col mt-4">
                                            <div class="  mb-0">
                                                <select name="etat" id="etat" class="form-select form-select-lg">
                                                    <option value="" disabled>Select Etat</option>
                                                    <option value="en_revue">En revue</option>
                                                    <option value="non justifier">Non justifier</option>
                                                    <option value="justifier">Justifier</option>
                                                </select>
                                                @error('etat')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-1 ps-1 pe-0">
                            <button type="submit" class="btn btn-primary h-100 pe-3 w-100"><i class='bx bx-search-alt bx-lg'></i></button>
                        </div>
                    </form>
                @endif

                <form method="post" class="row mb-3  mx-0 px-0" action="{{ route('absences.searchByStudent') }}">
                    @csrf
                    <div class="row px-0">
                        <div class="col-11">
                            <input type="text" value="{{old("query")}}" name="query" id="nameBasic" class="form-control form-control-lg" placeholder="Rechercher par CIN ou CNE" />
                        </div>
                        <div class="col-1 pe-0   mx-0"  >
                            <button class="btn btn-primary btn-lg w-100 " type="submit"><i class='bx bx-search-alt'></i></button>
                        </div>
                    </div>
                    @error("query")<span class="text-danger">{{$message}}</span>@enderror
                </form>

                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Cne</th>
                                    <th class="text-center">Etudiant</th>
                                    <th class="text-center">Element</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Periode</th>
                                    <th class="text-center">Type seance</th>
                                    <th class="text-center">Etat</th>
                                    @if(\Illuminate\Support\Facades\Auth::user()->role === "admin")
                                    <th class="text-center">Filiere</th>
                                    <th class="text-center">Par mr (mme)</th>
                                        <th class="text-center">Justification</th>
                                        <th class="text-center"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse($absences as $absence )
                                <tr>
                                    <td class="text-center">{{$absence->etudiant->cne}}</td>
                                    <td class="text-center">{{$absence->etudiant->user->name}}</td>
                                    <td class="text-center">{{$absence->seance->element->name}}</td>
                                    <td class="text-center">{{$absence->date}}</td>
                                    <td class="text-center">{{$absence->seance->periode->libelle}}</td>
                                    <td class="text-center">{{$absence->seance->type}}</td>
                                    <td class="text-center">{{$absence->etat}}</td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->role === "admin")
                                        <td class="text-center">{{$absence->seance->element->module->filiere->name}}</td>
                                        <td class="text-center">{{ implode(" / ", $absence->seance->element->professeurs->pluck('user.name')->toArray()) }}</td>
                                            <td class="text-center">

                                                @forelse( $absence->justifications as $j )
                                                <a class="link-opacity-100" href="{{asset('storage/'.$j->libele)}}">voir</a>
                                                @empty
                                                    no justifications
                                                @endforelse
                                            </td>
                                            <td class="text-center d-flex">

                                                <form action="{{ route('absences.update', $absence->id) }}" method="POST">
                                                    @csrf
                                                    @method("put")
                                                    <input type="hidden" name="etat" value="justifier">
                                                    <button type="submit" class="btn btn-success me-1">
                                                        <i class='bx bx-check'></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('absences.update', $absence->id) }}" method="POST">
                                                    @csrf
                                                    @method("put")
                                                    <input type="hidden" name="etat" value="non justifier">
                                                    <button type="submit" class="btn btn-danger me-1"><i class='bx bx-x'></i></button>
                                                </form>

                                            </td>
                                    @endif
                                @empty
                                <td class="text-center" >no absences found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{-- {{$absences->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("scripts")
<script>
    window.addEventListener('load', function() {
        let urlParams = new URLSearchParams(window.location.search);
        let openModal = urlParams.get('openModal');
        if (openModal) {
            let modal = document.getElementById('elementtModal');
            let bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const filiereSelect = document.getElementById('filiere');
        const semestreSelect = document.getElementById('semestre');
        semestreSelect.disabled = true;

        filiereSelect.addEventListener('change', function() {
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
