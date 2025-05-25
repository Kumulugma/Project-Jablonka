<?php get_header(); ?>

<main class="container-fluid py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            the_content();
          endwhile;
        else :
          echo '<p>Brak treści do wyświetlenia.</p>';
        endif;
      ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>
