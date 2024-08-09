<x-layout>
    <x-slot:heading>
        {{$task->name}}
    </x-slot:heading>

    <x-task-card :$task/>

</x-layout>
