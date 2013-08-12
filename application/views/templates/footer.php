      <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-3 pull-9 columns">
        
      <ul class="side-nav">
        <li><a href="<?php echo site_url('dashboard/theaters'); ?>">Gérer Théâtres</a></li>
        <li><a href="#">Gérer pièces de théâtre</a></li>
        <li><a href="#">Gérer textes</a></li>
        <li><a href="<?php echo site_url('dashboard/news'); ?>">Gérer news</a></li>
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

  <script>
    document.write('<script src=' +
    ('__proto__' in {} ? '<?php echo assets_url(); ?>js/vendor/zepto' : '<?php echo assets_url(); ?>js/vendor/jquery') +
    '.js><\/script>')
  </script>


  <!-- <script src="<?php echo assets_url(); ?>js/vendor/zepto.js"></script>
  <script src="<?php echo assets_url(); ?>js/vendor/jquery.js"></script>-->

  <script src="<?php echo assets_url(); ?>js/foundation.min.js"></script>
  

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.dropdown.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.placeholder.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.forms.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.alerts.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.magellan.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.reveal.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.tooltips.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.clearing.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.cookie.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.joyride.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.orbit.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.section.js"></script>

  <script src="<?php echo assets_url(); ?>js/foundation/foundation.topbar.js"></script>

  

  <script>
    $(function(){
      $(document).foundation();
    })
  </script>

</body>
</html>