<?php
/** Block direct access to the file.*/ 
defined( 'ABSPATH' ) || die( 'Access Denied!' );

$pluginVersion = ( !empty( $_REALTYNA['plugin']['Version'] ) ? 'v' . $_REALTYNA['plugin']['Version'] : '' );
$pluginName = ( !empty( $_REALTYNA['plugin']['Name'] ) ? $_REALTYNA['plugin']['Name'] : '' );

if ( !empty( $pluginName ) || !empty( $pluginVersion ) )
        $pluginName .= " " . $pluginVersion;

?>

<header  class="realtyna_mls_sync_header">
        <strong><?=$pluginName;?></strong>
        <div class="realtyna_logo"></div>
</header>

<input type="hidden" name="realtyna_houzez_nonce" id="realtyna_houzez_nonce" value="<?=wp_create_nonce( 'realtyna_houzez_secret_nonce' )?>">

<?php
if ( isset( $_REALTYNA['isUpdateAvailable'] ) && ( $_REALTYNA['isUpdateAvailable'] == true ) ):

?>
<p>
        <a class="button" id="btnRealtynaUpdater" data-slug="<?= $_REALTYNA['plugin']['TextDomain'] ?? '' ;?>" href="javascript:void(0);">
        <?php
                printf( __("Update to v%s is Available!" , REALTYNA_MLS_SYNC_SLUG ) , $_REALTYNA['updateLastVersion'] );
        ?>
        </a>
</p>
<?php
endif;
?>