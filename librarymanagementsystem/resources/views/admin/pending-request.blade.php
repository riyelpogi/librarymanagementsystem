<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pending Request') }}
        </h2>
    </x-slot>
    @livewire('pending-request')
    
</x-app-layout>