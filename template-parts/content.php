<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
    </header>
    
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('medium'); ?>
        </div>
    <?php endif; ?>
    
    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>
    
    <footer>
        <?php
        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <?php
                custom_wp_theme_posted_on();
                custom_wp_theme_posted_by();
                ?>
            </div>
        <?php endif; ?>
    </footer>
</article>