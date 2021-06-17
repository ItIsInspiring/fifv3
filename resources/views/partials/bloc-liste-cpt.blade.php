<section class="container-fluid liste-cpt photocop photocop-violet">

  <nav>
    <h3 class="text-center">D'autres infections sexuellement transmissibles : </h3>
      <ul>
      <?php
        
        // recup le slug de la page courrante
        global $post;
        $page_slug = $post->post_name;
        
        $type = get_post_type();

        /* AFFICHER LES CUSTOM POST FRERES */
        $args = array(
            'post_type' => $type,
            'posts_per_page' => -1,
            'order_by' => 'ASC'
        );
        
        $my_query = new WP_Query( $args );
        
        if( $my_query->have_posts() ) : 
          while( $my_query->have_posts() ) : 
          $my_query->the_post();
            $my_post_slug = get_post_field( 'post_name', get_post());
            if( $my_post_slug !=  $page_slug):
              ?>
                <li><a href="<?= the_permalink() ?>"><?= the_title(); ?></a></li>
                <?php
            endif;
          endwhile;
        endif;

        wp_reset_postdata();
      ?>

      </ul>
    </nav>

</section>