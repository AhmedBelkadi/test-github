<div class="modal fade" id="editModal{{$professeur->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Modifier le professeur</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>




    <form method="post" action="{{route("professeurs.update",$professeur->id)}}">
        @method('PUT')
               @csrf
                <div class="modal-body">
                       <div class="row">
                           <div class="col mb-3">
                               <label for="nameBasic" class="form-label">Name</label>
                               <input type="text" name="name"  value="{{$professeur->user->name}}" id="nameBasic" class="form-control" placeholder="Enter name" />
                </div>
                </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">CIN</label>
                            <input type="text" name="cin"  value="{{$professeur->user->cin}}" id="nameBasic" class="form-control" placeholder="Enter name" />
             </div>
             </div>



            <div class="row">
                <div class="col mb-3">
                    <label for="nameBasic" class="form-label">Email</label>
                    <input type="email" name="email"  value="{{$professeur->user->email}}" id="nameBasic" class="form-control" placeholder="Enter name" />
     </div>
     </div>

        <div class="row">
            <div class="col mb-3">
                <label for="nameBasic" class="form-label">Tele</label>
                <input type="text" name="tele"  value="{{$professeur->user->tele}}" id="nameBasic" class="form-control" placeholder="Enter name" />
 </div>
 </div>

    <div class="row">
        <div class="col mb-3">
            <label for="nameBasic" class="form-label">Adresse</label>
            <input type="text" name="adresse"  value="{{$professeur->user->adresse}}" id="nameBasic" class="form-control" placeholder="Enter name" />
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
