<?php
    /*
        date_gen - php script that generate dates in user specified format from user specified range

        @author ikenfin (ikenfin@gmail.com)
        2016
    */

    // options
    $short = array(
        'b:',   // start of interval
        'e:',   // end of interval
        'f:',   // format (Y.m.d)
        'h'     // show help screen
    );

    $options = getopt(implode('', $short));

    $format = 'Y.m.d';
    $begin_date = null;
    $end_date = null;

    foreach($options as $option => $value) {
        switch($option) {
            case 'b' :
                $begin_date = $value;
                break;
            case 'e' :
                $end_date = $value;
                break;
            case 'f' :
                $format = $value;
                break;
            case 'h' :
                echo "Date list generator" . PHP_EOL . PHP_EOL;
                echo "Usage:" . PHP_EOL;
                echo "php " . basename(__FILE__) . " [options]" . PHP_EOL;
                echo PHP_EOL;
                echo "Options:" . PHP_EOL;
                echo "\t-b - begin of date interval (default 1970.01.01)" .PHP_EOL;
                echo "\t-e - end of date interval (default: " . date("Y") . ".12.31)" .PHP_EOL;
                echo "\t-f - input/output date format (default: 'Y.m.d')" .PHP_EOL;
                exit(0);
        }
    }

    if($begin_date === null) {
        $begin_date = date($format, 1);
    }
    if($end_date === null) {
        $end_date = date($format, mktime(0, 0, 0, 12, 31, date('Y')));
    }

    $begin_datetime = DateTime::createFromFormat($format, $begin_date);
    $end_datetime = DateTime::createFromFormat($format, $end_date);

    $start_year = intval($begin_datetime->format('Y'));
    $end_year = intval($end_datetime->format('Y'));

    $start_day = 1;
    $end_day = 31;
    
    $start_month = 1;
    $end_month = 12;

    $year = $start_year;
    $month = $start_month;
    $day = $start_day;

    while($year <= $end_year) {
        $month = $start_month;
        
        if($year == $begin_datetime->format('Y')) {
            $month = $begin_datetime->format('m');
        }
        if($year == $end_datetime->format('Y')) {
            $end_month = $end_datetime->format('m');
        }

        while($month <= $end_month) {
            if($begin_datetime->format('Y') == $start_year
                && $begin_datetime->format('m') == $month) {
                $day = intval($begin_datetime->format('d'));
            }
            else $day = $start_day;

            $end_day = date('t', mktime(0, 0, 0, $month, $day, $year));

            while($day <= $end_day) {
                echo date($format, mktime(0, 0, 0, $month, $day, $year)) . PHP_EOL;

                if($year == $end_datetime->format('Y')
                        && $month == $end_datetime->format('m')
                        && $day == $end_datetime->format('d')
                )
                    exit(0);
                $day++;
            }
            $month++;
        }
        $year++;
    }
