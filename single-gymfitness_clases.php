<?php 
    get_header(); 
?>

<main class="container section with-sidebar">
    <section class="main-content">
        <?php get_template_part('template-parts/class'); ?>
    </section>
    <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>