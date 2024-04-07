<div class="w-full relative flex justify-center items-center flex-col">
    @foreach ($schedules as $schedule)
    <div class="m-10 w-10/12 rounded-lg bg-white flex relative justify-between items-center">
        <div class="relative flex">
            <img src="{{ $schedule->user->profile_photo_url }}" alt="{{$schedule->user->name}}" class="h-16 rounded-full hidden sm:block">
            <div class="">
                <h1 class="mt-2 sm:mt-5 ml-5 text-xs sm:text-1xl">{{$schedule->user->name}}</h1>
                <p class="ml-5 text-xs">Book ID: {{$schedule->book_id}}</p>
            </div>
        </div>
        <x-button class="mr-2" wire:click="showModal({{$schedule->id}})" wire:key="schedule-{{$schedule->id}}">view </x-button>
    </div>
      
    @endforeach
    <x-modal wire:model="showScheduleModal">
        <div class="m-10 relative flex flex-col justify-center items-center">
            <div class="flex border p-10 rounded">
                <img src="{{ $UserPhoto }}" class="w-16 h-16 rounded-full" alt="">
                <h1 class="mt-4 ml-4">{{$UserName}}</h1>
            </div>
            <hr>
            <div class="flex flex-col">

                <div class="flex">
                    <img src="/storage/book.png" class="h-16 w-16 hidden sm:block" alt="">
                    <div class="ml-2 sm:ml-0">
                        <h1 class="mt-4 ml-3 text-xs sm:text-1xl ss:whitespace-nowrap" >{{$BookName}}</h1>
                        <p class="ml-3  text-xs sm:text-1xl">({{ $BookCategory }})</p>
                        <p class="ml-3  text-xs sm:text-1xl">Quantity: {{ $BookQty }}</p>
                        
                    </div>
                </div>  

                <form wire:submit.prevent="Approve({{$Id}})">
                <div class="flex flex-col ml-2 sm:ml-16">
                    
                    <div class="ml-1">
                        <x-label class="text-xs sm:text-1xl">Date Borrowed:</x-label>
                        <h1 class="text-xs sm:text-1xl">{{$date}}</h1>
                    </div>
                    <div class="ml-1">
                        <x-label class="text-xs sm:text-1xl">Date Return:</x-label>
                        <x-input type="date" wire:model="date_return" class="w-32"/>
                    </div>
                    
                </div>

                <div class="flex justify-end mt-10">
                    <div class="">
                        <button class="bg-green-400 inline-flex items-center px-4 py-2 = border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit"  {{$BookQty == 0 ? 'disabled' : ''}} >{{$BookQty == 0 ? 'out of stock' : 'Approve'}}</button>
                    </div>
                </div>
                
            </div>
                </form>     
        </div>
    </x-modal>
</div>
