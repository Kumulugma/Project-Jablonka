<?php
$navigation = get_the_posts_navigation( array(
    'prev_text' => sprintf( 
        '<span class="nav-subtitle">%s</span><span class="nav-title">%s</span>',
        esc_html__( 'Poprzednie', 'k3e' ),
        esc_html__( 'Starsze wpisy', 'k3e' )
    ),
    'next_text' => sprintf( 
        '<span class="nav-subtitle">%s</span><span class="nav-title">%s</span>',
        esc_html__( 'Następne', 'k3e' ),
        esc_html__( 'Nowsze wpisy', 'k3e' )
    ),
    'screen_reader_text' => esc_html__( 'Nawigacja między stronami', 'k3e' ),
) );

if ( $navigation ) {
    echo '<nav class="posts-navigation" role="navigation" aria-label="' . esc_attr__( 'Nawigacja między stronami', 'k3e' ) . '">';
    echo $navigation;
    echo '</nav>';
}
?>

<style>
.posts-navigation {
    margin: 3rem 0;
    padding: 2rem 0;
    border-top: 2px solid #eee;
}

.posts-navigation .nav-links {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 2rem;
}

.posts-navigation .nav-previous,
.posts-navigation .nav-next {
    flex: 1;
    max-width: 45%;
}

.posts-navigation .nav-next {
    text-align: right;
}

.posts-navigation a {
    display: block;
    padding: 1rem 1.5rem;
    background: white;
    border: 2px solid var(--primary-color);
    border-radius: 8px;
    text-decoration: none;
    color: var(--primary-color);
    transition: all 0.3s ease;
}

.posts-navigation a:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(216, 30, 30, 0.2);
}

.posts-navigation .nav-subtitle {
    display: block;
    font-size: 0.875rem;
    font-weight: 400;
    opacity: 0.8;
    margin-bottom: 0.25rem;
}

.posts-navigation .nav-title {
    display: block;
    font-weight: 600;
    font-size: 1rem;
}

.posts-navigation .nav-previous .nav-subtitle::before {
    content: '← ';
}

.posts-navigation .nav-next .nav-subtitle::after {
    content: ' →';
}

@media (max-width: 768px) {
    .posts-navigation .nav-links {
        flex-direction: column;
    }
    
    .posts-navigation .nav-previous,
    .posts-navigation .nav-next {
        max-width: 100%;
        text-align: center;
    }
}
</style>