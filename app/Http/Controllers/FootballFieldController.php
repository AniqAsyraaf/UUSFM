<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class FootballFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchDate = request('searchDate');
        $sessionType = 'FootballField';
        
        if(request('searchDate'))
        {
            return view('Session/FootballField/Index', ['sessions' => Session::where('sessionType', $sessionType)->where('sessionDate',$searchDate )->orderBy('sessionDate', 'DESC')->paginate(10)]);
        }
        else
        {
                return view('Session/FootballField/Index', ['sessions' => Session::where('sessionType', $sessionType)->orderBy('sessionDate', 'DESC')->paginate(10)]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Session/FootballField/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request ->validate([
            'monday' => 'required',
            'sessionStatusMon' => 'required',
            'tuesday' => 'required',
            'sessionStatusTue' => 'required',
            'wednesday' => 'required',
            'sessionStatusWed' => 'required',
            'thursday' => 'required',
            'sessionStatusThu' => 'required',
            'friday' => 'required',
            'sessionStatusFri' => 'required',
            'saturday' => 'required',
            'sessionStatusSat' => 'required',
            'sunday' => 'required',
            'sessionStatusSun' => 'required',
        ]);


        $timestamp = strtotime('08:00');

        $time = date('H:i:s', $timestamp);
        $exp=0;
        while($exp<=1){
            $validateData2 = [
                'sessionDate' => $validateData['sunday'],
                'sessionTime' => $time,
                'sessionCapacity' => 0,
                'sessionGuestCap' => 1,
                'sessionDesc' => 'Football Session',
                'sessionType' => 'FootballField',
                'sessionStatus' => $validateData['sessionStatusSun'],
                'mcID' => auth()->user()->id,
                'sessionDay' => 'Sunday',
            ];

            //dd($validateData2);
            Session::create($validateData2);
            $timestamp = $timestamp + 60*60*12;
            $time = date('H:i:s', $timestamp);
            $exp++;
        } 

        $timestamp = strtotime('08:00');

        $time = date('H:i:s', $timestamp);
        $exp=0;
        while($exp<=1){
            $validateData2 = [
                'sessionDate' => $validateData['saturday'],
                'sessionTime' => $time,
                'sessionCapacity' => 0,
                'sessionGuestCap' => 1,
                'sessionDesc' => 'Football Session',
                'sessionType' => 'FootballField',
                'sessionStatus' => $validateData['sessionStatusSat'],
                'mcID' => auth()->user()->id,
                'sessionDay' => 'Saturday',
            ];

            //dd($validateData2);
            Session::create($validateData2);
            $timestamp = $timestamp + 60*60*12;
            $time = date('H:i:s', $timestamp);
            $exp++;
        }

        $timestamp = strtotime('08:00');

        $time = date('H:i:s', $timestamp);
        $exp=0;
        while($exp<=1){
            $validateData2 = [
                'sessionDate' => $validateData['friday'],
                'sessionTime' => $time,
                'sessionCapacity' => 0,
                'sessionGuestCap' => 1,
                'sessionDesc' => 'Football Session',
                'sessionType' => 'FootballField',
                'sessionStatus' => $validateData['sessionStatusFri'],
                'mcID' => auth()->user()->id,
                'sessionDay' => 'Friday',
            ];

            //dd($validateData2);
            Session::create($validateData2);
            $timestamp = $timestamp + 60*60*12;
            $time = date('H:i:s', $timestamp);
            $exp++;
        }

        $timestamp = strtotime('08:00');

        $time = date('H:i:s', $timestamp);
        $exp=0;
        while($exp<=1){
            $validateData2 = [
                'sessionDate' => $validateData['thursday'],
                'sessionTime' => $time,
                'sessionCapacity' => 0,
                'sessionGuestCap' => 1,
                'sessionDesc' => 'Football Session',
                'sessionType' => 'FootballField',
                'sessionStatus' => $validateData['sessionStatusThu'],
                'mcID' => auth()->user()->id,
                'sessionDay' => 'Thursday',
            ];

            //dd($validateData2);
            Session::create($validateData2);
            $timestamp = $timestamp + 60*60*12;
            $time = date('H:i:s', $timestamp);
            $exp++;
        }

        $timestamp = strtotime('08:00');

        $time = date('H:i:s', $timestamp);
        $exp=0;
        while($exp<=1){
            $validateData2 = [
                'sessionDate' => $validateData['wednesday'],
                'sessionTime' => $time,
                'sessionCapacity' => 0,
                'sessionGuestCap' => 1,
                'sessionDesc' => 'Football Session',
                'sessionType' => 'FootballField',
                'sessionStatus' => $validateData['sessionStatusWed'],
                'mcID' => auth()->user()->id,
                'sessionDay' => 'Wednesday',
            ];

            //dd($validateData2);
            Session::create($validateData2);
            $timestamp = $timestamp + 60*60*12;
            $time = date('H:i:s', $timestamp);
            $exp++;
        }

        $timestamp = strtotime('08:00');

        $time = date('H:i:s', $timestamp);
        $exp=0;
        while($exp<=1){
            $validateData2 = [
                'sessionDate' => $validateData['tuesday'],
                'sessionTime' => $time,
                'sessionCapacity' => 0,
                'sessionGuestCap' => 1,
                'sessionDesc' => 'Football Session',
                'sessionType' => 'FootballField',
                'sessionStatus' => $validateData['sessionStatusTue'],
                'mcID' => auth()->user()->id,
                'sessionDay' => 'Tuesday', 
            ];

            //dd($validateData2);
            Session::create($validateData2);
            $timestamp = $timestamp + 60*60*12;
            $time = date('H:i:s', $timestamp);
            $exp++;
        }

        $timestamp = strtotime('08:00');

        $time = date('H:i:s', $timestamp);
        $exp=0;
        while($exp<=1){
            $validateData2 = [
                'sessionDate' => $validateData['monday'],
                'sessionTime' => $time,
                'sessionCapacity' => 0,
                'sessionGuestCap' => 1,
                'sessionDesc' => 'Football Session',
                'sessionType' => 'FootballField',
                'sessionStatus' => $validateData['sessionStatusMon'],
                'mcID' => auth()->user()->id,
                'sessionDay' => 'Monday',  
            ];

            //dd($validateData2);
            Session::create($validateData2);
            $timestamp = $timestamp + 60*60*12;
            $time = date('H:i:s', $timestamp);
            $exp++;
        }
        
        return redirect('/FootballField')->with('success', 'New sessions has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $rules = [
            'sessionStatus' => 'required'
        ];

        
        $validateData = $request->validate($rules);
        
        // dd($validateData);
        Session::where('id', $id) 
            ->update($validateData);

        return redirect('/FootballField')->with('success', 'Session has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
