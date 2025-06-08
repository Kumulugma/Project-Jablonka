<?php get_header(); ?>

<main class="container-fluid py-5">
  <div class="row justify-content-center">
    <div class="col-lg-12">
      
      <!-- Full Width Hero Section - Managed from Admin Panel -->
      <section class="apple-hero-section mb-5">
        <div class="hero-content text-center">
          <p class="lead mb-4">
            <?php echo wp_kses_post(nl2br(get_option('k3e_hero_description', ''))); ?>
          </p>
          <div class="hero-stats row text-center">
            <div class="col-md-4">
              <div class="stat-box">
                <h3><?php echo esc_html(get_option('k3e_hero_stat1_icon', '🌍')); ?></h3>
                <p><strong><?php echo esc_html(get_option('k3e_hero_stat1_text', 'Kilka tysięcy odmian na świecie')); ?></strong></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-box">
                <h3><?php echo esc_html(get_option('k3e_hero_stat2_icon', '🏔️')); ?></h3>
                <p><strong><?php echo esc_html(get_option('k3e_hero_stat2_text', 'Azja Środkowa - pochodzenie jabłoni')); ?></strong></p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="stat-box">
                <h3><?php echo esc_html(get_option('k3e_hero_stat3_icon', '🍯')); ?></h3>
                <p><strong><?php echo esc_html(get_option('k3e_hero_stat3_text', '10g cukrów w średnim jabłku')); ?></strong></p>
              </div>
            </div>
          </div>
          <p class="lead mb-4">
            <?php echo wp_kses_post(nl2br(get_option('k3e_hero_text', ''))); ?>
          </p>
        </div>
      </section>

      <!-- Two Column Layout -->
      <div class="row">
        
        <!-- Left Column - Main Content from Database -->
        <div class="col-lg-8 mb-4">
          <div class="main-content-wrapper">
            
            <?php
              if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                  the_content();
                endwhile;
              else :
                // Fallback content if no page content is available
            ?>
            
            <article class="apple-article">
              <section class="content-section mb-5">
                <h2>🍃 Historia i Pochodzenie Jabłek</h2>
                <p>
                  Jabłka uprawiane są od tysięcy lat, a ich historia sięga starożytności. 
                  Udomowione jabłonie wywodzą się najprawdopodobniej z dzikiej jabłoni Sieversa 
                  (<em>Malus sieversii</em>) rosnącej w górach Azji Środkowej.
                </p>
                <p>
                  Obecnie znanych jest kilka tysięcy odmian jabłoni na świecie, różniących się kolorem, 
                  smakiem i zastosowaniem. W Polsce zarejestrowano blisko 71 różnorodnych odmian tego owocu. 
                  Są wśród nich stare, tradycyjne gatunki (jak <strong>Antonówka</strong> czy <strong>Szara Reneta</strong>), 
                  jak i nowsze krzyżówki opracowane przez polskich hodowców.
                </p>
                <p>
                  Różnorodność odmian pozwala dostosować jabłka do różnych warunków klimatycznych i potrzeb – 
                  jedne lepiej znoszą przechowywanie zimowe, inne dojrzewają wcześniej na jesieni. 
                  Przy dojrzałych drzewach jabłoni można dostrzec owoce w pełni koloru – od intensywnie 
                  czerwonych po żółtozielone – co zapowiada bogactwo smaków.
                </p>
              </section>

              <section class="content-section mb-5">
                <h2>👩‍🍳 Jabłka w Kuchni</h2>
                <p>
                  Jabłka są niezwykle uniwersalnym składnikiem kuchni. Różne odmiany jabłek 
                  sprawdzają się w różnych potrawach – od deserów po sosy i sałatki.
                </p>
                
                <div class="culinary-grid row mb-4">
                  <div class="col-md-6 mb-3">
                    <div class="culinary-card baking">
                      <h4>🥧 Do Wypieków i Pieczenia</h4>
                      <p>
                        Do wypieków, szarlotek i pieczonych jabłek zaleca się zwykle odmiany 
                        o wyrazistym, kwaskowatym smaku i zwartej strukturze miąższu. 
                        Przykładowo, tradycyjne polskie jabłka <strong>Antonówka</strong> czy 
                        <strong>Szara Reneta</strong> są cenione właśnie za tę kwaśność i jędrność, 
                        dzięki którym w cieście czy musie zachowują aromat i nie rozpadają się 
                        podczas obróbki termicznej.
                      </p>
                      <p><strong>Przykłady:</strong> Antonówka, Szara Reneta, Papierówka, Ligol</p>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="culinary-card raw">
                      <h4>🥗 Na Surowo i do Sałatek</h4>
                      <p>
                        Do jedzenia na surowo czy do sałatek najlepiej wybierać słodsze 
                        i bardzo soczyste odmiany. <strong>Gala</strong> to właśnie takie jabłko – 
                        ma aromatyczny, słodki smak i kruchy miąższ, co sprawia, że świetnie nadaje się 
                        do bezpośredniego spożycia. Również jabłka <strong>Gloster</strong> czy 
                        <strong>Jonagold</strong> (słodko-kwaśne, kruche) możemy wcinać prosto ze skórką 
                        lub dodawać do kolorowych sałatek.
                      </p>
                      <p><strong>Przykłady:</strong> Gala, Gloster, Jonagold, Golden Delicious</p>
                    </div>
                  </div>
                </div>

                <div class="universal-varieties">
                  <h4>🌟 Odmiany Uniwersalne</h4>
                  <p>
                    Niektóre odmiany mają uniwersalne zastosowanie: na przykład <strong>Ligol</strong> 
                    czy <strong>Idared</strong> są na tyle wytrzymałe, że sprawdzą się zarówno w przetworach 
                    (kompot, dżem) jak i jako dodatek do ciast. Ogólnie słodkie jabłka (Golden Delicious, Gala, Fuji) 
                    często trafiają na surową przekąskę, natomiast bardziej kwaskowate (Reneta, Antonówka, 
                    <strong>Boskoop</strong>, <strong>Cortland</strong>) – do dań wymagających gotowania lub pieczenia.
                  </p>
                </div>
              </section>

              <section class="content-section mb-5">
                <h2>🍯 Słodycz i Kwasowość Jabłek</h2>
                <p>
                  Każda odmiana jabłek ma swoją charakterystykę smakową, zdeterminowaną głównie 
                  poziomem cukru i kwasowością. Średniej wielkości jabłko (ok. 150–200 g) zawiera 
                  około <strong>10 gramów cukrów</strong> prostych – głównie glukozy i fruktozy. 
                  Jednak ta wartość może znacząco różnić się w zależności od odmiany i stopnia dojrzałości.
                </p>
                
                <div class="taste-profiles row">
                  <div class="col-md-6 mb-3">
                    <div class="taste-card sweet">
                      <h4>🍯 Słodkie Odmiany</h4>
                      <p>
                        Odmiany takie jak <strong>Golden Delicious</strong>, <strong>Pinova</strong> 
                        czy <strong>Fuji</strong> są bardzo słodkie – cukier wyraźnie dominuje ich smak. 
                        Słodkie jabłka doskonale uzupełnią deserowe dania (dodają łagodnej słodyczy 
                        i kremowego posmaku).
                      </p>
                      <p><strong>Przykłady:</strong> Golden Delicious, Pinova, Fuji, Gala</p>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="taste-card sour">
                      <h4>🍋 Kwaskowate Odmiany</h4>
                      <p>
                        <strong>Szara Reneta</strong>, <strong>Topaz</strong> czy <strong>Gloster</strong> 
                        to odmiany o relatywnie niskiej zawartości cukru i wyraźniejszej kwasowości. 
                        Bardziej kwaskowate odmiany podkręcą aromat wypieków i dżemów, nadając im głębię smaku.
                      </p>
                      <p><strong>Przykłady:</strong> Szara Reneta, Topaz, Gloster</p>
                    </div>
                  </div>
                </div>

                <div class="sugar-info">
                  <p class="info-box">
                    <strong>💡 Ciekawostka:</strong> Im owoc bardziej dojrzały, tym więcej w nim 
                    nagromadziło się naturalnych cukrów. Dlatego zielone, twarde jabłka ze wczesnych 
                    zbiorów mogą być wyraźnie mniej słodkie niż pełne słońca owoce z końca sezonu. 
                    Zawarty w jabłkach cukier pochodzi głównie z fruktozy i jest stopniowo uwalniany 
                    do krwi, co sprawia, że poziom cukru spada po nich stopniowo.
                  </p>
                </div>
              </section>
            </article>
            
            <?php
              endif;
            ?>
          </div>
        </div>

        <!-- Right Column - Dynamic Content from Admin Panel -->
        <div class="col-lg-4">
          <div class="sidebar-content">
            
            <!-- Curiosities Section - From Admin Panel -->
            <?php 
            $curiosities = get_option('k3e_curiosities', array());
            if (!empty($curiosities)) : 
            ?>
            <section class="sidebar-section mb-4">
              <h3>🤓 Ciekawostki o Jabłkach</h3>
              
              <?php foreach ($curiosities as $curiosity) : ?>
                <div class="fact-item mb-3">
                  <div class="fact-icon"><?php echo esc_html($curiosity['icon']); ?></div>
                  <div class="fact-content">
                    <h5><?php echo esc_html($curiosity['title']); ?></h5>
                    <p class="small"><?php echo wp_kses_post(nl2br($curiosity['content'])); ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </section>
            <?php endif; ?>

            <!-- Culinary Tips Section - From Admin Panel -->
            <?php 
            $tips = get_option('k3e_culinary_tips', array());
            if (!empty($tips)) : 
            ?>
            <section class="sidebar-section mb-4">
              <h3>👨‍🍳 Porady Kulinarne</h3>
              
              <?php foreach ($tips as $tip) : ?>
                <div class="tip-item mb-3">
                  <h5><?php echo esc_html($tip['title']); ?></h5>
                  <p class="small"><?php echo wp_kses_post(nl2br($tip['content'])); ?></p>
                </div>
              <?php endforeach; ?>
            </section>
            <?php endif; ?>

            <!-- Photo Ideas Section - From Admin Panel -->
            <?php 
            $photos = get_option('k3e_photo_ideas', array());
            if (!empty($photos)) : 
            ?>
            <section class="sidebar-section">
              <h3>📸 Zdjęcia</h3>
              
              <?php foreach ($photos as $photo) : ?>
                <div class="photo-idea mb-3">
                  <h6><?php echo esc_html($photo['title']); ?></h6>
                  <?php if (!empty($photo['image_id'])) : ?>
                    <div class="photo-preview mb-2">
                      <?php echo wp_get_attachment_image($photo['image_id'], 'mini-photo', false, array('class' => 'img-fluid rounded')); ?>
                    </div>
                  <?php endif; ?>
                  <p class="small"><?php echo wp_kses_post(nl2br($photo['description'])); ?></p>
                </div>
              <?php endforeach; ?>
            </section>
            <?php endif; ?>

          </div>
        </div>
      </div>
      
    </div>
  </div>
</main>

<!-- Enhanced Styling -->
<style>
/* Hero Section */
.apple-hero-section {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(233, 196, 106, 0.8));
    border-radius: 20px;
    padding: 3rem 2rem;
    text-align: center;
}

.hero-stats .stat-box {
    background: #fff4;
    padding: 1.5rem;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    margin-bottom: 1rem;
}

.hero-stats .stat-box:hover {
    transform: translateY(-5px);
}

.hero-stats .stat-box h3 {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}

/* Main Content */
.main-content-wrapper {
    background: white;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.content-section h2 {
    color: var(--primary-color);
    border-bottom: 3px solid var(--primary-color);
    padding-bottom: 0.5rem;
    margin-bottom: 1.5rem;
}

/* Culinary Cards */
.culinary-card {
    background: #f8f9fa;
    padding: 1.5rem;
    border-radius: 12px;
    height: 100%;
    transition: transform 0.3s ease;
}

.culinary-card.baking {
    border-left: 5px solid #e74c3c;
}

.culinary-card.raw {
    border-left: 5px solid #27ae60;
}

.culinary-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

/* Taste Profile Cards */
.taste-card {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    height: 100%;
    transition: transform 0.3s ease;
}

.taste-card.sweet {
    border-top: 4px solid #f39c12;
}

.taste-card.sour {
    border-top: 4px solid #3498db;
}

.taste-card:hover {
    transform: translateY(-3px);
}

/* Universal Varieties */
.universal-varieties {
    background: linear-gradient(135deg, rgba(233, 196, 106, 0.1), rgba(42, 157, 143, 0.1));
    padding: 1.5rem;
    border-radius: 12px;
    margin-top: 1.5rem;
}

/* Info Box */
.info-box {
    background: linear-gradient(135deg, #fff3cd, #ffeaa7);
    padding: 1.5rem;
    border-radius: 12px;
    border-left: 5px solid #f39c12;
    margin-top: 1.5rem;
}

/* Sidebar Styling */
.sidebar-content {
    background: white;
    border-radius: 15px;
    padding: 1.5rem;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    height: fit-content;
}

.sidebar-section {
    border-bottom: 1px solid #eee;
    padding-bottom: 1.5rem;
}

.sidebar-section:last-child {
    border-bottom: none;
    padding-bottom: 0;
}

.sidebar-section h3 {
    color: var(--primary-color);
    font-size: 1.25rem;
    margin-bottom: 1rem;
}

/* Fact Items */
.fact-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem;
    background: #f8f9fa;
    border-radius: 10px;
    transition: background-color 0.3s ease;
}

.fact-item:hover {
    background: #e9ecef;
}

.fact-icon {
    font-size: 1.5rem;
    flex-shrink: 0;
}

.fact-content h5 {
    margin-bottom: 0.5rem;
    color: var(--primary-color);
    font-size: 1rem;
}

/* Tip Items */
.tip-item {
    padding: 1rem;
    background: linear-gradient(135deg, rgba(216, 30, 30, 0.05), rgba(233, 196, 106, 0.05));
    border-radius: 10px;
    border-left: 4px solid var(--primary-color);
}

.tip-item h5 {
    color: var(--primary-color);
    margin-bottom: 0.5rem;
    font-size: 1rem;
}

/* Photo Ideas */
.photo-idea {
    padding: 1rem;
    background: #f1f3f4;
    border-radius: 10px;
    border-left: 4px solid var(--accent-color);
}

.photo-idea h6 {
    color: var(--accent-color);
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.photo-preview {
    text-align: center;
}

.photo-preview img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

/* Empty State Messages */
.empty-state {
    text-align: center;
    padding: 2rem;
    color: #6c757d;
    font-style: italic;
}

/* Responsive Design */
@media (max-width: 992px) {
    .sidebar-content {
        margin-top: 2rem;
    }
    
    .apple-hero-section {
        padding: 2rem 1rem;
    }
    
    .main-content-wrapper {
        padding: 1.5rem;
    }
}

@media (max-width: 768px) {
    .hero-stats .stat-box {
        margin-bottom: 1rem;
    }
    
    .culinary-grid .col-md-6 {
        margin-bottom: 1rem;
    }
    
    .taste-profiles .col-md-6 {
        margin-bottom: 1rem;
    }
    
    .fact-item {
        flex-direction: column;
        text-align: center;
    }
    
    .apple-hero-section h1 {
        font-size: 2rem;
    }
}

@media (max-width: 576px) {
    .apple-hero-section {
        padding: 1.5rem 1rem;
    }
    
    .main-content-wrapper,
    .sidebar-content {
        padding: 1rem;
    }
    
    .hero-stats .stat-box h3 {
        font-size: 2rem;
    }
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.content-section,
.sidebar-section {
    animation: fadeInUp 0.6s ease forwards;
}

.culinary-card,
.taste-card,
.fact-item,
.tip-item,
.photo-idea {
    animation: fadeInUp 0.4s ease forwards;
}

/* Admin Panel Notice */
.admin-notice {
    background: #e3f2fd;
    border-left: 4px solid #2196f3;
    padding: 1rem;
    margin: 1rem 0;
    border-radius: 4px;
}

.admin-notice p {
    margin: 0;
    color: #1565c0;
}
</style>

<?php 
// Show admin notice if sections are empty (only for logged in admins)
if (current_user_can('manage_options')) {
    $curiosities = get_option('k3e_curiosities', array());
    $tips = get_option('k3e_culinary_tips', array());
    $photos = get_option('k3e_photo_ideas', array());
    
    if (empty($curiosities) && empty($tips) && empty($photos)) {
        echo '<div class="admin-notice">';
        echo '<p><strong>Uwaga dla administratora:</strong> Brak treści w sidebarze. ';
        echo '<a href="' . admin_url('themes.php?page=k3e-apple-settings') . '">Przejdź do ustawień motywu</a> aby dodać ciekawostki, porady i pomysły na zdjęcia.</p>';
        echo '</div>';
    }
}
?>

<?php get_footer(); ?>