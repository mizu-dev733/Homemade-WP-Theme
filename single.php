<?php get_header(); ?>
<?php get_template_part('template-parts/lower-mv'); ?>

<main>

    <div class="p-news-post">
        <div class="p-news-post__inner l-inner">
            <div class="p-news-post__head">
                <div class="p-news-post__info">
                    <span class="p-news-post__date">
                        <?php echo get_the_time(('Y.m.d')); ?>
                    </span>
                    <span class="p-news-post__category">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            echo esc_html($categories[0]->name);
                        }
                        ?>
                    </span>
                </div>
                <h2 class="p-news-post__title">
                    <?php the_title(); ?>
                </h2>
            </div>

            <div class="p-news-post__cont">
                <?php the_content(); ?>
            </div>

            <!-- ページネーション -->
            <div class="p-news-post__pagination">
                <ul class="p-news-post__pagination-list">
                    <li class="p-news-post__pagination-item">
                        <?php
                        $prev_post = get_previous_post();
                        if ($prev_post) {
                            echo '<a href="' . get_permalink($prev_post->ID) . '" class="p-news-post__pagination-link p-news-post__pagination-prev">前の記事</a>';
                        }
                        ?>
                    </li>

                    <li class="p-news-post__pagination-item">
                        <a href="<?php echo get_template_directory_uri(); ?>/news/" class="p-news-post__pagination-link p-news-post__pagination-back">
                            <span style="display: inline-block;">新着情報</span><span style="display: inline-block;">一覧に戻る</span></a>
                    </li>

                    <li class="p-news-post__pagination-item">
                        <?php
                        $next_post = get_next_post();
                        if ($next_post) {
                            echo '<a href="' . get_permalink($next_post->ID) . '" class="p-news-post__pagination-link p-news-post__pagination-next">次の記事</a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>

        </div>
    </div>

</main>
<?php get_footer(); ?>