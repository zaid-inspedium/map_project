@extends('admin.layouts.master')
@section('content')

<div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Agent Setup</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Agents</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
             @if ($message = Session::get('success'))
                    <div class="alert alert-success" id="msg">
                        <p>{{ $message }}</p>
                    </div>
                  @elseif ($message = Session::get('danger'))
                    <div class="alert alert-danger" id="msg">
                        <p>{{ $message }}</p>
                    </div>
                  @endif
            <div class="content-body">
                <a class="btn btn-success" style="color: white;" data-toggle="modal" data-target="#addAgent">
                  <i class="fa fa-plus"></i> Add Agent
                </a>
                <br>
                <br>

                <!-- Responsive tables start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-content">
                                <table class="table" id="myTable">
                            <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>AGENT</th>
                                            <th>STATUS</th>
                                            <th>CREATED AT</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php $i = 1; ?>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td class="product-name">{{ $d->name }}</td>
                                    <td class="product-name">{{ $d->status }}</td>
                                    <td class="product-name">{{ $d->created_at }}</td>
                                    <td>
                                        <a href="{{ route('agent.edit', $d->id) }}" class="btn btn-info" style="color: white;">
                                          <i class="fa fa-edit"></i> Edit Agent
                                        </a>
                                        <a href="{{ route('agent_del', $d->id) }}" class="btn btn-danger" style="color: white;">
                                          <i class="fa fa-trash"></i> Delete Agent
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        
                    </div>
                
                </div>
                </div>
                <!-- Responsive tables end -->

            </div>
        </div>



<!-- Add Booking Modal -->
<div class="modal fade" id="addAgent" style="margin-top: 200px;" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Agent</h5>
        <button type="button" style="background-color: #f3080d;" class="close" data-dismiss="modal" aria-label="Close">
          <span style="background-color: #f3080d; color:white;">&times;</span>
        </button>
      </div>
        <form action="{{route('add_agent')}}" method="POST">
          @csrf
      <div class="modal-body">
        <label for="name"><strong>Name</strong></label>
        <input id="name" placeholder="Enter Name" class="form-control" type="text" name="name" required>
        <label for="status"><strong>Status</strong></label>
        <select id="status" name="status" class="form-control" required>
            <option value="">- Select Status -</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Agent</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- //Add Booking Modal -->


<script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#myInput1").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable1 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>     

@endsection