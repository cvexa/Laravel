@extends('cinema.home') 
@section('title', 'Booking ')
@section('content') 
<div id="booking_content">
<div class="content">

 


	<h1>Резервация</h1>
	<div class="main">
		<h2>Резервация {{ $screenings->cmMovie['title'] }}</h2>
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
							if (this.status() == 'available') { //optional seat
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
					sc.get(['1_2', '4_4','4_5','6_6','6_7','8_5','8_6','8_7','8_8', '10_1', '10_2']).status('unavailable');
						
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
					 alert( $('#selected-seats').text());
                $.ajax({
                	url: reservation_url,
                	type: 'post',
                	data: $('#reserved').serialize()

                }).success(function (response){
                	alert('success: ' + JSON.stringify(response));
                	window.location.replace("<?php echo url('home/') ?>");

                });
				}
			</script>
		
	</div>
	<!-- <p class="copy_rights">&copy; 2016 Movie Ticket Booking Widget. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank"> W3layouts</a></p> -->
</div>
</div>

@endsection