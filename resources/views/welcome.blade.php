<x-app-layout>

    <div class="shadow-md bg-gray-100 px-8 py-2">
        @foreach ($categories as $category)
            <a href="{{ route('categories.show', $category->id) }}"
                class="inline-block py-1 m-1 rounded-lg bg-gray-200 hover:bg-blue-200 hover:text-white px-4 border-2 text-sm">{{ $category->name }}</a>
        @endforeach
    </div>

</x-app-layout>
