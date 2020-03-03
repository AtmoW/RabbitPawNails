<?php

namespace User;

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Admin\DataBase;

class Calendar
{
    public static function createMonths()
    {
       $thisMonth= (int)date('n');
       $thisYear = (int)date('Y');
       $thisMonthDays = (int)cal_days_in_month(CAL_GREGORIAN, $thisMonth, $thisYear);

        $_monthsList = array(
            "1" => "Январь",
            "2" => "Февраль",
            "3" => "Март",
            "4" => "Апрель",
            "5" => "Май",
            "6" => "Июнь",
            "7" => "Июль",
            "8" => "Август",
            "9" => "Сентябрь",
            "10" => "Октябрь",
            "11" => "Ноябрь",
            "12" => "Декабрь"
        );

       if($thisMonth != 1 || $thisMonth != 12){
           $nextMonth = $thisMonth + 1;
           $prevMonth =  $thisMonth - 1;
           $prevYear = $thisYear;
           $nextYear = $thisYear;
           $nextMonthDays = (int)cal_days_in_month(CAL_GREGORIAN, $nextMonth, $thisYear);
           $prevMonthDays = (int)cal_days_in_month(CAL_GREGORIAN, $prevMonth, $thisYear);
       }
       elseif ($thisMonth == 1){
           $nextMonth = $thisMonth + 1;
           $prevMonth =  12;
           $prevYear = $thisYear;
           $nextYear = $thisYear - 1;
           $nextMonthDays = (int)cal_days_in_month(CAL_GREGORIAN, $nextMonth, $thisYear);
           $prevMonthDays = (int)cal_days_in_month(CAL_GREGORIAN, $prevMonth, $thisYear - 1);
       }
       elseif ($thisMonth == 12){
           $nextMonth = 1;
           $prevMonth =  $thisMonth - 1;
           $prevYear = $thisYear + 1;
           $nextYear = $thisYear;
           $nextMonthDays = (int)cal_days_in_month(CAL_GREGORIAN, $nextMonth, $thisYear + 1);
           $prevMonthDays = (int)cal_days_in_month(CAL_GREGORIAN, $prevMonth, $thisYear);
       }


       $c = [
           "PrevMonthNumber" => "0".$prevMonth,
           "ThisMonthNumber" => "0".$thisMonth,
           "NextMonthNumber" => "0".$nextMonth,
           "ThisMonth" => $_monthsList[$thisMonth],
           "NextMonth" => $_monthsList[$nextMonth],
           "PrevMonthDays" => $prevMonthDays,
           "ThisMonthDays" => $thisMonthDays,
           "NextMonthDays" => $nextMonthDays,
           "PrevYear" => $prevYear,
           "ThisYear" => $thisYear,
           "NextYear" => $nextYear
       ];

       $w = DataBase::select('weekends');
       $weekends = [];
       foreach ($w as $value){
           $date = explode('-',$value['date']);

           $value['year'] = $date[0];
           $value['day'] = $date[2];
           $value['month'] = $date[1];

           $weekends[(int)$value['year']][(int)$value['month']][] = (int)$value['day'];
       }

       $c['weekends'] = $weekends;

       return $c;
    }


}