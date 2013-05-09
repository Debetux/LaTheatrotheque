<div class="row">
    <div class="large-12 columns">
		

<?php if(! empty($registration_failed)): ?>
			<div data-alert class="alert-box alert">
			Mince alors ! Une erreur est survenue lors de l'inscription. Veuillez recommencer.
			<a href="#" class="close">&times;</a>
			</div>
			<?php endif; ?>


			<form action="<?php echo site_url('dashboard/theaters/add'); ?>" class="custom" method="post">
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
			<h4>Numéros de téléphones</h4>
			<div id="phone">
				<?php if(! empty($all_phones)): ?>
				
					<?php foreach ($variable as $key => $value): ?>

					<?php endforeach; ?>
					<div class="row">
						<div class="large-6 columns">
							<select name="phone_label_0" id="customDropdown" nameclass="">
								<option value="1">Réservation</option>
								<option value="2">Contact presse</option>
								<option value="3">Gérant</option>
							</select>
						</div>

						<div class="large-5 columns">
							<input type="text" placeholder="Téléphone..." name="phone_number_0">
						</div>
						<div class="large-1 columns"><a id="remove_row" href="#">x</a></div>
					</div>
				<?php endif; ?>
			</div>

				<div class="row">
					<div class="large-12 columns"><small><a id="add_phone" href="#">+ Ajouter un numéro de téléphone</a></small></div>
				</div>
				<br>
				
			<h4>Mails</h4>
				<div id="mail">
					
				</div>

				<div class="row">
					<div class="large-12 columns"><small><a id="add_mail" href="#">+ Ajouter une adresse mail</a></small></div>
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
  		var phone_iteration = 0;
		$("#add_phone").live('click', function(e){
			$("#phone").append('<div class="row" class="custom dropdown">'+
					'<div class="large-6 columns">'+
						'<select nameclass="" id="customDropdown" name="phone_label_'+phone_iteration+'">'+
							<?php echo $labels_js; ?>
						'</select>'+
					'</div>'+
					'<div class="large-5 columns">'+
						'<input type="text" name="phone_number_'+phone_iteration+'" placeholder="Téléphone...">'+
					'</div>'+
					'<div class="large-1 columns">'+
						'<a href="#" id="remove_row">x</a>'+
					'</div>'+
				'</div>');
			phone_iteration++;
			e.preventDefault();
		});

		$('#remove_row').live('click', function(e){
			$(this).parent().parent().remove();
			e.preventDefault();
		});

		var mail_iteration = 0;
		$("#add_mail").live('click', function(e){
			$("#mail").append('<div class="row" class="custom dropdown">'+
					'<div class="large-6 columns">'+
						'<select class="" id="customDropdown" name="mail_label_'+phone_iteration+'">'+
							<?php echo $labels_js; ?>
						'</select>'+
					'</div>'+
					'<div class="large-5 columns">'+
						'<input type="text" name="mail" name="mail_adress_'+phone_iteration+'" placeholder="Email...">'+
					'</div>'+
					'<div class="large-1 columns">'+
						'<a href="#" id="remove_row">x</a>'+
					'</div>'+
				'</div>');
			e.preventDefault();
		});
  </script>