<div class="modal fade" id="modifierModal{{$module->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Modifier le module</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>




    <form method="post" action="{{route("modules.update",$module->id)}}">
        @method('PUT')
               @csrf
                <div class="modal-body">
                       <div class="row">
                           <div class="col mb-3">
                               <label for="nameBasic" class="form-label">Name</label>
                               <input type="text" name="name"  value="{{$module->name}}" id="nameBasic" class="form-control" placeholder="Enter name" />

                           </div>
                           <div class="row g-2">
                            <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Nbr_heure</label>
                                <input type="text" name="nbr_heure"  value="{{$module->nbr_heure}}" id="nameBasic" class="form-control" placeholder="Entrer le nombre des heures" />


                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Filiere</label>
                                <select name="id_filiere" id="filierees" class="form-select form-select">
                                    <option selected disabled>select Filiere</option>
                                    @foreach($filieres as $filiere)
                                    <option value="{{ $filiere->id }}" {{ $module->id_filiere== $filiere->id ? 'selected' : '' }}>{{$filiere->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Semestre</label>
                                <select name="id_semestre" id="semestre" class="form-select form-select">
                                    <option selected disabled>select Semestre</option>
                                    @foreach($semestres as $semestre)
                                    <option value="{{ $semestre->id }}" {{ $module->id_semestre== $semestre->id ? 'selected' : '' }}>{{$semestre->name}}</option>
                                    @endforeach
                                </select>

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
