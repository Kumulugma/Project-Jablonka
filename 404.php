<?php get_header(); ?>

<main class="container-fluid py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6 text-center">
      <article class="error-404 not-found">
        <header class="page-header mb-4">
          <h1 class="page-title display-1 text-primary">404</h1>
          <h2 class="page-subtitle"><?php esc_html_e( 'Strona nie została znaleziona', 'k3e' ); ?></h2>
        </header>
        
        <div class="page-content">
          <p class="lead mb-4">
            <?php esc_html_e( 'Strona, której szukasz, nie istnieje lub została przeniesiona. Spróbuj wyszukać to, czego potrzebujesz.', 'k3e' ); ?>
          </p>
          
          <div class="search-form-container mb-4">
            <?php get_search_form(); ?>
          </div>
          
          <div class="error-actions">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary btn-lg me-3">
              <?php esc_html_e( 'Wróć do strony głównej', 'k3e' ); ?>
            </a>
            <a href="javascript:history.back()" class="btn btn-outline-secondary btn-lg">
              <?php esc_html_e( 'Wróć do poprzedniej strony', 'k3e' ); ?>
            </a>
          </div>
        </div>
      </article>
    </div>
  </div>
</main>

<style>
.error-404 .display-1 {
    font-size: 8rem;
    font-weight: 700;
    opacity: 0.8;
}

.error-404 .page-subtitle {
    color: var(--text-color);
    margin-bottom: 2rem;
}

.error-404 .search-form-container {
    max-width: 400px;
    margin: 0 auto;
}

.error-404 .search-form-container input[type="search"] {
    border-radius: 25px;
    padding: 12px 20px;
    border: 2px solid var(--primary-color);
}

.error-404 .search-form-container button {
    border-radius: 25px;
    background: var(--primary-color);
    border: none;
    padding: 12px 20px;
}
</style>

<?php get_footer(); ?>