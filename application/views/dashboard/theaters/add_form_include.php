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
						<input type="text" name="city" <?php if(form_error('city')): ?>class="error"<?php endif; ?> value="<?php echo set_value('city'); ?>" placeholder="La ville...">
						<?php echo form_error('city'); ?>
					</div>
					<div class="large-2 columns">
						<label <?php if(form_error('postal_code')): ?>class="error"<?php endif; ?>>Code Postal.</label>
						<input type="text" <?php if(form_error('postal_code')): ?>class="error"<?php endif; ?> name="postal_code" value="<?php echo set_value('postal_code'); ?>" placeholder="Code postal...">
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

					<?php foreach ($all_phones as $phone_key => $phone_value): ?>
						<div class="row" class="custom dropdown">
							<div class="large-6 columns">
								<select nameclass="" id="customDropdown" name="phone_label_<?php echo $phone_key; ?>">
								<?php foreach ($labels as $label_key => $label_value) {
									$selected = ($label_value->id == $all_phones_labels[$phone_key]) ? 'selected="selected"' : null;
									echo '<option '.$selected.' value="'.$label_value->id.'">'.$label_value->name.'</option>';
								} ?>
								</select>
							</div>
							<div class="large-5 columns">
								<input type="text" value="<?php echo $phone_value; ?>" name="phone_number_<?php echo $phone_key; ?>" placeholder="Téléphone...">
								<?php if(! empty($phone_errors[$phone_key])) echo '<small class="error">Le numéro de téléphone est invalide.</small>'; ?>
							</div>
							
							<div class="large-1 columns">
								<a href="#" id="remove_row">x</a>
							</div>
						</div>
					<?php endforeach; ?>

				<?php endif; ?>
			</div>

				<div class="row">
					<div class="large-12 columns"><small><a id="add_phone" href="#">+ Ajouter un numéro de téléphone</a></small></div>
				</div>
				<br>
				
			<h4>Mails</h4>
				<div id="mail">
					<?php if(! empty($all_mails)): ?>
						<?php foreach ($all_mails as $mail_key => $mail_value): ?>
							<div class="row" class="custom dropdown">
								<div class="large-6 columns">
									<select nameclass="" id="customDropdown" name="mail_label_<?php echo $mail_key; ?>">
									<?php foreach ($labels as $label_key => $label_value) {
										$selected = ($label_value->id == $all_mails_labels[$mail_key]) ? 'selected="selected"' : null;
										echo '<option '.$selected.' value="'.$label_value->id.'">'.$label_value->name.'</option>';
									} ?>
									</select>
								</div>
								<div class="large-5 columns">
									<input type="text" value="<?php echo $mail_value; ?>" name="mail_adress_<?php echo $mail_key; ?>" placeholder="Email...">
									<?php if(! empty($mail_errors[$mail_key])) echo '<small class="error">L\'adresse email est invalide..</small>'; ?>
								</div>					
								<div class="large-1 columns">
									<a href="#" id="remove_row">x</a>
								</div>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
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
						'<input type="text" name="mail_adress_'+phone_iteration+'" placeholder="Email...">'+
					'</div>'+
					'<div class="large-1 columns">'+
						'<a href="#" id="remove_row">x</a>'+
					'</div>'+
				'</div>');
			e.preventDefault();
		});
  </script>