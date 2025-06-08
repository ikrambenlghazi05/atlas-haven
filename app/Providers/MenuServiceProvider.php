<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Routing\Route;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    // Load the JSON file
    $accountMenuJson = file_get_contents(base_path('resources/menu/accountMenu.json'));
    $accountMenuData = json_decode($accountMenuJson);

    $this->app->make('view')->share('accountMenu', [$accountMenuData]);

    // Load the JSON file

    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
    $verticalMenuData = json_decode($verticalMenuJson);

    // Share all menuData to all the views
    $this->app->make('view')->share('menuData', [$verticalMenuData]);
  }
}
