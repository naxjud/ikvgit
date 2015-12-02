<?php
/* draws a calendar */
require('feiertage.php');

function draw_calendar($month,$year){
    
    $day_name = array('So.','Mo.','Di.','Mi.','Do.','Fr.','Sa.');
    $month_name = array('Januar','Februar','M&auml;rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember');
    
    $calendar ='<div class="Table">';    
    $calendar .='<div class="Title"><img class="header_logo" alt="ikv-mainz e.V." src="images/ikvlogo.png" height="150px"><p>IKV-Jahresplan '.$year.'</p></div>';
    $calendar .='<div class="Heading"><div class="Cell"><p class="month_name">'.implode('</p></div><div class="Cell"><p class="month_name">',$month_name).'</p></div></div>';

   
    $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
    $days_in_this_week = 1;
    $day_counter = 0;
    $feiertage = array();
    $days_in_months=array();
    $weekNr=0;
    
    for($i=1; $i <= 12;$i++){
       $days_in_months[$i]=date('t',mktime(0,0,0,$i,1,$year));;
    }
    for($j=1;$j<32;$j++){
        $calendar .='<div class="Row">';
        for($i=1; $i < 13;$i++){
            $current_month=$i;
            if($j <= $days_in_months[$i]){
                $running_day = date('w',mktime(0,0,0,$i,$j,$year));
                
                $ft = feiertag($year.'-'.$i.'-'.$j,'noe');
        
                if($running_day==6 || $running_day==0){
                    $calendar .= '<div class="weCell">';                    
                    $calendar .='<p class="we">'.$j.'</p>'.'<p class="day_name">'.$day_name[$running_day].'</p>'.'<p class="we"><div style="width:10px;height:10px;background-color:red"></div><div style="width:10px;height:10px;background-color:green"></div></p>';                
                }
                else {
                    $calendar .= '<div class="Cell">';
                    $calendar .='<p class="day_nr">'.$j.'</p>'.'<p class="day_name">'.$day_name[$running_day].'</p>';
                    if(($i==1 && $j==1) || $running_day==1){
                        $date  = mktime(0, 0, 0, $i, $j, $year);
                        $weekNr  = (int)date('W', $date);
                        $calendar .='<div class="weeknr">'.$weekNr.'</div>';
                    }
                }
                if ($ft != 'Arbeitstag' && $ft != 'Wochenende' && $ft !=''){
                    $calendar .='<span class="feiertag">'.$ft.'</span>';
                }
                $calendar .='</div>';
            }
            else{
                $calendar .= '<div class="emptyCell"></div>';
            }
        }
        $calendar .='</div>';
    }   
    /* all done, return result */
    return $calendar;
}
