<div class="row">
  <div class="large-12 columns">

    <!-- Navigation -->
      <nav class="top-bar">
        <ul class="title-area">
          <!-- Title Area -->
          <li class="name">
            <h1>
              <a href="<?php echo site_url(); ?>">
                La Théâtrothèque
              </a>
            </h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
        </ul>

        <section class="top-bar-section">
          <ul class="left">
            <li><a>Link 1</a></li>
            <li><a href="#">Link 2</a></li>
          </ul>

          <ul class="right">
            <li class="search">
              <form>
                <input type="search">
              </form>
            </li>

            <li class="has-button">
              <a class="small button" href="#">Search</a>
            </li>
          </ul>
        </section>
      </nav>

    <!-- End Navigation -->
  
    </div>
  </div>


  <div class="row">    
    
    <!-- Main Content Section -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="large-9 push-3 columns">
      
      <h3><?php echo 'Bonjour '.$username.' !'; ?> <small></small></h3>
      
      <p>Voici votre tableau de bord. Vous pouvez y modifier vos informations personelles, ou bien ajouter des petites annonces, ou même ajouter des théâtres ou des pièces.</p>
 
    </div>