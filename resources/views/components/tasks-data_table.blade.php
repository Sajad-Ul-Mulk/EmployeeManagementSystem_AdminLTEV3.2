{{--@props(['tasks','specific_user'])--}}
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-toast-success/>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">

{{--                            @if(isset($specific_user))--}}
{{--                                {{$specific_user->first_name}}'s Open Tasks--}}
{{--                            @else--}}
                                All Available Tasks
{{--                            @endif--}}
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">

                                </div>
                                {{--                                <div class="col-sm-12 col-md-6"></div>--}}
                            </div>
                            <div class="row">
                                <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                        <thead>
                                        <tr>
                                            <th>Task_id</th>
                                            <th>Task_Name</th>
                                            <th>Description</th>
                                            <th>Task_Status</th>
                                            <th>Task_Priority</th>
                                            <th>Task_Assigned_To</th>
                                            <th>Completion_Time</th>
                                            <th>Approvals</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                        {{--@dd($tasks)--}}
                                        @foreach($tasks as $task)


                                            @can('isAdmin',Auth::user())
                                                <x-data-row :$task/>
                                                @continue
                                            @endcan

                                            @can('isAuthor',$task)
                                                <x-data-row :$task/>
                                            @endcan

                                        @endforeach

                                        </tbody>

                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    {{$tasks->links()}}
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
