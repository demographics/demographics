<?php if (!defined('APPLICATION')) exit();

// Conversations
$Configuration['Conversations']['Version'] = '2.1.8p2';

// Database
$Configuration['Database']['Name'] = 'demographics_schema';
$Configuration['Database']['Host'] = 'localhost';
$Configuration['Database']['User'] = 'root';
$Configuration['Database']['Password'] = 'uj2?ah9r';

// EnabledApplications
$Configuration['EnabledApplications']['Conversations'] = 'conversations';
$Configuration['EnabledApplications']['Vanilla'] = 'vanilla';

// EnabledPlugins
$Configuration['EnabledPlugins']['GettingStarted'] = 'GettingStarted';
$Configuration['EnabledPlugins']['HtmLawed'] = 'HtmLawed';

// Garden
$Configuration['Garden']['Title'] = 'demographics';
$Configuration['Garden']['Cookie']['Salt'] = 'HO8DG13JWT';
$Configuration['Garden']['Cookie']['Domain'] = '';
$Configuration['Garden']['Registration']['ConfirmEmail'] = '1';
$Configuration['Garden']['Registration']['Method'] = 'Connect';
$Configuration['Garden']['Registration']['ConfirmEmailRole'] = '3';
$Configuration['Garden']['Registration']['CaptchaPrivateKey'] = '';
$Configuration['Garden']['Registration']['CaptchaPublicKey'] = '';
$Configuration['Garden']['Registration']['InviteExpiration'] = '-1 week';
$Configuration['Garden']['Registration']['InviteRoles']['3'] = '0';
$Configuration['Garden']['Registration']['InviteRoles']['4'] = '0';
$Configuration['Garden']['Registration']['InviteRoles']['8'] = '0';
$Configuration['Garden']['Registration']['InviteRoles']['16'] = '0';
$Configuration['Garden']['Registration']['InviteRoles']['32'] = '0';
$Configuration['Garden']['Email']['SupportName'] = 'demographics';
$Configuration['Garden']['InputFormatter'] = 'Html';
$Configuration['Garden']['Html']['SafeStyles'] = TRUE;
$Configuration['Garden']['Version'] = '2.1.8p2';
$Configuration['Garden']['RewriteUrls'] = FALSE;
$Configuration['Garden']['Cdns']['Disable'] = FALSE;
$Configuration['Garden']['CanProcessImages'] = TRUE;
$Configuration['Garden']['SystemUserID'] = '2';
$Configuration['Garden']['Installed'] = TRUE;
$Configuration['Garden']['HomepageTitle'] = 'Demographics';
$Configuration['Garden']['Description'] = '';
$Configuration['Garden']['Theme'] = 'bittersweet';

// Plugins
$Configuration['Plugins']['GettingStarted']['Dashboard'] = '1';
$Configuration['Plugins']['GettingStarted']['Discussion'] = '1';
$Configuration['Plugins']['GettingStarted']['Registration'] = '1';
$Configuration['Plugins']['GettingStarted']['Categories'] = '1';

// Routes
$Configuration['Routes']['DefaultController'] = 'discussions';

// Vanilla
$Configuration['Vanilla']['Version'] = '2.1.8p2';

// Last edited by ppavli02 (127.0.0.1)2015-02-07 13:50:59