<?php
// パンくずリスト
function breadcrumb()
{
    $home = '<li class="c-breadcrumb__list"><a class="c-breadcrumb__href" href="' . get_bloginfo('url') . '">ホーム</a></li>';

    echo '<ul class="c-breadcrumb">';
    if (is_front_page()) {
        // トップページの場合は表示させない
    }
    // カテゴリページ
    else if (is_category()) {
        $cat = get_queried_object();
        $cat_id = $cat->parent;
        $cat_list = array();
        while ($cat_id != 0) {
            $cat = get_category($cat_id);
            $cat_link = get_category_link($cat_id);
            array_unshift($cat_list, '<li class="c-breadcrumb__list"><a class="c-breadcrumb__href" href="' . $cat_link . '">' . $cat->name . '</a></li>');
            $cat_id = $cat->parent;
        }
        echo $home;
        foreach ($cat_list as $value) {
            echo $value;
        }
        echo '<li class="c-breadcrumb__list">' . single_cat_title('', false) . '</li>';
    }
    // アーカイブ・タグページ
    else if (is_archive()) {
        echo $home;
        $archive_title = get_the_archive_title();
        $archive_title = preg_replace('/^.*:/', '', $archive_title); // 「アーカイブ：」や「カテゴリー：」を削除
        $archive_title = strip_tags($archive_title); // <span> タグなどを削除
        echo '<li class="c-breadcrumb__list">' . esc_html($archive_title) . '</li>';
    }
    // 投稿ページ
    else if (is_single()) {
        $post_type = get_post_type();

        // カスタム投稿タイプ 'works' の場合
        if ($post_type === 'works') {
            $terms = get_the_terms(get_the_ID(), 'type_works'); // 'type_works' はカスタムタクソノミー名
            if ($terms && !is_wp_error($terms)) {
                $term = $terms[0]; // 最初のタームを取得
                $term_id = $term->term_id;
                $term_list = array();

                // 親タームを辿る
                while ($term_id != 0) {
                    $term = get_term($term_id, 'type_works');
                    $term_link = get_term_link($term_id, 'type_works');
                    array_unshift($term_list, '<li class="c-breadcrumb__list"><a class="c-breadcrumb__href" href="' . $term_link . '">' . $term->name . '</a></li>');
                    $term_id = $term->parent;
                }
                echo $home;
                // タームリストを出力
                foreach ($term_list as $value) {
                    echo $value;
                }
            }
        } else {
            // 標準の投稿タイプの場合
            $cat = get_the_category();
            if (isset($cat[0]->cat_ID)) $cat_id = $cat[0]->cat_ID;
            $cat_list = array();
            while ($cat_id != 0) {
                $cat = get_category($cat_id);
                $cat_link = get_category_link($cat_id);
                array_unshift($cat_list, '<li class="c-breadcrumb__list"><a class="c-breadcrumb__href" href="' . $cat_link . '">' . $cat->name . '</a></li>');
                $cat_id = $cat->parent;
            }
            echo $home;
            foreach ($cat_list as $value) {
                echo $value;
            }
        }

        // 投稿タイトルを出力
        the_title('<li class="c-breadcrumb__list">', '</li>');
    }
    // 固定ページ
    else if (is_page()) {
        echo $home;
        the_title('<li class="c-breadcrumb__list">', '</li>');
    }
    // お知らせページ用
    else if (is_home()) {
        echo $home;
        echo '<li class="c-breadcrumb__list">新着情報</li>';
    }
    // 404ページの場合
    else if (is_404()) {
        echo $home;
        echo '<li class="c-breadcrumb__list">ページが見つかりません</li>';
    }
    echo "</ul>";
}
breadcrumb();
