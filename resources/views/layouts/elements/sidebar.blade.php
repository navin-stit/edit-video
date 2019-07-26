<aside class="main-sidebar" style="min-height: 150%!important">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('employee/dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>                                
                </a>                           
            </li>  
            <li>
                <a href="{{ route('employee/orders') }}">
                    <i class="fa fa-th"></i> <span>Orders</span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">new</small>
                    </span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>