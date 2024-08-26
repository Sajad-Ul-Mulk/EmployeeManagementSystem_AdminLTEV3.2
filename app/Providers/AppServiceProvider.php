<?php

namespace App\Providers;


use App\Events\ApprovalGrantedEvent;
use App\Events\TaskApprovalCreationEvent;
use App\Listeners\ApprovalGrantedListener;
use App\Listeners\TaskApprovalCreationListener;
use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        Gate::define('isAdmin', function () {
            return (Auth::user()->role === 'admin');
        });

        Gate::define('isAuthor', function ($user,Task $task) {
            return ($user->id === $task->user_id);
        });

        Gate::define('view-approvals', function () {
            Auth::user()->role==='admin'
                ? Response::allow()
                : Response::deny(abort(403));
        });

        Gate::define('isDeveloper',function(){
           return Auth::user()->role==='developer';
        });

        Event::listen(
                ApprovalGrantedEvent::class,
                ApprovalGrantedListener::class,

        );
        Event::listen(
                TaskApprovalCreationEvent::class,
                TaskApprovalCreationListener::class,

        );







    }
}


