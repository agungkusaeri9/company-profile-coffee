<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Liberco</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link mt-5" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link py-2" href="{{ route('admin.pesan-masuk.index') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Pesan Masuk</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link py-2" href="{{ route('admin.artikel.index') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Artikel</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed py-2" href="#" data-toggle="collapse" data-target="#product"
            aria-expanded="true" aria-controls="product">
            <i class="fab fa-fw fa-shopify"></i>
            <span>Produk</span>
        </a>
        <div id="product" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.kategori-produk.index') }}">Kategori Produk</a>
                <a class="collapse-item" href="{{ route('admin.produk.index') }}">Produk</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link py-2" href="{{ route('admin.banner.index') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Banner</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
