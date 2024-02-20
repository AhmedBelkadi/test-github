@extends("layouts.index")

@section( "filieres-active" , "active" )

@section("main")
    <div class="container-xxl flex-grow-1 container-p-y">

        @include("admin.filieres.create")
{{--        <x-CreateFiliere />--}}
        @if(isset($filiere))
            @include("admin.filieres.edit")
{{--            <x-EditFiliere />--}}
        @endif
        @php $openModal = request()->query('openModal'); @endphp
        <div class=" mt-3 row row-cols-2">
            @foreach($filieres as $index => $filiere)
                <x-Filiere :filiere="$filiere" :index="$index" />
                @if (($index + 1) % 2 === 0) </div> <div class="row row-cols-2"> @endif
            @endforeach
        </div>
        {{$filieres->links()}}

    </div>
@endsection

@section( "scripts" )
    <script>
        window.addEventListener('load', function () {
            var urlParams = new URLSearchParams(window.location.search);
            var openModal = urlParams.get('openModal');
            if (openModal) {
                let modal = document.getElementById('addFiliereModal');
                let bootstrapModal = new bootstrap.Modal(modal);
                bootstrapModal.show();
            }

            @if(isset($filiere))
                let editFiliereModal = document.getElementById('editFiliereModal');
                let bootstrapModal2 = new bootstrap.Modal(editFiliereModal);
                bootstrapModal2.show();
            @endif
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

{{--                <x-filiere-2 :filiere="$filiere" :index="$index"/>--}}
{{--                <x-filiere-2 :filiere="$filiere" :index="$index" ></x-filiere-2>--}}
{{--                <div class="col">--}}
{{--                    <div class="card text-center mb-3">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">{{$filiere->name}}</h5>--}}
{{--                            <h6 class="card-title">Chef de Filiere : {{$filiere->chef->user->name}}</h6>--}}
{{--                            <div class="d-flex justify-content-center">--}}
{{--                                <div class="p-2 bg-primary text-white rounded me-2">--}}
{{--                                    {{count($filiere->etudiants)}} etudiant--}}
{{--                                </div>--}}
{{--                                <a class="btn btn-success me-2 rounded-3 " href="{{route("filieres.edit", $filiere )}}">Update <i class="bi bi-pencil"></i></a>--}}
{{--                                <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#editFiliereModal">--}}
{{--                                    modifier--}}
{{--                                </button>--}}

{{--                                <button type="button" class="btn btn-danger rounded-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>--}}
{{--                                <x-delete-modal>--}}
{{--                                    <form method="POST" class=" me-2" action="{{route("filieres.destroy",$filiere)}}" >--}}
{{--                                        @csrf--}}
{{--                                        @method("DELETE")--}}
{{--                                        <input type="submit" class="btn btn-danger" value="Delete">--}}
{{--                                    </form>--}}
{{--                                </x-delete-modal>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @if (($index + 1) % 2 === 0) </div> <div class="row row-cols-2"> @endif--}}



