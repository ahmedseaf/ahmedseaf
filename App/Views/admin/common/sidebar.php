<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="<?php echo assets('dist/img/avatar.png'); ?>" alt="Tawred Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Tawred.com</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="#" class="img-circle elevation-2" alt="">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin Control</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo url('admin/users'); ?>" class="nav-link">
                                <i class="fas fas fa-user-tie nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo url('admin/categories'); ?>" class="nav-link">
                                <i class="fas fa-store-alt nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo url('admin/product'); ?>" class="nav-link">
                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p>Product</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo url('admin/users-groups'); ?>" class="nav-link">
                                <i class="fas fa-users-cog nav-icon"></i>
                                <p>Uses Groups</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo url('admin/main-page'); ?>" class="nav-link">
                                <i class="fas fa-sliders-h nav-icon"></i>
                                <p>Main Page Control</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo url('admin/setting'); ?>" class="nav-link">
                                <i class="fas fa-cogs nav-icon"></i> 
                                <p>Settings</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-crown"></i>

                        <p> About<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo url('admin/contact'); ?>" class="nav-link">
                                <i class="fas fas fa-cube nav-icon"></i>
                                <p> AboutUs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo url('admin/about'); ?>" class="nav-link">
                                <i class="fas fas fa-comment-dots nav-icon"></i>
                                <p> ContactUs</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo url('admin/company'); ?>" class="nav-link">
                                <i class="fas fas fa-compress-arrows-alt nav-icon"></i>
                                <p>Our Company</p>
                            </a>
                        </li>


                    </ul>
                </li>

<!--                <li class="nav-item has-treeview">-->
<!--                    <a href="#" class="nav-link">-->
<!--                        <i class="nav-icon fas fa-tree"></i>-->
<!--                        <p>-->
<!--                            UI Elements-->
<!--                            <i class="fas fa-angle-left right"></i>-->
<!--                        </p>-->
<!--                    </a>-->
<!--                    <ul class="nav nav-treeview">-->
<!---->
<!--                        <li class="nav-item">-->
<!--                            <a href="#" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Ribbons</p>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="nav-item has-treeview">-->
<!--                    <a href="#" class="nav-link">-->
<!--                        <i class="nav-icon fas fa-edit"></i>-->
<!--                        <p>-->
<!--                            Forms-->
<!--                            <i class="fas fa-angle-left right"></i>-->
<!--                        </p>-->
<!--                    </a>-->
<!--                    <ul class="nav nav-treeview">-->
<!---->
<!--                        <li class="nav-item">-->
<!--                            <a href="#" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>jsGrid</p>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="nav-header">EXAMPLES</li>-->
<!---->
<!--                <li class="nav-item has-treeview">-->
<!--                    <a href="#" class="nav-link">-->
<!--                        <i class="nav-icon far fa-plus-square"></i>-->
<!--                        <p>-->
<!--                            Extras-->
<!--                            <i class="fas fa-angle-left right"></i>-->
<!--                        </p>-->
<!--                    </a>-->
<!--                    <ul class="nav nav-treeview">-->
<!---->
<!--                        <li class="nav-item">-->
<!--                            <a href="#" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Blank Page</p>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a href="starter.html" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Starter Page</p>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>







<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo @$title ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">

                <?php if(isset($title) ){ echo '<div class="col-md-12 borderTitle"></div>'; } ?>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

