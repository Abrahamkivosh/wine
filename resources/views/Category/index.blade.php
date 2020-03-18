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
            <li class="active">All categories</li>
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
                <table class="table table-bordered table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td scope="row"> {{ $category->name }} </td>

                            <td>

                                <a name="" id="" class="btn btn-primary" href=" {{ route('categories.show',$category->id) }} " role="button">View more</a>


                                @if ( auth()->user()->isAdmin )
                                <form id="senddeletec" data-name=" {{ $category->name }} " class=" pull-right mr-4 "
                                    action="{{ route('categories.destroy',$category->id) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button id="del" type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @endif

                            </td>
                        </tr>

                        @empty

                        @endforelse

                    </tbody>
                </table>
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

<script>
   var dd =  document.getElementById('del') ;
   dd.addEventListener('click',(e)=>{
       e.preventDefault();
       alert("alert");
   })
</script>

@stop
