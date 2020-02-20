<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <?php if($_SESSION['session_var_user']->role == "admin") {?>
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
    <?php } ?>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'news' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/news')?>">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>News & Event</span></a>
    </li>
    <?php if($_SESSION['session_var_user']->role == "su") {?>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Products</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/products/add') ?>">New Product</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/products') ?>">List Product</a>
        </div>
    </li>
    <?php } if($_SESSION['session_var_user']->role == "staff") {?>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'cuti' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/cuti')?>">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Cuti</span></a>
    </li>
    <?php } else if($_SESSION['session_var_user']->role != "staff"){ ?>
    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'cuti' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Cuti</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo site_url('admin/cuti')?>">List Cuti</a>
                <a class="dropdown-item" href="<?php echo site_url('admin/cuti/my_cuti')?>">History Cuti</a>
            </div>
    </li>
    <?php }
    if($_SESSION['session_var_user']->role != "staff") {?>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'users' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin/users')?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>
    <?php } ?>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'settings' ? 'active': '' ?>">
        <a class="nav-link " href="<?php echo site_url('admin/settings/view_profile/'.$_SESSION['session_var_user']->user_id) ?>">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Profile</span></a>
    </li>
</ul>
