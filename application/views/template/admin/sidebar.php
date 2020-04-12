<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        
        <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>">SYSTEM</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>">SYS</a>
        </div>
        <ul class="sidebar-menu">
            
            <li class="menu-header">Dashboard</li>
            
            <li class="dropdown <?php echo $this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard1' || $this->uri->segment(2) == 'dashboard_2' ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo $this->uri->segment(1) == 'dashboard1' || $this->uri->segment(1) == '' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url(); ?>">Dashboard 1</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'dashboard_2' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('dashboard/dashboard_2'); ?>">Dashboard 2</a>
                    </li>
                </ul>
            </li>
            
            <li class="menu-header">Core</li>

            <li class="dropdown <?php echo $this->uri->segment(2) == 'datatable' || $this->uri->segment(2) == 'home' ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Default</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="<?= base_url('dashboard/top_navigation'); ?>">Top Navigation</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'datatable' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('dashboard/datatable'); ?>">Datatable</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'home' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?= base_url('dashboard/home'); ?>">Home</a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo $this->uri->segment(2) == '#' ? 'active' : ''; ?>">
                <a class="nav-link" href="#">
                    <i class="far fa-square"></i> <span>TEST</span>
                </a>
            </li>

            <li class="menu-header">With Role</li>

            <?php foreach ($permissions as $permission): ?>
                <li <?php if($permission->has_child): ?> class="dropdown" <?php endif ?> >
                    <?php if ( ! $permission->parent_id): ?>
                        <a class="nav-link <?php if($permission->has_child): ?> has-dropdown <?php endif ?>"<?php if($permission->has_child): ?> data-toggle="dropdown" href="#" <?php else: ?> href="<?= base_url().$permission->menu_controller ?>" <?php endif ?> >
                            <i class="fas fa-columns"></i> <span><?= $permission->menu_name ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($permissions as $childs): ?>
                                <?php if ($childs->parent_id == $permission->id_menu): ?>
                                    <li>
                                        <a class="nav-link" href="<?= base_url().$childs->menu_controller; ?>"><?= $childs->menu_name; ?></a>
                                    </li>
                                <?php endif ?>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                </li>
            <?php endforeach ?>

        </ul>

    </aside>
</div>
