<!DOCTYPE html>
<html>
<head>
	<title>OUD Residency</title>
    <!-- <meta http-equiv="refresh" content="5; URL=http://localhost/map_project/"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}" />
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
<div class='myimage'>
    
  

    <img src="{{ asset('public/app-assets/images/sitemap_1.jpg')}}" />

    <fieldset>
      <legend><strong>Booking Status</strong></legend>
        <div class="row">
            <div class="column">
                <p style="width:4px; background-color: red; padding:12px;"></p>
            </div>
            <div class="column">
                <p><strong>Booked</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <p style="width:4px; background-color: green; padding:12px;"></p>
            </div>
            <div class="column">
                <p><strong>Available</strong></p>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <p style="width:4px; background-color: blue; padding:12px;"></p>
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
                    
                    <div class='commercialboxBooked com{{$data->unit_no}}'></div>

                @elseif($data->unit_no == $x && $data->status == 'Hold')
                    
                    <div class='commercialboxHold com{{$data->unit_no}}'></div>
                    @break

                @elseif($data->unit_no == $x && $data->status == 'ForSale')
                    
                    <div class='commercialboxForSale com{{$data->unit_no}}'></div>
                    @break
                @else

                    @if($data->status == 'Booked')
                        <div class='commercialboxBooked com{{$data->unit_no}}'></div>
                    @else
                        <div class='commercialbox com{{$x}}'></div>
                    @endif
                
                @endif
            @else

                <div class='commercialbox com{{$x}}'></div>
            
            @endif
        @endforeach
    @endfor


<!-- Block A -->
    @for($i = 1; $i <= 37; $i++)
        @foreach($getData as $data)
            @if($data->block->name == 'A')
                @if($i == 23 || $i == 36 || $i == 37)

                    @if($data->unit_no == $i && $data->status == 'Booked')
                        <div class='residentialboxA_customBooked res{{$i}}'></div>
                        @break
                    @elseif($data->unit_no == $i && $data->status == 'Hold')
                        <div class='residentialboxA_customHold res{{$i}}'></div>
                        @break
                    @elseif($data->unit_no == $i && $data->status == 'ForSale')
                        <div class='residentialboxA_customForSale res{{$i}}'></div>
                        @break
                    @else
                        <div class='residentialboxA_custom res{{$i}}'></div>
                    @endif

                @else
                    @if($data->unit_no == $i && $data->status == 'Booked')
                        <div class='residentialboxABooked res{{$i}}'></div>
                        @break
                    @elseif($data->unit_no == $i && $data->status == 'Hold')
                        <div class='residentialboxAHold res{{$i}}'></div>
                        @break
                    @elseif($data->unit_no == $i && $data->status == 'ForSale')
                        <div class='residentialboxAForSale res{{$i}}'></div>
                        @break
                    @else
                        <div class='residentialboxA res{{$i}}'></div>
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
                        <div class='residentialboxCBooked res_C{{$data->unit_no}}'></div>
                        @break
                    @elseif($data->unit_no == $x && $data->status == 'Hold')
                        <div class='residentialboxCHold res_C{{$data->unit_no}}'></div>
                        @break
                    @elseif($data->unit_no == $x && $data->status == 'ForSale')
                        <div class='residentialboxCForSale res_C{{$data->unit_no}}'></div>
                        @break
                    @else
                        @if($data->status == 'Booked')
                            <div class='residentialboxCBooked res_C{{$data->unit_no}}'></div>
                        @else
                            <div class='residentialboxC res_C{{$x}}'></div>
                        @endif
                    @endif

                @endif
            @else
                <div class='residentialboxC res_C{{$x}}'></div>
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
                                <div class='residentialboxC_custom2Booked res_C{{$i}}'></div>
                            @break

                            @elseif($data->unit_no == $i && $data->status == 'ForSale')
                                <div class='residentialboxC_custom2ForSale res_C{{$i}}'></div>
                            @break

                            @elseif($data->unit_no == $i && $data->status == 'Hold')
                                <div class='residentialboxC_custom2Hold res_C{{$i}}'></div>
                            @break

                            @else
                                <div class='residentialboxC_custom2 res_C{{$i}}'></div>  
                            @endif

                    @else
                            @if($data->unit_no == $i && $data->status == 'Booked')
                                <div class='residentialboxC_customBooked res_C{{$i}}'></div>
                            @break

                            @elseif($data->unit_no == $i && $data->status == 'ForSale')
                                <div class='residentialboxC_customForSale res_C{{$i}}'></div>
                            @break

                            @elseif($data->unit_no == $i && $data->status == 'Hold')
                                <div class='residentialboxC_customHold res_C{{$i}}'></div>
                            @break

                            @else
                                <div class='residentialboxC_custom res_C{{$i}}'></div>  
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
                    <div class='residentialboxDBooked res_D{{$i}}'></div>
                    @break

                @elseif($data->unit_no == $i && $data->status == 'Hold')
                    <div class='residentialboxDHold res_D{{$i}}'></div>
                    @break

                @elseif($data->unit_no == $i && $data->status == 'ForSale')
                    <div class='residentialboxDForSale res_D{{$i}}'></div>
                    @break

               @else
                    <div class='residentialboxD res_D{{$i}}'></div>

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
                        <div class='residentialboxCBooked res_C{{$i}}'></div>
                        @break

                    @elseif($data->unit_no == $i && $data->status == 'Hold')
                        <div class='residentialboxCHold res_C{{$i}}'></div>
                        @break

                    @elseif($data->unit_no == $i && $data->status == 'ForSale')
                        <div class='residentialboxCForSale res_C{{$i}}'></div>
                        @break

                    @else
                        <div class='residentialboxC res_C{{$i}}'></div>
                        
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
                            <div class='residentialboxC_custom3Booked res_C{{$i}}'></div>
                            @break

                        @elseif($data->unit_no == $i && $data->status == 'Hold')
                            <div class='residentialboxC_custom3Hold res_C{{$i}}'></div>
                            @break

                        @elseif($data->unit_no == $i && $data->status == 'ForSale')
                            <div class='residentialboxC_custom3ForSale res_C{{$i}}'></div>
                            @break

                        @else
                            <div class='residentialboxC_custom3 res_C{{$i}}'></div>
                            
                        @endif
                    @else
                        @if($data->unit_no == $i && $data->status == 'Booked')
                            <div class='residentialboxCBooked res_C{{$i}}'></div>
                            @break

                        @elseif($data->unit_no == $i && $data->status == 'Hold')
                            <div class='residentialboxCHold res_C{{$i}}'></div>
                            @break

                        @elseif($data->unit_no == $i && $data->status == 'ForSale')
                            <div class='residentialboxCForSale res_C{{$i}}'></div>
                            @break

                        @else
                            <div class='residentialboxC res_C{{$i}}'></div>

                        @endif
                    
                    @endif
                
                @endif

            @else
            @endif
        @endforeach
    @endfor

    

<!--     <div class='residentialboxC res_C48'></div>
    <div class='residentialboxC res_C49'></div>
    <div class='residentialboxC res_C50'></div>
    <div class='residentialboxC_custom3 res_C51'></div>
    <div class='residentialboxC_custom3 res_C52'></div>
    <div class='residentialboxC_custom3 res_C53'></div> 
    <div class='residentialboxC res_C54'></div>
    <div class='residentialboxC res_C55'></div>
    <div class='residentialboxC res_C56'></div>

    <div class='residentialboxC res_C57'></div>
    <div class='residentialboxC res_C58'></div>
    <div class='residentialboxC res_C59'></div>
    <div class='residentialboxC res_C60'></div>
    <div class='residentialboxC res_C61'></div> -->

</div>
</body>

<!-- <script type="text/javascript">
    setTimeout(function(){
   window.location.reload(1);
}, 5000);
</script> -->
</html>