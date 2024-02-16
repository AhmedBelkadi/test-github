    @extends("layouts.index")

    @section( "emplois-active" , "active" )


    @section("main")



        <div class="row " >
                    <p class="col-3 fs-3 text-primary  text-center" >Emploi du Temps</p>
{{--            <div class="col-3" >--}}
{{--            </div>--}}

            <div class="col-6  pe-4" >
                <form method="post"  class="row " action="{{route("emplois.chercher")}}" >
                    @csrf
                    <div class="col-5 ">
                        <select name="id_filiere" id="largeSelect" class="form-select form-select-lg">
                            <option selected >select filiere</option>
                            @foreach( $filieres as $filiere )
                                <option value="{{$filiere->id}}" {{ old('id_filiere') == $filiere->id ? 'selected' : '' }} >{{$filiere->name}}</option>
                            @endforeach
                        </select>
                    @error('id_filiere')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>


                    <div class=" col-4">
                        <select name="id_semestre" id="largeSelect" class="form-select form-select-lg">
                            <option selected >select semestre</option>
                            @foreach( $semestres as $semestre )
                                <option value="{{$semestre->id}}" {{ old('id_semestre') == $semestre->id ? 'selected' : '' }} >{{$semestre->name}}</option>
                            @endforeach
                        </select>
                    @error('id_semestre')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button type="submit" class=" btn btn-lg btn-primary col-3">Rechercher</button>
                    {{--                   <div class=" ">--}}
                    {{--                   </div>--}}
                </form>
            </div>

                <div class="col-3 " >
                    <div class="row" >
                        <button type="button" class="btn btn-lg btn-primary   col-5 me-2" data-bs-toggle="modal" data-bs-target="#periodesModal">Periodes</button>
                        <button type="button" class="btn btn-lg btn-primary col-5"    data-bs-toggle="modal" data-bs-target="#sallesModal">Salles</button>
                    </div>
                </div>


{{--            <div class="ms-2" >--}}
{{--            </div>--}}
        </div>

{{--        @if(isset($emplois))--}}
                                    @foreach( $emploises as $emplois )
                                        <div class="row  mt-4 bg-success d-flex justify-content-center align-items-center" >
                                            <div class="col-2" >

                                            </div>
                                            @foreach( $emplois->seances as $seance )
                                                <div class="col-2" >
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <p class="card-text">{{$seance->periode->libelle}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="row bg-success d-flex justify-content-center align-items-center" >
                                            <div class="col-2" >
                                                @foreach( $days as $day )
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <p class="card-text">{{$day}}</p>
                                                            <p class="card-text">{{$day}}</p>
                                                            <p class="card-text">{{$day}}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
{{--                                            @for( $j=0;$j<count($emplois->seances);$j++ )--}}
                                            @foreach( $emplois->seances as $seance )
                                                <div class="col-2" >
                                                    @for( $i=0;$i<count($days);$i++ )
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <p class="card-text">element</p>
                                                                <p class="card-text">professeur</p>
                                                                <p class="card-text">salle</p>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            @endforeach
{{--                                            @endfor--}}
                                        </div>

                                    @endforeach
                                    {{$emploises->links()}}

{{--        @endif--}}

{{--<div class="row" >--}}
{{--    @foreach($periodes as $periode )--}}
{{--        <p class="col-3 text-primary" >{{$periode->libelle}}</p>--}}
{{--    @endforeach--}}
{{--</div>--}}
{{--<div class="row" ></div>--}}
{{--<div class="row" ></div>--}}
{{--<div class="row" ></div>--}}
{{--<div class="row" ></div>--}}









{{--        <div class="container">--}}
{{--            <h2 class="mt-4 mb-4 "> @if(isset($emplois)) {{$emplois->filiere->name}} @endif </h2>--}}
{{--            <table class="table table-bordered">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th></th>--}}
{{--                    <th>08:00 - 10:00</th>--}}
{{--                    <th>10:30 - 12:00</th>--}}
{{--                    <th>14:00 - 16:00</th>--}}
{{--                    <th>16:30 - 18:00</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                <tr>--}}
{{--                    <td>Monday</td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>Tuesday</td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>Wednesday</td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>Thursday</td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <td>Friday</td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                    <td><button type="button" class="btn btn-primary add-session" data-toggle="modal" data-target="#exampleModal">+</button></td>--}}
{{--                </tr>--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}







        @php $openModal = request()->query('openModal'); @endphp

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
                                <input type="text" name="name"
                                       id="nameBasic" class="form-control"
                                       placeholder="Enter Name"
                                       value="{{ isset($salle) ? $salle->name : old("name") }}"
                                />
                                @error("name")
                                <span class="text-danger" >{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="ms-2 btn {{ isset($salle) ? "btn-success" : "btn-primary" }}">{{ isset($salle) ? "Update" : "Add" }}</button>
                    </div>
                 </form>

                <label for="nameBasic" class="form-label mt-3">salles</label>
                @foreach( $salles as $salle )

                  <div class="d-flex justify-content-center mb-2" >
                    <div style="width: 50%;height: 52px" class="bg-white border border-2 rounded-2 d-flex align-items-center ps-2 me-2" >
                        {{$salle->name}}
                    </div>

                        <a  href="{{route("salles.edit",[ 'salle'=>$salle , 'openModal' => true])}}" class="btn btn-primary text-white  btn-lg" >update</a>
                    <form method="POST" class="" action="{{route("salles.destroy",$salle)}}" >
                        @csrf
                        @method("DELETE")
                        <button type="submit" class=" ms-2 btn btn-danger btn-lg">delete</button>
                    </form>

                </div>

                @endforeach
            </div>
        </x-crud-modal>


        @php $openModal = request()->query('openModal2'); @endphp

        <x-crud-modal stl="fade" idModal="periodesModal" >
            <div>
                <form method="post" action="{{ isset($periode) ? route("periodes.update", $periode) : route("periodes.store") }}" class="">
                    @csrf
                    @if(isset($periode))  @method("PUT")  @endif
                    <label for="nameBasic" class="form-label">nom</label>
                    <div class="  d-flex justify-content-between align-items-center" >

                        <div class="row w-100">
                            <div class="col ">
                                <input type="text" name="libelle"
                                       id="libelleBasic" class="form-control"
                                       placeholder="Enter Name"
                                       value="{{ isset($periode) ? $periode->libelle : old("libelle") }}"
                                />
                                @error("libelle") <span class="text-danger" >{{$message}}</span> @enderror
                            </div>
                        </div>
                        <button type="submit" class="ms-2 btn {{ isset($periode) ? "btn-success" : "btn-primary" }}">{{ isset($periode) ? "modifier" : "ajouter" }}</button>
                    </div>
                </form>

                <label for="nameBasic" class="form-label mt-3">periodes</label>
                @foreach( $periodes as $periode )

                    <div class="d-flex justify-content-center mb-2" >
                        <div style="width: 50%;height: 52px" class="bg-white border border-2 rounded-2 d-flex align-items-center ps-2 me-2" >
                            {{$periode->libelle}}
                        </div>


                        <a  href="{{route("periodes.edit",[ 'periode'=>$periode , 'openModal2' => true])}}" class="btn btn-primary text-white  btn-lg" >modifier</a>

                            <form method="POST" class="" action="{{route("periodes.destroy",$periode)}}" >
                                @csrf
                                @method("DELETE")
                                <button type="submit" class=" ms-2 btn btn-danger btn-lg">delete</button>
                            </form>

                    </div>

                @endforeach
            </div>
        </x-crud-modal>

    @endsection












    @section( "scripts" )
        <script>
            // Open the modal if the 'openModal' parameter is set in the URL
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
