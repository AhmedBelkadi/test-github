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
                            <select name="id_filiere" id="largeSelect" class="form-select form-select-lg">
                                @foreach( $filieres as $filiere )
                                    <option value="{{$filiere->id}}" {{ old('id_filiere') == $filiere->id || isset($emplois) ? 'selected' : '' }} >{{$filiere->name}}</option>
                                @endforeach
                            </select>
                             @error('id_filiere')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class=" col-4">
                            <select name="id_semestre" id="largeSelect" class="form-select form-select-lg">
                            @foreach( $semestres as $semestre )
                                    <option value="{{$semestre->id}}" {{ old('id_semestre') == $semestre->id || isset($emplois) ? 'selected' : '' }} >{{$semestre->name}}</option>
                                @endforeach
                            </select>
                        @error('id_semestre')<span class="text-danger">{{ $message }}</span>@enderror
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

            @if( isset($emplois) )

                <h2 class="mt-4 mb-4">{{ $emplois->filiere->name }} - {{ $emplois->semestre->name }}</h2>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        @foreach ($periodes as $periode)
                            <th>{{ $periode->libelle }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($days as $day)
                        <tr class="" >
                            <td class=" " >{{ $day }}</td>
                            @foreach ($periodes as $periode)
                                <td class=" " >
                                    {{--                                    @if (isset($schedule[$emplois->filiere->name][$emplois->semestre->name][$day][$periode->id]))--}}
                                    @if (isset($schedule[$emplois->filiere->name][$emplois->semestre->name][$day][$periode->id]) && count($schedule[$emplois->filiere->name][$emplois->semestre->name][$day][$periode->id]) > 0)
                                        @foreach ($schedule[$emplois->filiere->name][$emplois->semestre->name][$day][$periode->id] as $seance)
                                            @foreach($seance->element->professeurs as $prof)
                                                professeurs:   {{$prof->user->name}} /
                                            @endforeach
                                            <br>type:   {{ $seance->type }}<br>
                                            salle:  {{ $seance->salle->name }}<br>
                                            element:  {{ $seance->element->name }}<br>

                                        @endforeach
                                    @else
                                        <button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="container">
                    @foreach ($emploises as $emploi)
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
                                            {{--                                    @if (isset($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id]))--}}
                                            @if (isset($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id]) && count($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id]) > 0)
                                                @foreach ($schedule[$emploi->filiere->name][$emploi->semestre->name][$day][$periode->id] as $seance)
                                                    @foreach($seance->element->professeurs as $prof)
                                                        professeurs:   {{$prof->user->name}} /
                                                    @endforeach
                                                    <br>type:   {{ $seance->type }}<br>
                                                    salle:  {{ $seance->salle->name }}<br>
                                                    element:  {{ $seance->element->name }}<br>

                                                @endforeach
                                            @else
                                                <button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endforeach
                    {{ $emploises->links() }}
                </div>
            @endif

            @php $openModal = request()->query('openModal');   @endphp

            <x-crud-modal stl="fade" idModal="sallesModal" >
                <div>
                    <form method="post" action="{{ isset($salle) ? route("salles.update", $salle) : route("salles.store") }}" class="">
                        @csrf
                        @if(isset($salle))
                            @method("PUT")
                        @endif
                        <label for="nameBasic" class="form-label">nom</label>
                        <div class="  d-flex justify-content-between align-items-center" >
                            <div class="row w-100">
                                <div class="col ">
                                    <input type="text" name="name" id="nameBasic" class="form-control" placeholder="Enter Name" value="{{ isset($salle) ? $salle->name : old("name") }}"/>
                                    @error("name")<span class="text-danger" >{{$message}}</span>@enderror
                                </div>
                            </div>
                            <button type="submit" class="ms-2 btn {{ isset($salle) ? "btn-success" : "btn-primary" }}">{{ isset($salle) ? "modifier" : "ajouter" }}</button>
                        </div>
                     </form>
                    <label for="nameBasic" class="form-label mt-3">salles</label>
                    @foreach( $salles as $salle )
                      <div class="d-flex justify-content-center mb-2" >
                        <div style="width: 50%;height: 52px" class="bg-white border border-2 rounded-2 d-flex align-items-center ps-2 me-2" >
                            {{$salle->name}}
                        </div>
                        <a  href="{{route("salles.edit",[ 'salle'=>$salle , 'openModal' => true])}}" class="btn btn-primary text-white  btn-lg" >modifier</a>
                        <form method="POST" class="" action="{{route("salles.destroy",$salle)}}" >
                            @csrf
                            @method("DELETE")
                            <button type="submit" class=" ms-2 btn btn-danger btn-lg">supprimer</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </x-crud-modal>

            @php $openModal2 = request()->query('openModal2'); @endphp

            <x-crud-modal stl="fade" idModal="periodesModal" >
                <div>
                    <form method="post" action="{{ isset($p) ? route("periodes.update", $p) : route("periodes.store") }}" class="">
                        @csrf
                        @if(isset($p))  @method("PUT")  @endif
                        <label for="nameBasic" class="form-label">nom</label>
                        <div class="  d-flex justify-content-between align-items-center" >
                            <div class="row w-100">
                                <div class="col ">
                                    <input type="text" name="libelle" id="libelleBasic" class="form-control" placeholder="Enter Name" value="{{ isset($p) ? $p->libelle : old("libelle") }}"/>
                                    @error("libelle") <span class="text-danger" >{{$message}}</span> @enderror
                                </div>
                            </div>
                            <button type="submit" class="ms-2 btn {{ isset($p) ? "btn-success" : "btn-primary" }}">{{ isset($p) ? "modifier" : "ajouter" }}</button>
                        </div>
                    </form>
                    <label for="nameBasic" class="form-label mt-3">periodes</label>
                    @foreach( $periodes as $p )
                        <div class="d-flex justify-content-center mb-2" >
                            <div style="width: 50%;height: 52px" class="bg-white border border-2 rounded-2 d-flex align-items-center ps-2 me-2" >
                                {{$p->libelle}}
                            </div>
                            <a  href="{{route("periodes.edit",[ 'periode'=>$p , 'openModal2' => true])}}" class="btn btn-primary text-white  btn-lg" >modifier</a>
                                <form method="POST" class="" action="{{route("periodes.destroy",$p)}}" >
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class=" ms-2 btn btn-danger btn-lg">supprimer</button>
                                </form>
                        </div>
                    @endforeach
                </div>
            </x-crud-modal>
    @endsection

    @section( "scripts" )
        <script>
            window.addEventListener('load', function() {
                let urlParams = new URLSearchParams(window.location.search);
                let openModal = urlParams.get('openModal');
                let openModal2 = urlParams.get('openModal2');
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
            });
        </script>
    @endsection
