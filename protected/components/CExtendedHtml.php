<?php
/**
 * Created by PhpStorm.
 * User: Ifaliuk
 * Date: 19.12.13
 * Time: 12:21
 */

class CExtendedHtml extends CHtml{

    public static function checkBoxList($name,$select,$data,$htmlOptions=array())
    {
        $template=isset($htmlOptions['template'])?$htmlOptions['template']:'{input} {label}';
        $separator=isset($htmlOptions['separator'])?$htmlOptions['separator']:"<br/>\n";
        $container=isset($htmlOptions['container'])?$htmlOptions['container']:'span';
        unset($htmlOptions['template'],$htmlOptions['separator'],$htmlOptions['container']);

        if(substr($name,-2)!=='[]')
            $name.='[]';

        if(isset($htmlOptions['checkAll']))
        {
            $checkAllLabel=$htmlOptions['checkAll'];
            $checkAllLast=isset($htmlOptions['checkAllLast']) && $htmlOptions['checkAllLast'];
        }
        unset($htmlOptions['checkAll'],$htmlOptions['checkAllLast']);

        $labelOptions=isset($htmlOptions['labelOptions'])?$htmlOptions['labelOptions']:array();
        unset($htmlOptions['labelOptions']);

        $items=array();
        $baseID=isset($htmlOptions['baseID']) ? $htmlOptions['baseID'] : self::getIdByName($name);
        unset($htmlOptions['baseID']);
        $id=0;
        $checkAll=true;

        foreach($data as $value=>$labelTitle)
        {
            $checked=!is_array($select) && !strcmp($value,$select) || is_array($select) && in_array($value,$select);
            $checkAll=$checkAll && $checked;
            $htmlOptions['value']=$value;
            $htmlOptions['id']=$baseID.'_'.$id++;
            $option=self::checkBox($name,$checked,$htmlOptions);
            $beginLabel=self::openTag('label',$labelOptions);
            //$label=self::label($labelTitle,$htmlOptions['id'],$labelOptions);
            $label=$labelTitle;
            $endLabel=self::closeTag('label');
            $items[]=strtr($template,array(
                '{input}'=>$option,
                '{beginLabel}'=>$beginLabel,
                '{label}'=>$label,
                '{labelTitle}'=>$labelTitle,
                '{endLabel}'=>$endLabel,
            ));
        }

        if(isset($checkAllLabel))
        {
            $htmlOptions['value']=1;
            $htmlOptions['id']=$id=$baseID.'_all';
            $option=self::checkBox($id,$checkAll,$htmlOptions);
            $beginLabel=self::openTag('label',$labelOptions);
            $label=self::label($checkAllLabel,$id,$labelOptions);
            $endLabel=self::closeTag('label');
            $item=strtr($template,array(
                '{input}'=>$option,
                '{beginLabel}'=>$beginLabel,
                '{label}'=>$label,
                '{labelTitle}'=>$checkAllLabel,
                '{endLabel}'=>$endLabel,
            ));
            if($checkAllLast)
                $items[]=$item;
            else
                array_unshift($items,$item);
            $name=strtr($name,array('['=>'\\[',']'=>'\\]'));
            $js=<<<EOD
jQuery('#$id').click(function() {
	jQuery("input[name='$name']").prop('checked', this.checked);
});
jQuery("input[name='$name']").click(function() {
	jQuery('#$id').prop('checked', !jQuery("input[name='$name']:not(:checked)").length);
});
jQuery('#$id').prop('checked', !jQuery("input[name='$name']:not(:checked)").length);
EOD;
            $cs=Yii::app()->getClientScript();
            $cs->registerCoreScript('jquery');
            $cs->registerScript($id,$js);
        }

        if(empty($container))
            return implode($separator,$items);
        else
            return self::tag($container,array('id'=>$baseID),implode($separator,$items));
    }

    public static function activeCheckBoxList($model,$attribute,$data,$htmlOptions=array())
    {
        self::resolveNameID($model,$attribute,$htmlOptions);
        $selection=self::resolveValue($model,$attribute);
        if($model->hasErrors($attribute))
            self::addErrorCss($htmlOptions);
        $name=$htmlOptions['name'];
        unset($htmlOptions['name']);

        if(array_key_exists('uncheckValue',$htmlOptions))
        {
            $uncheck=$htmlOptions['uncheckValue'];
            unset($htmlOptions['uncheckValue']);
        }
        else
            $uncheck='';

        $hiddenOptions=isset($htmlOptions['id']) ? array('id'=>self::ID_PREFIX.$htmlOptions['id']) : array('id'=>false);
        $hidden=$uncheck!==null ? self::hiddenField($name,$uncheck,$hiddenOptions) : '';

        return $hidden . self::checkBoxList($name,$selection,$data,$htmlOptions);
    }

} 