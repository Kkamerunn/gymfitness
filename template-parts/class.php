<?php while(have_posts()): the_post(); ?>
    <h1 class="text-center text-primary"><?php the_title(); ?></h1>
    <?php 
        if (has_post_thumbnail()) {
            the_post_thumbnail('full', array('class' => 'featured-img'));
        }
        ?>
         <?php 
            $start_time = get_field('start_time');
            $finish_time = get_field('finish_time');
        ?>
        <p class="class-info">
            <?php the_field('lessons_days'); ?> - 
            <?php echo $start_time . " to " . $finish_time; ?>
        </p>
    <?php the_content(); ?>
<?php endwhile; ?>