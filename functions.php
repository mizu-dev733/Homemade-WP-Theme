<?php
function mytheme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mytheme_setup');


// 画像のカスタムサイズの設定
function image_sizes()
{
    add_image_size('medium-size', 600, 400, true);
    add_image_size('just-size', 800, 533, true);
}
add_action('after_setup_theme', 'image_sizes');

function just_sizes_in_media_selector($sizes)
{
    return array_merge($sizes, array(
        'extra-size' => __('ミディアムサイズ'),
        'just-size'  => __('ジャストサイズ'),

    ));
}
add_filter('image_size_names_choose', 'just_sizes_in_media_selector');


//Google Fontsを読み込み
function enqueue_google_fonts()
{
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&family=Marcellus&display=swap',
        false
    );
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');


// Splideを読み込み
function enqueue_splide_assets()
{
    wp_enqueue_style('splide-css', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array(), '4.1.4');
    wp_enqueue_script('splide-js', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), '4.1.4', true);
    wp_enqueue_script('splide-js-ex', 'https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js', array('splide-js'), '4.1.4', true);
}
add_action('wp_enqueue_scripts', 'enqueue_splide_assets');

function theme_enqueue_scripts()
{
    // common.jsを常に読み込む
    wp_enqueue_script(
        'common-script',
        get_template_directory_uri() . '/js/common.js',
        array(),
        '1.0.0',
        true
    );

    // トップページを判定
    if (is_front_page() && file_exists(get_template_directory() . '/js/home.js')) {
        wp_enqueue_script(
            'home-script',
            get_template_directory_uri() . '/js/home.js',
            array('common-script'),
            '1.0.0',
            true
        );
    }

    // 現在のページスラッグを取得
    $page_slug = get_post_field('post_name', get_queried_object_id());

    // 対応するスクリプトが存在すれば読み込む
    if ($page_slug && file_exists(get_template_directory() . "/js/{$page_slug}.js")) {
        wp_enqueue_script(
            "{$page_slug}-script",
            get_template_directory_uri() . "/js/{$page_slug}.js",
            array('common-script'),
            '1.0.0',
            true
        );
    }

    // カスタム投稿タイプ 'works' のシングルページで特定のスクリプトを読み込む
    if (is_singular('works') && file_exists(get_template_directory() . '/js/works-post.js')) {
        wp_enqueue_script(
            'works-post-script',
            get_template_directory_uri() . '/js/works-post.js',
            array('common-script'),
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


// スラッグを body id に設定
function custom_body_id($id)
{
    if (is_singular()) {
        $slug = get_post_field('post_name', get_post());
        return $slug;
    }
    return $id;
}
add_filter('body_id', 'custom_body_id');

//リライトルール
// function custom_rewrite_rules()
// {
//     add_rewrite_rule(
//         '^news/page/([0-9]+)/?$',
//         'index.php?post_type=post&paged=$matches[1]',
//         'top'
//     );
// }
// add_action('init', 'custom_rewrite_rules');


////管理画面
//
//カスタム投稿タイプ一覧にタクソノミーの欄を追加
function my_custom_column($columns)
{
    $columns['type_works'] = 'カテゴリ';
    return $columns;
}
add_filter('manage_works_posts_columns', 'my_custom_column');

function my_custom_column_id($column_name, $id)
{
    $terms = get_the_terms($id, $column_name);
    if ($terms && !is_wp_error($terms)) {
        $menu_terms = array();
        foreach ($terms as $term) {
            $menu_terms[] = $term->name;
        }
        echo join(", ", $menu_terms);
    }
}
add_action('manage_works_posts_custom_column', 'my_custom_column_id', 10, 2);


//絞り込み機能
function my_add_filter()
{
    global $post_type;
    if ('works' == $post_type) {
?>
        <select name="type_works">
            <option value="">すべてのカテゴリー</option>
            <?php
            $terms = get_terms('type_works');
            foreach ($terms as $term) {
            ?>
                <option value="<?php echo $term->slug; ?>" <?php if (isset($_GET['type_works']) && $_GET['type_works'] == $term->slug) {
                                                                print 'selected';
                                                            } ?>><?php echo $term->name; ?>
                </option>
            <?php
            }
            ?>
        </select>
<?php
    }
}
add_action('restrict_manage_posts', 'my_add_filter');
