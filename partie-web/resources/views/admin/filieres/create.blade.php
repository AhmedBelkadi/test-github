<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
    Ajouter un filiere
</button>

<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Ajouter un filiere</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route("filieres.store")}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Name</label>
                            <input type="text" value="{{old("name")}}" name="name" id="nameBasic" class="form-control" placeholder="Enter Name" />
                            @error("name")<span class="text-danger" >{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class=" mt-2 mb-3">
                                <label for="nameBasic" class="form-label">type</label>
                                <select name="type" id="largeSelect" class="form-select form-select">
                                    <option  selected >select type</option>
                                        <option value="{{old("type","lp")}}">licence professionnelle</option>
                                        <option value="{{old("type","dut")}}">Diplôme Universitaire de Technologie</option>
                                </select>
                                @error("type")<span class="text-danger" >{{$message}}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">nembre de semestre</label>
                            <input type="number" value="{{old("nbr_semestre")}}" id="emailBasic"  name="nbr_semestre" class="form-control" placeholder="entrer nembre de semestre" />
                            @error("nbr_semestre")<span class="text-danger" >{{$message}}</span>@enderror
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class=" mt-2 mb-3">
                                <label for="nameBasic" class="form-label">chef de filiere</label>
                                <select name="id_professeur" id="largeSelect" class="form-select form-select">
                                    <option selected >select professeur</option>
                                    @foreach( $professeurs as $professeur )
                                        <option value="{{old("id_professeur",$professeur->id)}}">{{$professeur->user->name}}</option>
                                    @endforeach
                                </select>
                                @error("id_professeur")<span class="text-danger" >{{$message}}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class=" mt-2 mb-3">
                                <label for="nameBasic" class="form-label">departement</label>
                                <select name="id_departement" id="largeSelect" class="form-select form-select">
                                    <option selected >select departement</option>
                                    @foreach( $departements as $departement )
                                        <option value="{{old("id_departement",$departement->id)}}">{{$departement->name}}</option>
                                    @endforeach
                                </select>
                                @error("id_departement")<span class="text-danger" >{{$message}}</span>@enderror
                            </div>
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
