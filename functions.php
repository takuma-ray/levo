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
function levo_enqueue_styles() {
    wp_enqueue_style( 'levo-style', get_stylesheet_uri() );

    // 他のCSSファイルを読み込む
    wp_enqueue_style( 'index-style', get_template_directory_uri() . '/assets/css/index.css' );
    wp_enqueue_style( 'footer-style', get_template_directory_uri() . '/assets/css/footer.css' );
    wp_enqueue_style( 'header-style', get_template_directory_uri() . '/assets/css/header.css' );
    wp_enqueue_style( 'layout-style', get_template_directory_uri() . '/assets/css/layout.css' );
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css' );
    wp_enqueue_style( 'page-style', get_template_directory_uri() . '/assets/css/page.css' );
    wp_enqueue_style( 'single-style', get_template_directory_uri() . '/assets/css/single.css' );
    wp_enqueue_style( 'responsive-style', get_template_directory_uri() . '/assets/css/responsive.css' );
     // JavaScriptの読み込み
    wp_enqueue_script('modal-js', get_template_directory_uri() . '/assets/js/modal.js', array('jquery'), null, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
    wp_enqueue_script('carousel.js', get_template_directory_uri() . '/assets/js/carousel.js', array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'levo_enqueue_styles' );
?>





<?php
// functions.php

// テーマのCSSとJSを読み込む
function levo_enqueue_assets() {
    // メインのスタイルシートを読み込む
    wp_enqueue_style( 'levo-style', get_stylesheet_uri() );
    
    // カスタムCSSファイルを読み込む
    wp_enqueue_style( 'levo-custom-css', get_template_directory_uri() . '/assets/css/custom.css' );

    // jQueryを読み込む（WordPressにデフォルトで含まれている）
    wp_enqueue_script( 'jquery' );

    // カスタムJavaScriptファイルを読み込む
    wp_enqueue_script( 'levo-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, 
    true );
}
add_action( 'wp_enqueue_scripts', 'levo_enqueue_assets' );




// 会員ログインに関すること
// クライアントごとのログイン後リダイレクト先

if (!function_exists('custom_login_redirect')) {
    function custom_login_redirect($redirect_to, $request, $user) {
        // ロールに基づくリダイレクト
        if (isset($user->roles) && is_array($user->roles)) {
            // 神のエステ練馬のユーザー用
            if (in_array('神のエステ練馬', $user->roles)) {
                return home_url('/client-pages/kami-nerima-post'); // 直リンク指定
            }
            // 神のエステ秋葉原のユーザー用
            elseif (in_array('神のエステ秋葉原', $user->roles)) {
                return home_url('/client-pages/kami-akihabara-post'); // 直リンク指定
            }
            // Puluntのユーザー用
            elseif (in_array('Pulunt', $user->roles)) {
                return home_url('/client-pages/pulunt-post'); // 直リンク指定
            }
            // adachiのユーザー用
            elseif (in_array('adachi', $user->roles)) {
                return home_url('/client-pages/pulunt-post'); // adachiの指定ページ
            }
            // APEXのユーザー用
            elseif (in_array('Apex', $user->roles)) {
                return home_url('/client-pages/apex-post'); // Apexの指定ページ
            }
            // GRACEのユーザー用
            elseif (in_array('GRACE', $user->roles)) {
                return home_url('/client-pages/grace-post'); // GRACEの指定ページ
            }
            // ChillAromaのユーザー用
            elseif (in_array('ChillAroma', $user->roles)) {
                return home_url('/client-pages/chillaroma-post'); // ChillAromaの指定ページ
            }
            // Bazu-caのユーザー用
            elseif (in_array('Bazu-ca', $user->roles)) {
                return home_url('/client-pages/bazu-ca-post'); // Bazu-caの指定ページ
            }
            // とろり沼のユーザー用
            elseif (in_array('とろり沼', $user->roles)) {
                return home_url('/client-pages/tororinuma-post'); // とろり沼の指定ページ
            }
            // AROMA MRSのユーザー用
            elseif (in_array('AROMA MRS.', $user->roles)) {
                return home_url('/client-pages/aroma-mrs-post'); // AROMA MRS.の指定ページ
            }
            // むちむちお姉さんのユーザー用
            elseif (in_array('むちむちお姉さん', $user->roles)) {
                return home_url('/client-pages/muchione-post'); // むちむちお姉さんの指定ページ
            }
            // Ixiaのユーザー用
            elseif (in_array('Ixia', $user->roles)) {
                return home_url('/client-pages/ixia-post'); // Ixiaの指定ページ
            }
            // 銀座のエステのユーザー用
            elseif (in_array('銀座のエステ', $user->roles)) {
                return home_url('/client-pages/ginzanoeste-post'); // 銀座のエステの指定ページ
            }
            // Honey＋Plusのユーザー用
            elseif (in_array('Honey+Plus', $user->roles)) {
                return home_url('/client-pages/honeyplus-post'); // Honey+Plusの指定ページ
            }
            // Unknownのユーザー用
            elseif (in_array('Unknown', $user->roles)) {
                return home_url('/client-pages/unknown-post'); // Unknownの指定ページ
            }
            // メンズエステ松山のユーザー用
            elseif (in_array('メンズエステ松山', $user->roles)) {
                return home_url('/client-pages/mem-post'); // メンズエステ松山の指定ページ
            }
            // SUHADA SPAのユーザー用
            elseif (in_array('SUHADA SPA', $user->roles)) {
                return home_url('/client-pages/suhada-spa-post'); // SUHADA SPAの指定ページ
            }
            // M LABO SPAのユーザー用
            elseif (in_array('M LABO SPA', $user->roles)) {
                return home_url('/client-pages/m-labo-spa-post'); // M LABO SPAの指定ページ
            }
            // Awesome Spaのユーザー用
            elseif (in_array('Awesome spa', $user->roles)) {
                return home_url('/client-pages/awesome-spa-post'); // Awesome Spaの指定ページ
            }
            // きゅーてぃー♡はにーのユーザー用
            elseif (in_array('きゅーてぃー♡はにー', $user->roles)) {
                return home_url('/client-pages/cutie-honey-post'); // きゅーてぃー♡はにーの指定ページ
            }
            // 秘密のミセスルームのユーザー用
            elseif (in_array('秘密のミセスルーム', $user->roles)) {
                return home_url('/client-pages/himitsu-mrsroom-post'); // 秘密のミセスルームの指定ページ
            }
            // 蛍屋金沢のユーザー用
            elseif (in_array('蛍屋金沢', $user->roles)) {
                return home_url('/client-pages/hotaruya-kanazawa-post'); // 蛍屋金沢の指定ページ
            }
            // LuxTimeのユーザー用
            elseif (in_array('LuxTime', $user->roles)) {
                return home_url('/client-pages/luxtime-post'); // LuxTimeの指定ページ
            }
            // SUIのユーザー用
            elseif (in_array('SUI', $user->roles)) {
                return home_url('/client-pages/sui-post'); // SUIの指定ページ
            }
            // Aroma melのユーザー用
            elseif (in_array('Aroma mel', $user->roles)) {
                return home_url('/client-pages/aroma-mel-post'); // Aroma melの指定ページ
            }
            // アロマ NICOのユーザー用
            elseif (in_array('アロマ NICO', $user->roles)) {
                return home_url('/client-pages/aroma-nico-post'); // アロマ NICOの指定ページ
            }
            // その他のユーザーには一般ページ
            else {
                return home_url('/client-pages/general');
            }
        }
    
        return $redirect_to;  // それ以外の処理を継続
    }
    add_filter('login_redirect', 'custom_login_redirect', 10, 3);
}


// ユーザーごとにクライアントページのアクセス制限
function restrict_client_page_access() {
    if (is_singular('post') && strpos(get_permalink(), home_url('/client-pages/')) !== false) {
        $user = wp_get_current_user(); // ログイン中のユーザーを取得

        // ユーザーのロールを確認
        if (isset($user->roles) && is_array($user->roles)) {
            // 神のエステ練馬ユーザーのページ制限
            if (in_array('神のエステ練馬', $user->roles) && !is_page('kami-nerima-post')) {
                wp_redirect(home_url('/client-pages/kami-nerima-post'));  // 他のページにアクセスした場合、指定ページにリダイレクト
                exit;
            }
            // 神のエステ秋葉原ユーザーのページ制限
            elseif (in_array('神のエステ秋葉原', $user->roles) && !is_page('kami-akihabara-post')) {
                wp_redirect(home_url('/client-pages/kami-akihabara-post'));
                exit;
            }
            // Puluntユーザーのページ制限
            elseif (in_array('Pulunt', $user->roles) && !is_page('pulunt-post')) {
                wp_redirect(home_url('/client-pages/pulunt-post'));
                exit;
            }
            // adachiユーザーのページ制限
            elseif (in_array('adachi', $user->roles) && !is_page('pulunt-post')) {
                wp_redirect(home_url('/client-pages/pulunt-post'));
                exit;
            }
            // APEXユーザーのページ制限
            elseif (in_array('Apex', $user->roles) && !is_page('apex-post')) {
                wp_redirect(home_url('/client-pages/apex-post'));
                exit;
            }
            // GRACEユーザーのページ制限
            elseif (in_array('GRACE', $user->roles) && !is_page('grace-post')) {
                wp_redirect(home_url('/client-pages/grace-post'));
                exit;
            }
            // ChillAromaのユーザーのページ制限
            elseif (in_array('ChillAroma', $user->roles) && !is_page('chillaroma-post')) {
                wp_redirect(home_url('/client-pages/chillaroma-post'));
                exit;
            }
            // Bazu-caユーザーのページ制限
            elseif (in_array('Bazu-ca', $user->roles) && !is_page('bazu-ca-post')) {
                wp_redirect(home_url('/client-pages/bazu-ca-post'));
                exit;
            }
            // とろり沼ユーザーのページ制限
            elseif (in_array('とろり沼', $user->roles) && !is_page('tororinuma-post')) {
                wp_redirect(home_url('/client-pages/tororinuma-post'));
                exit;
            }
            // AROMA MRS.ユーザーのページ制限
            elseif (in_array('AROMA MRS.', $user->roles) && !is_page('aroma-mrs-post')) {
                wp_redirect(home_url('/client-pages/aroma-mrs-post'));
                exit;
            }
            // むちむちお姉さんのユーザーのページ制限
            elseif (in_array('むちむちお姉さん', $user->roles) && !is_page('muchione-post')) {
                wp_redirect(home_url('/client-pages/muchione-post'));
                exit;
            }
            // Ixiaのユーザーのページ制限
            elseif (in_array('Ixia', $user->roles) && !is_page('ixia-post')) {
                wp_redirect(home_url('/client-pages/ixia-post'));
                exit;
            }
            // 銀座のエステのユーザーのページ制限
            elseif (in_array('銀座のエステ', $user->roles) && !is_page('ginzanoeste-post')) {
                wp_redirect(home_url('/client-pages/ginzanoeste-post'));
                exit;
            }
            // Honey＋Plusのユーザーのページ制限
            elseif (in_array('Honey＋Plus', $user->roles) && !is_page('honeyplus-post')) {
                wp_redirect(home_url('/client-pages/honeyplus-post'));
                exit;
            }
            // Unknownのユーザーのページ制限
            elseif (in_array('Unknown', $user->roles) && !is_page('unknown-post')) {
                wp_redirect(home_url('/client-pages/unknown-post'));
                exit;
            }
            // メンズエステ松山のユーザーのページ制限
            elseif (in_array('メンズエステ松山', $user->roles) && !is_page('mem-post')) {
                wp_redirect(home_url('/client-pages/mem-post'));
                exit;
            }
            // SUHADA SPAのユーザーのページ制限
            elseif (in_array('SUHADA SPA', $user->roles) && !is_page('suhada-spa-post')) {
                wp_redirect(home_url('/client-pages/suhada-spa-post'));
                exit;
            }
            // M LABO SPAのユーザーのページ制限
            elseif (in_array('M LABO SPA', $user->roles) && !is_page('m-labo-spa-post')) {
                wp_redirect(home_url('/client-pages/m-labo-spa-post'));
                exit;
            }
            // Awesome spaのユーザーのページ制限
            elseif (in_array('Awesome spa', $user->roles) && !is_page('awesome-spa-post')) {
                wp_redirect(home_url('/client-pages/awesome-spa-post'));
                exit;
            }
            // きゅーてぃー♡はにーのユーザーのページ制限
            elseif (in_array('きゅーてぃー♡はにー', $user->roles) && !is_page('cutie-honey-post')) {
                wp_redirect(home_url('/client-pages/cutie-honey-post'));
                exit;
            }
            // 秘密のミセスルームのユーザーのページ制限
            elseif (in_array('秘密のミセスルーム', $user->roles) && !is_page('himitsu-mrsroom-post')) {
                wp_redirect(home_url('/client-pages/himitsu-mrsroom-post'));
                exit;
            }
            // 蛍屋金沢のユーザーのページ制限
            elseif (in_array('蛍屋金沢', $user->roles) && !is_page('hotaruya-kanazawa-post')) {
                wp_redirect(home_url('/client-pages/hotaruya-kanazawa-post'));
                exit;
            }
            // LuxTimeのユーザーのページ制限
            elseif (in_array('LuxTime', $user->roles) && !is_page('luxtime-post')) {
                wp_redirect(home_url('/client-pages/luxtime-post'));
                exit;
            }
            // SUIのユーザーのページ制限
            elseif (in_array('SUI', $user->roles) && !is_page('sui-post')) {
                wp_redirect(home_url('/client-pages/sui-post'));
                exit;
            }
            // Aroma melのユーザーのページ制限
            elseif (in_array('Aroma mel', $user->roles) && !is_page('aroma-mel-post')) {
                wp_redirect(home_url('/client-pages/aroma-mel-post'));
                exit;
            }
            // アロマ NICOのユーザーのページ制限
            elseif (in_array('アロマ NICO', $user->roles) && !is_page('aroma-nico-post')) {
                wp_redirect(home_url('/client-pages/aroma-nico-post'));
                exit;
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
