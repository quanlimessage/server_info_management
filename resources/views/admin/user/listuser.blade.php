@extends('admin.master')
@section('content')
<main id="main">
    <div class="container">
        <div class="page-header">
            <h1>List user</h1>
        </div>
        <table class="table table-striped">
            @foreach($user_data as $val)
            <tr>
                <th><a href="#" data-toggle="modal" data-target="#{!! $val['id'] !!}">{!! $val["name"] !!}</a></th>
            </tr>
            @endforeach
        </table>

        @foreach($user_data as $val)
        <div class="modal fade" id="{!! $val['id'] !!}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">User information</h4>
                    </div>
                    <div class="modal-body">
                        <p>Name: {!! $val["name"] !!}</p>
                        <p>Email: {!! $val["email"] !!}</p>
                        @if($val["image"])
                        <p><img src="upload/user/{!! $val['image'] !!}" width="569" alt="{!! $val['name'] !!}"></p>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection