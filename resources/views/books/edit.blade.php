<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit {{ $books->title }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action=" {{route('main.update',$books->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="author" class="block font-medium text-sm text-gray-700">Author</label>
                            <input type="text" name="author" id="auhtor" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $books->author }}" />
                            @error('author')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                            <input type="text" name="title" id="title" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{  $books->title }}" />
                            @error('title')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="genre" class="block font-medium text-sm text-gray-700">Genre</label>
                            <input type="text" name="genre" id="genre" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{  $books->genre }}" />
                            @error('genre')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="quantity" class="block font-medium text-sm text-gray-700">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $books->quantity  }}" />
                            @error('quantity')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="publisher" class="block font-medium text-sm text-gray-700">Publisher</label>
                            <input type="text" name="publisher" id="publisher   " class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $books->publisher  }}" />
                            @error('publisher')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>