<?php get_header(); ?>

<div id="main-content">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="page-content"><?php the_content(); ?></div>
        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
