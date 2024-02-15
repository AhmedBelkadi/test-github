@extends("layouts.index")

@section( "absences-active" , "active" )


@section("main")
    <!-- Basic Bootstrap Table -->

    {{--    <a class="btn btn-primary" href="{{route("modules.store")}}">Ajouter </a>--}}
    <!-- Button trigger modal -->
    <div class="container-xxl  container">

{{--        @include('admin.elements.create')--}}



        <div class="row mt-2 " >
            <div class="col p-0" >
               <div class="" >
                   <form method="post" class="row mx-0 mb-4 " action="{{route("filieres.store")}}">
                       @csrf
                       {{--                    <div class="" >--}}
                       <div class="col-11 ps-0  " >
                           <div class="row" >
                               <div class="col-6" >
                                   <div class="row g-2">
                                       <div class="col px-0 mb-0">
                                           <div class=" px-0 mb-3">
                                               {{--                                       <label for="nameBasic" class="form-label">type</label>--}}
                                               <select name="type" id="largeSelect" class="form-select form-select">
                                                   <option selected >select type</option>
                                                   <option value="lp" {{ old('type') == 'lp' ? 'selected' : '' }} >licence professionnelle</option>
                                                   <option value="dut" {{ old('type') == 'dut' ? 'selected' : '' }} >Diplôme Universitaire de Technologie</option>
                                               </select>
                                               @error("type")<span class="text-danger" >{{$message}}</span>@enderror
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-3" >
                                   <div class="row g-2">
                                       <div class="col px-0  mb-0">
                                           <div class=" px-0 mb-3">
                                               {{--                                       <label for="nameBasic" class="form-label">Chef de filiere</label>--}}
                                               <select name="id_professeur" id="id_professeur" class="form-select form-select">
                                                   <option value="">Select Professeur</option>
                                                   {{--                                    @foreach($professeurs as $professeur)--}}
                                                   {{--                                        <option value="{{ $professeur->id }}" {{ old('id_professeur') == $professeur->id ? 'selected' : '' }}>--}}
                                                   {{--                                            {{ $professeur->user->name }}--}}
                                                   {{--                                        </option>--}}
                                                   {{--                                    @endforeach--}}
                                               </select>
                                               @error('id_professeur')
                                               <span class="text-danger">{{ $message }}</span>
                                               @enderror
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-3" >
                                   <div class="row">
                                       <div class="col mb-3">
                                           {{--                                   <label for="nameBasic" class="form-label">date</label>--}}
                                           <input type="date" value="{{old("name")}}" name="date" id="nameBasic" class="form-control"  />
                                           @error("date")<span class="text-danger" >{{$message}}</span>@enderror
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="row" >
                               <div class="col-6" >
                                   <div class="row g-2">
                                       <div class="col mb-0">
                                           <div class=" mt-2 mb-0">
                                               {{--                                       <label for="nameBasic" class="form-label">Departement</label>--}}
                                               <select name="id_departement" id="id_departement" class="form-select form-select">
                                                   <option value="">Select Departement</option>
                                                   {{--                                    @foreach($departements as $departement)--}}
                                                   {{--                                        <option value="{{ $departement->id }}" {{ old('id_departement') == $departement->id ? 'selected' : '' }}>--}}
                                                   {{--                                            {{ $departement->name }}--}}
                                                   {{--                                        </option>--}}
                                                   {{--                                    @endforeach--}}
                                               </select>
                                               @error('id_departement')
                                               <span class="text-danger">{{ $message }}</span>
                                               @enderror
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-3" >
                                   <div class="row g-2">
                                       <div class="col mb-0">
                                           <div class=" mt-2 mb-0">
                                               {{--                                       <label for="nameBasic" class="form-label">Departement</label>--}}
                                               <select name="id_departement" id="id_departement" class="form-select form-select">
                                                   <option value="">Select Departement</option>
                                                   {{--                                    @foreach($departements as $departement)--}}
                                                   {{--                                        <option value="{{ $departement->id }}" {{ old('id_departement') == $departement->id ? 'selected' : '' }}>--}}
                                                   {{--                                            {{ $departement->name }}--}}
                                                   {{--                                        </option>--}}
                                                   {{--                                    @endforeach--}}
                                               </select>
                                               @error('id_departement')
                                               <span class="text-danger">{{ $message }}</span>
                                               @enderror
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-3" >
                                   <div class="row g-2">
                                       <div class="col mb-0">
                                           <div class=" mt-2 mb-0">
                                               {{--                                       <label for="nameBasic" class="form-label">Departement</label>--}}
                                               <select name="id_departement" id="id_departement" class="form-select form-select">
                                                   <option value="">Select Departement</option>
                                                   {{--                                    @foreach($departements as $departement)--}}
                                                   {{--                                        <option value="{{ $departement->id }}" {{ old('id_departement') == $departement->id ? 'selected' : '' }}>--}}
                                                   {{--                                            {{ $departement->name }}--}}
                                                   {{--                                        </option>--}}
                                                   {{--                                    @endforeach--}}
                                               </select>
                                               @error('id_departement')
                                               <span class="text-danger">{{ $message }}</span>
                                               @enderror
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="col-1 pe-0  " >
                           <button type="submit" class="btn btn-primary h-100 w-100">ajouter</button>
                       </div>
                       {{--                    </div>--}}
                   </form>
                   <div class="row  p-0  mx-0 mb-4" >
                       <div class="row  w-100">
                           <div class="col  w-100  p-0"  >
                               <div>
{{--                                   <label for="nameBasic" class="form-label">date</label>--}}
                                   <input type="text" value="{{old("name")}}" name="date" id="nameBasic" class="form-control " placeholder="Rechercher par CIN ou CNE"  />
                                   @error("date")<span class="text-danger" >{{$message}}</span>@enderror
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class=" card">
                       <div class="table-responsive text-nowrap">
                           <table class="table table-hover">
                               <thead>
                               <tr>
                                   <th class="text-center" >Etudiant</th>
                                   <th class="text-center" >Par mr (mme)</th>
                                   <th class="text-center" >Element</th>
                                   <th  class="text-center"  >filiere</th>
                                   <th  class="text-center"  >date</th>
                                   <th  class="text-center"  >periode</th>
                                   <th  class="text-center"  >type seance</th>
                                   <th  class="text-center"  >justifier</th>
                                   {{--                                <th  class="text-center"  ></th>--}}
                               </tr>
                               </thead>
                               <tbody class="table-border-bottom-0">
                               @foreach( $absences as $absence )
                                   <tr>
                                       <td class="text-center" >{{$absence->etudiant->user->name}}</td>
                                       {{--                            <td class="text-center" >{{$absence->seance->element->professeurs}}</td>--}}
                                       <td class="text-center" >hhh</td>
                                       <td class="text-center" >{{$absence->seance->element->name}}</td>
                                       <td class="text-center" >{{$absence->seance->element->module->filiere->name}}</td>
                                       <td class="text-center" >{{$absence->date}}</td>
                                       <td class="text-center" >{{$absence->seance->periode->libelle}}</td>
                                       <td class="text-center" >{{$absence->seance->type}}</td>
                                       <td class="text-center" >hh</td>
                                       {{--                            <td class="text-center" >{{$absence->justifications}}</td>--}}
                                       {{--                            <td class="text-center" >{{$absence->module->name}}</td>--}}
                                       {{--                            <td class="text-center">--}}
                                       {{--                                {{ implode(" / ", $absence->professeurs->pluck('user.name')->toArray()) }}--}}
                                       {{--                            </td>--}}
                                       {{--                            <td class="text-center" >--}}
                                       {{--                                <button--}}
                                       {{--                                    type="button"--}}
                                       {{--                                    class="btn btn-danger text-white"--}}
                                       {{--                                    data-bs-toggle="modal"--}}
                                       {{--                                    data-bs-target="#basicModal{{$absence->id}}"--}}
                                       {{--                                >--}}
                                       {{--                                    Supprimer--}}
                                       {{--                                </button>--}}
                                       {{--                                @include('admin.elements.delete')--}}


                                       {{--                                <button--}}
                                       {{--                                    type="button"--}}
                                       {{--                                    class="btn btn-warning text-white"--}}
                                       {{--                                    data-bs-toggle="modal"--}}
                                       {{--                                    data-bs-target="#modifierModal{{$absence->id}}"--}}
                                       {{--                                >--}}
                                       {{--                                    Modifier--}}
                                       {{--                                </button>--}}
                                       {{--                                @include('admin.elements.edit')--}}

                                       {{--                            </td>--}}
                                   </tr>
                               @endforeach

                               </tbody>
                           </table>
                       </div>
                       {{--                    {{$absences->links()}}--}}
                   </div>
               </div>
            </div>
        </div>


    </div>


    @endsection


@section( "scripts" )
        <script>
            // Open the modal if the 'openModal' parameter is set in the URL
            window.addEventListener('load', function() {
                var urlParams = new URLSearchParams(window.location.search);
                var openModal = urlParams.get('openModal');
                if (openModal) {
                    var modal = document.getElementById('elementtModal');
                    var bootstrapModal = new bootstrap.Modal(modal);
                    bootstrapModal.show();
                }
            });
        </script>
@endsection











