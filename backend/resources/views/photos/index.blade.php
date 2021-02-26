@extends('layouts.index')

@section('breadcrumbs', Breadcrumbs::render('photos.index'))

@section('main')
<div class="photos-index-first">
  <h2>ALL Photo</h2>
</div>
<div class="photos-index-second">
  @forelse($photos as $photo)
    <a href="{{route('photos.show', ['photo' => $photo->id])}}">
      <img src="{{$photo->file}}">
    </a>
  @empty
    <p>写真は登録されてません。</p>
  @endforelse
</div>
@endsection
