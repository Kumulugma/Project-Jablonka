<?php get_header(); ?>

<main class="container-fluid py-5">
  <div class="row">
    <!-- Kolumna lewa: Obrazek wróżący -->
    <div class="col-lg-4 mb-4">
      <div class="card shadow-lg border-0">
        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="Obrazek wróżący">
      </div>
    </div>

    <!-- Kolumna prawa: Treść wpisu -->
    <div class="col-lg-8">
      <article>
        <header class="mb-4">
          <h2 class="display-4 text-center"><?php the_title(); ?></h2>
        </header>

        <!-- Meta dane - zastosowanie jabłek -->
        <div class="meta-info mb-4">
          <h3>Jakie zastosowanie dla tych jabłek?</h3>
          <ul class="list-group">
            <?php if( get_post_meta( get_the_ID(), '_elastic_content_na-surowo', true ) ) : ?>
              <li class="list-group-item">Na surowo: <?php echo esc_html( get_post_meta( get_the_ID(), '_elastic_content_na-surowo', true ) ); ?></li>
            <?php endif; ?>
            <?php if( get_post_meta( get_the_ID(), '_elastic_content_do-salatek', true ) ) : ?>
              <li class="list-group-item">Do sałatek: <?php echo esc_html( get_post_meta( get_the_ID(), '_elastic_content_do-salatek', true ) ); ?></li>
            <?php endif; ?>
            <?php if( get_post_meta( get_the_ID(), '_elastic_content_do-pieczenia', true ) ) : ?>
              <li class="list-group-item">Do pieczenia: <?php echo esc_html( get_post_meta( get_the_ID(), '_elastic_content_do-pieczenia', true ) ); ?></li>
            <?php endif; ?>
            <?php if( get_post_meta( get_the_ID(), '_elastic_content_do-smazenia', true ) ) : ?>
              <li class="list-group-item">Do smażenia: <?php echo esc_html( get_post_meta( get_the_ID(), '_elastic_content_do-smazenia', true ) ); ?></li>
            <?php endif; ?>
          </ul>
        </div>

        <div class="content">
          <div>
            <?php the_content(); ?>
          </div>
        </div>

        <!-- Przycisk przenoszący do strony głównej -->
        <div class="text-center mt-4">
          <a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg">Wróć do strony głównej</a>
        </div>
      </article>
    </div>
  </div>
</main>

<?php get_footer(); ?>
