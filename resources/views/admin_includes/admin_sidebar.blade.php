<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ URL::TO('admin-dashboard') }}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
    
            
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe menu-icon"></i> <span class="nav-text">Education</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ URL::TO('admin-subject') }}">Subject</a></li>
                    <li><a href="{{ URL::TO('admin-unit') }}">Unit</a></li>
                    <li><a href="{{ URL::TO('admin-chapter') }}">Chapters</a></li>
                    <li><a href="{{ URL::TO('admin-content') }}">Content</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>