<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>pdf title</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    #map {
              height: 300px;  /* The height is 400 pixels */
              width: 100%;  /* The width is the width of the web page */
          }
  </style>
<body>
    <section class="blog details">
        <div class="container">
            <div class="row" >
                <div class="col-md-6" style="border-top:10px solid #7b88ff;">
                    <div  style="float: left; margin-top: 20px; width:100%"> 
                        <table width="100%" border="0">
                        <tr>
                        <th width="80%">
                        <h4 style="font-weight: bold; font-size: 25px;">
                        {{$addressInfo->p_address}}
                        </h4>
                        </th>
                        <th width="20%">
                        
                        <h4 style="font-weight: bold; font-size: 25px;">
                        @if(Auth::check())
    
                            @if($addressInfo->favorite==0)
                                <a href="javascript:makeFavorite({{$addressInfo->id}})"><i id="colorIcon_{{$addressInfo->id}}"  class="colorIcon_{{$addressInfo->id}} far fa-heart" aria-hidden="true" style="color:red; font-size: 25px;"></i></a>
                            @else
                                <a href="javascript:makeFavorite({{$addressInfo->id}})"><i id="colorIcon_{{$addressInfo->id}}" class="colorIcon_{{$addressInfo->id}} fas fa-heart" aria-hidden="true" style="color:red;font-size: 25px;"></i></a>
                            @endif
                        @endif
                       
                       
                        </h4> 
                        
                        </th>
                        </tr>
                        <tr>
                        <th>
                        <h4 style="font-weight: bold; font-size: 25px;">
                        {{$addressInfo->p_city}}, {{$addressInfo->p_state}}, {{$addressInfo->p_zipcode}}
                        </h4>
                        </th>
                        <th>
                     
                        </th>
                        </tr>
                        </table>
                        <!-- <h4 style="font-weight: bold; font-size: 25px;">
                            <span class="heading-icon"><i class="fa fa-map-marker"></i></span>
                            <span>{{$addressInfo->address}}
    
                                <div style="float: right;">
                        @if(Auth::check())
    
                            @if($addressInfo->favorite==0)
                                <td><a href="javascript:makeFavorite({{$addressInfo->id}})"><i id="colorIcon_{{$addressInfo->id}}"  class="colorIcon_{{$addressInfo->id}} far fa-heart" aria-hidden="true" style="color:red; font-size: 25px;"></i></a></td>
                            @else
                                <td><a href="javascript:makeFavorite({{$addressInfo->id}})"><i id="colorIcon_{{$addressInfo->id}}" class="colorIcon_{{$addressInfo->id}} fas fa-heart" aria-hidden="true" style="color:red;font-size: 25px;"></i></a></td>
                            @endif
                        @endif
                    </div>
                            </span>
                        </h4> -->
                    </div>                
                    
                    <div class="clearfix"></div>
                        
                    <table width="100%" border="0" style="margin:15px 0">
                        <tr>
                            <th>{{$addressInfo['addressInfo']['bedroom']}}</th>
                            <th>{{$addressInfo['addressInfo']['bathroom']}}</th>
                            <th>{{$addressInfo['addressInfo']['total_area_sq_feet']}}</th>
                            
                        </tr>
                        <tr>
                            <td>BD</td>
                            <td>BA</td>
                            <td>SqFT</td>
                        </tr>                    
                    </table>
                    
                    <table width="100%" border="0" style="margin:15px 0">
                       
                        <tr>
                            <th width="40%" style="color:#6234eb;font-size:  15px;font-width:bold;">Estimated Value</th>
                            <th width="60%" style="color:#6234eb;font-size:  15px;font-width:bold;">${{number_format($addressInfo['addressInfo']['zestimate'])}}</th>                        
                        </tr>
                        <tr>
                            <td>Year Built</td>
                            <td>{{$addressInfo['addressInfo']['yearBuilt']}}</td>
                        </tr>
                        <tr>
                            <td>Last sold date</td>
                            <td>{{$addressInfo['addressInfo']['last_sold_date']}}</td>
                        </tr>
                        <tr >
                            <td>Last Sold Price</td>
                            <td>${{number_format($addressInfo['addressInfo']['last_sold_price'])}}</td>
                        </tr>
                        </table>
                        <table  width="100%" border="0" style="margin:15px 0">
                       
                        <tr>
                            <th width="40%" style="color:#346eeb;font-size:  15px;font-width:bold;">Estimated Rents</th>
                            <td width="60%" style="color:#346eeb;font-size:  15px;font-weight: bold;"><div> 
                              ${{number_format($addressInfo['addressInfo']['rent'])}}<span style="margin-left: 40px; color:#346eeb;"><?php 
                                                            if ($addressInfo['addressInfo']['zestimate']>1){
                                                                echo number_format(((isset($addressInfo['addressInfo']['rent'])>0?$addressInfo['addressInfo']['rent']*12:1)/(isset($addressInfo['addressInfo']['zestimate'])>0?$addressInfo['addressInfo']['zestimate']:1)*100),1);
                                                            }else{
                                                                echo 0;
                                                            }
                                                             ?> % Rental Cap</span>
                            </div></td>
    
                        </tr> 
                        </table>
                        <table  width="100%" border="0" style="margin:15px 0">
                        <tr>
                            <th width="40%" style="color:#34ebc6;font-size:  15px;font-width:bold;">STR Annual Revenue</th>
                            <th width="60%" style="color:#34ebc6;font-size:  15px;font-width:bold;">
    
                                <div> 
                                ${{number_format($addressInfo['addressInfo']['air_dna_anual_revinue'])}} <span style="margin-left: 35px; color:#34ebc6;">
    
                                    <?php 
                                                            if($addressInfo['addressInfo']['zestimate']>1){
                                                                echo number_format(((isset($addressInfo['addressInfo']['air_dna_anual_revinue'])>0?$addressInfo['addressInfo']['air_dna_anual_revinue']:1)/(isset($addressInfo['addressInfo']['zestimate'])>0?$addressInfo['addressInfo']['zestimate']:1)*100),1);
                                                            }else{
                                                                echo 0;
                                                            }
                                                             ?>
                                 % STR Cap</span>
    
    
                            </th>                        
                        </tr> 
                        <tr>
                            <td>Occupancy</td>
                            <td>{{$addressInfo['addressInfo']['air_dna_accupancy']*100}}% </td>                        
                        </tr> 
                        <tr>
                            <td>Avg Daily Rate</td>
                            <td>${{number_format($addressInfo['addressInfo']['air_dna_average_daily_ratr'])}}</td>                        
                        </tr>
                       
                    </table>
    
    
                   
                </div>
                
                <div class="col-md-6" style="border-top:10px solid #7ad9f5;">
                    <!-- <img src="{{$addressInfo['addressInfo']['photo']}}" style="margin-left: 0;    width:100%;height: 45%; padding-left: 0" alt="First slide"> -->
    
                    <?php 
                    $lat_long = $addressInfo['addressInfo']['latatude'].','.$addressInfo['addressInfo']['longitude'];
                    $address = $addressInfo->p_address.','.$addressInfo->p_city.','.$addressInfo->p_state.','.$addressInfo->p_zipcode;
                    $address = urlencode($address);
                    $link = "https://www.google.com/maps/embed/v1/streetview?location=".$lat_long."&key=AIzaSyBnSQ_kM3vMc0p2pjZkblR3osUx7sJ23kA";
                    //  $link = 'https://maps.googleapis.com/maps/embed/v1/streetview?location=46.414382,10.013988&key=AIzaSyBnSQ_kM3vMc0p2pjZkblR3osUx7sJ23kA';
                    $src = "https://maps.googleapis.com/maps/api/streetview?size=600x300&location=".$address."&pitch=20&fov=110&key=AIzaSyBnSQ_kM3vMc0p2pjZkblR3osUx7sJ23kA";   
                    // print_r($address);
                     ?>
                     
                     <img style="height: 370px;width: 541px;margin-top:50px" src="{{$src}}" alt="{{$addressInfo['address']}}">
                    {{-- <iframe height="450" frameborder="0" style="border:0;width: 100%;" src="{{$link}}" allowfullscreen></iframe> --}}
                    <div style="margin-top: 5px;">
                    <div id="map"></div>
                        
                    </div>
                </div>
               
               
            </div>
    
          
        </div>
    </section>
    
    <script>
        window.onload = formsubmit2();
    
        function formsubmit2(){
            // alert({{Auth::user()}});
            @if(Auth::check())
            p = {{$addressInfo['addressInfo']['last_sold_price']}}-{{Auth::user()->mordgage_downpayment}};
            i = {{Auth::user()->mordgage_interest}}/100/12;
            n ={{Auth::user()->mordgage_loanterm}}*12;
            if(i==0){i=1;}
            if (p==0){p=1;}
            if(n==0){n=1;}
    
            // alert(n);
    
            @endif
            var monthly_amount2 =  p * i * (Math.pow(1 + i, n)) / (Math.pow(1 + i, n) - 1);
            // alert(monthly_amount2);
            document.getElementById('amount2').innerHTML=monthly_amount2.toFixed(2);
        }
        function formsubmit() {
    
            $("form").submit(function(e){
                e.preventDefault();
    
                return false;
    
            });
            var home_prize = $("#home_price").val();
            var down_payment = $("#down_payment").val();
            var lone_term = $("#longterm").val();
            var interest = $("#interest").val();
    
            var p = home_prize - down_payment;
            var i = interest/100/12;
            var n = lone_term*12;
    
            console.log(p+i+n);
            var monthly_amount =  p * i * (Math.pow(1 + i, n)) / (Math.pow(1 + i, n) - 1);
    
    
    
            $('#amount').text(monthly_amount.toFixed(2));
        }
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat: <?php echo $addressInfo['addressInfo']['latatude']?>, lng:<?php echo $addressInfo['addressInfo']['longitude']?>};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 14, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnSQ_kM3vMc0p2pjZkblR3osUx7sJ23kA&libraries=places,geometry&callback=initMap" async defer></script>

      
</body>
</html>