<?php /* Smarty version Smarty-3.1.15, created on 2014-02-08 16:31:03
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/service/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190769073952f63fa7c77ee7-63334935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c5506119af9f27485528f9eea47260fc8d617f5' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/modules/admin/views/service/index.tpl',
      1 => 1389192911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190769073952f63fa7c77ee7-63334935',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52f63fa7cb9b91_21475976',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f63fa7cb9b91_21475976')) {function content_52f63fa7cb9b91_21475976($_smarty_tpl) {?><div class="row-fluid">
    <div class="span12">
        <div class="tabbable tabbable-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#tab_1_1">
                        Бэкап Сайта
                    </a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#tab_1_2">
                        Бэкап Парсера
                    </a>
                </li>
<!--                <li class="">-->
<!--                    <a data-toggle="tab" href="#tab_1_2">-->
<!--                        Section 3-->
<!--                    </a>-->
<!--                </li>-->
            </ul>
            <div class="tab-content">
                <div id="tab_1_1" class="tab-pane active">
                    <div class="row-fluid">
                        <div class="span12">
                            <iframe src="<?php echo Yii::app()->baseUrl;?>
/sxd/index.php" width="586" height="462" frameborder="0" style="margin:0;"></iframe>
                        </div>
                    </div>
                </div>
                <div id="tab_1_2" class="tab-pane">
                    <div class="row-fluid">
                        <div class="span12">
                            <iframe src="<?php echo Yii::app()->baseUrl;?>
/parser/sxd/index.php" width="586" height="462" frameborder="0" style="margin:0;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>



<?php }} ?>
