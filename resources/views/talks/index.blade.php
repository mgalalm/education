<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Talks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a
                        href="{{ route('talks.create') }}"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Create Talk
                    </a>
                    @foreach ($talks as $talk)
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">
                                {{ $talk->title }}
                                <span class="inline-block rounded-full bg-gray-200 px-2 py-1 text-xs text-gray-800">
                                    {{ ucfirst($talk->type) }}
                                </span>
                            </h3>
                            <p class="mt-2 text-sm leading-6 text-gray-600">{{ $talk->abstract }}</p>
                            <div class="mt-2 flex items-center gap-x-6">
                                <a
                                    href="{{ route('talks.show', $talk) }}"
                                    class="text-sm font-semibold leading-6 text-gray-900"
                                >
                                    View
                                </a>
                                <a
                                    href="{{ route('talks.edit', $talk) }}"
                                    class="text-sm font-semibold leading-6 text-gray-900"
                                >
                                    Edit
                                </a>
                                <x-delete-item
                                    :route="route('talks.delete', ['talk' => $talk])"
                                    class="text-sm font-semibold leading-6 text-gray-900"
                                >
                                    Delete
                                </x-delete-item>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
