<div class="modal fade" id="modifierModal{{$element->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Modifier l'element</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

    <form method="post" action="{{route("elements.update",$element->id)}}">
        @method('PUT')
               @csrf
                <div class="modal-body">
                       <div class="row">
                           <div class="col mb-3">
                               <label for="nameBasic" class="form-label">Name</label>
                               <input type="text" value="{{!old("name") ? $element->name : old("name") }}" name="name" id="nameBasic" class="form-control" placeholder="Enter Name" />
                               @error("name")<span class="text-danger" >{{$message}}</span>@enderror

                           </div>
                           <div class="row g-2">
                            <div class="col mb-0">
                                <label for="largeSelect" class="form-label">Module</label>
                                <select name="id_module" id="largeSelect" class="form-select form-select">
                                 <option  value="{{$element->module->id}}" >{{$element->module->name}}</option>
                                 @foreach($modules as $module )
                                      @if($module->id==$element->module->id)
                                        @continue
                                      @endif
                                 <option value="{{ $module->id }}" {{ $element->id_module== $module->id ? 'selected' : '' }}>{{$module->name}}</option>
                                 @endforeach
                             </select>
                             @error("id_module")<span class="text-danger" >{{$message}}</span>@enderror


                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                              <label for="professeurs" class="form-label">Professeur(s)</label>
                              <select name="id_professeur[]" id="professeurs" class="form-select form-select" multiple>
{{--                                <option value="">Select professeur(s)</option>--}}
                                 @foreach($professeurs as $professeur)
                                        <option value="{{ $professeur->id }}" {{ in_array($professeur->id, old('id_professeur', $element->professeurs->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $professeur->user->name }}
                                    </option>
                                @endforeach

                            </select>
                            @error("id_professeur[]")<span class="text-danger" >{{$message}}</span>@enderror


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
