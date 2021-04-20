<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use \Wp_Query;
class Ressource extends Controller
{

    public static function getAdress($id)
    {
      return get_field('adresse', $id);
    }

    public static function getUrl($id)
    {
      return get_field('site_web', $id);
    }

    public static function getPhone($id)
    {
      return get_field('telephone', $id);
    }

    public static function getThumbnail($id)
    {
      $imgUrl = get_the_post_thumbnail_url($id);
      
      if($imgUrl){
        return '<img src="'.$imgUrl.'" alt="'.get_the_title().'"/>';
      } else{
        return '<img src="'.get_stylesheet_directory_uri().'/assets/images/default.jpg" alt="'.get_the_title().'"/>';
      }
    }
  
    public static function getThemeFif()
    {
        global $post;  
        $pageID=$post->ID;
        
        if($pageID){

            switch ($pageID) {
                case 20:
                    $themefif = "ists";
                break;
                case 25:
                    $themefif = "prods";
                break;
                case 30:
                    $themefif = "gyneco";
                break;
            }
            return $themefif;
        } else {
            return "Sorry ! we can get a PAGE ID.";
        }

    }

    public static function GetByThemeFif()
    {
        $themefif= SELF::getThemeFif();
        $args = array(
            'post_type' => 'ressourcesfif',
            'posts_per_page' => -1,
            'tax_query' => array(

              array(
                'taxonomy' => 'themesfif',
                'field'    => 'slug',
                'terms'    => $themefif,
              ),
              
            ),
          );    
    
        $ressources = new WP_Query($args);
        return $ressources->posts;
    }

    public static function GetByThemeFifAndLocalite($themefif = null, $localite = null)
    {
      $themefif= SELF::getThemeFif();
  
      $args = array(
        'post_type' => 'ressourcesfif',
        'posts_per_page' => -1,
        'tax_query' => array(

          array(
            'taxonomy' => 'themesfif',
            'field'    => 'slug',
            'terms'    => $themefif,
          ),

          array(
            'taxonomy' => 'localites',
            'field'    => 'slug',
            'terms'    => $localite,
          ),
          
        ),
      );    

        $ressources = new WP_Query($args);
        return $ressources;
    }


    public static function GetByThemeGenByTheme($theme = null)
    {
        $args = array(
            'post_type' => 'ressourcesfif',
            'posts_per_page' => -1,
            'tax_query' => array(

              array(
                'taxonomy' => 'themesgeneraux',
                'field'    => 'slug',
                'terms'    => $theme,
              )
              
            ),
          );    
    
        $ressources = new WP_Query($args);
        return $ressources;
    }

    public static function GetByThemeGenByLocalite($theme = null, $localite = null)
    {
        $args = array(
            'post_type' => 'ressourcesfif',
            'posts_per_page' => -1,
            'tax_query' => array(

              array(
                'taxonomy' => 'themesgeneraux',
                'field'    => 'slug',
                'terms'    => $theme,
              ),

              array(
                'taxonomy' => 'localites',
                'field'    => 'slug',
                'terms'    => $localite,
              ),
              
            ),
          );    
    
        $ressources = new WP_Query($args);
        return $ressources;
    }
    

    /** TO GET THE RESSOURCES BY LOCALITES AND CLASSIFIED BY TYPES */
    public static function getByLocalitesClassedByTypes($locationSlug)
    {
      
      // 1st parameter, the themefif term, automaticially detected : ists / prods / gyneco
      $themeFif = SELF::getThemeFif();
      // 2nd parameter, the locality : $localitionSlug
      // 3nd parameter, the types concerned : $types_ressources 

      $types_ressources = get_terms( array(
          'taxonomy' => 'types_ressources',
      ) );

      $results = null;
      
      foreach ( $types_ressources as $type_ID => $type_ressource ) {


        $ressources = new WP_Query( array(
            'post_type' => 'ressourcesfif',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                  'taxonomy' => 'themesfif',
                  'terms'    => $themeFif,
                  'field'    => 'slug',
              ),
              array(
                'taxonomy' => 'localites',
                'terms'    => $locationSlug,
                'field'    => 'slug',
              ),
              array(
                'taxonomy' => 'types_ressources',
                'terms'    => $type_ressource->slug,
                'field'    => 'slug',
              ),
            ),
        ) );
        
        if( $ressources->have_posts() ) :
          $results[$type_ID ] = [
            'type_slug' =>$type_ressource->slug,
            'type_name' =>$type_ressource->name,
          ];
          while ( $ressources->have_posts() ) : $ressources->the_post();
            $results[$type_ID ]['ressources'][] = [
              'img_url' => get_the_post_thumbnail_url(),
              'title' => get_the_title(),
              'content' => get_the_content(),
              'adress' => SELF::getAdress(get_the_ID()),
              'phone' => SELF::getPhone(get_the_ID()),
              'url' => SELF::getUrl(get_the_ID()),
            ];
          endwhile;
        endif; 
        
        wp_reset_postdata();
        
      }
      
      return $results;
    }


    /** TO GET THE RESSOURCES BY LOCALITES AND CLASSIFIED BY TYPES */
    public static function getByThemeGenClassedByTypes($themeGen)
    {

      $types_ressources = get_terms( array(
          'taxonomy' => 'types_ressources',
      ) );

      $results = null;
      
      foreach ( $types_ressources as $type_ID => $type_ressource ) {


        $ressources = new WP_Query( array(
            'post_type' => 'ressourcesfif',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                  'taxonomy' => 'themesgeneraux',
                  'terms'    => $themeGen,
                  'field'    => 'slug',
              ),
              array(
                'taxonomy' => 'types_ressources',
                'terms'    => $type_ressource->slug,
                'field'    => 'slug',
              ),
            ),
        ) );
        
        if( $ressources->have_posts() ) :
          $results[$type_ID ] = [
            'type_slug' =>$type_ressource->slug,
            'type_name' =>$type_ressource->name,
          ];
          while ( $ressources->have_posts() ) : $ressources->the_post();
            $results[$type_ID ]['ressources'][] = [
              'img_url' => get_the_post_thumbnail_url(),
              'title' => get_the_title(),
              'content' => get_the_content(),
              'adress' => SELF::getAdress(get_the_ID()),
              'phone' => SELF::getPhone(get_the_ID()),
              'url' => SELF::getUrl(get_the_ID()),
            ];
          endwhile;
        endif; 
        
        wp_reset_postdata();
        
      }
      
      return $results;
    }
}