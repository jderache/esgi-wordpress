<?php
if (post_password_required()) {
    return;
}
?>
<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ($comments_number === 1) {
                printf(
                    /* traducteurs : %s : titre de l'article */
                    esc_html__('Un commentaire sur &ldquo;%s&rdquo;', 'theme_name'),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    /* traducteurs : 1 : nombre de commentaires, 2 : titre de l'article */
                    esc_html__('%1$s commentaires sur &ldquo;%2$s&rdquo;', 'theme_name'),
                    '<span>' . esc_html(number_format_i18n($comments_number)) . '</span>',
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
            ));
            ?>
        </ol>

        <?php
        the_comments_pagination(array(
            'prev_text' => '<span class="screen-reader-text">' . esc_html__('Précédent', 'theme_name') . '</span>',
            'next_text' => '<span class="screen-reader-text">' . esc_html__('Suivant', 'theme_name') . '</span>',
        ));
        ?>

    <?php endif; ?>

    <div class="comment-form">
        <?php
        $comment_args = array(
            'title_reply'          => esc_html__('Laisser un commentaire', 'theme_name'),
            'fields'               => array(
                'author'            => '<div class="comment-form-author"><label for="author">' . esc_html__('Nom', 'theme_name') . '</label> ' . ($req ? '<span class="required">*</span>' : '') . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" ' . ($req ? 'required' : '') . ' /></div>',
                'email'             => '<div class="comment-form-email"><label for="email">' . esc_html__('Email', 'theme_name') . '</label> ' . ($req ? '<span class="required">*</span>' : '') . '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" ' . ($req ? 'required' : '') . ' /></div>',
                'url'               => '<div class="comment-form-url"><label for="url">' . esc_html__('Site Web', 'theme_name') . '</label>' . '<input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div>'
            ),
            'comment_field'        => '<div class="comment-form-comment"><label for="comment">' . esc_html__('Commentaire', 'theme_name') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea></div>',
            'comment_notes_before' => '<p class="comment-notes">' . esc_html__('Votre adresse email ne sera pas publiée.', 'theme_name') . ($req ? '<span class="required">*</</span>' : '') . '</p>',
            'comment_notes_after' => '',
            'class_submit' => 'button',
            'label_submit' => esc_html__('Publier le commentaire', 'theme_name'),
        );
        ?>
        <?php comment_form($comment_args); ?>
    </div>

</div> <!-- #comments -->