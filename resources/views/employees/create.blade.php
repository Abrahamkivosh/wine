@extends('layouts.main')
@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Add New Employee to the system
            <small>New Employee</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('employees') }}">employees</a></li>
            <li class="active">Adding new Employee</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">



        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

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
                <form class="form-group col-md-12 " action="{{ route('employee.store') }}" method="post">
                    @csrf
                    <div class="col-md-8 ">
                        <div class="form-group">

                            <input type="text" name="name" id="name" class="form-control" placeholder="Employee Name" >
                        </div>

                        <div class="form-group ">
                            <input type="number" name="phone" id="phone" placeholder="Employee phone number "
                                class="form-control m-3">
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Employee Email">
                          <small id="emailHelpId" class="form-text text-muted">Type valid supplier email</small>
                        </div>
                        <div class="form-group">

                          <input type="password" class="form-control" aria-describedby="password" title="Default emplyoyee password is password" name="password" id="password" placeholder="Set employee password">
                          <small id="password" class=" form-text text-mutes " >Default emplyoyee password is <strong>password </strong> </small>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="normal" value="0" name="isAdmin" class="custom-control-input">
                            <label class="custom-control-label" for="normal">Normal Employee</label>

                            <input type="radio" id="admin" value="1" name="isAdmin" class="custom-control-input">
                            <label class="custom-control-label" for="admin">Administrator</label>
                          </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>

                </form>
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
@stop
