@extends('layouts.main')
@section('content')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Stock Analysis</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('stock.index' ) }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua">
                        <i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Profit </span>
                        <span class="info-box-number"> {{  $totalProfit }} KSH </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red">

                        <i class="fa fa-align-justify" aria-hidden="true"></i>
                        </i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total sales </span>
                        <span class="info-box-number text text-mute "> {{ $total_sales }} KSH</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green">
                        <i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">External costs</span>
                        <span class="info-box-number"> {{ $externalCost }} KSH </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Employees</span>
                        <span class="info-box-number">{{ $users }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-6">


            </div>

        </div>


        <div class="row">


            <div class="col-md-12 ml-3">


                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">General stock profit per product</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table text text-center no-margin table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Buy_price</th>
                                        <th>sale_price</th>
                                        <th>Profit</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @if( count($stockProducts) > 0 )
                                    @foreach ($stockProducts as $item)

                                    <tr>

                                        <td> {{  $item->name }} </td>
                                        <td> {{  $item->quantity  }} </td>
                                        <td> {{  $item->buying_price  }} </td>
                                        <td> {{  $item->selling_price  }} </td>
                                        <td> {{  (($item->selling_price - $item->buying_price ) * $item->quantity )  }}
                                        </td>

                                    </tr>
                                    @endforeach

                                    @else
                                    <td colspan="6" class=" center text text-danger h3"> Nothing sold</td>
                                    @endif





                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Buy_price</th>
                                        <th>sale_price</th>
                                        <th>Profit</th>

                                    </tr>
                                </tfoot>


                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <form id="newAnalysis" action=" {{ route('stock.newAnalysis' ) }}  " method="post">
                            @csrf
                            <button type="submit"  class="btn btn-sm btn-danger btn-flat pull-left" >Start new   Analysis</button>
                        </form>
                        {{-- <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All
                            Orders</a> --}}
                    </div>
                    <!-- /.box-footer -->
                </div>


            </div>

        </div>



    </section>

</div>
@endsection
