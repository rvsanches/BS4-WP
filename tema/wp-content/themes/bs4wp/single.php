<?php get_header(); ?>

      <div class="row">

        <div class="col-md-8 col-sm-12">

          <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

            <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid rounded')); ?>
            
            <h3 class="mb-3 mt-4 pt-2 border-top"><?php the_title(); ?></h3>
            
            <?php the_content(); ?>

            <p class="text-muted">Publicado em: <span class="badge badge-my-color-4"><?php echo get_the_date('d/m/y'); ?></span></p>

            <hr>

            <?php comments_template(); ?>

          <?php endwhile; ?>

          <?php else : get_404_template();  endif; ?>

        </div>

        <?php get_sidebar(); ?>

      </div>

    </div>

<?php get_footer(); ?>