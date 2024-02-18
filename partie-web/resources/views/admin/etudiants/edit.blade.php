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








    <form method="post" action="{{route("etudiants.update",$etudiant->id)}}">
        @method('PUT')
               @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Name</label>
                                <input type="text" name="name"  value="{{!old("name") ? $etudiant->user->name : old("name")}}" id="nameBasic" class="form-control" placeholder="Enter name" />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                 </div>
                 </div>

                     <div class="row">
                         <div class="col mb-3">
                             <label for="nameBasic" class="form-label">CIN</label>
                             <input type="text" name="cin"  value="{{!old("cin") ? $etudiant->user->cin : old("cin")}}" id="nameBasic" class="form-control" placeholder="Enter cin" />
                             @error('cin')
                             <span class="text-danger">{{ $message }}</span>
                             @enderror
              </div>
              </div>



             <div class="row">
                 <div class="col mb-3">
                     <label for="nameBasic" class="form-label">Email</label>
                     <input type="text" name="email"  value="{{!old("email") ? $etudiant->user->email : old("email")}}" id="emailBasic" class="form-control" placeholder="Enter email" />
                     @error('email')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
      </div>
      </div>

         <div class="row">
             <div class="col mb-3">
                 <label for="nameBasic" class="form-label">Tele</label>
                 <input type="text" name="tele"  value="{{!old("tele") ? $etudiant->user->tele : old("tele")}}" id="nameBasic" class="form-control" placeholder="Enter tele" />
                 @error('tele')
                 <span class="text-danger">{{ $message }}</span>
                 @enderror
  </div>
  </div>

     <div class="row">
         <div class="col mb-3">
             <label for="nameBasic" class="form-label">Adresse</label>
             <input type="text" name="adresse"  value="{{!old("adresse") ? $etudiant->user->adresse : old("adresse")}}" id="nameBasic" class="form-control" placeholder="Enter adresse" />
             @error('adresse')
             <span class="text-danger">{{ $message }}</span>
             @enderror
 </div>
 </div>
 <div class="row">
    <div class="col mb-3">
        <label for="nameBasic" class="form-label">CNE</label>
        <input type="text" name="cne"  value="{{!old("cne") ? $etudiant->cne : old("cne")}}" id="nameBasic" class="form-control" placeholder="Enter cne" />
        @error('cne')
        <span class="text-danger">{{ $message }}</span>
        @enderror
</div>
</div>
<div class="row">
    <div class="col mb-3">
        <label for="nameBasic" class="form-label">Apogee</label>
        <input type="text" name="apogee"  value="{{!old("apogee") ? $etudiant->apogee : old("apogee")}}" id="nameBasic" class="form-control" placeholder="Enter apogee" />
        @error('apogee')
        <span class="text-danger">{{ $message }}</span>
        @enderror

    </div>








</div>
<div class="row g-2">
    <div class="col mb-0">
        <div class=" mt-2 mb-3">
            <label for="nameBasic" class="form-label">Filiere</label>
            <select name="id_filiere" id="id_filiere" class="form-select form-select">
                <option value="{{ $etudiant->filiere->id }}">{{ $etudiant->filiere->name }}</option>
                    @foreach($filieres as $filiere)
                    @if($filiere->id==$etudiant->filiere->id)
                        @continue
                    @endif
                <option value="{{ $filiere->id }}" {{ old('id_filiere') == $filiere->id ? 'selected' : '' }}>
                        {{ $filiere->name }}
                    </option>
                @endforeach
            </select>
            @error('id_filiere')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
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
