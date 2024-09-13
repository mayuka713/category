<div class="sidebar">
  <div class="category">
    <div class="section_title_container category_title">
      <h2>CATEGORY</h2>
      <div class="section_subtitle">カテゴリー</div>
    </div>
    <div class="sidebar_categories">
      <ul>
        <?php
          $args = array(
            'hide_empty' => 1,
            'title_li' => '',
          );
          wp_list_categories( $args );
        ?>
      </ul>
    </div>
  </div>
  <div class="category">
    <div class="section_title_container category_title">
      <h2>Latest Post</h2>
      <div class="section_subtitle">最新記事</div>
    </div>
    <div class="sidebar_categories">
      <ul>
        <?php
          $args = array(
            'posts_per_page' => 3
          );
          $posts = get_posts( $args );
          foreach ( $posts as $post ):
          setup_postdata( $post );
        ?>
        <li>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
        <?php
          endforeach;
          wp_reset_postdata();
        ?>
      </ul>
    </div>
  </div>
</div>
