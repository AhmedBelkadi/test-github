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

            <div class= "d-flex py-3 align-items-center justify-content-around w-25 border rounded-3" style="background-color: #909ED8;">
                <svg   width="30" height="59"  viewBox="0 0 27 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M26.657 35.7846C25.0688 27.4246 25.1375 27.7805 25.1297 27.7462C24.9214 26.6894 24.3359 25.8121 23.3866 25.2624C22.9426 25.0047 22.6866 24.9645 22.4627 24.8879L18.5609 23.4672L17.2605 22.5322V21.4717C19.1621 20.2875 20.3727 18.248 20.5941 16.041C22.1831 16.1182 23.2907 14.5261 22.6244 13.1321V8.66968C22.6244 5.44261 20.9502 4.31991 20.4387 4.05234C17.9358 0.920221 13.2622 0.116919 9.7193 2.0227L9.71247 2.02627C9.65169 2.06372 8.92153 2.41785 8.02239 3.20597C7.80425 3.40377 7.78037 3.74944 7.96899 3.97811C8.15795 4.20707 8.48777 4.23152 8.70555 4.03409C12.1754 0.979852 17.3256 1.76469 19.7065 4.84221C19.7651 4.9179 19.8365 4.97373 19.9236 5.00789C19.9913 5.03636 21.5801 5.73733 21.5801 8.66968V12.1245C21.2904 11.9959 20.9728 11.93 20.6342 11.9399V10.1494C20.6342 9.69523 20.3078 9.31985 19.8751 9.27606C18.9975 9.18723 18.5058 8.58786 18.2478 8.10081C17.9248 7.49115 17.154 7.3451 16.6485 7.79791C14.3201 9.88426 11.6393 9.99024 9.80034 9.71223C8.41125 9.50203 7.11928 10.4939 6.89446 11.9406C6.55636 11.9253 6.2223 11.9881 5.91518 12.1244C5.9172 10.2398 5.70979 8.18927 7.18013 5.83958C7.3379 5.58646 7.27002 5.24729 7.02856 5.0819C6.78717 4.91644 6.46355 4.98745 6.30578 5.24072C4.30475 8.45495 5.0207 11.335 4.87073 13.1321C4.20484 14.5255 5.3109 16.1182 6.90101 16.0408C7.16057 18.6402 8.68801 20.1354 8.72428 20.2006L8.72435 20.2006C8.99547 20.4731 9.48236 21.0422 10.4314 21.5906V22.532L9.13117 23.4669C4.04233 25.32 4.55881 25.0951 4.14538 25.3599C3.36397 25.8645 2.82236 26.6362 2.59663 27.5863C2.55214 27.7741 2.62601 27.4192 1.03487 35.7844C1.00284 35.9534 0.985989 36.2828 1.01474 36.5621C1.13269 37.7109 1.90985 38.3696 3.14695 38.3696H17.4956C17.7841 38.3696 18.0178 38.1246 18.0178 37.8222C18.0178 37.5198 17.7841 37.2748 17.4956 37.2748H6.81913V32.2593C6.81913 31.9569 6.58532 31.7119 6.29694 31.7119C6.00855 31.7119 5.77475 31.9569 5.77475 32.2593V37.2749H3.14681C2.32809 37.2749 1.94362 36.9068 2.06212 35.9825C3.49104 28.663 3.4941 28.0724 3.72783 27.4727C3.76856 27.4129 3.99373 26.5683 5.09771 26.077C5.21183 26.028 5.14067 26.0608 5.53322 25.9354C5.55745 25.9281 5.43776 25.9707 7.31312 25.2881L8.56394 27.7087C8.70131 27.9745 9.0181 28.0734 9.27182 27.9293C9.52539 27.7853 9.61959 27.453 9.48222 27.1872L8.3128 24.9241L9.11251 24.6329C9.49803 25.3789 12.9114 31.9841 13.2824 32.702C13.5114 33.1467 14.0945 33.1688 14.3631 32.7805C14.4118 32.7103 14.1337 33.2334 18.5727 24.6304L19.3723 24.9215L15.145 33.1187C14.5877 34.1993 13.1062 34.1994 12.5482 33.1199L10.643 29.4331C10.5056 29.1673 10.1888 29.0683 9.93514 29.2125C9.68156 29.3566 9.58736 29.6888 9.72473 29.9546L11.63 33.6414C12.5829 35.4852 15.1127 35.4835 16.0637 33.6394L20.3718 25.2855C22.2429 25.9666 22.1332 25.9277 22.1574 25.935C22.5255 26.0525 22.4846 26.0299 22.593 26.0764C22.9923 26.2547 23.2306 26.4605 23.2237 26.4551C23.6331 26.8013 23.9155 27.2012 24.0663 27.7902C24.091 27.8836 25.6412 35.9408 25.6475 36.2127C25.6631 36.9 25.38 37.2749 24.5453 37.2749H21.9172V32.2593C21.9172 31.9569 21.6834 31.7119 21.395 31.7119C21.1065 31.7119 20.8728 31.9569 20.8728 32.2593V37.2749H19.9322C19.6438 37.2749 19.41 37.5199 19.41 37.8223C19.41 38.1247 19.6438 38.3697 19.9322 38.3697H24.5451C25.7822 38.3697 26.5593 37.7109 26.6771 36.5628C26.7056 36.2889 26.6889 35.9525 26.657 35.7846ZM20.6342 13.0351C21.2364 13.0017 21.7753 13.4269 21.7753 13.991C21.7753 14.5607 21.2305 14.98 20.6342 14.947V13.0351ZM6.86104 14.947C6.25892 14.9804 5.71988 14.5551 5.71988 13.9911C5.71988 13.4214 6.2647 13.002 6.86104 13.0351V14.947ZM9.65106 10.7958C11.7037 11.1064 14.7015 10.9828 17.3269 8.63012L17.3346 8.63224C17.839 9.58436 18.6348 10.1854 19.5898 10.3413V12.2798L18.9939 12.6485C18.7486 12.2778 18.3403 12.0342 17.8784 12.0342H15.4888C14.9252 12.0342 14.441 12.3963 14.236 12.91H13.2593C13.0542 12.3963 12.57 12.0342 12.0063 12.0342H9.61674C9.15477 12.0342 8.74642 12.2778 8.5012 12.6485L7.90806 12.2814C7.95945 11.3456 8.76641 10.6617 9.65106 10.7958ZM18.1917 13.4574V14.5476C18.1917 15.0224 17.8232 15.4087 17.3702 15.4087H15.9969C15.5439 15.4087 15.1754 15.0224 15.1754 14.5476V13.4574H15.1755C15.1755 13.2794 15.319 13.129 15.4888 13.129H17.8784C18.0482 13.129 18.1917 13.2794 18.1917 13.4574ZM12.3197 13.4574V14.5476C12.3197 15.0224 11.9512 15.4087 11.4982 15.4087H10.1249C9.67188 15.4087 9.30342 15.0224 9.30342 14.5476V13.4574C9.30342 13.2794 9.44692 13.129 9.61674 13.129H12.0063C12.1762 13.129 12.3197 13.2794 12.3197 13.4574ZM9.31366 19.2503C7.62365 17.1854 7.94942 15.1803 7.90542 13.5511L8.25918 13.77V14.5476C8.25918 15.6261 9.09615 16.5035 10.1249 16.5035H11.4983C12.5271 16.5035 13.364 15.6261 13.364 14.5476V14.0048H14.1314V14.5476C14.1314 15.6261 14.9683 16.5035 15.9971 16.5035H17.3705C18.3993 16.5035 19.2363 15.6261 19.2363 14.5476V13.77L19.5901 13.5511V15.2627C19.5901 18.5186 17.1319 21.3474 13.7478 21.3864C13.7408 21.3863 13.6705 21.3858 13.6774 21.3859C12.7747 21.3763 12.0811 21.1338 12.1512 21.1544C11.1266 20.8565 10.1493 20.2415 9.31366 19.2503ZM13.846 25.3744L11.4758 22.6097V22.0787C12.5658 22.4756 13.6962 22.5668 14.7487 22.4059C15.0424 22.3612 15.3585 22.2878 15.5434 22.2331C15.5873 22.2181 15.8394 22.1549 16.2162 22.003V22.6097L13.846 25.3744ZM14.4341 27.3252L14.2034 27.8233H13.4887L13.2579 27.3252L13.846 26.8724L14.4341 27.3252ZM12.4698 28.8314L12.1373 28.1879L12.4022 27.9841L12.6001 28.4114L12.4698 28.8314ZM11.6388 27.2136L10.0522 24.137L10.8728 23.5438L13.0725 26.1098C12.9454 26.2074 11.7636 27.1174 11.6388 27.2136ZM13.8458 31.494L13.1561 30.1593L13.5412 28.918H14.1511L14.5354 30.1572C14.3168 30.5808 14.1138 30.9743 13.8458 31.494ZM15.221 28.8274L15.0919 28.4112L15.2899 27.9839L15.5519 28.1857L15.221 28.8274ZM16.0533 27.2136C15.9176 27.1091 14.7832 26.2357 14.6197 26.1098L16.8194 23.5438L17.6399 24.137C17.1129 25.1587 16.3952 26.5503 16.0533 27.2136Z" fill="#042552" stroke="#042552" stroke-width="0.5"/>
                    </svg>
                <div>
                    <p class="fw-bold text-dark fs-3 text-white">{{ \App\Models\Professeur::count() }}</p>
                    <p class="fw-semibold text-white">TOTAL Professors</p>
                </div>
            </div>

            <div class="d-flex py-3 align-items-center justify-content-around w-25 border rounded-3" style="background-color: rgba(254, 82, 68, 1);;">
                <svg class="p-0" xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                    <path d="M2 7v1l11 4 9-4V7L11 4z"></path>
                    <path d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z"></path>
                </svg>
                <div>
                    <p class="fw-bold text-dark fs-3 text-white">{{ \App\Models\Filiere::count() }}</p>
                    <p class="fw-semibold text-white">TOTAL Majors</p>
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
                    <p class="fw-semibold text-white">TOTAL Departements</p>
                </div>
            </div>

            </div>
            <div class="d-flex align-items-center gap-4 h-55 pb-5" >

                {{-- chart3: attendance --}}
                <div class=" h-100 w-100" >
                    <canvas class="h-100" id="attendanceTrendChart"></canvas>
                </div>
            </div>




            <div class="d-flex align-items-center gap-2 h-50 mb-4 py-2" >
                {{-- chart2 --}}
                <div class="h-100 " >
                    <canvas class="h-100" id="hh"></canvas>
                </div>

                <!-- Add some space here -->
                <div class="w-100"></div>

                {{-- chart1 --}}
                <div class="h-80  w-80" >
                    <canvas class="h-100" id="hhh"></canvas>
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
                backgroundColor: '#D3A518',
                borderColor: '#D3A518',
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

                        '#5D8DF7',
                        '#FFA7E2',

                    ],
                    hoverOffset: 4
                }]
            },
            options: {
            }
        });


    </script>
@endsection
