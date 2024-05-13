<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">E-Document</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">ED</a>
        </div>
        <ul class="sidebar-menu">
            <li class=active>
                <a class="nav-link" href="/dashboard">
                    <i class="far fa-square"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master</span></a>
                <ul class="dropdown-menu">
                    <?php if(checkPermission('canShowKategori')): ?>
                    <li><a class="nav-link" href="/master/kategori">Kategori</a></li>
                    <?php endif; ?>

                    <?php if(checkPermission('canShowJenisPengguna')): ?>
                    <li><a class="nav-link" href="/master/jenis-pengguna">Jenis Pengguna</a></li>
                    <?php endif; ?>

                    <?php if(checkPermission('canShowPengguna')): ?>
                    <li><a class="nav-link" href="/master/pengguna">Pengguna</a></li>
                    <?php endif; ?>

                    <?php if(checkPermission('canShowDokumen')): ?>
                    <li><a class="nav-link" href="/master/dokumen">Dokumen</a></li>
                    <?php endif; ?>

                    <?php if(checkPermission('canShowDokumenFile')): ?>
                    <li><a class="nav-link" href="/master/dokumen-file">Dokumen File</a></li>
                    <?php endif; ?>

                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>User Management</span></a>
                <ul class="dropdown-menu">
                    <?php if(checkPermission('canShowUser')): ?>
                    <li><a class="nav-link" href="/user">User</a></li>
                    <?php endif; ?>
                    
                    <?php if(checkPermission('canShowRole')): ?>
                    <li><a class="nav-link" href="/role">Role</a></li>
                    <?php endif; ?>

                    <?php if(checkPermission('canShowPermission')): ?>
                    <li><a class="nav-link" href="/permission">Permission</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Setting</span></a>
                <ul class="dropdown-menu">
                    <?php if(checkPermission('canShowLog')): ?>
                    <li><a class="nav-link" href="/log">Log</a></li>
                    <?php endif; ?>

                    <?php if(checkPermission('canShowSetting')): ?>
                    <li><a class="nav-link" href="/settings">Setting</a></li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>
    </aside>
</div>