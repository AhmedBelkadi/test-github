<button
type="button"
class="btn btn-primary"
data-bs-toggle="modal"
data-bs-target="#modulesModal"
>
Ajouter un module
</button>
<div class="modal fade" id="modulesModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Ajouter un module</h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
        </div>
           <form method="post" action="{{route("modules.store")}}">
               @csrf
                <div class="modal-body">
                       <div class="row">
                           <div class="col mb-3">
                               <label for="nameBasic" class="form-label">Name</label>
                               <input type="text" value="{{ old("name") }}" name="name" id="nameBasic" class="form-control" placeholder="Enter Name" />
                               @error("name")
                               <span class="text-danger" >{{$message}}</span>
                               @enderror
                           </div>
                       </div>
                       <div class="row g-2">
                           <div class="col mb-0">
                               <label for="emailBasic" class="form-label">nbr-heure</label>
                               <input type="text" id="emailBasic"  name="nbr_heure" class="form-control" placeholder="enter nombre des heures" />
                               @error("nbr_heure")
                               <span class="text-danger" >{{$message}}</span>
                               @enderror
                           </div>
                       </div>
                       <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Filiere</label>
                            <select name="id_filiere" id="largeSelect" class="form-select form-select">
                                <option selected >select filiere</option>
                                @foreach( $filieres as $filiere )
                                    <option value="{{ $filiere->id }}" {{ old('id_filiere') == $filiere->id ? 'selected' : '' }}>{{$filiere->name}}</option>
                                @endforeach
                            </select>
                            @error("id_filiere")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Semestre</label>
                            <select name="id_semestre" id="largeSelect" class="form-select form-select">
                                <option selected >select semestre</option>
                                @foreach( $semestres as $semestre )
                                    <option value="{{ $semestre->id }}" {{ old('id_semestre') == $semestre->id ? 'selected' : '' }}>{{$semestre->name}}</option>
                                @endforeach
                            </select>
                            @error("id_semestre")
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
