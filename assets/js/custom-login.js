jQuery(document).ready(function ($) {
    $('#wp-submit').hover(function () {
        $(this).css('background-color', '#ff8c00');  // ホバー時に色を変更
    }, function () {
        $(this).css('background-color', '#ff4747');  // 通常の色に戻す
    });
});
