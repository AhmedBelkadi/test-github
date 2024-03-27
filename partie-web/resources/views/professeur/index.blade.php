@extends("layouts.professeur_layout")

@section( "prof-dashboard-active" , "active" )

@section("main")
    <x-sidebar />


<h1>Bonjour {{\Illuminate\Support\Facades\Auth::user()->name}}</h1>
    <div class="bg-primary " style="padding: 33px 43px 33px 43px;border-radius: 23px" >

                <form method="post" action="{{route("etudiants.chercherEtdsParFiliere")}}">
                    @csrf

                    <div class="row" >

                        <div class="col-11 " >
                            <div class="row" >
                                <div class="col-4">
                                    <div class="col px-0  mb-0">
                                        <div class=" px-0 mb-3">
                                            {{--                                        <label for="filiere" class="form-label">Filiere</label>--}}
                                            <select name="id_filiere" id="filiere" class="form-select-lg form-select">
                                                <option value="" selected disabled>Select Filiere</option>
                                                @foreach($filieres as $filiere)
                                                    <option data-type="{{ $filiere->type }}" value="{{ $filiere->id }}" >{{ $filiere->name }}</option>
                                                @endforeach
                                            </select>
                                            @error("id_filiere")<span class="text-danger" >{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="col px-0  mb-0">
                                        <div class=" px-0 mb-3">
                                            {{--                                        <label for="emailBasic" class="form-label">Semestre</label>--}}
                                            <select name="name_semestre" id="semestre" class="form-select-lg form-select">
                                                <option value="" selected disabled>Select Semestre</option>
                                            </select>
                                            @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4" >
                                    <div class="row g-2">
                                        <div class="col px-0  mb-0">
                                            <div class=" px-0 mb-3">
                                                {{--                                                    <label for="nameBasic" class="form-label">Date</label>--}}
                                                <input type="date" value="{{old("date")}}" name="date" id="nameBasic" class="form-control form-control-lg"  />
                                                @error("date")<span class="text-danger" >{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" >
                                <div class="col-4" >
                                    <div class="row g-2">
                                        <div class="col px-0  mb-0">
                                            <div class=" px-0 mb-3">
                                                {{--                                                <label for="largeSelect" class="form-label">Type</label>--}}
                                                <select name="type" id="largeSelect" class="form-select-lg form-select">
                                                    <option selected disabled >select type</option>
                                                    <option value="tp" {{ old('type') == 'tp' ? 'selected' : '' }} >Traveaux Pratique</option>
                                                    <option value="cour" {{ old('type') == 'cour' ? 'selected' : '' }} >Cour</option>
                                                </select>
                                                @error("type")<span class="text-danger" >{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4" >
                                    <div class="row g-2">
                                        <div class="col px-0  mb-0">
                                            <div class=" px-0 mb-3">
                                                {{--                                                <label for="periode" class="form-label">Periode</label>--}}
                                                <select name="id_periode" id="periode" class="form-select-lg form-select">
                                                    <option value="" selected disabled>Select Periode</option>
                                                    @foreach($periodes as $periode)
                                                        <option value="{{ $periode->id }}" >{{ $periode->libelle }}</option>
                                                    @endforeach
                                                </select>
                                                @error("id_periode")<span class="text-danger" >{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4" >
                                    <div class="row g-2">
                                        <div class="col px-0  mb-0">
                                            <div class=" px-0 mb-3">
                                                {{--                                                <label for="element" class="form-label">Element</label>--}}
                                                <select name="id_element" id="element" class="form-select-lg form-select">
                                                    <option value="" selected disabled>Select Element</option>
                                                    @foreach($elements as $element)
                                                        <option value="{{ $element->id }}" >{{ $element->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error("id_element")<span class="text-danger" >{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-1  pe-0 ps-1 " >
                            <button type="submit"  class="btn-lg btn-danger w-100 p-0" style="height: 87%" >envoyer</button>
                        </div>
                    </div>


                </form>

    </div>



    <div class="row  " style="height: 60%" >
        <div class="col-12   " >
            @if(isset($etudiants) )
                <div class="nav-align-top   h-100 p-3">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#codeQr" aria-controls="codeQr" aria-selected="true">
                                <i class="tf-icons bx bx-home"></i> code qr
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#etdsLists" aria-controls="etdsLists" aria-selected="false">
                                <i class="tf-icons bx bx-user"></i> list of etudiant
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content h-100">
                        <div class="tab-pane fade active show   h-100" id="codeQr" role="tabpanel">
                            <div class="d-flex justify-content-center align-items-center h-100" >
                                {!! $qrCode !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="etdsLists" role="tabpanel">
                            <div class="mt-3 card">

                                <div class="row">
                                    <div class="col-12">
                                        <form action="{{ route('mark.absences') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_seance" value="{{$seance->id}}">

                                            <div class="table-responsive text-nowrap">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center" >Name</th>
                                                        <th class="text-center" >CIN</th>
                                                        <th class="text-center" >Apogee</th>
                                                        <th  class="text-center" >CNE</th>
                                                        <th  class="text-center"  >Absence</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                    @forelse($etudiants as $etudiant )
                                                        <tr>
                                                            <td class="text-center" >{{$etudiant->user->name}}</td>
                                                            <td class="text-center" >{{$etudiant->user->cin}}</td>
                                                            <td class="text-center" >{{$etudiant->apogee}}</td>
                                                            <td class="text-center" >{{$etudiant->cne}}</td>
                                                            <td class="text-center">
                                                                <input type="checkbox" name="absent_students[]" value="{{$etudiant->id}}">
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td>no etudiants</td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>


                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <button type="submit" class="btn btn-danger">Mark Absences</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            @else
                <div class="d-flex align-items-center justify-content-center h-100" >
                    {{--                    <img src="{{asset("assets/img/avatars/Mar-Business_2-removebg-preview.png")}}" class="h-50 border rounded-3" >--}}


                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300" data-imageid="search-engine-flatline-9e6d8" imageName="Search engine" class="illustrations_image pt-5" style="width: 450px;"><g id="_531_search_engine_flatline" data-name="#531_search_engine_flatline">
                            <path d="M347.38,239.81H52.62a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5H347.38a.5.5,0,0,1,.5.5A.5.5,0,0,1,347.38,239.81Z" fill="#d1d3d4"/>
                            <path d="M332.11,54.62v148.6a11.26,11.26,0,0,1-11.26,11.27H79.15a11.26,11.26,0,0,1-11.26-11.27V54.62A11.27,11.27,0,0,1,79.15,43.35h241.7A11.27,11.27,0,0,1,332.11,54.62Z" fill="#fff"/><path d="M320.85,215H79.15a11.77,11.77,0,0,1-11.76-11.77V54.62A11.77,11.77,0,0,1,79.15,42.85h241.7a11.77,11.77,0,0,1,11.76,11.77v148.6A11.77,11.77,0,0,1,320.85,215ZM79.15,43.85A10.78,10.78,0,0,0,68.39,54.62v148.6A10.78,10.78,0,0,0,79.15,214h241.7a10.78,10.78,0,0,0,10.76-10.77V54.62a10.78,10.78,0,0,0-10.76-10.77Z" fill="#231f20"/><path d="M332.11,54.62v8.05H67.89V54.62A11.27,11.27,0,0,1,79.15,43.35h241.7A11.27,11.27,0,0,1,332.11,54.62Z" fill="#231f20"/><path d="M332.11,63.11H67.89a.44.44,0,0,1-.44-.44V54.62a11.72,11.72,0,0,1,11.7-11.71h241.7a11.72,11.72,0,0,1,11.7,11.71v8.05A.44.44,0,0,1,332.11,63.11ZM68.33,62.23H331.67V54.62a10.84,10.84,0,0,0-10.82-10.83H79.15A10.84,10.84,0,0,0,68.33,54.62Z" fill="#231f20"/><polygon points="175.45 62.67 165.91 47.14 115.03 47.14 104.35 62.67 67.89 62.67 67.89 86.35 332.11 86.35 332.11 62.67 175.45 62.67" fill="#042552" class="target-color"/>
                            <path d="M332.11,86.85H67.89a.5.5,0,0,1-.5-.5V62.67a.5.5,0,0,1,.5-.5h36.2l10.53-15.31a.49.49,0,0,1,.41-.22h50.88a.5.5,0,0,1,.43.24l9.39,15.29H332.11a.5.5,0,0,1,.5.5V86.35A.5.5,0,0,1,332.11,86.85Zm-263.72-1H331.61V63.17H175.45a.52.52,0,0,1-.43-.24l-9.39-15.29H115.29L104.76,63a.49.49,0,0,1-.41.22h-36Z" fill="#231f20"/>
                            <circle cx="80.12" cy="53.01" r="2.7" fill="#042552" class="target-color"/>
                            <circle cx="89.2" cy="53.01" r="2.7" fill="#fff"/>
                            <circle cx="98.28" cy="53.01" r="2.7" fill="#fff"/>
                            <rect x="103.08" y="134.74" width="200.21" height="22.11" fill="#fff"/>
                            <path d="M303.29,157.35H103.08a.5.5,0,0,1-.5-.5V134.74a.5.5,0,0,1,.5-.5H303.29a.5.5,0,0,1,.5.5v22.11A.5.5,0,0,1,303.29,157.35Zm-199.71-1H302.79V135.24H103.58Z" fill="#231f20"/>
                            <text transform="translate(162.56 121.52)" font-size="28.22" font-family="MyriadPro-Regular, Myriad Pro">
                                <tspan letter-spacing="0.01em">S</tspan>
                                <tspan x="14.08" y="0">ea</tspan>
                                <tspan x="41.82" y="0" letter-spacing="-0.01em">r</tspan>
                                <tspan x="50.77" y="0">ch</tspan>
                            </text>
                            <path d="M277.13,157.35h0a.5.5,0,0,1-.5-.51c.1-8.25.19-20.77,0-21.91a.58.58,0,0,1,0-.19.52.52,0,0,1,.86-.35c.19.19.4.41.14,22.47A.49.49,0,0,1,277.13,157.35Z" fill="#231f20"/><rect x="103.08" y="68.24" width="207.23" height="12.85" rx="5.96" fill="#fff"/><path d="M301,77.55a.53.53,0,0,1-.3-.09.51.51,0,0,1-.2-.49l.37-2.15-1.56-1.53a.49.49,0,0,1-.13-.51.51.51,0,0,1,.41-.34l2.16-.31,1-2a.51.51,0,0,1,.45-.28h0a.51.51,0,0,1,.45.28l1,2,2.16.31a.51.51,0,0,1,.41.34.49.49,0,0,1-.13.51l-1.56,1.53.37,2.15a.51.51,0,0,1-.2.49.53.53,0,0,1-.53,0l-1.93-1-1.93,1A.59.59,0,0,1,301,77.55Zm-.27-4.27,1,1a.5.5,0,0,1,.14.45l-.24,1.41,1.27-.67a.53.53,0,0,1,.46,0l1.27.67-.24-1.41a.5.5,0,0,1,.14-.45l1-1-1.42-.2a.54.54,0,0,1-.38-.28l-.63-1.28-.63,1.28a.54.54,0,0,1-.38.28Z" fill="#d1d3d4"/>
                            <path d="M325.92,70.89h-7.5a.5.5,0,0,1,0-1h7.5a.5.5,0,0,1,0,1Z" fill="#231f20"/>
                            <path d="M325.92,74.22h-7.5a.5.5,0,0,1-.5-.5.51.51,0,0,1,.5-.5h7.5a.5.5,0,0,1,.5.5A.5.5,0,0,1,325.92,74.22Z" fill="#231f20"/>
                            <path d="M325.92,77.55h-7.5a.5.5,0,0,1-.5-.5.51.51,0,0,1,.5-.5h7.5a.5.5,0,0,1,.5.5A.5.5,0,0,1,325.92,77.55Z" fill="#231f20"/>
                            <path d="M183.81,59.13a.5.5,0,0,1-.5-.5V50.74a.5.5,0,0,1,.5-.5.5.5,0,0,1,.5.5v7.89A.5.5,0,0,1,183.81,59.13Z" fill="#d1d3d4"/>
                            <path d="M187.76,55.19h-7.9a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5h7.9a.5.5,0,0,1,.5.5A.51.51,0,0,1,187.76,55.19Z" fill="#d1d3d4"/>
                            <path d="M81.58,75.93H74.47a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5h7.11a.51.51,0,0,1,.5.5A.5.5,0,0,1,81.58,75.93Z" fill="#231f20"/>
                            <path d="M76.38,79.27a.51.51,0,0,1-.39-.19l-2.7-3.33a.5.5,0,0,1,0-.64l2.92-3.41a.5.5,0,0,1,.76.65l-2.65,3.09,2.44,3a.49.49,0,0,1-.08.7A.47.47,0,0,1,76.38,79.27Z" fill="#231f20"/>
                            <path d="M92.57,75.93H85.46a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5h7.11a.51.51,0,0,1,.5.5A.5.5,0,0,1,92.57,75.93Z" fill="#231f20"/>
                            <path d="M90.66,79.27a.51.51,0,0,1-.32-.12.5.5,0,0,1-.07-.7l2.44-3-2.65-3.09a.49.49,0,0,1,0-.7.51.51,0,0,1,.71,0l2.92,3.41a.51.51,0,0,1,0,.64l-2.7,3.33A.52.52,0,0,1,90.66,79.27Z" fill="#231f20"/><path d="M288.74,148.81a4.85,4.85,0,1,1,3.43-1.42A4.83,4.83,0,0,1,288.74,148.81Zm0-8.68a3.83,3.83,0,0,0-2.71,6.55,3.92,3.92,0,0,0,5.43,0,3.84,3.84,0,0,0-2.72-6.55Z" fill="#231f20"/>
                            <path d="M296.75,152.47a.51.51,0,0,1-.36-.15l-4.93-4.93a.5.5,0,0,1,0-.71.51.51,0,0,1,.71,0l4.93,4.93a.51.51,0,0,1,0,.71A.5.5,0,0,1,296.75,152.47Z" fill="#231f20"/><path d="M191.7,146.3H112.88a.51.51,0,0,1-.5-.5.5.5,0,0,1,.5-.5H191.7a.5.5,0,0,1,.5.5A.5.5,0,0,1,191.7,146.3Z" fill="#d1d3d4"/><rect x="112.16" y="142.35" width="8.23" height="11.34" transform="translate(164.99 -33.79) rotate(53.15)" fill="#fff"/>
                            <path d="M114.2,155.21a.48.48,0,0,1-.4-.2l-4.94-6.58a.51.51,0,0,1,.1-.7l9.08-6.8a.5.5,0,0,1,.7.1l4.93,6.58a.5.5,0,0,1,.1.37.48.48,0,0,1-.2.33l-9.07,6.8A.49.49,0,0,1,114.2,155.21Zm-4.24-7L114.3,154l8.27-6.2L118.24,142Z" fill="#231f20"/><rect x="103.47" y="148.65" width="5.42" height="13.86" transform="translate(167 -22.7) rotate(53.15)" fill="#231f20"/><path d="M102.27,162.35a.44.44,0,0,1-.36-.18l-3.25-4.34a.42.42,0,0,1-.08-.33.44.44,0,0,1,.17-.29l11.09-8.31a.44.44,0,0,1,.62.09l3.25,4.34a.42.42,0,0,1,.08.33.4.4,0,0,1-.17.29l-11.09,8.31A.43.43,0,0,1,102.27,162.35Zm-2.64-4.7,2.72,3.64,10.39-7.79L110,149.87Z" fill="#231f20"/>
                            <path d="M121.07,144.05a18.17,18.17,0,1,1,25.43,3.64A18.16,18.16,0,0,1,121.07,144.05Zm32.55-24.4a22.52,22.52,0,1,0-4.51,31.52A22.51,22.51,0,0,0,153.62,119.65Z" fill="#042552" class="target-color"/>
                            <path d="M135.65,156.18a23.24,23.24,0,0,1-3.31-.24,22.86,22.86,0,1,1,3.31.24Zm-.07-45a22,22,0,1,0,17.64,8.8h0A22,22,0,0,0,135.58,111.15Zm0,40.66a18.64,18.64,0,0,1-15-7.46h0a18.69,18.69,0,1,1,15,7.46Zm-14.16-8.06A17.66,17.66,0,1,0,125,119a17.69,17.69,0,0,0-3.54,24.73Z" fill="#231f20"/><path d="M69.91,184.85l-2-2.68a2.44,2.44,0,0,1,.48-3.41L98,156.57a2.44,2.44,0,0,1,3.41.48l2,2.69a2.43,2.43,0,0,1-.49,3.41L73.32,185.34A2.43,2.43,0,0,1,69.91,184.85Z" fill="#fff"/><path d="M71.86,186.33l-.42,0a2.89,2.89,0,0,1-1.93-1.15l-2-2.68a2.89,2.89,0,0,1-.56-2.18,2.92,2.92,0,0,1,1.14-1.93l29.65-22.19a2.89,2.89,0,0,1,2.18-.56,2.92,2.92,0,0,1,1.93,1.14l2,2.69a2.93,2.93,0,0,1-.59,4.11L73.62,185.74A3,3,0,0,1,71.86,186.33Zm27.63-29.75a1.89,1.89,0,0,0-1.16.39L68.68,179.16a1.91,1.91,0,0,0-.75,1.27,1.85,1.85,0,0,0,.37,1.44l2,2.68h0a1.93,1.93,0,0,0,1.27.76,2,2,0,0,0,1.44-.37l29.64-22.19a1.93,1.93,0,0,0,.39-2.71l-2-2.69a1.91,1.91,0,0,0-1.27-.75A1.37,1.37,0,0,0,99.49,156.58Z" fill="#231f20"/>
                            <path d="M93,169.43l5.49,5.67s7.78-11.6,7.63-12.95a23.57,23.57,0,0,1,.58-7.29.55.55,0,0,1,.2-.38c.28-.18.58.2.69.52.25.76.27,1.6.5,2.33,1.24-.71,2.44-1.57,3.66-2.34,2-1.27,1.4,3.61,1.23,4.28-.44,1.8-1.28,3.91-2.86,5,0,0-9.37,20.86-11.4,20.63s-10-9.25-10-9.25Z" fill="#fff"/>
                            <path d="M98.76,185.41H98.7c-2.11-.24-9-7.88-10.35-9.41a.51.51,0,0,1,0-.62l4.32-6.23a.52.52,0,0,1,.37-.22.57.57,0,0,1,.4.15l5.06,5.23c3.58-5.38,7.18-11.26,7.2-12.12a24.61,24.61,0,0,1,.59-7.44,1,1,0,0,1,.42-.7.76.76,0,0,1,.69-.07,1.39,1.39,0,0,1,.74.86,7.59,7.59,0,0,1,.29,1.3c0,.14,0,.28.07.42.58-.36,1.16-.75,1.73-1.12s.88-.59,1.33-.87a1.21,1.21,0,0,1,1.47-.09c1.29.92.53,4.87.52,4.91a9.35,9.35,0,0,1-2.94,5.22C107,172.47,100.88,185.41,98.76,185.41Zm-9.4-9.78c3.08,3.44,8.15,8.64,9.45,8.78,1.24-.35,6.53-10.62,10.9-20.33a.56.56,0,0,1,.17-.21c1.5-1.06,2.27-3.15,2.66-4.72.22-.9.35-3.52-.13-3.86,0,0-.17,0-.36.12l-1.31.86c-.77.51-1.56,1-2.36,1.5a.54.54,0,0,1-.43,0,.53.53,0,0,1-.3-.32,9.52,9.52,0,0,1-.25-1.18,7.24,7.24,0,0,0-.23-1.09,23.06,23.06,0,0,0-.51,6.89c.15,1.42-5.87,10.52-7.71,13.28a.55.55,0,0,1-.38.22.52.52,0,0,1-.4-.15l-5.06-5.23Z" fill="#231f20"/><path d="M56.86,250.7S55,256,55.79,256.45s17.76,0,16.75-1S67,251,67,251" fill="#fff"/><path d="M59.9,257.14a19.33,19.33,0,0,1-4.36-.26c-.8-.48-.51-2.61.85-6.35a.52.52,0,0,1,.65-.3.49.49,0,0,1,.29.64c-.84,2.31-1.39,4.61-1.24,5.16,1.47.33,13,0,15.66-.63-1.46-1.27-5-3.93-5-4a.51.51,0,0,1-.1-.7.5.5,0,0,1,.7-.1c.19.14,4.55,3.42,5.58,4.44a.6.6,0,0,1,.06.82C72.29,256.74,64.86,257.14,59.9,257.14Z" fill="#231f20"/><path d="M69,151.83c-.79.11-1.6.11-2.53.2s-2,0-2.18-.89.62-1.48.3-2.15a1.59,1.59,0,0,0-.39-.46,8,8,0,0,1-.6-11.06.44.44,0,0,1-.59-.31,1,1,0,0,1,.15-.74,5,5,0,0,1,2.1-1.86A15.21,15.21,0,0,1,74.09,133c2.33.25,5.29,1.53,5.48,4.25a2.14,2.14,0,0,1-1.47,2.26c0,2.94-1.12,5.16-2.63,7.57a11.72,11.72,0,0,1-4.06,4A6.63,6.63,0,0,1,69,151.83Z" fill="#fff"/><path d="M66,152.55c-1.23,0-2.05-.47-2.21-1.31A2.29,2.29,0,0,1,64,150c.14-.36.21-.59.14-.75a1.2,1.2,0,0,0-.25-.28,8.51,8.51,0,0,1-1.12-11.21.93.93,0,0,1-.24-.42,1.45,1.45,0,0,1,.19-1.11,5.53,5.53,0,0,1,2.3-2.06,15.84,15.84,0,0,1,9.13-1.65c2.8.3,5.72,1.88,5.92,4.71a2.75,2.75,0,0,1-1.47,2.66,14.42,14.42,0,0,1-2.7,7.47,12.15,12.15,0,0,1-4.25,4.16,6.83,6.83,0,0,1-2.58.85c-.48.07-1,.1-1.46.13-.35,0-.71,0-1.09.08ZM63.6,137a.51.51,0,0,1,.39.19.5.5,0,0,1,0,.64,7.48,7.48,0,0,0,.56,10.36,2.15,2.15,0,0,1,.5.61,1.91,1.91,0,0,1-.1,1.53,1.5,1.5,0,0,0-.16.74c.1.5,1.08.54,1.64.49.4,0,.77-.06,1.13-.08s.93-.06,1.38-.12h0a5.92,5.92,0,0,0,2.23-.73,11.17,11.17,0,0,0,3.89-3.82c1.63-2.61,2.57-4.64,2.55-7.3A.5.5,0,0,1,78,139a1.65,1.65,0,0,0,1.08-1.74c-.18-2.58-3.24-3.59-5-3.78A14.74,14.74,0,0,0,65.5,135a4.37,4.37,0,0,0-1.9,1.66.63.63,0,0,0-.11.33Z" fill="#231f20"/><path d="M59.38,168s-6.26,12.68-5.75,16.57S67,186.93,67,186.93l-.67-19.28Z" fill="#fff"/><path d="M61.73,187.74c-3.81,0-8.26-.56-8.6-3.11-.52-4,5.54-16.34,5.8-16.86a.49.49,0,0,1,.43-.28l6.93-.34a.47.47,0,0,1,.36.13.48.48,0,0,1,.16.35l.68,19.28a.5.5,0,0,1-.44.52A49.94,49.94,0,0,1,61.73,187.74Zm-2-19.27c-.89,1.83-6,12.63-5.58,16,.32,2.4,7.56,2.5,12.36,2l-.65-18.32Z" fill="#231f20"/><path d="M84.25,248.22l.33,8.23s15.45.12,14.55-1-7.89-6.09-7.89-6.09l-1.13-6.09Z" fill="#fff"/><path d="M86.73,257H84.58a.5.5,0,0,1-.5-.48l-.33-8.23a.48.48,0,0,1,.17-.4l5.87-5a.48.48,0,0,1,.49-.09.5.5,0,0,1,.32.38l1.09,5.89c1.23.87,7,5,7.83,6.07a.63.63,0,0,1,.09.67C99.46,256.09,99,257,86.73,257Zm-1.67-1c5.65,0,11.66-.17,13.33-.56C97,254.13,92.68,251,91,249.76a.48.48,0,0,1-.2-.32l-1-5.24-5,4.24Z" fill="#231f20"/><path d="M87,190.35l6,60.13-9.5-.62-9.15-41.63L68.14,251l-11.5-.56s1-27.46,2.07-36.56,1.09-21.29,1.09-21.29Z" fill="#231f20"/><path d="M79.61,143.49s2.64,3,2.29,3.73-1.92.51-1.92.51" fill="#fff"/><path d="M80.53,148.27a3.91,3.91,0,0,1-.62-.05.5.5,0,1,1,.15-1c.5.08,1.27,0,1.39-.22a11.64,11.64,0,0,0-2.21-3.19.5.5,0,0,1,.75-.66c1.3,1.47,2.77,3.41,2.36,4.28A1.93,1.93,0,0,1,80.53,148.27Z" fill="#231f20"/><path d="M78.54,139.2c1.54.94,1.47,3.39,1.68,4.94q.44,3.29.72,6.59c.12,1.4-3.46,1.93-4.15,1.61l1.33,5.39-8-1.83-.65-6.35a4.58,4.58,0,0,0,3.38-3.34c1-3,.33-7.36.33-7.36S77,138.29,78.54,139.2Z" fill="#fff"/><path d="M78.12,158.23H78l-8-1.83a.51.51,0,0,1-.39-.44L69,149.6a.52.52,0,0,1,.43-.55,4,4,0,0,0,3-3c1-2.87.33-7.08.32-7.12a.48.48,0,0,1,.09-.37.5.5,0,0,1,.33-.2c.41-.06,4-.56,5.63.42s1.69,2.88,1.84,4.46c0,.3.05.58.09.84.29,2.18.53,4.41.72,6.61a1.47,1.47,0,0,1-.75,1.36,6.46,6.46,0,0,1-3.23.88h0l1.16,4.68a.5.5,0,0,1-.49.62Zm-7.49-2.73,6.81,1.56-1.14-4.6a.51.51,0,0,1,.7-.58,5.19,5.19,0,0,0,3.14-.66c.22-.16.32-.31.31-.45-.19-2.18-.44-4.39-.72-6.56,0-.27-.07-.56-.1-.87-.13-1.36-.29-3.06-1.35-3.71s-3.24-.48-4.49-.34a18.18,18.18,0,0,1-.42,7.08,5.27,5.27,0,0,1-3.31,3.56Z" fill="#231f20"/><path d="M94.56,169.92S85.69,160.55,82.18,157c-3.26-3.27-12.74-6.24-17.05-1.56,0,0-7.1,9.9-8.46,15.65l4.15,2.53a188.74,188.74,0,0,0-1.61,20.56C67,200.4,87,190.35,87,190.35l-1.81-14.1,3.24,3.23Z" fill="#042552" class="target-color"/><path d="M80.66,149.11a1.8,1.8,0,0,1-2.7-.35" fill="#fff"/><path d="M79.37,150.09l-.27,0a2.23,2.23,0,0,1-1.54-1,.51.51,0,0,1,.11-.7.52.52,0,0,1,.7.12,1.3,1.3,0,0,0,.86.61,1.66,1.66,0,0,0,1.11-.36.52.52,0,0,1,.71.07.5.5,0,0,1-.07.7A2.75,2.75,0,0,1,79.37,150.09Z" fill="#231f20"/><path d="M75.62,145.48a3.09,3.09,0,0,0-.83-1.41,3.88,3.88,0,0,0-.93-.88,1.46,1.46,0,0,0-1.23-.2,1.36,1.36,0,0,0-.76.8,2.55,2.55,0,0,0-.12,1.13,4.71,4.71,0,0,0,2.75,3.85l-.14-.11" fill="#fff"/>
                            <path d="M74.5,149.27a.45.45,0,0,1-.2,0,5.2,5.2,0,0,1-3-4.27,3.21,3.21,0,0,1,.15-1.35,1.84,1.84,0,0,1,1.06-1.09,2,2,0,0,1,1.66.24,4.72,4.72,0,0,1,1,1,3.49,3.49,0,0,1,.94,1.67.5.5,0,0,1-.42.57.52.52,0,0,1-.57-.42,2.5,2.5,0,0,0-.71-1.16,3.77,3.77,0,0,0-.81-.79,1,1,0,0,0-.8-.15.84.84,0,0,0-.46.51,2.08,2.08,0,0,0-.09.9,4.27,4.27,0,0,0,2.14,3.29.55.55,0,0,1,.29.11l.14.12a.49.49,0,0,1-.32.88Z" fill="#231f20"/><path d="M85.48,177.44a.48.48,0,0,1-.35-.16,87.46,87.46,0,0,1-6.38-7.34.5.5,0,0,1,.1-.7.51.51,0,0,1,.7.1,88.84,88.84,0,0,0,6.29,7.25.49.49,0,0,1,0,.7A.47.47,0,0,1,85.48,177.44Z" fill="#231f20"/><ellipse cx="78.15" cy="142.15" rx="0.79" ry="0.31" transform="translate(-66.11 216.34) rotate(-88.41)" fill="#231f20"/><path d="M60.73,172.12h-.08a.51.51,0,0,1-.41-.58c.07-.43,1.73-10.61,3.61-14a.49.49,0,0,1,.68-.19.48.48,0,0,1,.19.67c-1.79,3.27-3.48,13.61-3.49,13.71A.5.5,0,0,1,60.73,172.12Z" fill="#231f20"/><path d="M323.2,203a7.55,7.55,0,0,0-.86-4.06c-.55-.91-1.38-1.63-1.83-2.58-.77-1.65-.23-3.6-.41-5.41a6.73,6.73,0,0,0-1.9-4c-.95-1-2.17-1.62-3.08-2.61-1.49-1.65-1.91-3.95-2.76-6a14.9,14.9,0,0,0-5.94-7c1.62,3.26-2.07,7.4-.4,10.64.53,1,1.55,1.77,1.94,2.85.93,2.63-2.19,5.47-1.19,8.07.5,1.3,1.89,2,2.54,3.28.87,1.66.18,3.68.25,5.55.1,2.59,1.68,4.9,3.55,6.69,1.16,1.12,2.46,2.08,3.71,3.09,1.51,1.21,2.15,2.47,3.47.54A16.61,16.61,0,0,0,323.2,203Z" fill="#231f20"/><path d="M324.88,204.47c-.48-2-.83-4.17,0-6.06.92-2.13,3.22-3.64,3.49-5.95.18-1.52-.59-3.05-.29-4.55s1.52-2.51,2.53-3.61a15.17,15.17,0,0,0,3.91-9.25,23.49,23.49,0,0,1,3.72,6.15,7.93,7.93,0,0,1-.54,6.94,6.4,6.4,0,0,0-.95,1.55c-.45,1.47.81,2.85,1.46,4.24a4.87,4.87,0,0,1-.46,5c-1.32,1.65-3.87,2.29-4.52,4.3a9.59,9.59,0,0,0-.23,2.28,6.7,6.7,0,0,1-4.81,5.74c-1.57.38-1.54-.24-1.82-1.56C326,208,325.31,206.24,324.88,204.47Z" fill="#231f20"/><path d="M319.9,190.08c-1.11-3.85-1.55-7.86-2.73-11.69a65,65,0,0,0-3.63-8.72l4.77,2c1.53.64,3.18,1.4,3.9,2.9,1.26,2.6-1,5.93.32,8.5a20.34,20.34,0,0,0,1.89,2.38c1.4,2,1.19,4.68.42,7-.33,1-1.78,6.09-3.07,4.67-.52-.56-.56-2.68-.78-3.45C320.66,192.46,320.25,191.28,319.9,190.08Z" fill="#231f20"/>
                            <path d="M322.42,241.17c-.95-6.28-3.93-28.43-4-28.66l1-.13c0,.22,3,22.37,4,28.64Z" fill="#231f20"/>
                            <path d="M323.72,247.09h-1c0-7.47,3.18-36,5-38l.74.68C327.07,211.28,323.78,238.83,323.72,247.09Z" fill="#231f20"/>
                            <path d="M325.33,245.67l-1,0c.71-16.08-2.7-49.86-2.73-50.2l1-.1C322.63,195.67,326.05,229.52,325.33,245.67Z" fill="#231f20"/>
                            <path d="M314.34,223.15h17.75l-1.24,20.16c-.22,3.49-2.8,6.2-5.92,6.2H321.5c-3.12,0-5.7-2.71-5.92-6.2Z" fill="#fff"/>
                            <path d="M324.93,250H321.5c-3.38,0-6.2-2.93-6.43-6.68l-1.25-20.16a.53.53,0,0,1,.14-.38.52.52,0,0,1,.38-.17h17.75a.52.52,0,0,1,.38.17.53.53,0,0,1,.14.38l-1.25,20.16C331.13,247.09,328.31,250,324.93,250Zm-10-26.35,1.21,19.61c.19,3.2,2.57,5.71,5.4,5.71h3.43c2.83,0,5.21-2.51,5.4-5.71l1.21-19.61Z" fill="#231f20"/>
                            <rect x="169.46" y="176.94" width="60.82" height="14.46" rx="5.29" fill="#042552" class="target-color"/>
                        </g>
                    </svg>


                </div>
            @endif
        </div>
    </div>































{{--    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#chercherEtdsParFiliereModal">chercher Etudiants ou le Code Qr </button>--}}
{{--    <div class="modal fade" id="chercherEtdsParFiliereModal" tabindex="-1" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel1">chercher Etudiants Par Filiere</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <form method="post" action="{{route("etudiants.chercherEtdsParFiliere")}}">--}}
{{--                    @csrf--}}
{{--                    <div class="modal-body">--}}
{{--                        <div class="col-12" >--}}
{{--                            <div class="row g-2">--}}
{{--                                <div class="col px-0  mb-0">--}}
{{--                                    <div class=" px-0 mb-3">--}}
{{--                                        <label for="filiere" class="form-label">Filiere</label>--}}
{{--                                        <select name="id_filiere" id="filiere" class="form-select-lg form-select">--}}
{{--                                            <option value="" selected disabled>Select Filiere</option>--}}
{{--                                            @foreach($filieres as $filiere)--}}
{{--                                                <option data-type="{{ $filiere->type }}" value="{{ $filiere->id }}" >{{ $filiere->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                        @error("id_filiere")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12" >--}}
{{--                            <div class="row g-2">--}}
{{--                                <div class="col px-0  mb-0">--}}
{{--                                    <div class=" px-0 mb-3">--}}
{{--                                        <label for="emailBasic" class="form-label">Semestre</label>--}}
{{--                                        <select name="name_semestre" id="semestre" class="form-select-lg form-select">--}}
{{--                                            <option value="" selected disabled>Select Semestre</option>--}}
{{--                                        </select>--}}
{{--                                        @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="col-12" >--}}
{{--                            <div class="row" >--}}
{{--                                <div class="col-6" >--}}
{{--                                    <div class="row g-2">--}}
{{--                                        <div class="col px-0  mb-0">--}}
{{--                                            <div class=" px-0 mb-3">--}}
{{--                                                <label for="element" class="form-label">Element</label>--}}
{{--                                                <select name="id_element" id="element" class="form-select-lg form-select">--}}
{{--                                                    <option value="" selected disabled>Select Element</option>--}}
{{--                                                    @foreach($elements as $element)--}}
{{--                                                        <option value="{{ $element->id }}" >{{ $element->name }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                                @error("id_element")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-6" >--}}
{{--                                    <div class="row g-2">--}}
{{--                                        <div class="col px-0  mb-0">--}}
{{--                                            <div class=" px-0 mb-3">--}}
{{--                                                <label for="nameBasic" class="form-label">Date</label>--}}
{{--                                                <input type="date" value="{{old("date")}}" name="date" id="nameBasic" class="form-control form-control-lg"  />--}}
{{--                                                @error("date")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12" >--}}
{{--                            <div class="row" >--}}
{{--                                <div class="col-6" >--}}
{{--                                    <div class="row g-2">--}}
{{--                                        <div class="col px-0  mb-0">--}}
{{--                                            <div class=" px-0 mb-3">--}}
{{--                                                <label for="largeSelect" class="form-label">Type</label>--}}
{{--                                                <select name="type" id="largeSelect" class="form-select-lg form-select">--}}
{{--                                                    <option selected disabled >select type</option>--}}
{{--                                                    <option value="tp" {{ old('type') == 'tp' ? 'selected' : '' }} >Traveaux Pratique</option>--}}
{{--                                                    <option value="cour" {{ old('type') == 'cour' ? 'selected' : '' }} >Cour</option>--}}
{{--                                                </select>--}}
{{--                                                @error("type")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-6" >--}}
{{--                                    <div class="row g-2">--}}
{{--                                        <div class="col px-0  mb-0">--}}
{{--                                            <div class=" px-0 mb-3">--}}
{{--                                                <label for="periode" class="form-label">Periode</label>--}}
{{--                                                <select name="id_periode" id="periode" class="form-select-lg form-select">--}}
{{--                                                    <option value="" selected disabled>Select Periode</option>--}}
{{--                                                    @foreach($periodes as $periode)--}}
{{--                                                        <option value="{{ $periode->id }}" >{{ $periode->libelle }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                                @error("id_periode")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-dismiss="modal">Close</button>--}}
{{--                        <button type="submit"  class="btn-lg btn-danger ">envoyer</button>--}}
{{--                    </div>--}}
{{--                </form>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row  " style="height: 90%" >--}}
{{--        <div class="col-12   " >--}}
{{--            @if(isset($etudiants) )--}}
{{--                <div class="nav-align-top   h-100 p-3">--}}
{{--                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">--}}
{{--                        <li class="nav-item">--}}
{{--                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#codeQr" aria-controls="codeQr" aria-selected="true">--}}
{{--                                <i class="tf-icons bx bx-home"></i> code qr--}}
{{--                            </button>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#etdsLists" aria-controls="etdsLists" aria-selected="false">--}}
{{--                                <i class="tf-icons bx bx-user"></i> list of etudiant--}}
{{--                            </button>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <div class="tab-content h-100">--}}
{{--                        <div class="tab-pane fade active show   h-100" id="codeQr" role="tabpanel">--}}
{{--                            <div class="d-flex justify-content-center align-items-center h-100" >--}}
{{--                            {!! $qrCode !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane fade" id="etdsLists" role="tabpanel">--}}
{{--                            <div class="mt-3 card">--}}

{{--                                <div class="row">--}}
{{--                                    <div class="col-12">--}}
{{--                                        <form action="{{ route('mark.absences') }}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="id_seance" value="{{$seance->id}}">--}}

{{--                                <div class="table-responsive text-nowrap">--}}
{{--                                    <table class="table">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th class="text-center" >Name</th>--}}
{{--                                            <th class="text-center" >CIN</th>--}}
{{--                                            <th class="text-center" >Apogee</th>--}}
{{--                                            <th  class="text-center" >CNE</th>--}}
{{--                                            <th  class="text-center"  >Absence</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody class="table-border-bottom-0">--}}
{{--                                        @forelse($etudiants as $etudiant )--}}
{{--                                            <tr>--}}
{{--                                                <td class="text-center" >{{$etudiant->user->name}}</td>--}}
{{--                                                <td class="text-center" >{{$etudiant->user->cin}}</td>--}}
{{--                                                <td class="text-center" >{{$etudiant->apogee}}</td>--}}
{{--                                                <td class="text-center" >{{$etudiant->cne}}</td>--}}
{{--                                                <td class="text-center">--}}
{{--                                                    <input type="checkbox" name="absent_students[]" value="{{$etudiant->id}}">--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        @empty--}}
{{--                                            <tr>--}}
{{--                                                <td>no etudiants</td>--}}
{{--                                            </tr>--}}
{{--                                        @endforelse--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}


{{--                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">--}}
{{--                                    <button type="submit" class="btn btn-danger">Mark Absences</button>--}}
{{--                                </div>--}}
{{--                                </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            @else--}}
{{--                <div class="d-flex align-items-center justify-content-center h-100" >--}}
{{--                    <img src="{{asset("assets/img/avatars/Mar-Business_2-removebg-preview.png")}}" class="h-50 border rounded-3" >--}}


{{--                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300" data-imageid="search-engine-flatline-9e6d8" imageName="Search engine" class="illustrations_image" style="width: 450px;"><g id="_531_search_engine_flatline" data-name="#531_search_engine_flatline">--}}
{{--                            <path d="M347.38,239.81H52.62a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5H347.38a.5.5,0,0,1,.5.5A.5.5,0,0,1,347.38,239.81Z" fill="#d1d3d4"/>--}}
{{--                            <path d="M332.11,54.62v148.6a11.26,11.26,0,0,1-11.26,11.27H79.15a11.26,11.26,0,0,1-11.26-11.27V54.62A11.27,11.27,0,0,1,79.15,43.35h241.7A11.27,11.27,0,0,1,332.11,54.62Z" fill="#fff"/><path d="M320.85,215H79.15a11.77,11.77,0,0,1-11.76-11.77V54.62A11.77,11.77,0,0,1,79.15,42.85h241.7a11.77,11.77,0,0,1,11.76,11.77v148.6A11.77,11.77,0,0,1,320.85,215ZM79.15,43.85A10.78,10.78,0,0,0,68.39,54.62v148.6A10.78,10.78,0,0,0,79.15,214h241.7a10.78,10.78,0,0,0,10.76-10.77V54.62a10.78,10.78,0,0,0-10.76-10.77Z" fill="#231f20"/><path d="M332.11,54.62v8.05H67.89V54.62A11.27,11.27,0,0,1,79.15,43.35h241.7A11.27,11.27,0,0,1,332.11,54.62Z" fill="#231f20"/><path d="M332.11,63.11H67.89a.44.44,0,0,1-.44-.44V54.62a11.72,11.72,0,0,1,11.7-11.71h241.7a11.72,11.72,0,0,1,11.7,11.71v8.05A.44.44,0,0,1,332.11,63.11ZM68.33,62.23H331.67V54.62a10.84,10.84,0,0,0-10.82-10.83H79.15A10.84,10.84,0,0,0,68.33,54.62Z" fill="#231f20"/><polygon points="175.45 62.67 165.91 47.14 115.03 47.14 104.35 62.67 67.89 62.67 67.89 86.35 332.11 86.35 332.11 62.67 175.45 62.67" fill="#042552" class="target-color"/>--}}
{{--                            <path d="M332.11,86.85H67.89a.5.5,0,0,1-.5-.5V62.67a.5.5,0,0,1,.5-.5h36.2l10.53-15.31a.49.49,0,0,1,.41-.22h50.88a.5.5,0,0,1,.43.24l9.39,15.29H332.11a.5.5,0,0,1,.5.5V86.35A.5.5,0,0,1,332.11,86.85Zm-263.72-1H331.61V63.17H175.45a.52.52,0,0,1-.43-.24l-9.39-15.29H115.29L104.76,63a.49.49,0,0,1-.41.22h-36Z" fill="#231f20"/>--}}
{{--                            <circle cx="80.12" cy="53.01" r="2.7" fill="#042552" class="target-color"/>--}}
{{--                            <circle cx="89.2" cy="53.01" r="2.7" fill="#fff"/>--}}
{{--                            <circle cx="98.28" cy="53.01" r="2.7" fill="#fff"/>--}}
{{--                            <rect x="103.08" y="134.74" width="200.21" height="22.11" fill="#fff"/>--}}
{{--                            <path d="M303.29,157.35H103.08a.5.5,0,0,1-.5-.5V134.74a.5.5,0,0,1,.5-.5H303.29a.5.5,0,0,1,.5.5v22.11A.5.5,0,0,1,303.29,157.35Zm-199.71-1H302.79V135.24H103.58Z" fill="#231f20"/>--}}
{{--                            <text transform="translate(162.56 121.52)" font-size="28.22" font-family="MyriadPro-Regular, Myriad Pro">--}}
{{--                                <tspan letter-spacing="0.01em">S</tspan>--}}
{{--                                <tspan x="14.08" y="0">ea</tspan>--}}
{{--                                <tspan x="41.82" y="0" letter-spacing="-0.01em">r</tspan>--}}
{{--                                <tspan x="50.77" y="0">ch</tspan>--}}
{{--                            </text>--}}
{{--                            <path d="M277.13,157.35h0a.5.5,0,0,1-.5-.51c.1-8.25.19-20.77,0-21.91a.58.58,0,0,1,0-.19.52.52,0,0,1,.86-.35c.19.19.4.41.14,22.47A.49.49,0,0,1,277.13,157.35Z" fill="#231f20"/><rect x="103.08" y="68.24" width="207.23" height="12.85" rx="5.96" fill="#fff"/><path d="M301,77.55a.53.53,0,0,1-.3-.09.51.51,0,0,1-.2-.49l.37-2.15-1.56-1.53a.49.49,0,0,1-.13-.51.51.51,0,0,1,.41-.34l2.16-.31,1-2a.51.51,0,0,1,.45-.28h0a.51.51,0,0,1,.45.28l1,2,2.16.31a.51.51,0,0,1,.41.34.49.49,0,0,1-.13.51l-1.56,1.53.37,2.15a.51.51,0,0,1-.2.49.53.53,0,0,1-.53,0l-1.93-1-1.93,1A.59.59,0,0,1,301,77.55Zm-.27-4.27,1,1a.5.5,0,0,1,.14.45l-.24,1.41,1.27-.67a.53.53,0,0,1,.46,0l1.27.67-.24-1.41a.5.5,0,0,1,.14-.45l1-1-1.42-.2a.54.54,0,0,1-.38-.28l-.63-1.28-.63,1.28a.54.54,0,0,1-.38.28Z" fill="#d1d3d4"/>--}}
{{--                            <path d="M325.92,70.89h-7.5a.5.5,0,0,1,0-1h7.5a.5.5,0,0,1,0,1Z" fill="#231f20"/>--}}
{{--                            <path d="M325.92,74.22h-7.5a.5.5,0,0,1-.5-.5.51.51,0,0,1,.5-.5h7.5a.5.5,0,0,1,.5.5A.5.5,0,0,1,325.92,74.22Z" fill="#231f20"/>--}}
{{--                            <path d="M325.92,77.55h-7.5a.5.5,0,0,1-.5-.5.51.51,0,0,1,.5-.5h7.5a.5.5,0,0,1,.5.5A.5.5,0,0,1,325.92,77.55Z" fill="#231f20"/>--}}
{{--                            <path d="M183.81,59.13a.5.5,0,0,1-.5-.5V50.74a.5.5,0,0,1,.5-.5.5.5,0,0,1,.5.5v7.89A.5.5,0,0,1,183.81,59.13Z" fill="#d1d3d4"/>--}}
{{--                            <path d="M187.76,55.19h-7.9a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5h7.9a.5.5,0,0,1,.5.5A.51.51,0,0,1,187.76,55.19Z" fill="#d1d3d4"/>--}}
{{--                            <path d="M81.58,75.93H74.47a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5h7.11a.51.51,0,0,1,.5.5A.5.5,0,0,1,81.58,75.93Z" fill="#231f20"/>--}}
{{--                            <path d="M76.38,79.27a.51.51,0,0,1-.39-.19l-2.7-3.33a.5.5,0,0,1,0-.64l2.92-3.41a.5.5,0,0,1,.76.65l-2.65,3.09,2.44,3a.49.49,0,0,1-.08.7A.47.47,0,0,1,76.38,79.27Z" fill="#231f20"/>--}}
{{--                            <path d="M92.57,75.93H85.46a.5.5,0,0,1-.5-.5.5.5,0,0,1,.5-.5h7.11a.51.51,0,0,1,.5.5A.5.5,0,0,1,92.57,75.93Z" fill="#231f20"/>--}}
{{--                            <path d="M90.66,79.27a.51.51,0,0,1-.32-.12.5.5,0,0,1-.07-.7l2.44-3-2.65-3.09a.49.49,0,0,1,0-.7.51.51,0,0,1,.71,0l2.92,3.41a.51.51,0,0,1,0,.64l-2.7,3.33A.52.52,0,0,1,90.66,79.27Z" fill="#231f20"/><path d="M288.74,148.81a4.85,4.85,0,1,1,3.43-1.42A4.83,4.83,0,0,1,288.74,148.81Zm0-8.68a3.83,3.83,0,0,0-2.71,6.55,3.92,3.92,0,0,0,5.43,0,3.84,3.84,0,0,0-2.72-6.55Z" fill="#231f20"/>--}}
{{--                            <path d="M296.75,152.47a.51.51,0,0,1-.36-.15l-4.93-4.93a.5.5,0,0,1,0-.71.51.51,0,0,1,.71,0l4.93,4.93a.51.51,0,0,1,0,.71A.5.5,0,0,1,296.75,152.47Z" fill="#231f20"/><path d="M191.7,146.3H112.88a.51.51,0,0,1-.5-.5.5.5,0,0,1,.5-.5H191.7a.5.5,0,0,1,.5.5A.5.5,0,0,1,191.7,146.3Z" fill="#d1d3d4"/><rect x="112.16" y="142.35" width="8.23" height="11.34" transform="translate(164.99 -33.79) rotate(53.15)" fill="#fff"/>--}}
{{--                            <path d="M114.2,155.21a.48.48,0,0,1-.4-.2l-4.94-6.58a.51.51,0,0,1,.1-.7l9.08-6.8a.5.5,0,0,1,.7.1l4.93,6.58a.5.5,0,0,1,.1.37.48.48,0,0,1-.2.33l-9.07,6.8A.49.49,0,0,1,114.2,155.21Zm-4.24-7L114.3,154l8.27-6.2L118.24,142Z" fill="#231f20"/><rect x="103.47" y="148.65" width="5.42" height="13.86" transform="translate(167 -22.7) rotate(53.15)" fill="#231f20"/><path d="M102.27,162.35a.44.44,0,0,1-.36-.18l-3.25-4.34a.42.42,0,0,1-.08-.33.44.44,0,0,1,.17-.29l11.09-8.31a.44.44,0,0,1,.62.09l3.25,4.34a.42.42,0,0,1,.08.33.4.4,0,0,1-.17.29l-11.09,8.31A.43.43,0,0,1,102.27,162.35Zm-2.64-4.7,2.72,3.64,10.39-7.79L110,149.87Z" fill="#231f20"/>--}}
{{--                            <path d="M121.07,144.05a18.17,18.17,0,1,1,25.43,3.64A18.16,18.16,0,0,1,121.07,144.05Zm32.55-24.4a22.52,22.52,0,1,0-4.51,31.52A22.51,22.51,0,0,0,153.62,119.65Z" fill="#042552" class="target-color"/>--}}
{{--                            <path d="M135.65,156.18a23.24,23.24,0,0,1-3.31-.24,22.86,22.86,0,1,1,3.31.24Zm-.07-45a22,22,0,1,0,17.64,8.8h0A22,22,0,0,0,135.58,111.15Zm0,40.66a18.64,18.64,0,0,1-15-7.46h0a18.69,18.69,0,1,1,15,7.46Zm-14.16-8.06A17.66,17.66,0,1,0,125,119a17.69,17.69,0,0,0-3.54,24.73Z" fill="#231f20"/><path d="M69.91,184.85l-2-2.68a2.44,2.44,0,0,1,.48-3.41L98,156.57a2.44,2.44,0,0,1,3.41.48l2,2.69a2.43,2.43,0,0,1-.49,3.41L73.32,185.34A2.43,2.43,0,0,1,69.91,184.85Z" fill="#fff"/><path d="M71.86,186.33l-.42,0a2.89,2.89,0,0,1-1.93-1.15l-2-2.68a2.89,2.89,0,0,1-.56-2.18,2.92,2.92,0,0,1,1.14-1.93l29.65-22.19a2.89,2.89,0,0,1,2.18-.56,2.92,2.92,0,0,1,1.93,1.14l2,2.69a2.93,2.93,0,0,1-.59,4.11L73.62,185.74A3,3,0,0,1,71.86,186.33Zm27.63-29.75a1.89,1.89,0,0,0-1.16.39L68.68,179.16a1.91,1.91,0,0,0-.75,1.27,1.85,1.85,0,0,0,.37,1.44l2,2.68h0a1.93,1.93,0,0,0,1.27.76,2,2,0,0,0,1.44-.37l29.64-22.19a1.93,1.93,0,0,0,.39-2.71l-2-2.69a1.91,1.91,0,0,0-1.27-.75A1.37,1.37,0,0,0,99.49,156.58Z" fill="#231f20"/>--}}
{{--                            <path d="M93,169.43l5.49,5.67s7.78-11.6,7.63-12.95a23.57,23.57,0,0,1,.58-7.29.55.55,0,0,1,.2-.38c.28-.18.58.2.69.52.25.76.27,1.6.5,2.33,1.24-.71,2.44-1.57,3.66-2.34,2-1.27,1.4,3.61,1.23,4.28-.44,1.8-1.28,3.91-2.86,5,0,0-9.37,20.86-11.4,20.63s-10-9.25-10-9.25Z" fill="#fff"/>--}}
{{--                            <path d="M98.76,185.41H98.7c-2.11-.24-9-7.88-10.35-9.41a.51.51,0,0,1,0-.62l4.32-6.23a.52.52,0,0,1,.37-.22.57.57,0,0,1,.4.15l5.06,5.23c3.58-5.38,7.18-11.26,7.2-12.12a24.61,24.61,0,0,1,.59-7.44,1,1,0,0,1,.42-.7.76.76,0,0,1,.69-.07,1.39,1.39,0,0,1,.74.86,7.59,7.59,0,0,1,.29,1.3c0,.14,0,.28.07.42.58-.36,1.16-.75,1.73-1.12s.88-.59,1.33-.87a1.21,1.21,0,0,1,1.47-.09c1.29.92.53,4.87.52,4.91a9.35,9.35,0,0,1-2.94,5.22C107,172.47,100.88,185.41,98.76,185.41Zm-9.4-9.78c3.08,3.44,8.15,8.64,9.45,8.78,1.24-.35,6.53-10.62,10.9-20.33a.56.56,0,0,1,.17-.21c1.5-1.06,2.27-3.15,2.66-4.72.22-.9.35-3.52-.13-3.86,0,0-.17,0-.36.12l-1.31.86c-.77.51-1.56,1-2.36,1.5a.54.54,0,0,1-.43,0,.53.53,0,0,1-.3-.32,9.52,9.52,0,0,1-.25-1.18,7.24,7.24,0,0,0-.23-1.09,23.06,23.06,0,0,0-.51,6.89c.15,1.42-5.87,10.52-7.71,13.28a.55.55,0,0,1-.38.22.52.52,0,0,1-.4-.15l-5.06-5.23Z" fill="#231f20"/><path d="M56.86,250.7S55,256,55.79,256.45s17.76,0,16.75-1S67,251,67,251" fill="#fff"/><path d="M59.9,257.14a19.33,19.33,0,0,1-4.36-.26c-.8-.48-.51-2.61.85-6.35a.52.52,0,0,1,.65-.3.49.49,0,0,1,.29.64c-.84,2.31-1.39,4.61-1.24,5.16,1.47.33,13,0,15.66-.63-1.46-1.27-5-3.93-5-4a.51.51,0,0,1-.1-.7.5.5,0,0,1,.7-.1c.19.14,4.55,3.42,5.58,4.44a.6.6,0,0,1,.06.82C72.29,256.74,64.86,257.14,59.9,257.14Z" fill="#231f20"/><path d="M69,151.83c-.79.11-1.6.11-2.53.2s-2,0-2.18-.89.62-1.48.3-2.15a1.59,1.59,0,0,0-.39-.46,8,8,0,0,1-.6-11.06.44.44,0,0,1-.59-.31,1,1,0,0,1,.15-.74,5,5,0,0,1,2.1-1.86A15.21,15.21,0,0,1,74.09,133c2.33.25,5.29,1.53,5.48,4.25a2.14,2.14,0,0,1-1.47,2.26c0,2.94-1.12,5.16-2.63,7.57a11.72,11.72,0,0,1-4.06,4A6.63,6.63,0,0,1,69,151.83Z" fill="#fff"/><path d="M66,152.55c-1.23,0-2.05-.47-2.21-1.31A2.29,2.29,0,0,1,64,150c.14-.36.21-.59.14-.75a1.2,1.2,0,0,0-.25-.28,8.51,8.51,0,0,1-1.12-11.21.93.93,0,0,1-.24-.42,1.45,1.45,0,0,1,.19-1.11,5.53,5.53,0,0,1,2.3-2.06,15.84,15.84,0,0,1,9.13-1.65c2.8.3,5.72,1.88,5.92,4.71a2.75,2.75,0,0,1-1.47,2.66,14.42,14.42,0,0,1-2.7,7.47,12.15,12.15,0,0,1-4.25,4.16,6.83,6.83,0,0,1-2.58.85c-.48.07-1,.1-1.46.13-.35,0-.71,0-1.09.08ZM63.6,137a.51.51,0,0,1,.39.19.5.5,0,0,1,0,.64,7.48,7.48,0,0,0,.56,10.36,2.15,2.15,0,0,1,.5.61,1.91,1.91,0,0,1-.1,1.53,1.5,1.5,0,0,0-.16.74c.1.5,1.08.54,1.64.49.4,0,.77-.06,1.13-.08s.93-.06,1.38-.12h0a5.92,5.92,0,0,0,2.23-.73,11.17,11.17,0,0,0,3.89-3.82c1.63-2.61,2.57-4.64,2.55-7.3A.5.5,0,0,1,78,139a1.65,1.65,0,0,0,1.08-1.74c-.18-2.58-3.24-3.59-5-3.78A14.74,14.74,0,0,0,65.5,135a4.37,4.37,0,0,0-1.9,1.66.63.63,0,0,0-.11.33Z" fill="#231f20"/><path d="M59.38,168s-6.26,12.68-5.75,16.57S67,186.93,67,186.93l-.67-19.28Z" fill="#fff"/><path d="M61.73,187.74c-3.81,0-8.26-.56-8.6-3.11-.52-4,5.54-16.34,5.8-16.86a.49.49,0,0,1,.43-.28l6.93-.34a.47.47,0,0,1,.36.13.48.48,0,0,1,.16.35l.68,19.28a.5.5,0,0,1-.44.52A49.94,49.94,0,0,1,61.73,187.74Zm-2-19.27c-.89,1.83-6,12.63-5.58,16,.32,2.4,7.56,2.5,12.36,2l-.65-18.32Z" fill="#231f20"/><path d="M84.25,248.22l.33,8.23s15.45.12,14.55-1-7.89-6.09-7.89-6.09l-1.13-6.09Z" fill="#fff"/><path d="M86.73,257H84.58a.5.5,0,0,1-.5-.48l-.33-8.23a.48.48,0,0,1,.17-.4l5.87-5a.48.48,0,0,1,.49-.09.5.5,0,0,1,.32.38l1.09,5.89c1.23.87,7,5,7.83,6.07a.63.63,0,0,1,.09.67C99.46,256.09,99,257,86.73,257Zm-1.67-1c5.65,0,11.66-.17,13.33-.56C97,254.13,92.68,251,91,249.76a.48.48,0,0,1-.2-.32l-1-5.24-5,4.24Z" fill="#231f20"/><path d="M87,190.35l6,60.13-9.5-.62-9.15-41.63L68.14,251l-11.5-.56s1-27.46,2.07-36.56,1.09-21.29,1.09-21.29Z" fill="#231f20"/><path d="M79.61,143.49s2.64,3,2.29,3.73-1.92.51-1.92.51" fill="#fff"/><path d="M80.53,148.27a3.91,3.91,0,0,1-.62-.05.5.5,0,1,1,.15-1c.5.08,1.27,0,1.39-.22a11.64,11.64,0,0,0-2.21-3.19.5.5,0,0,1,.75-.66c1.3,1.47,2.77,3.41,2.36,4.28A1.93,1.93,0,0,1,80.53,148.27Z" fill="#231f20"/><path d="M78.54,139.2c1.54.94,1.47,3.39,1.68,4.94q.44,3.29.72,6.59c.12,1.4-3.46,1.93-4.15,1.61l1.33,5.39-8-1.83-.65-6.35a4.58,4.58,0,0,0,3.38-3.34c1-3,.33-7.36.33-7.36S77,138.29,78.54,139.2Z" fill="#fff"/><path d="M78.12,158.23H78l-8-1.83a.51.51,0,0,1-.39-.44L69,149.6a.52.52,0,0,1,.43-.55,4,4,0,0,0,3-3c1-2.87.33-7.08.32-7.12a.48.48,0,0,1,.09-.37.5.5,0,0,1,.33-.2c.41-.06,4-.56,5.63.42s1.69,2.88,1.84,4.46c0,.3.05.58.09.84.29,2.18.53,4.41.72,6.61a1.47,1.47,0,0,1-.75,1.36,6.46,6.46,0,0,1-3.23.88h0l1.16,4.68a.5.5,0,0,1-.49.62Zm-7.49-2.73,6.81,1.56-1.14-4.6a.51.51,0,0,1,.7-.58,5.19,5.19,0,0,0,3.14-.66c.22-.16.32-.31.31-.45-.19-2.18-.44-4.39-.72-6.56,0-.27-.07-.56-.1-.87-.13-1.36-.29-3.06-1.35-3.71s-3.24-.48-4.49-.34a18.18,18.18,0,0,1-.42,7.08,5.27,5.27,0,0,1-3.31,3.56Z" fill="#231f20"/><path d="M94.56,169.92S85.69,160.55,82.18,157c-3.26-3.27-12.74-6.24-17.05-1.56,0,0-7.1,9.9-8.46,15.65l4.15,2.53a188.74,188.74,0,0,0-1.61,20.56C67,200.4,87,190.35,87,190.35l-1.81-14.1,3.24,3.23Z" fill="#042552" class="target-color"/><path d="M80.66,149.11a1.8,1.8,0,0,1-2.7-.35" fill="#fff"/><path d="M79.37,150.09l-.27,0a2.23,2.23,0,0,1-1.54-1,.51.51,0,0,1,.11-.7.52.52,0,0,1,.7.12,1.3,1.3,0,0,0,.86.61,1.66,1.66,0,0,0,1.11-.36.52.52,0,0,1,.71.07.5.5,0,0,1-.07.7A2.75,2.75,0,0,1,79.37,150.09Z" fill="#231f20"/><path d="M75.62,145.48a3.09,3.09,0,0,0-.83-1.41,3.88,3.88,0,0,0-.93-.88,1.46,1.46,0,0,0-1.23-.2,1.36,1.36,0,0,0-.76.8,2.55,2.55,0,0,0-.12,1.13,4.71,4.71,0,0,0,2.75,3.85l-.14-.11" fill="#fff"/>--}}
{{--                            <path d="M74.5,149.27a.45.45,0,0,1-.2,0,5.2,5.2,0,0,1-3-4.27,3.21,3.21,0,0,1,.15-1.35,1.84,1.84,0,0,1,1.06-1.09,2,2,0,0,1,1.66.24,4.72,4.72,0,0,1,1,1,3.49,3.49,0,0,1,.94,1.67.5.5,0,0,1-.42.57.52.52,0,0,1-.57-.42,2.5,2.5,0,0,0-.71-1.16,3.77,3.77,0,0,0-.81-.79,1,1,0,0,0-.8-.15.84.84,0,0,0-.46.51,2.08,2.08,0,0,0-.09.9,4.27,4.27,0,0,0,2.14,3.29.55.55,0,0,1,.29.11l.14.12a.49.49,0,0,1-.32.88Z" fill="#231f20"/><path d="M85.48,177.44a.48.48,0,0,1-.35-.16,87.46,87.46,0,0,1-6.38-7.34.5.5,0,0,1,.1-.7.51.51,0,0,1,.7.1,88.84,88.84,0,0,0,6.29,7.25.49.49,0,0,1,0,.7A.47.47,0,0,1,85.48,177.44Z" fill="#231f20"/><ellipse cx="78.15" cy="142.15" rx="0.79" ry="0.31" transform="translate(-66.11 216.34) rotate(-88.41)" fill="#231f20"/><path d="M60.73,172.12h-.08a.51.51,0,0,1-.41-.58c.07-.43,1.73-10.61,3.61-14a.49.49,0,0,1,.68-.19.48.48,0,0,1,.19.67c-1.79,3.27-3.48,13.61-3.49,13.71A.5.5,0,0,1,60.73,172.12Z" fill="#231f20"/><path d="M323.2,203a7.55,7.55,0,0,0-.86-4.06c-.55-.91-1.38-1.63-1.83-2.58-.77-1.65-.23-3.6-.41-5.41a6.73,6.73,0,0,0-1.9-4c-.95-1-2.17-1.62-3.08-2.61-1.49-1.65-1.91-3.95-2.76-6a14.9,14.9,0,0,0-5.94-7c1.62,3.26-2.07,7.4-.4,10.64.53,1,1.55,1.77,1.94,2.85.93,2.63-2.19,5.47-1.19,8.07.5,1.3,1.89,2,2.54,3.28.87,1.66.18,3.68.25,5.55.1,2.59,1.68,4.9,3.55,6.69,1.16,1.12,2.46,2.08,3.71,3.09,1.51,1.21,2.15,2.47,3.47.54A16.61,16.61,0,0,0,323.2,203Z" fill="#231f20"/><path d="M324.88,204.47c-.48-2-.83-4.17,0-6.06.92-2.13,3.22-3.64,3.49-5.95.18-1.52-.59-3.05-.29-4.55s1.52-2.51,2.53-3.61a15.17,15.17,0,0,0,3.91-9.25,23.49,23.49,0,0,1,3.72,6.15,7.93,7.93,0,0,1-.54,6.94,6.4,6.4,0,0,0-.95,1.55c-.45,1.47.81,2.85,1.46,4.24a4.87,4.87,0,0,1-.46,5c-1.32,1.65-3.87,2.29-4.52,4.3a9.59,9.59,0,0,0-.23,2.28,6.7,6.7,0,0,1-4.81,5.74c-1.57.38-1.54-.24-1.82-1.56C326,208,325.31,206.24,324.88,204.47Z" fill="#231f20"/><path d="M319.9,190.08c-1.11-3.85-1.55-7.86-2.73-11.69a65,65,0,0,0-3.63-8.72l4.77,2c1.53.64,3.18,1.4,3.9,2.9,1.26,2.6-1,5.93.32,8.5a20.34,20.34,0,0,0,1.89,2.38c1.4,2,1.19,4.68.42,7-.33,1-1.78,6.09-3.07,4.67-.52-.56-.56-2.68-.78-3.45C320.66,192.46,320.25,191.28,319.9,190.08Z" fill="#231f20"/>--}}
{{--                            <path d="M322.42,241.17c-.95-6.28-3.93-28.43-4-28.66l1-.13c0,.22,3,22.37,4,28.64Z" fill="#231f20"/>--}}
{{--                            <path d="M323.72,247.09h-1c0-7.47,3.18-36,5-38l.74.68C327.07,211.28,323.78,238.83,323.72,247.09Z" fill="#231f20"/>--}}
{{--                            <path d="M325.33,245.67l-1,0c.71-16.08-2.7-49.86-2.73-50.2l1-.1C322.63,195.67,326.05,229.52,325.33,245.67Z" fill="#231f20"/>--}}
{{--                            <path d="M314.34,223.15h17.75l-1.24,20.16c-.22,3.49-2.8,6.2-5.92,6.2H321.5c-3.12,0-5.7-2.71-5.92-6.2Z" fill="#fff"/>--}}
{{--                            <path d="M324.93,250H321.5c-3.38,0-6.2-2.93-6.43-6.68l-1.25-20.16a.53.53,0,0,1,.14-.38.52.52,0,0,1,.38-.17h17.75a.52.52,0,0,1,.38.17.53.53,0,0,1,.14.38l-1.25,20.16C331.13,247.09,328.31,250,324.93,250Zm-10-26.35,1.21,19.61c.19,3.2,2.57,5.71,5.4,5.71h3.43c2.83,0,5.21-2.51,5.4-5.71l1.21-19.61Z" fill="#231f20"/>--}}
{{--                            <rect x="169.46" y="176.94" width="60.82" height="14.46" rx="5.29" fill="#042552" class="target-color"/>--}}
{{--                        </g>--}}
{{--                    </svg>--}}


{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

@section( "scripts" )
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const filiereSelect = document.getElementById('filiere');
            const semestreSelect = document.getElementById('semestre');
            semestreSelect.disabled = true;

            filiereSelect.addEventListener('change', function () {
                const selectedFiliereId = filiereSelect.value;
                const selectedFiliereOption = filiereSelect.options[filiereSelect.selectedIndex];
                const selectedFiliereType = selectedFiliereOption.getAttribute('data-type');
                semestreSelect.innerHTML = ''; // Clear previous options

                if (selectedFiliereType === 'dut') {
                    semestreSelect.disabled = false;

                    for (let i = 1; i <= 4; i++) {
                        const option = document.createElement('option');
                        option.value = 'Semestre ' + i;
                        option.textContent = 'Semestre ' + i;
                        semestreSelect.appendChild(option);
                    }
                } else if (selectedFiliereType === 'lp') {
                    semestreSelect.disabled = false;

                    for (let i = 5; i <= 6; i++) {
                        const option = document.createElement('option');
                        option.value = 'Semestre ' + i;
                        option.textContent = 'Semestre ' + i;
                        semestreSelect.appendChild(option);
                    }
                }
            });
        });

    </script>
@endsection



{{--<div class="col-4 bg-primary vh-100 " >--}}
{{--    <div class="row h-100 pt-5  px-3" >--}}
{{--        <div class="col-12 h-25 " >--}}
{{--            <div class="d-flex align-items-center justify-content-center h-100" >--}}

{{--                <img src="{{asset("assets/img/avatars/wwww.jpg")}}" class="h-100 border rounded-3" >--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-12 h-75 pb-5  " >--}}
{{--            <form method="post" action="{{route("etudiants.chercherEtdsParFiliere")}}" class="row mx-0  h-100" >--}}
{{--                @csrf--}}
{{--                <div class="col-12" >--}}
{{--                    <div class="row g-2">--}}
{{--                        <div class="col px-0  mb-0">--}}
{{--                            <div class=" px-0 mb-3">--}}
{{--                                <label for="filiere" class="form-label">Filiere</label>--}}
{{--                                <select name="id_filiere" id="filiere" class="form-select-lg form-select">--}}
{{--                                    <option value="" selected disabled>Select Filiere</option>--}}
{{--                                    @foreach($filieres as $filiere)--}}
{{--                                        <option data-type="{{ $filiere->type }}" value="{{ $filiere->id }}" >{{ $filiere->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                @error("id_filiere")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12" >--}}
{{--                    <div class="row g-2">--}}
{{--                        <div class="col px-0  mb-0">--}}
{{--                            <div class=" px-0 mb-3">--}}
{{--                                <label for="emailBasic" class="form-label">Semestre</label>--}}
{{--                                <select name="name_semestre" id="semestre" class="form-select-lg form-select">--}}
{{--                                    <option value="" selected disabled>Select Semestre</option>--}}
{{--                                </select>--}}
{{--                                @error('name_semestre')<span class="text-danger">{{ $message }}</span>@enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="col-12" >--}}
{{--                    <div class="row" >--}}
{{--                        <div class="col-6" >--}}
{{--                            <div class="row g-2">--}}
{{--                                <div class="col px-0  mb-0">--}}
{{--                                    <div class=" px-0 mb-3">--}}
{{--                                        <label for="element" class="form-label">Element</label>--}}
{{--                                        <select name="id_element" id="element" class="form-select-lg form-select">--}}
{{--                                            <option value="" selected disabled>Select Element</option>--}}
{{--                                            @foreach($elements as $element)--}}
{{--                                                <option value="{{ $element->id }}" >{{ $element->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                        @error("id_element")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-6" >--}}
{{--                            <div class="row g-2">--}}
{{--                                <div class="col px-0  mb-0">--}}
{{--                                    <div class=" px-0 mb-3">--}}
{{--                                        <label for="nameBasic" class="form-label">Date</label>--}}
{{--                                        <input type="date" value="{{old("date")}}" name="date" id="nameBasic" class="form-control form-control-lg"  />--}}
{{--                                        @error("date")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12" >--}}
{{--                    <div class="row" >--}}
{{--                        <div class="col-6" >--}}
{{--                            <div class="row g-2">--}}
{{--                                <div class="col px-0  mb-0">--}}
{{--                                    <div class=" px-0 mb-3">--}}
{{--                                        <label for="largeSelect" class="form-label">Type</label>--}}
{{--                                        <select name="type" id="largeSelect" class="form-select-lg form-select">--}}
{{--                                            <option selected disabled >select type</option>--}}
{{--                                            <option value="tp" {{ old('type') == 'tp' ? 'selected' : '' }} >Traveaux Pratique</option>--}}
{{--                                            <option value="cour" {{ old('type') == 'cour' ? 'selected' : '' }} >Cour</option>--}}
{{--                                        </select>--}}
{{--                                        @error("type")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-6" >--}}
{{--                            <div class="row g-2">--}}
{{--                                <div class="col px-0  mb-0">--}}
{{--                                    <div class=" px-0 mb-3">--}}
{{--                                        <label for="periode" class="form-label">Periode</label>--}}
{{--                                        <select name="id_periode" id="periode" class="form-select-lg form-select">--}}
{{--                                            <option value="" selected disabled>Select Periode</option>--}}
{{--                                            @foreach($periodes as $periode)--}}
{{--                                                <option value="{{ $periode->id }}" >{{ $periode->libelle }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                        @error("id_periode")<span class="text-danger" >{{$message}}</span>@enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-12" >--}}
{{--                    <div class="row" >--}}
{{--                        <div class="col-12  " >--}}
{{--                            <button type="submit"  class="btn-lg btn-danger w-100 ">envoyer</button>--}}
{{--                        </div>--}}
{{--                        --}}{{--                            <div class="col-6 " >--}}
{{--                        --}}{{--                                <button type="submit" formaction="{{route("etudiants.codeQrParSeance")}}" class="btn-lg btn-danger w-100 ">code Qr</button>--}}
{{--                        --}}{{--                            </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
