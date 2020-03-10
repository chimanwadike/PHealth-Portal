<?php

function shortText($text, $length = 40, $end = "...")
{
	return Str::limit($text, $length, $end);
}

function mediumText($text, $length = 60, $end = "...")
{
	return Str::limit($text, $length, $end);
}

function longText($text, $length = 80, $end = "...")
{
	return Str::limit($text, $length, $end);
}

function getMonth($number)
{
	$dateObj = DateTime::createFromFormat('!m', $number); 
	$monthName = $dateObj->format('F'); 
	return $monthName;  
}

function getWeekDates($date, $start_date, $end_date) {
    $week =  date('W', strtotime($date));
    $year =  date('Y', strtotime($date));
    $from = date("Y-m-d", strtotime("{$year}-W{$week}+1")); //Returns the date of monday in week

    if($from < $start_date) 
    	$from = $start_date;

    $to = date("Y-m-d", strtotime("{$year}-W{$week}-7"));   //Returns the date of sunday in week

    if($to > $end_date) 
    	$to = $end_date;

    return [$from, $to];
} 

function getMonthDates($dt) {
    $from = date("Y-m-01", strtotime($dt));
    $to = date("Y-m-t", strtotime($dt)); 

    return [$from, $to];
}