<div class="modal fade" id="modifierModal{{$etudiant->id}}" tabindex="-1" aria-hidden="true">
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




    <form method="post" action="{{route("etudiants.update",$etudiant->id)}}">
        @method('PUT')
               @csrf
                <div class="modal-body">
































                    




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
