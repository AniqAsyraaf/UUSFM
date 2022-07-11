<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Session;
use App\Models\Customer;
use App\Models\Membership;
// use App\Http\Requests\StoreBookingRequest;
// use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datamembership = Membership::all();
        $datacustomer = Customer::all();
        // return view('Booking/Index', ['bookings' => $databooking], ['customers' => $datacustomer]);
   
        ['customers' => $datacustomer];
        ['memberships' => $datamembership];
        
        $searchID = request('searchID');
        if(request('searchID'))
        {
            return view('Booking/Index', ['bookings' => Booking::where('id',$searchID )->orderBy('bookDate', 'DESC')->paginate(9)])->with(['customers' => $datacustomer])->with(['memberships' => $datamembership]);
        }
        else
        {
                return view('Booking/Index', ['bookings' => Booking::orderBy('bookDate', 'DESC')->paginate(9)], )->with(['customers' => $datacustomer])->with(['memberships' => $datamembership]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request ->validate([
            'cName' => 'required',
            'phoneNum' => 'required',
            'id' => 'required',
            'sessionType' => 'required',
            'sessionDate' => 'required',
            'sessionTime' => 'required',
        ]);

        $session = Session::find($validateData['id']);
        // dd($session);
        $validateData2 = [
            'cName' => $validateData['cName'],
            'sessionID' => $validateData['id'],
            'sessionType' => $session['sessionType'],
            'bookDate' => $validateData['sessionDate'],
            'bookTime' => $validateData['sessionTime'],
            'phoneNum' => $validateData['phoneNum'],
            'bookAttendance' => '1',
            'bookingStatus' => 'Approved',
            // 'bookType' => 'Guest', DONT KNOW WHAT THIS FOR LOL
        ];

        $validateData3 = [
            'sessionCurrGuestCap' => $session['sessionCurrGuestCap']+1,
            // 'sessionCurrCap' => $session['sessionCurrCap']+1,
        ];

        // dd($validateData3);
        Booking::create($validateData2);

        Session::where('id', $validateData['id']) 
        ->update($validateData3);

        if($session['sessionType'] == "Gymnasium")
        {
            return redirect('/Gymnasium')->with('success', 'New guest has been added');
        }
        elseif($session['sessionType'] == "Stadium")
        {
            return redirect('/Stadium')->with('success', 'New guest has been added');
        }
        else
        {
            return redirect('/FootballField')->with('success', 'New guest has been added');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {  
        $session = Session::find($id);
        // dd($session);
        return view('/Booking/Create', ['session' => $session]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $booking = Booking::find($id);
        $membership = Membership::where('cID', $booking['cID'])->firstOrFail();

        // dd($membership['membershipEntry']);
        if($membership['membershipEntry'] > 0)
        {
            $validateData2 = [
                'membershipEntry' => $membership['membershipEntry']-1 
            ];

            Membership::where('id', $membership['id']) 
            ->update($validateData2);
        }

        $rules = [
            'toUpdate' => 'required',
            'toUpdateVar' => 'required'
        ];
        
        $validateData = $request->validate($rules);
        // dd($validateData);
        if($validateData['toUpdateVar'] == "bookingStatus")
        {
            $validateData2 = [
                'bookingStatus' => $validateData['toUpdate']
            ];
        }
        else
        {
            $validateData2 = [
                'bookAttendance' => $validateData['toUpdate']
            ];
        }
       

        // $validateData = $request->validate($rules);
        
        // dd($validateData2);
        Booking::where('id', $id) 
            ->update($validateData2);

        return redirect('/Booking')->with('success', 'Booking has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
