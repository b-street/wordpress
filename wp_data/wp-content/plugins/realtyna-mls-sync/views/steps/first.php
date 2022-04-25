<?php
// Block direct access to the main plugin file.
defined( 'ABSPATH' ) || die( 'Access Denied!' );

$nextStepDirector = ( !RealtynaMlsSync::validateFirstStep() ? 'javascript:voided();' : 'admin.php?page=' . REALTYNA_MLS_SYNC_SLUG . '&step=2' );
$nextButtonDisabledClass = ( !RealtynaMlsSync::validateFirstStep() ? ' disabled' : '' );

?>


<div class="wrap">
    <form> 
        <div class="realtyna_houzez_form">
            <p class="realtyna_mls_sync_step_title">
                <i class="dashicons dashicons-plugins-checked"></i> <?=__("Check Requirements" , REALTYNA_MLS_SYNC_SLUG);?>
            </p>

            <?php
            $houzezThemeAvailabity =  RealtynaHouzez::houzezThemeExists() ?  __("Available" , REALTYNA_MLS_SYNC_SLUG ) : __("Not Available" , REALTYNA_MLS_SYNC_SLUG )  ;
            $houzezThemeActiveStatus =  RealtynaHouzez::isHouzezThemeActive() ? __("Active" , REALTYNA_MLS_SYNC_SLUG ) : __("Not Active" , REALTYNA_MLS_SYNC_SLUG )  ;
            ?>

            <p style="text-align:left;">
                <i class="dashicons <?=( RealtynaHouzez::houzezThemeExists() && RealtynaHouzez::isHouzezThemeActive() ) ? ' dashicons-yes realtyna_success_text ' : ' dashicons-no realtyna_error_text'  ?>"></i>
                <b><?=__("Houzez Theme" , REALTYNA_MLS_SYNC_SLUG);?></b>&nbsp;
                <b class="<?=RealtynaHouzez::houzezThemeExists() ? 'success' : 'error' ;?>"><?=$houzezThemeAvailabity?></b> , 
                <b class="<?=RealtynaHouzez::isHouzezThemeActive() ? 'success' : 'error' ;?>"><?=$houzezThemeActiveStatus?></b>
            </p>
            <p style="text-align:left; padding-left:30px; color:#666;">
                <i class="dashicons dashicons-info"></i>
                <span><?=__("Houzez Theme should be Available and Active" , REALTYNA_MLS_SYNC_SLUG);?></span>
            </p>

            <?php
            $houzezFunctionalityPluginAvailabity =  RealtynaHouzez::houzezFunctionalityPluginExists() ?  __("Available" , REALTYNA_MLS_SYNC_SLUG ) : __("Not Available" , REALTYNA_MLS_SYNC_SLUG )  ;
            $houzezFunctionalityPluginActiveStatus =  RealtynaHouzez::isHouzezFunctionalityPluginActive() ? __("Active" , REALTYNA_MLS_SYNC_SLUG ) : __("Not Active" , REALTYNA_MLS_SYNC_SLUG )  ;
            ?>

            <p style="text-align:left;">
                <i class="dashicons <?=( RealtynaHouzez::houzezFunctionalityPluginExists() && RealtynaHouzez::isHouzezFunctionalityPluginActive() ) ? ' dashicons-yes realtyna_success_text ' : ' dashicons-no realtyna_error_text'  ?>"></i>
                <b><?=__("Houzez Functionality Plugin" , REALTYNA_MLS_SYNC_SLUG);?></b>&nbsp;
                <b class="<?=RealtynaHouzez::houzezFunctionalityPluginExists() ? 'success' : 'error' ;?>"><?=$houzezFunctionalityPluginAvailabity?></b> , 
                <b class="<?=RealtynaHouzez::isHouzezFunctionalityPluginActive() ? 'success' : 'error' ;?>"><?=$houzezFunctionalityPluginActiveStatus?></b>
            </p>
            <p style="text-align:left; padding-left:30px; color:#666;">
                <i class="dashicons dashicons-info"></i>
                <span><?=__("Houzez Functionality Plugin should be Available and Active" , REALTYNA_MLS_SYNC_SLUG);?></span>
            </p>

            <hr>

            <?php
                foreach ( $_REALTYNA as $requirement => $info ):
            ?>
                <p style="text-align:left;">
                    <i class="dashicons <?=( $info['passed'] ) ? ' dashicons-yes realtyna_success_text ' : ' dashicons-no realtyna_error_text'  ?>"></i>
                    <b><?=$requirement?></b>&nbsp;<?=__("current value" , REALTYNA_MLS_SYNC_SLUG );?> : <i><?=$info['current_value']?></i>
                </p>
                <p style="text-align:left; padding-left:30px; color:#666;">
                    <i class="dashicons dashicons-info"></i>
                    <span><?=$info['text']?></span>
                </p>

            <?php
                endforeach;
            ?>
            <?php
            if ( RealtynaHouzez::haveHouzezRequirements() ) {
            ?>
                <p class="realtyna_success_bg" style="padding-top:10px; padding-bottom:10px;"> 
                    <i class="realtyna_success_text dashicons dashicons-yes"></i> <?=__("Requirements are OK!" , REALTYNA_MLS_SYNC_SLUG);?>
                </p>
            <?php
            }else{
            ?>
                <p class="realtyna_error_bg" style="padding-top:10px; padding-bottom:10px;"> 
                    <i class="realtyna_error_text dashicons dashicons-no"></i> <?=__("Requirements Failed!" , REALTYNA_MLS_SYNC_SLUG );?>
                </p>
            <?php
            }
            ?>
            
            <p class="" style="padding-top:10px; padding-bottom:10px;"> 
                <i class=" dashicons dashicons-info"></i> <?=__("You can also check your hosting benchmark points" , REALTYNA_MLS_SYNC_SLUG);?>, <a href="admin.php?page=realtyna-hosting-benchmark" target="_blank"> <?=__("click here to run a test" , REALTYNA_MLS_SYNC_SLUG );?> </a>
            </p>

            <p>
                <a class="button button-primary <?=$nextButtonDisabledClass;?>" href="<?=$nextStepDirector;?>" ><?=__("Next Step", REALTYNA_MLS_SYNC_SLUG);?></a>
            </p>
        </div>
    </form>
</div>
