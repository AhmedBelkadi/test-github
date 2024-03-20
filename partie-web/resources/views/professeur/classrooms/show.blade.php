@extends("layouts.professeur_layout")

@section( "classrooms-active" , "active" )

@section("main")
{{--    <x-professeur-sidebar />--}}
<x-sidebar />

{{--    <h1>classroom</h1>--}}

    <div class="card mb-4">
        <div class="w-100 h-25">
            <img class="w-100 h-25" src="{{$classroom->image}}" alt="Card image cap">
        </div>
        <div class="card-body h-75">
            <h5 class="card-title">{{$classroom->element->name}}</h5>
        </div>
    </div>

    <form method="post" action="{{route("posts.store")}}" class="mb-4">
        @csrf
        <div class="row g-2">
            <div class="col px-1 mb-0">
                <input type="hidden" value="{{$classroom->id}}" name="class_room_id" />
                <div class="input-group mb-3">
                    <input type="text" value="{{old("content")}}" name="content" id="nameBasic" placeholder="Annoncez quelque chose à votre classe" class="form-control form-control-lg" style="margin-right: 5px;" />
                    @error("content")<span class="text-danger">{{$message}}</span>@enderror
                    <button type="submit" class="btn btn-primary">envoyer</button>
                </div>
            </div>
        </div>
    </form>





    @forelse($posts as $post)
        <div class="card mb-4">

            <div class="card-body">

                <div class="chat-history-header border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex overflow-hidden align-items-center">
                            <i class="bx bx-menu bx-sm cursor-pointer d-lg-none d-block me-2" data-bs-toggle="sidebar" data-overlay="" data-target="#app-chat-contacts"></i>
                            <div class="flex-shrink-0 avatar">
                                <img src="{{ \Illuminate\Support\Facades\Auth::user()->image ?: asset("assets/img/avatars/man.png")  }}" alt="Avatar" class="rounded-circle" data-bs-toggle="sidebar" data-overlay="" data-target="#app-chat-sidebar-right">
                            </div>
                            <div class="chat-contact-info flex-grow-1 ms-3">
                                <h6 class="m-0">{{ \Illuminate\Support\Facades\Auth::user()->professeur->user->name }}</h6>
                                <small class="user-status text-muted">{{ $post->created_at }}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">

                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="chat-header-actions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded fs-4"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="chat-header-actions" style="">
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modifierModal{{$post->id}}">modifier</button>
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal{{$post->id}}">suprimmer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="mt-3" >
                    <p class="card-text">{{ $post->content }}</p>
                </div>
                @include('professeur.posts.delete')
                @include('professeur.posts.edit')

                @if($post->commentaires->isNotEmpty())


                    <!-- Button to toggle comments -->
{{--                    <button class="btn btn-primary me-1" type="button" data-bs-toggle="collapse" data-bs-target="#commentCollapse{{ $post->id }}" aria-expanded="true" aria-controls="commentCollapse{{ $post->id }}">--}}
{{--                        Commentaires ajoutés au cours--}}
{{--                    </button>--}}

                    <div class="fw-bold my-3 cursor-pointer" data-bs-toggle="collapse" data-bs-target="#commentCollapse{{ $post->id }}" aria-expanded="true" aria-controls="commentCollapse{{ $post->id }}">
                        Commentaires ajoutés au cours
                    </div>


                    <div id="commentCollapse{{ $post->id }}" class="collapse">
                        @foreach($post->commentaires as $commentaire)
                            @include('professeur.commentaires.delete')
                            @include('professeur.commentaires.edit')
                        <div class="d-flex align-items-center mb-4 h-100">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="{{ $commentaire->user->image }}" alt="User" class="rounded-circle">
                            </div>
                            <div>
                                <div class="d-flex align-items-center"> <!-- New div to contain name and date -->
                                    <h5 class="card-title me-1 mb-0">{{$commentaire->user->name}}</h5>
                                    <h5 class="fs-tiny mb-0">{{$commentaire->created_at->format('H:i')}}</h5>
                                </div>
                                <p class="card-text">{{$commentaire->commentaire}}</p>
                            </div>
                            <div class="d-flex justify-content-end  w-100" >

                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="chat-header-actions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded fs-4"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="chat-header-actions" style="">
                                    @if( $commentaire->user->id == \Illuminate\Support\Facades\Auth::id() )
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modifierCommentModal{{$commentaire->id}}">modifier</button>
                                    @endif
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteCommentModal{{$commentaire->id}}">suprimmer</button>
                                </div>
                            </div>
                            </div>

                        </div>

                        @endforeach
                    </div>

                    {{-- <div class="d-flex align-items-center mb-4 h-100">
                        <div class="avatar flex-shrink-0 me-3">
                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt="User" class="rounded-circle">
                        </div>
                        <div class="d-flex justify-content-center flex-column" >
                           <div class="d-flex align-items-center gap-2 " >
                               <h5 class="card-title">{{ $post->commentaires->last()->user->name }}   </h5>
                               <h5 class="fs-tiny pt-1" >{{$post->created_at->format('H:i')}}</h5>
                           </div>
                            <p class="card-text">{{ $post->commentaires->last()->commentaire }}</p>
                        </div>
                    </div> --}}
                @else
                    <p>No comments</p>
                @endif
                <form method="post" action="{{ route("commentaires.store") }}">
                    @csrf
                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                    <input type="hidden" value="{{ \Illuminate\Support\Facades\Auth::id() }}" name="user_id">
                    <div class="row g-2">
                        <div class="col px-0 mb-0">
                            <div class="px-1 mb-3 d-flex">
                                <input type="text" value="{{ old("commentaire") }}" name="commentaire" id="nameBasic" placeholder="Ajouter un commentaire au cours…" class="form-control" style="margin-right: 10px;">
                                @error("commentaire")<span class="text-danger">{{ $message }}</span>@enderror
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    @empty
        <h1>No posts</h1>
    @endforelse
    {{ $posts->links() }}

@endsection

@section( "scripts" )
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const filiereSelect = document.getElementById('filiere');
            const semestreSelect = document.getElementById('semestre');
            semestreSelect.disabled = true;

            filiereSelect.addEventListener('change', function () {
                const selectedFiliereId = filiereSelect.value;
                const selectedFiliereOption = filiereSelect.options[filiereSelect.selectedIndex];
                const selectedFiliereType = selectedFiliereOption.getAttribute('data-type');
                semestreSelect.innerHTML = ''; // Clear previous options

                if (selectedFiliereType === 'dut') {
                    semestreSelect.disabled = false;

                    for (let i = 1; i <= 4; i++) {
                        const option = document.createElement('option');
                        option.value = 'Semestre ' + i;
                        option.textContent = 'Semestre ' + i;
                        semestreSelect.appendChild(option);
                    }
                } else if (selectedFiliereType === 'lp') {
                    semestreSelect.disabled = false;

                    for (let i = 5; i <= 6; i++) {
                        const option = document.createElement('option');
                        option.value = 'Semestre ' + i;
                        option.textContent = 'Semestre ' + i;
                        semestreSelect.appendChild(option);
                    }
                }
            });
        });

    </script>
@endsection


