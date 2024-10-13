<?php
/**
 * The template for displaying WooCommerce pages
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <?php woocommerce_content(); ?>
        </div>
    </main>
</div>

<?php
get_footer();