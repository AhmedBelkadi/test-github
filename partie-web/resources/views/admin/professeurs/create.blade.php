<button
type="button"
class="btn btn-primary"
data-bs-toggle="modal"
data-bs-target="#professeursModal"
>
Ajouter un professeur
</button>
<div class="modal fade" id="professeursModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Ajouter un professeur</h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
        </div>
           <form method="post" action="{{route("professeurs.store")}}">
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
                               <input type="text"  value="{{ old("cin") }}"id="emailBasic"  name="cin" class="form-control" placeholder="enter cin" />
                               @error("cin")
                               <span class="text-danger" >{{$message}}</span>
                               @enderror
                           </div>
                       </div>


                       <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Email</label>
                            <input type="email" value="{{ old("email") }}"id="emailBasic"  name="email" class="form-control" placeholder="enter email" />
                            @error("email")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Tele</label>
                            <input type="text" value="{{ old("tele") }}" id="emailBasic"  name="tele" class="form-control" placeholder="enter tele" />
                            @error("tele")
                            <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Adresse</label>
                            <input type="text" value="{{ old("adresse") }}" id="emailBasic"  name="adresse" class="form-control" placeholder="enter adresse" />
                            @error("adresse")
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
