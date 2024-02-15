@extends("layouts.index")

@section( "etudiants-active" , "active" )


@section("main")
    <!-- Basic Bootstrap Table -->

{{--    <a class="btn btn-primary" href="{{route("modules.store")}}">Ajouter </a>--}}
    <!-- Button trigger modal -->
    <div class="container-xxl flex-grow-1 container-p-y">


    @include('admin.etudiants.create')


    <div class="mt-3 card">
        <div class="table-responsive text-nowrap">
            <table class="table">
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
                    <th class="text-center" >Role</th>
                    <th class="text-center" >Password</th>

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
                        <td class="text-center" >{{$etudiant->user->role}}</td>
                        <td class="text-center" >{{$etudiant->user->password}}</td>


                        <td class="text-center" >
                            @include('admin.etudiants.delete')
                            <button
                                type="button"
                                class="btn btn-danger text-white"
                                data-bs-toggle="modal"
                                data-bs-target="#basicModal"
                            >
                                Supprimer
                            </button>


                            <button
                            type="button"
                            class="btn btn-warning text-white"
                            data-bs-toggle="modal"
                            data-bs-target="#modifierModal{{$etudiant->id}}"
                        >
                          Modifier
                        </button>
                        {{-- @include('admin.etudiants.edit') --}}

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


    {{$etudiants->links()}}
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











