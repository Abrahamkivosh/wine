@extends('layouts.main')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Product to the system
            <small>New Product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('products.index') }}">Products</a></li>
            <li class="active">Adding new Product</li>
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
                <form class="form-group col-md-12 " action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Product Name">

                        </div>
                        <div class="form-group ">
                            <input type="number" name="size" id="size" placeholder="size of the product in ML "
                                class="form-control m-3">
                        </div>
                        <div class="form-group ">
                            <input type="number" name="quantity" id="quantity" placeholder="Number of Products"
                                class="form-control m-3">
                        </div>
                        <div class="form-group ">
                            <input type="number" name="buying_price" id="buying_price" placeholder="buying price"
                                class="form-control m-3">
                        </div>
                        <div class="form-group ">
                            <input type="number" name="selling_price" id="selling_price" placeholder="selling price"
                                class="form-control m-3">
                        </div>
                        <div class="form-group ">
                            <input type="number" name="tax" id="tax" placeholder="tax " class="form-control m-3">
                        </div>


                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supplier">Select Supplier</label>
                            <select id="supplier" class="form-control" name="supplier_id">
                                @foreach ($suppliers as $supplier)
                                <option value=" {{ $supplier->id }} ">
                                    {{ $supplier->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="category">Select Category</label>
                            <select id="category" class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }} ">
                                    {{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>


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
