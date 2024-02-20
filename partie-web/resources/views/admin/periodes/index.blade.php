@php $openModal2 = request()->query('openModal2'); @endphp

<x-crud-modal stl="fade" idModal="periodesModal" >
    <div>
        <form method="post" action="{{ isset($p) ? route("periodes.update", $p) : route("periodes.store") }}" class="">
            @csrf
            @if(isset($p))  @method("PUT")  @endif
            <label for="nameBasic" class="form-label">nom</label>
            <div class="  d-flex justify-content-between align-items-center" >
                <div class="row w-100">
                    <div class="col ">
                        <input type="text" name="libelle" id="libelleBasic" class="form-control" placeholder="Enter Name" value="{{ isset($p) ? $p->libelle : old("libelle") }}"/>
                        @error("libelle") <span class="text-danger" >{{$message}}</span> @enderror
                    </div>
                </div>
                <button type="submit" class="ms-2 btn {{ isset($p) ? "btn-success" : "btn-primary" }}">{{ isset($p) ? "modifier" : "ajouter" }}</button>
            </div>
        </form>
        <label for="nameBasic" class="form-label mt-3">periodes</label>
        @foreach( $periodes as $p )
            <div class="d-flex justify-content-center mb-2" >
                <div style="width: 50%;height: 52px" class="bg-white border border-2 rounded-2 d-flex align-items-center ps-2 me-2" >
                    {{$p->libelle}}
                </div>
                <a  href="{{route("periodes.edit",[ 'periode'=>$p , 'openModal2' => true])}}" class="btn btn-primary text-white  btn-lg" >modifier</a>
                <form method="POST" class="" action="{{route("periodes.destroy",$p)}}" >
                    @csrf
                    @method("DELETE")
                    <button type="submit" class=" ms-2 btn btn-danger btn-lg">supprimer</button>
                </form>
            </div>
        @endforeach
    </div>
</x-crud-modal>
