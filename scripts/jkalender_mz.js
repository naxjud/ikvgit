$(document).ready(function(){
	var month;
	var year;
	var aktdate=new Date();
	var j = aktdate.getFullYear();
	var m = aktdate.getMonth();
	var d = aktdate.getDay();

	month=m+1;
	year=j;

	//alert(Easter(2015));
	// alert(month+" "+year);

	$('#monat option:eq('+m+')').prop('selected', true);
	$('#jahr').val(year);


	$(".kalender tbody").html(drawMonth(month,year));

	/*Wenn Monat geändert*/
	$('#monat').change(function() {
		month=this.value;
		$(".kalender tbody").html(drawMonth(month,year));
	})

	/*Function um den Submit nicht lassen*/
	$( "#daten").submit(function( event ) {
		event.preventDefault();
	});

	$('#jahr').change(function() {
		year=this.value;
		$('#jahr').val(year);
		$(".kalender tbody").html(drawMonth(month,year));
	})

	function refreshKal(month, year){
		$(".kalender tbody").html(drawMonth(month,year));
	}

	$('#cal td').hover(function() {
		$(this).addClass('hover');
	}, function() {
		$(this).removeClass('hover');
	});

}); 

//var day_name = array('So.','Mo.','Di.','Mi.','Do.','Fr.','Sa.');
//var month_name = array('Januar','Februar','M&auml;rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember');

function daysInMonth(month,year) {
	return new Date(year, month, 0).getDate();
}

function drawMonth(month, year){
	var date = new Date(year,month,0);
	var firstDay = new Date(date.getFullYear(), date.getMonth(), 1).getDay();
	var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDay();

	var days_in_month=daysInMonth(month, year);
	var tageImMonat=days_in_month;
	var kalendertabelle;
	var leerZeilen=0;
	var wochenTage=7;

	kalendertabelle="<tr>";

	switch(firstDay){
		case 0:leerZeilen=6;break;
		case 1:leerZeilen=0;break;
		case 2:leerZeilen=1;break;
		case 3:leerZeilen=2;break;
		case 4:leerZeilen=3;break;
		case 5:leerZeilen=4;break;
		case 6:leerZeilen=5;break;
		default:;
	}
	
	wochenTage=wochenTage-leerZeilen;

	//alert(month);

	/*zeichne erstmal die */

	for(var i=1; i<=leerZeilen;i++)
	{
		kalendertabelle+='<td class="leer"></td>';
	}

	for(var i=1; i<=days_in_month;i++)
	{
		// tageImMonat--;
		//alert(padout(i)+''+padout(month))
		ft=feiertag(padout(i),padout(month));
		var ft=(ft==='x')?'':'<div style="height:20px; width:100%;background-color:DodgerBlue; color:white; ">'+ft+'</div>';

		if(wochenTage==1 || wochenTage==2){
			kalendertabelle+='<td class="we">'+ft+'<span class="daynumber">'+i+'</span></td>';
		}else{
			kalendertabelle+='<td class="nd">'+ft+'<span class="daynumber">'+i+'</span></td>';
		}
		wochenTage--;

		if(wochenTage==0){
			wochenTage=7;
			kalendertabelle+='</tr><tr>';
		}
	}
	for(;wochenTage>0;wochenTage--){
		kalendertabelle+='<td class="leer"></td>';
	}

	kalendertabelle+='</tr>';

	return kalendertabelle;

}

/*Ostertag ermittln*/
function Easter(Y) {
	var C = Math.floor(Y/100);
	var N = Y - 19*Math.floor(Y/19);
	var K = Math.floor((C - 17)/25);
	var I = C - Math.floor(C/4) - Math.floor((C - K)/3) + 19*N + 15;
	I = I - 30*Math.floor((I/30));
	I = I - Math.floor(I/28)*(1 - Math.floor(I/28)*Math.floor(29/(I + 1))*Math.floor((21 - N)/11));
	var J = Y + Math.floor(Y/4) + I + 2 - C + Math.floor(C/4);
	J = J - 7*Math.floor(J/7);
	var L = I - J;
	var M = 3 + Math.floor((L + 40)/44);
	var D = L + 28 - 31*Math.floor(M/4);

	return padout(M) + padout(D);
}
/*Datum format mit einer Führenden Null */
function padout(number) { 
	return (number < 10) ? '0' + number : number; 
}

/*Feiertag für ein bestimmtes Datum ermittlen*/
function feiertag (tag, monat) {

	// $easter_d = date("d", easter_date($datum[0]));
	// $easter_m = date("m", easter_date($datum[0]));

	// $status = 'Arbeitstag';
	// if ($datum_arr['wday'] == 0 || $datum_arr['wday'] == 6) $status = 'Wochenende';
	
	// die Variabel mt beinhaltet das String monat tag in der Form 0101 wobei monat als erstes Kommt Englisches Format
	var mt=monat+''+tag;
	//alert(mt);

	switch(mt){
		case '0101':return 'Neujahr';break;
	  	case '0106':return 'Hg. 3 K&ouml;nige';break;
	  	case '0501':return 'Tag der Arbeit';break;
	  	case '1101':return 'Allerheiligen';break;
	  	case '1225':return '1. Weinachtstag';break;
	  	case '1226':return '2. Weinachtstag';break;
	  	default: return 'x';break;
	}
	
	
	// elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d-2,$datum[0]))) {
	// 	return 'Karfreitag';
	// }elseif ($datum[1].$datum[2] == $easter_m.$easter_d) {
	// 	return 'Ostersonntag';
	// } elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d+1,$datum[0]))) {
	// 	return 'Ostermontag';
	// } elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d+39,$datum[0]))) {
	// 	return 'Christi Himmelfahrt';
	// } elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d+49,$datum[0]))) {
	// 	return 'Pfingstsonntag';
	// } elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d+50,$datum[0]))) {
	// 	return 'Pfingstmontag';
	// } elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d+60,$datum[0]))) {
	// 	return 'Fronleichnam';
	// } 
}