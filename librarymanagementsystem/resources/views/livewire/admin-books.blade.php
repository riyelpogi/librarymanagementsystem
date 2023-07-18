<div class="w-full relative flex justify-center items-center flex-col">
 
         @foreach ($books as $book)
         <div class="w-9/12 m-2 bg-white rounded-lg pointer flex justify-between" >
             
             <div class="relative flex">
                 <img src="/storage/book.png" alt="" class="hidden sm:block w-20 rounded">
                 <h1 class="p-3 mt-4 text-xs sm:text-1xl">{{ $book->book_name }}</h1>
                 
             </div>
            
             <div class="flex flex-col sm:flex-row">
                <x-button class="mt-2 sm:mt-6 mr-2 h-10 " wire:click="viewBook({{$book->id}})" wire:key="book-{{$book->id}}">View</x-button>
                <x-button class="mt-2 sm:mt-6 mr-2 h-10 " wire:click="editQty({{$book->id}})" wire:key="addQty-bookid-{{$book->id}}">Edit Qty</x-button>
             </div>
         </div>
         @endforeach
 
         <x-modal wire:model="showModal">
             <div class="w-full relative">
                 <div class="m-10">
                     <h1 class="font-bold ">{{$showBookName}} - ({{$showBookCategory}})</h1>
                     <h1 class="font-semibold">Author - {{$showBookAuthor}}</h1>
                     <p class="font-semibold">Quantity - {{$showBookQty}}</p>
                     <p class="font-semibold">Price - {{$showBookPrice !== 'FREE' ? 'PHP' : ''}} {{$showBookPrice}}</p>
                     <br>
                     <br>
                     <h1>Description</h1>
                     <p>{{$showBookDescription}}.</p>

                 </div>
             </div>
         </x-modal>
         
         <x-modal wire:model="editqtyModel">
            <div class="w-full relative">
                <div class="m-10">
                    <div class=" flex justify-center items-center">
                        <img src="/storage/book.png" class="w-16 h-16" alt="">
                        <div class="">
                            <h1>{{$book_name}}</h1>
                            <p class="text-xs">Book ID:{{$book_id}}</p>
                            <p class="text-xs">Quantity: {{$bookQty}}</p>

                        </div>
                    </div>
                    <div class="flex justify-center items-center mt-10">
                        <form wire:submit.prevent="save">
                            <div class="flex flex-col">
                                <x-label class="font-semibold">Add Quantity:</x-label>
                                <x-input type="number" wire:model="num" />
                                @error('num')
                                    <p class="text-xs text-red-400">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex justify-end mt-5 mb-5">
                                <x-button>Save</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </x-modal>
  
 </div>
 
