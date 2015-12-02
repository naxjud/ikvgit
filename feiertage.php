
<?php
error_reporting(E_ALL);
/**
 * Ermittle Feiertage, Arbeitstage und Wochenenden von einem Datum
 *
 * @param string $datum im Format YYYY-MM-DD
 * @param string $bundesland
 * @return string
 */
function feiertag ($datum,$bundesland='') {

    $datum = explode("-", $datum);

    $datum[1] = str_pad($datum[1], 2, "0", STR_PAD_LEFT);
    $datum[2] = str_pad($datum[2], 2, "0", STR_PAD_LEFT);

    if (!checkdate($datum[1], $datum[2], $datum[0])) return false;

    $datum_arr = getdate(mktime(0,0,0,$datum[1],$datum[2],$datum[0]));

    $easter_d = date("d", easter_date($datum[0]));
    $easter_m = date("m", easter_date($datum[0]));

    $status = 'Arbeitstag';
    if ($datum_arr['wday'] == 0 || $datum_arr['wday'] == 6) $status = 'Wochenende';

    if ($datum[1].$datum[2] == '0101') {
        return 'Neujahr';
    } elseif ($datum[1].$datum[2] == '0106') {
        return 'Hg. 3 K&ouml;nige';
    } elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d-2,$datum[0]))) {
        return 'Karfreitag';
    }elseif ($datum[1].$datum[2] == $easter_m.$easter_d) {
        return 'Ostersonntag';
    } elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d+1,$datum[0]))) {
        return 'Ostermontag';
    } elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d+39,$datum[0]))) {
        return 'Christi Himmelfahrt';
    } elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d+49,$datum[0]))) {
        return 'Pfingstsonntag';
    } elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d+50,$datum[0]))) {
        return 'Pfingstmontag';
    } elseif ($datum[1].$datum[2] == date("md",mktime(0,0,0,$easter_m,$easter_d+60,$datum[0]))) {
        return 'Fronleichnam';
    } elseif ($datum[1].$datum[2] == '0501') {
        return 'Tag der Arbeit';
    } elseif ($datum[1].$datum[2] == '1101') {
        return 'Allerheiligen';
    } elseif ($datum[1].$datum[2] == '1225') {
        return '1. Weinachtstag';
    }elseif ($datum[1].$datum[2] == '1226') {
        return '2. Weinachtstag';
    } else {
        return $status;
    }

}

?>

