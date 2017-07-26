<?php
/*
 * Copyright (C) 2014 octopush
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

/**
 * Template for settings page.
 */
if (!defined('ABSPATH'))
{
	exit; // Exit if accessed directly
}
//var_dump($_POST);
?>
<div class="wrap woocommerce os_row">
	<form method="post" id="mainform"  enctype="multipart/form-data">
        <h3><?php _e('Parameters', 'octopush-sms'); ?></h3>
        <div class="header">
			<?php
			$notice_text = "<p>";
			$notice_text.=__('This module allows you to send SMS to the admin, or to customers on different events.', 'octopush-sms');
			$notice_text.=__('It also allows to send Bulk SMS for marketing campaign.', 'octopush-sms');
			$notice_text.="</p>";
			$notice_text.=__('First, you have to create an account on ', 'octopush-sms');
			$notice_text.='<b><a href="http://www.octopush.com/inscription" target="_blank">www.octopush.com</a></b>';
			$notice_text.=__(' to be able to send SMS, and make a deposit on this account.', 'octopush-sms');
			$notice_text.="</p><p>";
			$notice_text.=__('Then, please fill your identification settings, and set your options.', 'octopush-sms');
			$notice_text.="</p><p>";
			$notice_text.=__('If you want that the customers pay for the notification service, first create a product representing the SMS service, then fill the product ID field.', 'octopush-sms');
			$notice_text.=__('Finally, you have to activate/desactivate events you want on the "Messages" tab, and if needed, customize the text that will be sent for each event.', 'octopush-sms');
			$notice_text.="</p><p>";
			$notice_text.=__('Enjoy !', 'octopush-sms');
			$notice_text.="</p>";

			echo $notice_text;
			?>
        </div>
        <div class="ows" >
			<?php
			if (!$this->bAuth)
			{
				?>
				<h2><?php _e('Create your Octopush account'); ?></h2>
				<p><?php _e('Create your account by clicking on the following image and start sending SMS now to improve your sales !', 'octopush-sms'); ?></p>
				<p class="center"><a href="http://www.octopush.com"><img src="<?php echo plugin_dir_url(__FILE__) ?>../img/octopush.png" style="margin-top: 15px" alt="Octopush"/></a></p>
				<?php
			}
			else
			{
				echo '<h3>' . __('Amount on your account', 'octopush-sms') . '</h3><br><h3>' . number_format($this->balance, 0, ',', ' ') . ' SMS</h3>';
			}
			?>
        </div>
		<div class="ows">
			<table class="form-table">
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="octopush_sms_email"><?php _e('Email', 'octopush-sms'); ?></label>
					</th>
					<td class="forminp forminp-email">
						<input
							name="octopush_sms_email"
							id="octopush_sms_email"
							type="email"
							style="min-width:400px;"
							value="<?php echo get_option('octopush_sms_email'); ?>"
							class=""
							/> <span class="description"><?php _e('You can find it on your Octopush ', 'octopush-sms'); ?><a href='http://www.octopush.com/mes-parametres' target='_blank'><?php _e('Personal Data', 'octopush-sms'); ?></a>.</span>						</td>
				</tr>

				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="octopush_sms_key"><?php _e('Key Octopush', 'octopush-sms'); ?></label>
					</th>
					<td class="forminp forminp-phone">
						<input
							name="octopush_sms_key"
							id="octopush_sms_key"
							type="text"
							style="min-width:400px;"
							maxlength="255"
							value="<?php echo get_option('octopush_sms_key'); ?>"
							class=""
							/> <span class="description"></span>						</td>
				</tr>

				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="octopush_sms_admin_phone"><?php _e('Admin mobile number', 'octopush-sms'); ?></label>
					</th>
					<td class="forminp forminp-phone">
						<input
							name="octopush_sms_admin_phone"
							id="octopush_sms_admin_phone"
							type="text"
							maxlength="15"
							style="min-width:400px;"
							value="<?php echo get_option('octopush_sms_admin_phone'); ?>"
							class=""
							/> <span class="description">ex : +33612345678</span>
					</td>
				</tr><tr valign="top">
					<th scope="row" class="titledesc">
						<label for="octopush_sms_sender"><?php _e('Sender name', 'octopush-sms'); ?></label>
					</th>
					<td class="forminp forminp-text">
						<input
							name="octopush_sms_sender"
							id="octopush_sms_sender_name"
							type="text"
							style="min-width:400px;"
							value="<?php echo get_option('octopush_sms_sender'); ?>"
							class=""
							/>
						<span class="description"><?php _e('11 characters maximum', 'octopush-sms'); ?></span>
					</td>
				</tr>							
				<tr valign="top">
					<th scope="row" class="titledesc">
						<label for="octopush_sms_admin_alert"><?php _e('Send an alert when your account is under', 'octopush-sms'); ?></label>
					</th>
					<td class="forminp forminp-text">
						<input
							name="octopush_sms_admin_alert"
							id="octopush_sms_alert_limit"
							type="text"
							maxlength="5"
							style="min-width:40px;"
							value="<?php echo get_option('octopush_sms_admin_alert'); ?>"
							class=""
							/> SMS
					</td>
				</tr>
				<tr valign="top" class="">
					<th scope="row" class="titledesc"><?php _e('Order status notification free', 'octopush-sms'); ?></th>
					<td class="forminp forminp-checkbox">
						<fieldset>
							<legend class="screen-reader-text"><span><?php _e('Order status notification free', 'octopush-sms'); ?></span></legend>
							<input
								name="octopush_sms_freeoption"
								id="octopush_sms_free_notification_1"
								type="radio"
								<?php if ((int) get_option('octopush_sms_freeoption') == 1) echo 'checked'; ?>
								value="1" 
								onClick="jQuery('#paying_options').hide();"
								/> 
							<label class="t" for="freeoption_1"> <?php _e('Yes', 'octopush-sms'); ?> </label>
							<input
								name="octopush_sms_freeoption"
								id="octopush_sms_free_notification_0"
								type="radio"
								<?php if ((int) get_option('octopush_sms_freeoption') == 0) echo 'checked'; ?>
								value="0" 
								onClick="jQuery('#paying_options').show();"
								/> 
							<label class="t" for="freeoption_1"> <?php _e('No', 'octopush-sms'); ?> </label>
						</fieldset>
						<div id="paying_options" <?php if ((int) get_option('octopush_sms_freeoption') == 1) echo ' style="display:none" '; ?>>
							<fieldset>
								<span><?php _e('SMS notification product ID', 'octopush-sms'); ?></span>
								<input
									name="octopush_sms_option_id_product"
									id="octopush_sms_option_id_product"
									type="text"
									maxlength="5"
									style="min-width:40px;"
									value="<?php echo get_option('octopush_sms_option_id_product'); ?>"
									class=""
									/> 
							</fieldset>
						</div>
					</td>
				</tr>
			</table>
			<br />
			<p class="submit">
				<input name="save" class="button-primary" type="submit" value="Enregistrer les changements">
			</p>
		</div>
	</form>
</div>

<div class="warning wrap woocommerce os_row ows">
	<h3><?php _e('Informations', 'octopush-sms'); ?></h3>
    <fieldset>
        <p class="clear">
			<?php _e('Standard message is divided in 160 chars long parts and each part cost 1 SMS, if all chars are in list below. If one or more chars are not in this list, then message is divided in 70 chars parts, and each part cost 1 SMS. You can see if your message will be divided in 70 chars long parts in the "Manage message" tab and which char is not supported in standard.', 'octopush-sms'); ?> 
        </p>
        <p>
            <br><b><?php _e('Before applying mentioned rule, these characters are automatically replaced', 'octopush-sms'); ?></b>
        <br/>
		<div style="float: left; width: 130px"><?php _e('Original character', 'octopush-sms'); ?></div>: À Á Â Ã È Ê Ë Ì Í Î Ï Ð Ò Ó Ô Õ Ù Ú Û Ý Ÿ á â ã ê ë í î ï ð ó ô õ ú û µ ý ÿ ç Þ ° ¨ ^ « » | \
        <br style="clear: both"/><div style="float: left; width: 130px"><?php _e('Replaced by', 'octopush-sms'); ?></div>: A A A A E E E I I I I D O O O O U U U Y Y a a a e e i i i o o o o u u u y y c y o - - " " I /
        </p>
        <p class="clear">
            <br><b><?php _e('Authorized characters', 'octopush-sms'); ?></b>
            <br/>0 1 2 3 4 5 6 7 8 9
            <br/>a A b B c C d D e E f F g G h H i I j J k K l L m M n N o O p P q Q r R s S t T u U v V w W x X y Y z Z
            <br/>à À á Á â Â ã Ã ä Ä å Å æ Æ ç Ç è È ê Ê ë Ë é É ì Ì í Í î Î ï Ï ð Ð ñ Ñ ò Ò ó Ó ô Ô õ Õ ö Ö ø Ø ù Ù ú Ú û Û ü Ü ÿ Ÿ ý Ý Þ ß
            <br/>{ } ~ ¤ ¡ ¿ ! ? " # $ % & \' ^ * + - _ , . / : ; < = > § @ ( ) [ ]
            <!--<br/>Γ Δ Θ Λ Ξ Π Σ Φ Ψ Ω € £ ¥-->
            <br/><br/><?php _e('These chars count as 2 chars :', 'octopush-sms'); ?> { } € [ ] ~
        </p>
    </fieldset>
</div>