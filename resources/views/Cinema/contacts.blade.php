@extends('cinema.home') 
@section('title', 'Контакти')
@section('content') 




<div class="general_social_icons">
	<nav class="social">
		<ul>
			<li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
			<li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
			<li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
			<li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>				  
		</ul>
  </nav>
</div>
<!-- contact -->
	<div class="contact-agile">
		<div id="map" style="margin-bottom: 5%;"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2908.2980052303155!2d23.54485351569075!3d43.203238489427235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40ab18de892bd6d1%3A0x147921eb04d304c1!2z0JrQuNC90L4!5e0!3m2!1sen!2sbg!4v1490460450207" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
		<div class="faq">
			<h4 class="latest-text w3_latest_text">Контакти</h4>
			<div class="container">
				<div class="col-md-3 location-agileinfo">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
					</div>
					<h3>Адрес</h3>
					<h4>345 Setwant natrer,</h4>
					<h4>Washington,</h4>
					<h4>United States.</h4>
				</div>
				<div class="col-md-3 call-agileits">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
					</div>
					<h3>Телефони</h3>
					<h4>+18044126235</h4>
					<h4>+14056489808</h4>
					<h4>+16789339049</h4>
				</div>
				<div class="col-md-3 mail-wthree">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</div>
					<h3>Поща</h3>
					<h4><a href="mailto:info@example.com">example1@mail.com</a></h4>
					<h4><a href="mailto:info@example.com">example2@mail.com</a></h4>
					<h4><a href="mailto:info@example.com">example3@mail.com</a></h4>
				</div>
				<div class="col-md-3 social-w3l">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					</div>
					<h3>Социална медия</h3>
					<ul>
						<li><a href="https://www.facebook.com/groups/438330539511167/?fref=ts" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i><span class="text">Facebook</span></a></li>
						<li class="twt"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span class="text">Twitter</span></a></li>
						<li class="ggp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span class="text">Google+</span></a></li>	
					</ul>
				</div>
				<div class="clearfix"></div>
				<center><strong>Свържи се с нас  :</strong></center><br>

				<form action="#" method="post">
					<input type="text" name="your name" placeholder="Име" required="">
					<input type="text" name="your name" placeholder="Фамилия" required="">
					<input type="text" name="your email" placeholder="Email" required="">
					<input type="text" name="subject" placeholder="Тема" required="">
					<textarea  name="your message" placeholder="Текст..." required=""></textarea>
					<input type="submit" value="Изпрати">
				</form>
			</div>
		</div>
	</div>
				<!-- Map-JavaScript -->
			<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>        
			<script type="text/javascript">
				google.maps.event.addDomListener(window, 'load', init);
				function init() {
					var mapOptions = {
						zoom: 11,
						center: new google.maps.LatLng(40.6700, -73.9400),
						styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
					};
					var mapElement = document.getElementById('map');
					var map = new google.maps.Map(mapElement, mapOptions);
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(40.6700, -73.9400),
						map: map,
					});
				}
			</script> -->
		<!-- //Map-JavaScript -->
<!-- //contact -->

@endsection