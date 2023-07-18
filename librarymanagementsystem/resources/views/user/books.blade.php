<x-app-layout>
    <div class="w-full relative flex flex-col justify-center items-center">
        <div class="w-full relative flex justify-center items-center flex-col mt-10">
            <div class="flex justiy-start">
                <h1 class="font-bold text-base sm:text-4xl">Borrowed Books</h1>
            </div>
        
        @foreach ($borrowed_books as $borrowed_book)
        <div class="w-9/12 m-2 bg-white rounded-lg pointer flex justify-between" >
            
            <div class="relative flex">
                <img src="/storage/book.png" alt="" class="w-20 rounded hidden sm:block">
                <div class="flex flex-col">
                    <h1 class="pl-3 mt-4 ss:text-xs">{{ $borrowed_book->book->book_name }}</h1>
                    <p class="pl-3 text-xs">Book ID: {{$borrowed_book->book_id}}</p>
                </div>
            </div>
            <div class="flex justify-center flex-col sm:mr-10 items-center ">
                <h1 class="text-center mr-5 hidden sm:block sm:text-xs">Date Borrowed: {{$borrowed_book->date_borrowed}}</h1>
                <h1 class="text-center mr-5 text-xs">Due Date:   {{$borrowed_book->schedule_return}}</h1>
            </div>
        </div>
        @endforeach
    </div>

    <div class="w-full relative flex justify-center items-center flex-col mt-10">
        <div class="flex justiy-start">
            <h1 class="font-bold text-base sm:text-4xl">Scheduled Books</h1>
        </div>
        @foreach ($schedules as $schedule)
        <div class="w-9/12 m-2 bg-white rounded-lg pointer flex justify-between" >
            
            <div class="relative flex">
                <img src="/storage/book.png" alt="" class="w-20 rounded hidden sm:block">
                <div class="flex flex-col">
                    <h1 class="pl-3 mt-4 ss:text-xs">{{ $schedule->book->book_name }}</h1>
                    <p class="pl-3 text-xs">Book ID: {{$schedule->book_id}}</p>
                </div>
            </div>
            <div class="flex justify-center sm:mr-10 items-center ">
                <h1 class="text-center mr-5 text-xs">{{$schedule->date}}</h1>
            </div>
        </div>
        @endforeach
        </div>

        <div class="w-full relative flex justify-center items-center flex-col mt-10">
            <div class="flex justiy-start">
                <h1 class="font-bold text-base sm:text-4xl">Pending Books</h1>
            </div>
        @foreach ($books as $book)
        <div class="w-9/12 m-2 bg-white rounded-lg pointer flex justify-between" >
            
            <div class="relative flex">
                <img src="/storage/book.png" alt="" class="w-20 rounded hidden sm:block">
                <div class="flex flex-col">
                    <h1 class="pl-3 mt-4 ss:text-xs">{{ $book->book->book_name }}</h1>
                    <p class="pl-3 text-xs">Book ID: {{$book->book_id}}</p>
                </div>
                
            </div>
            <div class="flex justify-center sm:mr-10 items-center ">
                <h1 class="text-center mr-5 text-xs">Pending</h1>
            </div>
        </div>
        @endforeach
    </div>

    </div>
</x-app-layout>