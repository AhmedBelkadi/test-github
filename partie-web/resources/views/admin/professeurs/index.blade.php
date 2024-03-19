@extends("layouts.index")

@section( "professeurs-active" , "active" )


@section("main")
<div class="container-xxl flex-grow-1 container-p-y">




    @include('admin.professeurs.create')
    @php $openModal = request()->query('openModal');@endphp


    <form  class="d-inline" method="GET" action="{{route("professeurs.exporter")}}" >
        <button type="submit" class="btn btn-warning text-white" ><i class="bx bx-export me-sm-1"></i>exporter</button>
    </form>

    <form method="post" class=" row mt-3  " action="{{ route('professeurs.search') }}">
        @csrf
        <div class="row px-0  " >
            <div class=" col-11 ">
                <input type="text" name="cin" id="cin" class="form-control" placeholder="Enter CIN" >
                @error("cin")
                <span class="text-danger" >{{$message}}</span>
                @enderror
            </div>
            <div class=" col-1 pe-0">
                <button type="submit" class="btn btn-primary w-100"><i class='bx bx-search-alt'></i></button>
            </div>
        </div>
    </form>



    <div class="row " >
        <div class=" col-12 mt-3   card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>

                    <tr>
                        <th class="text-center" >Name</th>
                        <th class="text-center" >CIN</th>
                        <th class="text-center" >Email</th>
                        <th class="text-center" >Tele</th>
                        <th class="text-center" >Adresse</th>
                        <th  class="text-center"  >Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach( $professeurs as $professeur )
                        <tr>
                            <td class="text-center" >{{$professeur->user->name}}</td>
                            <td class="text-center" >{{$professeur->user->cin}}</td>
                            <td class="text-center" >{{$professeur->user->email}}</td>
                            <td class="text-center" >{{$professeur->user->tele}}</td>
                            <td class="text-center" >{{$professeur->user->adresse}}</td>

                            <td class="text-center" >
                                <button
                                    type="button"
                                    class="btn btn-danger text-white"
                                    data-bs-toggle="modal"
                                    data-bs-target="#basiModal{{$professeur->id}}"
                                >
                                    <i class="menu-icon tf-icons bx bx-trash"></i>
                                </button>
                                @include('admin.professeurs.delete')

                                <button
                                    type="button"
                                    class="btn btn-success text-white"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editModal{{$professeur->id}}"
                                >
                                    <i class="menu-icon tf-icons bx bx-pencil"></i>
                                </button>
                                @include('admin.professeurs.edit')

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{--     {{ $professeurs->links() }}--}}
</div>

@endsection
@section( "scripts" )
<script>
    window.addEventListener('load', function() {
        var urlParams = new URLSearchParams(window.location.search);
        var openModal = urlParams.get('openModal');
        if (openModal) {
            var modal = document.getElementById('professeursModal');
            var bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();
        }
    });
</script>
@endsection











