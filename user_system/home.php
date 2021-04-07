<?php

require_once'assets/php/header.php';
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
 <style> 
        .GFG { 
            color: white; 
            font-size: 50px; 
            -webkit-text-stroke-width: 1px; 
            -webkit-text-stroke-color: black; 
        } 
    </style> 
	<!-- Slide Show -->
  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="img/hostel.jpg" style="width:100%">
    <div class="w3-display-middle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h1><b><p class="GFG">JH Hostel</p></b></h1>
      <p class="GFG">Awesome place to stay!</p>   
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="img/2.jpg" style="width:100%">
    <div class="w3-display-middle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h1><b><p class="GFG">JH Hostel</p></b></h1>
      <p class="GFG">Home away from home.</p>    
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="img/3.jpg" style="width:100%">
    <div class="w3-display-middle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h1><b><p class="GFG">JH Hostel</p></b></h1>
      <p class="GFG">Simply the best!</p>    
    </div>
  </div>


<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32"> 
  <h1><b>JH HOSTELS</b></h1>
  <p>The perfect start to your <span class="w3-tag">adventure</span></p>
</header>

<!-- Grid -->
<div class="w3-row">

<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <div id="showAllNotification">
      
  </div>
  
<!-- END BLOG ENTRIES -->
</div>

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top">
  <img src="img/1.jpg" style="width:100%">
    <div class="w3-container w3-white">
      <h4><b>JH Hostel</b></h4>
      <p>Hostel is one phase in a man's life that teaches him what Indian mothers fail to teach their children despite the use of potential weapons like rolling pin,broom stick, wiper so on and henceforth. Who knows if you are luckier, you might just experience your bachelorhood as a paying guest. <span class="w3-tag">— Parul Wadhwa</span></p>
    </div>
  </div><hr>
  
  <!-- Posts -->
  <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>Hostel Facilities</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white">
      <li class="w3-padding-16">
        <img src="img/vn.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Food</span><br>
        <span>Veg/Non-veg</span>
      </li>
      <li class="w3-padding-16">
        <img src="img/wifi.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Wifi</span><br>
        <span>Free internet connection</span>
      </li> 
      <li class="w3-padding-16">
        <img src="img/parking.png" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">Free Parking</span><br>
        <span>Bikes/car</span>
      </li>   
      <li class="w3-padding-16 w3-hide-medium w3-hide-small">
        <img src="img/24.png" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">24*7</span><br>
        <span>Electricity & Water Supply</span>
      </li>  
    </ul>
  </div>
 
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-black w3-xlarge">
  <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
  <a href="https://www.pinterest.com"><i class="fab fa-pinterest"></i></a>
  <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
  <a href="https://www.flickr.com"><i class="fab fa-flickr"></i></a>
  <a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a>
  <p class="w3-medium">
    Powered by <i class="fas fa-code fa-lg"></i>JH Hostels
  </p>
</footer>
<!--
// Automatic Slideshow - change image every 3 seconds-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script type="text/javascript">

var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
$(document).ready(function(){
//fetch notification of an user
fetchNotification1();
function fetchNotification1(){
	$.ajax({
		url :'assets/php/process.php',
		method:'post',
		data: {action: 'fetchNotification1'},
		success:function(response){
			$("#showAllNotification").html(response);
		}
	});
}
//check notification
checkNotification();
function checkNotification(){
	$.ajax({
		url:'assets/php/process.php',
		method:'post',
		data: { action: 'checkNotification' },
		success:function(response){
			$("#checkNotification").html(response);
		}
	});
}
$.ajax({
  url:'assets/php/action.php',
  method:'post',
  data:{action:'checkUser'},
  success:function(response){
    if(response === 'bye'){
      window.location = 'index.php';
    }
  }
});

});
</script>
</section>
</body>
</html>
