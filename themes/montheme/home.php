<?php
get_header(); 
?>

<h2>Our Blog</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

<?php if ( have_posts() ) : ?>

    <ul class="article">
        <?php while ( have_posts() ) : the_post(); ?>
        
        
            <li>
                <?php the_post_thumbnail(); ?>
            </li>

            <li>
                <a href="<?= the_permalink(); ?>"><?= the_title(); ?></a>
            </li>
            <li>
        
            <?php the_time('d/m/Y'); ?>
            

            <?php the_category(); ?>
            </li>
            <li>
                <?php the_excerpt(); ?>
            </li>
        <?php endwhile; ?>


    </ul>


<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>



<?php
get_footer(); 
?>
