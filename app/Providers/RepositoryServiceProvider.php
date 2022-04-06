<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\PostContract;
use App\Contracts\TopicContract;
use App\Repositories\PostRepository;
use App\Repositories\TopicRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories =[
        TopicContract::class => TopicRepository::class,
        PostContract::class => PostRepository::class
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
