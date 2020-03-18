@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category
            <small>Single category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('categories.index') }}">categories</a></li>
            <li class="active">Single category</li>
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
                <div class="col-md-12">
                    <div class="col-md-6">
                        <span class=" text text-aqua" >
                             Category Name : <span class=" text text-bold" > {{ $category->name }}</span>
                        </span>


                    </div>
                    <div class="col-md-6">
                        <form action=" {{ route('categories.update',$category->id) }} "
                                                    method="post">
                                                    @csrf
                                                    @method("PUT")

                                                    <div class="form-group">
                                                        <label for="name">Update Category name</label>
                                                        <input type="text" name="name" id="name"
                                                            value=" {{ $category->name }} " class="form-control"
                                                            placeholder="Category name" aria-describedby="helpId">
                                                        <small id="helpId" class="text-muted">Write the category name
                                                        </small>
                                                    </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>

                               </div>              </form>

                    </div>

                </div>
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
@stop
