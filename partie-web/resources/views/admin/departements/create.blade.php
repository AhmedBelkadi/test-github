<button
type="button"
class="btn btn-primary"
data-bs-toggle="modal"
data-bs-target="#addDepartementModal"
>
Ajouter un Département
</button>

<div class="modal fade" id="addDepartementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Ajouter un Département</h5>
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
                                   <input type="text" value="{{old("name")}}" name="name" id="nameBasic" class="form-control" placeholder="Enter Name" />
                                   @error("name")
                                   <span class="text-danger" >{{$message}}</span>
                                   @enderror
                               </div>
                           </div>
                           <div class="row g-2">
                            <div class="col mb-0">
                                <div class=" mt-2 mb-3">
                                    <label for="nameBasic" class="form-label">chef de Département</label>
                                    <select name="id_professeur" id="largeSelect" class="form-select form-select">
                                        <option selected >select professeur</option>
                                        @foreach( $professeurs as $professeur )
                                            <option value="{{ $professeur->id }}" {{ old('id_professeur') == $professeur->id ? 'selected' : '' }}>{{$professeur->user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error("id_professeur")<span class="text-danger" >{{$message}}</span>@enderror
                                </div>
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
