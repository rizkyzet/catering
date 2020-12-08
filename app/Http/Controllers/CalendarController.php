<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Acaronlex\LaravelCalendar\Facades\Calendar;

class CalendarController extends Controller
{
    public function index()
    {
        $events = [];



        $events[] = \Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            new \DateTime('2020-12-01'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2020-12-01'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId', //optionally, you can specify an event ID
            [
                'url' => '# ',

                //any other full-calendar supported parameters
            ]
        );
        $events[] = \Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            new \DateTime('2020-12-02'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2020-12-02'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId', //optionally, you can specify an event ID
            [


                //any other full-calendar supported parameters
            ]
        );



        $calendar = new \Calendar();
        $calendar::addEvents($events)
            ->setOptions([
                'locale' => 'id',
                'firstDay' => 0,
                'displayEventTime' => true,
                'selectable' => true,
                'initialView' => 'dayGridMonth',
                'headerToolbar' => [
                    'end' => 'prev,today,next'
                ],
                'buttonText' => [
                    'today' => 'Hari ini',
                    'month' => 'Bulan ini'
                ],
                // 'contentHeight' => 600,
                // 'eventDisplay' => 'block'
            ]);
        $calendar::setId('1');
        $calendar::setCallbacks([
            'select' => 'function(selectionInfo){}',
            'eventClick' => 'function(event){tes();}',
            'eventContent' => "function(){}"
        ]);

        return view('calendar', compact('calendar'));
    }
}
