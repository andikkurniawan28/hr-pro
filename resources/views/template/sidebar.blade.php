<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #44194d;">



    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">HR-Pro</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ ucReplaceUnderscoreToSpace('dashboard') }}</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master"
            aria-expanded="true" aria-controls="master">
            <i class="fas fa-fw fa-database"></i>
            <span>{{ ucReplaceUnderscoreToSpace('master') }}</span>
        </a>
        <div id="master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Daftar {{ ucReplaceUnderscoreToSpace('master') }} :</h6>
                <a class="collapse-item" href="{{ route('cabang.index') }}">{{ ucReplaceUnderscoreToSpace('cabang') }}</a>
                <a class="collapse-item" href="{{ route('divisi.index') }}">{{ ucReplaceUnderscoreToSpace('divisi') }}</a>
                <a class="collapse-item" href="{{ route('sub_divisi.index') }}">{{ ucReplaceUnderscoreToSpace('sub_divisi') }}</a>
                <a class="collapse-item" href="{{ route('level.index') }}">{{ ucReplaceUnderscoreToSpace('level') }}</a>
                <a class="collapse-item" href="{{ route('golongan.index') }}">{{ ucReplaceUnderscoreToSpace('golongan') }}</a>
                <a class="collapse-item" href="{{ route('pendidikan.index') }}">{{ ucReplaceUnderscoreToSpace('pendidikan') }}</a>
                <a class="collapse-item" href="{{ route('jurusan.index') }}">{{ ucReplaceUnderscoreToSpace('jurusan') }}</a>
                <a class="collapse-item" href="{{ route('keahlian.index') }}">{{ ucReplaceUnderscoreToSpace('keahlian') }}</a>
                <a class="collapse-item" href="{{ route('agama.index') }}">{{ ucReplaceUnderscoreToSpace('agama') }}</a>
                <a class="collapse-item" href="{{ route('status_perkawinan.index') }}">{{ ucReplaceUnderscoreToSpace('status_perkawinan') }}</a>
                <a class="collapse-item" href="{{ route('bank.index') }}">{{ ucReplaceUnderscoreToSpace('bank') }}</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
