<div class="relative w-full  flex justify-center items-center rounded-lg  flex-col">
    <div class="flex justify-end bg-white items-center rounded-lg  flex-col h-24 w-24 mt-5">
    <h1 class="text-center text-sm">Total Books- {{$total_books}}</h1>
        <button class="bg-white hover:bg-gray-100 rounded" wire:click="addBooks">
            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M450-200v-250H200v-60h250v-250h60v250h250v60H510v250h-60Z"/></svg>
        </button>
    </div>

        <x-modal wire:model="addBooksModel">
            <div class="relative flex justify-center items-center flex-col mt-10">
                <form wire:submit.prevent="storeBooks">
                    @csrf
                    <div class="w-64 relative">
                        <x-label for="book_category" value="{{ __('Book Category') }}" />
                        <x-input id="book_category" class="block mt-1 w-full" type="text" wire:model="book_category"  required  />
                        @error('book_category')
                        <p class="text-xs text-red-400">{{$message}}</p>   
                        @enderror
                    </div>
                    <div class="w-64 relative">
                        <x-label for="book_name" value="{{ __('Book Name') }}" />
                        <x-input id="book_name" class="block mt-1 w-full" type="text" wire:model="book_name"  />
                        @error('book_name')
                        <p class="text-xs text-red-400">{{$message}}</p>   
                        @enderror
                    </div>
                    <div class="w-64 relative">
                        <x-label for="book_author" value="{{ __('Book Author') }}" />
                        <x-input id="book_author" class="block mt-1 w-full" type="text" wire:model="book_author" />
                        @error('book_author')
                        <p class="text-xs text-red-400">{{$message}}</p>   
                        @enderror
                    </div>
                    <div class="w-64 relative">
                        <x-label for="book_quantity" value="{{ __('Book Quantity') }}" />
                        <x-input id="book_quantity" class="block mt-1 w-full" type="number" wire:model="book_quantity"  />
                        @error('book_quantity')
                        <p class="text-xs text-red-400">{{$message}}</p>   
                        @enderror
                    </div>
                    <div class="w-64 relative">
                        <x-label for="book_price" value="{{ __('Book Price') }}" />
                        <x-input id="book_price" placeholder="FREE" value="FREE" class="block mt-1 w-full" type="text" wire:model="book_price"  />
                    </div>
                    <div class="w-64 relative">
                        <x-label for="book_description" value="{{ __('Book Description') }}" />
                        <textarea wire:model="book_description" id="" cols="28" rows="5"></textarea>
                        @error('book_description')
                        <p class="text-xs text-red-400">{{$message}}</p>   
                        @enderror
                    </div>
                    <div class="w-64 relative flex justify-end flex-end mb-10">
                        <x-button type="submit" class="bg-green-600">Submit</x-button>
                    </div>
                </form>
            </div>
        </x-modal>
</div>
