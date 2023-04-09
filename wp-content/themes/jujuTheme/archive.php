<?php get_header(); ?>
<div>
    <h1 class="page-title"><?php single_cat_title(); ?></h1>
    <section class="posts">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="post">
                    <h2><?php the_title(); ?></h2>

                    <?php the_post_thumbnail(); ?>

                    <p class="post__meta">
                        Publié le <?php the_time(get_option('date_format')); ?> - <?php the_category($separator = '-'); ?> - <?php comments_number(); ?>
                    </p>

                    <?php the_excerpt(); ?>

                    <p>
                        <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
                    </p>
                </article>
        <?php endwhile;
        endif; ?>
    </section>
</div>
<?php get_footer(); ?>