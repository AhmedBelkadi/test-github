    @extends("layouts.index")

    @section( "emplois-active" , "active" )


    @section("main")


        <div class=" d-flex justify-content-around align-items-center" >
               <form method="post"  class=" d-flex  justify-content-between align-items-center  w-75" >
                   @csrf
                <p class="fs-3 text-primary " >Emploi du Temps</p>
                   <div class=" mt-2 mb-3">
                       <select id="largeSelect" class="form-select form-select-lg">
                           <option selected >select filiere</option>
                           @foreach( $filieres as $filiere )
                               <option value="{{$filiere->id}}">{{$filiere->name}}</option>
                           @endforeach
                       </select>               </div>
                   <div class=" mt-2 mb-3">
                       <select id="largeSelect" class="form-select form-select-lg">
                           <option selected >select semestre</option>
                            @foreach( $semestres as $semestre )
                               <option value="{{$semestre->id}}">{{$semestre->name}}</option>
                           @endforeach
                       </select>
                   </div>
                   <div class=" mt-2 mb-3">
                       <button type="button" class=" btn btn-lg btn-primary">Rechercher</button>
                   </div>
               </form>


            <div class="ms-2 " >
                <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#periodesModal">Periodes</button>
                <button type="button" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#sallesModal">Salles</button>
            </div>
        </div>

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
