@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category
            <small>Adding new Category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('categories.index') }}">Categories</a></li>
            <li class="active">Adding new category</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">



        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> <a href="{{ route('categories.index') }}" class="btn btn-primary active"
                        role="button">Go back</a> </h3>

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
                <p  >
                    <form class=" col-md-6 offset-3" action=" {{ route('categories.store') }} " method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category name</label>
                            <input required  placeholder="Category name" id="name" class="form-control" type="text" name="name">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </p>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
@stop
