<?php

namespace Tests\Unit;

use App\Models\Bid;
use App\Repositories\BidRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BidRepositryTests extends TestCase
{
    /**
     * Testing BidRepository->storeBid().
     *
     * @test
     * @return void
     */
    public function testStoreBid()
    {
/*        $data = [
            'theme' => 'Theme',
            'message' => 'This is the body of message',
            //'file' => $faker->
        ];

        $bidRepository = new BidRepository(new Bid);
        $bid = $bidRepository->storeBid($data, 1);

        $this->assertInstanceOf(Bid::class, $bid);
        $this->assertEquals($data['id'], $bid->theme);
        $this->assertEquals($data['message'], $bid->message);
        $this->assertEquals($data['user_id'], $bid->user_id);*/
    }
}
