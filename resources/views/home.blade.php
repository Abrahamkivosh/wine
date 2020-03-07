@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            start selling
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Kwa mbatha</a></li>
            <li class="active">Showing all products available in stock</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Our stock</h3>

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
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Tax</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if ( count($products) > 0 )

                        @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->size}} <strong>ml</strong> </td>
                            <td>{{$product->selling_price}}</td>
                            <td>{{$product->tax}}</td>
                            <td>
                                @if ( ($product->quantity) > 10 )
                                <em class=" label label-info">{{ "Available" }} </em>
                                @elseif( ($product->quantity) < 10 && ($product->quantity) > 0)
                                    <em class=" label label-info">{{ "Almost out of stock" }} </em>
                                    @else
                                    <em class=" label label-info">{{ "Out of stock" }} </em>
                                    @endif
                            </td>
                            <td>

                                <a name="" id="" class="btn btn-warning" href="#" role="button">Add to cart</a>


                            </td>


                        </tr>
                        @endforeach


                        @else

                        @endif



                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Tax</th>
                            <th>Status</th>
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
