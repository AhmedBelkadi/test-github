@extends("layouts.professeur_layout")

@section( "prof-dashboard-active" , "active" )

@section("main")
    <x-sidebar />

    <div class="row my-3" style="height: 90%">
        <div class="col-md-3 text-center">
            <div class="d-flex justify-content-center mb-3">
                <div id="timer" class="text-primary fs-1 fw-bold">00:00</div> <!-- Timer display -->
            </div>
            {!! $qrCode !!}
        </div>
        <div class="col-md-9 pt-3">
            <form id="absenceForm" action="{{ route('mark.absences') }}" method="POST">
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
                    <button id="markAbsencesBtn" type="submit" class="btn btn-danger">Mark Absences</button>
                    <div id="loadingSpinner" class="spinner-border text-primary d-none" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                @csrf
                <input type="hidden" name="id_seance" value="{{$seance->id}}">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">CIN</th>
                            <th class="text-center">Apogee</th>
                            <th class="text-center">CNE</th>
                            <th class="text-center">Absent</th>
                        </tr>
                        </thead>
                        <tbody id="etdsElm">

                        </tbody>
                    </table>
                </div>
            </form>
            <div id="errorMessage" class="alert alert-danger mt-3 d-none" role="alert">
                Error fetching data. Please try again.
            </div>
        </div>
    </div>

@endsection

@section("scripts")
    <script>
        const url = "http://127.0.0.1:8000/api/getNotScannedStudents/{{$seance->id}}";
        const etdsElm = document.querySelector("#etdsElm");
        let etudiants = [];
        let elapsedTime = 0;
        let isTimeExpired = false;
        const timerDisplay = document.getElementById("timer");
        const absenceForm = document.getElementById("absenceForm");
        const markAbsencesBtn = document.getElementById("markAbsencesBtn");
        const loadingSpinner = document.getElementById("loadingSpinner");
        const errorMessage = document.getElementById("errorMessage");

        function showLoadingSpinner() {
            loadingSpinner.classList.remove("d-none");
            markAbsencesBtn.setAttribute("disabled", "disabled");
        }

        function hideLoadingSpinner() {
            loadingSpinner.classList.add("d-none");
            markAbsencesBtn.removeAttribute("disabled");
        }

        function showError() {
            errorMessage.classList.remove("d-none");
        }

        fetch(url)
            .then(response => response.json())
            .then(data => {
                etudiants = data.expectedStudents;
                displayExpectedStudents(etudiants);
            })
            .catch(error => {
                console.error('Error:', error);
                showError();
            });

        const f = setInterval(() => {
            elapsedTime += 1000;
            if (elapsedTime >= 60 * 1000) {
                clearInterval(f);
                isTimeExpired = true;
            }
            if (!isTimeExpired) {
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        markAbsentStudents(data.notScannedStudents);
                        hideLoadingSpinner();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showError();
                    });
            }
            const minutes = Math.floor(elapsedTime / 60000);
            const seconds = ((elapsedTime % 60000) / 1000).toFixed(0);
            timerDisplay.textContent = `${minutes}:${(seconds < 10 ? '0' : '')}${seconds}`;
        }, 1000);

        function markAbsentStudents(notScannedStudents) {
            const checkboxes = document.querySelectorAll('input[name="absent_students[]"]');
            checkboxes.forEach(checkbox => {
                const studentId = parseInt(checkbox.value);
                const isNotScanned = notScannedStudents.some(student => student.id === studentId);
                checkbox.checked = isNotScanned;
            });
        }

        function displayExpectedStudents(etds) {
            etdsElm.innerHTML = "";
            etds.forEach(({ id, cne, apogee, cin, name }) => {
                etdsElm.innerHTML += `<tr>
                <td class="text-center">${name}</td>
                <td class="text-center">${cin}</td>
                <td class="text-center">${apogee}</td>
                <td class="text-center">${cne}</td>
                <td class="text-center">
                    <input type="checkbox" class="form-check-input" name="absent_students[]" value="${id}">
                </td>
            </tr>`;
            });
        }
    </script>
@endsection



{{--                                                    @forelse($etudiants as $etudiant )--}}
{{--                                                        <tr>--}}
{{--                                                            <td class="text-center" >{{$etudiant->user->name}}</td>--}}
{{--                                                            <td class="text-center" >{{$etudiant->user->cin}}</td>--}}
{{--                                                            <td class="text-center" >{{$etudiant->apogee}}</td>--}}
{{--                                                            <td class="text-center" >{{$etudiant->cne}}</td>--}}
{{--                                                            <td class="text-center">--}}
{{--                                                                <input type="checkbox" name="absent_students[]" value="{{$etudiant->id}}">--}}
{{--                                                            </td>--}}
{{--                                                        </tr>--}}
{{--                                                    @empty--}}
{{--                                                        <tr>--}}
{{--                                                            <td>no etudiants</td>--}}
{{--                                                        </tr>--}}
{{--                                                    @endforelse--}}



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
{{--                    <div class="tab-content h-100" style="background-color: rgba(67, 89, 113, 0);box-shadow: 0 0px 0px 0 white">--}}
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

{{--                                            <div class="table-responsive text-nowrap">--}}
{{--                                                <table class="table">--}}
{{--                                                    <thead>--}}
{{--                                                    <tr>--}}
{{--                                                        <th class="text-center" >Name</th>--}}
{{--                                                        <th class="text-center" >CIN</th>--}}
{{--                                                        <th class="text-center" >Apogee</th>--}}
{{--                                                        <th  class="text-center" >CNE</th>--}}
{{--                                                        <th  class="text-center"  >Absence</th>--}}
{{--                                                    </tr>--}}
{{--                                                    </thead>--}}
{{--                                                    <tbody id="etdsElm" class="table-border-bottom-0">--}}

{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </div>--}}


{{--                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">--}}
{{--                                                <button type="submit" class="btn btn-danger">Mark Absences</button>--}}
{{--                                            </div>--}}
{{--                                       </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
