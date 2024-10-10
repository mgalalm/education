<div class="mx-auto max-w-2xl py-8">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title', $talk->title) }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />
                        <x-input-error for="title" class="mt2" :messages="$errors->get('title')" />
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Type</label>
                    <div class="mt-2">
                        <select
                            id="country"
                            name="type"
                            autocomplete="type"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6"
                        >
                            @foreach (\App\Enums\TalkType::cases() as $type)
                                <option value="{{ $type->value }}" @selected($type->value === old('type'))>
                                    {{ ucwords($type->value) }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="title" class="mt2" :messages="$errors->get('type', $talk->type)" />
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                    <div class="mt-2">
                        <input
                            type="text"
                            name="length"
                            id="length"
                            value="{{ old('length', $talk->length) }}"
                            autocomplete="family-name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        />

                        <x-input-error for="title" class="mt2" :messages="$errors->get('length')" />
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="abstract" class="block text-sm font-medium leading-6 text-gray-900">Abstract</label>
                    <div class="mt-2">
                        <textarea
                            id="abstract"
                            name="abstract"
                            rows="3"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
 {{ old('abstract', $talk->abstract) }} </textarea
                        >
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">
                        Describe the talk in a few sentences, in a way that's compelling and informative and could be
                        presented to the public.
                    </p>
                </div>

                <div class="col-span-full">
                    <label for="organizer_notes" class="block text-sm font-medium leading-6 text-gray-900">
                        Organizer notes
                    </label>
                    <div class="mt-2">
                        <textarea
                            id="organizer_notes"
                            name="organizer_notes"
                            rows="3"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        >
{{ old('organizer_notes', $talk->organizer_notes) }}</textarea
                        >
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">
                        Write any notes you may want to pass to an event organizer about this talk.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button
            type="submit"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >
            Save
        </button>
    </div>
</div>
