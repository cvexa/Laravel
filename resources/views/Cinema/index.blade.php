
@extends('cinema.home') 
@section('title', 'Wellcome ')
@section('content') 
<?php
$last_saturday = strtotime('last Friday');
$next_sunday = strtotime('next Saturday');
$date_saturday = new DateTime();
$date_saturday->setTimestamp($last_saturday);
$date_sunday = new DateTime();
$date_sunday->setTimestamp($next_sunday);
$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($date_saturday,$interval,$date_sunday);


$date2 = new DateTime();

// Modify the date it contains
$date2->modify('next Friday');

// Output
$coming_soon = $date2->format('Y-m-d');
// echo date('Y-m-d');

$date_movie_soon=strtotime($coming_soon);

?>

<!-- banner-bottom -->
<div class="banner-bottom">
	<h4 class="latest-text w3_latest_text w3_home_popular">Очаквайте Скоро</h4>
	<div class="container">

		<div class="w3_agile_banner_bottom_grid">
			<div id="owl-demo" class="owl-carousel owl-theme">
				@foreach($movies as $movie)
				<?php
          
				$date_movie = new DateTime($movie->bg_premiere);
				$date_movie_new = strtotime($movie->bg_premiere);
			
			    if($date_movie_new > $date_movie_soon){
			          
                ?>

               
               
				<div class="item">
					<div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
						<!-- <a href="{{ url('/movies/'.$movie->id) }}" class="hvr-shutter-out-horizontal"> -->
						<a href="#movie{{$movie->id}}" class="w3_play_icon">
							<img src="{{ url('/posters/'.$movie->poster) }}" title="album-name" class="img-responsive" alt="poster" width="180px" height="280px" />
							<div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
						</a>
						<div class="mid-1 agileits_w3layouts_mid_1_home">
							<div class="w3l-movie-text">
							
								<h6><a href="{{ url('/movies/'.$movie->id) }}">{{ $movie->title }}</a></h6>							
							</div>
							<div class="mid-2 agile_mid_2_home">
                                 <span class="info_movie"> 
								<p>
									Премиера:
									{{ $movie->bg_premiere }}
									Рейтинг : {{ $movie->rating }} / 10
								</p>
								<!-- <div class="block-stars"> -->
								<p>
									<ul class="w3l-ratings"><br>
										<?php 
										$star = $movie->rating;
										$max = 11;


										for($i = 1; $i < $max; $i++){


											if($star < $i){

												echo '<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>';
											}else{
												echo '<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>';
											}

										}
										?>
									</ul>
								</p>
								</span>
								<!-- 	</div> -->
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="ribben">
							<p>NEW</p>
						</div>
					</div>
				</div>
		     <?php } ?>
				@endforeach
				
			</div>
		</div>
	</div>
</div>
@foreach($movies as $movie)
<div id="movie{{$movie->id}}" class="mfp-hide">
	<center><iframe width="65%" height="300px" src="{{ $movie->trailer}}" frameborder="1" allowfullscreen></iframe></center>
</div>
@endforeach				
<!-- general -->
<div class="general">
	<h4 class="latest-text w3_latest_text">Програма</h4>
	<div class="container">
		<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
				<!-- <li><a href="javascript:void(0)" onclick="show_only('')"> All </a></li> -->
				
				<?php 
				


				foreach ($period as $dt){

					$timestamp = strtotime($dt->format("Y-m-d"));
					$day = date('l', $timestamp);
				
					switch ($day) {
						case "Monday":
						$day = "Понеделник";
						break;
						case "Tuesday":
						$day = "Вторник";
						break;
						case "Wednesday":
						$day = "Сряда";
						break;
						case "Thursday":
						$day = "Четвъртък";
						break;	
						case "Friday":
						$day = "Петък";
						break;
						case "Saturday":
						$day = "Събота";
						break;	
						case "Sunday":
						$day = "Неделя";
						break;	
					}		
					echo' <li><img src="/images/arrow-left2.gif" width="50px" height="50px" class="btn_arrow" ><a href="javascript:void(0)" onclick="show_only(\'' . $dt->format("Y-m-d") . '\')">' . $dt->format("Y-m-d") . 'г.<br>'.$day.'</a></li>';
					
				}

				?>
				

			</ul>


			<table class="table table-bordered" id="program">
				<thead>
					<tr class="heading_program">
						<th>Заглавие</th>
						<th>Описание</th>
						<th>Часове на прожекция</th>
					</tr>
				</thead>
				<tbody>
				
					@foreach($screenings as $screening)
					<tr class="hover_program" data-status='{{$screening->date}}'>
                     

						<td class="title_program">
						<img onmouseover="javaimg()" class="hover_poster" src="{{url('/posters/'.$screening->cmMovie->poster)}}"  alt="movie poster" width="280" height="350px" /><br>{{$screening->cmMovie['title']}}</td>
					<td>
							<span class="trailer">
						<center>
							<iframe width="65%" height="300px" src="{{ $screening->cmMovie->trailer}}" frameborder="1" allowfullscreen></iframe>
						</center>
							</span>
						<div class="desc">
						
						<p>{{mb_substr($screening->cmMovie['description'],0,200)}}...<a href="">още</a></p>
						<p>@if($screening->cmMovie['translation'] == 'subtitles')
                        Версия : Субтитри
                        @else
                        Версия : БГ Аудио
                        @endif
                         / {{$screening->cmMovie['video_format']}}
						</p>
						</div>
					</td>
					<td>
						<p>
							<a href="{{ url('/reservation'.$screening->id ) }}">| {{substr($screening->hour,0,5)}} |<br> цена : <br> | {{number_format($screening->price,2)}}.лв |</a>
						</p>
					</td>
						</tr>

						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
	<script type="text/javascript">
		$( document ).ready(function() {
			$('.hover_program').fadeOut();
			$('.heading_program').fadeOut();
			$('#trailers').css("display","none");
		});
		function show_only(filter){
			$('.heading_program').slideDown("slow");
			$('.hover_program').fadeOut();
            $('.btn_arrow').fadeOut();



			if (filter=='') 
			{
				$('.heading_program').slideDown("slow");
				$('.hover_program').fadeIn();


			}
			else
			{ 
				$('*[data-status="'+filter+'"]').fadeIn(); 
			}
		}
		function show_trailer(){
			$('.item').fadeOut();
			$('#trailers').css("display","inline-block");
			$( "#trailers" ).animate({
				width: "70%",
				opacity: 1.00,
				marginLeft: "0.6in",
				fontSize: "3em",
				borderWidth: "10px"
			}, 1500 );

		}

	</script>
	<script>
		$(document).ready(function() {
			$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>

	@endsection