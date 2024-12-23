<?php get_header(); ?>

<div id="content">
  <h1>アーカイブ: <?php the_archive_title(); ?></h1>
  
  <?php if ( have_posts() ) : ?>
      <div class="posts-wrapper">
          <?php while ( have_posts() ) : the_post(); ?>
              <article class="post-card">
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php the_excerpt(); ?></p>
              </article>
          <?php endwhile; ?>
      </div>

      <!-- ページネーションの表示 -->
      <div class="pagination">
          <?php
              // ページネーションリンクの表示
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

<?php get_footer(); ?>
