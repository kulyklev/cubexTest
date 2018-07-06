<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBid;
use App\Mail\mailToAdmin;
use App\Models\Bid;
use App\Repositories\IBidRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BidController extends Controller
{
    protected $bidRepository;

    /**
     * Constructor of BidController.
     *
     * @param  \App\Repositories\IBidRepository $bidRepository
     *
     */
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
        if(Gate::allows('adminAction')){
            $allBids = $this->bidRepository->getAllBids();
            return view('bid.indexbid')->with(['bids' => $allBids]);
        } else {
            return redirect('/')->with('error', 'You cannot view all bids');
        }
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
        $bid = $this->bidRepository->storeBid($request->input(), Auth::id());
        Mail::to($request->user())->queue(new mailToAdmin($bid));
        return redirect('/')->with('success', 'Заявка отправлена');
    }

    /**
     * Making request to send email
     *
     * @param $bid
     */
    private function sendEmail($bid){

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Gate::allows('adminAction')){
            $bid = $this->bidRepository->getBidById($id);
            return view('bid.showbid', ['bid' => $bid]);
        } else {
            return redirect('/')->with('error', 'You cannot view this bid');
        }
    }

    /**
     * Mark the specified bid as viewed.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function markAsViewed(Request $request, $bidId)
    {
        if(Gate::allows('adminAction')){
            $this->bidRepository->markAsViewed($bidId);
            return redirect()->route('bid.index')->with('success', 'Сообщение отмечено прочитанным');
        }
        else
            return redirect('/')->with('error', 'You cannot perform this action');
    }
}
