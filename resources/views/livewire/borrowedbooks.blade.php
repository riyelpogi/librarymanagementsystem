<div class="w-full flex justify-center items-center flex-col relative">
    <div class="relative mt-5">
        <input type="search" wire:model="search" placeholder="Search by Book Id" class="h-6">
        <button type="search" class="py-1 rounded">Search</button>
    </div>
    @foreach ($borrowedBooks as $borrowedBook)
    <div class="w-10/12 flex m-5 rounded bg-white justify-between">
        <div class=" flex ">
            <img src="{{$borrowedBook->user->profile_photo_url}}" class="w-16 h-16 rounded-full hidden sm:block" alt="">
            <div class="">
                <h1 class="text-xs sm:text-1xl font-semibold">{{$borrowedBook->user->name}}</h1>
                <h1 class="text-xs">{{$borrowedBook->book->book_name}}</h1>
                <p class="text-xs">Book ID: {{$borrowedBook->book_id}}</p>
            </div>
            
        </div>
        <div class="flex justify-center items-center mr-5">
                <x-button wire:click="select({{$borrowedBook->id}})">
                    select
                </x-button>
        </div>
        
    </div>
    @endforeach

    <x-modal wire:model="returnModal">
        <div class="flex justify-center relative items-center flex-col mt-10">
            <div class="flex border">
                <div class="">
                    <img src="{{$user_photo}}" class="w-16 h-16 rounded-full" alt="">
                </div>
                <div class="flex flex-col">
                    <h1 class="pt-3">{{$user_name}}</h1>
                </div>
            </div>
            <div class="flex flex-col relative mt-5 ml-2 sm:ml-0">
                <h1>Borrowed Book:</h1>
                <div class="flex relative">
                    <img src="/storage/book.png" alt="" class="w-16 h-16 hidden sm:block">
                    <div class="flex flex-col mt-3">
                        <h1 class="text-xs sm:text-1xl">{{$book_name}}</h1>
                        <p class="text-xs">Book ID: {{$bookId}}</p>
                    </div>
                </div>
                <div class="flex flex-col mt-5 ml-2 sm:ml-0">
                    <h1 class="text-xs sm:text-1xl">Date Borrowed: {{$date_borrowed}} </h1>
                    <h1 class="text-xs sm:text-1xl">Due Date : {{$due_date}} </h1>
                </div>
                <form wire:submit.prevent="returned({{$borrowedbooksId}})">
                <div class="flex flex-col mt-5">
                    <h1 class="text-xs sm:text-1xl  ml-2 sm:ml-0" >Date Return:</h1>
                    <x-input type="date" wire:model="date_returned"/>
                    @error('date_returned')<p class="text-xs text-red-400">
                        {{$message}}
                    </p>@enderror

                    <div class=" flex justify-end mt-10 mb-5">
                        <x-button type="submit" >submit</x-button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </x-modal>
</div>