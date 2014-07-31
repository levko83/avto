<?php /* Smarty version Smarty-3.1.15, created on 2014-02-08 16:30:33
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/news/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:150532264052f63f89a4da90-07888262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad49e3ac3807ab9995b619265563f63112061df0' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/news/edit.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150532264052f63f89a4da90-07888262',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'labels' => 0,
    'model' => 0,
    'News' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52f63f89b34be4_82084772',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f63f89b34be4_82084772')) {function content_52f63f89b34be4_82084772($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"News",'id'=>'formNews','htmlOptions'=>array("class"=>"form-horizontal"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"News",'id'=>'formNews','htmlOptions'=>array("class"=>"form-horizontal")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<div class="form-wizard">
    <div class="control-group">
        <label class="control-label">
            <?php echo $_smarty_tpl->tpl_vars['labels']->value["title"];?>

            <span class="required">*</span>
        </label>
        <div class="controls">
            <?php echo $_smarty_tpl->tpl_vars['News']->value->textField($_smarty_tpl->tpl_vars['model']->value,'title');?>

            <span for="News[title]" class="help-inline">
                <?php echo $_smarty_tpl->tpl_vars['News']->value->error($_smarty_tpl->tpl_vars['model']->value,'title');?>

            </span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            <?php echo $_smarty_tpl->tpl_vars['labels']->value["short"];?>

            <span class="required">*</span>
        </label>
        <div class="controls">
            <?php echo $_smarty_tpl->tpl_vars['News']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'short',array("class"=>'tiny'));?>

            <span for="News[short]" class="help-inline">
                <?php echo $_smarty_tpl->tpl_vars['News']->value->error($_smarty_tpl->tpl_vars['model']->value,'short');?>

            </span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            <?php echo $_smarty_tpl->tpl_vars['labels']->value["body"];?>

            <span class="required">*</span>
        </label>
        <div class="controls">
            <?php echo $_smarty_tpl->tpl_vars['News']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'body',array("class"=>'tiny'));?>

            <span for="News[body]" class="help-inline">
                <?php echo $_smarty_tpl->tpl_vars['News']->value->error($_smarty_tpl->tpl_vars['model']->value,'body');?>

            </span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            <?php echo $_smarty_tpl->tpl_vars['labels']->value["search_keywords"];?>

        </label>
        <div class="controls">
            <?php echo $_smarty_tpl->tpl_vars['News']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'search_keywords');?>

            <span for="News[search_keywords]" class="help-inline">
                <?php echo $_smarty_tpl->tpl_vars['News']->value->error($_smarty_tpl->tpl_vars['model']->value,'search_keywords');?>

            </span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            <?php echo $_smarty_tpl->tpl_vars['labels']->value["search_description"];?>

        </label>
        <div class="controls">
            <?php echo $_smarty_tpl->tpl_vars['News']->value->textArea($_smarty_tpl->tpl_vars['model']->value,'search_description');?>

            <span for="News[search_description]" class="help-inline">
                <?php echo $_smarty_tpl->tpl_vars['News']->value->error($_smarty_tpl->tpl_vars['model']->value,'search_description');?>

            </span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            <?php echo $_smarty_tpl->tpl_vars['labels']->value["published"];?>

        </label>
        <div class="controls">
            <?php echo $_smarty_tpl->tpl_vars['News']->value->checkBox($_smarty_tpl->tpl_vars['model']->value,'published',array('value'=>1,'uncheckValue'=>0));?>

            <span for="News[published]" class="help-inline">
                <?php echo $_smarty_tpl->tpl_vars['News']->value->error($_smarty_tpl->tpl_vars['model']->value,'published');?>

            </span>
        </div>
    </div>
    <div class="form-actions">
        <button class="btn blue" type="submit">Сохранить</button>
    </div>
</div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"News",'id'=>'formNews','htmlOptions'=>array("class"=>"form-horizontal")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }} ?>
