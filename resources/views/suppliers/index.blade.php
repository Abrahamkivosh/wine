@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Suppliers
            <small>All suppliers available</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Kwa mbatha</a></li>
            <li class="active">Showing all suppliers available</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Company Suppliers
                    <span class="" style=" margin-left= '100px ;'">
                        <a name="" id="" class="btn btn-primary" href=" {{ route('suppliers.create') }} " role="button">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add Supplier</a></span>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ( count($suppliers) > 0 )

                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->email}}</td>
                            <td>{{$supplier->phone}}</td>

                            <td>


                                <a class="btn btn-primary" href="{{ route('suppliers.show',$supplier->id) }}">View More
                                     <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>


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
