<div class="app-header d-flex align-items-center">

    <!-- Toggle buttons start -->
    <div class="d-flex">
        <button class="btn btn-outline-success toggle-sidebar" id="toggle-sidebar">
            <i class="icon-menu"></i>
        </button>
        <button class="btn btn-outline-danger pin-sidebar" id="pin-sidebar">
            <i class="icon-menu"></i>
        </button>
    </div>
    <!-- Toggle buttons end -->

    <!-- App header actions start -->
    <div class="header-actions">
        <div class="dropdown ms-3">
            <a class="dropdown-toggle d-flex align-items-center" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="admin/images/user.jpg" class="img-3x m-2 ms-0 rounded-5" alt="Admin Templates" />
                <div class="d-flex flex-column">
                    <span>{{ auth()->user()->name }}</span>
                    <small>Admin</small>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-sm shadow-sm gap-3">
                <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('logout') }}"><i class="icon-log-out fs-4 me-3"></i>Déconnexion</a>
            </div>
        </div>
    </div>
    <!-- App header actions end -->

</div>