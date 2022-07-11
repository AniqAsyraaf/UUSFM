<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Customer;
use App\Http\Requests\StoreMembershipRequest;
use App\Http\Requests\UpdateMembershipRequest;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datamembership = Membership::all();
        $datacustomer = Customer::all();
        // return view('Booking/Index', ['bookings' => $databooking], ['customers' => $datacustomer]);
   
        $searchID = request('searchID');
        if(request('searchID'))
        {
            return view('Membership/Index', ['memberships' => Membership::where('cID',$searchID )->orderBy('created_at', 'DESC')->paginate(9)], ['customers' => $datacustomer]);
        }
        else
        {
                return view('Membership/Index', ['memberships' => Membership::orderBy('created_at', 'DESC')->paginate(9)], ['customers' => $datacustomer]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMembershipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMembershipRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMembershipRequest  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $rules = [
            'membershipStatus' => 'required',
        ];
        
        $validateData = $request->validate($rules);
        // dd($validateData);
    
        Membership::where('id', $id) 
            ->update($validateData);

        return redirect('/Membership')->with('success', 'Membership has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        //
    }
}
