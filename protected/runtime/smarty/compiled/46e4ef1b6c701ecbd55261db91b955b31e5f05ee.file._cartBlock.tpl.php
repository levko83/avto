<?php /* Smarty version Smarty-3.1.15, created on 2014-02-28 12:48:42
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/cart/_cartBlock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54528301552de770016bd02-16049316%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46e4ef1b6c701ecbd55261db91b955b31e5f05ee' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/cart/_cartBlock.tpl',
      1 => 1393584497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54528301552de770016bd02-16049316',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52de77002c0ae1_10091490',
  'variables' => 
  array (
    'cartItems' => 0,
    'cartItem' => 0,
    'summ' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52de77002c0ae1_10091490')) {function content_52de77002c0ae1_10091490($_smarty_tpl) {?><h2>Ваша корзина</h2>
<a class="cart-close close" href="#">X</a>

    <div class="products-cart">
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
" href="#">Удалить <span>X</span><a>
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
        <div id="price-finali">Итого: <span><?php echo $_smarty_tpl->tpl_vars['summ']->value;?>
</span> грн</div>
        <form id="shortOrder" method="post" action="#">
            <div class="user-data">
                Ф.И.О.:*
                <input type="text" id="fio" name="fio" value="">
                Телефон:*
                <input type="text"
                       id="phone"
                       name="phone"
                       value=""
                       value="(0**)***-**-**"
                       onfocus="if ($.trim(this.value) == '(0**)***-**-**') this.value = '';"
                       onblur="if ($.trim(this.value) == '') this.value = '(0**)***-**-**';"
                        >
                <div class="cart-error"></div>
            </div>
            <div class="continue-shopping"><a href="#">Продолжить покупки</a></div>
            <div class="form-action submit">
                <input type="submit" value="Заказать">
                <a href="/order_detail.html">Детальное оформление заказа</a>
            </div>
        </form>
    </div>
</form><?php }} ?>
