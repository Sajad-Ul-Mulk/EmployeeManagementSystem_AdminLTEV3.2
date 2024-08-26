@switch($approval->status_approval)
    @case('open')
        <span class="badge badge-primary">{{$approval->status_approval}}</span>
        @break
    @case('in progress')
        <span class="badge badge-warning">{{$approval->status_approval}}</span>
        @break
    @case('on hold')
        <span class="badge badge-danger">{{$approval->status_approval}}</span>
        @break
    @case('completed')
        <span class="badge badge-success">{{$approval->status_approval}}</span>
        @break

@endswitch
{{--                                                    @if($approval->status_approval == 'open')--}}
{{--                                                        <span class="badge badge-primary">{{$approval->status_approval}}</span>--}}
{{--                                                    @elseif($approval->status_approval == 'in progress')--}}
{{--                                                        <span class="badge badge-warning">{{$approval->status_approval}}</span>--}}
{{--                                                    @elseif($approval->status_approval == 'on hold')--}}
{{--                                                        <span class="badge badge-danger">{{$approval->status_approval}}</span>--}}
{{--                                                    @else--}}
{{--                                                        <span class="badge badge-success">{{$approval->status_approval}}</span>--}}
{{--                                                    @endif--}}
{{--                                                    {{$approval->status_approval}}--}}
