<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Welcome to P2P</title>

    <!-- Bootstrap core CSS -->
    <link href="../p2p_app/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
body {
  padding-top: 50px;
}
.starter-template {
  padding: 40px 15px;
  text-align: center;
}

</style>

  </head>

  <body>

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


    
    <div class="container">

      <div class="starter-template">



<form class="form-horizontal">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        <div class="checkbox">
          <label>
            <input type="checkbox"> Checkbox
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea"></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Radios</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
            Option one is this
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            Option two can be something else
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Selects</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
        <br>
        <select multiple="" class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>


<button type="button" class="btn btn-default" id="sample" onclick="call()"
data-container="body" data-toggle="popover" data-placement="right" data-content="click to fetch your location." data-original-title="" title=""> <span class="glyphicon glyphicon-map-marker"></span> Locate Me</button>


  <br/>
<br/>

(OR)

<br/>
<br/>
<div class="form-group">
  <div class="input-group" style="margin-left:auto; margin-right:auto; width:50%;">
    <input type="text" id="zipcde" class="form-control" placeholder="Enter Zip Code" required>
    <span class="input-group-btn">
      <button type="button" class="btn btn-default" 
       onclick="callbyzip()" data-container="body"> 
       <span class="glyphicon glyphicon-arrow-right"></span>  </button>
    </span>
  </div>
</div>
<span id= "locationspot"><span>
      </div>
    </div><!-- /.container -->




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../p2p_app/js/bootstrap.min.js"></script>
<script type="text/javascript">
$('#sample').popover('show');
</script>

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
  
document.getElementById("locationspot").innerHTML = "Your location is " + location +", " + state +".";
  }
  });
}
</script>

<script type="text/javascript">
function callbyzip()
{
  var zip = document.getElementById('zipcde').value
$.ajax({
  url : "http://api.wunderground.com/api/7240ab8b2b1712e1/geolookup/q/"+ zip +".json",
  dataType : "jsonp",
  success : function(parsed_json) {
  var location = parsed_json['location']['city'];
var state = parsed_json['location']['state'];
  
document.getElementById("locationspot").innerHTML = "Your location is " + location +", " + state +".";
  }
  });

}
</script>

   <!-- Modals
    ================================================== -->
    

  </body>
</html>
