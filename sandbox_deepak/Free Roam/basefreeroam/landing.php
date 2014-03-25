
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Choose Mode</title>

    <!-- Bootstrap core CSS -->
    <link href="../p2p_app/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
   

<style type="text/css">
body {
  padding-top: 50px;
}
</style>

  </head>

  <body onload="call()">

    <div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">P2P Physical Activity Tracker</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="#about"><span class="glyphicon glyphicon-star"></span> About</a></li>
  
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
		</div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column">

            <h2 class="pull-left"><span id="location"></span></h2>
             <img class="pull-right" src="" id="weather_image">
            <h2 class="pull-right"><span  id="weather"> </span></h2>

		</div>
	</div>
        <br/>
        <br/>
        <br/>
        <br/>
	<div class="row clearfix">
		<div class="col-xs-6 column" >
            <div class="well well-sm">
				<h3>
					<span class="glyphicon glyphicon-globe"></span> Free Roam Mode
				</h3>

				<p style="text-align: center">
					<a class="btn btn-primary" style="border-radius: 30px" href="#"><span class="glyphicon glyphicon-globe"></span> Free Roam Mode</a>
				</p>
</div>
		</div>
		<div class="col-xs-6 column">
<div class="well well-sm">
				<h3>
					<span class="glyphicon glyphicon-flag"></span> Challenge Mode
				</h3>

				<p style="text-align: center">
					<a class="btn btn-primary " style="border-radius: 30px" href="#"><span class="glyphicon glyphicon-flag"></span> Challenge Mode</a>
				</p>
</div>
		</div>
	</div>
</div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../p2p_app/js/bootstrap.min.js"></script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script>
function call() {
if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{alert("Geolocation is not supported by this browser.");}
  }

function showPosition(position) {
 $.ajax({
  url : "http://api.wunderground.com/api/7240ab8b2b1712e1/geolookup/conditions/q/" + position.coords.latitude +","+position.coords.longitude +".json",
  dataType : "jsonp",
  success : function(parsed_json) {
  var location = parsed_json['location']['city'];
var state = parsed_json['location']['state'];
var temp_f = parsed_json['current_observation']['temp_f'];
var weather = parsed_json['current_observation']['weather'];
var weather_image = parsed_json['current_observation']['icon_url'];
var local_time = parsed_json['current_observation']['local_time_rfc822'];
      console.log(local_time);
      var time =local_time.substring(16,22);
      console.log(time);

document.getElementById("location").innerHTML = location + ", " + state;
document.getElementById("weather").innerHTML = temp_f + "° F";
var weather_string =   weather_image;
document.getElementById('weather_image').src = weather_string;




  }
  });
}
</script>


</script>
  </body>
</html>
