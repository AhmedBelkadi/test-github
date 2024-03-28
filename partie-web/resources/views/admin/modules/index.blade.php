@extends("layouts.index")

@section( "modules-active" , "active" )


@section("main")
    <!-- Basic Bootstrap Table -->

{{--    <a class="btn btn-primary" href="{{route("modules.store")}}">Ajouter </a>--}}
    <!-- Button trigger modal -->
    <div class="container-xxl flex-grow-1 container-p-y">

    @include('admin.modules.create')

    @php
        $openModal = request()->query('openModal');
    @endphp

    <div class="mt-3 card">
        <div class="table-responsive text-nowrap">
            <table class="table ">
                <thead >
                <tr >
                    <th class="text-center" >module</th>
                    <th class="text-center" >nbr heure</th>
                    <th class="text-center" >filiere</th>
                    <th class="text-center" >semestre</th>
                    <th  class="text-center"  >Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach( $modules as $module )
                    <tr>
                        <td class="text-center" >{{$module->name}}</td>
                        <td class="text-center" >{{$module->nbr_heure}}</td>
                        <td class="text-center" >{{$module->filiere->name}}</td>
                        <td class="text-center" >{{$module->semestre->name}}</td>
                        <td class="text-center" >
                            <button
                            type="button"
                            class="btn btn-success text-white"
                            data-bs-toggle="modal"
                            data-bs-target="#modifierModal{{$module->id}}"
                        >
                                <i class="menu-icon tf-icons bx bx-pencil"></i>

                            </button>
                        @include('admin.modules.edit')
                            <button
                                type="button"
                                class="btn btn-danger text-white"
                                data-bs-toggle="modal"
                                data-bs-target="#basicModal{{$module->id}}"
                            >
                                <i class="menu-icon tf-icons bx bx-trash"></i>

                            </button>
                                 @include('admin.modules.delete')



                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    {{$modules->links()}}
</div>


@endsection

@section( "scripts" )
<script>
    // Open the modal if the 'openModal' parameter is set in the URL
    window.addEventListener('load', function() {
        var urlParams = new URLSearchParams(window.location.search);
        var openModal = urlParams.get('openModal');
        if (openModal) {
            var modal = document.getElementById('modulesModal');
            var bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();
        }
    });


    document.addEventListener('DOMContentLoaded', function () {
        const filiereSelect = document.getElementById('filiere');
        const semestreSelect = document.getElementById('semestre');
        semestreSelect.disabled = true;

        filiereSelect.addEventListener('change', function () {
            const selectedFiliereId = filiereSelect.value;
            const selectedFiliereOption = filiereSelect.options[filiereSelect.selectedIndex];
            const selectedFiliereType = selectedFiliereOption.getAttribute('data-type');
            semestreSelect.innerHTML = ''; // Clear previous options
            console.log(selectedFiliereType)
            if (selectedFiliereType === 'dutpremier annee') {
                semestreSelect.disabled = false;

                for (let i = 1; i <= 2; i++) {
                    const option = document.createElement('option');
                    option.value = 'Semestre ' + i;
                    option.textContent = 'Semestre ' + i;
                    semestreSelect.appendChild(option);
                }
            } else if (selectedFiliereType === 'lppremier annee') {
                semestreSelect.disabled = false;

                for (let i = 5; i <= 6; i++) {
                    const option = document.createElement('option');
                    option.value = 'Semestre ' + i;
                    option.textContent = 'Semestre ' + i;
                    semestreSelect.appendChild(option);
                }
            } else if (selectedFiliereType === 'dutdeuxieme annee') {
                semestreSelect.disabled = false;

                for (let i = 1; i <= 2; i++) {
                    const option = document.createElement('option');
                    option.value = 'Semestre ' + (i + 2);
                    option.textContent = 'Semestre ' + (i + 2);
                    semestreSelect.appendChild(option);
                }
            }
        });
    });

</script>
@endsection












