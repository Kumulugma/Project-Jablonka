<?php get_header(); ?>

<main class="container-fluid py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <h2 class="page-title mb-4 text-center">Szczegóły Odmiany</h2>
        
        <div class="apple-single">
          <!-- Kolumna lewa: Obrazek jabłka -->
          <div class="apple-image">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'large', array( 'alt' => get_the_title() ) ); ?>
            <?php else : ?>
              <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                <span style="font-size: 4rem;">🍎</span>
              </div>
            <?php endif; ?>
          </div>

          <!-- Kolumna prawa: Treść wpisu -->
          <div class="apple-content">
            <h2><?php the_title(); ?></h2>
            
            <div class="apple-description">
              <?php the_content(); ?>
            </div>

            <!-- Tabela parametrów jabłka -->
            <?php if( 
              get_post_meta( get_the_ID(), '_elastic_content_na-surowo', true ) ||
              get_post_meta( get_the_ID(), '_elastic_content_do-salatek', true ) ||
              get_post_meta( get_the_ID(), '_elastic_content_do-pieczenia', true ) ||
              get_post_meta( get_the_ID(), '_elastic_content_do-smazenia', true )
            ) : ?>
              <table class="apple-params">
                <thead>
                  <tr>
                    <th>Zastosowanie</th>
                    <th>Ocena</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if( get_post_meta( get_the_ID(), '_elastic_content_na-surowo', true ) ) : ?>
                    <tr>
                      <td>Na surowo</td>
                      <td><?php echo esc_html( get_post_meta( get_the_ID(), '_elastic_content_na-surowo', true ) ); ?></td>
                    </tr>
                  <?php endif; ?>
                  <?php if( get_post_meta( get_the_ID(), '_elastic_content_do-salatek', true ) ) : ?>
                    <tr>
                      <td>Do sałatek</td>
                      <td><?php echo esc_html( get_post_meta( get_the_ID(), '_elastic_content_do-salatek', true ) ); ?></td>
                    </tr>
                  <?php endif; ?>
                  <?php if( get_post_meta( get_the_ID(), '_elastic_content_do-pieczenia', true ) ) : ?>
                    <tr>
                      <td>Do pieczenia</td>
                      <td><?php echo esc_html( get_post_meta( get_the_ID(), '_elastic_content_do-pieczenia', true ) ); ?></td>
                    </tr>
                  <?php endif; ?>
                  <?php if( get_post_meta( get_the_ID(), '_elastic_content_do-smazenia', true ) ) : ?>
                    <tr>
                      <td>Do smażenia</td>
                      <td><?php echo esc_html( get_post_meta( get_the_ID(), '_elastic_content_do-smazenia', true ) ); ?></td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            <?php endif; ?>

            <!-- Przycisk powrotu -->
            <a href="<?php echo home_url(); ?>" class="button">
              ← Wróć do listy jabłek
            </a>
          </div>
        </div>

        <!-- Nawigacja między postami -->
        <div class="row mt-4">
          <div class="col-12">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            
            if ( $prev_post || $next_post ) :
            ?>
              <nav class="post-navigation d-flex justify-content-between align-items-center p-3 bg-light rounded">
                <div class="nav-previous">
                  <?php if ( $prev_post ) : ?>
                    <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="text-decoration-none">
                      <small class="text-muted d-block">Poprzednia odmiana</small>
                      <strong><?php echo get_the_title( $prev_post->ID ); ?></strong>
                    </a>
                  <?php endif; ?>
                </div>
                
                <div class="nav-next text-end">
                  <?php if ( $next_post ) : ?>
                    <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="text-decoration-none">
                      <small class="text-muted d-block">Następna odmiana</small>
                      <strong><?php echo get_the_title( $next_post->ID ); ?></strong>
                    </a>
                  <?php endif; ?>
                </div>
              </nav>
            <?php endif; ?>
          </div>
        </div>

      <?php endwhile; endif; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>