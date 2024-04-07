
<div class="w-full relative flex justify-center items-center flex-col">
    <div class="h-6">      
       <x-message />
           </div>
           @foreach ($books as $book)
           <div class="w-9/12 m-2 bg-white rounded-lg pointer flex justify-between">
               
               <div class="relative flex">
                   <img src="/storage/book.png" alt="" class="hidden sm:block w-20 rounded">
                   <h1 class="p-3 mt-4 text-xs">{{ $book->book_name }}</h1>
               </div>
               <x-button class="mt-6 mr-2 h-10 ss:py-1 ss:px-1" wire:click="viewBook({{$book->id}})" wire:key="book-{{$book->id}}" id="btn"  >View</x-button>
           </div>
           @endforeach
   
           <x-modal wire:model="showModal">
               <div class="w-full relative xl:text-2xl">
                   <div class="m-10">
                       <h1 class="font-bold text-xs sm:text-base">{{$showBookName}} - ({{$showBookCategory}})</h1>
                       <h1 class="font-semibold text-xs sm:text-base">Author - {{$showBookAuthor}}</h1>
                       <p class="font-semibold text-xs sm:text-base">Quantity - {{$showBookQty}}</p>
                       <p class="font-semibold text-xs sm:text-base">Price - {{$showBookPrice !== 'FREE' ? 'PHP' : ''}} {{$showBookPrice}}</p>
                       <br>
                       <br>
                       <h1 class="hidden sm:block sm:text-base">Description</h1>
                       <p class="hidden sm:block sm:text-base">{{$showBookDescription}}.</p>
                       <div class="flex justify-end">
                           <button class="bg-green-400 inline-flex items-center px-4 py-2 = border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"   {{$showBookQty == 0 ? 'disabled' : ''}} wire:click="borrow({{$showBookId}})"  wire:key="borrow-{{$showBookId}}"> {{$showBookQty == 0 ? 'Out of Stock' : 'Borrow'}} </button>
                       </div>
                   </div>
               </div>
           </x-modal>



<script>
    document.addEventListener('livewire:load', function() {
      

        
        
    });
   
</script>
      </div>
