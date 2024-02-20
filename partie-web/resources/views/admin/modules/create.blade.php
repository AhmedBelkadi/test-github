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
                               <input type="text" id="emailBasic"   value="{{ old("nbr_heure") }}" name="nbr_heure" class="form-control" placeholder="enter nombre des heures" />
                               @error("nbr_heure")
                               <span class="text-danger" >{{$message}}</span>
                               @enderror
                           </div>
                       </div>
                       <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Filiere</label>
                            <select name="id_filiere" id="filiere" class="form-select form-select">
                                <option selected disabled>select filiere</option>
                                @foreach( $filieres as $filiere )
                                    <option data-type="{{ $filiere->type }}" value="{{ $filiere->id }}" {{ old('id_filiere') == $filiere->id ? 'selected' : '' }}>{{$filiere->name}}</option>
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
                            <div class=" px-0 mb-3">
                                <select name="name_semestre" id="semestre" class="form-select form-select">
                                    <option value="" selected disabled>Select Semestre</option>
                                </select>
                                @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror
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
