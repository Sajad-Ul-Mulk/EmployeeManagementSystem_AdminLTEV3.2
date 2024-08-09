<x-layout>
    <x-slot:heading>
        Editing Task: {{$task->name}}
    </x-slot:heading>

    <x-toast-error/>
    <div class="row-cols-xl-2">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Update Task</h3>
            </div>

            <form action="{{ route('tasks.update',$task->id) }}" method="post">
                @csrf
                @method('PATCH')
                {{-- Name field --}}
                <div class="input-group mb-3 mt-2">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Task Name"
                           value="{{$task->name}}"
                           autofocus
                           @can('shouldDisableField') disabled @endcan>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="description"
                           class="form-control @error('description') is-invalid @enderror"
                           placeholder="Description of Task"
                           value="{{$task->description}}"
                           autofocus
                           @can('shouldDisableField') disabled @endcan>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                {{-- Email field --}}
                <div class="input-group mb-3">
                    <input type="text" name="priority" class="form-control @error('priority') is-invalid @enderror"
                           placeholder="Task Priority"
                           value="{{$task->priority}}"
                           @can('shouldDisableField') disabled @endcan>

                    @error('priority')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Select Developer</label>
                    <select name="user_id" class="form-control"
                            @can('shouldDisableField') disabled @endcan>
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

                    <select name="status" class="form-control" >
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
                           placeholder="{{ __('adminlte::adminlte.estimated_completion_time') }}"
                           value="{{$task->estimated_completion_time}}"
                           @can('shouldDisableField') disabled @endcan>

                    @error('estimated_completion_time')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                {{-- Register button --}}
                <div class="row justify-content-center mb-1">
                    <a href="{{ route('tasks.index') }}" class="btn btn-danger mr-1  ">Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ">
                        <span class="fas fa-user-plus"></span>
                        Update Task
                    </button>
                </div>


            </form>
        </div>

    </div>

</x-layout>
