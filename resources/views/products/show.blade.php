@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $product->name }}
            <small>Single product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('products.index') }}">Products</a></li>
            <li class="active">Single Product</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">



        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> <a href="{{ route('products.index') }}" class="btn btn-primary active" role="button">Go back</a> </h3>

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
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>buying_price</th>
                            <th>Selling_price</th>
                            <th>Tax</th>
                            <th>status</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row" > {{$product->name}}</td>
                                <td> {{$product->size}}</td>
                                <td> {{$product->quantity}}</td>
                                <td> {{$product->buying_price }}</td>
                                <td> {{$product->selling_price}}</td>
                                <td> {{$product->tax}}</td>
                                <td >
                                    @if ( ($product->quantity) > 10 )
                                       <span class=" label label-info h4" >{{ "Available" }} </span>
                                    @elseif(  ($product->quantity) < 10 &&  ($product->quantity) > 0)
                                    <span class=" label label-warning  h4" >{{ "Almost out of stock" }} </span>
                                    @else
                                    <span class=" label label-danger h4 " >{{ "Out of stock" }} </span>
                                    @endif

                                </td>
                                <td> {{$product->category->name}}</td>
                                <td>



                                         <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelId">
                                        Edit
                                        </button>



                                    <form id="senddelete"  action="{{ route('products.destroy',$product->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Button trigger modal -->


                            <!-- Modal -->
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit {{ $product->name }} information </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('products.update',$product->id) }}" method="post">
                                                @method("PUT")
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Product name</label>
                                                    <input id="name" class="form-control" type="text" value="{{$product->name}}"  name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="size">Size</label>
                                                    <input id="size" class="form-control" value="{{$product->size}}" type="text" name="size">
                                                </div>
                                                <div class="form-group">
                                                    <label for="quantity">Quantity In Stock</label>
                                                    <input id="quantity" class="form-control" value="{{$product->quantity}}" type="text" name="quantity">
                                                </div>
                                                <div class="form-group">
                                                    <label for="buying_price">buying price</label>
                                                    <input id="" class="form-control" type="number"  value="{{$product->buying_price}}"  maxlength="4" name="buying_price">
                                                </div>
                                                <div class="form-group">
                                                    <label for="selling_price">selling price</label>
                                                    <input id="selling_price" value="{{$product->selling_price}}"  class="form-control" type="number" name="selling_price">
                                                </div>
                                                <div class="form-group  hidden ">
                                                    <label for="category_id">Category</label>
                                                    <input id="category_id" class="form-control hidden " value=" {{ $product->category->id }} " type="text" name="category_id">
                                                </div>
                                                <div class="form-group hidden ">
                                                    <label for="supplier_id">SUpplier</label>
                                                    <input id="supplier_id" class="form-control hidden " value=" {{ $product->supplier->id }} " type="text" name="supplier_id">
                                                </div>

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>

                                            </form>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Supplied by {{ $product->supplier->name }} <div class="bg-info" >{{ $product->supplier->phone }}</div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        <script>
            $(

                $("#senddelete").submit((e)=>{
                    e.preventDefault();
                    var conf = confirm("Are you sure you want to delete this product") ;
                    if(conf){
                        return true ;
                    }else{
                        return false ;
                    }
                })
            )
        </script>

    </section>
    <!-- /.content -->
</div>
@stop
