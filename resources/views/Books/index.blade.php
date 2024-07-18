<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-4 text-black text-center">List of Books</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($books as $book)
                <div class="bg-gray-300 overflow-hidden shadow-sm sm:rounded-lg ">
                    <div class="p-6 bg-gray-300 border-b border-gray-200">
                        @if ($book->photo)
                            <img src="{{ asset('storage/' . $book->photo) }}" alt="{{ $book->title }}"
                                class="w-full h-[300px] object-cover mb-4 rounded-sm shadow-md">
                        @else
                            <p>No photo available</p>
                        @endif
                        <h2 class="text-lg font-bold">{{ $book->name }}</h2>
                        <h3 class="text-lg font-bold">{{ $book->title }}</h3>
                        <p class="">Author: {{ $book->author }}</p>
                        <p class="">Category: {{ $book->category->name }}</p>
                        @if ($book->is_borrowed == 0)
                            @auth
                                <form action="{{ route('books.borrowBook', $book->id) }}" method="POST" class="mt-4">
                                    @csrf
                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Borrow</button>
                                </form>
                            @endauth
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
