<?php /* Smarty version 2.6.25, created on 2015-02-03 13:32:29
         compiled from /Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'asset', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 4, false),array('function', 'link', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 12, false),array('function', 'logo', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 12, false),array('function', 'dashboard_link', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 14, false),array('function', 'discussions_link', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 15, false),array('function', 'activity_link', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 16, false),array('function', 'inbox_link', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 17, false),array('function', 'custom_menu', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 18, false),array('function', 'profile_link', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 19, false),array('function', 'signinout_link', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 20, false),array('function', 'breadcrumbs', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 26, false),array('function', 'module', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 28, false),array('function', 'searchbox', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 30, false),array('function', 'vanillaurl', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 37, false),array('function', 'event', '/Users/Panayiotis/Sites/vanilla/themes/EmbedFriendly/views/default.master.tpl', 42, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
  <?php echo smarty_function_asset(array('name' => 'Head'), $this);?>

</head>

<body id="<?php echo $this->_tpl_vars['BodyID']; ?>
" class="<?php echo $this->_tpl_vars['BodyClass']; ?>
">

<div id="Frame">
 <div id="Head">
   <div class="Row">
     <strong class="SiteTitle"><a href="<?php echo smarty_function_link(array('path' => "/"), $this);?>
"><?php echo smarty_function_logo(array(), $this);?>
</a></strong>
     <ul class="SiteMenu">
      <?php echo smarty_function_dashboard_link(array(), $this);?>

      <?php echo smarty_function_discussions_link(array(), $this);?>

      <?php echo smarty_function_activity_link(array(), $this);?>

      <?php echo smarty_function_inbox_link(array(), $this);?>

      <?php echo smarty_function_custom_menu(array(), $this);?>

      <?php echo smarty_function_profile_link(array(), $this);?>

      <?php echo smarty_function_signinout_link(array(), $this);?>

     </ul>
   </div>
  </div>
  <div id="Body">
    <div class="Row">
      <div class="BreadcrumbsWrapper P"><?php echo smarty_function_breadcrumbs(array(), $this);?>
</div>
      <div class="Column PanelColumn" id="Panel">
         <?php echo smarty_function_module(array('name' => 'MeModule','CssClass' => 'FlyoutRight'), $this);?>

         <?php echo smarty_function_asset(array('name' => 'Panel'), $this);?>

         <div class="SiteSearch"><?php echo smarty_function_searchbox(array(), $this);?>
</div>
      </div>
      <div class="Column ContentColumn" id="Content"><?php echo smarty_function_asset(array('name' => 'Content'), $this);?>
</div>
    </div>
  </div>
  <div id="Foot">
    <div class="Row">
      <a href="<?php echo smarty_function_vanillaurl(array(), $this);?>
" class="PoweredByVanilla">Powered by Vanilla</a>
      <?php echo smarty_function_asset(array('name' => 'Foot'), $this);?>

    </div>
  </div>
</div>
<?php echo smarty_function_event(array('name' => 'AfterBody'), $this);?>

</body>
</html>