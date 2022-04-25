<?php
// Block direct access to the main plugin file.
defined( 'ABSPATH' ) || die( 'Access Denied!' );

$nextButtonDisabledClass = ( empty( $_REALTYNA['idx_options'] ) || ( $_REALTYNA['idx_options'] === false ) ) ? ' disabled' : '' ;

$idxOptions['agent'] = ( !empty( $_REALTYNA['idx_options']['agent'] ) ) ? $_REALTYNA['idx_options']['agent'] : '';
$idxOptions['agency'] = ( !empty( $_REALTYNA['idx_options']['agency'] ) ) ? $_REALTYNA['idx_options']['agency'] : '';
$idxOptions['agent_option'] = ( !empty( $_REALTYNA['idx_options']['agent_option'] ) ) ? $_REALTYNA['idx_options']['agent_option'] : '';
$idxOptions['image_option'] = ( isset( $_REALTYNA['idx_options']['image_option'] ) ) ?  $_REALTYNA['idx_options']['image_option'] : '';
?>

<div class="wrap">

	<form action="admin.php" id="third_step_form">
		
		<input type="hidden" name="page" value="<?=REALTYNA_MLS_SYNC_SLUG?>">
		<input type="hidden" name="step" value="4">
		<input type="hidden" name="realtyna_houzez_nonce" id="realtyna_houzez_nonce" value="<?=wp_create_nonce( 'realtyna_houzez_secret_nonce' )?>">
		<input type="hidden" name="third_step_act" value="<?=wp_create_nonce("third_step_nonce");?>">

		<div class="realtyna_houzez_form">
			<p class="realtyna_mls_sync_step_title">
				<i class="dashicons dashicons-database-import"></i> <?=__("Demo Import" , REALTYNA_MLS_SYNC_SLUG );?>
			</p>

			<p>
				<b><?=__("Demo Import Settings" , REALTYNA_MLS_SYNC_SLUG );?></b>:
			</p>

			<p>
				<b><?=__("What to display in agent information box?" , REALTYNA_MLS_SYNC_SLUG);?></b>
			</p>

			<p>
				<select name="realtyna_idx_selected_agent_option" id="realtyna_idx_selected_agent_option">
				<?php
				foreach( $_REALTYNA['agents_display_options'] as $displayOption => $displayValue ):
					$selected = ( $displayOption == $idxOptions['agent_option'] ) ? ' selected' : '';
				?>
					<option value="<?=$displayOption?>" <?=$selected?>><?=$displayValue?></option>
				<?php
				endforeach;
				?>
				</select>
			</p>
			
			<p>
				<b><?=__("Select Agent" , REALTYNA_MLS_SYNC_SLUG );?></b>: <a href="post-new.php?post_type=houzez_agent"><?=__("Click here to Add New" , REALTYNA_MLS_SYNC_SLUG);?></a>
			</p>

			<p>
				<select name="realtyna_idx_selected_agent" id="realtyna_idx_selected_agent">
				<?php
				foreach( $_REALTYNA['agents'] as $agent ):
					$selected = ( $agent->ID == $idxOptions['agent'] ) ? ' selected' : '';
				?>
					<option value="<?=$agent->ID?>" <?=$selected?>><?=$agent->post_title?></option>
				<?php
				endforeach;
				?>
				</select>
			</p>

			<p>
				<b><?=__("Select Agency" , REALTYNA_MLS_SYNC_SLUG );?></b>: <a href="post-new.php?post_type=houzez_agency"><?=__("Click here to Add New" , REALTYNA_MLS_SYNC_SLUG);?></a>
			</p>

			<p>
				<select name="realtyna_idx_selected_agency" id="realtyna_idx_selected_agency">
				<?php
				foreach( $_REALTYNA['agencies'] as $agency ):
					$selected = ( $agency->ID == $idxOptions['agency'] ) ? ' selected' : '';
				?>
					<option value="<?=$agency->ID?>" <?=$selected?>><?=$agency->post_title?></option>
				<?php
				endforeach;
				?>
				</select>
			</p>

			<p>
				<b><?=__("Image Storage & Disk Management Options" , REALTYNA_MLS_SYNC_SLUG );?></b>:
			</p>

			<p>
				<select name="realtyna_idx_images_option" id="realtyna_idx_images_option">
					<option value="2" <?=( ( '2' == $idxOptions['image_option'] ) ? ' selected' : '' );?>><?=__("Use External for All Images including Feature Images" , REALTYNA_MLS_SYNC_SLUG );?> </option>
					<option value="1" <?=( ( '1' == $idxOptions['image_option'] ) ? ' selected' : '' );?>><?=__("Download Feature Images Only and Use External for rest of images" , REALTYNA_MLS_SYNC_SLUG )?> </option>
					<option value="0" <?=( ( '0' == $idxOptions['image_option'] ) ? ' selected' : '' );?>><?=__("Download All Images to Local Storage ( Huge disk space needed )" , REALTYNA_MLS_SYNC_SLUG );?> </option>
				</select>
			</p>

			<div>				
			<?php
				if ( $_REALTYNA['idx_import'] == false)  :
			?>
				<a class="button " href="#" id="realtyna_idx_demo_import" onclick="return false;" ><?=__("Demo Import" , REALTYNA_MLS_SYNC_SLUG );?></a>
				<?php
				else:
			?>
				<b class="realtyna_success_text"><?=__("Demo Properties Already Imported!" , REALTYNA_MLS_SYNC_SLUG );?></b>
			<?php
				endif;
			?>
			</div>

			<div id="import_progress" style="text-align:center; margin:10px;"></div>
			<div id="import_result" style="text-align:center; margin:30px;padding:10px;"></div>

			<p>
				<a class="button" href="admin.php?page=<?=REALTYNA_MLS_SYNC_SLUG?>&step=2" ><?=__("Prev Step" , REALTYNA_MLS_SYNC_SLUG );?> </a>
				<button type="submit" name="realtya_go_to_fourth_step" id="realtya_go_to_fourth_step" class="button button-primary " <?=$nextButtonDisabledClass?> ><?=__("Next Step" , REALTYNA_MLS_SYNC_SLUG);?></button>
			</p>

		</div>

	</form>
	
</div>
