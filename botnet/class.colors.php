<?php
class Color
{
	const BOLD = "\x02";
	const UNDERLINE = "\x1f";
	const ITALICS = "\x1d";
	const DARKBLUE = "\x032";
	const GREEN = "\x033";
	const RED = "\x034";
	const DARKRED = "\x035";
	const PURPLE = "\x036";
	const ORANGE = "\x037";
	const YELLOW = "\x038";
	const LIMEGREEN = "\x039";
	const TURQUOISE = "\x0310";
	const LIGHT_TURQUOISE = "\x0311";
	const BLUE = "\x0312";
	const PINK = "\x0313";
	const GRAY = "\x0314";
	const LIGHT_GRAY = "\x0315";
	
	public static function format($str, $format) {
		if (!is_array($format)) {
			$format = array($format);
		}
		
		foreach ($format as $style) {
			$str = $style . $str . $style;
		}
		return $str;
	}
}
?>