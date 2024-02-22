@props([
    'type',
    'message'
])

<div id="MyAlert" style="position: fixed; z-index: 999999; width: 30%; bottom: 0; right: 0;">
    <div class="alert alert-{{$type}} alert-dismissible text-center" role="alert">
        <div>{{ $message }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>


