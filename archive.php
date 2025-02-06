<?php get_header(); ?>
<?php get_template_part('template-parts/lower-mv'); ?>

<article class="p-archive">
    <div class="p-archive__inner l-inner">
        <h2 class="p-archive__title">
            <?php single_term_title(); ?>
        </h2>
        <div class="p-archive__cont">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <!-- 繰り返したい内容　ここから -->
                    <div class="p-archive__item js-scroll-in">
                        <a href="<?php the_permalink(); ?>" class="p-archive__item-link">
                            <div class="p-archive__item-info">
                                <span class="p-archive__item-date">
                                    <?php echo get_the_time(('Y.m.d')); ?>
                                </span>
                                <span class="p-archive__item-category">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                                </span>
                            </div>
                            <h3 class="p-archive__item-title">
                                <?php the_title(); ?>
                            </h3>
                        </a>
                    </div>
                    <!-- 繰り返したい内容　ここまで -->
                <?php endwhile; ?>
            <?php else : ?>
                <p>まだ投稿はありません。</p>
            <?php endif; ?>
        </div>
    </div>
</article>

<?php get_footer(); ?>