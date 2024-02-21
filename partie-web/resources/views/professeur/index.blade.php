@extends("layouts.professeur_layout")

@section( "dashboard-active" , "active" )

@section("main")

<div class="row vw-100 bg-black" >
    <div class="col-4 bg-white vh-100 " >
        <div class="row h-100 py-5 px-3" >
            <div class="col-12 h-25 " >
                <div class="d-flex align-items-center justify-content-center h-100" >

                <img src="{{asset("assets/img/avatars/wqwq-removebg-preview.png")}}" class="h-100 border rounded-3" >
                </div>
            </div>
            <div class="col-12 h-75  py-5" >
                <form method="post" class="row mx-0  h-100   " action="{{route("absences.chercher")}}">
                    @csrf
                    <div class="col-12" >
                        <div class="row g-2">
                            <div class="col px-0  mb-0">
                                <div class=" px-0 mb-3">
                                    <label for="emailBasic" class="form-label">Filiere</label>
                                    <select name="name_semestre" id="semestre" class="form-select-lg form-select">
                                        <option value="" selected disabled>Select Semestre</option>
                                    </select>
                                    {{--                                    @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" >
                        <div class="row g-2">
                            <div class="col px-0  mb-0">
                                <div class=" px-0 mb-3">
                                    <label for="emailBasic" class="form-label">Filiere</label>
                                    <select name="name_semestre" id="semestre" class="form-select-lg form-select">
                                        <option value="" selected disabled>Select Semestre</option>
                                    </select>
                                    {{--                                    @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" >
                        <div class="row" >
                            <div class="col-6" >
                                <div class="row g-2">
                                    <div class="col px-0  mb-0">
                                        <div class=" px-0 mb-3">
                                            <label for="emailBasic" class="form-label">Filiere</label>
                                            <select name="name_semestre" id="semestre" class="form-select-lg form-select">
                                                <option value="" selected disabled>Select Semestre</option>
                                            </select>
                                            {{--                                    @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6" >
                                <div class="row g-2">
                                    <div class="col px-0  mb-0">
                                        <div class=" px-0 mb-3">
                                            <label for="emailBasic" class="form-label">Filiere</label>
                                            <select name="name_semestre" id="semestre" class="form-select-lg form-select">
                                                <option value="" selected disabled>Select Semestre</option>
                                            </select>
                                            {{--                                    @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" >
                        <div class="row" >
                            <div class="col-6 " >
                                <div class="row g-2">
                                    <div class="col px-0  mb-0">
                                        <div class=" px-0 mb-3">
                                            <label for="emailBasic" class="form-label">Filiere</label>
                                            <select name="name_semestre" id="semestre" class="form-select-lg form-select">
                                                <option value="" selected disabled>Select Semestre</option>
                                            </select>
                                            {{--                                    @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 " >
                                <div class="row g-2">
                                    <div class="col px-0  mb-0">
                                        <div class=" px-0 mb-3">
                                            <label for="emailBasic" class="form-label">Filiere</label>
                                            <select name="name_semestre" id="semestre" class="form-select-lg form-select">
                                                <option value="" selected disabled>Select Semestre</option>
                                            </select>
                                            {{--                                    @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" >
                        <div class="row" >
                            <div class="col-6  " >
                                <button type="submit" class="btn-lg btn-primary w-100 ">Rechercher</button>
                            </div>
                            <div class="col-6 " >
                                <button type="submit" class="btn-lg btn-primary w-100 ">Rechercher</button>
                            </div>
                        </div>
                    </div>


{{--                    <div class="col-11 ps-0  " >--}}
{{--                        <div class="row" >--}}
{{--                            <div class="col-6" >--}}
{{--                                <div class="row g-2">--}}
{{--                                    <div class="col px-0 mb-0">--}}
{{--                                        <div class=" px-0 mb-3">--}}
{{--                    <label for="emailBasic" class="form-label">Filiere</label>--}}{{----}}
{{--<select name="id_filiere" id="filiere" class="form-select-lg form-select">--}}
{{--                                                <option value="" selected disabled>Select Filiere</option>--}}
{{--                                                --}}{{--                                        @foreach($filieres as $filiere)--}}
{{--                                                --}}{{--                                            <option data-type="{{ $filiere->type }}" value="{{ $filiere->id }}" >{{ $filiere->name }}</option>--}}
{{--                                                --}}{{--                                        @endforeach--}}
{{--                                            </select>--}}
{{--                                            --}}{{--                                    @error("id_filiere")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-3" >--}}
{{--                                <div class="row g-2">--}}
{{--                                    <div class="col px-0  mb-0">--}}
{{--                                        <div class=" px-0 mb-3">--}}
{{--                                            <select name="name_semestre" id="semestre" class="form-select form-select">--}}
{{--                                                <option value="" selected disabled>Select Semestre</option>--}}
{{--                                            </select>--}}
{{--                                            --}}{{--                                    @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-3" >--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col mb-3">--}}
{{--                                        <input type="date" value="{{old("date")}}" name="date" id="nameBasic" class="form-control"  />--}}
{{--                                        --}}{{--                                @error("date")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row" >--}}
{{--                            <div class="col-6" >--}}
{{--                                <div class="row g-2">--}}
{{--                                    <div class="col mb-0">--}}
{{--                                        <div class=" mt-2 mb-0">--}}
{{--                                            <select name="id_element" id="id_element" class="form-select form-select">--}}
{{--                                                <option value="">Select Element</option>--}}
{{--                                                --}}{{--                                        @foreach($elements as $element)--}}
{{--                                                --}}{{--                                            <option value="{{ $element->id }}" {{ old('id_element') == $element->id ? 'selected' : '' }}>--}}
{{--                                                --}}{{--                                                {{ $element->name }}--}}
{{--                                                --}}{{--                                            </option>--}}
{{--                                                --}}{{--                                        @endforeach--}}
{{--                                            </select>--}}
{{--                                            --}}{{--                                    @error('id_element')<span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-6" >--}}
{{--                                <div class="row g-2">--}}
{{--                                    <div class="col mb-0">--}}
{{--                                        <div class=" mt-2 mb-0">--}}
{{--                                            <select name="id_periode" id="id_periode" class="form-select form-select">--}}
{{--                                                <option value="">Select Periode</option>--}}
{{--                                                --}}{{--                                        @foreach($periodes as $periode)--}}
{{--                                                --}}{{--                                            <option value="{{ $periode->id }}" {{ old('id_periode') == $periode->id ? 'selected' : '' }}>--}}
{{--                                                --}}{{--                                                {{ $periode->libelle }}--}}
{{--                                                --}}{{--                                            </option>--}}
{{--                                                --}}{{--                                        @endforeach--}}
{{--                                            </select>--}}
{{--                                            --}}{{--                                    @error('id_periode')<span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-1 ps-1 pe-0  " >--}}
{{--                        <button type="submit" class="btn btn-primary h-100  pe-3 ">Rechercher</button>--}}
{{--                    </div>--}}
                </form>
            </div>
        </div>
    </div>
    <div class="col-8 bg-primary vh-100 " >
            <div class="d-flex align-items-center justify-content-center h-100" >
                <img src="{{asset("assets/img/avatars/Mar-Business_2-removebg-preview.png")}}" class="h-50 border rounded-3" >
            </div>
    </div>


</div>

@endsection
