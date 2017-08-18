@extends('admin.master')
@section('content')
<?php 
    $files = Storage::files("");
?>
<main id="main" style="width: 1160px; margin-left: 388px;">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>USER MANAGEMENT</h2>
                <div class="clearfix"></div>
            </div>
            @if(Session::has('flash_message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{!! Session::get('flash_message') !!}
            </div>
			@endif

            @if(Session::has('flash_error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{!! Session::get('flash_error') !!}
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
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>RANK</th>
                            <th><span class="nobr">Action</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_data as $val)
                        <tr>
                            <td>
                                @if(file_exists(public_path()."/upload/user/".$val["image"]))
                                <img src="../upload/user/{!! $val['image'] !!}" width="56" alt="{!! $val['name'] !!}">
                                @else
                                <img src="../upload/user/noavatar.jpg" width="56" alt="{!! $val['name'] !!}">
                                @endif
                            </td>
                            <td>{!! $val["name"] !!}</td>
                            <td>{!! $val["email"] !!}</td>
                            <td>
                                @if($val["level"] == 1)
                                    Super admin
                                @elseif($val["level"] == 2)
                                    Admin
                                @else
                                    Member
                                @endif
                            </td>
                            <td>
                                <form action="" method="POST" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{!! $val['id'] !!}">
                                    <input type="button" value="Edit" class="btn btn-primary" data-toggle="modal" data-target="#{!! $val['id'] !!}">
                                    <button class="btn btn-primary" onclick="javascript: form.action='deleteuser'">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <div class="modal fade" id="adduser" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h2 class="modal-title">CREATE USER</h2>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="msg" type="text" class="form-control" name="name" required ng-model="name" placeholder="Please enter your name! ">
                                    </div>
                                    <span ng-show="form.name.$touched && form.name.$error.required" style="color: #f00;">The name is required.</span>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input id="msg" type="email" class="form-control" ng-model="email" required name="email" placeholder="Please enter your email! ">
                                    </div>
                                    <span ng-show="form.email.$touched && form.email.$error.required" style="color: #f00;">Email is required.</span>
                                    <span ng-show="form.email.$touched && form.email.$error.email" style="color: #f00;">Invalid email address.</span>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="msg" type="password" class="form-control" name="password" ng-model="password" required ng-minlength="8" placeholder="Please enter your password! ">
                                    </div>
                                    <span ng-show="form.password.$touched && form.password.$error.required" style="color: #f00;">The password is required.</span>
                                    <span ng-show="form.password.$touched && form.password.$error.minlength" style="color: #f00;">The password least 8 characters.</span>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="msg" type="password" class="form-control" name="password2" ng-model="password2" required ng-minlength="8" placeholder="Please enter your password! ">
                                    </div>
                                    <span ng-show="form.password2.$touched && form.password2.$error.required" style="color: #f00;">The password is required.</span>
                                    <span ng-show="form.password2.$touched && form.password2.$error.minlength" style="color: #f00;">The password least 8 characters.</span>
                                    <div class="input-group">
                                        <label for="sel1">Select rank:</label>
                                        <select class="form-control" name="level" id="sel1">
                                            <option value="1">Super Admin</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Member</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        @foreach($files as $index)
                                        <label>
                                            <input type="checkbox" name="menu[]" value="{!! rtrim($index,'.php') !!}">
                                            {!! rtrim($index,".php") !!}
                                        </label>
                                        <br>
                                        @endforeach
                                    </div>
                                    <input type="file" class="form-control" name="img" id="img">
                                </div>
                                <div class="modal-footer">
                                    <div class="submit">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{!! $val['id'] !!}">
                                        <input type="reset" class="btn btn-primary btn-lg" value="Cancel" name="cancel" id="reset">
                                        <input type="submit" class="btn btn-primary btn-lg" value="Submit" onclick="javascript: form.action='createuser'" name="action" id="check">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                @foreach($user_data as $val)
                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <div class="modal fade" id="{!! $val['id'] !!}" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h2 class="modal-title">Edit user</h2>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="msg" type="text" class="form-control" value="{!! $val['name'] !!}" name="name" required placeholder="Please enter your name! ">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input id="msg" type="email" class="form-control" value="{!! $val['email'] !!}" required name="email" placeholder="Please enter your email! ">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="msg" type="password" class="form-control" name="password" placeholder="Please enter your password! ">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="msg" type="password" class="form-control" name="password2" placeholder="Please enter your password! ">
                                    </div>
                                    <p>
                                        @if(file_exists(public_path()."/upload/user/".$val["image"]))
                                        <img src="../upload/user/{!! $val['image'] !!}" width="100%" alt="{!! $val['name'] !!}">
                                        @else
                                        <img src="../upload/user/noavatar.jpg" width="100%" alt="{!! $val['name'] !!}">
                                        @endif
                                    </p>
                                    <div class="input-group">
                                        <label for="sel1">Select rank:</label>
                                        <select class="form-control" name="level" id="sel1">
                                            @if($val["level"] == 1)
                                            <option value="1" selected>Super Admin</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Member</option>
                                            @elseif($val["level"] == 2)
                                            <option value="1">Super Admin</option>
                                            <option value="2" selected>Admin</option>
                                            <option value="3">Member</option>
                                            @else
                                            <option value="1">Super Admin</option>
                                            <option value="2">Admin</option>
                                            <option value="3" selected>Member</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        @foreach($files as $index)
                                        <label>
                                            <input type="checkbox" name="menu[]" <?php echo (strlen(strstr($val["menu"],rtrim($index,'.php'))))?"checked":""; ?> value="{!! rtrim($index,'.php') !!}">
                                            {!! rtrim($index,".php") !!}
                                        </label>
                                        <br>
                                        @endforeach
                                    </div>
                                    <input type="file" name="img" class="form-control" id="img">
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id" value="{!! $val['id'] !!}">
                                    <input type="reset" class="btn btn-primary btn-lg" value="Cancel" name="cancel" id="reset">
                                    <input type="submit" class="btn btn-primary btn-lg" value="Submit" onclick="javascript: form.action='edituser'" name="action" id="check">
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
                @endforeach
                <input type="button" value="CREATE USER" class="btn btn-primary btn-block" data-toggle="modal" data-target="#adduser">
            </div>
        </div>
    </div>
</main>
@endsection