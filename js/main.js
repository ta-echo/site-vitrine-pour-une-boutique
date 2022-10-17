

/*
const ham = document.querySelector('#js-hamburger'); //js-hamburgerの要素を取得し、変数hamに格納
const nav = document.querySelector('#js-nav'); //js-navの要素を取得し、変数navに格納

ham.addEventListener('click', function () { //ハンバーガーメニューをクリックしたら
  console.log('ok!'); // コンソール画面でokというメッセージが出る

});
*/





const ham = document.querySelector('#js-hamburger');
const nav = document.querySelector('#js-nav');

ham.addEventListener('click', function () { // Lorsque vous cliquez sur le menu hamburger

  ham.classList.toggle('active'); // Ajout et suppression dela classe active du menu hamburger
  nav.classList.toggle('active'); // Ajout et suppression de la classe active du menu de navigation

});



(function ($) {
  var $nav = $('#navArea');
  var $btn = $('.toggle_btn');
  var $mask = $('#mask');
  var open = 'open'; // class
  // menu open close
  $btn.on('click', function () {
    if (!$nav.hasClass(open)) {
      $nav.addClass(open);
    } else {
      $nav.removeClass(open);
    }
  });
  // mask close
  $mask.on('click', function () {
    $nav.removeClass(open);
  });
})(jQuery);
