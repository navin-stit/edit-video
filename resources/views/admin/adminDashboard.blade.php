@extends('layouts.elements.layout')
@section('content')
<aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
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
                   </ul>
                </section>
                <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
                <div style="float: right;margin: 1rem;">
                    <a href="#" class="btn btn-primary btn-sm " style="padding: 4px 2rem;letter-spacing: 1px;" data-toggle="modal" data-target="#addEmployeeModalForm">
                        Add
                    </a>
                </div>
                <!--datatables-->                
                <ol class="breadcrumb" style="    padding: 15px 8px!important">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                    <li class="active">Employee details</li>
                </ol>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped" style="table-layout:fixed;word-break:break-all">
                            <thead>
                                <tr>
                                    <th>S.No.</th>	
                                    <th>Name</th>
                                    <th>E-mail</th>                              
                                    <th>Conact Number</th>
                                    <th>Last Login</th>
                                    <th>Status</th>
                                    <th>Action</th>                            
                                </tr>
                            </thead>
                            <tbody class="appendData">
                                @foreach($empData as $empData)
                                <tr id="{{ $empData->id }}">
                                    <td>
                                        {{ $empData->id }}
                                    </td>
                                    <td id="empName">
                                        {{ $empData->name }}
                                    </td>
                                    <td id="empEmail">
                                        {{ $empData->email }}
                                    </td>
                                    <td id="empContact">
                                        {{ $empData->contact }}
                                    </td>
                                    <td>
                                        {{ $empData->last_login }}
                                    </td>
                                    <td id="empStatus">
                                        {{ $empData->status }}
                                    </td>
                                    <td>
                                        <a id="emp_{{ $empData->id }}" class="editEmp" style="margin:1rem 1rem">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a id="emp_{{ $empData->id }}" class="removeEmp">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.content-wrapper -->


                <!-- Control Sidebar -->
                <!-- /.control-sidebar -->
                <!-- Add the sidebar's background. This div must be placed
                     immediately after the control sidebar -->
                <div class="control-sidebar-bg"></div>
            <!-- ./wrapper -->
            @include('layouts.partials.modal')
    @endsection 