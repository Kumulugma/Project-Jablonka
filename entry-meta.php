<div class="entry-meta">
    <span class="author vcard"<?php if ( is_single() ) { echo ' itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name">'; } else { echo '><span>'; } ?><?php the_author_posts_link(); ?></span></span>
    <span class="meta-sep"> | </span>
    <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" title="<?php echo esc_attr( get_the_date() ); ?>" <?php if ( is_single() ) { echo 'itemprop="datePublished" pubdate'; } ?>><?php echo get_the_date(); ?></time>
    <?php if ( is_single() ) { echo '<meta itemprop="dateModified" content="' . esc_attr( get_the_modified_date( 'c' ) ) . '">'; } ?>
    
    <?php if ( has_category() ) : ?>
        <span class="meta-sep"> | </span>
        <span class="cat-links">
            <?php esc_html_e( 'Kategoria: ', 'k3e' ); ?>
            <?php the_category( ', ' ); ?>
        </span>
    <?php endif; ?>
    
    <?php if ( comments_open() && !is_single() ) : ?>
        <span class="meta-sep"> | </span>
        <span class="comments-link">
            <a href="<?php echo esc_url( get_comments_link() ); ?>">
                <?php
                $comment_count = get_comments_number();
                if ( $comment_count == 0 ) {
                    esc_html_e( 'Brak komentarzy', 'k3e' );
                } elseif ( $comment_count == 1 ) {
                    esc_html_e( '1 komentarz', 'k3e' );
                } else {
                    printf( 
                        esc_html( _n( '%s komentarz', '%s komentarzy', $comment_count, 'k3e' ) ),
                        number_format_i18n( $comment_count )
                    );
                }
                ?>
            </a>
        </span>
    <?php endif; ?>
</div>

<style>
.entry-meta {
    font-size: 0.875rem;
    color: #6c757d;
    margin-bottom: 1rem;
    padding: 0.5rem 0;
    border-bottom: 1px solid #eee;
}

.entry-meta a {
    color: var(--primary-color);
    text-decoration: none;
}

.entry-meta a:hover {
    color: #b54c3c;
    text-decoration: underline;
}

.entry-meta .meta-sep {
    margin: 0 0.5rem;
    opacity: 0.6;
}

.entry-meta .author,
.entry-meta .entry-date,
.entry-meta .cat-links,
.entry-meta .comments-link {
    display: inline-block;
}

.entry-meta .cat-links a {
    background: rgba(216, 30, 30, 0.1);
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.75rem;
    text-transform: uppercase;
    font-weight: 600;
    margin-left: 0.25rem;
}

.entry-meta .cat-links a:hover {
    background: rgba(216, 30, 30, 0.2);
    text-decoration: none;
}
</style>