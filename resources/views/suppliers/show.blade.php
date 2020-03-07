@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $supplier->name }}
            <small>Single Supplier</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
            <li class="active">Single Supplier</li>
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


                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $supplier->name }}</td>
                            <td> {{ $supplier->email }}</td>
                            <td> {{ $supplier->phone }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Namw</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </tfoot>
                </table>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
                    Edit Supplier Detials
                </button>
                {{-- <a name="" onclick="delete" class="btn btn-danger btn-lg p-2 float-right" href="#" role="button">
                    Delete Supplier</a> --}}

                    <form id="deletesu" action="{{route('suppliers.destroy',$supplier->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-lg p-2 float-right" >Delete Supplier</button>
                    </form>

                <!-- Modal -->
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Update SUpplier Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form action="{{ route('suppliers.update', $supplier->id) }}" method="post">
                                        @method("PUT")
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" value="{{ $supplier -> name }}" id=""
                                                class="form-control" placeholder="Supplier full name"
                                                aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Supplier FUll name of company
                                                name</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input id="" class="form-control" type="text" name="phone"
                                                value="{{ $supplier -> phone }}">
                                        </div>	(648) 323-3922
                                        <div class="form-group">
                                            <label for="email">Supplier Email</label>
                                            <input type="email" class="form-control" name="email" id=""
                                                aria-describedby="emailHelpId" value="{{ $supplier -> email }}"
                                                placeholder="email">
                                            <small id="emailHelpId" class="form-text text-muted">Supplier email</small>
                                        </div>


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

                <script>
                    $('#exampleModal').on('show.bs.modal', event => {
                      var button = $(event.relatedTarget);
                      var modal = $(this);

                  });

                          $('#deletesu').submit((event)=>{
                            event.preventDefault();
                            var result = confirm("Are you sure you want to delete this supplier?");
                            if(result){
                                return true ;
                            }else{
                                return false;
                            }
                          });

                </script>
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
