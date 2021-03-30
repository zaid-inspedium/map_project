@extends('admin.layouts.master')
@section('content')


        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Edit Role</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Administration</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Roles</a>
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
                                    <h4 class="card-title">Edit role details below</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('role_up', $role->id) }}" method="POST">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="role_name" class="form-control" placeholder="Enter Role Name" name="role_name" value="{{$role->name}}">
                                                            <label for="first-name-column">Role Name</label>
                                                        </div>
                                                    </div>

                                                     <div class="col-md-12 col-12">
                                                        <div class="form-label-group">
                                                            <select id="permit_id" class="form-control" name="permit[]" placeholder="Role" multiple="true">
                                                                <option>- Select Module -</option>
                                                                @if(count($permissions) > 0)
                                                                @foreach($actions as $act)
                                                                @if(in_array($act->id,$permissions))
                                                                <option selected value="{{$act->id}}">{{ $act->name }}</option>
                                                                @else
                                                                <option value="{{$act->id}}">{{ $act->name }}</option>
                                                                @endif
                                                                @endforeach
                                                                @else
                                                                @foreach($actions as $act)
                                                                
                                                                <option value="{{$act->id}}">{{ $act->name }}</option>
                                                                
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                            <label for="country-floating">Modules</label>
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
<script type="text/javascript">
    $('#permit_id').select2();
</script>
 @endsection