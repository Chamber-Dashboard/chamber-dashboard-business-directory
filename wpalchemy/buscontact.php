<div class="my_meta_control">

	<a href="#" class="dodelete-location button"><?php _e('Remove All Locations', 'cdash'); ?></a>
 
	<?php while($mb->have_fields_and_multi('location')): ?>
	<?php $mb->the_group_open(); ?>

		<div class="location clearfix">

		<?php $mb->the_field('altname'); ?>
		<label><?php _e('Location Name', 'cdash'); ?></label>
		<p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>

		<?php $mb->the_field('donotdisplay'); ?>
		<label><?php _e('Do Not Display', 'cdash'); ?></label>
		<p class="explain"><?php _e('Check this if you do not want this location to display to the public on the website'); ?></p>
		<p><input type="checkbox" name="<?php $mb->the_name(); ?>" value="1"<?php if ($mb->get_the_value()) echo ' checked="checked"'; ?>/> <?php _e('Do Not Display', 'cdash'); ?></p>


		<label><?php _e('Address', 'cdash'); ?></label>
		<p>
			<?php $metabox->the_field('address'); ?>
			<textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea>
		</p>

		<?php $options = get_option('cdash_directory_options'); ?>
 
		<div class="third">
			<?php $mb->the_field('city'); ?>
			<label><?php _e('City', 'cdash'); ?></label>
			<p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p> 
		</div>

		<div class="third">
			<?php $mb->the_field('state'); ?>
			<label><?php _e('State', 'cdash'); ?></label>
			<p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
		</div>

		<div class="third">
			<?php $mb->the_field('zip'); ?>
			<label><?php _e('Zip', 'cdash'); ?></label>
			<p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
		</div>

		<div class="hidden">
			<?php $mb->the_field('latitude'); ?>
			<label><?php _e('Latitude', 'cdash'); ?></label>
			<p><input type="text" name="<?php $mb->the_name(); ?>" id="latitude" value="<?php $mb->the_value(); ?>"/></p>

			<?php $mb->the_field('longitude'); ?>
			<label><?php _e('Longitude', 'cdash'); ?></label>
			<p><input type="text" name="<?php $mb->the_name(); ?>" id="longitude" value="<?php $mb->the_value(); ?>"/></p>
		</div>

		<div class="clearfix">
			<?php $mb->the_field('url'); ?>
			<label><?php _e('Web Address', 'cdash'); ?></label>
			<p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" placeholder="http://"/></p>
		</div>

		<fieldset class="half left">
			<legend><?php _e('Phone Number(s)', 'cdash'); ?></legend>

			<a href="#" class="dodelete-phone button"><?php _e('Remove All Phone Numbers', 'cdash'); ?></a>
	 
			<?php while($mb->have_fields_and_multi('phone')): ?>
			<?php $mb->the_group_open(); ?>
				<?php $mb->the_field('phonenumber'); ?>
				<label><?php _e('Phone Number', 'cdash'); ?></label>
				<p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>

				<?php $mb->the_field('phonetype'); ?>
				<label><?php _e('Phone Number Type', 'cdash'); ?></label>
				<?php $selected = ' selected="selected"'; ?>
				<select name="<?php $mb->the_name(); ?>">
					<option value=""></option>
					<?php $mb->the_field('phonetype'); ?>
					<?php $options = get_option('cdash_directory_options');
				 	$phonetypes = $options['bus_phone_type'];
				 	$typesarray = explode( ",", $phonetypes);
				 	foreach ($typesarray as $type) { ?>
				 		<option value="<?php echo $type; ?>" <?php if ($mb->get_the_value() == $type) echo $selected; ?>><?php echo $type; ?></option>
				 	<?php } ?>
				</select>

			<a href="#" class="dodelete button"><?php _e('Remove This Phone Number', 'cdash'); ?></a>
			<hr />

			<?php $mb->the_group_close(); ?>
			<?php endwhile; ?>
			<p><a href="#" class="docopy-phone button"><?php _e('Add Another Phone Number', 'cdash'); ?></a></p>
		</fieldset>

		<fieldset class="half">
			<legend><?php _e('Email Address(es)', 'cdash'); ?></legend>
			<a href="#" class="dodelete-email button"><?php _e('Remove All Email Addresses', 'cdash'); ?></a>
	 
			<?php while($mb->have_fields_and_multi('email')): ?>
			<?php $mb->the_group_open(); ?>
				<?php $mb->the_field('emailaddress'); ?>
				<label><?php _e('Email Address', 'cdash'); ?></label>
				<p><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
				
				<?php $mb->the_field('emailtype'); ?>
				<label><?php _e('Email Address Type', 'cdash'); ?></label>
				<?php $selected = ' selected="selected"'; ?>
				<select name="<?php $mb->the_name(); ?>">
					<option value=""></option>
					<?php $mb->the_field('emailtype'); ?>
					<?php $options = get_option('cdash_directory_options');
				 	$emailtypes = $options['bus_email_type'];
				 	$typesarray = explode( ",", $emailtypes);
				 	foreach ($typesarray as $type) { ?>
				 		<option value="<?php echo $type; ?>" <?php if ($mb->get_the_value() == $type) echo $selected; ?>><?php echo $type; ?></option>
				 	<?php } ?>
				</select>

			<a href="#" class="dodelete button"><?php _e('Remove This Email Address', 'cdash'); ?></a>
			<hr />

			<?php $mb->the_group_close(); ?>
			<?php endwhile; ?>
			<p><a href="#" class="docopy-email button"><?php _e('Add Another Email Address', 'cdash'); ?></a></p>
		</fieldset>

		<p class="clearfix"><a href="#" class="dodelete button"><?php _e('Remove This Location', 'cdash'); ?></a></p>
 
		</div>
	<?php $mb->the_group_close(); ?>
	<?php endwhile; ?>
 	<p class="explain"><?php _e('If this business has multiple locations, but you want them all to appear in one business listing, add the other locations here.  If you want the other locations to have their own individual listing on the site, create a new business with this business as the parent.', 'cdash'); ?></p>
	<p><a href="#" class="docopy-location button"><?php _e('Add Another Location', 'cdash'); ?></a></p>

	<fieldset>
		<legend><?php _e('Social Media Links', 'cdash'); ?></legend>

		<a href="#" class="dodelete-social button"><?php _e('Remove All Social Media Links', 'cdash'); ?></a>
 
		<?php while($mb->have_fields_and_multi('social')): ?>
		<?php $mb->the_group_open(); ?>
		<div class="half">
			<?php $mb->the_field('socialservice'); ?>
			<label><?php _e('Social Media Service', 'cdash'); ?></label>
			<?php $selected = ' selected="selected"'; ?>
			<select name="<?php $mb->the_name(); ?>">
				<option value=""></option>
				<?php $mb->the_field('socialservice'); ?>
				<option value="facebook" <?php if ($mb->get_the_value() == 'facebook') echo $selected; ?>><?php _e( 'Facebook', 'cdash' ); ?></option>
				<option value="flickr" <?php if ($mb->get_the_value() == 'flickr') echo $selected; ?>><?php _e( 'Flickr', 'cdash' ); ?></option>
				<option value="google" <?php if ($mb->get_the_value() == 'google') echo $selected; ?>><?php _e( 'Google +', 'cdash' ); ?></option>
				<option value="instagram" <?php if ($mb->get_the_value() == 'instagram') echo $selected; ?>><?php _e( 'Instagram', 'cdash' ); ?></option>
				<option value="linkedin" <?php if ($mb->get_the_value() == 'linkedin') echo $selected; ?>><?php _e( 'LinkedIn', 'cdash' ); ?></option>
				<option value="pinterest" <?php if ($mb->get_the_value() == 'pinterest') echo $selected; ?>><?php _e( 'Pinterest', 'cdash' ); ?></option>
				<option value="tripadvisor" <?php if ($mb->get_the_value() == 'tripadvisor') echo $selected; ?>><?php _e( 'Trip Advisor', 'cdash' ); ?></option>
				<option value="twitter" <?php if ($mb->get_the_value() == 'twitter') echo $selected; ?>><?php _e( 'Twitter', 'cdash' ); ?></option>
				<option value="urbanspoon" <?php if ($mb->get_the_value() == 'urbanspoon') echo $selected; ?>><?php _e( 'Urbanspoon', 'cdash' ); ?></option>
				<option value="vimeo" <?php if ($mb->get_the_value() == 'vimeo') echo $selected; ?>><?php _e( 'Vimeo', 'cdash' ); ?></option>
				<option value="youtube" <?php if ($mb->get_the_value() == 'youtube') echo $selected; ?>><?php _e( 'YouTube', 'cdash' ); ?></option>
				<option value="yelp" <?php if ($mb->get_the_value() == 'yelp') echo $selected; ?>><?php _e( 'Yelp', 'cdash' ); ?></option>
			</select>
		</div>
		<div class="half">
			<?php $mb->the_field('socialurl'); ?>
			<label><?php _e('Social Media URL', 'cdash'); ?></label>
			<p><input placeholder="http://" type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/></p>
		</div>

		<a href="#" class="dodelete button"><?php _e('Remove This Social Media Link', 'cdash'); ?></a>
		<hr />

		<?php $mb->the_group_close(); ?>
		<?php endwhile; ?>
		<p><a href="#" class="docopy-social button"><?php _e('Add Another Social Media Link', 'cdash'); ?></a></p>
	</fieldset>

</div>