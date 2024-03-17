@extends("layouts.index")

@section( "dashboard-active" , "active" )

@section("main")


    <!-- Content wrapper -->
    <div class="vh-100">
        <!-- Content -->


        <div class="container h-100 container  ">
            <div class="d-flex gap-3 align-items-center h-25  py-2" >
                <div class=" d-flex  py-3  align-items-center justify-content-around  w-25 border rounded-3  " >

                        <svg class="p-0 " xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M2 7v1l11 4 9-4V7L11 4z"></path><path d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z"></path></svg>

                    <div class="" >
                        <p class="fw-bold text-dark fs-3" >47</p>
                        <p class="fw-semibold" >TOTAL STUDENTS</p>
                    </div>
                </div>

                <div class=" d-flex  py-3  align-items-center justify-content-around  w-25 border rounded-3  " >
                    {{--                        <img class="h-25 w-25 border rounded-circle" src="{{asset("assets/img/avatars/1.png")}}">--}}

{{--                    <svg class="p-0 " xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M2 7v1l11 4 9-4V7L11 4z"></path><path d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z"></path></svg>--}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/></svg>
                    <div class="" >
                        <p class="fw-bold text-dark fs-3" >47</p>
                        <p class="fw-semibold" >TOTAL Professors</p>
                    </div>
                </div>
                <div class=" d-flex  py-3  align-items-center justify-content-around  w-25 border rounded-3  " >
                    {{--                        <img class="h-25 w-25 border rounded-circle" src="{{asset("assets/img/avatars/1.png")}}">--}}

{{--                    <svg class="p-0 " xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M2 7v1l11 4 9-4V7L11 4z"></path><path d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z"></path></svg>--}}
                    <svg xmlns="http://www.w3.org/2000/svg"  width="20%" height="20%" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM174.6 384.1c-4.5 12.5-18.2 18.9-30.7 14.4s-18.9-18.2-14.4-30.7C146.9 319.4 198.9 288 256 288s109.1 31.4 126.6 79.9c4.5 12.5-2 26.2-14.4 30.7s-26.2-2-30.7-14.4C328.2 358.5 297.2 336 256 336s-72.2 22.5-81.4 48.1zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                    <div class="" >
                        <p class="fw-bold text-dark fs-3" >47</p>
                        <p class="fw-semibold" >TOTAL Majors</p>
                    </div>
                </div>
                <div class=" d-flex  py-3  align-items-center justify-content-around  w-25 border rounded-3  " >
                    {{--                        <img class="h-25 w-25 border rounded-circle" src="{{asset("assets/img/avatars/1.png")}}">--}}

                    <svg class="p-0 " xmlns="http://www.w3.org/2000/svg" width="20%" height="20%" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M2 7v1l11 4 9-4V7L11 4z"></path><path d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z"></path></svg>

                    <div class="" >
                        <p class="fw-bold text-dark fs-3" >47</p>
                        <p class="fw-semibold" >TOTAL Departements</p>
                    </div>
                </div>


            </div>
            <div class="d-flex align-items-center  gap-2 h-50 mb-5 py-4" >
                <div class="h-100  w-100" >
                    <canvas class="h-100" id="hhh"></canvas>
                </div>
                <div class="h-100 " >
                    <canvas class="h-100" id="hh"></canvas>
                </div>

            </div>
            <div class="d-flex align-items-center gap-2 h-50 pb-5" >
                <div class=" h-100 w-100" >
                    <canvas class="h-100" id="hhhh"></canvas>
                </div>
                <div class=" h-100 " >
                    <canvas class="h-100" id="studentsByClass"></canvas>
                </div>


{{--                <div class="col-4" >--}}
{{--                    <div class="card h-100">--}}
{{--                        <div class="card-header d-flex align-items-center justify-content-between">--}}
{{--                            <div class="card-title mb-0">--}}
{{--                                <h4 class="m-0 me-2 ">Top 6 Attendant</h4>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table class="table table-borderless ">--}}

{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex justify-content-start align-items-center mt-lg-4">--}}
{{--                                            <div class="avatar me-3">--}}
{{--                                                <img src="{{asset("assets/img/avatars/1.png")}}" alt="Avatar" class="rounded-circle">--}}
{{--                                            </div>--}}
{{--                                            <div class="d-flex flex-column">--}}
{{--                                                <h6 class="mb-1 text-truncate">Maven Analytics</h6>--}}
{{--                                                <small class="text-truncate text-muted">Business Intelligence</small>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-end">--}}
{{--                                        <div class="user-progress mt-lg-4">--}}
{{--                                            <h6 class="mb-0">33</h6>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex justify-content-start align-items-center">--}}
{{--                                            <div class="avatar me-3">--}}
{{--                                                <img src="{{asset("assets/img/avatars/1.png")}}" alt="Avatar" class="rounded-circle">--}}
{{--                                            </div>--}}
{{--                                            <div class="d-flex flex-column">--}}
{{--                                                <h6 class="mb-1 text-truncate">Zsazsa McCleverty</h6>--}}
{{--                                                <small class="text-truncate text-muted">Digital Marketing</small>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-end">--}}
{{--                                        <div class="user-progress">--}}
{{--                                            <h6 class="mb-0">52</h6>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex justify-content-start align-items-center">--}}
{{--                                            <div class="avatar me-3">--}}
{{--                                                <img src="../../../demo/assets/img/avatars/3.png" alt="Avatar" class="rounded-circle">--}}
{{--                                            </div>--}}
{{--                                            <div class="d-flex flex-column">--}}
{{--                                                <h6 class="mb-1 text-truncate">Nathan Wagner</h6>--}}
{{--                                                <small class="text-truncate text-muted">UI/UX Design</small>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-end">--}}
{{--                                        <div class="user-progress">--}}
{{--                                            <h6 class="mb-0">12</h6>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex justify-content-start align-items-center">--}}
{{--                                            <div class="avatar me-3">--}}
{{--                                                <img src="../../../demo/assets/img/avatars/4.png" alt="Avatar" class="rounded-circle">--}}
{{--                                            </div>--}}
{{--                                            <div class="d-flex flex-column">--}}
{{--                                                <h6 class="mb-1 text-truncate">Emma Bowen</h6>--}}
{{--                                                <small class="text-truncate text-muted">React Native</small>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-end">--}}
{{--                                        <div class="user-progress">--}}
{{--                                            <h6 class="mb-0">8</h6>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}



            </div>

        </div>
        <!-- / Content -->


    </div>
    <!-- Content wrapper -->

@endsection

@section("scripts")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('studentsByClass').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
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






        var ctx2 = document.getElementById('hh').getContext('2d');
        var myChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: @json($filieres->pluck('name')),
                datasets: [{
                    label: 'Number of Students',
                    data:  @json($filieres->pluck('etudiants_count')),
                    backgroundColor: 'rgb(75, 192, 192)',
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


        var ctx3 = document.getElementById('hhh').getContext('2d');
        var myChart = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: @json($studentsByGender->pluck('gender')),
                datasets: [{
                    label: 'Students By Gender',
                    data: @json($studentsByGender->pluck('count')),
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
            }
        });

        var ctx4 = document.getElementById('hhhh').getContext('2d');
        var myChart = new Chart(ctx4, {
            type: 'radar',
            data: {
                labels: [
                    'Eating',
                    'Drinking',
                    'Sleeping',
                    'Designing',
                    'Coding',
                    'Cycling',
                    'Running'
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [65, 59, 90, 81, 56, 55, 40],
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }, {
                    label: 'My Second Dataset',
                    data: [28, 48, 40, 19, 96, 27, 100],
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    pointBackgroundColor: 'rgb(54, 162, 235)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(54, 162, 235)'
                }]
            },
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                }
            }
        });

    </script>
@endsection
