<div>
    @auth
    @if ($dropInfo != "")
        <div class="alert alert-success" role="alert">
            <span>{{ $dropInfo }}</span>
        </div>
    @endif
    <button class="btn btn-primary" wire:click.prevent="openFunction">OPEN</button>
    @if (!empty($message))
        <br><span class="text-danger mt-3">{{ $message }}</span>
    @endif
        @else
    <p class="text-info">You need to be <a href="{{ route('login') }}">login</a> to open cases</p>
    @endauth
</div>
