<?php
// Block direct access to the main plugin file.
defined( 'ABSPATH' ) || die( 'Access Denied!' );

$step = ( isset( $_REALTYNA['step'] ) && is_numeric($_REALTYNA['step']) ) ? $_REALTYNA['step'] : 1;
?>
<div class="realtyna_mls_sync" style="text-align:center;">
    <ol>
        <li class="<?=( ( $step == 1 ) ? 'current' : ''  )?>"><?=__("Requirements" , REALTYNA_MLS_SYNC_SLUG );?></li>
        <li class="<?=( ( $step == 2 ) ? 'current' : ''  )?>"><?=__("Information" , REALTYNA_MLS_SYNC_SLUG );?></li>
        <li class="<?=( ( $step == 3 ) ? 'current' : ''  )?>"><?=__("Demo Import" , REALTYNA_MLS_SYNC_SLUG );?></li>
        <li class="<?=( ( $step == 4 ) ? 'current' : ''  )?>"><?=__("Finalize" , REALTYNA_MLS_SYNC_SLUG );?></li>
    </ol>
</div>
