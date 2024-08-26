<tr class="odd">
    <td class="dtr-control sorting_1" tabindex="0">{{$task->id}}</td>
    <td class="dtr-control sorting_1" tabindex="0">{{$task->name}}</td>
    <td>{{$task->description}}</td>
    <td>
        @if($task->status == 'open')
            <span class="badge badge-primary">{{$task->status}}</span>
        @elseif($task->status == 'in progress')
            <span class="badge badge-warning">{{$task->status}}</span>
        @elseif($task->status == 'on hold')
            <span class="badge badge-danger">{{$task->status}}</span>
        @else
            <span class="badge badge-success">{{$task->status}}</span>
        @endif
    </td>
    <td>{{$task->priority}}</td>
    <td>{{\App\UserFinder::findtask($task->user_id)}}</td>
    <td>{{
            $task->estimated_completion_time

            }}</td>
{{--    @dd($task->approval)--}}

    @php
        if($task->task_approval_id != '0')
            $approval_name= \App\Models\TaskApproval::findOrFail($task->task_approval_id);
        else
            $approval_name='Approval Not Submitted';
    @endphp

    <td>{{$task->$approval_name}}</td>

    <td>
        <div class="row justify-content-lg-start">
            <a href="/tasks/{{$task->id}}" class="btn btn-primary">View </a>

            @can('isAdmin',\Illuminate\Support\Facades\Auth::user())
                <form action='tasks/{{$task->id}}' method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
                <a class="btn btn-primary" href="tasks/{{$task->id}}/edit">Edit</a>

            @endcan
            @can('isDeveloper')
               <a class="btn btn-primary" href="changeStatus/{{$task->id}}">change Status</a>
            @endcan
        </div>
    </td>
</tr>
</tr>
