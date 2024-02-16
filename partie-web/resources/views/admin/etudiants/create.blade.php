<button
type="button"
class="btn btn-primary"
data-bs-toggle="modal"
data-bs-target="#etudiantsModal"
>
Ajouter un etudiant
</button>
<div class="modal fade" id="etudiantsModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Ajouter un etudiant</h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
        </div>
           <form method="post" action="{{route("etudiants.store")}}">
               @csrf
                <div class="modal-body">
                       <div class="row">
                           <div class="col mb-3">
                               <label for="nameBasic" class="form-label">Name</label>
                               <input type="text" value="{{ old("name") }}" name="name" id="nameBasic" class="form-control" placeholder="Enter name" />
                               @error("name")
                               <span class="text-danger" >{{$message}}</span>
                               @enderror
                           </div>
                       </div>
                       <div class="row g-2">
                           <div class="col mb-0">
                               <label for="emailBasic" class="form-label">CIN</label>
                               <input type="text" value="{{ old("cin") }}" id="emailBasic"  name="cin" class="form-control" placeholder="enter cin" />
                               @error("cin")
                               <span class="text-danger" >{{$message}}</span>
                               @enderror
                           </div>
                       </div>

                       <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Apogee</label>
                            <input type="text" value="{{ old("apogee") }}" id="emailBasic"  name="apogee" class="form-control" placeholder="enter apogee" />
                            @error("apogee")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">CNE</label>
                            <input type="text" id="emailBasic" value="{{ old("cne") }}"  name="cne" class="form-control" placeholder="enter cne" />
                            @error("cne")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Email</label>
                            <input type="email" id="emailBasic"  value="{{ old("email") }}" name="email" class="form-control" placeholder="enter email" />
                            @error("email")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tele</label>
                            <input type="text" id="emailBasic"   value="{{ old("tele") }}"name="tele" class="form-control" placeholder="enter tele" />
                            @error("tele")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Adresse</label>
                            <input type="text" id="emailBasic" value="{{ old("adresse") }}"  name="adresse" class="form-control" placeholder="enter adresse" />
                            @error("adresse")
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




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
        </form>
    </div>
</div>
</div>
