<x-layout>
    <x-slot:heading>
        Create Task

    </x-slot:heading>

    <x-toast-error/>

    <div class="row-cols-xl-2">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Task</h3>
            </div>

            <form action="{{ route('tasks.store') }}" method="post">
                @csrf
                {{-- Name field --}}
                <div class="input-group mb-3 mt-2">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Task Name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="description"
                           class="form-control @error('description') is-invalid @enderror"
                           placeholder="Description of Task" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                {{-- Email field --}}
                <div class="input-group mb-3">
                    <input type="text" name="priority" class="form-control @error('priority') is-invalid @enderror"
                           placeholder="Task Priority">

                    @error('priority')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Select Developer</label>
                    <select name="user_id" class="form-control">
                        @foreach($users as $developer)
                            <option value="{{$developer->id}}">{{$developer->getFullNameAttribute()}}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Task Status</label>
                    <select name="status" class="form-control">

                        @foreach(\App\RandomDataGenerator::typesOfTaskStatus() as $status)
                            <option value="{{$status}}">{{$status}}</option>
                        @endforeach

                    </select>
                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="datetime-local" name="estimated_completion_time"
                           class="form-control @error('estimated_completion_time') is-invalid @enderror"
                           placeholder="{{ __('adminlte::adminlte.estimated_completion_time') }}">

                    @error('estimated_completion_time')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                {{-- Register button --}}
                <div class="row justify-content-end">
                    <a href="{{ route('tasks.index') }}" class="btn btn-danger mr-1 ">Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ">
                        <span class="fas fa-user-plus"></span>
                        Create Task
                    </button>
                </div>


            </form>
        </div>

    </div>

</x-layout>
