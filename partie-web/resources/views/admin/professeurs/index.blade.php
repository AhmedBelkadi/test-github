@extends("layouts.index")

@section( "professeurs-active" , "active" )


@section("main")
    <!-- Basic Bootstrap Table -->

{{--    <a class="btn btn-primary" href="{{route("modules.store")}}">Ajouter </a>--}}
    <!-- Button trigger modal -->

    <div class="container-xxl flex-grow-1 container-p-y">



    @include('admin.professeurs.create')
    @php
    $openModal = request()->query('openModal');
@endphp



    <form method="post" action="{{ route('professeurs.search') }}">
        @csrf
        <div class="row align-items-end">
             <!-- Input for CIN -->
             <div class="col-md-8 mt-3">
                <input type="text" name="cin" id="cin" class="form-control" placeholder="Enter CIN" required>
            </div>

            <!-- Submit button -->
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>

        </div>
    </form>










    <div class="mt-3 card">
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
                                Delete
                            </button>
                            @include('admin.professeurs.delete')

                            <button
                            type="button"
                            class="btn btn-success text-white"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal{{$professeur->id}}"
                        >
                            Modifier
                        </button>
                        @include('admin.professeurs.edit')

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    {{-- {{ $professeurs->links() }} --}}

    </div>

@endsection
@section( "scripts" )
<script>
    // Open the modal if the 'openModal' parameter is set in the URL
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











