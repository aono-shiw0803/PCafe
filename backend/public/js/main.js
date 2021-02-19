// サイドバーメニューの開閉システム
$(function(){
  $('#open').click(function(){
    $('.black-bg').addClass('open');
    setTimeout(function(){
      $('.sidebar').addClass('open');
    }, 300);
  });
  $('#close').click(function(){
    $('.sidebar').removeClass('open');
    setTimeout(function(){
      $('.black-bg').removeClass('open');
    }, 600);
  });
});
// サイドバーメニューの開閉システム

// フラッシュメッセージ
$(function(){
  setTimeout(function(){
    $('.flash').addClass('fadeIn');
  }, 300);
  $('.flash.fadeIn').ready(function(){
    setTimeout(function(){
      $('.flash.fadeIn').removeClass('fadeIn');
    }, 2500);
  });
});
// フラッシュメッセージ
