@extends('cinema.home') 
@section('title', 'Контакти')
@section('content') 

<!-- faq-banner -->
	<div class="faq">
		<h4 class="latest-text w3_faq_latest_text w3_latest_text">FAQ</h4>
			<div class="container">
				<div class="panel-group w3l_panel_group_faq" id="accordion" role="tablist" aria-multiselectable="true">
				  <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
					  <h4 class="panel-title asd">
						<a class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Къде се намираме 
						</a>
					  </h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
					  <div class="panel-body panel_text">
						Киното се намира на улица ул. Петропавловска №43 3000 Враца/ етаж - 2
					  </div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
					  <h4 class="panel-title asd">
						<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Работно време
						</a>
					  </h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
					   <div class="panel-body panel_text">
						Работното време на киното е от: 07:00. до: 00:00ч.
					  </div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingThree">
					  <h4 class="panel-title asd">
						<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Как става запазването на билети през сайта
						</a>
					  </h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
					   <div class="panel-body panel_text">
						Запазването на билет през сайта става по следния начин:
						Избираш си прожекция на филм, от програмата която е за седмицата, след това избираш колко билета желаеш да запазиш, след което се показва
						картата на кино салона, и ти избираш мястото/местата които желаеш, от страни ще се обновява информация в реално време за избраните места
						и парите които се дължат, след избора местата се запазват в потребителския ти профил, с уникален код за всяко място за дадената прожекция,
						след което на място в киното се показва кода и мястото се купува на място.Резарвацията за билети ще се пази 15мин.(30мин.) преди дадената 
						прожекция, след което ще стане невалидна.При 5 невалидни резервации на акаунта ще се забрани за определен период запазването на билети.
						/* за да резервираш трябва да си регистриран в сайта */
					  </div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingFour">
					  <h4 class="panel-title asd">
						<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Къде да видим
						  за предстоящи филми
						</a>
					  </h4>
					</div>
					<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
					   <div class="panel-body panel_text">
						На първата страница има прозорец, в който излизат филмите които предстоят да се пускат в киното.....
					  </div>
					</div>
				  </div>
				   <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingFive">
					  <h4 class="panel-title asd">
						<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Къде е програмата
						</a>
					  </h4>
					</div>
					<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
					   <div class="panel-body panel_text">
						На първата страница на сайта, има програма за дни, като програмата се обновява седмица за седмица .....
					  </div>
					</div>
				  </div>
				   <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingSix">
					  <h4 class="panel-title asd">
						<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Може ли да видим снимки от салона 
						</a>
					  </h4>
					</div>
					<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
					   <div class="panel-body panel_text">
						Ето снимки от салона : 
						<img src="{{ url('/images/banner2.jpg') }}" title="" class="img-responsive" alt="poster" width="200px" height="200px" /><img src="{{ url('/images/banner2.jpg') }}" title="" class="img-responsive" alt="poster" width="200px" height="200px" /><br>
						
						<img src="{{ url('/images/banner2.jpg') }}" title="" class="img-responsive" alt="poster" width="200px" height="200px" />
					
						
					  </div>
					</div>
				  </div>
				   <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingSeven">
					  <h4 class="panel-title asd">
						<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Може ли на място да се закупят напитки и пуканки
						</a>
					  </h4>
					</div>
					<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
					   <div class="panel-body panel_text">
						Киното разполага с богата гама от напитки и храни .........
					  </div>
					</div>
				  </div>
				   <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingEight">
					  <h4 class="panel-title asd">
						<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Могат ли да се закупят 3D очила в киното
						</a>
					  </h4>
					</div>
					<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
					   <div class="panel-body panel_text">
						Очилата са на стойност 1.99 лв. ако нямате ваши или сте ги забравили винаги можете да си закупите на място....
					  </div>
					</div>
				  </div>
				   <div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingNine">
					  <h4 class="panel-title asd">
						<a class="pa_italic collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i class="glyphicon glyphicon-minus" aria-hidden="true"></i>Може ли да си носим храна в салона 
						</a>
					  </h4>
					</div>
					<div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
					   <div class="panel-body panel_text">
						Забранено е внасянето на храни и напитки, които не са закупени на място
					  </div>
					</div>
				  </div>
				</div>
			</div>
	</div>
<!-- //faq-banner -->




@endsection