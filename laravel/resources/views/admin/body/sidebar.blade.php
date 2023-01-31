<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <img src={{ asset(Auth::user()->profile_photo_path) }} alt="">
            <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
            <h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,</span> {{ Auth::user()->name }}</h5>
            <p class="mb-0 fs-14 font-w400">{{ Auth::user()->email }}</p>
        </div>
        <ul class="metismenu" id="menu">
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Messages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('view.Messages') }}">All Messages </a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Sevices</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('allservices') }}">All services </a></li>
                    <li><a href="{{ route('add.service') }}">Add Service</a></li>

                </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-049-copy"></i>
                    <span class="nav-text">Courses</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('allcourses') }}">All courses </a></li>
                    <li><a href="{{ route('add.course') }}">Add course</a></li>

                </ul>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-061-puzzle"></i>
                    <span class="nav-text">Projects</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.projects') }}">All Project </a></li>
                    <li><a href="{{ route('add.project') }}">Add Project</a></li>

                </ul>
            </li>
        </ul>

    </div>
</div>
