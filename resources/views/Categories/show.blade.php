<x-app-layout>
    {{-- <h1>{{ $user->name }}</h1> --}}

    @foreach ($category->books as $book)
        <div class=" mb-10 ">
            <div class="flex gap-5 px-40 py-10 rounded m-30 justify-center items-center ">

                <div class="w-full">
                    <div class=" flex-1 p-10 rounded  w-full">
                        <h1 class="italic text-xl ml-10 mb-5">{{ $book->title }}</h1>
                        <a href="" class="font-black font-sans  text-4xl ml-10 ">
                            {{ $book->author }}</a>

                    </div>
                </div>
            </div>


        </div>
    @endforeach
</x-app-layout>
