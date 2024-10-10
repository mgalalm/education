<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $talk->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--
                        <a href="{{ route('talks.create') }}"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                        Talk</a>
                    --}}
                    <div class="mt-6">
                        <div class="mt-4">
                            <p class="text-sm text-gray-600">
                                <strong>Type:</strong>
                                {{ ucfirst($talk->type) }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>Length:</strong>
                                {{ $talk->length }} minutes
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>Abstract:</strong>
                                {{ $talk->abstract ?: 'N/A' }}
                            </p>
                            <p class="text-sm text-gray-600">
                                <strong>Organizer notes:</strong>
                                {{ $talk->organizer_notes ?: 'N/A' }}
                            </p>
                        </div>

                        <div class="mt-2 flex items-center gap-x-6">
                            <a
                                href="{{ route('talks.edit', $talk) }}"
                                class="text-sm font-semibold leading-6 text-gray-900"
                            >
                                Edit
                            </a>
                            <x-delete-item route="{{ route('talks.delete', $talk) }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
