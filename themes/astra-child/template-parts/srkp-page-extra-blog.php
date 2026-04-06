<?php
/**
 * Extra content for blog template.
 *
 * @package Astra_Child
 */

$recent_posts = new WP_Query(
    array(
        'post_type'      => 'post',
        'posts_per_page' => 6,
    )
);

if ( $recent_posts->have_posts() ) :
    ?>
    <div class="srkp-blog-list">
        <?php
        while ( $recent_posts->have_posts() ) :
            $recent_posts->the_post();
            ?>
            <article class="srkp-blog-card anim-scroll anim-fade-down">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
            </article>
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
<?php else : ?>
    <div class="srkp-page-cta">
        <h3>Blog posts abhi add hone baaki hain</h3>
        <p>Layout ready hai. Jaise hi posts publish hongi, yahan automatic show ho jayengi.</p>
    </div>
<?php endif; ?>
