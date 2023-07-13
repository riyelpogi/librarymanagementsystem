
   <div class="w-full relative flex justify-center items-center flex-col">
 <div class="h-6">
    <x-message />
 </div>
        @foreach ($books as $book)
        <div class="w-9/12 m-2 bg-white rounded-lg pointer flex justify-between" >
            
            <div class="relative flex">
                <img src="/storage/book.png" alt="" class="w-20 rounded">
                <h1 class="p-3 mt-4">{{ $book->book_name }}</h1>
                
            </div>
            <x-button class="mt-6 mr-2 h-10 " wire:click="viewBook({{$book->id}})" wire:key="book-{{$book->id}}">View</x-button>
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
                    <div class="flex justify-end">
                        <button class="bg-green-400 inline-flex items-center px-4 py-2 = border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" {{$showBookQty == 0 ? 'disabled' : ''}} wire:click="borrow({{$showBookId}})" id="btn"> {{$showBookQty == 0 ? 'Out of Stock' : 'Borrow'}} </button>
                    </div>
                </div>
            </div>
        </x-modal>

   </div>
<script>
    var btn = document.getElementById('btn');
    btn.addEventListener('click', function() {
        Livewire.emit('refreshCount');
    });
</script>