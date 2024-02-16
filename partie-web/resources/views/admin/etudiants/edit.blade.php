<div class="modal fade" id="modifieModal{{$etudiant->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Modifier l'etudiant</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>








    <form method="post" action="{{route("etudiants.update",$etudiant)}}">
        @method('PUT')
               @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Name</label>
                                <input type="text" name="name"  value="{{$etudiant->user->name}}" id="nameBasic" class="form-control" placeholder="Enter name" />
                 </div>
                 </div>

                     <div class="row">
                         <div class="col mb-3">
                             <label for="nameBasic" class="form-label">CIN</label>
                             <input type="text" name="cin"  value="{{$etudiant->user->cin}}" id="nameBasic" class="form-control" placeholder="Enter name" />
              </div>
              </div>



             <div class="row">
                 <div class="col mb-3">
                     <label for="nameBasic" class="form-label">Email</label>
                     <input type="email" name="email"  value="{{$etudiant->user->email}}" id="nameBasic" class="form-control" placeholder="Enter name" />
      </div>
      </div>

         <div class="row">
             <div class="col mb-3">
                 <label for="nameBasic" class="form-label">Tele</label>
                 <input type="text" name="tele"  value="{{$etudiant->user->tele}}" id="nameBasic" class="form-control" placeholder="Enter name" />
  </div>
  </div>

     <div class="row">
         <div class="col mb-3">
             <label for="nameBasic" class="form-label">Adresse</label>
             <input type="text" name="adresse"  value="{{$etudiant->user->adresse}}" id="nameBasic" class="form-control" placeholder="Enter name" />
 </div>
 </div>
 <div class="row">
    <div class="col mb-3">
        <label for="nameBasic" class="form-label">CNE</label>
        <input type="text" name="adresse"  value="{{$etudiant->cne}}" id="nameBasic" class="form-control" placeholder="Enter name" />
</div>
</div>
<div class="row">
    <div class="col mb-3">
        <label for="nameBasic" class="form-label">Apogee</label>
        <input type="text" name="adresse"  value="{{$etudiant->apogee}}" id="nameBasic" class="form-control" placeholder="Enter name" />
</div>
</div>




                 </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
        </form>
  </div>
</div>
</div>
