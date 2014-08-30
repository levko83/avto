<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */

    public $page_type;

	public $breadcrumbs=array();


    public $noIndex;
    public $title;
    public $text;
    public $meta_keywords;
    public $meta_description;
    public $disksSubMenu = array();
    public $shinsSubMenu = array();

    public function setSeoInformation($page_key){
        $page = Menu::getInstance()->getSitePageByPageKey($page_key);
        if($page){
            $this->title = $page["title"];
            if($page["hasText"] == 1){
                $this->text = $page["text"];
            }
            $this->meta_keywords = $page["meta_keywords"];
            $this->meta_description = $page["meta_description"];
        }
    }

    protected function beforeAction($action){
        $this->shinsSubMenu = SubMenu::getInstance()->getShinsSubMenu();
        $this->disksSubMenu = SubMenu::getInstance()->getDisksSubMenu();
        return true;
    }

}