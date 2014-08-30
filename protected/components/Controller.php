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

    public function setSeoInformation($page_key, $data = null){
        $criteria = new CDbCriteria();
        $criteria->compare("page_key", $page_key);
        $page = PagesSeo::model()->find($criteria);
        if(!$page){
            return;
        }
        if($page->hasTemplate == 1){
            if(!$data){
                return;
            }
            $templateKeywords = unserialize($page->template_keywords);
            switch ($page_key){
                case "shins_category":
                    $templateKeywordsData = $data;
                    break;
                case "shins_brands":
                    $templateKeywordsData = $data;
                    break;
                case "shins_display":
                    $templateKeywordsData = ShinsDisplays::model()->getSeoTemplateSubstitutionData($data, $templateKeywords);
                    break;
                case "disks_category":
                    $templateKeywordsData = $data;
                    break;
                case "disks_brands":
                    $templateKeywordsData = $data;
                    break;
                case "disks_display":
                    $templateKeywordsData = DisksDisplays::model()->getSeoTemplateSubstitutionData($data, $templateKeywords);
                    break;
                default:
                    return;
            }
            $replaceKeywords = function($str) use ($templateKeywordsData){
                foreach($templateKeywordsData as $keyword => $value){
                    if(trim($value) == ""){
                        continue;
                    }
                    $str = str_replace('{'.$keyword.'}', $value, $str);
                }
                return $str;
            };
            $this->title = $replaceKeywords($page->title);
            if($page->hasText == 1){
                $this->text = $replaceKeywords($page->text);
            }
            $this->meta_keywords = $replaceKeywords($page->meta_keywords);
            $this->meta_description = $replaceKeywords($page->meta_description);
        }else{
            $this->title = $page->title;
            $this->text = $page->text;
            $this->meta_keywords = $page->meta_keywords;
            $this->meta_description = $page->meta_description;
        }
    }

    protected function beforeAction($action){
        $makeSubMenu = function(&$subMenu, $url, $level = 1) use (&$makeSubMenu){
            foreach($subMenu as $i => &$subMenuItem){
                $subMenuItem["itemOptions"] = array("class" => "leaf-{$i}");
                if(count($subMenuItem["urlParams"]) == 2){
                    $subMenuItem["url"] = array(
                        $url,
                        "type" => $subMenuItem["urlParams"][0],
                        "type1" => $subMenuItem["urlParams"][1],
                    );
                }else{
                    $subMenuItem["url"] = array(
                        $url,
                        "type" => $subMenuItem["urlParams"][0],
                    );
                }
                unset($subMenuItem["urlParams"]);
                // если есть подменю
                if(array_key_exists("items", $subMenuItem)){
                    $subMenuItem["submenuOptions"] = array("class" => "sub-menu-1");
                    $makeSubMenu($subMenuItem["items"], $url, ++$level);
                }
            }
        };
        $shinsSubMenu = Menu::getInstance()->getShinsSubMenu();
        $makeSubMenu($shinsSubMenu, "tires/tiresSubMenu");
        $this->shinsSubMenu = $shinsSubMenu;
        $disksSubMenu = Menu::getInstance()->getDisksSubMenu();
        $makeSubMenu($disksSubMenu, "drives/drivesSubMenu");
        $this->disksSubMenu = $disksSubMenu;
        return true;

    }

}