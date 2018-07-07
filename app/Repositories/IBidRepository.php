<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 04.07.18
 * Time: 18:14
 */

namespace App\Repositories;

interface IBidRepository{
    public function storeBid(array $data, $userId, $filePath);

    public function getBidById($bidId);

    public function getAllBids();

    public function markAsViewed($bidId);

    public function getLatestUserBid($userId);
}