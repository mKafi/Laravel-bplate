<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info', 'error'] as $msg)
      @if(Session::has($msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get($msg)}}</p>
      @endif
    @endforeach
</div>
