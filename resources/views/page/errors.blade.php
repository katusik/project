@if (count($errors) > 0)
    <p class="errors">
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    </p>
@endif
