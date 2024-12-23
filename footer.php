<footer id="site-footer">
    
    <nav class="footer-links">
        <?php wp_nav_menu(array(
            'theme_location' => 'footer',
            'menu_class' => 'footer-nav',
            'container' => false
        )); ?>
    </nav>
    <div class="social-icons">
        <a href="https://x.com/Levo_0905" target="_blank" rel="noopener noreferrer" class="social-icon">
            <i class="fa-brands fa-x-twitter"></i> X
        </a>
        <a href="#" class="social-icon inactive-social">
            <i class="fab fa-youtube"></i> YouTube
        </a>
        <a href="#" class="social-icon inactive-social">
            <i class="fab fa-instagram"></i> Instagram
        </a>
        <a href="#" class="social-icon inactive-social">
            <i class="fab fa-facebook-f"></i> Facebook
        </a>
    </div>

    <p>&copy; <?php echo date('Y'); ?> Levo WordPress. All Rights Reserved.</p>
</footer>

<!-- モーダルのHTML -->
<div id="social-modal" class="modal">
    <div class="modal-content">
        <p>開設まで少々お待ちください。</p>
        <button id="close-modal" class="close-button">閉じる</button>
    </div>
</div>


<!-- slick slider -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
   $('.slider').slick({
    autoplaySpeed:1000,
    speed:2000,
    autoplay:true,
    slidesToShow:1,
    slideToscroll:1,
    arrows:true,
    dots:false,
    centerMode: true, //要素を中央寄せ
    centerPadding: '15%'//左右の画像が見える幅
    });
 </script>



<!-- FontAwesomeのスクリプト -->
<script src="https://kit.fontawesome.com/7f7d465132.js" crossorigin="anonymous"></script>

<!-- JSファイル読み込み -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- FontAwesome CDN -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/modal.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const commentToggle = document.getElementById("comment-toggle");
        const commentForm = document.getElementById("comment-form");

        if (commentToggle && commentForm) {
            commentToggle.addEventListener("click", function () {
                if (commentForm.style.display === "none") {
                    commentForm.style.display = "block";
                } else {
                    commentForm.style.display = "none";
                }
            });
        }
    });
</script>

<?php wp_footer(); ?>

<div id="menu-modal" class="menu-modal">
    <div class="menu-modal-content">
        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
    </div>
</div>
</body>
</html>
