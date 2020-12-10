<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Acaronlex\LaravelCalendar\Facades\Calendar;
use App\Jadwal;
use App\Menu;

class CalendarController extends Controller
{
    public function index()
    {
        $url = env('APP_URL');
        $jadwal = Jadwal::all();
        $events = [];

        foreach ($jadwal as $j) {
            $events[] = \Calendar::event(
                $j->menu->nama, //event title
                true, //full day event?
                new \DateTime($j->tanggal), //start time (you can also use Carbon instead of DateTime)
                new \DateTime($j->tanggal), //end time (you can also use Carbon instead of DateTime)
                $j->id, //optionally, you can specify an event ID
                [
                    'url' => '#',
                    //any other full-calendar supported parameters
                ]
            );
        }




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
            'eventClick' => "function(info){ 
              
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name=csrf-token]').attr('content')
                    }
                });
                $.ajax({
                url: 'http://kiddos-catering.herokuapp.com/ajax',
                data: {
                    id: info.event.id
                },
                method: 'post',
        
                success: function (data) {
                    $('.content-menu').html(data);
                    $('#myModal').modal({show:true});
                }
            })
            }",
            'eventContent' => "function(){
            
                
            }"
        ]);

        return view('calendar', compact('calendar'));
    }

    public function ajax()
    {
        if (request()->ajax()) {
            $id = request()->get('id');
            $jadwal = Jadwal::find($id);
            return view('ajax.jadwal-modal', compact('jadwal'));
        }
    }
}
