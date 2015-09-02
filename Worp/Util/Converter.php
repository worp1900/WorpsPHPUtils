<?php
/**
 * Created by PhpStorm.
 * User: svhu
 * Date: 01.09.15
 * Time: 15:46
 */

namespace Worp\Util;


class Converter
{
	/**
	 * Recursively converts an object to an an associative array.
	 *
	 * @param $obj - An object with public properties only
	 * @return array -
	 */
	public static function objectToArray($obj)
	{
		if(is_object($obj)) $obj = (array) $obj;
		if(is_array($obj)) {
			$new = array();
			foreach($obj as $key => $val) {
				$new[$key] = self::objectToArray($val);
			}
		}
		else $new = $obj;
		return $new;
	}
}
