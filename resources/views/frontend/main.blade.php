<!DOCTYPE html>
<html>
<head>
	<title>OUD Residency</title>
    <!-- <meta http-equiv="refresh" content="5; URL=http://localhost/map_project/"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}" />
    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
fieldset {
  background-color: #EEEEEE;
  position: absolute;
  margin-top: -1000px;
  margin-left: 1200px;
  border-radius: 8px;
  /*width: 180px;*/
}
legend {
  border-radius: 8px;
  background-color: gray;
  color: white;
  padding: 8px 10px;
  width: 130px;
  font-size: 20px;
}
/* Set additional styling options for the columns*/
    .column {
    float: left;
    width: 50%;
    }
    .row:after {
    content: "";
    display: table;
    clear: both;
    }
</style>
<body>
        <div style="text-align: center;">
          <h1>OUD Residency</h1>
        </div>

        <div aria-hidden="true" class="modal fade" id="addBookingModal" role="dialog" tabindex="-1">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header faded smaller">
            <div class="modal-title" style="text-align: center;">
              <span>OUD Residency: </span><strong>Booking Form</strong>
            </div>
            <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
          </div>
          <div class="modal-body">
              <span id="newBookingForm"></span>
            
          </div>
          
        </div>
      </div>
    </div>
<div class='myimage'>
    
  

    <img src="{{ asset('public/app-assets/images/sitemap_1.jpg')}}" />

    <fieldset>
      <legend><strong>Booking Status</strong></legend>
        <div class="row">
            <div class="column">
                <p style="width:4px; background-color: rgb(255,99,71); padding:12px;"></p>
            </div>
            <div class="column">
                <p><strong>Booked</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <p style="width:4px; background-color: rgb(60,179,113); padding:12px;"></p>
            </div>
            <div class="column">
                <p><strong>Available</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <p style="width:4px; background-color: rgb(65,105,225); padding:12px;"></p>
            </div>
            <div class="column">
                <p><strong>Hold</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <p style="width:4px; background-color: yellow; padding:12px;"></p>
            </div>
            <div class="column">
                <p><strong>For resale</strong></p>
            </div>
        </div>
     </fieldset>
<!-- SA Commercial Block -->

    @for($x = 1; $x <= 20; $x++)
        @foreach($getData as $data)
            @if($data->block->name == 'SA')
                
                @if($data->unit_no == $x && $data->status == 'Booked')
                    
                    <div class='commercialboxBooked com{{$data->unit_no}}'> &nbsp;&nbsp;SA {{$data->unit_no}}</div>

                @elseif($data->unit_no == $x && $data->status == 'Hold')
                    
                    <div class='commercialboxHold com{{$data->unit_no}}'> &nbsp;&nbsp;SA {{$data->unit_no}}</div>
                    @break

                @elseif($data->unit_no == $x && $data->status == 'ForSale')
                    
                    <div class='commercialboxForSale com{{$data->unit_no}}'> &nbsp;&nbsp;SA {{$data->unit_no}}</div>
                    @break
                @else

                    @if($data->status == 'Booked')
                        <div class='commercialboxBooked com{{$data->unit_no}}'> &nbsp;&nbsp;SA {{$data->unit_no}}</div>
                    @else
                    
                        <!-- Available -->
                        <a class="addbooking" data-id="{{$data->id}}" data-modalname="addBookingModal" data-block="{{$data->block_id}}" data-spanname="newBookingForm" data-toggle="modal" style="color: black;">
                            <div class='commercialbox com{{$x}}'> &nbsp;&nbsp;SA {{$data->unit_no}}</div>
                        </a>

                    @endif
                
                @endif
            @else

                <a class="addbooking" data-id="{{$x}}" data-modalname="addBookingModal" data-block="2" data-spanname="newBookingForm" data-toggle="modal" style="color: black;">
                    <div class='commercialbox com{{$x}}'>&nbsp;&nbsp;SA {{$x}}</div>
                </a>
                
            
            @endif
        @endforeach
    @endfor


<!-- Block A -->
    @for($i = 1; $i <= 37; $i++)
        @foreach($getData as $data)
            @if($data->block->name == 'A')
                @if($i == 23 || $i == 36 || $i == 37)

                    @if($data->unit_no == $i && $data->status == 'Booked')
                        <div class='residentialboxA_customBooked res{{$i}}'>&nbsp;A {{$i}}</div>
                        @break
                    @elseif($data->unit_no == $i && $data->status == 'Hold')
                        <div class='residentialboxA_customHold res{{$i}}'>&nbsp;&nbsp;A {{$i}}</div>
                        @break
                    @elseif($data->unit_no == $i && $data->status == 'ForSale')
                        <div class='residentialboxA_customForSale res{{$i}}'>&nbsp; &nbsp;A {{$i}}</div>
                        @break
                    @else
                        <div class='residentialboxA_custom res{{$i}}'>&nbsp;A {{$i}}</div>
                        @break
                    @endif

                @else
                    @if($data->unit_no == $i && $data->status == 'Booked')
                        <div class='residentialboxABooked res{{$i}}'>&nbsp;&nbsp;A {{$i}}</div>
                        @break
                    @elseif($data->unit_no == $i && $data->status == 'Hold')
                        <div class='residentialboxAHold res{{$i}}'>&nbsp;&nbsp;A {{$i}}</div>
                        @break
                    @elseif($data->unit_no == $i && $data->status == 'ForSale')
                        <div class='residentialboxAForSale res{{$i}}'>&nbsp;&nbsp;A {{$i}}</div>
                        @break
                    @else
                        <div class='residentialboxA res{{$i}}'>&nbsp;A {{$i}}</div>
                    @endif
                @endif
            @else
            @endif
        @endforeach
    @endfor

    <!-- Block A End -->

    <!-- Block C -->
    @for($x = 1; $x <= 30; $x++)
        @foreach($getData as $data)
            @if($data->block->name == 'C')

                @if($data->unit_no <= 30)

                    @if($data->unit_no == $x && $data->status == 'Booked')
                        <div class='residentialboxCBooked res_C{{$data->unit_no}}'>&nbsp;  &nbsp;C {{$x}}</div>
                        @break
                    @elseif($data->unit_no == $x && $data->status == 'Hold')
                        <div class='residentialboxCHold res_C{{$data->unit_no}}'>&nbsp; &nbsp;C {{$x}}</div>
                        @break
                    @elseif($data->unit_no == $x && $data->status == 'ForSale')
                        <div class='residentialboxCForSale res_C{{$data->unit_no}}'>&nbsp;  &nbsp;C {{$x}}</div>
                        @break
                    @else
                        @if($data->status == 'Booked')
                            <div class='residentialboxCBooked res_C{{$data->unit_no}}'>&nbsp;  &nbsp;C {{$data->unit_no}}</div>
                        @else
                            <div class='residentialboxC res_C{{$x}}'>&nbsp; &nbsp;C {{$x}}</div>
                        @endif
                    @endif

                @endif
            @else
                <div class='residentialboxC res_C{{$x}}'>&nbsp;  &nbsp;C {{$x}}</div>
            @endif
        @endforeach
    @endfor

<!-- Block C 2 -->

    @for($i = 31; $i <= 43; $i++)
        @foreach($getData as $data)
            @if($data->block->name == 'C')

                @if($data->unit_no > 30 && $data->unit_no <= 43)
                    
                    @if($i == 31 || $i == 42 || $i == 43)

                            @if($data->unit_no == $i && $data->status == 'Booked')
                                <div class='residentialboxC_custom2Booked res_C{{$i}}'>C {{$data->unit_no}}</div>
                            @break

                            @elseif($data->unit_no == $i && $data->status == 'ForSale')
                                <div class='residentialboxC_custom2ForSale res_C{{$i}}'>C {{$data->unit_no}}</div>
                            @break

                            @elseif($data->unit_no == $i && $data->status == 'Hold')
                                <div class='residentialboxC_custom2Hold res_C{{$i}}'>C {{$data->unit_no}}</div>
                            @break

                            @else
                                <div class='residentialboxC_custom2 res_C{{$i}}'>C {{$i}}</div>  
                            @endif

                    @else
                            @if($data->unit_no == $i && $data->status == 'Booked')
                                <div class='residentialboxC_customBooked res_C{{$i}}'>C {{$i}}</div>
                            @break

                            @elseif($data->unit_no == $i && $data->status == 'ForSale')
                                <div class='residentialboxC_customForSale res_C{{$i}}'>C {{$i}}</div>
                            @break

                            @elseif($data->unit_no == $i && $data->status == 'Hold')
                                <div class='residentialboxC_customHold res_C{{$i}}'>C {{$i}}</div>
                            @break

                            @else
                                <div class='residentialboxC_custom res_C{{$i}}'>C {{$i}}</div>  
                            @endif
                           
                    
                    @endif
                
                @endif

            @else
            @endif
        @endforeach
    @endfor


    <!-- D block -->
    @for($i = 1; $i <= 3; $i++)
        @foreach($getData as $data)
            @if($data->block->name == 'D')

               @if($data->unit_no == $i && $data->status == 'Booked')
                    <div class='residentialboxDBooked res_D{{$i}}'>D {{ $i}}</div>
                    @break

                @elseif($data->unit_no == $i && $data->status == 'Hold')
                    <div class='residentialboxDHold res_D{{$i}}'>D  {{ $i}}</div>
                    @break

                @elseif($data->unit_no == $i && $data->status == 'ForSale')
                    <div class='residentialboxDForSale res_D{{$i}}'>D {{ $i }}</div>
                    @break

               @else
                    <div class='residentialboxD res_D{{$i}}'>D {{ $i }}</div>

               @endif

            @else
            @endif
        @endforeach
    @endfor
    <!-- D Block End -->

    <!-- Block C 3 -->
    @for($i = 44; $i <= 47; $i++)
        @foreach($getData as $data)
            @if($data->block->name == 'C')

                @if($data->unit_no > 43 && $data->unit_no <= 47)

                    @if($data->unit_no == $i && $data->status == 'Booked')
                        <div class='residentialboxCBooked res_C{{$i}}'>C {{ $i }}</div>
                        @break

                    @elseif($data->unit_no == $i && $data->status == 'Hold')
                        <div class='residentialboxCHold res_C{{$i}}'>C {{ $i }}</div>
                        @break

                    @elseif($data->unit_no == $i && $data->status == 'ForSale')
                        <div class='residentialboxCForSale res_C{{$i}}'>C {{ $i }}</div>
                        @break

                    @else
                        <div class='residentialboxC res_C{{$i}}'>C {{ $i }}</div>
                        
                    @endif

                @endif

            @else
            @endif
        @endforeach
    @endfor


    <!-- Block C4 -->
    @for($i = 48; $i <= 61; $i++)
        @foreach($getData as $data)
            @if($data->block->name == 'C')

                @if($data->unit_no > 47 && $data->unit_no <= 61)
                    
                    @if($i == 51 || $i == 52 || $i == 53)
                        @if($data->unit_no == $i && $data->status == 'Booked')
                            <div class='residentialboxC_custom3Booked res_C{{$i}}'>C {{$i}}</div>
                            @break

                        @elseif($data->unit_no == $i && $data->status == 'Hold')
                            <div class='residentialboxC_custom3Hold res_C{{$i}}'>C {{$i}}</div>
                            @break

                        @elseif($data->unit_no == $i && $data->status == 'ForSale')
                            <div class='residentialboxC_custom3ForSale res_C{{$i}}'>C {{$i}}</div>
                            @break

                        @else
                            <div class='residentialboxC_custom3 res_C{{$i}}'>C {{$i}}</div>
                            
                        @endif
                    @else
                        @if($data->unit_no == $i && $data->status == 'Booked')
                            <div class='residentialboxCBooked res_C{{$i}}'>C {{$i}}</div>
                            @break

                        @elseif($data->unit_no == $i && $data->status == 'Hold')
                            <div class='residentialboxCHold res_C{{$i}}'>C {{$i}}</div>
                            @break

                        @elseif($data->unit_no == $i && $data->status == 'ForSale')
                            <div class='residentialboxCForSale res_C{{$i}}'>C {{$i}}</div>
                            @break

                        @else
                            <div class='residentialboxC res_C{{$i}}'>C {{$i}}</div>

                        @endif
                    
                    @endif
                
                @endif

            @else
            @endif
        @endforeach
    @endfor


</div>

    <!--Modal - Asset Company Head-->


</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){

        $(".addbooking").click(function(){
       
           var _token = $('input[name="_token"]').val();
           var unit_no = $(this).data('id');
           var block_id = $(this).data('block');
           var target_modal = $(this).data('modalname');
           var span_result = $(this).data('spanname');
           var modalId = '#'.concat(target_modal);
           var spanId = '#'.concat(span_result);

           console.log(modalId);
           console.log(spanId);
            
            $.ajax({
             url:"{{ route('unit.book') }}",
             post:"POST",
             beforeSend: function (xhr) {
                   var token = $('meta[name="csrf_token"]').attr('content');
        
                   if (token) {
                         return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                   }
               },
             data:{
                 unitNo:unit_no,
                 blockID:block_id
             },      
             success:function(result)
             {
                
              $(spanId).html(result);
              $(modalId).modal('show');
             }
             
            });
       
      });

    });




//     setTimeout(function(){
//    window.location.reload(1);
// }, 5000);
</script>
</html>