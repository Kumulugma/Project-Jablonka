<?php get_header(); ?>

<style>
/* Główne style dla strony odmiany */
.apple-single {
  display: grid;
  grid-template-columns: 1fr 2fr;
  gap: 3rem;
  margin-bottom: 3rem;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  overflow: hidden;
}

.apple-image {
  position: relative;
  min-height: 400px;
}

.apple-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 8px 0 0 8px;
}

.apple-content {
  padding: 2rem;
}

.apple-content h2 {
  color: #2c5530;
  font-size: 2.5rem;
  margin-bottom: 1.5rem;
  font-weight: 700;
}

.apple-description {
  font-size: 1.1rem;
  line-height: 1.7;
  color: #555;
  margin-bottom: 2rem;
}

/* Tabela parametrów */
.apple-params {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 2rem;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.apple-params thead {
  background: linear-gradient(135deg, #4CAF50, #45a049);
  color: white;
}

.apple-params th,
.apple-params td {
  padding: 1rem;
  text-align: left;
  border-bottom: 1px solid #e0e0e0;
}

.apple-params tbody tr:hover {
  background-color: #f8f9fa;
}

.apple-params tbody tr:last-child td {
  border-bottom: none;
}

/* Przycisk powrotu */
.button {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  background: linear-gradient(135deg, #4CAF50, #45a049);
  color: white;
  padding: 0.8rem 1.5rem;
  text-decoration: none;
  border-radius: 25px;
  font-weight: 600;
  transition: all 0.3s ease;
  box-shadow: 0 2px 10px rgba(76, 175, 80, 0.3);
}

.button:hover {
  background: linear-gradient(135deg, #45a049, #3d8b40);
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4);
  color: white;
}

/* Nowa nawigacja między postami */
.post-navigation {
  background: linear-gradient(135deg, #f8f9fa, #e9ecef);
  border-radius: 15px;
  padding: 1.5rem;
  margin-top: 3rem;
  box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
}

.nav-link {
  display: flex;
  align-items: center;
  padding: 1rem;
  background: white;
  border-radius: 10px;
  text-decoration: none;
  color: #333;
  transition: all 0.3s ease;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  min-height: 80px;
}

.nav-link:hover {
  background: #4CAF50;
  color: white;
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
}

.nav-arrow {
  font-size: 1.5rem;
  margin: 0 1rem;
  transition: transform 0.3s ease;
}

.nav-link:hover .nav-arrow {
  transform: scale(1.2);
}

.nav-content {
  flex: 1;
}

.nav-label {
  font-size: 0.85rem;
  color: #666;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-bottom: 0.3rem;
  font-weight: 500;
}

.nav-link:hover .nav-label {
  color: rgba(255, 255, 255, 0.8);
}

.nav-title {
  font-size: 1.1rem;
  font-weight: 600;
  line-height: 1.3;
}

/* Responsywność */
@media (max-width: 768px) {
  .apple-single {
    grid-template-columns: 1fr;
    gap: 0;
  }
  
  .apple-image {
    min-height: 250px;
  }
  
  .apple-image img {
    border-radius: 8px 8px 0 0;
  }
  
  .apple-content {
    padding: 1.5rem;
  }
  
  .apple-content h2 {
    font-size: 2rem;
  }
  
  .post-navigation {
    padding: 1rem;
  }
  
  .nav-link {
    margin-bottom: 1rem;
    padding: 0.8rem;
  }
  
  .nav-arrow {
    font-size: 1.2rem;
    margin: 0 0.5rem;
  }
}

.page-title {
  color: #2c5530;
  font-weight: 700;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}
</style>

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

        <!-- Nowa nawigacja między postami -->
        <?php
        $prev_post = get_previous_post();
        $next_post = get_next_post();
        
        if ( $prev_post || $next_post ) :
        ?>
          <div class="post-navigation">
            <div class="row g-3">
              <?php if ( $prev_post ) : ?>
                <div class="col-md-6">
                  <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="nav-link">
                    <span class="nav-arrow">←</span>
                    <div class="nav-content">
                      <div class="nav-label">Poprzednia odmiana</div>
                      <div class="nav-title"><?php echo get_the_title( $prev_post->ID ); ?></div>
                    </div>
                  </a>
                </div>
              <?php else : ?>
                <div class="col-md-6"></div>
              <?php endif; ?>
              
              <?php if ( $next_post ) : ?>
                <div class="col-md-6">
                  <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="nav-link">
                    <div class="nav-content text-end">
                      <div class="nav-label">Następna odmiana</div>
                      <div class="nav-title"><?php echo get_the_title( $next_post->ID ); ?></div>
                    </div>
                    <span class="nav-arrow">→</span>
                  </a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

      <?php endwhile; endif; ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>