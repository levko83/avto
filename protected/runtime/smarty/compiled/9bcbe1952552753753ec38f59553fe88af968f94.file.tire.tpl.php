<?php /* Smarty version Smarty-3.1.15, created on 2014-05-21 17:12:10
         compiled from "/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/tires/tire.tpl" */ ?>
<?php /*%%SmartyHeaderCode:71618712852d6a95f852275-87634613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9bcbe1952552753753ec38f59553fe88af968f94' => 
    array (
      0 => '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/views/tires/tire.tpl',
      1 => 1400681435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71618712852d6a95f852275-87634613',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52d6a95fa6b6b6_62151344',
  'variables' => 
  array (
    'this' => 0,
    'display' => 0,
    'images' => 0,
    'image' => 0,
    'i' => 0,
    'display_min_price' => 0,
    'diametrs' => 0,
    'diametr' => 0,
    'shins_data' => 0,
    'v' => 0,
    'feedbacks' => 0,
    'feedbackItem' => 0,
    'feedback' => 0,
    'Feedbacks' => 0,
    'feedbackErrors' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d6a95fa6b6b6_62151344')) {function content_52d6a95fa6b6b6_62151344($_smarty_tpl) {?><?php if (!is_callable('smarty_function_imageResizer')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/function.imageResizer.php';
if (!is_callable('smarty_modifier_empty_string')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/modifier.empty_string.php';
if (!is_callable('smarty_block_form')) include '/var/www/ponzps26/data/www/new.extraload.com.ua/protected/vendor/Smarty/plugins/block.form.php';
?><!--_____________________ Левая колонка _________________________-->

    <aside id="sidebar-first">
        <div id="filter-tire" class="filter">
            <?php echo $_smarty_tpl->getSubTemplate ("application.views.tires._blockSearchByTires", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
    </aside>

<!--_________________________________________ Основной контента _________________________________________-->
<section id="center">
    <div id="squeeze">
        <a class="filter-button" href="#filter-tire-780">Фильтр</a>
        <?php if ($_smarty_tpl->tpl_vars['this']->value->breadcrumbs) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("application.views.site._breadcrumbs", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
        <div class="products node node-10 clearfix">
            <div class="field field-name-title">
                <h1>Шины <?php echo $_smarty_tpl->tpl_vars['display']->value->display_name;?>
</h1>
            </div>
            <!--________________________________Блок Шапка продукта________________________________-->
            <div class="field field-name-product-hed">
                <!--___________Блок Галереи___________-->
                <div class="description-block">
                    <div class="product-gallery">
                        <div class="slides_container">
                            <?php  $_smarty_tpl->tpl_vars["image"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image"]->_loop = false;
 $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["image"]->key => $_smarty_tpl->tpl_vars["image"]->value) {
$_smarty_tpl->tpl_vars["image"]->_loop = true;
 $_smarty_tpl->tpl_vars["i"]->value = $_smarty_tpl->tpl_vars["image"]->key;
?>
                                <a href="/images/products/shins/<?php echo $_smarty_tpl->tpl_vars['image']->value["imageName"];?>
" data-lightbox="photo">
                                    <img class="source-image" src="<?php echo smarty_function_imageResizer(array('product_type'=>"tire",'imageName'=>$_smarty_tpl->tpl_vars['image']->value["imageName"],'width'=>180,'height'=>230),$_smarty_tpl);?>
" alt="">
                                </a>
                            <?php } ?>
                        </div>
                        <div class="rating">
                            <input type="hidden" name="val" value="<?php echo $_smarty_tpl->tpl_vars['display']->value->rating->val;?>
"/>
                            <input type="hidden" name="votes" value="<?php echo $_smarty_tpl->tpl_vars['display']->value->rating->votes;?>
"/>
                            <input type="hidden" name="vote-id" value="d<?php echo $_smarty_tpl->tpl_vars['display']->value->id;?>
"/>
                            
                        </div>
                        <ul class="pagination">
                            <?php  $_smarty_tpl->tpl_vars["image"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["image"]->_loop = false;
 $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["image"]->key => $_smarty_tpl->tpl_vars["image"]->value) {
$_smarty_tpl->tpl_vars["image"]->_loop = true;
 $_smarty_tpl->tpl_vars["i"]->value = $_smarty_tpl->tpl_vars["image"]->key;
?>
                                <?php if ($_smarty_tpl->tpl_vars['i']->value<4) {?>
                                    <li><a href="#"><img src="<?php echo smarty_function_imageResizer(array('product_type'=>"tire",'imageName'=>$_smarty_tpl->tpl_vars['image']->value["imageName"],'width'=>47,'height'=>47),$_smarty_tpl);?>
" alt=""></a></li>
                                <?php }?>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="product-options">
                        <?php if ($_smarty_tpl->tpl_vars['display_min_price']->value>0) {?>
                        <div class="price">от <?php echo $_smarty_tpl->tpl_vars['display_min_price']->value;?>
 грн</div>
                        <?php } else { ?>
                        <div class="price">нет в наличии</div>
                        <?php }?>
                        
                        <div class="product-key">Код товара: <span><?php echo $_smarty_tpl->tpl_vars['display']->value->id;?>
</span></div>
                    </div>
                </div>
                <!--___________Блок Оплата и Доставка___________-->
                <div class="payment-delivery clearfix">
                    <h2> Оплата и доставка </h2>
                    <ul>
                        <li class="element-0">Бесплатная доставка по всей Украине!</li>
                        <li class="element-1">Без предоплаты и комиссии!</li>
                        <li class="element-2">100% гарантия возврата!</li>
                        <li class="element-3">Работаем 7 дней в неделю!<span>ПН-CБ: с 9:00 до 21:00<br>ВС: с 10:00 до 18:00</span></li>
                    </ul>
                </div>
            </div>
            <!--____________ Блок Мне нравится ______________-->
            <div class="i-like">
                <div class="vk">
                    <img src="/images/vk.jpg">
                    <!--<script type="text/javascript">
                      VK.init({
                        apiId: ВАШ_API_ID,
                        onlyWidgets: true
                      });
                    </script>
                    <div id="vk_like"></div>
                    <script type="text/javascript">
                     VK.Widgets.Like('vk_like');
                    </script>-->
                </div>
                <div class="google">
                    <!-- Place this tag where you want the +1 button to render. -->
                    <div class="g-plusone"></div>
                    <!-- Place this tag after the last +1 button tag. -->
                    <script type="text/javascript">
                        window.___gcfg = {lang: 'ru'};
                        (function() {
                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                            po.src = 'https://apis.google.com/js/platform.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                        })();
                    </script>
                </div>
                <div class="tviter">
                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                    <script>
                        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
                    </script>
                </div>
                <div class="facebook">
                    <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FExtraloadcomua%2F564208600302244&width&layout=button_count&action=like&show_faces=true&share=false&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
                </div>
            </div>
            <!--___________Блок Параметров товара___________-->
            <div class="parameter-block">
                <div id="tabs">
                    <ul class="tabs_menu">
                        <?php  $_smarty_tpl->tpl_vars["diametr"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["diametr"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['diametrs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["diametr"]->key => $_smarty_tpl->tpl_vars["diametr"]->value) {
$_smarty_tpl->tpl_vars["diametr"]->_loop = true;
?>
                            <li class="first"><a>R<?php echo $_smarty_tpl->tpl_vars['diametr']->value;?>
</a></li>
                        <?php } ?>
                    </ul>
                    <div class="tabs_content">
                        <?php  $_smarty_tpl->tpl_vars["diametr"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["diametr"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['diametrs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["diametr"]->key => $_smarty_tpl->tpl_vars["diametr"]->value) {
$_smarty_tpl->tpl_vars["diametr"]->_loop = true;
?>
                            <div>
                                <table>
                                    <tr>
                                        <th class="element-0">Типоразмер</th>
                                        <th class="element-1">Нагрузка</th>
                                        <th class="element-2">Наличие</th>
                                        <th class="element-3">Цена</th>
                                        <th class="element-4"></th>
                                        <th class="element-5"></th>
                                    </tr>
                                    <?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shins_data']->value[$_smarty_tpl->tpl_vars['diametr']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
?>
                                    <tr>
                                        <td class="element-0">
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value["type_size"];?>

                                        </td>
                                        <td class="element-1">
                                            <?php echo $_smarty_tpl->tpl_vars['v']->value["shins_load_index"];?>

                                        </td>
                                        <td class="element-2">
                                            <?php if ($_smarty_tpl->tpl_vars['v']->value["amount"]>4) {?>
                                                <?php echo $_smarty_tpl->tpl_vars['v']->value["amount"];?>
 шт.
                                            <?php } else { ?>
                                                Нет в наличии
                                            <?php }?>
                                        </td>
                                        <td class="element-3">
                                            <?php if ($_smarty_tpl->tpl_vars['v']->value["price"]>0) {?>
                                              <?php echo $_smarty_tpl->tpl_vars['v']->value["price"];?>
 грн.
                                            <?php }?>
                                        </td>
                                        <td class="element-4 add-tire">
                                            <?php if ($_smarty_tpl->tpl_vars['v']->value["amount"]>4) {?>
                                                <a href="#" tire-id="<?php echo $_smarty_tpl->tpl_vars['v']->value["id"];?>
">Купить</a>
                                            <?php }?>
                                        </td>
                                        <td class="element-5" >
                                            <?php if ($_smarty_tpl->tpl_vars['v']->value["amount"]>4) {?>
                                                <input type="text" class="tires_count" tire-id="<?php echo $_smarty_tpl->tpl_vars['v']->value["id"];?>
" value="4"> шт.
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if (!smarty_modifier_empty_string($_smarty_tpl->tpl_vars['display']->value->display_description)) {?>
            <!--___________Блок Описание товара___________-->
            <div class="product-desc">
                <h4> <span>Описание</span> </h4>
                <div class="product-desc-body">
                    <?php echo $_smarty_tpl->tpl_vars['display']->value->display_description;?>

                </div>
            </div>
            <?php }?>
            <div class="rewievs">
                <h2> Отзывы о <a href="#"><?php echo $_smarty_tpl->tpl_vars['display']->value->display_name;?>
</a></h2>
                <div class="rewievs-content">
                    <?php  $_smarty_tpl->tpl_vars["feedbackItem"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["feedbackItem"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feedbacks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["feedbackItem"]->key => $_smarty_tpl->tpl_vars["feedbackItem"]->value) {
$_smarty_tpl->tpl_vars["feedbackItem"]->_loop = true;
?>
                    <div class="rewiev-0 views-row">
                        <div class="rating">
                            <input type="hidden" name="val" value="<?php echo $_smarty_tpl->tpl_vars['feedbackItem']->value->rating;?>
"/>
                            <input type="hidden" name="votes" value="<?php echo $_smarty_tpl->tpl_vars['display']->value->rating->votes;?>
"/>
                            <input type="hidden" name="vote-id" value="f<?php echo $_smarty_tpl->tpl_vars['feedbackItem']->value->id;?>
"/>
                            
                        </div>
                        <div class="rewiev-fild-title">
                            <p><?php echo $_smarty_tpl->tpl_vars['feedbackItem']->value->user_name;?>
 <span><?php echo DateTimeRussian::getDate($_smarty_tpl->tpl_vars['feedbackItem']->value->created);?>
</span></p>
                        </div>
                        <div class="rewiev-fild-body">
                            <p><?php echo $_smarty_tpl->tpl_vars['feedbackItem']->value->feedback_text;?>
</p>
                        </div>
                        <div class="answer">
                            <a href="#">Ответить</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="rewiev-footer">
                    <a class="more-link" href="#"> Просмотреть все отзывы </a>
                </div>
            </div>
            <!--__________Блок оставить отзыв__________-->
            <div class="formblock-reviews">
                <h2>Оставить отзыв</h2>
                
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"Feedbacks",'id'=>'reviews-node-form','method'=>"post",'htmlOptions'=>array("class"=>"node-form node-reviews-form"))); $_block_repeat=true; echo smarty_block_form(array('name'=>"Feedbacks",'id'=>'reviews-node-form','method'=>"post",'htmlOptions'=>array("class"=>"node-form node-reviews-form")), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <div>
                        <div class="form-item form-type-textfield form-item-title">
                            <label for="">
                                Ваше имя
                                <span class="form-required" title="Обязательно для заполнения.">*</span>
                            </label>
                            <div class="stars clearfix">
                                <?php echo $_smarty_tpl->tpl_vars['Feedbacks']->value->textField($_smarty_tpl->tpl_vars['feedback']->value,"user_name",array("id"=>"edit-title","class"=>"form-text required","maxlength"=>255,"size"=>60));?>

                                <div class="rating">
                                    <input type="hidden" name="val" value="0"/>
                                    <input type="hidden" name="votes" value="<?php echo $_smarty_tpl->tpl_vars['display']->value->rating->votes;?>
"/>
                                    <input type="hidden" name="vote-id" value="new"/>
                                    
                                </div>
                            </div>
                            
                                
                                    
                                
                            
                        </div>
                        <div id="edit-body" class="field-type-text">
                            <div class="form-item form-item-body">
                                <label for="">
                                    Оставте ваше мнение
                                    <span class="form-required" title="Обязательно для заполнения.">*</span>
                                </label>
                                <div class="form-textarea-wrapper">
                                    <?php echo $_smarty_tpl->tpl_vars['Feedbacks']->value->textArea($_smarty_tpl->tpl_vars['feedback']->value,"feedback_text",array("id"=>"edit-body","class"=>"text-full"));?>

                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['feedbackErrors']->value["feedback_text"]) {?>
                                    <div style="color: red;">
                                        <?php echo $_smarty_tpl->tpl_vars['feedbackErrors']->value["feedback_text"][0];?>

                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <div id="edit-actions" class="form-actions form-wrapper">
                            <input id="edit-submit" class="form-submit" type="submit" value="Оставить отзыв">
                        </div>
                    </div>
                    <?php echo $_smarty_tpl->tpl_vars['Feedbacks']->value->hiddenField($_smarty_tpl->tpl_vars['feedback']->value,"rating",array("id"=>"rating_hidden"));?>

                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"Feedbacks",'id'=>'reviews-node-form','method'=>"post",'htmlOptions'=>array("class"=>"node-form node-reviews-form")), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </div>
        </div>
    </div>
</section>
<!-- фильтр для планшета и телефона -->

    <div id="filter-tire-780" class="filter">
        
    </div>
<?php }} ?>
