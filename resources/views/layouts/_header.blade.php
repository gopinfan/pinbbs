<nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">PinBBS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{active_class(if_route('topics.index'))}}">
                    <a class="nav-link" href="{{route('topics.index')}}">话题 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{active_class(if_route('categories.show') && if_route_param('category',1))}}">
                    <a class="nav-link" href="{{route('categories.show',1)}}">分享</a>
                </li>
                <li class="nav-item {{active_class(if_route('categories.show') && if_route_param('category',2))}}">
                    <a class="nav-link" href="{{route('categories.show',2)}}">教程</a>
                </li>
                <li class="nav-item {{active_class(if_route('categories.show') && if_route_param('category',3))}}">
                    <a class="nav-link" href="{{route('categories.show',3)}}">问答</a>
                </li>
                <li class="nav-item {{active_class(if_route('categories.show') && if_route_param('category',4))}}">
                    <a class="nav-link" href="{{route('categories.show',4)}}">公告</a>
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
                    <li class="nav-item {{active_class(if_route('topics.create'))}}">
                        <a href="{{route('topics.create')}}" class="nav-link" title="新建话题">
                            <i class="fa fa-fw fa-plus"></i>新建话题
                        </a>
                    </li>
                    @if(Auth::user()->notification_count>0)
                        <li class="nav-item">
                            <a href="{{route('notifications.index')}}" class="nav-link" title="消息提醒">
                                <span class="badge badge-danger badge-pill">{{Auth::user()->notification_count}}</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" class="rounded-circle img-responsive avatar-navbar">
                            {{Auth::user()->name}} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('users.show', Auth::id())}}"><i class="far fa-fw fa-user"></i>个人中心</a>
                            <a class="dropdown-item" href="{{route('users.edit', Auth::id())}}"><i class="far fa-edit fa-fw"></i>编辑资料</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="fa fa-fw fa-sign-out"></i>退出登录</a>
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