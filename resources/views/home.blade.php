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


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelId">
                    <span class="badge badge-pill badge-dark"> View Cart
                        <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                    </span>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Product selected</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-light table-stripped  ">
                                    <thead class="thead-light">
                                        @if(count(\Cart::getContent()) > 0)
                                        <tr>
                                            <th>Name</th>
                                            <th>Selling Price</th>
                                            <th>Quantity</th>
                                            <th> Sub Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach(\Cart::getContent() as $item)


                                        <tr>
                                            <td>{{$item->name }}</td>
                                            <td> Ksh {{ $item->price }} </td>
                                            <td id="quantity">

                                                <form id="updateCart" action=" {{ route('cart.update') }} " method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value=" {{ $item->id }} ">
                                                    <input  type="text" value=" {{$item->quantity}}" name="quantity" id="quantity1">
                                                    <button type="submit" class="btn btn-primary btn-sm ">
                                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                                        </button>
                                                </form>



                                            </td>
                                            <td> Ksh {{ \Cart::get($item->id)->getPriceSum() }}</td>
                                            <td class="row" >
                                                {{-- <a  id="update" class="btn btn-primary col-md-6" href="#" role="button">
                                                   <i class="fa fa-refresh" aria-hidden="true"></i>
                                                </a> --}}

                                                <form class="col-md-6" action=" {{ route('cart.remove') }}  " method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><b>Total: </b>Ksh{{ \Cart::getTotal() }} </th>
                                        </tr>
                                    </tfoot>
                                    @else
                                    <div class="h4 text text-info" >Your Cart is Empty</div>
                                    @endif



                                </table>
                            </div>
                            <div class="modal-footer">
                                <div class="row" style="margin: 0px;">
                                    <div class="col-md-3" >
                                        <a class="btn btn-primary btn-sm " href="{{ route('cart.index') }}">
                                        CART <i class="fa fa-arrow-right"></i>
                                    </a>

                                    </div>
                                    <div class="col-md-3" >

                                    <form action=" {{ route('cart.checkout') }} " method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm ">
                                            CHECKOUT <i class="fa fa-arrow-right"></i>
                                        </button>
                                    </form>

                                    </div>
                                    <div class="col-md-3" >
                                        <form id="clear_cart" class=" pull-left mt-3 p-3" action=" {{ route('cart.clear') }} " method="post">
                                            @csrf
                                             <button type="submit"  class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>Clear Cart
                                                </button>
                                        </form>

                                    </div>
                                    <div class="col-md-3" >
                                <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                    <em class=" label label-warning">{{ "Almost out of stock" }} </em>
                                    @else
                                    <em class=" label label-danger">{{ "Out of stock" }} </em>
                                    @endif
                            </td>
                            <td>


                                <form action=" {{ route('cart.store',$product->id) }}  " method="post">
                                    @csrf
                                    @if (($product->quantity) > 0 )
                                         <button type="submit" class="btn btn-primary">Add to cart</button>
                                    @else
                                    <button type="button" style="background-color:black; color:white ;" class="btn btn-warning disabled ">Add to cart</button>
                                    @endif


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
<script src=" {{ asset('js/app.js') }}  "></script>
<script>
    $(
        $(document).ready(function(){
            $("#clear_cart").click(
                (e)=>{
                    e.preventDefault();
                    var re = confirm("Are you sure you want to clear the cart ? ");
                    if(re){
                        return true ;
                    }else{
                        return false ;
                    }
                    }
                 });

                }
            )
        })
    )



</script>
<script>
    $(
        $("#update").click(()=>{
            $("updateCart").submit(()=>{
                return true ;
            })

        })
    )
</script>

@endsection
