<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBid;
use IBidRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    protected $bidRepository;

    public function __construct(IBidRepository $bidRepository)
    {
        $this->middleware('auth');
        $this->bidRepository = $bidRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBids = $this->bidRepository->getAllBids();
        return view('bid.indexbid')->with(['allBids' => $allBids]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bid.createbid');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBid  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBid $request)
    {
        $this->bidRepository->storeBid($request->input(), Auth::id());
        return redirect('/')->with('success', 'Заявка отправлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bid = $this->bidRepository->getBidById($id);
        return redirect()->route('bid.indexbid', ['bid' => $bid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
