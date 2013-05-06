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
      
      <h3>Vos théâtres <small></small></h3>
      
      <p><?php if(empty($user_theaters)): ?>
          Vous n'avez ajouté aucun théâtre.
          <?php endif; ?>
      </p>
      <p><?php echo anchor('dashboard/theaters/add', 'Ajouter un théâtre'); ?></p>
    </div>
    
    
    <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-3 pull-9 columns">
        
      <ul class="side-nav">
        <li><b><a href="<?php echo site_url('dashboard/theaters'); ?>">Gérer Théâtres</a></b></li>
        <li><a href="#">Gérer pièces de théâtre</a></li>
        <li><a href="#">Gérer textes</a></li>
        <li><a href="#">Gérer news</a></li>
        <li><a href="#">Gérer petites annonces</a></li>
        <li><a href="#">Gérer critiques</a></li>
        <li><a href="#">Modifier votre profil</a></li>
      </ul>
      
      <p><img src="http://placehold.it/320x240&amp;text=Ad"></p>
        
    </div>
    
  </div>

    <!-- Footer -->

  <footer class="row">
    <div class="large-12 columns">
      <hr>
      <div class="row">
        <div class="large-6 columns">
          <p>&copy; Copyright no one at all. Go to town.</p>
        </div>
        <div class="large-6 columns">
          <ul class="inline-list right">
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>