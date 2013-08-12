

<?php if(! empty($registration_failed)): ?>
			<div data-alert class="alert-box alert">
			Mince alors ! Une erreur est survenue lors de l'inscription. Veuillez recommencer.
			<a href="#" class="close">&times;</a>
			</div>
			<?php endif; ?>

		    <!-- Content -->
		    <h2>Inscription.</h2>
			<p class="lead">Rejoignez notre espace membre !</p>
			<form action="<?php echo site_url('auth/sign_up'); ?>" method="post">
				<div class="row">
					<div class="large-12 columns">
						<label <?php if(form_error('username')): ?>class="error"<?php endif; ?>>Identifiant</label>

						<input type="text" name="username" <?php if(form_error('username')): ?>class="error"<?php endif; ?> value="<?php echo set_value('username'); ?>" placeholder="Votre identifiant...">
						<?php echo form_error('username'); ?>
					</div>
				</div>
				
				<div class="row">
					<div class="large-6 columns">
						<label <?php if(form_error('password')): ?>class="error"<?php endif; ?>>Mot de passe.</label>
						<input type="password" name="password" <?php if(form_error('password')): ?>class="error"<?php endif; ?> placeholder="Votre mot de passe...">
						<?php echo form_error('password'); ?>
					</div>
					<div class="large-6 columns">
						<label <?php if(form_error('password_confirm')): ?>class="error"<?php endif; ?>>Confirmation mot de passe.</label>
						<input type="password" <?php if(form_error('password_confirm')): ?>class="error"<?php endif; ?> name="password_confirm" placeholder="Votre mot de passe...">
						<?php echo form_error('password_confirm'); ?>
					</div>
				</div>

				<div class="row">
					<div class="large-4 columns">
						<label <?php if(form_error('first_name')): ?>class="error"<?php endif; ?>>Prénom</label>
						<input type="text" <?php if(form_error('first_name')): ?>class="error"<?php endif; ?> name="first_name" value="<?php echo set_value('first_name'); ?>" placeholder="Jean">
						<?php echo form_error('first_name'); ?>
					</div>
					<div class="large-4 columns">
						<label <?php if(form_error('last_name')): ?>class="error"<?php endif; ?>>Nom</label>
						<input type="text" <?php if(form_error('last_name')): ?>class="error"<?php endif; ?> name="last_name" value="<?php echo set_value('last_name'); ?>" placeholder="Dupont">
						<?php echo form_error('last_name'); ?>
					</div>
					<div class="large-4 columns">
						<div class="row collapse">
							<label <?php if(form_error('email')): ?>class="error"<?php endif; ?>>Email</label>
							<div class="small-12 columns">
								<input type="text" <?php if(form_error('email')): ?>class="error"<?php endif; ?> name="email" value="<?php echo set_value('email'); ?>" placeholder="exemple@mail.com">
								<?php echo form_error('email'); ?>
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
						<input type="text" id="right-label" name="captcha_word" <?php if(form_error('captcha_word')): ?>class="error"<?php endif; ?> placeholder="Recopiez les lettres ci-contre...">
						<?php echo form_error('captcha_word'); ?>
					</div>
					<div class="large-8 columns">
						<?php echo $image; ?>
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