@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Employees
            <small>Company Employees</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Kwa mbatha</a></li>
            <li class="active">Showing all Employees available</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Company Employees
                    <span class="" style=" margin-left= '100px ;'">
                        <a name="" id="" class="btn btn-primary" href=" {{ route('employee.create') }} " role="button">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Employee</a></span>
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Type </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ( count($employees) > 0 )

                        @foreach ($employees as $employee)
                        <tr>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>
                                @switch( $employee ->isAdmin )
                                    @case(0)
                                        <span class=" text text-info" > <i class="fa fa-user" aria-hidden="true"></i> User </span>
                                        @break
                                    @case(1)
                                        <span class=" text text-warning"  >
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                            Administrator
                                        </span>
                                        @break
                                    @default

                                @endswitch
                            </td>

                            <td>
                                <form action="{{ route('employees.delete',$employee->id)  }}" method="post">
                                    @csrf

                                    <button type="submit" class="btn btn-danger"> <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>


                        </tr>
                        @endforeach


                        @else

                        @endif



                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection
