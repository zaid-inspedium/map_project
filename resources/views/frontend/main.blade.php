<!DOCTYPE html>
<html>
<head>
	<title>The Project</title>
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



               
  <!--   <div class='commercialbox com20'></div>
    <div class='commercialbox com19'></div>
    <div class='commercialbox com18'></div>
    <div class='commercialbox com17'></div>
    <div class='commercialbox com16'></div>
    <div class='commercialbox com15'></div>
    <div class='commercialbox com14'></div>
    <div class='commercialbox com13'></div>
    <div class='commercialbox com12'></div>
    <div class='commercialbox com11'></div>

    <div class='commercialbox com10'></div>
    <div class='commercialbox com9'></div>
    <div class='commercialbox com8'></div>
    <div class='commercialbox com7'></div>
    <div class='commercialbox com6'></div>
    <div class='commercialbox com5'></div>
    <div class='commercialbox com4'></div>
    <div class='commercialbox com3'></div>
    <div class='commercialbox com2'></div>
    <div class='commercialbox com1'></div>  -->

    <!-- Block A -->
    
    <!-- <div class='residentialboxA res1'></div>
    <div class='residentialboxA res2'></div>
    <div class='residentialboxA res3'></div>
    <div class='residentialboxA res4'></div>
    <div class='residentialboxA res5'></div>
    <div class='residentialboxA res6'></div>
    <div class='residentialboxA res7'></div>
    <div class='residentialboxA res8'></div>
    <div class='residentialboxA res9'></div>
    <div class='residentialboxA res10'></div>

    <div class='residentialboxA res11'></div>
    <div class='residentialboxA res12'></div>
    <div class='residentialboxA res13'></div>
    <div class='residentialboxA res14'></div>
    <div class='residentialboxA res15'></div>
    <div class='residentialboxA res16'></div>
    <div class='residentialboxA res17'></div>
    <div class='residentialboxA res18'></div>
    <div class='residentialboxA res19'></div>
    <div class='residentialboxA res20'></div>
    <div class='residentialboxA res21'></div>
    <div class='residentialboxA res22'></div>
    
    <div class='residentialboxA_custom res23'></div>
    <div class='residentialboxA res24'></div>
    <div class='residentialboxA res25'></div>
    <div class='residentialboxA res26'></div>
    <div class='residentialboxA res27'></div>
    <div class='residentialboxA res28'></div>
    <div class='residentialboxA res29'></div>
    <div class='residentialboxA res30'></div>
    <div class='residentialboxA res31'></div>
    <div class='residentialboxA res32'></div>
    <div class='residentialboxA res33'></div>
    <div class='residentialboxA res34'></div>
    <div class='residentialboxA res35'></div>
    <div class='residentialboxA_custom res36'></div>
    <div class='residentialboxA_custom res37'></div> -->
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
                        @else
                            <div class='residentialboxC_custom2 res_C{{$i}}'></div>
                            
                        @endif

                    @else
                        @if($data->unit_no == $i && $data->status == 'Booked')
                            <div class='residentialboxC_customBooked res_C{{$i}}'></div>
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


    <!-- <div class='residentialboxC res_C1'></div>
    <div class='residentialboxC res_C2'></div>
    <div class='residentialboxC res_C3'></div>
    <div class='residentialboxC res_C4'></div>
    <div class='residentialboxC res_C5'></div>
    <div class='residentialboxC res_C6'></div>

    <div class='residentialboxC res_C7'></div>
    <div class='residentialboxC res_C8'></div>
    <div class='residentialboxC res_C9'></div>
    <div class='residentialboxC res_C10'></div>
    <div class='residentialboxC res_C11'></div>
    <div class='residentialboxC res_C12'></div>
    <div class='residentialboxC res_C13'></div>
    <div class='residentialboxC res_C14'></div>
    <div class='residentialboxC res_C15'></div>
    <div class='residentialboxC res_C16'></div>
    <div class='residentialboxC res_C17'></div>
    <div class='residentialboxC res_C18'></div>

    <div class='residentialboxC res_C19'></div>
    <div class='residentialboxC res_C20'></div>
    <div class='residentialboxC res_C21'></div>
    <div class='residentialboxC res_C22'></div>
    <div class='residentialboxC res_C23'></div>
    <div class='residentialboxC res_C24'></div>
    <div class='residentialboxC res_C25'></div>
    <div class='residentialboxC res_C26'></div>
    <div class='residentialboxC res_C27'></div>
    <div class='residentialboxC res_C28'></div>
    <div class='residentialboxC res_C29'></div>
    <div class='residentialboxC res_C30'></div>
 -->



<!--     <div class='residentialboxC_custom2 res_C31'></div>
    <div class='residentialboxC_custom res_C32'></div>
    <div class='residentialboxC_custom res_C33'></div>
    <div class='residentialboxC_custom res_C34'></div>
    <div class='residentialboxC_custom res_C35'></div>
    <div class='residentialboxC_custom res_C36'></div>
    <div class='residentialboxC_custom res_C37'></div>
    <div class='residentialboxC_custom res_C38'></div>
    <div class='residentialboxC_custom res_C39'></div>
    <div class='residentialboxC_custom res_C40'></div>
    <div class='residentialboxC_custom res_C41'></div>
    <div class='residentialboxC_custom2 res_C42'></div>
    <div class='residentialboxC_custom2 res_C43'></div> -->

    <!-- D block -->
    @for($i = 1; $i <= 3; $i++)
        @foreach($getData as $data)
            @if($data->block->name == 'D')

               @if($data->unit_no == $i && $data->status == 'Booked')
                    <div class='residentialboxDBooked res_D{{$i}}'></div>
                    @break
               @else
                    <div class='residentialboxD res_D{{$i}}'></div>

               @endif

            @else
            @endif
        @endforeach
    @endfor
<!--     <div class='residentialboxD res_D1'></div>
    <div class='residentialboxD res_D2'></div>
    <div class='residentialboxD res_D3'></div> -->
    <!-- D Block End -->

    <!-- Block C 3 -->
    @for($i = 44; $i <= 47; $i++)
        @foreach($getData as $data)
            @if($data->block->name == 'C')

                @if($data->unit_no > 43 && $data->unit_no <= 47)

                    @if($data->unit_no == $i && $data->status == 'Booked')
                        <div class='residentialboxCBooked res_C{{$i}}'></div>
                        @break
                    @else
                        <div class='residentialboxC res_C{{$i}}'></div>
                        
                    @endif

                @endif

            @else
            @endif
        @endforeach
    @endfor

<!--     <div class='residentialboxC res_C44'></div>
    <div class='residentialboxC res_C45'></div>
    <div class='residentialboxC res_C46'></div>
    <div class='residentialboxC res_C47'></div> -->



    <!-- Block C4 -->
    @for($i = 48; $i <= 61; $i++)
        @foreach($getData as $data)
            @if($data->block->name == 'C')

                @if($data->unit_no > 47 && $data->unit_no <= 61)
                    
                    @if($i == 51 || $i == 52 || $i == 53)
                        @if($data->unit_no == $i && $data->status == 'Booked')
                            <div class='residentialboxC_custom3Booked res_C{{$i}}'></div>
                            @break
                        @else
                            <div class='residentialboxC_custom3 res_C{{$i}}'></div>
                            
                        @endif
                    @else
                        @if($data->unit_no == $i && $data->status == 'Booked')
                            <div class='residentialboxCBooked res_C{{$i}}'></div>
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