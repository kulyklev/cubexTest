<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 04.07.18
 * Time: 18:13
 */

namespace App\Repositories;


use App\Models\Bid;

class BidRepository implements IBidRepository
{
    protected $bid;

    public function __construct(Bid $bid)
    {
        $this->bid = $bid;
    }

    public function storeBid(array $data, $userId)
    {
        $newBid = new Bid();
        $newBid->user_id = $userId;
        $newBid->theme = $data['messageTheme'];
        $newBid->message = $data['message'];
        $newBid->file = array_key_exists('file', $data) == true  ? $data['contingent'] : null;
        $newBid->save();
    }

    public function getBidById($bidId)
    {
        return Bid::find($bidId);
    }

    public function getAllBids()
    {
        return Bid::all();
    }

    public function markAsViewed($bidId)
    {
        $bid = Bid::find($bidId);
        $bid->isViewed = true;
        $bid->save();
    }
}