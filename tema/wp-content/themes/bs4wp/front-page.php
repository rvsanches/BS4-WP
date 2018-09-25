<?php get_header(); ?>

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