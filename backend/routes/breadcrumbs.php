<?php

// Top
Breadcrumbs::for('top', function($target){
  $target->push('Top', route('tops.index'));
});

// ログイン
Breadcrumbs::for('login', function($target){
  $target->parent('top');
  $target->push('ログイン', url('/login'));
});

// 新規登録
Breadcrumbs::for('register', function($target){
  $target->parent('top');
  $target->push('新規登録', url('/register'));
});

// お問い合わせ
Breadcrumbs::for('contacts', function($target){
  $target->parent('top');
  $target->push('お問い合わせ', route('contacts.create'));
});
Breadcrumbs::for('contacts.confirm', function($target){
  $target->parent('top');
  $target->push('お問い合わせ内容確認', route('contacts.confirm'));
});
Breadcrumbs::for('contacts.complete', function($target){
  $target->parent('top');
  $target->push('お問い合わせ完了', route('contacts.complete'));
});

// ユーザー
Breadcrumbs::for('users.index', function($target){
  $target->parent('top');
  $target->push('ユーザー一覧', route('users.index'));
});
Breadcrumbs::for('users.show', function($target, $user){
  $target->parent('top');
  $target->push('ユーザー一覧', route('users.index'));
  $target->push($user->name, route('users.show', ['user' => $user->id]));
});
Breadcrumbs::for('users.edit', function($target, $user){
  $target->parent('top');
  $target->push('ユーザー一覧', route('users.index'));
  $target->push($user->name, route('users.show', ['user' => $user->id]));
  $target->push('プロフィール編集', route('users.edit', ['user' => $user->id]));
});

// カフェ
Breadcrumbs::for('shops.index', function($target){
  $target->parent('top');
  $target->push('カフェ一覧', route('shops.index'));
});
Breadcrumbs::for('shops.area', function($target){
  $target->parent('top');
  $target->push('カフェ一覧', route('shops.index'));
  $target->push('エリア別カフェ');
});
Breadcrumbs::for('shops.tema', function($target){
  $target->parent('top');
  $target->push('カフェ一覧', route('shops.index'));
  $target->push('テーマ別カフェ');
});
Breadcrumbs::for('shops.createdAt', function($target){
  $target->parent('top');
  $target->push('カフェ一覧', route('shops.index'));
  $target->push('1カ月以内に登録されたカフェ');
});
Breadcrumbs::for('shops.updatedAt', function($target){
  $target->parent('top');
  $target->push('カフェ一覧', route('shops.index'));
  $target->push('1カ月以内に更新されたカフェ');
});
Breadcrumbs::for('shops.show', function($target, $shop){
  $target->parent('top');
  $target->push('カフェ一覧', route('shops.index'));
  $target->push($shop->name, route('shops.show', ['shop' => $shop->id]));
});
Breadcrumbs::for('shops.create', function($target){
  $target->parent('top');
  $target->push('カフェ一覧', route('shops.index'));
  $target->push('カフェ登録', route('shops.create'));
});
Breadcrumbs::for('shops.edit', function($target, $shop){
  $target->parent('top');
  $target->push('カフェ一覧', route('shops.index'));
  $target->push($shop->name, route('shops.show', ['shop' => $shop->id]));
  $target->push('編集', route('shops.edit', ['shop' => $shop->id]));
});

// スケジュール登録
Breadcrumbs::for('posts.index', function($target){
  $target->parent('top');
  $target->push('スケジュール一覧', route('posts.index'));
});
Breadcrumbs::for('posts.show', function($target, $shop, $post){
  $target->parent('top');
  $target->push('スケジュール一覧', route('posts.index'));
  $target->push('スケジュール詳細', route('posts.show', ['shop' => $shop->id, 'post' => $post->id]));
});
Breadcrumbs::for('posts.create', function($target, $shop){
  $target->parent('top');
  $target->push('スケジュール一覧', route('posts.index'));
  $target->push('スケジュール登録', route('posts.create', ['shop' => $shop->id]));
});
Breadcrumbs::for('posts.edit', function($target, $shop, $post){
  $target->parent('top');
  $target->push('スケジュール一覧', route('posts.index'));
  $target->push('スケジュール詳細', route('posts.show', ['shop' => $shop->id, 'post' => $post->id]));
  $target->push('スケジュール内容編集', route('posts.edit', ['shop' => $shop->id, 'post' => $post->id]));
});

// 写真
Breadcrumbs::for('photos.index', function($target){
  $target->parent('top');
  $target->push('ALL Photo', route('photos.index'));
});
Breadcrumbs::for('photos.show', function($target, $photo){
  $target->parent('top');
  $target->push('ALL Photo', route('photos.index'));
  $target->push('詳細', route('photos.show', ['photo' => $photo->id]));
});
Breadcrumbs::for('photos.create', function($target, $shop){
  $target->parent('top');
  $target->push('カフェ一覧', route('shops.index'));
  $target->push($shop->name, route('shops.show', ['shop' => $shop->id]));
  $target->push('写真登録', route('photos.create', ['shop' => $shop->id]));
});

// 口コミ
Breadcrumbs::for('comments.create', function($target, $shop){
  $target->parent('top');
  $target->push('カフェ一覧', route('shops.index'));
  $target->push($shop->name, route('shops.show', ['shop' => $shop->id]));
  $target->push('口コミ投稿', route('comments.create', ['shop' => $shop->id]));
});
