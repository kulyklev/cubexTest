<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 04.07.18
 * Time: 18:14
 */

interface IBidRepository{
    public function storeBid(array $data, $userId);

    public function getBidById($bidId);

    public function getAllBids();

    public function markAsViewed($bidId);
}