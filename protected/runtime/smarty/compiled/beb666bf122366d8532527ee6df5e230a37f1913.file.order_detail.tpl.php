<?php /* Smarty version Smarty-3.1.15, created on 2014-02-28 12:48:45
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/cart/order_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:341771095310698d0f1033-05937462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'beb666bf122366d8532527ee6df5e230a37f1913' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/cart/order_detail.tpl',
      1 => 1393584497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '341771095310698d0f1033-05937462',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cartItems' => 0,
    'cartItem' => 0,
    'summ' => 0,
    'order' => 0,
    'DetailOrder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5310698d1fa491_63402673',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5310698d1fa491_63402673')) {function content_5310698d1fa491_63402673($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
?><section id="center">
    <div id="squeeze">
        <div class="detailed-ordering">
            <h2>Оформление заказа</h2>
            <div class="content clearfix">
                <!--_____________________ Корзина __________________________-->
                <div id="cart-block">
                    <h2>Ваш заказ</h2>
                    <a class="cart-close close" href="#">X</a>
                    <form>
                        <div class="products-cart-page">
                            <?php  $_smarty_tpl->tpl_vars["cartItem"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["cartItem"]->_loop = false;
 $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cartItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["cartItem"]->key => $_smarty_tpl->tpl_vars["cartItem"]->value) {
$_smarty_tpl->tpl_vars["cartItem"]->_loop = true;
 $_smarty_tpl->tpl_vars["i"]->value = $_smarty_tpl->tpl_vars["cartItem"]->key;
?>
                            <div class="views-row clearfix">
                                <a class="product-delit close" product-id="<?php echo $_smarty_tpl->tpl_vars['cartItem']->value->id;?>
" product-type="<?php echo $_smarty_tpl->tpl_vars['cartItem']->value->class;?>
"href="#"><span>X</span><a>
                                <div class="image-row">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['cartItem']->value->image;?>
" alt=" " title=" " />
                                </div>
                                <div class="row-title text-line"><?php echo $_smarty_tpl->tpl_vars['cartItem']->value->title;?>
</div>
                                <div class="code text-line">код товара: <?php echo $_smarty_tpl->tpl_vars['cartItem']->value->id;?>
</div>
                                <div class="price-for-one text-line"><span><?php echo $_smarty_tpl->tpl_vars['cartItem']->value->price;?>
</span> грн</div>
                                <div class="quantity text-line">Кол-во<input type="text" class="change-amount" product-id="<?php echo $_smarty_tpl->tpl_vars['cartItem']->value->id;?>
" product-type="<?php echo $_smarty_tpl->tpl_vars['cartItem']->value->class;?>
" value="<?php echo $_smarty_tpl->tpl_vars['cartItem']->value->count;?>
">шт.</div>
                                <div class="price-oll text-line"><span><?php echo $_smarty_tpl->tpl_vars['cartItem']->value->cost;?>
</span> грн</div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="summarized-data">
                            <div id="price-finali">Итого: <span><span><?php echo $_smarty_tpl->tpl_vars['summ']->value;?>
</span>грн</span></div>
                        </div>
                    </form>
                </div>
                <!--_____________________ Форма оформления ______________________-->
                <div class="detailed-ordering-form">
                    <div class="content">
                        <div id="block-web-form-application">
                            <div class="content">
                                
                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"DetailOrder",'id'=>"web-form-application",'htmlOptions'=>array("class"=>"client-form"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"DetailOrder",'id'=>"web-form-application",'htmlOptions'=>array("class"=>"client-form")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                    <div class="fio">
                                        <div class="content">
                                            <div class="cart-error" style="font-size: 2em;">
                                                <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->error($_smarty_tpl->tpl_vars['order']->value,'other');?>

                                            </div>
                                            <div id="webform-component-vashe-imya" class="form-item webform-component webform-component-textfield">
                                                <label>ФИО:<span>*</span></label>
                                                
                                                <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->textField($_smarty_tpl->tpl_vars['order']->value,'fio',array("class"=>"form-text"));?>

                                                <div class="cart-error">
                                                    <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->error($_smarty_tpl->tpl_vars['order']->value,'fio');?>

                                                </div>
                                            </div>
                                            <div id="webform-component-telefon" class="form-item webform-component webform-component-textfield">
                                                <label>Телефон:<span>*</span></label>
                                                <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->textField($_smarty_tpl->tpl_vars['order']->value,'phone',array("class"=>"form-text"));?>

                                                <div class="cart-error">
                                                    <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->error($_smarty_tpl->tpl_vars['order']->value,'phone');?>

                                                </div>
                                            </div>
                                            
                                                
                                                
                                                
                                                    
                                                
                                            
                                        </div>
                                    </div>
                                    <div class="address-select">
                                        <div class="content clearfix">
                                            <div class="delivery-method form-select select">
                                                <label>Способ доставки:<span>*</span></label>
                                                <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->dropDownList($_smarty_tpl->tpl_vars['order']->value,"delivary_id",CHtml::listData(OrderDeliverys::model()->findAll(),'id','delivery'),array("empty"=>"- способ доставки -"));?>

                                                <div class="cart-error">
                                                    <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->error($_smarty_tpl->tpl_vars['order']->value,'delivary_id');?>

                                                </div>
                                            </div>
                                            <div class="region form-select select">
                                                <label>Область:<span>*</span></label>
                                                <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->textField($_smarty_tpl->tpl_vars['order']->value,'region',array("class"=>"form-text"));?>

                                                <div class="cart-error">
                                                    <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->error($_smarty_tpl->tpl_vars['order']->value,'region');?>

                                                </div>
                                            </div>
                                            <div class="city form-select select">
                                                <label>Город:<span>*</span></label>
                                                <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->textField($_smarty_tpl->tpl_vars['order']->value,'city',array("class"=>"form-text"));?>

                                                <div class="cart-error">
                                                    <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->error($_smarty_tpl->tpl_vars['order']->value,'city');?>

                                                </div>
                                            </div>
                                            
                                                
                                                
                                            
                                        </div>
                                    </div>
                                    <p>Сроки доставки 1-3 дня. Как груз прибудет на склад, Вам обязательно придёт SMS уведомление.</p>
                                    <div class="wishes">
                                        <div class="content">
                                            <div id="webform-component-soobshchenie" class="form-item clearfix webform-component">
                                                <label for="text-wishes">Коментарии к заказу: </label>
                                                <div class="form-textarea-wrapper">
                                                    <?php echo $_smarty_tpl->tpl_vars['DetailOrder']->value->textArea($_smarty_tpl->tpl_vars['order']->value,'comment',array("class"=>"form-textarea"));?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="edit-actions" class="form-actions form-wrapper">
                                        <input id="edit-submit" class="form-submit" type="submit" value="ОФОРМИТЬ ЗАКАЗ" name="op">
                                    </div>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"DetailOrder",'id'=>"web-form-application",'htmlOptions'=>array("class"=>"client-form")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php }} ?>
