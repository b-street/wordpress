<?php
/**
 * Plugin Name: Realtyna MLS Sync
 * Plugin URI: https://realtyna.com/
 * Description: Sync MLS listings with third-party themes
 * Author: Realtyna
 * Author URI: https://realtyna.com/
 * Version: 0.9.16
 * Text Domain: realtyna-mls-sync
 */

/** Block direct access to the main plugin file.*/ 
defined( 'ABSPATH' ) || die( 'Access Denied!' );

/** @var string default plugin slug holder */
define( "REALTYNA_MLS_SYNC_SLUG" , "realtyna-mls-sync" );
/** @var string default plugin icon holder */
define( "REALTYNA_MLS_SYNC_ICON" , "dashicons-database-import" );

include_once( 'RealtynaAutoloader.php' );

RealtynaMlsSync::getInstance();