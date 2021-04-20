
<div class="nav" id="secondary-menu" role="navigation">

    @php
        global $wp_query;

        if( empty($wp_query->post->post_parent) ) {
            $parent = $wp_query->post->ID;
        } else {
            $parent = $wp_query->post->post_parent;
        } 
    
        if(wp_list_pages("title_li=&child_of=$parent&echo=0" )){
            echo '<nav><ul>';
            // wp_list_pages("title_li=&child_of=$parent" );
            wp_list_pages(array(
                'child_of'=>$parent,
                'title_li'     => __( 'Dans la même rubrique : ' )
            ));
            echo '</ul></nav>';
        }
    
    @endphp
        
    </div>
