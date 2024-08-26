<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-toast-success/>
                @if(!count($approvals))
                    <div class="row justify-content-lg-center">
                        <h4>No Approval Found... </h4>

                    </div>
                @else
                <div class="card">
                    <div class="card-header">

                        <h3 class="card-title">{{$slot}}</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                {{--                                <div class="col-sm-12 col-md-6"></div>--}}
                            </div>
                            <div class="row">
                                <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                        <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Approval_id</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Task_id</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Developer Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Approval Requested</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Task_Remarks</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Actions</th>
                                        </thead>
                                        <tbody>

                                            @foreach($approvals as $approval)

                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">{{$approval->id}}</td>

                                                <td>{{ \App\UserFinder::findtaskname($approval->task_id)}}</td>

                                                <td>{{\App\UserFinder::findtask($approval->task_id)}}</td>

                                                <td>
                                                    <x-swich-case :$approval/>
                                                </td>

                                                <td>{{$approval->task_remarks}}</td>

                                                <td>

                                                    <div class="row">

                                                        @if(!$approval->approval_granted)
                                                        <form action='grant_approval/{{$approval->id}}' method="post">
                                                            @csrf
                                                            <button class="btn btn-success mr-1">Grant Approval</button>
                                                            <a href="delete_approval/{{$approval->id}}" class="btn btn-danger mr-1">Decline Approval</a>
                                                        </form>


                                                        @else
                                                            <i class="fas fa-check"></i>

                                                        @endif

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
                @endif

                <div class="row justify-content-end">
                    {{$approvals->links()}}


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
