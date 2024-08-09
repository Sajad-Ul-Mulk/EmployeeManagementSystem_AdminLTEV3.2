<div class="card text-center">
    <div class="card-header">
        <div class="row justify-content-lg-between" >
            <strong>Task Name: </strong>{{$task->name}}


            @if($task->status == 'open')
                <h5>
                    <a href="/task_status/{{$task->status}}" class="badge badge-primary p-1">{{$task->status}}</a>
                </h5>
            @elseif($task->status == 'in progress')
                <h5>
                    <a href="/task_status/{{$task->status}}" class="badge badge-warning p-1">{{$task->status}}</a>
                </h5>            @elseif($task->status == 'on hold')
                <h5>
                    <a href="/task_status/{{$task->status}}" class="badge badge-danger p-1">{{$task->status}}</a>
                </h5>
            @else
                <h5>
                    <a href="/task_status/{{$task->status}}" class="badge badge-success p-1">{{$task->status}}</a>
                </h5>
            @endif

        </div>

    </div>
    <div class="card-body">

        <h5 class="card-title">
            <div class=" row">
                <div class=" cols-3">
                    <strong>
                        Task Priority: {{$task->priority}}
                    </strong>

                </div>
                <div class="cols-9">
                    <h5 class="card-text">{{$task->description}}</h5>
                </div>
            </div>
        </h5>

        <a href="/users/{{$task->user_id}}/tasks" class="btn btn-primary">Developer: {{\App\UserFinder::findtask($task->user_id)}}</a>
    </div>
    <div class="card-footer text-muted">
        Estimated Time of Completion:
         {{$task->estimated_completion_time}}
    </div>
</div>
