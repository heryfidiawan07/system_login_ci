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

            <?php if ($permissions): ?>
                
                <li class="menu-header">With Role</li>

                <?php foreach ($permissions as $permission): ?>
                    <?php $parents[$permission->parent_name] = $permission->parent_name; ?>
                <?php endforeach ?>

                <?php foreach ($parents as $parent): ?>
                    <li class="dropdown">
                        <a class="nav-link has-dropdown" data-toggle="dropdown" href="#">
                            <i class="fas fa-columns"></i> <span><?= $parent ?></span>
                        </a>
                        <?php foreach ($permissions as $permission): ?>
                            <ul class="dropdown-menu">
                                <?php if ($permission->parent_name == $parent): ?>
                                    <li>
                                        <a class="nav-link" href="<?= base_url().$permission->menu_controller; ?>"><?= $permission->menu_name; ?></a>
                                    </li>
                                <?php endif ?>
                            </ul>
                        <?php endforeach ?>
                    </li>
                <?php endforeach ?>

            <?php endif ?>

        </ul>

    </aside>
</div>
