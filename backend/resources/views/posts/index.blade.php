@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('posts.index'))

@section('main')
<div class="posts-index-first">
  <h2>ALL SCHEDULE</h2>
</div>
<div class="posts-index-second">
  @forelse($posts as $post)
    @if($now > $post->day)
    <a class="posts-detail opacity" href="{{route('posts.show', ['shop'=>$post->shop_id, 'post'=>$post->id])}}">
    @else
    <a class="posts-detail" href="{{route('posts.show', ['shop'=>$post->shop_id, 'post'=>$post->id])}}">
    @endif
      @if($post->image == null)
        <img src="/storage/no-icon.png">
      @else
        <img src="{{$post->image}}">
      @endif
      <ul>
        @if($now > $post->day)
          <li><span>【終了】</span>{{$post->day->format('m/d')}}&nbsp;&nbsp;&nbsp;&nbsp;{{$post->start_time->format('H:i')}}〜{{$post->end_time->format('H:i')}}</li>
        @else
          <li>{{$post->day->format('m/d')}}&nbsp;&nbsp;&nbsp;&nbsp;{{$post->start_time->format('H:i')}}〜{{$post->end_time->format('H:i')}}</li>
        @endif
        <li>{{$post->title}}</li>
        <li>利用カフェ：{{$post->shop->name}}</li>
        <li>登録ユーザー：{{$post->user->name}}&nbsp;&nbsp;&nbsp;&nbsp;登録日：{{$post->created_at->format('Y-m-d')}}</li>
      </ul>
    </a>
  @empty
    <p class="empty">スケジュールは登録されていません。</p>
  @endforelse
</div>
@endsection
