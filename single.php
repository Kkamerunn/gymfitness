<?php get_header(); ?>

<?php while(have_posts()): the_post(); ?>
    <h1><?php the_title() ?></h1>
    <?php the_content() ?>
    <p>Written by: <?php the_author() ?> on <?php the_date() ?></p>
<?php endwhile; ?>

<?php get_footer(); ?>