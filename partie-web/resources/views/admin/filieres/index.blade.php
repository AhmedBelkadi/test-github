@extends("layouts.index")
@section("main")


<div class="container-xxl flex-grow-1 container-p-y">

    @include("admin.filieres.create")

    @php
        $openModal = request()->query('openModal');
    @endphp

    <div class=" mt-3 row row-cols-2">
        @foreach($filieres as $index => $filiere)
            <div class="col">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{$filiere->name}}</h5>
                        <h6 class="card-title">Chef de Filiere : {{$filiere->chef->user->name}}</h6>
                        <div class="p-2 bg-primary text-white rounded">
                            {{count($filiere->etudiants)}} etudiant
                        </div>
                    </div>
                </div>
            </div>

            @if (($index + 1) % 2 === 0) </div> <div class="row row-cols-2"> @endif
        @endforeach
    </div>
        {{$filieres->links()}}
</div>


@endsection
@section( "scripts" )
    <script>
        // Open the modal if the 'openModal' parameter is set in the URL
        window.addEventListener('load', function() {
            var urlParams = new URLSearchParams(window.location.search);
            var openModal = urlParams.get('openModal');
            if (openModal) {
                var modal = document.getElementById('filiereModal');
                var bootstrapModal = new bootstrap.Modal(modal);
                bootstrapModal.show();
            }
        });
    </script>
@endsection
















    <!-- Content wrapper -->
{{--    <div class="content-wrapper">--}}
        <!-- Content -->
{{--        <div class="card mb-4">--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">--}}
{{--                    {{$filiere->name}}--}}
{{--                </h5>--}}
{{--                <div class="card-subtitle text-muted mb-3">{{$filiere->departement->name}}</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
                    {{-- <h5 class="card-title"> {{$departement->name}}</h5> --}}
                    {{--  <p class="card-text">
                        Chef de Département: {{$departement->chef->professeur->user->name}} --}}
                    {{-- </p>      <div class="p-2 bg-primary text-white rounded">
                         {{ count($departement->filieres) }} filières
                         </div> --}}
{{--            <div class="card text-center mb-3">--}}
{{--                <div class="card-body">--}}
{{--                    <h5 class="card-title">Filiere : {{$filiere->name}}</h5>--}}
{{--                    <p class="card-text">Departement :  {{$filiere->departement->name}}</p>--}}
{{--                    <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>--}}
{{--                </div>--}}
{{--            </div>--}}
