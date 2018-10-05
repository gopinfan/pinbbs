<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-top">
    <div class="container">
        <a class="navbar-brand" href="#">PinBBS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}"><i class="fa fa-sign-in-alt fa-fw"></i>登录</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}"><i class="fa fa-fw fa-edit"></i>注册</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="http://placekitten.com/23/23" alt="{{Auth::user()->name}}" class="rounded-circle">
                            {{Auth::user()->name}} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('users.edit', Auth::id())}}"><i class="fa fa-edit fa-fw"></i>编辑资料</a>
                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="fa fa-fw fa-sign-out-alt"></i>退出登录</a>
                            <form action="{{route('logout')}}" method="post" class="d-none" id="logout-form">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>