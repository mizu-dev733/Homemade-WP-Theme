<?php get_header(); ?>
<?php get_template_part('template-parts/lower-mv'); ?>

<main>
    <section class="p-recruit-intro">
        <div class="p-recruit-intro__inner">
            <div class="p-recruit-intro__head ">
                <div class="p-recruit-intro__img-wrap js-scroll-in">
                    <picture class="p-recruit-intro__picture">
                        <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/images/recruit/intro01_sp.webp">
                        <img class="p-recruit-intro__image" src="<?php echo get_template_directory_uri(); ?>/images/recruit/intro01_pc.webp" alt="未来を見据え前を向く男性作業員">
                    </picture>
                </div>
                <div class="p-recruit-intro__title js-scroll-in">
                    <div class="p-recruit-intro__title-inner">
                        <span class="p-recruit-intro__en">Message</span>
                        <h2 class="p-recruit-intro__ja">
                            共に成長できる、<br>
                            温かいチームがここにある。
                        </h2>
                    </div>
                </div>
            </div>
            <div class="p-recruit-intro__cont">
                <p class="p-recruit-intro__lead">
                    西門建設工業は、チームワークを何よりも大切にする建設会社です。経験豊富な先輩社員が丁寧に指導しますので、未経験の方でも安心して成長できます。チーム一丸となって目標を達成する喜びを分かち合い、地域に密着した建設のプロフェッショナルを目指しましょう。
                </p>
                <p class="p-recruit-intro__lead">
                    地域社会の発展に貢献するという共通の目標に向かって、私たちは日々業務に取り組んでいます。お客様との距離が近く、直接感謝の言葉をいただけることも大きなやりがいです。温かい仲間と共に成長しながら、地域を支える喜びを実感してください。
                </p>
            </div>
        </div>
    </section>
    <section class="p-recruit-requirements">
        <div class="p-recruit-requirements__inner">
            <div class="p-recruit-requirements__head js-scroll-in">
                <span class="p-recruit-requirements__en">Requirements</span>
                <h2 class="p-recruit-requirements__title">募集要項</h2>
            </div>
            <div class="p-recruit-requirements__cont">
                <?php
                // タブ切り替えに必要なカスタムフィールドを取得
                $type_1 = get_field('construction'); // 建築技能職人
                $type_2 = get_field('civil_engineering'); // 土木技能職人
                $type_3 = get_field('general_position'); // 総合職
                $type_4 = get_field('clerk'); // 事務員
                ?>

                <!-- タブ1: 建築技能職人 --><input id="tab-1" type="radio" name="tab" checked><label class="p-recruit-requirements__tab" for="tab-1">建築技能職人</label><!-- タブ2: 土木技能職人 --><input id="tab-2" type="radio" name="tab"><label class="p-recruit-requirements__tab" for="tab-2">土木技能職人</label><!-- タブ3: 総合職 --><input id="tab-3" type="radio" name="tab"><label class="p-recruit-requirements__tab" for="tab-3">総合職</label><!-- タブ4: 事務員 --><input id="tab-4" type="radio" name="tab"><label class="p-recruit-requirements__tab" for="tab-4">事務員</label>

                <!-- タブ内容 -->
                <div class="p-recruit-requirements__tab-content" id="content-tab-1">
                    <h3 class="p-recruit-requirements__tab-content-title">建築技能職人</h3>
                    <dl class="p-recruit-requirements__details">
                        <dt class="p-recruit-requirements__details-title">業務内容</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_1['cont'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">給料</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_1['salary'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">雇用形態</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_1['employment'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">勤務地</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_1['place'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">営業時間</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_1['hours'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">休日</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_1['holiday'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">資格</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_1['qualfications'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">福利厚生</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_1['welfare'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">応募方法</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo $type_1['how_to']; ?></dd>

                        <dt class="p-recruit-requirements__details-title">備考</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_1['remarks'])); ?></dd>
                    </dl>
                </div>

                <div class="p-recruit-requirements__tab-content" id="content-tab-2">
                    <h3 class="p-recruit-requirements__tab-content-title">土木技能職人</h3>
                    <dl class="p-recruit-requirements__details">
                        <dt class="p-recruit-requirements__details-title">業務内容</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_2['cont'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">給料</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_2['salary'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">雇用形態</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_2['employment'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">勤務地</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_2['place'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">営業時間</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_2['hours'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">休日</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_2['holiday'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">資格</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_2['qualfications'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">福利厚生</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_2['welfare'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">応募方法</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo $type_2['how_to']; ?></dd>

                        <dt class="p-recruit-requirements__details-title">備考</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_2['remarks'])); ?></dd>
                    </dl>
                </div>

                <div class="p-recruit-requirements__tab-content" id="content-tab-3">
                    <h3 class="p-recruit-requirements__tab-content-title">総合職</h3>
                    <dl class="p-recruit-requirements__details">
                        <dt class="p-recruit-requirements__details-title">業務内容</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_3['cont'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">給料</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_3['salary'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">雇用形態</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_3['employment'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">勤務地</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_3['place'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">営業時間</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_3['hours'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">休日</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_3['holiday'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">資格</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_3['qualfications'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">福利厚生</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_3['welfare'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">応募方法</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo $type_3['how_to']; ?></dd>

                        <dt class="p-recruit-requirements__details-title">備考</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_3['remarks'])); ?></dd>
                    </dl>
                </div>

                <div class="p-recruit-requirements__tab-content" id="content-tab-4">
                    <h3 class="p-recruit-requirements__tab-content-title">事務員</h3>
                    <dl class="p-recruit-requirements__details">
                        <dt class="p-recruit-requirements__details-title">業務内容</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_4['cont'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">給料</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_4['salary'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">雇用形態</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_4['employment'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">勤務地</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_4['place'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">営業時間</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_4['hours'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">休日</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_4['holiday'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">資格</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_4['qualfications'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">福利厚生</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_4['welfare'])); ?></dd>

                        <dt class="p-recruit-requirements__details-title">応募方法</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo $type_4['how_to']; ?></dd>

                        <dt class="p-recruit-requirements__details-title">備考</dt>
                        <dd class="p-recruit-requirements__details-disc"><?php echo nl2br(esc_html($type_4['remarks'])); ?></dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>
    <section class="p-recruit-cta" id="cv">
        <?php get_template_part('template-parts/cta'); ?>
    </section>
</main>

<?php get_footer(); ?>