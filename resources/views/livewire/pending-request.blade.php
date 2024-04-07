<div class="w-10/12 relative m-10 ">
    @foreach ($requests as $request)
        <div class="mt-5 sm:m-10 w-full rounded-lg bg-white flex relative justify-between items-center">
            <div class="relative flex ">
                <img src="{{ $request->user->profile_photo_url }}" alt="{{$request->user->name}}" class="h-16 rounded-full hidden sm:block">
                <div class="">
                <h1 class="mt-2 sm:mt-5 ml-5 text-xs sm:text-1xl">{{$request->user->name}}</h1>
                <p class="ml-5 text-xs">Book ID: {{$request->book_id}}</p>
                </div>
            </div>
            <x-button class="mr-2 text-xs" wire:click="showRequest({{$request->id}})" wire:key="request-{{$request->id}}">view request</x-button>
        </div>
    @endforeach 
    
    <x-modal wire:model="showRequestModal">
        <div class="m-10 relative flex flex-col justify-center items-center">
            <div class="flex border p-10 rounded">
                <img src="{{ $requestUserPhoto }}" class="w-16 h-16 rounded-full" alt="">
                <h1 class="mt-4 ml-4">{{$requestUserName}}</h1>
            </div>
            <hr>
            <div class="flex flex-col">

                <div class="flex">
                    <img src="/storage/book.png" class="h-16 w-16  hidden sm:block " alt="">
                    <div class="">
                        <h1 class="mt-4 ml-3" >{{$requestBookName}}</h1>
                        <p class="ml-3">({{ $requestBookCategory }})</p>
                        <p class="ml-3">Quantity: {{ $requestBookQty }}</p>
                        
                    </div>
                </div>

                <div class="flex justify-end mt-10">
                    <div class="">
                        <p class="text-xs ml-4">{{$date}}</p>
                        <button class="bg-green-400 inline-flex items-center px-4 py-2 = border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit" wire:click="approve({{$requestId}})" {{$requestBookQty == 0 ? 'disabled' : ''}} >{{$requestBookQty == 0 ? 'out of stock' : 'Approve'}}</button>
                    </div>
                </div>
                
            </div>
        </div>
    </x-modal>
</div>
