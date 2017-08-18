<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Học laravel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <header>
            <a href="#"><img src="../image/logo.png" hspace="3" vspace="3" align="left" border="0"></a>
        </header>
        <section id="form-login">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="form-group modal-content col-sm-6 modal-fix">
                        <form action="{{url('admin/login')}}" method="POST" role="form">
                            <div class="form-fix">
                                <h2 class="modal-header">Please sign in</h2>
                                <div class="modal-body">
                                    @if($errors->has('errorlogin'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							            {{$errors->first('errorlogin')}}
                                    </div>
					                @endif
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
                                        <?php if($errors):?>
                                        <p style="color:red">{{$errors->first('email')}}</p>
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        <?php if($errors):?>
                                        <p style="color:red">{{$errors->first('password')}}</p>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="checkbox pull_left">
                                        <label>
                                            <input type="checkbox" id="remember" value="remember"> Remember me
                                        </label>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>
        </section>
    </body>
</html>
