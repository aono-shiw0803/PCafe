<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Carbon\Carbon;

class EndAnnounceComposer
{
  public function compose(View $view){
    $view->with('now', Carbon::today());
  }
}
