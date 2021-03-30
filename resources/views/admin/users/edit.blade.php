@extends('admin.layouts.master')
<style type="text/css">
    #myFileInput {
        display:none;
    }
</style>
@section('content')


        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Edit Users</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Users Side</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Users</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                

                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Users details below</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('users_up', $user->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                                            <label for="first-name-column"> Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                                                            <label for="username">Username </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                                            <label for="email">Email </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="password" id="user_old_pwd" class="form-control" placeholder="Current Password" name="user_old_pwd" value="">
                                                            <label for="data-name">Old Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="password" id="user_new_pwd" class="form-control" placeholder="New Password" name="user_new_pwd" value="">
                                                            <label for="data-name">New Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="password" id="user_confirm_new_pwd" class="form-control" placeholder="Confirm New Password" name="user_confirm_new_pwd" value="">
                                                            <label for="data-name">Confirm New Password</label>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Floating Label Form section end -->

            </div>
        </div>

 @endsection