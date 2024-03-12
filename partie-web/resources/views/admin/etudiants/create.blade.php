<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#etudiantsModal">Ajouter un etudiant</button>
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
                               <input type="text" value="{{ old("name_a") }}" name="name_a" id="nameBasic" class="form-control" placeholder="Enter name" />
                               @error("name_a")
                               <span class="text-danger" >{{$message}}</span>
                               @enderror
                           </div>
                       </div>


                    <div class="row">



                        <div class="col-md">
                            <small class="text-light fw-semibold d-block">gender</small>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="gender_a" id="inlineRadio1" value="male">
                                <label class="form-check-label" for="inlineRadio1">male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender_a" id="inlineRadio2" value="female">
                                <label class="form-check-label" for="inlineRadio2">female</label>
                            </div>
                        </div>

                    </div>


                       <div class="row g-2">
                           <div class="col mb-0">
                               <label for="emailBasic" class="form-label">CIN</label>
                               <input type="text" value="{{ old("cin_a") }}" id="emailBasic"  name="cin_a" class="form-control" placeholder="enter cin" />
                               @error("cin_a")
                               <span class="text-danger" >{{$message}}</span>
                               @enderror
                           </div>
                       </div>

                       <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Apogee</label>
                            <input type="text" value="{{ old("apogee_a") }}" id="emailBasic"  name="apogee_a" class="form-control" placeholder="enter apogee" />
                            @error("apogee_a")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">CNE</label>
                            <input type="text" id="emailBasic" value="{{ old("cne_a") }}"  name="cne_a" class="form-control" placeholder="enter cne" />
                            @error("cne_a")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Email</label>
                            <input type="email" id="emailBasic"  value="{{ old("email_a") }}" name="email_a" class="form-control" placeholder="enter email" />
                            @error("email_a")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tele</label>
                            <input type="text" id="emailBasic"   value="{{ old("tele_a") }}"name="tele_a" class="form-control" placeholder="enter tele" />
                            @error("tele_a")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Adresse</label>
                            <input type="text" id="emailBasic" value="{{ old("adresse_a") }}"  name="adresse_a" class="form-control" placeholder="enter adresse" />
                            @error("adresse_a")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Filiere</label>
                            <select name="id_filiere_a" id="largeSelect" class="form-select form-select">
                                <option selected >select filiere</option>
                                @foreach( $filieres as $filiere )
                                    <option value="{{ $filiere->id }}" {{ old('id_filiere_a') == $filiere->id ? 'selected' : '' }}>{{$filiere->name}}</option>
                                @endforeach
                            </select>
                            @error("id_filiere_a")
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
