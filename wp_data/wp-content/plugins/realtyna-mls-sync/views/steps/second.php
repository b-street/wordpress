<?php
// Block direct access to the main plugin file.
defined( 'ABSPATH' ) || die( 'Access Denied!' );

$nextButtonDisabledClass = ( !RealtynaMlsSync::validateFirstStep() ? ' disabled' : '' );
$credentials = $_REALTYNA['credentials'];

?>

<div class="wrap">

    <form action="admin.php" id="second_step_form">
		<?php
		$realtyna_nonce = wp_create_nonce( 'realtyna_houzez_secret_nonce' );
		?>
		<input type="hidden" name="realtyna_houzez_nonce" id="realtyna_houzez_nonce" value="<?=$realtyna_nonce?>">
		<input type="hidden" name="page" value="<?=REALTYNA_MLS_SYNC_SLUG?>">
		<input type="hidden" name="step" value="3">
		<input type="hidden" name="second_step_act" value="<?=wp_create_nonce("second_step_nonce");?>">

		<div class="realtyna_houzez_form">
			<p class="realtyna_mls_sync_step_title">
				<i class="dashicons dashicons-info"></i> <?=__("Client Information" , REALTYNA_MLS_SYNC_SLUG );?>
			</p>

			<p>
				<b><?=__("Full Name", REALTYNA_MLS_SYNC_SLUG );?> </b>:
			</p>

			<p>
				<input type="text" name="realtyna_idx_client_name" id="realtyna_idx_client_name" placeholder="<?=__("like John Doe" , REALTYNA_MLS_SYNC_SLUG );?>" value="<?=( ( $credentials && isset( $credentials['name'] ) ) ? $credentials['name'] : '' )?>" required>
			</p>

			<p>
				<b><?=__("E-Mail" , REALTYNA_MLS_SYNC_SLUG );?></b>:
			</p>

			<p>
				<input type="email" name="realtyna_idx_client_email" id="realtyna_idx_client_email" placeholder="<?=__("like you@yoursite.com" , REALTYNA_MLS_SYNC_SLUG);?>" value="<?=( ( $credentials && isset( $credentials['email'] ) ) ? $credentials['email'] : '' )?>" required>
			</p>

			<p>
				<b><?=__("Phone Number" , REALTYNA_MLS_SYNC_SLUG );?></b>:
			</p>

			<p>
				<input type="tel" pattern="^([0|\+)?([0-9]{10,12})$" name="realtyna_idx_client_phone" id="realtyna_idx_client_phone" placeholder="<?=__("like +13025258222" , REALTYNA_MLS_SYNC_SLUG );?>" value="<?=( ( $credentials && isset( $credentials['phone_number'] ) ) ? $credentials['phone_number'] : '' )?>" required>
			</p>


			<p>
				<b><?=__("Your Role" , REALTYNA_MLS_SYNC_SLUG );?></b>:
			</p>

			<p>
				<?php 
				$role = ( $credentials && isset( $credentials['role'] ) ) ? $credentials['role'] : '' ;
				?>
				<select name="realtyna_idx_client_role" id="realtyna_idx_client_role">
					<option value="Realtor" <?=( $role == 'Realtor' ? ' selected' : '' )?>><?=__("Realtor" , REALTYNA_MLS_SYNC_SLUG);?></option>
					<option value="WebMaster" <?=( $role == 'WebMaster' ? ' selected' : '' )?>><?=__("Web Master" , REALTYNA_MLS_SYNC_SLUG);?></option>
					<option value="Other" <?=( $role == 'Other' ? ' selected' : '' )?>><?=__("Other" , REALTYNA_MLS_SYNC_SLUG);?></option>
				</select>
			</p>

			<div id="import_progress" style="margin:10px;"></div>
			<div id="import_result" style="font-weight:bold; margin:30px;"></div>

			<p>
				<a class="button" href="admin.php?page=<?=REALTYNA_MLS_SYNC_SLUG?>&step=1" ><?=__("Prev Step" , REALTYNA_MLS_SYNC_SLUG );?></a>
				<button type="submit" id="realtya_go_to_third_step" class="button button-primary " <?=$nextButtonDisabledClass;?> ><?=__("Next Step" , REALTYNA_MLS_SYNC_SLUG );?> </button>
			</p>

		</div>

	</form>

</div>
