    @extends("layouts.index")

    @section( "emplois-active" , "active" )

    @section("main")
            <div class="row " >
                <div class="col-3" >
                <p class=" fs-3 text-primary  text-center" >Emploi du Temps</p>
                </div>

                <div class="col-6 " >
                    <form method="post"  class="row " action="{{route("emplois.chercher")}}" >
                        @csrf
                        <div class="col-5 ">
                            <select name="id_filiere" id="filiere"  class="form-select form-select-lg" >
                                <option value="" selected disabled>Select Filiere</option>
                                @foreach($filieres as $filiere)
                                        <option value="{{ $filiere->id }}" data-type="{{ $filiere->type }}">{{ $filiere->name }}</option>
                                    @endforeach
                            </select>
                             @error('id_filiere')<span class="text-danger">{{ $message }}</span>@enderror

                        </div>
                        <div class=" col-4">
                            <select name="name_semestre" id="semestre" class="form-select form-select-lg">
                                <option value="" selected disabled>Select Semestre</option>
                            </select>
                        @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <button type="submit" class=" btn btn-lg btn-primary col-3">Rechercher</button>
                    </form>
                </div>
                    <div class="col-3  px-4" >
                        <div class="row " >
                            <button type="button" class="btn btn-lg btn-primary   col-5 me-2" data-bs-toggle="modal" data-bs-target="#periodesModal">Periodes</button>
                            <button type="button" class="btn btn-lg btn-primary col-5"    data-bs-toggle="modal" data-bs-target="#sallesModal">Salles</button>
                        </div>
                    </div>
            </div>

            <h2 class="mt-4 mb-4">{{ $emploi->filiere->name }} - {{ $emploi->semestre->name }}</h2>
            <table class="table table-bordered">
                <thead>
                <tr class="bg-danger " >
                    <th></th>
                    @foreach ($periodes as $periode)
                        <th class="bg-primary " >
                            <div class="bg-info text-center px-1 py-2 w-50 border border-2 rounded-3" >
                                {{ $periode->libelle }}
                            </div>
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach ($days as $day)
                    <tr class="" >
                        <td class=" w-px-75" >
                            <div class="bg-primary text-white py-4 px-3 border border-2 rounded-3 text-center" >
                                {{ $day }}
                            </div>
                        </td>
                        @foreach ($periodes as $periode)
                            <td class=" " >
                                @if (isset($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id]) && count($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id]) > 0)
                                    @foreach ($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] as $seance)
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateSeanceModal_{{ $seance->id }}">Update</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSeanceModal_{{ $seance->id }}">delete</button><br>
                                        @include("admin.seances.edit")
                                        @include("admin.seances.delete")
                                        @foreach($seance->element->professeurs as $prof)
                                            professeurs:   {{$prof->user->name}} /
                                        @endforeach
                                        <br>type:   {{ $seance->type }}<br>
                                        salle:  {{ $seance->salle->name }}<br>
                                        element:  {{ $seance->element->name }}<br>
                                    @endforeach
                                @else
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSeanceModal_{{ $day }}_{{ $periode->id }}">+</button>
                                    @include("admin.seances.create")
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>



           @include("admin.salles.index")
           @include("admin.periodes.index")


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
                if (openModal3) {
                    let modal = document.getElementById('addSeanceModal_{{ $day }}_{{ $periode->id }}');
                    let bootstrapModal = new bootstrap.Modal(modal);
                    bootstrapModal.show();
                }
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
