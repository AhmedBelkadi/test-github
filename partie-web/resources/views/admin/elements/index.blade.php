@extends("layouts.index")

@section( "elements-active" , "active" )


@section("main")

    <div class="container-xxl flex-grow-1 container-p-y">

    @include('admin.elements.create')
    <div class="mt-3 card">

        @php  $openModal = request()->query('openModal') ; @endphp
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                     <th class="text-center" >Element</th>
                     <th class="text-center" >Module</th>
                     <th class="text-center" >Professeurs</th>
                     <th  class="text-center"  >Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach( $elements as $element )
                    <tr>
                        <td class="text-center" >{{$element->name}}</td>
                        <td class="text-center" >{{$element->module->name}}</td>
                        <td class="text-center">
                            {{ implode(" / ", $element->professeurs->pluck('user.name')->toArray()) }}
                        </td>
                        <td class="text-center" >
                            <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#basicModal{{$element->id}}">
                                <i class="menu-icon tf-icons bx bx-trash"></i>

                            </button>
                                 @include('admin.elements.delete')
                            <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#modifierModal{{$element->id}}">
                                <i class="menu-icon tf-icons bx bx-pencil"></i>

                            </button>
                              @include('admin.elements.edit')
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        {{$elements->links()}}
    </div>
    </div>




@endsection

@section( "scripts" )
    <script>
        window.addEventListener('load', function() {
            var urlParams = new URLSearchParams(window.location.search);
            var openModal = urlParams.get('openModal');
            if (openModal) {
                var modal = document.getElementById('elementtModal');
                var bootstrapModal = new bootstrap.Modal(modal);
                bootstrapModal.show();
            }
        });
    </script>
@endsection










