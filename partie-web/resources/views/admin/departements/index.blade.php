@extends("layouts.index")

@section( "departements-active" , "active" )

@section("main")




<div class="container-xxl flex-grow-1 container-p-y">

    @include('admin.departements.create')

    <div class="mt-3 row row-cols-2">

 @foreach($departements as $index => $departement)
    <div class="col">
    {{-- <div class="card text-center mb-3"> --}}
        <div class="card text-center mb-3">
          <div class="card-body">
           <h5 class="card-title"> {{$departement->name}}</h5>
           <h6 class="card-title">Chef de Département: {{$departement->chef->user->name}}</h6>
           <div class="p-2 bg-primary text-white rounded">
            {{ count($departement->filieres) }} filières
            </div>
          </div>
        </div>
    </div>




    @if (($index + 1) % 2 === 0) </div> <div class="row row-cols-2"> @endif

   @endforeach

  </div>
  {{$departements->links()}}
</div>




@endsection






