<?php
/**
 * 
 */

global $project;
$project = 'mysite';

global $database;
$database = '';

require_once '../mysite/conf/MyConfigureFromEnv.php';

MySQLDatabase::set_connection_charset('utf8');

SSViewer::set_theme('mytheme');

if(class_exists('SiteTree')) SiteTree::enable_nested_urls();

GD::set_default_quality(100);

// Set the site locale
i18n::set_locale('en_AU');

//Add an extension to the siteconfig
Object::add_extension('SiteConfig', 'SiteConfigExtension');

// log errors and warnings
//SS_Log::add_writer(new SS_LogEmailWriter('guy.watson@internetrix.com.au,susan.zhang@internetrix.com.au'), SS_Log::WARN, '<=');