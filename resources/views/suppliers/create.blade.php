@extends('layouts.main')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Supplier to the system
            <small>New Supplier</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('suppliers.index') }}">SUppliers</a></li>
            <li class="active">Adding new Supplier</li>
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
                <form class="form-group col-md-12 " action="{{ route('suppliers.store') }}" method="post">
                    @csrf
                    <div class="col-md-8 ">
                        <div class="form-group">

                            <input type="text" name="name" id="name" class="form-control" placeholder="Supplier Name" >
                        </div>

                        <div class="form-group ">
                            <input type="number" name="phone" id="phone" placeholder="Supplier phone number "
                                class="form-control m-3">
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Supplier Email">
                          <small id="emailHelpId" class="form-text text-muted">Type valid supplier email</small>
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
