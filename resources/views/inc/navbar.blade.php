<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'CraneHR') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="\">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee') }}">Employee</a>
                </li>

                <li class="nav-item dropdown">
                    <a  class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        Attendance
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('attendance') }}">Logs</a>
                        <a class="dropdown-item" href="{{ route('attendance.adduser') }}">Add user</a>
                        <a class="dropdown-item" href="{{ route('addshift') }}">Settings</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a  class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        Purchase
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('purchase.add') }}">Add Purchase</a>
                        <a class="dropdown-item" href="{{ route('purchase.purchase_list') }}">Purchase List</a>
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                 @auth
                    <li class="nav-item active">
                        <a href="" class="nav-link">{{(auth()->user()->company_name);}}</a>
                    </li>
                    <li class="nav-item active">
                        <form action="{{ route('logout') }}" method="post" class="nav-link">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @endauth


                @guest
                    <li class="nav-item active">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>