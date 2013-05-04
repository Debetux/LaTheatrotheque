		<?php if(! empty($registration_complete)): ?>
		<div data-alert class="alert-box success">
		Super ! Votre inscription s'est bien déroulée. Vous pouvez vous connecter.
		<a href="#" class="close">&times;</a>
		</div>
		<?php endif; ?>

		<?php if(! empty($login_failed)): ?>
		<div data-alert class="alert-box alert">
		Mauvaise combinaison nom d'utilisateur/mot de passe.
		<a href="#" class="close">&times;</a>
		</div>
		<?php endif; ?>



		    <h2>Connexion.</h2>
	<form action="<?php echo site_url('auth/login'); ?>" method="post">
		<div class="row">
			<div class="small-8">
				<div class="row">
					<div class="small-3 columns hide-for-small">
						<label for="right-label" class="right inline <?php if(form_error('username')): ?>error<?php endif; ?>">Identifiant</label>
					</div>
					<div class="small-9 columns">
						<input type="text" id="right-label" name="username" <?php if(form_error('username')): ?>class="error"<?php endif; ?> placeholder="Votre identifiant...">
						<?php echo form_error('username'); ?>
					</div>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="small-8">
				<div class="row">
					
					<div class="small-3 columns hide-for-small">
						<label for="right-label" class="right inline<?php if(form_error('password')): ?>error<?php endif; ?>">Mot de passe</label>
					</div>
					<div class="small-9 columns">
						<input type="password" id="right-label" name="password" <?php if(form_error('password')): ?>class="error"<?php endif; ?> placeholder="Votre mot de passe...">
						<?php echo form_error('password'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="small-4" style="">
				
					<label for="checkbox1"><input type="checkbox" name="remember_me" id="checkbox1" style=""><span class="custom checkbox"></span> Se rappeller de moi.</label>
					
			</div>
		</div>
		<div class="row">
					<div class="large-8 large-offset-1 columns">
						<input type="submit" class="large button expand" value="Valider !"/>
					</div>
				</div>
	</form>
	<?php echo anchor('#login', 'Inscription', 'data-reveal-id="signup-box"'); ?>