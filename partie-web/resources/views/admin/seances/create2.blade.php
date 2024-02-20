{{--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSeanceModal">--}}
{{--    Ajouter un seance--}}
{{--</button>--}}

<div class="modal fade" id="addSeanceModal_{{ $day }}_{{ $periode->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Ajouter un seance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route("seances.store")}}">
                @csrf
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class="  mb-3">
                                <label for="nameBasic" class="form-label">type</label>
                                <select name="type" id="largeSelect" class="form-select form-select">
                                    <option selected >select type</option>
                                    <option value="tp" {{ old('type') == 'tp' ? 'selected' : '' }} >Traveaux Pratique</option>
                                    <option value="cour" {{ old('type') == 'cour' ? 'selected' : '' }} >Cour</option>
                                </select>
                                @error("type")<span class="text-danger" >{{$message}}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class=" mt-2 mb-3">
                                <label for="nameBasic" class="form-label">Salle</label>
                                <select name="id_salle" id="id_salle" class="form-select form-select">
                                    <option value="">Select Salle</option>
                                    @foreach($salles as $salle)
                                        <option value="{{ $salle->id }}" {{ old('id_salle') == $salle->id ? 'selected' : '' }}>
                                            {{ $salle->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_salle')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-0">
                            <div class=" mt-2 mb-0">
                                <label for="id_element" class="form-label">Element</label>
                                <select name="id_element" id="id_element" class="form-select form-select">
                                    <option value="">Select Element</option>
                                    @foreach($emplois->filiere->modules as $module )
                                        @if($module->semestre->id == $emplois->semestre->id )
                                            @foreach($module->elements as $element)
                                                <option value="{{ $element->id }}" {{ old('id_element') == $element->id ? 'selected' : '' }}>
                                                    {{ $element->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                                @error('id_element')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="day" class="form-control" value="{{$day}}"  >
                    <input type="hidden" name="id_periode" class="form-control" value="{{$periode->id}}"  >
                    <input type="hidden" value="{{$emplois->id}}" name="id_emploi_du_temps" >

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--<select name="day" id="day" class="form-select form-select">--}}
{{--    <option value="">Select jour</option>--}}
{{--    @foreach($days as $day)--}}
{{--        <option value="{{$day}}" >--}}
{{--            {{ $day }}--}}
{{--        </option>--}}
{{--    @endforeach--}}
{{--</select>--}}


{{--<select name="id_periode" id="id_periode" class="form-select form-select">--}}

{{--</select>--}}
{{--                                    <option value="">Select Periode</option>--}}
{{--                                    @foreach($periodes as $periode)--}}
{{--                                    <option value="{{$seance->periode->id}}" selected disabled > {{$seance->periode->libelle}} </option>--}}
{{--                                    <option value="{{$periode->id}}" selected  > {{$periode->libelle}} </option>--}}

{{--                                        <option value="{{ $periode->id }}" {{ old('id_periode') == $periode->id ? 'selected' : '' }}>--}}
{{--                                            {{ $periode->libelle }}--}}
{{--                                        </option>--}}
{{--                                    @endforeach--}}
