<x-mail::message>
    <p>
        Task Name: {{$task->name}}
    </p>
    <p>
        Task Details: {{$task->description}}
    </p>

<x-mail::button :url="'http://employeemanagementsystem.test/login'">
Open Task
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
