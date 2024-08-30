<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav mb-3" id="sidebar-nav">
        @php
            $PermissionUser = App\Models\Permission_role::getPermission('User', Auth::guard('admin')->user()->role_id);
            $PermissionRole = App\Models\Permission_role::getPermission('Role', Auth::guard('admin')->user()->role_id);
            $PermissionCategory = App\Models\Permission_role::getPermission('Category', Auth::guard('admin')->user()->role_id);
            $PermissionSubCategory = App\Models\Permission_role::getPermission('SubCategory', Auth::guard('admin')->user()->role_id);
            $PermissionGame = App\Models\Permission_role::getPermission('Game', Auth::guard('admin')->user()->role_id);
            $PermissionChildCategory = App\Models\Permission_role::getPermission('ChildCategory', Auth::guard('admin')->user()->role_id);
            $Permissionsetting = App\Models\Permission_role::getPermission('setting', Auth::guard('admin')->user()->role_id);
        @endphp
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) != 'dashboard') collapsed @endif " href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @if (!empty($PermissionUser))
            <hr>
            <li class="nav-heading fw-bold text-success">Manage Account</li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'user') collapsed @endif "
                    href="{{ route('admin.user.list') }}">
                    <i class="bi bi-person"></i>
                    <span>User</span>
                </a>
            </li><!-- End Profile Page Nav -->
        @endif
        @if (!empty($PermissionRole))
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'role') collapsed @endif "
                    href="{{ route('admin.role.list') }}">
                    <i class="bi bi-person"></i>
                    <span>Role / Permission</span>
                </a>
            </li><!-- End Profile Page Nav -->
        @endif
        {{-- @if (!empty($PermissionUser))
          <li class="nav-item">
              <a class="nav-link @if (Request::segment(2) != 'user') collapsed @endif "
                  href="{{ route('admin.user.list') }}">
                  <i class="bi bi-person"></i>
                  <span>Permission</span>
              </a>
          </li><!-- End Profile Page Nav -->
        @endif --}}
       
        <!---category section start----->
        <hr>
        <li class="nav-heading fw-bold text-success">Manage Cricket</li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'cricket') collapsed @endif "
                    href="{{ route('admin.cricket.matches.list') }}">
                    <i class="bi bi-list"></i>
                    <span>Match List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'sub-category') collapsed @endif "
                    href="{{ route('admin.subcategory.list') }}">
                    <i class="bi bi-dribbble"></i>
                    <span>Add Match Video</span>
                </a>
            </li>
        @if (!empty($PermissionCategory))
            <hr>
            <li class="nav-heading fw-bold text-success">Manage Category</li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'category') collapsed @endif "
                    href="{{ route('admin.category.list') }}">
                    <i class="bi bi-person"></i>
                    <span>Category</span>
                </a>
            </li>
        @endif
        @if (!empty($PermissionSubCategory))
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'sub-category') collapsed @endif "
                    href="{{ route('admin.subcategory.list') }}">
                    <i class="bi bi-person"></i>
                    <span>SubCategory</span>
                </a>
            </li>
        @endif
        @if (!empty($PermissionChildCategory))
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'child-category') collapsed @endif "
                    href="{{ route('admin.childcategory.list') }}">
                    <i class="bi bi-person"></i>
                    <span>Child Category</span>
                </a>
            </li>
        @endif
        
        <!---category section end------>
        @if (!empty($PermissionGame))
            <hr>
            <li class="nav-heading fw-bold text-success">Manage Games</li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'game') collapsed @endif "
                    href="{{ route('admin.game.list') }}">
                    <i class="bi bi-person"></i>
                    <span>Games</span>
                </a>
            </li><!-- End Games Page Nav -->
        @endif
        @if (!empty($PermissionGame))
            <hr>
            <li class="nav-heading fw-bold text-success">Manage Result</li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'result') collapsed @endif "
                    href="{{ route('admin.result.list') }}">
                    <i class="bi bi-person"></i>
                    <span>Result</span>
                </a>
            </li><!-- End Games Page Nav -->
        @endif
        {{-- @if (!empty($Permissionsetting))
            <hr>
            <li class="nav-heading fw-bold text-success">Manage Setting</li>
            <li class="nav-item">
                <a class="nav-link @if (Request::segment(2) != 'role') collapsed @endif "
                    href="{{ route('admin.role.list') }}">
                    <i class="bi bi-person"></i>
                    <span>Setting</span>
                </a>
            </li><!-- End Games Page Nav -->
        @endif --}}
    </ul>
</aside><!-- End Sidebar-->
