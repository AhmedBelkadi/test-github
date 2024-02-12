@props(["btnName","method","routeName","idModal"])

<div class="modal fade" id="{{$idModal}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">salle title</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form method="{{$method}}" action="{{route("$routeName")}}">
                @method("$method")
                @csrf
                <div class="modal-body">
                    {{$slot}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">{{$btnName}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
