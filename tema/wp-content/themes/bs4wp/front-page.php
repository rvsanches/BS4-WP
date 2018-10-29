<?php get_header(); ?>

      <div class="row">
      
        <div class="col mb-5">
        
          <div id="carouselBSWP" class="carousel slide" data-ride="carousel">
          
            <div class="carousel-inner">
            
              <?php 
              // args
              $my_args_banner = array(
                'post_type' => 'banners',
                'posts_per_page' => 3,
              );

              // query
              $my_query_banner = new WP_Query ( $my_args_banner );
              ?>

              <?php if( $my_query_banner->have_posts()) : 
                $banner = $banners[0];
                $c = 0;
                while( $my_query_banner->have_posts() ) : 
                $my_query_banner->the_post(); 
              ?>

                <div class="carousel-item <?php $c++; if($c == 1) { echo ' active'; } ?>">
                  <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid rounded')) ?>
                  <div class="carousel-caption d-none d-md-block">
                    <h5>
                      <?php the_title(); ?>
                    </h5>
                  </div>
                </div>

              <?php endwhile; endif; ?>

              <?php wp_reset_query(); ?>
            
            </div>

            <a class="carousel-control-prev" href="#carouselBSWP" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
              <span class="sr-only">Anterior</span>
            </a>

            <a class="carousel-control-next" href="#carouselBSWP" role="button" data-slide="next">
              <span class="carousel-control-next-icon"></span>
              <span class="sr-only">Próximo</span>
            </a>
          
          </div>
        
        </div>
      
      </div>

      <div class="row">

        <?php 
        // args
        $my_args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
          'category_name' => 'destaque'
        );

        // query
        $my_query = new WP_Query ( $my_args );
        ?>

        <?php if( $my_query->have_posts()) : while( $my_query->have_posts() ) : $my_query->the_post(); ?>

          <div class="col-sm-12 col-md-4 mb-5">

            <div class="card">
              <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid card-img-top')) ?>
              <div class="card-body">
                <h5 class="card-title mb-4">
                  <?php the_title(); ?>
                </h5>
                <a href="<?php the_permalink(); ?>" class="btn btn-my-color-5">Leia mais</a>
              </div>
            </div>

          </div>

        <?php endwhile; endif; ?>

        <?php wp_reset_query(); ?>

      </div>

      <div class="row">

        <div class="col-md-8 col-sm-12">

          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

            <?php get_template_part('content', get_post_format()); ?>

          <?php endwhile; ?>

          <?php else : get_404_template();  endif; ?>

          <div class="blog-pagination mb-5">
            <?php next_posts_link( 'Mais antigos' ); ?> <?php previous_posts_link( 'Mais novos' ); ?>
          </div>

        </div>

        <?php get_sidebar(); ?>

      </div>

    </div>

<?php get_footer(); ?>