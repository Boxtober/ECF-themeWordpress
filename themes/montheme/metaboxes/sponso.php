<?php

class SponsoMetaBox {

    const META_KEY = 'montheme_sponso'; // constante pour changer plus rapidement le nom du champ

    public static function register () { // fonction statique "register"

        add_action('add_meta_boxes', [self::class, 'add'], 10, 2); // [nom de la class + la fonction a appeler ]
        add_action('save_post', [self::class, 'save']);

    }

    public static function add ($postType, $post) {

        if ($postType === 'post' && current_user_can('publish_posts', $post)) {

                    add_meta_box(self::META_KEY, 'Sponsoring', [self::class, 'render'], 'post', 'side');

        }

    }

    public static function render ($post) {

    $value = get_post_meta($post->ID, self::META_KEY, true);
    ?>
    <input type="hidden" value="0" name="<?= self::META_KEY ?>">
    <input type="checkbox" value="1" name="<?= self::META_KEY ?>" <?php checked($value, '1') ?>>
    <label for="monthemesponso">Cet article est sponsorisé ?</label>
    <?php

}

public static function save ($post) {

        if (array_key_exists('self::META_KEY', $_POST) && current_user_can('publish_posts', $post)) {

            //gerer la sauvegarde de la donnée sponso dans phpmyadmin

            if ($_POST['self::META_KEY'] === '0') {
                delete_post_meta($post, 'montheme_sponso');
            } else {
    
                update_post_meta($post, 'montheme_sponso', 1);
            }

        }    
    }    
}
        
    




