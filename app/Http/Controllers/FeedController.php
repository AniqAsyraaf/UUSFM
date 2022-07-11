<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Feed::all();
        // return view('Feed/Index', ['feeds' => $data]);

        $searchID = request('searchID');
        $searchCategory = request('searchCategory');
        
        if(request('searchID') && (request('searchCategory') != ""))
        {
            return view('Feed/Index', ['feeds' => Feed::where('feedTitle', 'LIKE', "%{$searchID}%" )->where('feedCategory', $searchCategory )->orderBy('created_at', 'DESC')->paginate(9)]);
        }
        elseif(request('searchID') && (request('searchCategory') == ""))
        {   
            //dd($searchCategory);
            return view('Feed/Index', ['feeds' => Feed::where('feedTitle', 'LIKE', "%{$searchID}%" )->orderBy('created_at', 'DESC')->paginate(9)]);
        }
        elseif(!request('searchID') && (request('searchCategory') != ""))
        {
            return view('Feed/Index', ['feeds' => Feed::where('feedCategory', $searchCategory )->orderBy('created_at', 'DESC')->paginate(9)]);
        }
        else
        {
            // dd($searchCategory);
            return view('Feed/Index', ['feeds' => Feed::orderBy('created_at', 'DESC')->paginate(9)]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/Feed/Create');
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
            'feedTitle' => 'required|max:255',
            'feedCategory' => 'required',
            'feedDesc' => 'required|max:255'
        ]);

        $validateData['feedDesc'] = strip_tags($request->feedDesc);

        // $validateData['excerpt'] = Str::limit(strip_tags($request->description), 200);

        Feed::create($validateData);
        return redirect('/Feed')->with('success', 'New feed has been added');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function show(Feed $feed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $feed = Feed::find($id);
        //($feed);
        return view('/Feed/Edit', [
            'feed' => $feed
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $rules = [
            'feedTitle' => 'required|max:255',
            'feedCategory' => 'required',
            'feedDesc' => 'required|max:255',
            'id' => 'required'
        ];

        
        $validateData = $request->validate($rules);
        $validateData['feedDesc'] = strip_tags($request->feedDesc);
        // $validateData['excerpt'] = Str::limit(strip_tags($request->description), 200);
        //dd($request);
        Feed::where('id', $id) 
            ->update($validateData);

        return redirect('/Feed')->with('success', 'Feed has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        // dd($ID);
        // Feed::where('feedID', $ID)->delete();
        Feed::destroy($ID);

        return redirect('/Feed')->with('success', 'Feed has been deleted!');
    }
}
