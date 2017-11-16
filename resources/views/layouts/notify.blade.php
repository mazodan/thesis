@if($flash = session('message'))
    <div class="notification is-success">
        {{$flash}}
    </div>
@endif
@if($flash = session('message-warn'))
    <div class="notification is-warning">
        {{$flash}}
    </div>
@endif