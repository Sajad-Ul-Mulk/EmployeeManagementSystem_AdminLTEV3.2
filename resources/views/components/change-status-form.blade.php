<form action="/approveStatusChange/{{$task->id}}" method="post">
@csrf
    <div>
           <h2> Name: {{$task->name}}</h2>
        <h4>Change the status from of the task from Dropdown BELOW</h4>
    </div>
    <div data-mdb-input-init class="form-outline mb-4">
        <label>Task Status</label>
        <select name="status_approval" class="form-control">
            @foreach(\App\RandomDataGenerator::typesOfTaskStatus() as $status)
                <option value="{{$status}}">{{$status}}</option>
            @endforeach
        </select>
    </div>

    <div data-mdb-input-init class="form-outline mb-4">
        <textarea id="textarea4" rows="4" class="form-control" name="task_remarks"></textarea>
        @error('task_remarks')
        <p class='text-red'>
            {{ $message }}
        </p>
        @enderror
    </div>


    <!-- Submit button -->
    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block">Send Approval</button>
</form>
