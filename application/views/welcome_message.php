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

    <!-- Desktop Slider -->

      <div class="hide-for-small">
        <div id="featured">
              <img src="http://placehold.it/1000x400&text=Slide Image" alt="slide image">
              <!-- <img src="http://placehold.it/1000x400&text=Slide Image" alt="slide image">
              <img src="http://placehold.it/1000x400&text=Slide Image" alt="slide image"> -->
          </div>
        </div>

    <!-- End Desktop Slider -->


    <!-- Mobile Header -->


    <div class="row">
      <div class="small-12 show-for-small"><br>
        <img src="http://placehold.it/1000x600&text=For Small Screens" />
      </div>
    </div>


  <!-- End Mobile Header -->

    </div>
  </div><br>

  <div class="row">
    <div class="large-12 columns">
      <div class="row">

    <!-- Thumbnails -->

        <div class="large-3 small-6 columns">
          <img src="http://placehold.it/250x250&text=Thumbnail" />
          <h6 class="panel">Description</h6>
        </div>

        <div class="large-3 small-6 columns">
          <img src="http://placehold.it/250x250&text=Thumbnail" />
          <h6 class="panel">Description</h6>
        </div>

        <div class="large-3 small-6 columns">
          <img src="http://placehold.it/250x250&text=Thumbnail" />
          <h6 class="panel">Description</h6>
        </div>

        <div class="large-3 small-6 columns">
          <img src="http://placehold.it/250x250&text=Thumbnail" />
          <h6 class="panel">Description</h6>
        </div>

    <!-- End Thumbnails -->

      </div>
    </div>
  </div>



  <div class="row">
    <div class="large-12 columns">
      <div class="row">

    <!-- Content -->

        <div class="large-8 columns">
          <div class="panel radius">

          <div class="row">
          <div class="large-6 small-6 columns">

            <h4>Header</h4><hr/>
            <h5 class="subheader">Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Donec dignissim nibh fermentum odio ornare sagittis.
            </h5>

          <div class="show-for-small" align="center">
            <a href="#" class="small radius button">Call To Action!</a><br>

            <a href="#" class="small radius button">Call To Action!</a>
          </div>

          </div>
          <div class="large-6 small-6 columns">

            <p>Suspendisse ultrices ornare tempor. Aenean eget ultricies libero. Phasellus non ipsum eros. Vivamus at dignissim massa. Aenean dolor libero, blandit quis interdum et, malesuada nec ligula. Nullam erat erat, eleifend sed pulvinar ac. Suspendisse ultrices ornare tempor. Aenean eget ultricies libero.
          </p>
        </div>

        </div>
        </div>
        </div>

        <div class="large-4 columns hide-for-small">

          <h4>Get In Touch!</h4><hr/>

          <a href="#">
          <div class="panel radius callout" align="center">
            <strong>Call To Action!</strong>
          </div>
          </a>

          <a href="#">
          <div class="panel radius callout" align="center">
            <strong>Call To Action!</strong>
          </div>
          </a>

        </div>

    <!-- End Content -->

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



<div id="login-box" class="reveal-modal">
	<?php $this->load->view('auth/auth_include'); ?>
	<a class="close-reveal-modal">&#215;</a>
</div>

<div id="signup-box" class="reveal-modal">
	<?php $this->load->view('auth/sign_up_include', $captcha); ?>

	<a class="close-reveal-modal">&#215;</a>
</div>









