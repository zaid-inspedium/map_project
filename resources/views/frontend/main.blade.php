<!DOCTYPE html>
<html>
<head>
	<title>The Project</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}" />
</head>
<body>
<div class='myimage'>
    <img src="{{ asset('public/app-assets/images/sitemap_1.jpg')}}" />


     <!-- SA Commercial 11-20 -->
   

    @for($x = 20; $x >= 1; $x--)

        @foreach($getData as $data)
            
            @if($data->block->name == 'SA')
<<<<<<< HEAD

                @if($data->unit_no == $x)

                    @if($data->status == 'Booked')
                        <div class='commercialboxBooked com{{$x}}'></div>
                        
                    @else
                        <div class='commercialbox com{{$x}}'></div>
                    @endif
                    
=======
                
                @if($data->unit_no == $x && $data->status == 'Booked')
                    <div class='commercialboxBooked com{{$x}}'></div>
                @else
                    <div class='commercialbox com{{$x}}'></div>
>>>>>>> 714ae8a7cb6479ae9a3b0c4bcb3d78c5967af646
                @endif

            @else
                    <div class='commercialbox com{{$x}}'></div>
            @endif


        @endforeach
            
            
    @endfor

    <!-- SA Commercial 11-20 -->
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
    @for($i = 1; $i <= 37; $i++)

        @foreach($getData as $data)
            
            @if($data->block->name == 'A')


                @if($i == 23 || $i == 36 || $i == 37)

                    @if($data->unit_no == $i && $data->status == 'Booked')
                        <div class='residentialboxA_customBooked res{{$i}}'></div>
                    @else
                        <div class='residentialboxA_custom res{{$i}}'></div>
                    @endif

                @else

                    @if($data->unit_no == $i && $data->status == 'Booked')
                        <div class='residentialboxABooked res{{$i}}'></div>
                    @else
                        <div class='residentialboxA res{{$i}}'></div>
                    @endif

                @endif

            @endif

        @endforeach
    
    @endfor
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
    <div class='residentialboxC res_C1'></div>
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

    <div class='residentialboxC_custom2 res_C31'></div>
    <div class='residentialboxC_custom res_C32'></div>
    <div class='residentialboxC_custom res_C33'></div>
    <div class='residentialboxC_custom res_C34'></div>
    <div class='residentialboxC_custom res_C35'></div>
    <div class='residentialboxC_customOutSizes36 res_C36'></div>
    <div class='residentialboxC_customOutSizes37 res_C37'></div>
    <div class='residentialboxC_customOutSizes res_C38'></div>
    <div class='residentialboxC_custom res_C39'></div>
    <div class='residentialboxC_custom res_C40'></div>
    <div class='residentialboxC_custom res_C41'></div>
    <div class='residentialboxC_custom2 res_C42'></div>
    <div class='residentialboxC_custom2 res_C43'></div>

    <!-- D block -->
    <div class='residentialboxD res_D1'></div>
    <div class='residentialboxD res_D2'></div>
    <div class='residentialboxD res_D3'></div>
    <!-- D Block End -->

    <div class='residentialboxC res_C44'></div>
    <div class='residentialboxC res_C45'></div>
    <div class='residentialboxC res_C46'></div>
    <div class='residentialboxCExtraSize res_C47'></div>

    <div class='residentialboxCExtraSize2 res_C48'></div>
    <div class='residentialboxC res_C49'></div>
    <div class='residentialboxC res_C50'></div>
    <div class='residentialboxC_custom3 res_C51'></div>
    <div class='residentialboxC_custom3 res_C52'></div>
    <div class='residentialboxC_custom3 res_C53'></div> 
    <div class='residentialboxC res_C54'></div>
    <div class='residentialboxC res_C55'></div>
    <div class='residentialboxCExtraSize res_C56'></div>

    <div class='residentialboxCExtraSize3 res_C57'></div>
    <div class='residentialboxC res_C58'></div>
    <div class='residentialboxC res_C59'></div>
    <div class='residentialboxC res_C60'></div>
    <div class='residentialboxC res_C61'></div>

</div>
</body>
</html>