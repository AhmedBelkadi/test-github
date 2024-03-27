@extends("layouts.index")

@section("emplois-active", "active")

@section("main")
<div class="row">
    <div class="col-3">
        <p class="fs-3 text-primary text-center">Emploi du Temps</p>
    </div>

    <div class="col-6">
        <form method="post" class="row" action="{{route("emplois.chercher")}}">
            @csrf
            <div class="col-5">
                <select name="id_filiere" id="filiere" class="form-select form-select-lg">
                    <option value="" selected disabled>Select Filiere</option>
                    @foreach($filieres as $filiere)
                    <option value="{{ $filiere->id }}" data-type="{{ $filiere->type .$filiere->promotion }}">{{ $filiere->name }}</option>
                    @endforeach
                </select>
                @error('id_filiere')<span class="text-danger">{{ $message }}</span>@enderror

            </div>
            <div class="col-4">
                <select name="name_semestre" id="semestre" class="form-select form-select-lg">
                    <option value="" selected disabled>Select Semestre</option>
                </select>
                @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-lg btn-primary col-3"> <i class=' pe-1 bx bx-search-alt '></i>Rechercher     </button>
        </form>
    </div>

    <div class="col-3 ">
{{--        <div class="row">--}}
            <div class="d-flex gap-1    ">
                <button type="button" class="btn btn-lg btn-primary me-2" data-bs-toggle="modal" data-bs-target="#periodesModal">
                    <i class='pe-1 bx bx-time-five'></i>
                    Periodes
                </button>
                <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#sallesModal">
                    <i class='pe-1 bx bx-buildings'></i>
                    Salles
                </button>
            </div>
{{--        </div>--}}
    </div>
</div>

@if(!isset($emploi))
<h1>no emplois now</h1>
@else
<h2 class="mt-4 mb-4 text-center">{{ $emploi->filiere->name }} - {{ $emploi->semestre->name }}</h2>
<style>
    .same-height-td {
        min-height: 50px; /* Adjust the value as needed */
    }
</style>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: {{ 100 / (count($periodes) + 1) }}%;">&nbsp;</th>
            @foreach ($periodes as $periode)
            <th style="width: {{ 100 / (count($periodes) + 1) }}%;" class="bg">
                <div class=" text-center px-1 py-2 w-100 border border-2 rounded-3" style="background-color: rgba(4, 37, 82, 0.2)" >
                    {{ $periode->libelle }}
                </div>
            </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($days as $day)
        <tr class="" >
            <td style="width: {{ 100 / (count($periodes) + 1) }}%;background-color: rgba(4, 37, 82, 0.2);"   class="  text-primary fa-bold  border border-2 rounded-3 text-center same-height-td ">
{{--                <span style="background-color: rgba(4, 37, 82, 0.2); padding-block: 23px;padding-inline: 30px" class="  " ></span>--}}
                {{ $day }}
            </td>
            @foreach ($periodes as $periode)
            <td style="width: {{ 100 / (count($periodes) + 1) }}%;" class="same-height-td position-relative">
                @if (isset($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id]) && count($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id]) > 0)
                @foreach ($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] as $seance)
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        @foreach ($seance->element->professeurs as $prof)
                        <div class="fw-bold"> {{ $seance->element->name }}<br></div>
                        <span class="text-danger">{{ $prof->user->name }}</span> /
                        @endforeach
                        <br>{{ $seance->type }}<br>
                        {{ $seance->salle->name }}<br>
                    </div>
                    <div class="dropdown position-absolute top-0 end-0">
                        <button class="btn" type="button" id="dropdownMenuButton_{{ $seance->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="menu-icon tf-icons bx bx-dots-vertical-rounded"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton_{{ $seance->id }}">
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#updateSeanceModal_{{ $seance->id }}">Update</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteSeanceModal_{{ $seance->id }}">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @include("admin.seances.edit")
                @include("admin.seances.delete")

                @endforeach
                @else
                <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-sm d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#addSeanceModal_{{ $day }}_{{ $periode->id }}">
                        <span class="fs-1">+</span>
                    </button>
                </div>
                @include("admin.seances.create")
                @endif
            </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>

@endif

@include("admin.salles.index")
@include("admin.periodes.index")
@endsection

@section("scripts")
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
                console.log(selectedFiliereType)
                if (selectedFiliereType === 'dutpremier annee') {
                    semestreSelect.disabled = false;

                    for (let i = 1; i <= 2; i++) {
                        const option = document.createElement('option');
                        option.value = 'Semestre ' + i;
                        option.textContent = 'Semestre ' + i;
                        semestreSelect.appendChild(option);
                    }
                } else if (selectedFiliereType === 'lppremier annee') {
                    semestreSelect.disabled = false;

                    for (let i = 5; i <= 6; i++) {
                        const option = document.createElement('option');
                        option.value = 'Semestre ' + i;
                        option.textContent = 'Semestre ' + i;
                        semestreSelect.appendChild(option);
                    }
                } else if (selectedFiliereType === 'dutdeuxieme annee') {
                    semestreSelect.disabled = false;

                    for (let i = 1; i <= 2; i++) {
                        const option = document.createElement('option');
                        option.value = 'Semestre ' + (i + 2);
                        option.textContent = 'Semestre ' + (i + 2);
                        semestreSelect.appendChild(option);
                    }
                }
            });
        });

        window.addEventListener('load', function() {
            let urlParams = new URLSearchParams(window.location.search);
            let openModal = urlParams.get('openModal');
            let openModal2 = urlParams.get('openModal2');
            let openModal3 = urlParams.get('openModal3');
            if (openModal) {
                let modal = document.getElementById('sallesModal');
                let bootstrapModal = new bootstrap.Modal(modal);
                bootstrapModal.show();
            }
            if (openModal2) {
                let modal = document.getElementById('periodesModal');
                let bootstrapModal = new bootstrap.Modal(modal);
                bootstrapModal.show();
            }
            @if(isset($emploi))
                if (openModal3) {
                    let modal = document.getElementById('addSeanceModal_{{ $day }}_{{ $periode->id }}');
                    let bootstrapModal = new bootstrap.Modal(modal);
                    bootstrapModal.show();
                }
            @endif
        });
    </script>
@endsection




    {{--            @if( isset($emplois) )--}}

    {{--                @include("admin.seances.create")--}}
    {{--                <h2 class="mt-4 mb-4">{{ $emplois->filiere->name }} - {{ $emplois->semestre->name }}</h2>--}}
    {{--                <table class="table table-bordered">--}}
    {{--                    <thead>--}}
    {{--                    <tr>--}}
    {{--                        <th></th>--}}
    {{--                        @foreach ($periodes as $periode)--}}
    {{--                            <th>{{ $periode->libelle }}</th>--}}
    {{--                        @endforeach--}}
    {{--                    </tr>--}}
    {{--                    </thead>--}}
    {{--                    <tbody>--}}
    {{--                    @foreach ($days as $day)--}}
    {{--                        <tr class="" >--}}
    {{--                            <td class=" " >{{ $day }}</td>--}}
    {{--                            @foreach ($periodes as $periode)--}}
    {{--                                <td class=" " >--}}
    {{--                                    --}}{{----}}{{--                                    @if (isset($schedule[$emplois->filiere->name][$emplois->semestre->name][$day][$periode->id]))--}}
    {{--                                    @if (isset($schedule[$emplois->filiere->name][$emplois->semestre->name][$day][$periode->id]) && count($schedule[$emplois->filiere->name][$emplois->semestre->name][$day][$periode->id]) > 0)--}}
    {{--                                        @foreach ($schedule[$emplois->filiere->name][$emplois->semestre->name][$day][$periode->id] as $seance)--}}
    {{--                                            @include("admin.seances.edit")--}}
    {{--                                            @include("admin.seances.delete")--}}
    {{--                                            @foreach($seance->element->professeurs as $prof)--}}
    {{--                                                professeurs:   {{$prof->user->name}} /--}}
    {{--                                            @endforeach--}}
    {{--                                            <br>type:   {{ $seance->type }}<br>--}}
    {{--                                            salle:  {{ $seance->salle->name }}<br>--}}
    {{--                                            element:  {{ $seance->element->name }}<br>--}}

    {{--                                        @endforeach--}}
    {{--                                    @else--}}
    {{--                                        <button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button>--}}
    {{--                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSeanceModal_{{ $day }}_{{ $periode->id }}">+</button>--}}
    {{--                                        @include("admin.seances.create2")--}}


    {{--                                    @endif--}}
    {{--                                </td>--}}
    {{--                            @endforeach--}}
    {{--                        </tr>--}}
    {{--                    @endforeach--}}
    {{--                    @foreach ($days as $day)--}}
    {{--                        <tr class="" >--}}
    {{--                            <td class=" w-px-75" >--}}
    {{--                                <div class="bg-primary text-white py-4 px-3 border border-2 rounded-3 text-center" >--}}
    {{--                                    {{ $day }}--}}
    {{--                                </div>--}}
    {{--                            </td>--}}
    {{--                            @foreach ($periodes as $periode)--}}
    {{--                                <td class=" " >--}}
    {{--                                    @if (isset($schedule[$emplois->filiere->name][$emplois->semestre->name][$day][$periode->id]) && count($schedule[$emplois->filiere->name][$emplois->semestre->name][$day][$periode->id]) > 0)--}}
    {{--                                        @foreach ($schedule[$emplois->filiere->name][$emplois->semestre->name][$day][$periode->id] as $seance)--}}
    {{--                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateSeanceModal_{{ $seance->id }}">Update</button>--}}
    {{--                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSeanceModal_{{ $seance->id }}">delete</button><br>--}}
    {{--                                            @include("admin.seances.edit")--}}
    {{--                                            @include("admin.seances.delete")--}}
    {{--                                            @foreach($seance->element->professeurs as $prof)--}}
    {{--                                                professeurs:   {{$prof->user->name}} /--}}
    {{--                                            @endforeach--}}
    {{--                                            <br>type:   {{ $seance->type }}<br>--}}
    {{--                                            salle:  {{ $seance->salle->name }}<br>--}}
    {{--                                            element:  {{ $seance->element->name }}<br>--}}
    {{--                                        @endforeach--}}
    {{--                                    @else--}}
    {{--                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSeanceModal_{{ $day }}_{{ $periode->id }}">+</button>--}}
    {{--                                        @include("admin.seances.create2")--}}
    {{--                                    @endif--}}
    {{--                                </td>--}}
    {{--                            @endforeach--}}
    {{--                        </tr>--}}
    {{--                    @endforeach--}}
    {{--                    </tbody>--}}
    {{--                </table>--}}
    {{--            @else--}}
    {{--                <div class="container">--}}
    {{--                    @foreach ($emploises as $emploi)--}}
    {{--                        <h2 class="mt-4 mb-4">{{ $emploi->filiere->name }} - {{ $emploi->semestre->name }}</h2>--}}
    {{--                        <table class="table table-bordered">--}}
    {{--                            <thead>--}}
    {{--                            <tr class="bg-danger " >--}}
    {{--                                <th></th>--}}
    {{--                                @foreach ($periodes as $periode)--}}
    {{--                                    <th class="bg-primary " >--}}
    {{--                                        <div class="bg-info text-center px-1 py-2 w-50 border border-2 rounded-3" >--}}
    {{--                                        {{ $periode->libelle }}--}}
    {{--                                        </div>--}}
    {{--                                    </th>--}}
    {{--                                @endforeach--}}
    {{--                            </tr>--}}
    {{--                            </thead>--}}
    {{--                            <tbody>--}}
    {{--                            @foreach ($days as $day)--}}
    {{--                                <tr class="" >--}}
    {{--                                    <td class=" w-px-75" >--}}
    {{--                                        <div class="bg-primary text-white py-4 px-3 border border-2 rounded-3 text-center" >--}}
    {{--                                        {{ $day }}--}}
    {{--                                        </div>--}}
    {{--                                    </td>--}}
    {{--                                    @foreach ($periodes as $periode)--}}
    {{--                                        <td class=" " >--}}
    {{--                                            @if (isset($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id]) && count($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id]) > 0)--}}
    {{--                                                @foreach ($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] as $seance)--}}
    {{--                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateSeanceModal_{{ $seance->id }}">Update</button>--}}
    {{--                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSeanceModal_{{ $seance->id }}">delete</button><br>--}}
    {{--                                                    @include("admin.seances.edit")--}}
    {{--                                                    @include("admin.seances.delete")--}}
    {{--                                                @foreach($seance->element->professeurs as $prof)--}}
    {{--                                                        professeurs:   {{$prof->user->name}} /--}}
    {{--                                                    @endforeach--}}
    {{--                                                    <br>type:   {{ $seance->type }}<br>--}}
    {{--                                                    salle:  {{ $seance->salle->name }}<br>--}}
    {{--                                                    element:  {{ $seance->element->name }}<br>--}}
    {{--                                                @endforeach--}}
    {{--                                            @else--}}
    {{--                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSeanceModal_{{ $day }}_{{ $periode->id }}">+</button>--}}
    {{--                                                @include("admin.seances.create")--}}
    {{--                                            @endif--}}
    {{--                                        </td>--}}
    {{--                                    @endforeach--}}
    {{--                                </tr>--}}
    {{--                            @endforeach--}}
    {{--                            </tbody>--}}
    {{--                        </table>--}}
    {{--                    @endforeach--}}
    {{--                    {{ $emploises->links() }}--}}
    {{--                </div>--}}
    {{--            @endif--}}
