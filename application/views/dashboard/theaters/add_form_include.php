<div class="row">
    <div class="large-12 columns">
		

<?php if(! empty($registration_failed)): ?>
			<div data-alert class="alert-box alert">
			Mince alors ! Une erreur est survenue lors de l'inscription. Veuillez recommencer.
			<a href="#" class="close">&times;</a>
			</div>
			<?php endif; ?>


			<form action="<?php echo site_url('auth/sign_up'); ?>" class="custom" method="post">
				<div class="row">
					<div class="large-6 columns">
						<label <?php if(form_error('name')): ?>class="error"<?php endif; ?>>Nom</label>

						<input type="text" name="name" <?php if(form_error('name')): ?>class="error"<?php endif; ?> value="<?php echo set_value('name'); ?>" placeholder="Le nom...">
						<?php echo form_error('name'); ?>
					</div>
					<div class="large-4 columns">
						<label <?php if(form_error('city')): ?>class="error"<?php endif; ?>>Ville.</label>
						<input type="text" name="city" <?php if(form_error('city')): ?>class="error"<?php endif; ?> placeholder="La ville...">
						<?php echo form_error('city'); ?>
					</div>
					<div class="large-2 columns">
						<label <?php if(form_error('postal_code')): ?>class="error"<?php endif; ?>>Code Postal.</label>
						<input type="text" <?php if(form_error('postal_code')): ?>class="error"<?php endif; ?> name="postal_code" placeholder="Code postal...">
						<?php echo form_error('postal_code'); ?>
					</div>
				</div>

				<div class="row">
					<div class="large-12 columns">
						<label <?php if(form_error('adress')): ?>class="error"<?php endif; ?>>Adresse</label>
						<input type="text" <?php if(form_error('adress')): ?>class="error"<?php endif; ?> name="adress" value="<?php echo set_value('adress'); ?>" placeholder="43 rue des Olivers">
						<?php echo form_error('adress'); ?>
					</div>

				</div>
				
			<div id="phone">
				<div class="row">
					<div class="large-6 columns">
						<label <?php if(form_error('phone')): ?>class="error"<?php endif; ?>>Label.</label>
						<select id="customDropdown">
							<option>Réservation</option>
							<option>Contact presse</option>
							<option>Gérant</option>
						</select>
					</div>
					<div class="large-6 columns">
						<label <?php if(form_error('phone')): ?>class="error"<?php endif; ?>>Numéro de téléphone.</label>
						<input type="text" <?php if(form_error('phone')): ?>class="error"<?php endif; ?> name="phone" placeholder="Téléphone...">
						<?php echo form_error('phone'); ?>
					</div>
				</div>
			</div>

				<div class="row">
					<div class="large-12 columns"><small><a id="add_phone" href="#">+ Ajouter un numéro de téléphone</a></small></div>
				</div>
				
				<br>
				<div class="row">
					<div class="large-12 columns">
						<input type="submit" class="large button expand" value="Valider !"/>
					</div>
				</div>
				
			</form>
    </div>
  </div>
	
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>

  <script type="text/javascript">

		$("#add_phone").live('click', function(){
			$("#phone").append('<div class="row" class="custom dropdown">'+
					'<div class="large-6 columns">'+
						'<select class="" id="customDropdown">'+
							'<option>Réservation</option>'+
							'<option>Contact presse</option>'+
							'<option>Gérant</option>'+
						'</select>'+
					'</div>'+
					'<div class="large-6 columns">'+
						'<input type="text" name="phone" placeholder="Téléphone...">'+
					'</div>'+
				'</div>');
		});
	// Du code utilisant le $() d'autres bibliothèques JS.
  </script>