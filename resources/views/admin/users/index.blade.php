@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Users</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Administration</a>
                                    </li>
                                    <li class="breadcrumb-item active">Users
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    

                    <!-- DataTable starts -->
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>NAME</th>
                                    <th>USERNAME</th>
                                    <th>STATUS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach($users as $use)
                                <tr>
                                    <td></td>
                                    <td class="product-name">{{ $use->name }}</td>
                                    <td class="product-name">{{ $use->username }}</td>
                                    <td>
                                        <div class="chip chip-success">
                                            <div class="chip-body">
                                                <div class="chip-text">{{ $use->status }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', $use->id) }}"><i class="feather icon-edit" title="Edit"></i></a>

                                        <a href=""><i class="feather icon-trash" title="Trash"></i></a>
                                    </td>
                                </tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- DataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4>ADD NEW USER</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <input type="hidden" value="1" name="role_id">
                            <div class="data-items pb-3">
                                <div class="data-fields px-2 mt-3">
                                    <div class="row">
                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Name</label>
                                            <input type="text" class="form-control" id="data-name" name="name">
                                        </div>

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Username</label>
                                            <input type="text" class="form-control" id="data-name" name="username">
                                        </div>

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Email</label>
                                            <input type="email" class="form-control" id="data-name" name="email">
                                        </div>

                                        <div class="col-sm-12 data-field-col">
                                            <label for="data-name">Password</label>
                                            <input type="password" class="form-control" id="data-name" name="password">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                <div class="add-data-btn">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

            </div>
        </div>



@endsection