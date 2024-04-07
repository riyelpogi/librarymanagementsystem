<div class="relative flex justify-center items-center gap-5">
 

    <x-dropdown>
        <x-slot name="trigger">
            <div class="relative cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" wire:click="read" height="22" viewBox="0 -960 960 960" width="22"><path d="M160-200v-60h84v-306q0-84 49.5-149.5T424-798v-29q0-23 16.5-38t39.5-15q23 0 39.5 15t16.5 38v29q81 17 131 82.5T717-566v306h83v60H160Zm320-295Zm0 415q-32 0-56-23.5T400-160h160q0 33-23.5 56.5T480-80ZM304-260h353v-306q0-74-51-126t-125-52q-74 0-125.5 52T304-566v306Z"/></svg>
                <span class="block rounded-full bg-red-400 text-center text-xs absolute font-semibold p-0.5" style="top:-5px;left:-5px">{{$unreadNotification}}</span>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="mr-0">
                @foreach ($notifications as $notification)
                <a href="{{ route('mypendingBooks') }}">
                <div class=" w-48 {{$notification->read_at == null ? '' : 'bg-gray-100'}} hover:bg-gray-300" style="border-bottom:0.2px black">
                    <p class="p-2">{{$notification->data['message']}}</p>
                </div></a>
            @endforeach
            <div class="mt-2 flex justify-center items-center bg-white hover:bg-white-100">
                <a href="{{route('notifications')}}" class="text-center">See all</a>
            </div>
            </div>
           
        </x-slot>
    </x-dropdown>
    
    <div class="hidden sm:block">
        <a href="{{ route('mypendingBooks') }}">
            <svg width="22" height="22" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M202.4 32c-34.4 0-61.6 28-61.6 61.6v812.8c0 34.4 28 61.6 61.6 61.6h681.6V32H202.4z" fill="#72B6D3" /><path d="M264 32h-61.6c-34.4 0-61.6 28-61.6 61.6v812.8c0 34.4 28 61.6 61.6 61.6H264V32z" fill="#090C10" /><path d="M195.2 848h686.4v116.8H195.2c-28.8 0-52.8-26.4-52.8-58.4s23.2-58.4 52.8-58.4z" fill="#FFFFFF" /><path d="M884 976.8H202.4c-38.4 0-69.6-31.2-69.6-69.6V93.6c0-38.4 31.2-69.6 69.6-69.6h681.6c4.8 0 8 3.2 8 8v936.8c0 4-4 8-8 8zM202.4 40c-29.6 0-53.6 24-53.6 53.6v812.8c0 29.6 24 53.6 53.6 53.6h673.6V40H202.4z" fill="#6A576D" /><path d="M140 914.4c-4.8 0-8-3.2-8-8V93.6c0-38.4 31.2-69.6 69.6-69.6H264c4.8 0 8 3.2 8 8v812.8c0 4.8-3.2 8-8 8h-61.6c-29.6 0-53.6 24-53.6 53.6-0.8 4.8-4 8-8.8 8zM202.4 40c-29.6 0-53.6 24-53.6 53.6v768c12.8-15.2 32-25.6 53.6-25.6H256V40h-53.6z" fill="#6A576D" /><path d="M260.8 898.4h47.2V992h-47.2z" fill="#F1ED7B" /><path d="M308 1000h-47.2c-4.8 0-8-3.2-8-8v-93.6c0-4.8 3.2-8 8-8h47.2c4.8 0 8 3.2 8 8V992c0 4.8-4 8-8 8z m-39.2-16h31.2v-77.6h-31.2v77.6z" fill="#6A576D" /><path d="M692 453.6H449.6c-34.4 0-62.4-28-62.4-62.4V281.6c0-34.4 28-62.4 62.4-62.4h242.4c34.4 0 62.4 28 62.4 62.4v109.6c0 34.4-28 62.4-62.4 62.4z" fill="#FFFFFF" /><path d="M692 461.6H449.6c-38.4 0-70.4-31.2-70.4-70.4V281.6c0-38.4 31.2-70.4 70.4-70.4h242.4c38.4 0 70.4 31.2 70.4 70.4v109.6c0 38.4-32 70.4-70.4 70.4zM449.6 227.2c-29.6 0-54.4 24-54.4 54.4v109.6c0 29.6 24 54.4 54.4 54.4h242.4c29.6 0 54.4-24 54.4-54.4V281.6c0-29.6-24-54.4-54.4-54.4H449.6zM884 852.8H264c-4.8 0-8-3.2-8-8s3.2-8 8-8h620c4.8 0 8 3.2 8 8s-4 8-8 8z" fill="#6A576D" />
            <span class="block rounded-full"></span></svg>
        </a>
        
    </div>
</div>
