<div class="row">
  <div class="large-12 columns">

    <!-- Navigation -->
      <nav class="top-bar">
        <ul class="title-area">
          <!-- Title Area -->
          <li class="name">
            <h1>
              <a href="#">
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
	<h2>Connexion.</h2>
	<form action="<?php echo site_url('auth/sign_up'); ?>" method="post">
		<div class="row">
			<div class="small-8">
				<div class="row">
					<div class="small-3 columns hide-for-small">
						<label for="right-label" class="right inline">Identifiant</label>
					</div>
					<div class="small-9 columns">
						<input type="text" id="right-label" name="username" placeholder="Votre identifiant...">
					</div>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="small-8">
				<div class="row">
					
					<div class="small-3 columns hide-for-small">
						<label for="right-label" class="right inline">Mot de passe</label>
					</div>
					<div class="small-9 columns">
						<input type="password" name="password" id="right-label" placeholder="Votre mot de passe...">
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="small-4" style="">
				
					<label for="checkbox1"><input type="checkbox" name="remember" id="checkbox1" style=""><span class="custom checkbox"></span> Se rappeller de moi.</label>
					
			</div>
		</div>
	</form>
	<?php echo anchor('#login', 'Inscription', 'data-reveal-id="signup-box"'); ?>

	<a class="close-reveal-modal">&#215;</a>
</div>

<div id="signup-box" class="reveal-modal">
	<h2>Inscription.</h2>
	<p class="lead">Rejoignez notre espace membre !</p>
	<form action="<?php echo site_url('auth/sign_up'); ?>" method="post">
		<div class="row">
			<div class="large-12 columns">
				<label>Identifiant</label>
				<input type="text" name="username" placeholder="Votre identifiant...">
			</div>
		</div>
		
		<div class="row">
			<div class="large-6 columns">
				<label>Mot de passe.</label>
				<input type="password" name="password" placeholder="Votre mot de passe...">
			</div>
			<div class="large-6 columns">
				<label>Confirmation mot de passe.</label>
				<input type="password" name="password_confirm" placeholder="Votre mot de passe...">
			</div>
		</div>

		<div class="row">
			<div class="large-4 columns">
				<label>Prénom</label>
				<input type="text" name="first_name" placeholder="Jean">
			</div>
			<div class="large-4 columns">
				<label>Nom</label>
				<input type="text" name="last_name" placeholder="Dupont">
			</div>
			<div class="large-4 columns">
				<div class="row collapse">
					<label>Email</label>
					<div class="small-12 columns">
						<input type="text" name="email" placeholder="exemple@mail.com">
					</div>
					
				</div>
			</div>
		</div>
		<h4>Votre statut <small>(plusieurs choix sont possibles)</small></h4>
		<div class="row">
			<div class="large-4 columns">
				<label for="checkbox1">
					<input type="checkbox" name="spectator" id="checkbox1" style="">
					<span class="custom checkbox"></span> Spectateur
				</label>
			</div>
			<div class="large-4 columns">
				<label for="checkbox2">
					<input type="checkbox" name="author" id="checkbox2" style="">
					<span class="custom checkbox"></span> Auteur
				</label>
			</div>
			<div class="large-4 columns">
				<label for="checkbox3">
					<input type="checkbox" name="comedian" id="checkbox3" style="">
					<span class="custom checkbox"></span> Comédien
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns">
				<label for="checkbox4">
					<input type="checkbox" name="stage_director" id="checkbox4" style="">
					<span class="custom checkbox"></span> Metteur en scène
				</label>
			</div>
			<div class="large-4 columns">
				<label for="checkbox5">
					<input type="checkbox" name="producer" id="checkbox5" style="">
					<span class="custom checkbox"></span> Producteur
				</label>
			</div>
			<div class="large-4 columns">
				<label for="checkbox6">
					<input type="checkbox" name="room_manager" id="checkbox6" style="">
					<span class="custom checkbox"></span> Gestionnaire de salle
				</label>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns">
				<label for="checkbox7">
					<input type="checkbox" name="press_atache" id="checkbox7" style="">
					<span class="custom checkbox"></span> Attaché de presse
				</label>
			</div>
		</div>
		<h4>Captcha <small></small></h4>
		<div class="row">
			<div class="large-4 columns">
				<input type="text" id="right-label" placeholder="Recopiez les lettres ci-contre...">
			</div>
			<div class="large-8 columns">
				<?php echo $cap['image']; ?>
			</div>
		</div>
		
		<div class="row">
			<div class="large-12 columns">
				<span><small>Recopiez les lettres ci-contre. Ce processus permet de vérifier que le compte est créé par une personne et non un programme automatisé. Si les caractères sont illisibles, cliquez sur le symbole à droite pour générer quatre nouvelles lettres.</small>
			</span>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="large-12 columns">
				<input type="submit" class="large button expand" value="Valider !"/>
			</div>
		</div>
		
	</form>

	<a class="close-reveal-modal">&#215;</a>
</div>









