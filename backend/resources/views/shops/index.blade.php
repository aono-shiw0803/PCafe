@extends('layouts.index')

@section('main')
<div class="shops-index-first">
  <h2>ALL Cafe</h2>
  @foreach($shops as $shop)
    <a class="shops-detail" href="http://localhost:8001/shops/{{$shop->id}}">
      <ul>
        @if($shop->image === null)
          <li><img src="/storage/no-icon.png"></li>
        @else
          <li><img src="/storage/{{$shop->image}}"></li>
        @endif
        <li class="center"><p>{{$shop->area}}</p></li>
        <li class="center"><p>{{$shop->name}}</p></li>
      </ul>
    </a>
  @endforeach
</div>
@endsection
