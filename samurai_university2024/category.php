<!-- header.php ここから -->
<!DOCTYPE html>

<head>
  <title>samurai university</title>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="samurai university" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css" />
  <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="styles/main_styles.css" />
</head>

<body>
  <div class="super_container">
    <!-- ヘッダーここから -->
    <header class="header">
      <div class="header_container">
        <div class="">
          <nav class="navbar navbar-expand-lg">
            <div class="logo_container">
              <div class="logo_text">
                <a href="index.html">
                  <img src="images/logo_big.png" />
                  <span>Samurai University</span>
                </a>
              </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars toggle-menu" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav flex-row ml-md-auto d-md-flex main_nav">
                <li class="nav-item">
                  <a class="nav-link" href="news.html">
                    NEWS
                    <p>ニュース</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="events.html">
                    EVENT
                    <p>イベント</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="courses.html">
                    COURSES
                    <p>コース</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about_us.html">
                    ABOUT US
                    <p>侍大学について</p>
                  </a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- ヘッダー ここまで -->
    <!-- header.php ここまで -->
    <?php get_header(); ?>

    <!-- Home -->

    <div class="home">
      <div class="breadcrumbs_container">
        <div class="image_header">
          <div class="header_info">
        <?php
          $cat = get_the_category();
          $catslug = $cat[0]->slug;
          $catname = $cat[0]->cat_name;
            ?>
            <div><?php echo $catslug; ?></div>
            <div><?php echo $catname; ?></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Course -->
      <div class="row content-body">
        <!-- Course -->
        <div class="col-lg-8">
          <!-- Course Tabs -->
          <div class="course_tabs_container">
            <div class="tab_panels">
              <!-- Description -->
              <div class="tab_panel">
                <div class="tab_panel_title"><?php echo $catname; ?></div>
                <div class="tab_panel_content">
                    <!-- news loop from here-->
                    <?php if (have_posts()) : ?>
                      <?php while(have_posts()) : the_post(); ?>
                      <div class="news_posts_small">
                        <div class="row">
                          <div class="col-lg-2 col-md-2 col-sx-12">
                            <div class="calendar_news_border">
                              <div class="calendar_news_border_1">
                                <div class="calendar_month">
                                  <?php
                                  if( is_category('event') ) :
                                    echo post_custom('month');
                                  else:
                                    echo get_post_time('F');
                                  endif;
                                  ?>
                                </div>
                                <div class="calendar_day">
                                <span>
                                  <?php
                         if( is_category('event') ) :
                          echo post_custom('day');
                         else:
                          echo get_the_date('d');
                         endif;
                         ?>
                           </span>
                          </div>
                         </div>
                       </div>
                      </div>
                          <div class="col-lg-10 col-md-10 col-sx-12">
                          <div class="news_post_small_title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                          </div>
                          <div class="news_post_meta">
                            <ul>
                              <li>
                                <?php echo wp_trim_words( get_the_content() , 100, '...'); ?>
                              </li>
                            </ul>
                          </div>
                          <div class="read_continue">
                          <button><a href="<?php the_permalink(); ?>" class="text-white">詳細を見る</a></button>
                          </div>
                        </div>
                      </div>
                      <hr />
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <!-- news loop until here -->
                    <div class="news-pagination">
                      <?php
                      echo paginate_links(array(
                        'total' => $wp_query->max_num_pages,
                        'prev_text' => '&lt;$li;前へ',
                        'next_text' => '次へ&gt;&gt;',
                      ));
                      ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4" style="background-color: #2b7b8e33">
      <?php get_sidebar(); ?>
        </div>
        </div>
      </div>
    <?php get_footer( ); ?>
