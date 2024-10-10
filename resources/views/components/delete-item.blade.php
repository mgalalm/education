@props([
    'route',
])

<form action="{{ $route }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">Delete</button>
</form>
