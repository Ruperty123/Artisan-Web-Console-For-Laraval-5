<div class="error message-block">
    @if(is_array($message))
        @foreach($message as $part)
            <p>[ {!! $part !!} ]</p>
        @endforeach
    @else
        <p>[ {!! $message !!} ]</p>
    @endif
</div>