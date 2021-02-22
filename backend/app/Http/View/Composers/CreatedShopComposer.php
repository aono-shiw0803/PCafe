<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Carbon\Carbon;
use App\Shop;

class createdShopComposer
{
  public function compose(View $view){
    return $view->with('shops', $this->getCreatedShop());
  }

  public function getCreatedShop(){
    $now = Carbon::today();
    $now_sub = Carbon::today()->subDay(30);
    $shops = Shop::whereBetween('created_at', [$now_sub, $now])->orderBy('created_at', 'desc')->get();
    return $shops;
  }
}
