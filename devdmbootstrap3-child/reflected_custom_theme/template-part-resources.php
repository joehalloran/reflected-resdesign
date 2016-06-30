<?php global $dm_settings; ?>
<?php if ($dm_settings['show_postmeta'] != 0) : 
    $prfx_stored_meta = get_post_meta( $post->ID );
    if ( $prfx_stored_meta['meta-image']) :
        foreach ($prfx_stored_meta as $metaImage ):
            var_dump($metaImage);
            echo '<p>'.$metaImage.'</p>';
        endforeach;
    endif;
endif; ?>