<div class="relative w-full flex  justify-center items-center flex-col">
    @foreach ($notifications as $notification)
    <div class="6/12 rounded-lg m-2 bg-white hover:bg-gray-200 flex justify-around items-center ">
        
        <div class="m-10"> 
            <a href="{{ route('mypendingBooks') }}">
            <p class="text-center text-xs sm:text-lg">{{$notification->data['message']}}</p>
            </a>
        </div>
        <div class=" mr-5">
            <button class="relative hover:before:content-['Remove']  before:absolute hover:before:bg-red-200 before:rounded-lg before:ml-5 before:p-1 before:font-semibold"  wire:key="notification-{{$notification->id}}">
                <a href="/delete/notifications/{{$notification->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="m336-294 144-144 144 144 42-42-144-144 144-144-42-42-144 144-144-144-42 42 144 144-144 144 42 42ZM180-120q-24 0-42-18t-18-42v-600q0-24 18-42t42-18h600q24 0 42 18t18 42v600q0 24-18 42t-42 18H180Zm0-60h600v-600H180v600Zm0-600v600-600Z"/></svg>
                </a>
              
            </button>
 
        </div>
    </div>
    @endforeach
   
</div>
