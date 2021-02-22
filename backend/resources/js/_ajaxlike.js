$(function () {
  var like = $('.js-like-toggle');
  var likeShopId;

  // likeをクリックした時のアクション内容
  like.on('click', function () {
    var $this = $(this);
    likeShopId = $this.data('shopId');
    $.ajax({
      // laravelでajaxを使うにはCSRFトークンが必要になってくる（おまじない）
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/ajaxlike',  //routeの記述
      type: 'POST', //受け取り方法の記述（GETもある）
      data: {
        'shop_id': likeShopId //コントローラーに渡すパラメーター
      },
    })

    // Ajaxリクエストが成功した場合
    // 「data」にはcontrollerで設定した「shopLikesCount」が入る。
    .done(function (data) {
      //lovedクラスを追加
      $this.toggleClass('loved');

      //.likesCountの次の要素のhtmlを「data.shopLikesCount」の値に書き換える
      $this.next('.likesCount').html(data.shopLikesCount);
    })

    // Ajaxリクエストが失敗した場合
    .fail(function (data, xhr, err) {
      //ここの処理はエラーが出た時にエラー内容をわかるようにしておく
      //とりあえず下記のように記述しておけばエラー内容が詳しくわかります
      console.log('エラー');
      console.log(err);
      console.log(xhr);
    });

    return false;
  });
});
