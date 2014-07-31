<?php
/**
 * Smarty escape modifier plugin
 *
 * Type:     modifier<br>
 * Name:     empty_string<br>
 *
 * @author Mevis
 * @param string  $string        input string
 * @return boolean
 */
function smarty_modifier_empty_string($string)
{
    $string = trim($string);
    return empty($string);
}
