<div class="modal fade" id="editFiliereModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel1">modifier un filiere</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route("filieres.update" , $filiere )}}">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Name</label>
                            <input type="text" value="{{!old("name") ? $filiere->name : old("name") }}" name="name" id="nameBasic" class="form-control" placeholder="Enter Name" />
                            @error("name")<span class="text-danger" >{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class="  mb-3">
                                <label for="nameBasic" class="form-label">type</label>
                                <select name="type" id="largeSelect" class="form-select form-select">
                                    {{--                                        <option selected >select type</option>--}}
                                    <option value="{{$filiere->type}}"  > {{$filiere->type == "lp" ? "licence professionnelle" : "Diplôme Universitaire de Technologie" }} </option>
                                    <option value="lp" {{ old('type') == 'lp' ? 'selected' : '' }} >licence professionnelle</option>
                                    <option value="dut" {{ old('type') == 'dut' ? 'selected' : '' }} >Diplôme Universitaire de Technologie</option>
                                </select>
                                @error("type")<span class="text-danger" >{{$message}}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="emailBasic" class="form-label">nombre de semestre</label>
                            <input type="number" value="{{ !old("nbr_semestre") ? $filiere->nbr_semestre : old("nbr_semestre")  }}" id="emailBasic"  name="nbr_semestre" class="form-control" placeholder="entrer nembre de semestre" />
                            @error("nbr_semestre")<span class="text-danger" >{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class=" mt-2 mb-3">
                                <label for="nameBasic" class="form-label">Chef de filiere</label>
                                <select name="id_professeur" id="id_professeur" class="form-select form-select">
                                    {{--                                    <option value="">Select Professeur</option>--}}
                                    <option value="{{ $filiere->chef->user->id }}">{{ $filiere->chef->user->name }}</option>
                                    {{--                                    <option value="{{ $professeur->id }}" {{ old('id_professeur') == $professeur->id ? 'selected' : '' }}>--}}
                                    {{--                                        {{ $professeur->user->name }}--}}
                                    {{--                                        </option>--}}

                                    @foreach($professeurs as $professeur)
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
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class=" mt-2 mb-0">
                                <label for="nameBasic" class="form-label">Departement</label>
                                <select name="id_departement" id="id_departement" class="form-select form-select">
                                    {{--                                    <option value="">Select Departement</option>--}}
                                    <option value="{{ $filiere->departement->id }}">{{ $filiere->departement->name }}</option>
                                    @foreach($departements as $departement)
                                        <option value="{{ $departement->id }}" {{ old('id_departement') == $departement->id ? 'selected' : '' }}>
                                            {{ $departement->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_departement')
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

