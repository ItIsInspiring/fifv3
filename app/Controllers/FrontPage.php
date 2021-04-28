<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class FrontPage extends Controller
{
    /**
     * show a bloc with a title + a small paragraph + button
     *
     * @return void
     */
    public static function getCTA(int $page_id){
        // $html ="";
        // $page = new \WP_Query( 'post='.$page_id); 
        // $html .='<h2>'.get_the_title().'</h2>';
        // $html .='<p>'.the_excerpt().'...</p>';
        // $html .='<div class="btn-fif"><a href="'.the_permalink().'" role="button">Learn more</a></div>';
        // wp_reset_postdata(); // On réinitialise les données
        // return $page;


            return (object) [
                'title' => get_the_title($page_id),
                'excerpt' => get_the_excerpt($page_id),
                'url' => get_permalink($page_id),
            ];
    }
}