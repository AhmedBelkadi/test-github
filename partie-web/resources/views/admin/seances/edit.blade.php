<div class="modal fade" id="updateSeanceModal_{{ $seance->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Modifier la séance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('seances.update', $seance) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" id="type" class="form-select">
                                    <option value="tp" {{ $seance->type == 'tp' ? 'selected' : '' }}>Travaux Pratiques</option>
                                    <option value="cour" {{ $seance->type == 'cour' ? 'selected' : '' }}>Cour</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class="mb-3">
                                <label for="id_salle" class="form-label">Salle</label>
                                <select name="id_salle" id="id_salle" class="form-select">
                                    @foreach($salles as $salle)
                                        <option value="{{ $salle->id }}" {{ $seance->id_salle == $salle->id ? 'selected' : '' }}>
                                            {{ $salle->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class="mb-3">
                                <label for="id_element" class="form-label">Element</label>
                                <select name="id_element" id="id_element" class="form-select">
                                    @foreach($elements as $element)
                                        <option value="{{ $element->id }}" {{ $seance->element->id == $element->id ? 'selected' : '' }}>
                                            {{ $element->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
