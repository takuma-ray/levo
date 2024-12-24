<?php
function levo_theme_setup() {
    // 投稿サムネイルをサポート
    add_theme_support( 'post-thumbnails' );
    
    // メニューのサポート
    register_nav_menus(array(
        'primary' => 'メインメニュー',
        'footer'  => 'フッターメニュー'
    ));
}
add_action('after_setup_theme', 'levo_theme_setup');

// スタイルシートの読み込み
function levo_enqueue_styles_and_scripts() {
    // CSS files
    $styles = [
        'levo-style' => get_stylesheet_uri(),
        'index-style' => get_template_directory_uri() . '/assets/css/index.css',
        'footer-style' => get_template_directory_uri() . '/assets/css/footer.css',
        'header-style' => get_template_directory_uri() . '/assets/css/header.css',
        'layout-style' => get_template_directory_uri() . '/assets/css/layout.css',
        'main-style' => get_template_directory_uri() . '/assets/css/main.css',
        'page-style' => get_template_directory_uri() . '/assets/css/page.css',
        'single-style' => get_template_directory_uri() . '/assets/css/single.css',
        'responsive-style' => get_template_directory_uri() . '/assets/css/responsive.css',
        'custom-style' => get_template_directory_uri() . '/assets/css/custom.css'
    ];

    foreach ($styles as $handle => $src) {
        wp_enqueue_style($handle, $src);
    }

    // JavaScript files
    $scripts = [
        'modal-js' => [get_template_directory_uri() . '/assets/js/modal.js', ['jquery'], null, true],
        'main-js' => [get_template_directory_uri() . '/assets/js/main.js', [], false, true],
        'carousel-js' => [get_template_directory_uri() . '/assets/js/carousel.js', [], false, true],
        'script-js' => [get_template_directory_uri() . '/assets/js/script.js', ['jquery'], null, true]
    ];

    foreach ($scripts as $handle => $args) {
        wp_enqueue_script($handle, ...$args);
    }
}
add_action('wp_enqueue_scripts', 'levo_enqueue_styles_and_scripts');

function custom_login_redirect($redirect_to, $request, $user) {
    if (isset($user->roles) && is_array($user->roles)) {
        $redirects = [
            '神のエステ練馬' => '/client-pages/kami-nerima-post',
            '神のエステ秋葉原' => '/client-pages/kami-akihabara-post',
            'Pulunt' => '/client-pages/pulunt-post',
            'adachi' => '/client-pages/pulunt-post',
            'Apex' => '/client-pages/apex-post',
            'GRACE' => '/client-pages/grace-post',
            'ChillAroma' => '/client-pages/chillaroma-post',
            'Bazu-ca' => '/client-pages/bazu-ca-post',
            'とろり沼' => '/client-pages/tororinuma-post',
            'AROMA MRS.' => '/client-pages/aroma-mrs-post',
            'むちむちお姉さん' => '/client-pages/muchione-post',
            'Ixia' => '/client-pages/ixia-post',
            '銀座のエステ' => '/client-pages/ginzanoeste-post',
            'Honey+Plus' => '/client-pages/honeyplus-post',
            'Unknown' => '/client-pages/unknown-post',
            'メンズエステ松山' => '/client-pages/mem-post',
            'SUHADA SPA' => '/client-pages/suhada-spa-post',
            'M LABO SPA' => '/client-pages/m-labo-spa-post',
            'Awesome spa' => '/client-pages/awesome-spa-post',
            'きゅーてぃー♡はにー' => '/client-pages/cutie-honey-post',
            '秘密のミセスルーム' => '/client-pages/himitsu-mrsroom-post',
            '蛍屋金沢' => '/client-pages/hotaruya-kanazawa-post',
            'LuxTime' => '/client-pages/luxtime-post',
            'SUI' => '/client-pages/sui-post',
            'Aroma mel' => '/client-pages/aroma-mel-post',
            'アロマ NICO' => '/client-pages/aroma-nico-post'
        ];

        foreach ($redirects as $role => $url) {
            if (in_array($role, $user->roles)) {
                return home_url($url);
            }
        }
    }
    return $redirect_to;
}
add_filter('login_redirect', 'custom_login_redirect', 10, 3);

function restrict_client_page_access() {
    if (is_singular('post') && strpos(get_permalink(), home_url('/client-pages/')) !== false) {
        $user = wp_get_current_user();
        if (isset($user->roles) && is_array($user->roles)) {
            $restrictions = [
                '神のエステ練馬' => 'kami-nerima-post',
                '神のエステ秋葉原' => 'kami-akihabara-post',
                'Pulunt' => 'pulunt-post',
                // Add additional restrictions as needed
            ];

            foreach ($restrictions as $role => $page_slug) {
                if (in_array($role, $user->roles) && !is_page($page_slug)) {
                    wp_redirect(home_url('/client-pages/' . $page_slug));
                    exit;
                }
            }
        }
    }
}
add_action('template_redirect', 'restrict_client_page_access');


// 会員ログインに関すること（ここまで）





// 投稿ページにて、投稿記事を複製する

function duplicate_post_as_draft(){
    global $wpdb;
    if (! ( isset($_GET['post']) || isset($_POST['post'])  || (isset($_REQUEST['action']) && 'duplicate_post_as_draft' == $_REQUEST['action']) ) ) {
        wp_die('No post to duplicate has been supplied!');
    }
    
    $post_id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
    $post = get_post($post_id);
    
    if (isset($post) && $post != null) {
        $current_user = wp_get_current_user();
        $new_post_author = $current_user->ID;
        
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_status'    => 'draft',
            'post_title'     => $post->post_title . ' (Copy)',
            'post_type'      => $post->post_type,
            'post_parent'    => $post->post_parent,
            'menu_order'     => $post->menu_order
        );

        $new_post_id = wp_insert_post($args);
        $taxonomies = get_object_taxonomies($post->post_type);

        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }
        
        $meta_data = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($meta_data) != 0) {
            foreach ($meta_data as $meta_info) {
                $meta_key = $meta_info->meta_key;
                $meta_value = addslashes($meta_info->meta_value);
                update_post_meta($new_post_id, $meta_key, $meta_value);
            }
        }

        wp_redirect(admin_url('edit.php?post_type=' . $post->post_type));
        exit;
    } else {
        wp_die('Post duplication failed, could not find original post.');
    }
}
add_action('admin_action_duplicate_post_as_draft', 'duplicate_post_as_draft');

function duplicate_post_link($actions, $post){
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="admin.php?action=duplicate_post_as_draft&post=' . $post->ID . '" title="Duplicate this item" rel="permalink">複製</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'duplicate_post_link', 10, 2);
add_filter('page_row_actions', 'duplicate_post_link', 10, 2);





// Wordpressログイン画面に関するJS

function custom_login_scripts() {
    // ログインページ専用のJSを読み込む
    wp_enqueue_script('custom-login-js', get_template_directory_uri() . '/assets/js/custom-login.js', array('jquery'), null, true);
}
add_action('login_enqueue_scripts', 'custom_login_scripts');


// Wordpressログイン画面のロゴ

function custom_login_logo() {
    echo '
    <style>
        #login h1 a {
            background-image: url(' . get_template_directory_uri() . '/assets/images/levo_logo.png);
            background-size: contain;
            width: 200px;
            height: 80px;
        }
    </style>';
}
add_action('login_enqueue_scripts', 'custom_login_logo');


// Wordpressログイン画面のCSS読み込み

function custom_login_css() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/assets/css/custom-login.css" />';
}
add_action('login_head', 'custom_login_css');




function enqueue_slick_slider() {
    // Slick CSS
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');

    // Slick JS
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], null, true);

    // スライダー初期化スクリプト
    wp_enqueue_script('custom-slider-init', get_template_directory_uri() . '/assets/js/custom-slider.js', ['slick-js'], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_slider');





// カスタム投稿タイプの追加
function create_client_post_type() {
    register_post_type( 'client_page',
        array(
            'labels' => array(
                'name' => 'Client Pages',
                'singular_name' => 'Client Page',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Client Page',
                'edit_item' => 'Edit Client Page',
                'new_item' => 'New Client Page',
                'view_item' => 'View Client Page',
                'search_items' => 'Search Client Pages',
                'not_found' =>  'No Client Pages found',
                'not_found_in_trash' => 'No Client Pages found in Trash',
                'parent_item_colon' => '',
                'menu_name' => 'Client Pages'
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'client-pages'),
            'show_in_rest' => true, // Gutenberg editor
            'supports' => array('title', 'editor', 'author', 'custom-fields')
        )
    );
}
add_action( 'init', 'create_client_post_type' );