<?php get_header(); ?>
<div>
    <h1>Films à l'affiche</h1>
    <?php add_action('wp_footer', 'afficher_compteur_pages_vues'); ?>
    <?php
    // Action pour incrémenter le compteur de pages vues à chaque chargement de page
    add_action('wp_head', 'incrementer_compteur_pages_vues');
    ?>
    <section class="posts">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article class="post">
                    <a href="<?php the_permalink(); ?>" class="">
                        <h2><?php the_title(); ?></h2>
                        <p>Catégorie <?php the_category($separator = '-'); ?></p>

                        <?php the_post_thumbnail(); ?>

                        <p class="post__meta">
                            Publié le <?php the_time(get_option('date_format')); ?> - <?php the_category($separator = '-'); ?> - <?php comments_number(); ?>
                        </p>

                        <?php the_excerpt(); ?>

                        <p>
                            <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
                        </p>
                    </a>
                </article>


        <?php endwhile;

        endif; ?>
    </section>
</div>
<?php get_footer(); ?>