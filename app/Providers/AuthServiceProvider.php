<?php

namespace App\Providers;

use App\Models\Bid;
use App\Repositories\BidRepository;
use DateTime;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('adminAction', function ($user) {
            return $user->isAdmin;
        });

        Gate::define('makeBid', function ($user) {
            $bidRepository = new BidRepository(new Bid());
            $latestBid = $bidRepository->getLatestUserBid($user->id);
            if($latestBid != null){
                $dateTimestamp1 = new DateTime($latestBid->created_at);
                $now = new DateTime();
                $canMakeBid = $dateTimestamp1->diff($now)->days >= 1 ? true : false;
                return $canMakeBid;
            }
            else
                return true;
        });
    }
}
