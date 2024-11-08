<div>
    <label for="name">{{$label}}</label>
    <x-filament::input.wrapper style="margin: 10px 0;">
        <x-filament::input
            type="text"
            wire:model="patientFullName"
        />
    </x-filament::input.wrapper>
</div>
<x-filament::button style="width: 100%;" wire:click="createNewPatient">
    {{$buttonLabel}}
</x-filament::button>
