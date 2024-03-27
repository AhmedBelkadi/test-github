@extends("layouts.index")

@section( "etudiants-active" , "active" )


@section("main")
    <!-- Basic Bootstrap Table -->

{{--    <a class="btn btn-primary" href="{{route("modules.store")}}">Ajouter </a>--}}
    <!-- Button trigger modal -->
    <div class="container-xxl flex-grow-1 container-p-y">


    @include('admin.etudiants.create')
    @php
        $openModal = request()->query('openModal');
    @endphp

{{--        <form  class="d-inline" method="GET" action="{{route("etudiants.exporter")}}" >--}}
{{--            <button type="submit" class="btn btn-warning text-white" ><i class="bx bx-export me-sm-1"></i> exporter</button>--}}
{{--        </form>--}}


        <div class="btn-group">
            <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bx bx-export me-sm-1 me-2"></i>exporter
            </button>
            <ul class="dropdown-menu">
                <li>
                    <form  class="dropdown-item d-flex align-items-center" method="GET" action="{{route("etudiants.exporter")}}" >
                        <button class="dropdown-item p-0" type="submit"><i class="bx bx-file me-2"></i>csv</button>
{{--                        <input class="dropdown-item" type="submit" value="csv">--}}
                    </form>
                </li>
                <li>
                    <form  class="dropdown-item d-flex align-items-center" method="GET" action="{{ route("etudiants.exporter.pdf") }}" target="__blank" >
                        <button class="dropdown-item p-0" type="submit"><i class="bx bxs-file-pdf me-2"></i>pdf</button>
{{--                        <input class="dropdown-item" type="submit" value="pdf">--}}
                    </form>
                    {{--                <a class="dropdown-item" href="#"><i class="bx bxs-file-pdf me-2"></i>pdf</a>--}}
                </li>

            </ul>
        </div>



        <form method="post" class="row mt-3 " action="{{ route('etudiants.search') }}">
            @csrf
            <div class="row px-0  ">
                <div class="col-11 ps-4">
                    <input type="text" name="cin_cne" id="search" class="ps-2 form-control" placeholder="Enter APOGEE or CNE">
                    @error('cin_cne')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-1 pe-0">
                    <button type="submit" class="btn btn-primary w-100"><i class='bx bx-search'></i></button>
                </div>
            </div>
        </form>





    <div class="mt-3 card">

{{--        <div class="btn-group my-1 " style="width: 8%" >--}}
{{--            <button class="btn btn-secondary  btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                <i class="bx bx-export me-1"></i> Exporter--}}
{{--            </button>--}}
{{--            <ul class="dropdown-menu">--}}
{{--                <li>--}}
{{--                    <form  class="dropdown-item d-flex align-items-center" method="GET" action="{{route("etudiants.exporter")}}" >--}}
{{--                        <i class="bx bx-file "></i>--}}
{{--                        <input class="dropdown-item" type="submit" value="csv">--}}
{{--                    </form>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <form  class="dropdown-item d-flex align-items-center" method="GET" action="{{ route("etudiants.exporter.pdf") }}" target="__blank" >--}}
{{--                        <i class="bx bxs-file-pdf me-2"></i>--}}
{{--                        <input class="dropdown-item" type="submit" value="pdf">--}}
{{--                    </form>--}}
{{--                                                    <a class="dropdown-item" href="#"><i class="bx bxs-file-pdf me-2"></i>pdf</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}



        <div class="table-responsive text-nowrap ">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th class="text-center" >Name</th>
                    <th class="text-center" >CIN</th>
                    <th class="text-center" >Apogeer</th>
                    <th  class="text-center" >CNE</th>
                    <th class="text-center" >Email</th>
                    <th class="text-center" >Tele</th>
                    <th class="text-center" >Adresse</th>
                    <th class="text-center" >Filiere</th>

                    <th  class="text-center"  >Actions</th>

                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach( $etudiants as $etudiant )
                    <tr>
                        <td class="text-center" >{{$etudiant->user->name}}</td>
                        <td class="text-center" >{{$etudiant->user->cin}}</td>
                        <td class="text-center" >{{$etudiant->apogee}}</td>
                        <td class="text-center" >{{$etudiant->cne}}</td>
                        <td class="text-center" >{{$etudiant->user->email}}</td>
                        <td class="text-center" >{{$etudiant->user->tele}}</td>
                        <td class="text-center" >{{$etudiant->user->adresse}}</td>
                        <td class="text-center" >{{$etudiant->filiere->name}}</td>




                        <td class="text-center" >

                            <button
                            type="button"
                            class="btn btn-success text-white"
                            data-bs-toggle="modal"
                            data-bs-target="#modifieModal{{$etudiant->id}}"
                        >
                                <i class="menu-icon tf-icons bx bx-pencil"></i>

                            </button>
                        @include('admin.etudiants.edit')
                            <button
                                type="button"
                                class="btn btn-danger text-white"
                                data-bs-toggle="modal"
                                data-bs-target="#deletModal{{ $etudiant->id }}"
                            >
                                <i class="menu-icon tf-icons bx bx-trash"></i>

                            </button>
                            @include('admin.etudiants.delete')



                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


    {{-- {{$etudiants->links()}} --}}
    </div>

@endsection
@section( "scripts" )
<script>
    // Open the modal if the 'openModal' parameter is set in the URL
    window.addEventListener('load', function() {
        var urlParams = new URLSearchParams(window.location.search);
        var openModal = urlParams.get('openModal');
        if (openModal) {
            var modal = document.getElementById('etudiantsModal');
            var bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();
        }
    });
</script>
@endsection











