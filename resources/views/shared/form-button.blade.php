<form action="{{ $route }}" method="{{ $method ?? 'post' }}">
    @csrf
    <button class="{{ $classBtn ?? '' }}" type="submit">
        {{ $slot }}
    </button>
</form>
