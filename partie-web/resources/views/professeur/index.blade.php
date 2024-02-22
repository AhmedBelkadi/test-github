@extends("layouts.professeur_layout")

@section( "dashboard-active" , "active" )

@section("main")

    @if(session()->has("failed"))<x-alert :message="session('failed')" type="danger" />@endif
    @if(session()->has("success"))<x-alert :message="session('success')" type="success" />@endif

<div class="row vw-100 bg-black" >


    <div class="col-4 bg-primary vh-100 " >
        <div class="row h-100 py-5 px-3" >
            <div class="col-12 h-25 " >
                <div class="d-flex align-items-center justify-content-center h-100" >

                <img src="{{asset("assets/img/avatars/wqwq-removebg-preview.png")}}" class="h-100 border rounded-3" >
                </div>
            </div>
            <div class="col-12 h-75  py-5" >
{{--                @if(session('success'))<x-alert :message="session('success')" type="success" />@endif--}}


                <form method="post" class="row mx-0  h-100" >
                    @csrf
                    <div class="col-12" >
                        <div class="row g-2">
                            <div class="col px-0  mb-0">
                                <div class=" px-0 mb-3">
                                    <label for="filiere" class="form-label">Filiere</label>
                                    <select name="id_filiere" id="filiere" class="form-select-lg form-select">
                                            <option value="" selected disabled>Select Filiere</option>
                                            @foreach($filieres as $filiere)
                                                <option data-type="{{ $filiere->type }}" value="{{ $filiere->id }}" >{{ $filiere->name }}</option>
                                            @endforeach
                                    </select>
                                    @error("id_filiere")<span class="text-danger" >{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" >
                        <div class="row g-2">
                            <div class="col px-0  mb-0">
                                <div class=" px-0 mb-3">
                                    <label for="emailBasic" class="form-label">Semestre</label>
                                    <select name="name_semestre" id="semestre" class="form-select-lg form-select">
                                        <option value="" selected disabled>Select Semestre</option>
                                    </select>
                                    @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12" >
                        <div class="row g-2">
                            <div class="col px-0  mb-0">
                                <div class=" px-0 mb-3">
                                    <label for="element" class="form-label">Element</label>
                                    <select name="id_element" id="element" class="form-select-lg form-select">
                                        <option value="" selected disabled>Select Element</option>
                                        @foreach($elements as $element)
                                            <option value="{{ $element->id }}" >{{ $element->name }}</option>
                                        @endforeach
                                    </select>
                                    @error("id_element")<span class="text-danger" >{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" >
                        <div class="row" >
                            <div class="col-6" >
                                <div class="row g-2">
                                    <div class="col px-0  mb-0">
                                        <div class=" px-0 mb-3">
                                            <label for="largeSelect" class="form-label">Type</label>
                                            <select name="type" id="largeSelect" class="form-select-lg form-select">
                                                <option selected disabled >select type</option>
                                                <option value="tp" {{ old('type') == 'tp' ? 'selected' : '' }} >Traveaux Pratique</option>
                                                <option value="cour" {{ old('type') == 'cour' ? 'selected' : '' }} >Cour</option>
                                            </select>
                                            @error("type")<span class="text-danger" >{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" >
                                <div class="row g-2">
                                    <div class="col px-0  mb-0">
                                        <div class=" px-0 mb-3">
                                            <label for="periode" class="form-label">Periode</label>
                                            <select name="id_periode" id="periode" class="form-select-lg form-select">
                                                <option value="" selected disabled>Select Periode</option>
                                                @foreach($periodes as $periode)
                                                    <option value="{{ $periode->id }}" >{{ $periode->libelle }}</option>
                                                @endforeach
                                            </select>
                                            @error("id_periode")<span class="text-danger" >{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" >
                        <div class="row" >

                            <div class="col-12 " >
                                <div class="row g-2">
                                    <div class="col px-0  mb-0">
                                        <div class=" px-0 mb-3">
                                            <label for="nameBasic" class="form-label">Date</label>
                                            <input type="date" value="{{old("date")}}" name="date" id="nameBasic" class="form-control form-control-lg"  />
                                            @error("date")<span class="text-danger" >{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" >
                        <div class="row" >
                            <div class="col-6  " >
                                <button type="submit" formaction="{{route("etudiants.chercherEtdsParFiliere")}}" class="btn-lg btn-white w-100 ">list of etudiant</button>
                            </div>
                            <div class="col-6 " >
                                <button type="submit" formaction="{{route("etudiants.codeQrParSeance")}}" class="btn-lg btn-danger w-100 ">Code Qr</button>
                            </div>
                        </div>
                    </div>




{{--                    <div class="col-11 ps-0  " >--}}
{{--                        <div class="row" >--}}
{{--                            <div class="col-6" >--}}
{{--                                <div class="row g-2">--}}
{{--                                    <div class="col px-0 mb-0">--}}
{{--                                        <div class=" px-0 mb-3">--}}
{{--                    <label for="emailBasic" class="form-label">Filiere</label>--}}{{----}}
{{--<select name="id_filiere" id="filiere" class="form-select-lg form-select">--}}
{{--                                                <option value="" selected disabled>Select Filiere</option>--}}
{{--                                                --}}{{--                                        @foreach($filieres as $filiere)--}}
{{--                                                --}}{{--                                            <option data-type="{{ $filiere->type }}" value="{{ $filiere->id }}" >{{ $filiere->name }}</option>--}}
{{--                                                --}}{{--                                        @endforeach--}}
{{--                                            </select>--}}
{{--                                            --}}{{--                                    @error("id_filiere")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-3" >--}}
{{--                                <div class="row g-2">--}}
{{--                                    <div class="col px-0  mb-0">--}}
{{--                                        <div class=" px-0 mb-3">--}}
{{--                                            <select name="name_semestre" id="semestre" class="form-select form-select">--}}
{{--                                                <option value="" selected disabled>Select Semestre</option>--}}
{{--                                            </select>--}}
{{--                                            --}}{{--                                    @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-3" >--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col mb-3">--}}
{{--                                        <input type="date" value="{{old("date")}}" name="date" id="nameBasic" class="form-control"  />--}}
{{--                                        --}}{{--                                @error("date")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row" >--}}
{{--                            <div class="col-6" >--}}
{{--                                <div class="row g-2">--}}
{{--                                    <div class="col mb-0">--}}
{{--                                        <div class=" mt-2 mb-0">--}}
{{--                                            <select name="id_element" id="id_element" class="form-select form-select">--}}
{{--                                                <option value="">Select Element</option>--}}
{{--                                                --}}{{--                                        @foreach($elements as $element)--}}
{{--                                                --}}{{--                                            <option value="{{ $element->id }}" {{ old('id_element') == $element->id ? 'selected' : '' }}>--}}
{{--                                                --}}{{--                                                {{ $element->name }}--}}
{{--                                                --}}{{--                                            </option>--}}
{{--                                                --}}{{--                                        @endforeach--}}
{{--                                            </select>--}}
{{--                                            --}}{{--                                    @error('id_element')<span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-6" >--}}
{{--                                <div class="row g-2">--}}
{{--                                    <div class="col mb-0">--}}
{{--                                        <div class=" mt-2 mb-0">--}}
{{--                                            <select name="id_periode" id="id_periode" class="form-select form-select">--}}
{{--                                                <option value="">Select Periode</option>--}}
{{--                                                --}}{{--                                        @foreach($periodes as $periode)--}}
{{--                                                --}}{{--                                            <option value="{{ $periode->id }}" {{ old('id_periode') == $periode->id ? 'selected' : '' }}>--}}
{{--                                                --}}{{--                                                {{ $periode->libelle }}--}}
{{--                                                --}}{{--                                            </option>--}}
{{--                                                --}}{{--                                        @endforeach--}}
{{--                                            </select>--}}
{{--                                            --}}{{--                                    @error('id_periode')<span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-1 ps-1 pe-0  " >--}}
{{--                        <button type="submit" class="btn btn-primary h-100  pe-3 ">Rechercher</button>--}}
{{--                    </div>--}}
                </form>
            </div>
        </div>
    </div>
    <div class="col-8 bg-white vh-100 " >
        @if(isset($etudiants))
            <div class="mt-3 card">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center" >Name</th>
                            <th class="text-center" >CIN</th>
                            <th class="text-center" >Apogee</th>
                            <th  class="text-center" >CNE</th>
                            <th  class="text-center"  >Absence</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @forelse($etudiants as $etudiant )
                            <tr>
                                <td class="text-center" >{{$etudiant->user->name}}</td>
                                <td class="text-center" >{{$etudiant->user->cin}}</td>
                                <td class="text-center" >{{$etudiant->apogee}}</td>
                                <td class="text-center" >{{$etudiant->cne}}</td>
                                <td class="text-center" >hhh</td>
                            </tr>
                            @empty
                            <tr>
                                <td>no etudiants</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        @else
            <div class="d-flex align-items-center justify-content-center h-100" >
                <img src="{{asset("assets/img/avatars/Mar-Business_2-removebg-preview.png")}}" class="h-50 border rounded-3" >
            </div>
        @endif
    </div>


</div>

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
