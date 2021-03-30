@extends('admin.layouts.master')
@section('content')


        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Edit Module</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Module Setup</a>
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
                                    <h4 class="card-title">Edit Module details below</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('module_up', $module->id) }}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="name" class="form-control" name="name" value="{{ $module->name }}" required>
                                                            <label for="data-name">Module Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="module_title" class="form-control" name="module_title" value="{{ $module->module_title }}">
                                                            <label for="data-name">Title</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="route_name" class="form-control" name="route_name" value="{{ $module->route_name }}">
                                                            <label for="data-name">Route Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="tables" class="form-control" name="tables" value="{{ $module->tables }}">
                                                            <label for="data-name">Tables</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <select class="form-control" id="permit_id" name="status">
                                                                <option>- Select Status -</option>
                                                                @for($o = 0; $o < count($status); $o++)
                                                                @if($module->status == $status[$o])
                                                                <option selected value="{{ $status[$o] }}" >{{ $status[$o] }}</option>
                                                                @else
                                                                <option value="{{ $status[$o] }}" >{{ $status[$o] }}</option>
                                                                @endif
                                                                @endfor
                                                            </select>
                                                            <label for="data-name">Module Status</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                        
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
<script type="text/javascript">
    $('#permit_id').select2();
</script>
 @endsection