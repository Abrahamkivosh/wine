@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href=" {{ route('home') }} "><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href=" {{ route('profile',auth()->user()->id) }} ">profile</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="/storage/uploads/users/{{ $user->avatar }}"
                            alt="User profile picture">

                        <h3 class="profile-username text-center"> {{ $user->name }} </h3>

                        <p class="text-muted text-center">
                            @switch($user->isAdmin)
                            @case(0)
                            <span>Employee </span>
                            @break
                            @case(1)
                            <span>Administrator</span>
                            @break
                            @default

                            @endswitch
                        </p>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Profile</a></li>
                        <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                        @if ( auth()->user()->isAdmin )
                            <li><a href="#settings" data-toggle="tab">Settings</a></li>
                        @endif


                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">

                            <div class="post">
                                <p>
                                    <div>Update your password</div>


                                    <form method="POST" action=" {{ route('passwordUpdate') }} ">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>




                                </p>


                            </div>


                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <ul class="timeline timeline-inverse">

                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                             action=" {{ route('profile.update',$user->id) }} " >
                                @csrf
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" value=" {{ $user->name }} " name="name"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">password</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Password ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="confirm_password" class="col-sm-2 control-label">confirm password</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                            placeholder="confirm password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="permission" class="col-sm-2 control-label">Permissions</label>

                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="permission" id="" value="0"> User
                                                <input class="form-check-input" type="radio" name="permission" id="" value="1"> Administrator
                                            </label>
                                        </div>
                                    </div>
                                </div>





                                <div class="form-group ">
                                    <label class="col-sm-2 control-label" for="avatar">Profile Image</label>
                                    <div class=" col-sm-10">
                                        <input id="avatar" class="form-control-file" type="file" name="avatar">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
@stop
