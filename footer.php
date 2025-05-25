<!-- Footer -->
  <footer>
    <div class="container">
      <p>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Wszystkie prawa zastrzeżone.</p>
      <?php if ( get_bloginfo('description') ) : ?>
        <p class="small mt-2 opacity-75"><?php bloginfo('description'); ?></p>
      <?php endif; ?>
    </div>
  </footer>

  <!-- Bootstrap Bundle JS (z Popperem, CDN) - Zaktualizowana wersja -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

  <?php wp_footer(); ?>
</body>
</html>