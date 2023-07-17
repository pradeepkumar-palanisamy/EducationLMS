<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ URL::TO('admin-dashboard') }}" aria-expanded="false">
                    <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li style="color: blueviolet;" class="nav-label">Education</li>
            {{-- <li> --}}
                {{-- <a class="has-arrow" href="javascript:void()" >
                    <i class="icon-globe menu-icon"></i><span class="nav-text">Education</span>
                </a> --}}
                {{-- <ul aria-expanded="false"> --}}
                    <li><a href="{{ URL::TO('admin-subject') }}"><i class="icon-badge menu-icon"></i>Subject</a></li>
                    <li><a href="{{ URL::TO('admin-unit') }}"><i class="icon-badge menu-icon"></i>Unit</a></li>
                    <li><a href="{{ URL::TO('admin-chapter') }}"><i class="icon-badge menu-icon"></i>Chapters</a></li>
                    <li><a href="{{ URL::TO('admin-content') }}"><i class="icon-badge menu-icon"></i>Content</a></li>
                {{-- </ul> --}}
            {{-- </li> --}}
            <li style="color: blueviolet;" class="nav-label">All Users</li>

            <li>
                <a href="{{ URL::TO('all-user') }}" aria-expanded="false">
                    <i class="icon-people menu-icon"></i><span class="nav-text">Users</span>
                </a>
            </li>

            <li style="color: blueviolet;" class="nav-label">General</li>

            <li>
                <a href="{{ URL::TO('admin-about') }}" aria-expanded="false">
                    <i class="icon-people menu-icon"></i><span class="nav-text">About</span>
                </a>
            </li>
        </ul>
    </div>
</div>
