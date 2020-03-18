@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            External Costs
            <small>All cost incurred</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('cost.index') }}">Cost</a></li>
            <li class="active">External Costs</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">



        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                {{--  <h3 class="box-title"> <a href="{{ route('products.index') }}" class="btn btn-primary active"
                        role="button">Go back</a> </h3>  --}}
                        <p class="lead">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modelId">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>  Create any Cost
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Any cost inccurred   </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action=" {{ route('cost.store') }} " method="post">
                                                @csrf
                                                @method("POST")
                                                <div class="form-group">
                                                  <label for="name">Name of product bought or job done</label>
                                                  <input type="text" name="name" id="" class="form-control" placeholder="Name of product bought or job done" >

                                                </div>
                                                <div class="form-group">
                                                    <label for="amount">Amount paid</label>
                                                    <input id="amount" class="form-control" type="text" name="amount">
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </p>

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
                            <th>Amount</th>
                            <th>Created on</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($costs as $cost)
                        <tr>
                            <td scope="row"> {{ $cost->name }} </td>
                            <td> {{ $cost->amount ." kSH"}} </td>
                            <td> {{ $cost->created_at->diffForHumans() }} </td>


                            <td>
                                @if ( auth()->user()->isAdmin )
                                          <form action=" {{ route('cost.destroy',$cost->id) }} " method="post">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif




                            </td>
                        </tr>

                        @empty

                        @endforelse




                    </tbody>
                    <tfoot class="h3" >
                        Total external Cost : <strong> {{ $total_cost}} KSH</strong>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
            <div class=" w-100 box-footer">
                <span class="pull-right" >
                    {{ $costs->links() }}
                </span>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->


    </section>
    <!-- /.content -->
</div>
@stop
