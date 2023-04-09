<?php get_header(); ?>

<style>
    article.post img {
        max-height: 450px;
    }
</style>


<?php $category = get_the_category(); // Récupération de la catégorie
$category_name = strtolower($category[0]->name); // Récupération du nom de la catégorie et formatage en minuscule 
?>

<section class="single-post <?php echo ($category_name) ?>">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="post" style="max-width: 100%;">
                <?php the_post_thumbnail(); ?>

                <h1><?php the_title(); ?></h1>
                <div class="post__meta">
                    <p>
                        Publié le <?php the_date(); ?> - <?php the_category($separator = '-'); ?>
                    </p>
                </div>

                <div class="post__content">
                    <?php the_content(); ?>
                </div>
                <div class="post__comments">
                    <?php comments_template(); ?>
                </div>
            </article>
    <?php endwhile;
    endif; ?>
</section>
<?php get_footer(); ?>