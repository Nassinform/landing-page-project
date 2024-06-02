<nav id="sidebar" class="sidebar-wrapper">
 
    <!-- Sidebar menu starts -->
    <div class="sidebarMenuScroll">
        <ul class="sidebar-menu" style="padding-top: 54px;">
            <li class="{{ request()->is('dashboard*') ? 'active current-page' : '' }}">
                <a href="{{ route('getDashboard') }}">
                    <i class="icon-roofing"></i>
                    <span class="menu-text">Tableau de bord</span>
                </a>
            </li>
            <li class="{{ request()->is('list-of-orders') ? 'active current-page' : '' }}">
                <a href="{{ route('getListOfOrders') }}">
                    <i class="icon-list"></i>
                    <span class="menu-text">Liste des commandes</span>
                </a>
            </li>
            <li class="{{ request()->is('advertisings') ? 'active current-page' : '' }}">
                <a href="{{ route('getAdvertisings') }}">
                    <i class="icon-list"></i>
                    <span class="menu-text">Publicités</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar menu ends -->

</nav>