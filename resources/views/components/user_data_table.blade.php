<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
<x-toast-success/>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Registered Users</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="row justify-content-end mb-2 ">
                                        <a href="/users/create" class="btn btn-primary ">Add New User</a>
                                    </div>

                                </div>
{{--                                <div class="col-sm-12 col-md-6"></div>--}}
                            </div>
                            <div class="row">
                                <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                        <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">First Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Last Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Role</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Actions</th>
                                        </thead>
                                        <tbody>

                                        @foreach($users as $user)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">{{$user->first_name}}</td>
                                                <td>{{$user->last_name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->role}}</td>
                                                <td>
                                                    <div class="row">
                                                        <a href="#" class="btn btn-primary mr-1">View </a>

                                                        <form action='users/{{$user->id}}' method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger mr-1">Delete</button>
                                                        </form>

                                                        <a class="btn btn-primary" href="users/{{$user->id}}/edit">Edit</a>
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>

                                    </table>


                                </div>
                            </div>
                    </div>
                    </div>
            </div>
                    <div class="row justify-content-end">
                        {{$users->links()}}
                    </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    </div>
    <!-- /.container-fluid -->
</section>
