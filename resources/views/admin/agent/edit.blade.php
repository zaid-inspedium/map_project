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
                            <h2 class="content-header-title float-left mb-0">Edit Agent</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Agent Side</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Agent</a>
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
                                    <h4 class="card-title">Edit Agent details below</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('agent_up', $agent->id) }}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">

                                                
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ $agent->name }}">
                                                            <label for="name">Name </label>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <select id="status" name="status" class="form-control" required>
                                                                <option value="">- Select Block -</option>
                                                                @if($agent->status == 'Active')
                                                                    <option value="Active" selected>Active</option>
                                                                    <option value="Inactive">Inactive</option>
                                                                @else
                                                                    <option value="Active" >Active</option>
                                                                    <option value="Inactive" selected>Inactive</option>
                                                                @endif
                                                            </select>
                                                            <label for="status">Status</label>
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