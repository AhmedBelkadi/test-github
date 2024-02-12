@extends("layouts.index")
@section("main")

    <!-- Content wrapper -->
{{--    <div class="content-wrapper">--}}
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y ">
    @foreach($filieres as $filiere)

{{--        <div class="card mb-4">--}}
{{--            <div class="card-body">--}}
{{--                <h5 class="card-title">--}}
{{--                    {{$filiere->name}}--}}
{{--                </h5>--}}
{{--                <div class="card-subtitle text-muted mb-3">{{$filiere->departement->name}}</div>--}}
{{--            </div>--}}
{{--        </div>--}}


        <div class="col-md-6 col-lg-4">
            <div class="card text-center mb-3">
                <div class="card-body">
                    <h5 class="card-title">Filiere : {{$filiere->name}}</h5>
                    <p class="card-text">Departement :  {{$filiere->departement->name}}</p>
{{--                    <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>--}}
                </div>
            </div>
        </div>


    @endforeach
        </div>
{{--    </div>--}}
@endsection
