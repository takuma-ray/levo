<?php get_header(); ?>

<div id="index-page">
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <div class="hero-video">
                <!-- YouTube埋め込み -->
                <iframe width="560" height="315" src="https://www.youtube.com/embed/bAgd5dYcmD8?si=GfU8Mp-fKx89nGSZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>

            <div class="hero-text">
                <h1>Welcome to Levo</h1>
                <p>私たちのSNS運用代行で、集客率アップや高エンゲージメントを実現し、より多くのファンと繋がりましょう。</p>
                <p>いいねやリポストの数が驚くほど増え、ブランドの認知度向上をお手伝いします。</p>
                <a href="<?php echo home_url('/service-overview'); ?>" class="hero-button">詳細はこちら</a>

                <!-- SNSアイコン -->
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
            </div>
        </div>
    </div>

    <!-- Worries Section -->
    <section class="worries-section">
        <h1 class="worries-h1">solution</h1>
        <h2 class="worries-title">あなたの会社の <span>SNS運用</span> で困っていることを解決します</h2>
        <div class="worries-cases">
            <div class="worries-case">
                <h3 class="worries-case-title"><span>case 01</span><br>SNSマーケティングの<br>ノウハウがない</h3>
                <p class="worries-case-description">SNSで商品を宣伝したいけど世代に刺さるSNSの使い方がわからない</p>
                <div class="worries-solution">
                    <h4>TikTok Creater Awardを受賞したノウハウを伝授</h4>
                    <p>TikTok総選挙2019に受賞した「GOHAN」で培ったノウハウを元に運用サービスを開始。貴社のサービスに合わせたSNSのご提案が可能です。</p>
                </div>
            </div>
            <div class="worries-case">
                <h3 class="worries-case-title"><span>case 02</span><br>社内リソースが<br>足りない</h3>
                <p class="worries-case-description">会社の商品をPRすることになったが経験がなく本業が忙しくて社内でリソースが割けない</p>
                <div class="worries-solution">
                    <h4>大企業での運用実績が豊富</h4>
                    <p>累計100社以上のサポート経験があるトピカは、運用実績が豊富なので安心してSNS運用をお任せいただけます。</p>
                </div>
            </div>
            <div class="worries-case">
                <h3 class="worries-case-title"><span>case 03</span><br>知名度を上げて<br>フォロワーを伸ばしたい</h3>
                <p class="worries-case-description">どういったコンテンツを配信すれば良いかわからないため再生数が伸びず、うまくプロモーションができない</p>
                <div class="worries-solution">
                    <h4>総再生数100万回以上を目指します！</h4>
                    <p>TikTok総選挙2019に受賞した「GOHAN」で培ったノウハウを元に運用サービスを開始。貴社のサービスに合わせたSNSのご提案が可能です。</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Posts Section -->
    <h1 class="Posts-h1">reference</h1>
    <?php
    if ( have_posts() ) : ?>
        <div class="index-posts-wrapper">
            <?php while ( have_posts() ) : the_post(); ?>
                <article class="index-post-card">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="index-pagination">
            <?php
                echo paginate_links( array(
                    'total' => $wp_query->max_num_pages,
                    'prev_text' => '« 前へ',
                    'next_text' => '次へ »',
                ) );
            ?>
        </div>
    <?php else : ?>
        <p>投稿がありません。</p>
    <?php endif; ?>
</div>



        <div class="slider-wrapper">
            <h1 class="slider-h1">Excellent members</h1>
            <ul class="slider">
                <?php for ($i = 1; $i <= 8; $i++) : ?>
                    <li class="slider-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/member<?php echo $i; ?>.jpg" alt="Member <?php echo $i; ?>">
                    </li>
                <?php endfor; ?>
            </ul>
        </div>


<?php get_footer(); ?>
