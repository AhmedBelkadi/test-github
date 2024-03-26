<div class="modal fade" id="editDepartementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel1">modifier le departement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route("departements.update",$departement->id)}}">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Name</label>
                            <input type="text" value="{{!old("name") ? $departement->name : old("name") }}" name="name" id="nameBasic" class="form-control" placeholder="Enter Name" />
                            @error("name")<span class="text-danger" >{{$message}}</span>@enderror
                        </div>
                    </div>


                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class=" mt-2 mb-3">
                                <label for="nameBasic" class="form-label">Chef de Departement</label>
                                <select name="id_professeur" id="id_professeur" class="form-select form-select">
                                    <option value="{{ $departement->chef->user->id }}">{{ $departement->chef->user->name }}</option>
                                    @foreach($professeurs as $professeur)
                                    @if($professeur->id==$departement->chef->user->professeur->id)
                                          @continue
                                      @endif
                                        <option value="{{ $professeur->id }}" {{ old('id_professeur') == $professeur->id ? 'selected' : '' }}>
                                            {{ $professeur->user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_professeur')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
