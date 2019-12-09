<?php
// sidebar for settings page

function cdash_settings_sidebar(){
?>

<div id="sidebar">
	<h2><?php esc_html_e('We\'re here to help!', 'cdash'); ?></h2>
	<ul>
		<li><a href="https://chamberdashboard.com/docs/plugin-features/business-directory/" target="_blank"><?php esc_html_e('Business Directory Documentation', 'cdash'); ?></a></li>

		<!--<li><a href="https://chamberdashboard.com/dashboard-installer/?utm_source=plugin&utm_medium=sidebar&utm_campaign=business-directory#installation" target="_blank"><?php esc_html_e('Installation and Configuration:', 'cdash'); ?></a> <?php esc_html_e(' sit back and let experienced pros configure Chamber Dashboard to do just what you need', 'cdash'); ?></li>-->

		<li><a href="https://chamberdashboard.com/downloads/support-updates/?utm_source=plugin&utm_medium=sidebar&utm_campaign=business-directory" target="_blank"><?php esc_html_e('Priority Support:', 'cdash'); ?></a><?php esc_html_e(' get access to our expertise', 'cdash'); ?></li>

		<li><a href="https://chamberdashboard.com/downloads/support-updates/?utm_source=plugin&utm_medium=sidebar&utm_campaign=business-directory#maintenance" target="_blank"><?php esc_html_e('Worry-Free Maintenance:', 'cdash'); ?></a><?php esc_html_e(' let us take care of maintaining your site, so you can focus on what you do best!', 'cdash'); ?></li>
	</ul>

	<h2><?php esc_html_e('More Amazing Plugins', 'cdash'); ?></h2>

	<p><a href="https://chamberdashboard.com/features/?utm_source=plugin&utm_medium=sidebar&utm_campaign=business-directory" target="_blank"><?php esc_html_e('Events Calendar Plugin', 'cdash'); ?></a><?php esc_html_e(' - Engage your community in local events.', 'cdash'); ?></p>

  <p><a href="https://chamberdashboard.com/features/?utm_source=plugin&utm_medium=sidebar&utm_campaign=business-directory" target="_blank"><?php esc_html_e('Member Payments', 'cdash'); ?></a><?php esc_html_e(' - Accept and invoice your members, straight from your site. Save staff time with auto-invoicing.', 'cdash'); ?></p>

	<p><a href="https://chamberdashboard.com/features/?utm_source=plugin&utm_medium=sidebar&utm_campaign=business-directory" target="_blank"><?php esc_html_e('Track and Catalog your Contacts', 'cdash'); ?></a><?php esc_html_e(' – Trade your collection of Excel spreadsheets for a CRM that lets you track calls and meeting attendance, categorize your contacts, gives your staff shared access to the same data and more.', 'cdash'); ?></p>

	<h2><?php esc_html_e('Connect', 'cdash'); ?></h2>

	<p><a href="https://chamberdashboard.com/user-showcase/?utm_source=plugin&utm_medium=sidebar&utm_campaign=business-directory" target="_blank"><?php esc_html_e('Get On the Map', 'cdash'); ?></a><?php esc_html_e(' – We have users around the world!  We\'d love to link to your site too.', 'cdash'); ?></p>

	<!--<p><a href="https://www.linkedin.com/groups?gid=6931264&mostPopular=&trk=tyah&trkInfo=tarId%3A1420845022267%2Ctas%3Achamber%20dashboard%2Cidx%3A2-1-2" target="_blank"><?php esc_html_e('Join the User Group', 'cdash'); ?></a><?php esc_html_e(' – Gain perspective, share best practices, and find solutions to problems with experienced Chamber leaders.', 'cdash'); ?></p>-->
</div>
<?php
}
?>
