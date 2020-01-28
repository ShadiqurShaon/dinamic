
@extends('layouts.app')

@section('content')

<style type="text/css">
  #map {
            height: 300px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
</style>
<section class="blog details">
    <div class="container">
        <div class="row" >
            <div class="col-md-6" style="border-top:10px solid #7b88ff;">
                <div style="float: left; margin-top: 20px;"> 
                    <h4 style="font-weight: bold; font-size: 25px;">
                        <span class="heading-icon"><i class="fa fa-map-marker"></i></span>
                        <span class="hidden-sm-down">{{$addressInfo->address}}</span>
                    </h4>
                </div>                
                <div style="float: right; margin-top: 20px;">
                    @if(Auth::check())
{{--                    <i class="far fa-heart" style="font-size: 25px; margin-right: 10px;"></i>--}}
                        @if($addressInfo->favorite==0)
                            <td><a href="javascript:makeFavorite({{$addressInfo->id}})"><i id="colorIcon_{{$addressInfo->id}}"  class="far fa-heart" aria-hidden="true" style="color:red; font-size: 25px;"></i></a></td>
                        @else
                            <td><a href="javascript:makeFavorite({{$addressInfo->id}})"><i id="colorIcon_{{$addressInfo->id}}" class="fas fa-heart" aria-hidden="true" style="color:red;font-size: 25px;"></i></a></td>
                        @endif
                    @endif
                    <a href="{{route('printPdf')}}" style="text-decoration: none;color: black"><i class="fa fa-share-alt" style="font-size: 25px;"></i></a>
                </div>
                <div class="clearfix"></div>
                    
                <table width="100%" border="0" style="margin-top: 15px;">
                    <tr>
                        <th>{{$addressInfo['addressInfo']['bedroom']}}</th>
                        <th>{{$addressInfo['addressInfo']['bathroom']}}</th>
                        <th>{{$addressInfo['addressInfo']['finishedSqFt']}}</th>
                        <td width="150">Last Sold Date</td>
                        <td width="80">{{$addressInfo['addressInfo']['last_sold_date']}}</td>
                    </tr>
                    <tr>
                        <td>BD</td>
                        <td>BA</td>
                        <td>SqFT</td>
                        <td>Last Sold Price</td>
                        <td>${{$addressInfo['addressInfo']['last_sold_price']}}</td>
                    </tr>                    
                </table>
                
                <table width="80%" border="0" style="margin: 50px ;">
                   
                    <tr>
                        <th style="color:#6234eb;font-size:  15px;font-width:bold;">Zestimate</th>
                        <th style="color:#6234eb;font-size:  15px;font-width:bold;">$12,678</th>                        
                    </tr>
                    <tr>
                        <td>Last Update</td>
                        <td>01/5/2015</td>
                    </tr>
                    <tr>
                        <td>Last sold date</td>
                        <td>01/5/2017</td>
                    </tr>
                    <tr>
                        <td>Last Sold Price</td>
                        <td>$203500</td>
                    </tr>
                    <tr>
                        <th style="color:#346eeb;font-size:  15px;font-width:bold;">Rent Zestimate</th>
                        <td style="color:#346eeb;font-size:  15px;font-weight: bold;"><div> 
                           $1,000 <span style="margin-left: 40px; color:#4abf4a;">1.85% R/Z</span>
                        </div></td>

                    </tr> 
                    <tr>
                        <td>Last Update</td>
                        <td>$2535</td>
                    </tr>
                    <tr>
                        <th style="color:#34ebc6;font-size:  15px;font-width:bold;">VR Annual Revenue</th>
                        <th style="color:#34ebc6;font-size:  15px;font-width:bold;">

                            <div> 
                            ${{$addressInfo['addressInfo']['air_dna_anual_revinue']}} <span style="margin-left: 35px; color:red;">0.49% VR/Z</span>


                        </th>                        
                    </tr> 
                    <tr>
                        <td>Occupancy</td>
                        <td>{{$addressInfo['addressInfo']['air_dna_accupancy']*100}}% </td>                        
                    </tr> 
                    <tr>
                        <td>Avg Daily Rate</td>
                        <td>${{$addressInfo['addressInfo']['air_dna_average_daily_ratr']}}</td>                        
                    </tr>
                    <tr>
                        <td>
                            <a href=" http://www.zillow.com/"><img src="{{asset('images/Zillowlogo_200x50.gif')}}" alt="Real Estate on Zillow">
                            </a>
                        </td>
                        <td>
                            <a href="{{$addressInfo['addressInfo']['home_details']}}">See more details for {{$addressInfo->address}} on Zillow</a>
                        </td>
                    </tr>
                </table>


                <div style="border-top:10px solid #7b88ff; padding-top: 20px; margin-bottom: 30px">
                    <div class="row">
                        <div class="col-md-12">
                             @if(Auth::check())
                                    <div col-md-4 style="text-align: center;">
                                        <div>
                                            Amount/month <p id ="amount2" ></p>
                                        </div>
                                    </div>
                                @endif
                            <table style="text-align: center;">
                                <tr>
                                    <th style="padding-left: 2px;">Mortgage amount</td>
                                    <th style="padding-left:  20px;">Down Payment</td>
                                    <th style="padding-left:  20px;">Interest Rate</td>
                                    <th style="padding-left:  20px;">Period</td>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;font-size: 15px;font-weight: bold;">$239154</td>
                                    <td style="padding-left: 20px;font-size: 15px;font-weight: bold;">$0 </td>
                                    <td style="padding-left: 20px;font-size: 15px;font-weight: bold;">3.92</td>
                                    <td style="padding-left: 20px;font-size: 15px;font-weight: bold;">30</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6" style="border-top:10px solid #7ad9f5;">
                <!-- <img src="{{$addressInfo['addressInfo']['photo']}}" style="margin-left: 0;    width:100%;height: 45%; padding-left: 0" alt="First slide"> -->

                <?php 
                $lat_long = $addressInfo['addressInfo']['latatude'].','.$addressInfo['addressInfo']['longitude'];

                $link = "https://www.google.com/maps/embed/v1/streetview?location=".$lat_long."&key=AIzaSyBnSQ_kM3vMc0p2pjZkblR3osUx7sJ23kA";
                 ?>
                <iframe width="600" height="450" frameborder="0" style="border:0" src="{{$link}}" allowfullscreen></iframe>

                <div style="margin-top: 5px;">
                <div id="map"></div>
                    
                </div>
            </div>
           
            @if(!Auth::check())
            <div class="col-md-4" >
                <div style="height: 400px; margin-bottom: 100PX">
                    <h3>Mortgage Calculator</h3>

                    <p style="font-weight: bold;">Amount per Month:</p> <p id="amount" style="color: green;font-size: large"></p>
                    <form onsubmit="event.preventDefault()" action="">
                        <div class="form-group">
                            <label>Home Price</label>
                            <input type="number" name="home_price" class="form-control" id="home_price" placeholder="$-00">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Down Payment</label>
                            <input type="number" class="form-control" id="down_payment" placeholder="$-00">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Loan Term</label>
                            <select class="form-control" id="longterm">
                                <option value="1">1 Year</option>
                                <option value="2">2 Year</option>
                                <option value="3">3 Year</option>
                                <option value="4">4 year</option>
                                <option value="5">5 year</option>
                                <option value="6">6 year</option>
                                <option value="7">7 year</option>
                                <option value="8">8 year</option>
                                <option value="9">9 year</option>
                                <option value="10">10 year</option>
                                <option value="11">11 year</option>
                                <option value="12">12 year</option>
                                <option value="13">13 year</option>
                                <option value="14">14 year</option>
                                <option value="15">15 year</option>
                                <option value="16">16 year</option>
                                <option value="17">17 year</option>
                                <option value="18">18 year</option>
                                <option value="19">19 year</option>
                                <option value="20">20 year</option>
                                <option value="21">21 year</option>
                                <option value="22">22 year</option>
                                <option value="23">23 year</option>
                                <option value="24">24 year</option>
                                <option value="25">25 year</option>
                                <option value="26">26 year</option>
                                <option value="27">27 year</option>
                                <option value="28">28 year</option>
                                <option value="29">29 year</option>
                                <option value="30">30 year</option>
                            </select>
                        </div>
{{--                        <input type="button" id="sbt" value="Submit" />--}}
                        <div class="form-group">
                            <label for="exampleInputPassword1">Interest</label>
                            <input type="number" class="form-control" id="interest" placeholder="$-00">
                        </div>

                        <button onclick="formsubmit()"  class="btn btn-default">Submit</button>
                        <input style="width: 25%;background-color: #3F3F3F;" type="reset" id="rst"  class="btn btn-default" value="Reset Form" />
                        {{--                        <input type="reset" id="rst" value="Reset Form" />--}}
                    </form>
                </div>

            </div>
                @endif
           
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 blog-pots">
                 <!-- START SECTION RECENTLY PROPERTIES -->
                <section class="recently portfolio" style="background: none;">
                    <div class="container-fluid">
                        <div class="section-title">
                            <h3>Related</h3>
                            <h2>Properties</h2>
                        </div>
                        <div class="row portfolio-items">

                            @foreach($recomendentAddresses as $address)

                            <div class="item col-lg-3 col-md-6 col-xs-12 landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="project-bottom">
                                            <h4><a href="{{route('propertyResult',['propertyId' => $address['addressInfo']['id']])}}">View Property</a><span class="category">Real Estate</span></h4>
                                        </div>
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="properties-details.html" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <div class="homes-price">Family Home</div>
                                                <img src="{{asset('images/feature-properties/fp-1.jpg')}}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3>Real House Luxury Villa</h3>
                                        <p class="homes-address mb-3">
                                            <a href="properties-details.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>

                                        <div class="footer">
                                            <!-- Price -->
                                            <div class="price-properties">
                                                <h3 class="title mt-3">
                                                <a href="properties-details.html">$ 230,000</a>
                                                </h3>
                                                <div class="compare">
                                                    <a href="#" title="Compare">
                                                        <i class="fas fa-exchange-alt"></i>
                                                    </a>
                                                    <a href="#" title="Share">
                                                        <i class="fas fa-share-alt"></i>
                                                    </a>
                                                    <a href="#" title="Favorites">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach





                            <div class="item col-lg-3 col-md-6 col-xs-12 people">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="project-bottom">
                                            <h4><a href="properties-details.html">View Property</a><span class="category">Real Estate</span></h4>
                                        </div>
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="properties-details.html" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button sale rent">For Rent</div>
                                                <div class="homes-price">Family Home</div>
                                                <img src="{{asset('images/feature-properties/fp-2.jpg')}}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3>Real House Luxury Villa</h3>
                                        <p class="homes-address mb-3">
                                            <a href="properties-details.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <div class="footer">
                                            <!-- Price -->
                                            <div class="price-properties">
                                                <h3 class="title mt-3">
                                                <a href="properties-details.html">$ 230,000</a>
                                                </h3>
                                                <div class="compare">
                                                    <a href="#" title="Compare">
                                                        <i class="fas fa-exchange-alt"></i>
                                                    </a>
                                                    <a href="#" title="Share">
                                                        <i class="fas fa-share-alt"></i>
                                                    </a>
                                                    <a href="#" title="Favorites">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <div class="item col-lg-3 col-md-6 col-xs-12 people landscapes no-pb pbp-3">
                                <div class="project-single no-mb mbp-3">
                                    <div class="project-inner project-head">
                                        <div class="project-bottom">
                                            <h4><a href="properties-details.html">View Property</a><span class="category">Real Estate</span></h4>
                                        </div>
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="properties-details.html" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <div class="homes-price">Family Home</div>
                                                <img src="{{asset('images/feature-properties/fp-3.jpg')}}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3>Real House Luxury Villa</h3>
                                        <p class="homes-address mb-3">
                                            <a href="properties-details.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>

                                        <div class="footer">
                                            <!-- Price -->
                                            <div class="price-properties">
                                                <h3 class="title mt-3">
                                                <a href="properties-details.html">$ 230,000</a>
                                                </h3>
                                                <div class="compare">
                                                    <a href="#" title="Compare">
                                                        <i class="fas fa-exchange-alt"></i>
                                                    </a>
                                                    <a href="#" title="Share">
                                                        <i class="fas fa-share-alt"></i>
                                                    </a>
                                                    <a href="#" title="Favorites">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item col-lg-3 col-md-6 col-xs-12 people landscapes no-pb">
                                <div class="project-single no-mb">
                                    <div class="project-inner project-head">
                                        <div class="project-bottom">
                                            <h4><a href="properties-details.html">View Property</a><span class="category">Real Estate</span></h4>
                                        </div>
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="properties-details.html" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button sale rent">For Rent</div>
                                                <div class="homes-price">Family Home</div>
                                                <img src="{{asset('images/feature-properties/fp-4.jpg')}}" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3>Real House Luxury Villa</h3>
                                        <p class="homes-address mb-3">
                                            <a href="properties-details.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>

                                        <div class="footer">
                                            <!-- Price -->
                                            <div class="price-properties">
                                                <h3 class="title mt-3">
                                                <a href="properties-details.html">$ 230,000</a>
                                                </h3>
                                                <div class="compare">
                                                    <a href="#" title="Compare">
                                                        <i class="fas fa-exchange-alt"></i>
                                                    </a>
                                                    <a href="#" title="Share">
                                                        <i class="fas fa-share-alt"></i>
                                                    </a>
                                                    <a href="#" title="Favorites">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- END SECTION RECENTLY PROPERTIES -->

            </div>

            <!-- <aside class="col-lg-3 col-md-12 car">
                <div class="widget">
                    <div class="recent-post py-5">
                        <h5 class="font-weight-bold mb-4">Recent Properties</h5>
                        <div class="recent-main">
                            <div class="recent-img">
                                <a href="blog-details.html"><img src="{{asset('images/feature-properties/fp-1.jpg')}}" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html"><h6>Family Home</h6></a>
                                <p>$230,000</p>
                            </div>
                        </div>
                        <div class="recent-main my-4">
                            <div class="recent-img">
                                <a href="blog-details.html"><img src="{{asset('images/feature-properties/fp-2.jpg')}}" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html"><h6>Family Home</h6></a>
                                <p>$230,000</p>
                            </div>
                        </div>
                        <div class="recent-main">
                            <div class="recent-img">
                                <a href="blog-details.html"><img src="{{asset('images/feature-properties/fp-3.jpg')}}" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html"><h6>Family Home</h6></a>
                                <p>$230,000</p>
                            </div>
                        </div>
                    </div>
                    <div class="recent-post">
                        <h5 class="font-weight-bold mb-4">Popolar Tags</h5>
                        <div class="tags">
                            <span><a href="#" class="btn btn-outline-primary">Houses</a></span>
                            <span><a href="#" class="btn btn-outline-primary">Real Home</a></span>
                        </div>
                        <div class="tags">
                            <span><a href="#" class="btn btn-outline-primary">Baths</a></span>
                            <span><a href="#" class="btn btn-outline-primary">Beds</a></span>
                        </div>
                        <div class="tags">
                            <span><a href="#" class="btn btn-outline-primary">Garages</a></span>
                            <span><a href="#" class="btn btn-outline-primary">Family</a></span>
                        </div>
                        <div class="tags">
                            <span><a href="#" class="btn btn-outline-primary">Real Estates</a></span>
                            <span><a href="#" class="btn btn-outline-primary">Properties</a></span>
                        </div>
                        <div class="tags no-mb">
                            <span><a href="#" class="btn btn-outline-primary">Location</a></span>
                            <span><a href="#" class="btn btn-outline-primary">Price</a></span>
                        </div>
                    </div>
                </div>
            </aside> -->

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

{{--<script async defer--}}
{{--        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnSQ_kM3vMc0p2pjZkblR3osUx7sJ23kA&callback=initMap">--}}
{{--</script>--}}

@endsection