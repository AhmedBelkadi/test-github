@extends("layouts.index")

@section( "absences-active" , "active" )

@section("main")
    <div class="container-xxl  container">
        <div class="row mt-2 " >
            <div class="col p-0" >
               <div class="" >
                   <form method="post" class="row mx-0 mb-4 " action="{{route("absences.chercher")}}">
                       @csrf
                       {{--                    <div class="" >--}}
                       <div class="col-11 ps-0  " >
                           <div class="row" >
                               <div class="col-6" >
                                   <div class="row g-2">
                                       <div class="col px-0 mb-0">
                                           <div class=" px-0 mb-3">
                                               <select name="id_filiere" id="id_filiere" class="form-select form-select">
                                                   <option value="">Select Filiere</option>
                                                   @foreach($filieres as $filiere)
                                                       <option value="{{ $filiere->id }}" {{ old('id_filiere') == $filiere->id ? 'selected' : '' }}>
                                                           {{ $filiere->name }}
                                                       </option>
                                                   @endforeach
                                               </select>
                                               @error("id_filiere")<span class="text-danger" >{{$message}}</span>@enderror
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-3" >
                                   <div class="row g-2">
                                       <div class="col px-0  mb-0">
                                           <div class=" px-0 mb-3">
                                               <select name="id_semestre" id="id_semestre" class="form-select form-select">
                                                   <option value="">Select Semestre</option>
                                                   @foreach($semestres as $semestre)
                                                       <option value="{{ $semestre->id }}" {{ old('id_semestre') == $semestre->id ? 'selected' : '' }}>
                                                           {{ $semestre->name }}
                                                       </option>
                                                   @endforeach
                                               </select>
                                               @error('id_semestre')
                                               <span class="text-danger">{{ $message }}</span>
                                               @enderror
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-3" >
                                   <div class="row">
                                       <div class="col mb-3">
                                           <input type="date" value="{{old("date")}}" name="date" id="nameBasic" class="form-control"  />
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
                                               <select name="id_element" id="id_element" class="form-select form-select">
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
                               <div class="col-6" >
                                   <div class="row g-2">
                                       <div class="col mb-0">
                                           <div class=" mt-2 mb-0">
                                               <select name="id_periode" id="id_periode" class="form-select form-select">
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
                       </div>
                       <div class="col-1 ps-1 pe-0  " >
                           <button type="submit" class="btn btn-primary h-100  pe-3 ">Rechercher</button>
                       </div>
                       {{--                    </div>--}}
                   </form>
                   <div class="row  p-0  mx-0 mb-4" >
{{--                       <div class="col-12  p-0"  >--}}
                           <form method="post"  class="col-12" action="{{ route('absences.searchByStudent') }}" >
                               @csrf
                              <div class="row" >
                                  <input type="text" value="{{old("query")}}" name="query" id="nameBasic" class="form-control col-11" placeholder="Rechercher par CIN ou CNE"  />
                                  <button class="btn btn-primary col-1" type="submit">Search</button>
                              </div>
                               @error("query")<span class="text-danger" >{{$message}}</span>@enderror
                           </form>
{{--                       </div>--}}
                   </div>
                   <div class=" card">
                       <div class="table-responsive text-nowrap">
                           <table class="table table-hover">
                               <thead>
                               <tr>
                                   <th class="text-center" >cne</th>
                                   <th class="text-center" >Etudiant</th>
                                   <th class="text-center" >Par mr (mme)</th>
                                   <th class="text-center" >Element</th>
                                   <th  class="text-center"  >filiere</th>
                                   <th  class="text-center"  >date</th>
                                   <th  class="text-center"  >periode</th>
                                   <th  class="text-center"  >type seance</th>
                                   <th  class="text-center"  >justifier</th>
                                                                   <th  class="text-center"  ></th>
                               </tr>
                               </thead>
                               <tbody class="table-border-bottom-0">
                               @foreach( $absences as $absence )
                                   <tr>
                                       <td class="text-center" >{{$absence->etudiant->cne}}</td>
                                       <td class="text-center" >{{$absence->etudiant->user->name}}</td>

                                       <td class="text-center" >{{ implode(" / ", $absence->seance->element->professeurs->pluck('user.name')->toArray()) }}</td>
                                       <td class="text-center" >{{$absence->seance->element->name}}</td>

                                       <td class="text-center" >{{$absence->seance->element->module->filiere->name}}</td>
                                       <td class="text-center" >{{$absence->date}}</td>
                                       <td class="text-center" >{{$absence->seance->periode->libelle}}</td>
                                       <td class="text-center" >{{$absence->seance->type}}</td>
                                       <td class="text-center" > <a class="link-opacity-100  " href="" >voir</a> </td>
                                       <td class="text-center" >
                                           <div class="d-flex" >
                                               <button class="btn btn-success me-1" >Accepter</button>
                                               <button class="btn btn-danger" >Reffuser</button>
                                           </div>
                                       </td>
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



    {{--                               <div class="col-3" >--}}
    {{--                                   <div class="row g-2">--}}
    {{--                                       <div class="col mb-0">--}}
    {{--                                           <div class=" mt-2 mb-0">--}}
    {{--                                               --}}{{--                                       <label for="nameBasic" class="form-label">Departement</label>--}}
    {{--                                               <select name="id_departement" id="id_departement" class="form-select form-select">--}}
    {{--                                                   <option value="">Select Departement</option>--}}
    {{--                                                   --}}{{--                                    @foreach($departements as $departement)--}}
    {{--                                                   --}}{{--                                        <option value="{{ $departement->id }}" {{ old('id_departement') == $departement->id ? 'selected' : '' }}>--}}
    {{--                                                   --}}{{--                                            {{ $departement->name }}--}}
    {{--                                                   --}}{{--                                        </option>--}}
    {{--                                                   --}}{{--                                    @endforeach--}}
    {{--                                               </select>--}}
    {{--                                               @error('id_departement')--}}
    {{--                                               <span class="text-danger">{{ $message }}</span>--}}
    {{--                                               @enderror--}}
    {{--                                           </div>--}}
    {{--                                       </div>--}}
    {{--                                   </div>--}}
    {{--                               </div>--}}
@endsection

@section( "scripts" )
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
        </script>
@endsection











