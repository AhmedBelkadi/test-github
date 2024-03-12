<div class="modal fade" id="modifierModal{{$post->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel1">modifier un post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route("posts.update" , $post )}}">
                @method("PUT")
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <textarea name="content"  class="form-control" >
                                {{!old("content") ? $post->content : old("content") }}
                            </textarea>
{{--                            <input type="text" value="{{!old("content") ? $post->content : old("content") }}" name="content" id="nameBasic" class="form-control" placeholder="Annoncez quelque chose à votre classe" />--}}
                            @error("content")<span class="text-danger" >{{$message}}</span>@enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

