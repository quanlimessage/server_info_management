<?php
    $rightmenu = Auth::user()->menu;
    $rightmenu = explode(",",$rightmenu);
    $nameuser = Auth::user()->name;
    $imageuser = Auth::user()->image;
    if((Auth::user()->level) == 1){
        $leveluser = "Super admin";
    }else if((Auth::user()->level) == 2){
        $leveluser = "Admin";
    }else{
        $leveluser = "member";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ADMIN</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/custom.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    </head>
    <body ng-app="">
        <div class="nav-side-menu">
            <div class="brand"><a href="{{url('admin')}}"><img src="../image/logo.png" alt="logo"></a></div>
            <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">

                <ul id="menu-content" class="menu-content collapse out">
                    <li class="active"><i class="fa fa-bars" aria-hidden="true"></i> MENU</li>

                    @foreach($rightmenu as $value)
                    <li data-toggle="collapse" data-target="#{!! $value !!}" class="collapsed">
                        <a href="#"><i class="fa fa-globe fa-lg"></i> {!! $value !!} <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="{!! $value !!}">
                        <li><a href="<?php echo url("admin/".$value);?>">{!! $value !!} management</a></li>
                    </ul>
                    @endforeach
                </ul>
            </div>
        </div>
        <nav class="navbar navfix" style="height: 54px">
            <ul class="nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <p class="profile">
                            @if(file_exists(public_path()."/upload/user/".$imageuser))
                                <img src="../upload/user/{!! $imageuser !!}" class="user-image" width="50" alt="img">
                            @else
                                <img src="../upload/user/noavatar.jpg" class="user-image" width="50" alt="img">
                            @endif
						    {!! $nameuser !!}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div>
                                @if(file_exists(public_path()."/upload/user/".$imageuser))
                                    <img src="../upload/user/{!! $imageuser !!}" class="user-image" width="80" alt="img">
                                @else
                                    <img src="../upload/user/noavatar.jpg" class="user-image" width="80" alt="img">
                                @endif
                                <p>
						            {!! $nameuser !!} ({!! $leveluser !!})
                                </p>
                            </div>
                        </li>
                        <li class="logout"><a href="{{url('admin/logout')}}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        @yield('content')
    </body>
</html>
