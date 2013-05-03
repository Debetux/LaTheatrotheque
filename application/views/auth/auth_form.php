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
            <li><?php echo anchor('#login', 'Login', 'data-reveal-id="login-box"'); ?></li>
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
    <div class="large-12 columns">
      <div class="row">
		<div class="large-12 columns">
		    <!-- Content -->

			
		<?php $this->load->view('auth/login_include'); ?>

		        
		</div>
      </div>
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

<div id="signup-box" class="reveal-modal">
	<?php $this->load->view('auth/sign_up_include'); ?>
	<a class="close-reveal-modal">&#215;</a>
</div>