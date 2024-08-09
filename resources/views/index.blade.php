
<x-layout>

    <x-slot:heading>

        <span class=" row justify-content-end">
{{--            @dd(Auth::user())--}}
            @auth
                <a href="#" class="btn btn-primary">{{auth()->user()->getFullNameAttribute()}}</a>
            @endauth
        </span>

    </x-slot:heading>


    @if(isset($users))
        <x-user_data_table :$users/>
    @elseif(isset($total_tasks))
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div>
        <x-dashboard-tiles :total_tasks="$total_tasks"/>

    @endif



</x-layout>
