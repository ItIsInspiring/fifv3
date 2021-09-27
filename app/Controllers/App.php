<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    /** 
     * type : string
     * get the url img of the page if it exists
     * or get the default url 
     * @param string $img_url the url img of the page
     * @return string
     *
     */
    public static function img()
    {
        $img_url = get_the_post_thumbnail_url();

        if(!empty($img_url)){
            return "<img src='".$img_url."' alt='' >";
        } else {
            return "<img src='".get_template_directory_uri()."/assets/images/default.gif' alt='' >";
        }
    }

        /**
    * Get a ozaic of the CPT TYPE
    * @return string
    */
    public static function mozaic($cptType)
    {
        $default_img = "default.jpg";

        $args = array(  
            'post_type' => $cptType,
            'post_status' => 'publish',
            'posts_per_page' => -1, 
            'orderby' => 'title', 
            'order' => 'ASC',
        );

        $loop = new \WP_Query( $args ); 
        ?>
<section class="container-fluid mozaic-section">
    <div class="row">

        <?php
        if( $loop->have_posts() ) : 
            while( $loop->have_posts() ) : 
                $loop->the_post();
        ?>
        <a href="<?php the_permalink() ?>" class="col-md-3 mozaic-bloc"
            style="background-image: url(<?php  the_post_thumbnail_url() ?>);">
            <?php the_title(); ?>
        </a>
        <?php
            endwhile; 
            else:
        ?>

        <h3>Oops, there are no posts.</h3>

        <?php
        endif;

        wp_reset_postdata(); // On réinitialise les données
 ?>

    </div>
</section>

<?php
    }
}