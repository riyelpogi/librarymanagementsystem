<div class="w-full relative flex flex-col s:flex-row justify-center items-center h-screen gap-10">
    <div class="w-24 h-24 relative bg-white rounded flex justify-center items-center hover:bg-gray-300"">
        <a href="{{ route('admin.books') }}">
        Books
    </a>
    <span class="block absolute w-6 h-6 rounded-full bg-red-400 font-semibold text-center" style="top:-5px;right:-5px">
        {{$books}}
    </span>
    </div>
    <div class="w-24 h-24 relative bg-white rounded flex justify-center items-center hover:bg-gray-300"">
            <h1 class=" text-center text-sm"z><a href="/pending/request">Pending  Request</a></h1>
            <span class="block absolute w-6 h-6 rounded-full bg-red-400 font-semibold text-center" style="top:-5px;right:-5px">
                {{$pendingRequest}}
            </span>
    </div>
    <div class="w-24 h-24 relative bg-white rounded flex justify-center items-center hover:bg-gray-300">
        <h1 class=" text-center text-sm"><a href="{{route('admin.schedule')}}">Schedules</a></h1>
        <span class="block absolute w-6 h-6 rounded-full bg-red-400 font-semibold text-center" style="top:-5px;right:-5px">
            {{$schedules}}
        </span>
</div>
<div class="w-24 h-24 relative bg-white rounded flex justify-center items-center hover:bg-gray-300"">
    <h1 class=" text-center text-sm"><a href="{{route('admin.borrowed_books')}}">Borrowed Books</a></h1>
    <span class="block absolute w-6 h-6 rounded-full bg-red-400 font-semibold text-center" style="top:-5px;right:-5px">
        {{$borrowedBooks}}
    </span>
</div>
</div>
