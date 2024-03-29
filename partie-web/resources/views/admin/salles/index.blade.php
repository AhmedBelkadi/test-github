@php $openModal = request()->query('openModal');   @endphp
<x-crud-modal stl="fade" idModal="sallesModal" title="" >
    <div>
        <form method="post" action="{{ isset($salle) ? route("salles.update", $salle) : route("salles.store") }}" class="">
            @csrf
            @if(isset($salle))
                @method("PUT")
            @endif
            <label for="nameBasic" class="form-label">nom</label>
            <div class="  d-flex justify-content-between align-items-center" >
                <div class="row w-100">
                    <div class="col ">
                        <input type="text" name="name" id="nameBasic" class="form-control form-control-lg" placeholder="Enter Name" value="{{ isset($salle) ? $salle->name : old("name") }}"/>
                        @error("name")<span class="text-danger" >{{$message}}</span>@enderror
                    </div>
                </div>
                <button type="submit" class="ms-2 btn btn-lg {{ isset($salle) ? "btn-success" : "btn-primary" }}">
{{--                    {{ isset($salle) ? "modifier" : "ajouter" }}--}}
                    @if(isset($salle))
                        <i class="menu-icon tf-icons bx bx-pencil"></i>
                    @else
                        <i class="bx bx-plus me-sm-1"></i>
                    @endif
                </button>
            </div>
        </form>
        <label for="nameBasic" class="form-label mt-3">salles</label>
        @foreach( $salles as $salle )
            <div class="d-flex justify-content-center mb-2" >
                <div style="width: 50%;height: 52px" class="bg-white border border-2 rounded-2 d-flex align-items-center ps-2 me-2" >
                    {{$salle->name}}
                </div>
                <a  href="{{route("salles.edit",[ 'salle'=>$salle , 'openModal' => true])}}" class="btn btn-primary text-white  btn-lg" >
                    <i class="menu-icon tf-icons bx bx-pencil"></i>

                </a>
                <form method="POST" class="" action="{{route("salles.destroy",$salle)}}" >
                    @csrf
                    @method("DELETE")
                    <button type="submit" class=" ms-2 btn btn-danger btn-lg">
                        <i class="menu-icon tf-icons bx bx-trash"></i>
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</x-crud-modal>
