<?php get_header(); ?>

<main class="container-fluid py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <h2 class="page-title mb-4">Odmiany Jabłek</h2>
      
      <?php if ( have_posts() ) : ?>
        <div class="apple-table-container">
          <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
              <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <div class="card-img-top" style="height: 200px; overflow: hidden;">
                      <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'medium', array( 
                          'class' => 'w-100 h-100', 
                          'style' => 'object-fit: cover;' 
                        ) ); ?>
                      </a>
                    </div>
                  <?php else : ?>
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                      <span class="text-muted">🍎</span>
                    </div>
                  <?php endif; ?>
                  
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                      <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                        <?php the_title(); ?>
                      </a>
                    </h5>
                    
                    <div class="card-text mb-3">
                      <?php the_excerpt(); ?>
                    </div>
                    
                    <!-- Meta informacje o jabłku -->
                    <div class="apple-meta mb-3 small">
                      <?php if( get_post_meta( get_the_ID(), '_elastic_content_na-surowo', true ) ) : ?>
                        <div><strong>Na surowo:</strong> <?php echo esc_html( get_post_meta( get_the_ID(), '_elastic_content_na-surowo', true ) ); ?></div>
                      <?php endif; ?>
                      <?php if( get_post_meta( get_the_ID(), '_elastic_content_do-pieczenia', true ) ) : ?>
                        <div><strong>Do pieczenia:</strong> <?php echo esc_html( get_post_meta( get_the_ID(), '_elastic_content_do-pieczenia', true ) ); ?></div>
                      <?php endif; ?>
                    </div>
                    
                    <div class="mt-auto">
                      <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">
                        Poznaj szczegóły
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
          
          <!-- Paginacja -->
          <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center">
              <?php
              the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( '← Poprzednie', 'textdomain' ),
                'next_text' => __( 'Następne →', 'textdomain' ),
                'class'     => 'pagination'
              ) );
              ?>
            </div>
          </div>
        </div>
        
      <?php else : ?>
        <div class="alert alert-info text-center">
          <h4>Brak jabłek do wyświetlenia</h4>
          <p>Aktualnie nie ma żadnych odmian jabłek w bazie danych.</p>
        </div>
      <?php endif; ?>
      
    </div>
  </div>
</main>

<script>
// Preloader Animation - poprawiony kod
document.addEventListener('DOMContentLoaded', function() {
    const preloader = document.querySelector('.preloader');
    const appleLoader = document.querySelector('.apple-loader');
    
    console.log('Preloader elements:', { preloader, appleLoader }); // Debug
    
    if (preloader) {
        // Najpierw pokaż animację ładowania jabłka
        if (appleLoader) {
            setTimeout(() => {
                appleLoader.classList.add('loaded');
                console.log('Apple loader loaded class added'); // Debug
            }, 500);
        }
        
        // Następnie ukryj cały preloader
        setTimeout(() => {
            preloader.classList.add('fade-out');
            console.log('Preloader fade-out started'); // Debug
        }, 2000);
        
        // Ostatecznie usuń z DOM
        setTimeout(() => {
            preloader.style.display = 'none';
            console.log('Preloader hidden'); // Debug
        }, 2500);
    } else {
        console.log('Preloader element not found!'); // Debug
    }
});

// Alternatywna metoda - jeśli powyższa nie działa
window.addEventListener('load', function() {
    console.log('Window loaded - backup preloader hide'); // Debug
    const preloader = document.querySelector('.preloader');
    if (preloader) {
        setTimeout(() => {
            preloader.style.opacity = '0';
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 500);
        }, 1000);
    }
});
</script>

<?php get_footer(); ?>