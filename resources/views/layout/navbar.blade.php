<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand">
            <h1 class="tm-site-title mb-0">智慧停車場管理系統</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
                <li class="nav-item">
                    <a id="hrf-dashboard" class="nav-link" href="{{route('dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>

                        Dashboard
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="hrf-iswhite" class="nav-link" href="{{route('iswhite')}}">
                        <i class="far fa-file-alt"></i>
                        黑白名單
                    </a>
                </li>
                <li class="nav-item">
                    <a id="hrf-camera" class="nav-link" href="{{route('camera')}}">
                        <i class="fas fa-video"></i>
                        Camera
                    </a>
                </li>
                <li class="nav-item">
                    <a id="hrf-account"  class="nav-link" href="{{route('account')}}">
                        <i class="far fa-user"></i>
                        新增車牌
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                        <span>
                                    Settings <i class="fas fa-angle-down"></i>
                                </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Billing</a>
                        <a class="dropdown-item" href="#">Customize</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    @if(\Illuminate\Support\Facades\Auth::check())
                            <a class="nav-link d-block" href="{{route('logout')}}">
                                {{ \Illuminate\Support\Facades\Auth::user()->name}},<b>Logout</b>
                            </a>
                        @else
                            <a class="nav-link d-block" href="{{route('login')}}">
                                <b>Login</b>
                            </a>
                        @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
