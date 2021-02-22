<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Carbon\Carbon;
use App\Shop;

class UpdatedShopComposer
{
  public function compose(View $view){
    return $view->with('shops', $this->getUpdatedShop());
  }

  public function getUpdatedShop(){
    $now = Carbon::today();
    $now_sub = Carbon::today()->subDay(30);
    $shops = Shop::whereBetween('updated_at', [$now_sub, $now])->orderBy('updated_at', 'desc')->get();
    return $shops;
  }
}
