<?php if( is_single() ) : ?>

        <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid rounded')); ?>
            
        <h3 class="mb-3 mt-4 pt-2 border-top"><?php the_title(); ?></h3>
            
        <?php the_content(); ?>

        <p class="text-muted">Publicado em: <span class="badge badge-my-color-4"><?php echo get_the_date('d/m/y'); ?></span></p>

        <hr>

        <?php comments_template(); ?>

<?php else : ?>

        <div class="blog-post">
            <h3 class="mb-3 pb-2 border-bottom"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="row">
              <div class="col-md-12 col-lg-6 mb-3">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid')); ?>
                </a>
              </div>
              <div class="col-md-12 col-lg-6 mb-3">
                <?php the_excerpt(); ?>
              </div>
            </div>
            <p class="text-muted">Publicado em: <span class="badge badge-my-color-4"><?php echo get_the_date('d/m/y'); ?></span></p>
        </div>

<?php endif; ?>