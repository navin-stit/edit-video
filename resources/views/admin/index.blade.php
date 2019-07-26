@extends('layouts.elements.layout')
<aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                  
                    <!-- search form -->
                   
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li>
                            <a href="{{ route ('admin/dashboard') }}">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>                                
                            </a>                           
                        </li>   
                        <li>
                            <a href="{{ route ('admin/employee-details') }}">
                                <i class="fa fa-user"></i> <span>Employes</span>
                                <span class="pull-right-container">
                                </span>
                            </a>
                        </li>
                        <!--<li>
                            <a href="#">
                                <i class="fa fa-th"></i> <span>Orders</span>
                                <span class="pull-right-container">
                                </span>
                            </a>
                        </li>-->

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
