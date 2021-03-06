@extends('layouts.app')

@section('content')
<style type="text/css">

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  /*position: fixed;*/
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}
.full{
	text-align: center;
    background-color: lightcoral;
    margin-right: 20px;
    margin-left: 20px;
    margin-top: 5px;
    text-decoration: none;
    font-size: 20px;
    border-radius: 3px;
}
.full a{
	text-decoration: none;
	
	color: white;
}
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}
@media screen and (min-width: 700px){
	#fullbar2{
		display: none;
	}
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
 
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  #fullbar{
  	display: none;
  }
  .sidebar a {
    text-align: center;
    float: none;
  }
}
#progressBar {
  position: relative;
  width: 100%;
  height: 30px;
  background-color: #ddd;
  display: none;
}

#barStatus {
  position: absolute;
  width: 8%;
  height: 100%;
  background-color: #25F;
}
</style>
<!-- <h1>this is superadmin dashboard</h1> -->
<div class="wrapper">
	<!-- Sidebar  -->
	<div id='fullbar'>
		<div id='fullbar' class="sidebar-header">
			<h3>Admin Panel</h3>
		</div>

		<div id='fullbar' class="sidebar">
			   @role('superadmin')
		  <a href="{{route('userManagement')}}">All User</a>
		  <a href="{{route('adduser')}}">Add User</a>
		     @endrole
		
		</div>

</div>

	<!-- Page Content  -->
	<div id="content">

		<div class="row">

			<div class="col-md-12" id="fullbar2">
				<div class="row" id="fullbar2">
					@role('superadmin')
					<div  class="col-md-3 full"><a href="{{route('userManagement')}}">All User</a></div>
					<div  class="col-md-3 full"><a href="{{route('adduser')}}">Add User</a></div>
					  @endrole
					<div  class="col-md-3 full"><a href="{{route('mortgageSetings')}}">Mortgage Setings</a></div>
				
				
					
				</div>
			</div>



			<div class="col-md-3">
				<div class="card-counter primary">
					<i class="fa fa-code-fork"></i>
					<span class="count-numbers">{{$this_month_this_user}}</span>
					<span class="count-name">{{$month}}</span>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card-counter danger">
					<i class="fa fa-ticket"></i>
					<span class="count-numbers">{{$this_month_all_user}}</span>
					<span class="count-name">{{$month}} (All User)</span>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card-counter success">
					<i class="fa fa-database"></i>
					<span class="count-numbers">{{$total_property}}</span>
					<span class="count-name">Total properties</span>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card-counter info">
					<i class="fa fa-users"></i>
					<span class="count-numbers">{{$total_user}}</span>
					<span class="count-name">Users</span>
				</div>
			</div>
		</div>

		<div class="row">
			
			<div class="col-md-6">
				
					<div class="container">
    					<div class="card bg-light mt-3">
       						<div class="card-header">
           							 <h3>Batch Upload</h3>
        					</div>
	        				<div class="card-body">

							@if ($message = Session::get('success'))
									<div class="alert alert-success alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
											<strong>{{ $message }}</strong>
									</div>
									@endif


									@if ($message = Session::get('error'))
									<div class="alert alert-danger alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
											<strong>{{ $message }}</strong>
									</div>
							@endif

								@if($errors->has('filerror'))
									<h5 style="color: #ff5346;">{{$errors->first()}}</h5>
								@endif
	            				<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">

	               					 @csrf
	               					 <input type="file" name="file" class="form-control">
	               					 <br>
                                    <input type="text" name="filename" placeholder="File Name" style="margin-top: 4px;margin-bottom: 4px;">
									<div id="progressBar">
										<div id="barStatus"></div>
									  </div>   
									<button class="btn btn-success"  onclick="move()">Import File </button>
	               
	            				</form>
	        				</div>
    					</div>
					</div>


			</div>
			<div class="col-md-6">

				<div class="container">
    					<div class="card bg-light mt-3">
       						<div class="card-header">
           							 <h3>Search by Address</h3>
        					</div>
	        				<div class="card-body" style="height: 106px;">
								@if($errors->has('erroraddress'))
									<h5 style="color: #ff5346;">{{$errors->first()}}</h5>
								@endif
	            				<form class='search-form' method="POST" action="{{ route('search') }} " onsubmit="return validateForm()">

                            		 @csrf
									<div id="locationField">

										 <input type="hidden" name="search" value='' id="autocomplete_hidden">

										<input id="autocomplete"  onFocus="geolocate()" class='form-control' placeholder='Enter street address' type='text' name='search2' style="margin-top: 16px;">
									</div>
                            		 <button class='btn btn-link search-btn' type="submit" style="color: #3e3737;margin:-7px;">
                           			 	<i class='fa fa-search'></i>
                           			 </button>
                        		</form>
	        				</div>
    					</div>
					</div>
				
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">

				<div class="container">
    					<div class="card bg-light mt-3">
       						<div class="card-header">
           							 <h3>Favorite List</h3>
        					</div>
	        				<div class="card-body" style="overflow-x:auto;" >
	            				
	        							<table class="table table-striped">
    										<thead>
											      <tr>
													  <th>#</th>
                                                    <th>Favorite</th>
											        <th>Address</th>
											        <th>BD</th>
											        <th>BA</th>
											        <th>Estimate Value</th>
											        <th>Rent</th>
											        <th>STR Annual</th>
											        <th>Rental Cap</th>
											        <th>STR Cap</th>
											      </tr>
											    </thead>
											    <tbody>

												@foreach($favoriteAddress as $key=> $address)
											      <tr>
												  <td>{{ $favoriteAddress->firstItem() + $key }}</td>
													  @if($address->favorite==0)
													  <td><a href="javascript:makeFavorite({{$address->id}})"><i id="colorIcon_{{$address->id}}" class="colorIcon_{{$address->id}} far fa-heart" aria-hidden="true" style="color:red"></i></a></td>
											        @else
														  <td><a href="javascript:makeFavorite({{$address->id}})"><i id="colorIcon_{{$address->id}}" class="colorIcon_{{$address->id}} fas fa-heart" aria-hidden="true" style="color:red"></i></a></td>
													@endif
                                                      <td><a style="text-decoration: none; color: #060606" href="{{route('propertyResult',['propertyId' => $address['addressInfo']['id']])}}">{{$address->address}}</a></td>
											        <td>{{$address['addressInfo']['bedroom']}}</td>
											        <td>{{$address['addressInfo']['bathroom']}}</td>
											        <td>${{number_format(($address['addressInfo']['zestimate']>1?$address['addressInfo']['zestimate']:0))}}</td>
											        <td>${{number_format($address['addressInfo']['rent'])}}</td>
											        <td>${{number_format($address['addressInfo']['air_dna_anual_revinue'])}}</td>
											        <td>

											        	<?php 
											        	if ($address['addressInfo']['zestimate']>1){
											        		echo number_format(((isset($address['addressInfo']['rent'])>0?$address['addressInfo']['rent']*12:1)/(isset($address['addressInfo']['zestimate'])>0?$address['addressInfo']['zestimate']:1)*100),1);
											        	}else{
											        		echo 0;
											        	}
											        	 ?>
											        	

											        	%</td>
											        <td>


											        	<?php 
											        	if($address['addressInfo']['zestimate']>1){
											        		echo number_format(((isset($address['addressInfo']['air_dna_anual_revinue'])>0?$address['addressInfo']['air_dna_anual_revinue']:1)/(isset($address['addressInfo']['zestimate'])>0?$address['addressInfo']['zestimate']:1)*100),1);
											        	}else{
											        		echo 0;
											        	}
											        	 ?>
											        	
			%</td>





											      </tr>
													@endforeach
											    </tbody>
											  </table>
                                {{ $favoriteAddress->links() }}
	        				</div>
    					</div>
					</div>

			</div>
			<div class="col-md-12">
				<div class="container">
    					<div class="card bg-light mt-3">
       						<div class="card-header">
           							 <h3>Recent Batches</h3>
        					</div>
	        				<div class="card-body"  style="overflow-x:auto;">
	            				
	        							<table class="table table-striped">
    										<thead>
											      <tr>
													  <th>#</th>
											        <th>Date</th>
											        <th>Count</th>
											        <th>Name</th>
											        <th>Download</th>
											      </tr>
											    </thead>
											    <tbody>
											    	@foreach ($fileList as $key=>$file)
											      <tr>
												  <td>{{ $fileList->firstItem() + $key }}</td>
											        <td>{{$file->uploaded_time}}</td>
											        <td>{{$file->adress_count}}</td>
											        <td><a style="text-decoration: none;color: black;" href="{{url('fileaddress/'.$file->id)}}">
											        	{{$file->file_name}}
											        </a></td>
											        <td><a href="{{ url('export/'.$file->id) }}"><i class="fa fa-download" aria-hidden="true"></i></a></td>
											        
											      </tr>
											      @endforeach
											    </tbody>
											  </table>
											  {{ $fileList->links() }}

	        				</div>
    					</div>
					</div>

			</div>
			<div class="col-md-12">
				

				<div class="container">
    					<div class="card bg-light mt-3">
       						<div class="card-header">
           							 <h3>Recent search Address</h3>
        					</div>
	        				<div class="card-body" style="overflow-x:auto;">
	            				
	        							<table class="table table-striped">
    										<thead>
											      <tr>
													  <th>#</th>
											      	<th>Favorite</th>
											        <th>Address</th>
											        <th>BD</th>
											        <th>BA</th>
											        <th>Estimate Value</th>
											        <th>Rent</th>
											        <th>STR Annual</th>
											        <th>Rental Cap</th>
											        <th>STR Cap</th>
											      </tr>
											    </thead>
											    <tbody>
                                                @foreach($recentSearchAddress as $key=>$address)
                                                    <tr>
														<td>{{ $recentSearchAddress->firstItem() + $key }}</td>
                                                    	@if($address->favorite==0)
													  <td><a href="javascript:makeFavorite({{$address->id}})"><i id="colorIcon_{{$address->id}}" class="colorIcon_{{$address->id}} far fa-heart" aria-hidden="true" style="color:red"></i></a></td>
											        @else
														  <td><a href="javascript:makeFavorite({{$address->id}})"><i id="colorIcon_{{$address->id}}" class="colorIcon_{{$address->id}} fas fa-heart" aria-hidden="true" style="color:red"></i></a></td>
													@endif
                                                        <td><a style="text-decoration: none; color: #060606" href="{{route('propertyResult',['propertyId' => $address['id']])}}">{{$address->address}}</a></td>
                                                        <td>{{$address['addressInfo']['bedroom']}}</td>
                                                        <td>{{$address['addressInfo']['bathroom']}}</td>
                                                        <td>${{number_format(($address['addressInfo']['zestimate']>1?$address['addressInfo']['zestimate']:0))}}</td>
											        <td>${{number_format($address['addressInfo']['rent'])}}</td>
											        <td>${{number_format($address['addressInfo']['air_dna_anual_revinue'])}}</td>
											        <td>

											        	<?php 
											        	if ($address['addressInfo']['zestimate']>1){
											        		echo number_format(((isset($address['addressInfo']['rent'])>0?$address['addressInfo']['rent']*12:1)/(isset($address['addressInfo']['zestimate'])>0?$address['addressInfo']['zestimate']:1)*100),1);
											        	}else{
											        		echo 0;
											        	}
											        	 ?>
											        	

											        	%</td>
											        <td>


											        	<?php 
											        	if($address['addressInfo']['zestimate']>1){
											        		echo number_format(((isset($address['addressInfo']['air_dna_anual_revinue'])>0?$address['addressInfo']['air_dna_anual_revinue']:1)/(isset($address['addressInfo']['zestimate'])>0?$address['addressInfo']['zestimate']:1)*100),1);
											        	}else{
											        		echo 0;
											        	}
											        	 ?>
											        	
			%</td>



                                                    </tr>
                                                @endforeach
											    </tbody>
											  </table>
                                {{ $recentSearchAddress->links() }}
	        				</div>
    					</div>
					</div>

			</div>
		</div>









		
	</div>



</div>


<script>
	// This sample uses the Autocomplete widget to help the user select a
	// place, then it retrieves the address components associated with that
	// place, and then it populates the form fields with those details.
	// This sample requires the Places library. Include the libraries=places
	// parameter when you first load the API. For example:
	// <script
	// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

	var width = 5;
function move() {
document.getElementById('progressBar').style.display = 'block';
  var elem = document.getElementById("barStatus");   
  
  var id = setInterval(frame, 1000);
  function frame() {
    if (width >= 100) {
      //clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
    }
  }
}









function validateForm(){
        // var patt =^\d+.*.\d$;
        
        var paragraph = document.getElementById('autocomplete_hidden').value;
        var paragraph2 = document.getElementById('autocomplete').value;

        if (paragraph==''||paragraph==null){
            paragraph = paragraph2;
            document.getElementById('autocomplete_hidden').value = paragraph2;
        }

        const regex = /^\d+.*$/g;
        const found = paragraph.match(regex);
        if(found){

            return true
        }else{
        	 document.getElementById('autocomplete_hidden').value = '';
        document.getElementById('autocomplete').value = '';
       alert("please enter a valid street address");
        return false;
        }
        
    }


	var placeSearch, autocomplete;

	var componentForm = {
		street_number: 'short_name',
		route: 'long_name',
		locality: 'long_name',
		administrative_area_level_1: 'short_name',
		country: 'long_name',
		postal_code: 'short_name'
	};

	function initAutocomplete() {
		// Create the autocomplete object, restricting the search predictions to
		// geographical location types.
		autocomplete = new google.maps.places.Autocomplete(
				document.getElementById('autocomplete'), {types: ['geocode']});

		console.log(autocomplete)
		// Avoid paying for data that you don't need by restricting the set of
		// place fields that are returned to just the address components.
		autocomplete.setFields(['address_component','formatted_address']);

		// When the user selects an address from the drop-down, populate the
		// address fields in the form.
		autocomplete.addListener('place_changed', fillInAddress);
	}

	function fillInAddress() {
		// Get the place details from the autocomplete object.
		var place = autocomplete.getPlace();

		var team = place.formatted_address.split(',');

        if (team.length>=3){
        
       
        var fulladdress = team[0]+", "+team[1]+", "+team[2];

               }else{

            var fulladdress = "";
        }

        document.getElementById('autocomplete_hidden').value = fulladdress;
        
		// for (var component in componentForm) {
		// 	document.getElementById(component).value = '';
		// 	document.getElementById(component).disabled = false;
		// }

		// Get each component of the address from the place details,
		// and then fill-in the corresponding field on the form.
		// for (var i = 0; i < place.address_components.length; i++) {
		// 	var addressType = place.address_components[i].types[0];
		// 	if (componentForm[addressType]) {
		// 		var val = place.address_components[i][componentForm[addressType]];
		// 		document.getElementById(addressType).value = val;
		// 	}
		// }
	}

	// Bias the autocomplete object to the user's geographical location,
	// as supplied by the browser's 'navigator.geolocation' object.
	function geolocate() {
		// console.log("ok");
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				var geolocation = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};
				var circle = new google.maps.Circle(
						{center: geolocation, radius: position.coords.accuracy});
				autocomplete.setBounds(circle.getBounds());
			});
		}
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnSQ_kM3vMc0p2pjZkblR3osUx7sJ23kA&libraries=places,geometry&callback=initAutocomplete" async defer></script>




@endsection