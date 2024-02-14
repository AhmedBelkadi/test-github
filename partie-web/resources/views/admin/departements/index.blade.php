@extends("layouts.index")

@section("main")
<button
type="button"
class="btn btn-primary"
data-bs-toggle="modal"
data-bs-target="#basicModal"
>
Ajouter un departement
</button>

<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Ajouter un departement</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
               <form method="post" action="{{route("departements.store")}}">
                   @csrf
                    <div class="modal-body">
                           <div class="row">
                               <div class="col mb-3">
                                   <label for="nameBasic" class="form-label">Name</label>
                                   <input type="text" name="name" id="nameBasic" class="form-control" placeholder="Enter Name" />
                                   @error("name")
                                   <span class="text-danger" >{{$message}}</span>
                                   @enderror
                               </div>
                           </div>
                           <div class="row g-2">
                               <div class="col mb-0">
                                   <label for="emailBasic" class="form-label">Chef</label>
                                   <input type="text" id="emailBasic"  name="chef" class="form-control" placeholder="enter the name " />
                                   @error("chef")
                                   <span class="text-danger" >{{$message}}</span>
                                   @enderror
                               </div>
                           </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">ajouter</button>
                    </div>
            </form>
        </div>
    </div>
</div>



<div class=" mt-5 col-md-6 col-lg-4">

 {{--  @foreach($departements as $departement) --}}



    <div class="card text-center mb-3">
      <div class="card-body">
      {{-- <h5 class="card-title"> {{$departement->name}}</h5> --}}
    {{--  <p class="card-text">
        Chef de Département: {{$departement->chef->professeur->user->name}} --}}
        <h5 class="card-title"> genie informatique et mathematique</h5>
        <h6 class="card-title"> Chef de Département: gounane</h6>
        <div class="p-2 bg-primary text-white rounded">
            3 filières
        </div>

   {{-- </p>      <div class="p-2 bg-primary text-white rounded">
        {{ count($departement->filieres) }} filières
        </div> --}}
      </div>
    </div>

  {{-- @endforeach --}}

  </div>

@endsection






