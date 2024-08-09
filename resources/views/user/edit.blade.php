
<x-layout>

    <x-slot:heading>

        <span class=" row justify-content-end">
            @auth
                <a href="#" class="btn btn-primary">{{auth()->user()->getFullNameAttribute()}}</a>
            @endauth
        </span>

        <x-toast-error/>


    </x-slot:heading>

    <div class="row-cols-xl-2">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit User</h3>
            </div>

            <form action="/users/{{$edit_user->id}}" method="post">
                @csrf
                @method('PATCH')
                {{-- Name field --}}
                <div class="input-group mb-3 mt-2">
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                           value="{{ $edit_user->first_name}}" placeholder="First Name" autofocus>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                           value="{{ $edit_user->last_name}}" placeholder="Last Name" autofocus>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                {{-- Email field --}}
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ $edit_user->email}}" placeholder="{{ __('adminlte::adminlte.email') }}">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                {{-- Password field --}}
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           placeholder="{{ __('adminlte::adminlte.password') }}">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                {{-- Confirm password field --}}
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation"
                           class="form-control @error('password_confirmation') is-invalid @enderror"
                           placeholder="{{ __('adminlte::adminlte.retype_password') }}">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                        </div>
                    </div>

                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                {{-- Register button --}}
                <div class="row justify-content-end">
                    <a href="/all_users" class="btn btn-danger mr-1 ">Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ">
                        <span class="fas fa-user-plus"></span>
                        Save
                    </button>
                </div>


            </form>
        </div>

    </div>



</x-layout>
