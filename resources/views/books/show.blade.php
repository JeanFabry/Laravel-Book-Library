<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($book->title) }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <section>
                    <div>
                        <div class="flex bg-white shadow-md overflow-hidden">
                            <div class="w-1/5 bg-cover" style="background-image: url('https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1267&q=80')">
                            </div>
                            <div class="w-4/5 p-4">
                                <p class="mt-2 text-gray-600 text-sm"> Author: {{$book->author}} </p>
                                <p class="mt-2 text-gray-600 text-sm"> Genre : {{$book->genre}} </p>
                                <p class="mt-2 text-gray-600 text-sm"> Publisher: {{$book->publisher}} </p>
                                <div class="flex item-center justify-between mt-3">
                                    <h2 class="text-gray-700 font-bold text-xl">N° of books available:
                                        {{$book->quantity}}
                                    </h2>
                                    <!--  <a href='{{route("rent.store",$book->id)}} ' class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded">Rent
                                        this book</a> -->

                                    <form action="{{ route('rent.store', $book->id)}}" method="post">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="book_id" value="{{$book->id}}">
                                        <button type="submit">RENT THIS BOOK</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <section class="mt-12">
                    <h2 class="text-center">OTHER BOOKS WITH THE SAME GENRE</h2>
                    <div class="flex mt-6">
                        @foreach($genre as $type)
                        <div class='w-1/3'>
                            <div class="flex bg-white shadow-md overflow-hidden">
                                <div class="p-4">
                                    <h3>{{$type->title}}</h3>
                                    <p class="mt-2 text-gray-600 text-sm"> Author: {{$type->author}} </p>
                                    <!-- <p class="mt-2 text-gray-600 text-sm"> Genre : {{$type->genre}} </p> -->
                                    <p class="mt-2 text-gray-600 text-sm"> Publisher: {{$type->publisher}} </p>
                                    <div class="flex item-center justify-between mt-3">
                                        <p class="text-gray-700 font-bold ">N° of books available:
                                            {{$type->quantity}}
                                        </p>
                                    </div>
                                    <div class="flex">
                                        <a href='{{route("main.show",$type->id)}}' class="mt-2 px-3 py-1 bg-gray-800 text-white text-xs font-bold uppercase rounded">Show</a>
                                        <a href='#' class="ml-2 mt-2 px-3 py-1 bg-gray-800 text-white text-xs font-bold uppercase rounded">Rent</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </section>

                <section class="mt-12">
                    <h2 class="text-center">OTHER BOOKS FROM THE SAME AUTHOR</h2>
                    <div class="flex mt-6">
                        @foreach($author as $type)
                        <div class='w-1/3'>
                            <div class="flex bg-white shadow-md overflow-hidden">
                                <div class="p-4">
                                    <h3>{{$type->title}}</h3>
                                    <p class="mt-2 text-gray-600 text-sm"> Genre : {{$type->genre}} </p>
                                    <p class="mt-2 text-gray-600 text-sm"> Publisher: {{$type->publisher}} </p>
                                    <div class="flex item-center justify-between mt-3">
                                        <p class="text-gray-700 font-bold ">N° of books available:
                                            {{$type->quantity}}
                                        </p>
                                    </div>
                                    <div class="flex">
                                        <a href='{{route("main.show",$type->id)}}' class="mt-2 px-3 py-1 bg-gray-800 text-white text-xs font-bold uppercase rounded">Show</a>
                                        <a href='#' class="ml-2 mt-2 px-3 py-1 bg-gray-800 text-white text-xs font-bold uppercase rounded">Rent</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>