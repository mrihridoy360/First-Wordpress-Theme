<?php get_header(); ?>

<main>
    <div class="container">
        <?php
        while (have_posts()) : the_post();
            get_template_part('template-parts/content', 'single');
            
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>