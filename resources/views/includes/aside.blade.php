<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img class="img-circle" alt="User Image" src='/storage/uploads/users/{{ auth()->user()->avatar }}'>
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                <br />
            </div>
        </div>
        <!-- search form -->
        {{--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>  --}}
        <!-- /.search form -->
        <br /><br />
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="{{route('products.index')}}"><i class="fa fa-circle-o"></i> View Products</a></li>
                    @if ( auth()->user()->isAdmin )
                    <li><a href="{{route('products.create')}}"><i class="fa fa-circle-o"></i> Add Products</a></li>

                    @endif

                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil" aria-hidden="true"></i><span>Product Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" {{ route('categories.index') }} "> <i class="fa fa-file-excel-o"
                                aria-hidden="true"></i> View Category</a></li>
                    @if ( auth()->user()->isAdmin )
                    <li><a href=" {{ route('categories.create') }} "> <i class="fa fa-creative-commons"
                                aria-hidden="true"></i> Add Category</a></li>

                    @endif

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money" aria-hidden="true"></i> External Costs</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" {{ route('cost.index') }} ">
                        <i class="fa fa-money" aria-hidden="true"></i> View External Costs</a></li>

                    <li><a href=" {{ route('cost.create') }} ">
                       <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Any Cost</a></li>



                </ul>
            </li>




            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Stock monitor</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=" {{ route ('stock.index') }} "><i class="fa fa-circle-o"></i> General Stock</a></li>

                </ul>
            </li>
            {{--
            <li><a href="#"><i class="fa fa-book"></i> <span>Specials people</span></a></li> --}}
            <li class="header">LABELS</li>
            <li><a href="{{ route('suppliers.index') }}"><i class="fa fa-circle-o text-red"></i>
                    <span>Suppliers</span></a></li>

            @if ( auth()->user()->isAdmin )
            <li>
                <a href="{{ route('employees') }}">
                    <i class="fa fa-circle-o text-red"></i> <span>All Employee</span></a>
            </li>
            @endif



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
