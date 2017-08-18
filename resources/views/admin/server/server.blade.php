@extends('admin.master')
@section('content')
<main id="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>SERVER MANAGEMENT</h2>
                <div class="clearfix"></div>
            </div>
            @if(Session::has('flash_message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{!! Session::get('flash_message') !!}
            </div>
			@endif
            @if(!$errors->isEmpty())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
			@endif
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action" style="text-align: center;">
                        <thead>
                        <tr class="headings">
                            <th>Name of Server</th>
                            <th>Create Date</th>
                            <th>User</th>
                            <th>FTP </th>
                            <th>SSH</th>
                            <th>Password</th>
                            <th><span class="nobr">Action</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($server_data as $val)
                        <tr>
                            <td>{!! $val["name"] !!}</td>
                            <td>{!! $val["created_at"] !!}</td>
                            <td>{!! $val["user"] !!}</td>
                            <td>{!! $val["ftp"] !!}</td>
                            <td>{!! $val["ssh"] !!}</td>
                            <td>{!! $val["password"] !!}</td>
                            <td>
                                <form action="" method="POST" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{!! $val['id'] !!}">
                                    <input type="button" value="Edit" class="btn btn-primary" data-toggle="modal" data-target="#{!! $val['id'] !!}">
                                    <button class="btn btn-primary" onclick="javascript: form.action='deleteserver'">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <form action="" method="POST" role="form" enctype="multipart/form-data">
                            <div class="modal fade" id="addserver" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h2 class="modal-title">CREATE USER</h2>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="usr">Name of server:</label>
                                                <input type="text" name="name" class="form-control" id="usr">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">User:</label>
                                                <input type="text" name="user" class="form-control" id="usr">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">FTP:</label>
                                                <input type="text" name="ftp" class="form-control" id="usr">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">SSH:</label>
                                                <input type="text" name="ssh" class="form-control" id="usr">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">Password:</label>
                                                <input type="text" name="password" class="form-control" id="usr">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="submit">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value="{!! $val['id'] !!}">
                                                <input type="reset" class="btn btn-primary btn-lg" value="Cancel" name="cancel" id="reset">
                                                <input type="submit" class="btn btn-primary btn-lg" value="Submit" onclick="javascript: form.action='insertserver'" name="action" id="check">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                        </tbody>
                    </table>
                </div>
                @foreach($server_data as $val)
                <form action="" method="POST" role="form">
                    <div class="modal fade" id="{!! $val['id'] !!}" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit server</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Name of Server
                                        <input type="text" name="name" class="form-control" value="{!! $val['name'] !!}">
                                    </p>
                                    <p>Create Date
                                        <input type="text" name="time" disabled="disabled" class="form-control" value="{!! $val['created_at'] !!}">
                                    </p>
                                    <p>User
                                        <input type="text" name="user" class="form-control" value="{!! $val['user'] !!}">
                                    </p>
                                    <p>FTP
                                        <input type="text" name="ftp" class="form-control" value="{!! $val['ftp'] !!}">
                                    </p>
                                    <p>SSH
                                        <input type="text" name="ssh" class="form-control" value="{!! $val['ssh'] !!}">
                                    </p>
                                    <p>Password
                                        <input type="text" name="password" class="form-control" value="{!! $val['password'] !!}">
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <form action="" method="POST" role="form">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{!! $val['id'] !!}">
                                        <button class="btn btn-primary" onclick="javascript: form.action='updateserver'">OK</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                @endforeach
                <input type="button" value="CREATE SERVER" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addserver">
            </div>
        </div>
    </div>
</main>
@endsection