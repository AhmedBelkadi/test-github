@extends("layouts.index")

@section("dashboard-active", "active")

@section("main")

<!-- Content wrapper -->
<div class="vh-100">

    <div class="container h-100 container">
        <div class="d-flex gap-3 align-items-center h-25 py-2">
            <div class="d-flex py-3 align-items-center justify-content-around w-25 border rounded-3" style="background-color: #A7AABC;
            ;">
                <svg class="p-0" xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                    <path d="M2 7v1l11 4 9-4V7L11 4z"></path>
                    <path d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z"></path>
                </svg>
                <div>
                    <p class="fw-bold text-dark fs-3 text-white">{{ \App\Models\Etudiant::count() }}</p>
                    <p class="fw-semibold text-white">TOTAL STUDENTS</p>
                </div>
            </div>

            <div class="d-flex py-3 align-items-center justify-content-around w-25 border rounded-3" style="background-color: #909ED8;">
                <i class="menu-icon tf-icons bx bx-user bx-lg text-white"></i>
                <div>
                    <p class="fw-bold text-dark fs-3 text-white">{{ \App\Models\Professeur::count() }}</p>
                    <p class="fw-semibold text-white">TOTAL PROFESSORS</p>
                </div>
            </div>


            <div class="d-flex py-3 align-items-center justify-content-around w-25 border rounded-3" style="background-color: rgba(254, 82, 68, 1);;">
                <i class="menu-icon tf-icons bx bx-book bx-lg text-white"></i>
                <div>
                    <p class="fw-bold text-dark fs-3 text-white">{{ \App\Models\Filiere::count() }}</p>
                    <p class="fw-semibold text-white">TOTAL FILIERES</p>
                </div>
            </div>

            <div class="d-flex py-3 align-items-center justify-content-around w-25 border rounded-3" style="background-color: #BFA5A7;">
                {{-- <svg class="p-0" xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255)5);transform: ;msFilter:;">
                    <path d="M2 7v1l11 4 9-4V7L11 4z"></path>
                    <path d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z"></path>
                </svg> --}}
                <i class="menu-icon tf-icons bx bx-building bx-lg text-white"></i>
                <div>
                    <p class="fw-bold text-dark fs-3 text-white">{{ \App\Models\Departement::count() }}</p>
                    <p class="fw-semibold text-white">TOTAL DEPARTEMENTS</p>
                </div>
            </div>

            </div>
            <div class="d-flex align-items-center gap-4 h-55 pb-5">
                {{-- chart3: attendance --}}
                <div class="h-100 w-100">
                    <canvas class="h-100" id="attendanceTrendChart"></canvas>
                </div>
                {{-- chart1 --}}
                <div class="h-80 w-70">
                    <canvas class="h-100" id="hhh"></canvas>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2 h-60 mb-4 py-2">
                {{-- chart2 --}}
                <div class="col-12">
                    <canvas class="w-100 h-100" id="hh"></canvas>
                </div>
            </div>








            </div>
        </div>



@endsection

@section("scripts")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        //attendance statistics

  <?php
    use App\Models\Absence;


    function dateToDayName($date) {
        $dateTime = new DateTime($date);
        return $dateTime->format('l');
    }


    $absenceData = Absence::selectRaw("DATE_FORMAT(date, '%Y-%m-%d') as date, count(*) as count")
                         ->groupBy('date')
                         ->get();


    $attendanceDays = $absenceData->map(function ($item) {
        return dateToDayName($item->date);
    })->toJson();

    $attendanceData = $absenceData->pluck('count')->toJson();
    ?>


    var ctx = document.getElementById('attendanceTrendChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $attendanceDays; ?>,
            datasets: [{
                label: 'Absences',
                data: <?php echo $attendanceData; ?>,
                backgroundColor: '#042552',
                borderColor: '#042552',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

      //Number of students by filiere

        var ctx2 = document.getElementById('hh').getContext('2d');
        var myChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: @json($filieres->pluck('name')),
                datasets: [{
                    label: 'Number of Students',
                    data:  @json($filieres->pluck('etudiants_count')),
                    backgroundColor: '#909ED8',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // gender of students


        var ctx3 = document.getElementById('hhh').getContext('2d');
        var myChart = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: @json($studentsByGender->pluck('gender')),
                datasets: [{
                    label: 'Students By Gender',
                    data: @json($studentsByGender->pluck('count')),
                    backgroundColor: [
                        '#FFA7E2',
                        '#909ED8',

                    ],
                    hoverOffset: 4
                }]
            },
            options: {
            }
        });


    </script>
@endsection
