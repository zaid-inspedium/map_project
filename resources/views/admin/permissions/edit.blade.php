@extends('admin.layouts.master')
@section('content')


        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Edit Permission</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Permission Setup</a>
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
                                    <h4 class="card-title">Edit Permission details below</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('permission_up', $permission->id) }}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="name" class="form-control" name="name" value="{{ $permission->name }}" required>
                                                            <label for="data-name">Name</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-label-group">
                                                            <select class="form-control" id="permit_id" name="status">
                                                                <option>- Select Status -</option>
                                                                @for($o = 0; $o < count($status); $o++)
                                                                @if($permission->status == $status[$o])
                                                                <option selected value="{{ $status[$o] }}" >{{ $status[$o] }}</option>
                                                                @else
                                                                <option value="{{ $status[$o] }}" >{{ $status[$o] }}</option>
                                                                @endif
                                                                @endfor
                                                            </select>
                                                            <label for="data-name">Status</label>
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