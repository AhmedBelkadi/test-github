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
                            <input type="text"  name="name"  value="{{!old("name") ? $module->name : old("name") }}" id="nameBasic" class="form-control" placeholder="Enter Name" />
                            @error("name")<span class="text-danger" >{{$message}}</span>@enderror
                        </div>
                    </div>
                           <div class="row g-2">
                            <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Nbr_heure</label>
                                <input type="text"  name="nbr_heure" value="{{!old("nbr_heure") ? $module->nbr_heure : old("nbr_heure") }} " id="nameBasic" class="form-control" placeholder="Enter le nombre des heures" />
                                @error('nbr_heure')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-0">
                                <div class=" mt-2 mb-3">
                                    <label for="nameBasic" class="form-label">Filiere</label>
                                    <select name="id_filiere" id="id_filiere" class="form-select form-select">
                                        <option value="{{ $module->filiere->id }}">{{ $module->filiere->name }}</option>
                                            @foreach($filieres as $filiere)
                                            @if($filiere->id==$module->filiere->id)
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


                            <div class="row g-2">
                                <div class="col mb-0">
                                    <div class=" mt-2 mb-3">
                                        <label for="nameBasic" class="form-label">Semestre</label>
                                        <select name="id_semestre" id="id_semestre" class="form-select form-select">
                                            <option value="{{ $module->semestre->id }}">{{ $module->semestre->name }}</option>
                                                @foreach($semestres as $semestre)
                                                @if($semestre->id==$module->semestre->id)
                                                    @continue
                                                @endif
                                            <option value="{{ $semestre->id }}" {{ old('id_semestre') == $semestre->id ? 'selected' : '' }}>
                                                    {{ $semestre->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_semestre')
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
