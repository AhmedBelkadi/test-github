<div class="modal fade" id="basiModal{{$professeur->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
         <div class="modal-content">
                <div class="modal-body">
        <div class="row">
    <div class="modal-header ">
    <h1 class="modal-title fs-5 w-100" id="exampleModalLabel">Delete confirmation</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-footer">

    <form method="POST" class=" me-2" action="{{route("professeurs.destroy",$professeur->id)}}" >
    @csrf
    @method("DELETE")
    <input type="submit" class="btn btn-danger" value="Delete">
    </form>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
    </div>

    </div>
         </div>
    </div>
</div>
