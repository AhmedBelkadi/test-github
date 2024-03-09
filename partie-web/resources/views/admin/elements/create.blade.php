<button
type="button"
class="btn btn-primary"
data-bs-toggle="modal"
data-bs-target="#elementtModal"
>
Ajouter un element
</button>
<div class="modal fade" id="elementtModal" tabindex="-1" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Ajouter un element</h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
        </div>
           <form method="post" action="{{route("elements.store")}}">
               @csrf
                <div class="modal-body">
                       <div class="row">
                           <div class="col mb-3">
                               <label for="nameBasic" class="form-label">Name</label>
                               <input type="text" name="name_a"  value="{{old("name_a")}}" id="nameBasic" class="form-control" placeholder="Enter name" />
                               @error("name_a")
                               <span class="text-danger" >{{$message}}</span>
                               @enderror
                           </div>
                       </div>
                       <div class="row g-2">
                           <div class="col mb-3">
                               <label for="emailBasic" class="form-label">Module</label>
                               <select name="id_module_a" id="largeSelect" class="form-select form-select">
                                <option selected >select module</option>
                                @foreach($modules as $module )
                                <option value="{{ $module->id }}" {{ old('id_module_a') == $module->id ? 'selected' : '' }}>{{$module->name}}</option>
                                @endforeach
                            </select>
                              @error("id_module_a")
                               <span class="text-danger" >{{$message}}</span>
                               @enderror
                           </div>
                       </div>

                       <div class="row g-2">

                       <div class="col mb-0">
                            <label for="professeurs" class="form-label">Professeur(s)</label>
                           <p class=" form-label ">control-click (Windows) or command-click (Mac) to select more than one.</p>
                           <select name="id_professeur_a[]" id="professeurs" class="form-select form-select" multiple>
                                <option selected >select professeur</option>
                                @foreach($professeurs as $professeur)
                                    <option value="{{ $professeur->id }}" {{ in_array($professeur->id, old('id_professeur_a', [])) ? 'selected' : '' }}>{{ $professeur->user->name }}</option>
                                @endforeach
                            </select>
                            @error("id_professeur_a")
                                <span class="text-danger">{{ $message }}</span>
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
