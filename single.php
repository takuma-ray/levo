<?php get_header(); ?>

<div id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
            <div class="back-to-home">
                <a href="<?php echo home_url(); ?>" id="back-home-button">トップページへ戻る</a>
            </div>
        </article>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
