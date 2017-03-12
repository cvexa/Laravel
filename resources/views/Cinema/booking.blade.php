@extends('cinema.home') 
@section('title', 'Booking ')
@section('content') 
<div id="booking_content">
<div class="content">

<?php
$u_id = session('u_id');
if (count($sold) > 1) {
 	foreach($sold as $value){
    $taken_seats[] =  ($value->row_num ."_". $value->column_num);
 }
 }else{
 	$taken_seats =["0_0"];
 } 
 ?>
 @if(empty($_GET['max']))
<div class="main">

<h2>Избери Брой билети : </h2><br>
<center>
<form id="max_form" action="{{ url('/reservation/'.$screenings->id ) }}">
				{{csrf_field()}}
		<input type="number" name="max" value="">
	    <input type="submit" name="submit" value="Продължи" class="checkout-button">	
</form>

<h2>{{ $screenings->cmMovie['title'] }}</h2><br>
<p>Прожекция - {{ $screenings->date.' / '.substr($screenings->hour,0,5) }}</p><br>
<p>Цена - {{number_format($screenings->price,2)}} лв. </p><br>
<p>Формат - {{$screenings->cmMovie['video_format']}}</p><br>


<iframe width="65%" height="300px" src="{{ $screenings->cmMovie->trailer}}?autoplay=1" frameborder="1" allowfullscreen></iframe>

</center>	
</div>				
 @else
<?php $max = $_GET['max']; ?> 


	<h1>Резервация</h1>
	<div class="main">
		<h2>Резервация За <b>{{ $screenings->cmMovie['title'] }}</b></h2>
		<div class="demo">
			<div id="seat-map">
				<div class="front">ЕКРАН</div>					
			</div>
			<div class="booking-details">
				<ul class="book-left">
					<li>Филм </li>
					<li>Прожекция </li>
					<li>Цена</li>
					<li>Билет/и</li>
					<li>Общо</li>
					<li>Места :</li>
				</ul>
				<ul class="book-right">
					<li>: {{ $screenings->cmMovie['title'] }}</li>
					<li>: {{ $screenings->date.' / '.substr($screenings->hour,0,5) }}</li>
					<li>: {{number_format($screenings->price,2)}} лв.</li>
					<li>: <span id="counter">0</span></li>
					<li>: <b><span id="total">0</span></b><i> лв.</i></li>

				</ul>
				<div class="clear"></div>
				<ul id="selected-seats" class="scrollbar scrollbar1"></ul>
				<form id="reserved">
					{{csrf_field()}}
				<input type="hidden" name="screenings_id" value="{{$screenings->id}}">
				<input type="hidden" name="price" value="{{number_format($screenings->price,2)}}">		
				</form>
			
						
				<button class="checkout-button" onClick="check()">Продължи</button>	
				<div id="legend"></div>
					
			</div>
			<div style="clear:both"></div>
	    </div>

			<script type="text/javascript">
				var reservation_url = <?php echo json_encode(url('/reservation')); ?>;
				var price = <?php echo number_format($screenings->price,2) ?> ; //price
				var max = <?php echo number_format($max,2) ?>
				// alert(price);
				var $cart = $('#selected-seats'); //Sitting Area
				var $reservation_form = $('#reserved');

				$(document).ready(function() {	
					$counter = $('#counter'), //Votes
					$total = $('#total'); //Total money
					
					var sc = $('#seat-map').seatCharts({
						map: [  //Seating chart
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa'
						],
						naming : {
							top : false,
							getLabel : function (character, row, column) {
								return column;
							}
						},
						legend : { //Definition legend
							node : $('#legend'),
							items : [
								[ 'a', 'available',   'Свободни' ],
								[ 'a', 'unavailable', 'Заети'],
								[ 'a', 'selected', 'Избрани']
							]					
						},
						click: function () { 
						//Click event
						
							if (this.status() == 'available' && $('#selected-seats li').length < max) { //optional seat
								$('<li>Ред'+(this.settings.row+1)+' Място'+this.settings.label+'</li>')
									.attr('id', 'cart-item-'+this.settings.id)
									.data('seatId', this.settings.id)
									.appendTo($cart);

								$('<input type="hidden" name="rows[]" value="'+(this.settings.row+1)+'">')
									
									.appendTo($reservation_form);
								$('<input type="hidden" name="columns[]" value="'+(this.settings.label)+'">')
									
									.appendTo($reservation_form);


									// alert(this.settings.id);

								$counter.text(sc.find('selected').length+1);
								$total.text(recalculateTotal(sc)+price);

										
								return 'selected';
							} else if (this.status() == 'selected') { //Checked

									//Update Number
									$counter.text(sc.find('selected').length-1);
									//update totalnum
									$total.text(recalculateTotal(sc)-price);
										
									//Delete reservation
									$('#cart-item-'+this.settings.id).remove();
									//optional
								
									return 'available';
							} else if (this.status() == 'unavailable') { //sold
								return 'unavailable';
							} else {
								return this.style();
							}
						}
					});
					//sold seat
					sc.get(<?php echo json_encode($taken_seats) ?>).status('unavailable');
					
						
				});
				//sum total money
				function recalculateTotal(sc) {
					var total = 0;
					sc.find('selected').each(function () {
						total += price;
					});
							
					return total;
				}

	
 		
            
 		

				function check(){
					 // alert( $('#selected-seats').text());
					 //  alert( $('#selected-seats').text().length);
                $.ajax({
                	url: reservation_url,
                	type: 'post',
                	data: $('#reserved').serialize()

                }).success(function (response){
                	alert(JSON.stringify(response));
                	window.location.replace("<?php echo url('profile/'.$u_id) ?>");

                });
				}
			</script>
			
		
      
	</div>
	<!-- <p class="copy_rights">&copy; 2016 Movie Ticket Booking Widget. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank"> W3layouts</a></p> -->
</div>
</div>
@endif
@endsection