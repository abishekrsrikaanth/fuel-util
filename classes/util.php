<?php

namespace Util;

abstract class Util {

	public static function getUUID()
	{
		return sprintf ('%04x%04x-%04x-%03x4-%04x-%04x%04x%04x',
			mt_rand (0, 65535), mt_rand (0, 65535), // 32 bits for "time_low"
			mt_rand (0, 65535), // 16 bits for "time_mid"
			mt_rand (0, 4095), // 12 bits before the 0100 of (version) 4 for "time_hi_and_version"
			bindec (substr_replace (sprintf ('%016b', mt_rand (0, 65535)), '01', 6, 2)),
			// 8 bits, the last two of which (positions 6 and 7) are 01, for "clk_seq_hi_res"
			// (hence, the 2nd hex digit after the 3rd hyphen can only be 1, 5, 9 or d)
			// 8 bits for "clk_seq_low"
			mt_rand (0, 65535), mt_rand (0, 65535), mt_rand (0, 65535) // 48 bits for "node"
		);
	}

	public static function StringToTitle($title) // Converts $title to Title Case, and returns the result.
	{
		// Our array of 'small words' which shouldn't be capitalised if
		// they aren't the first word. Add your own words to taste.
		$smallwordsarray = array('of', 'a', 'the', 'and', 'an', 'or', 'nor', 'but', 'is', 'if', 'then', 'else', 'when', 'at', 'from', 'by', 'on', 'off', 'for', 'in', 'out', 'over', 'to', 'into', 'with');
		// Split the string into separate words
		$words = explode (' ', $title);
		foreach ($words as $key => $word) {
			// If this word is the first, or it's not one of our small words, capitalise it
			// with ucwords().
			if ($key == 0 or !in_array ($word, $smallwordsarray))
				$words[$key] = ucwords ($word);
		} // Join the words back into a string $newtitle = implode(' ', $words); return $newtitle; }
	}

	public static function getTimeDifference($time)
	{
		$timeDifference = time() - $time;
		if ($timeDifference < 60) {
			return $timeDifference . " seconds ago";
		}
		else if ($timeDifference >= 60 && $timeDifference < (60 * 2)) {
			return " about a minute ago";
		}
		else if ($timeDifference >= (60 * 2) && $timeDifference < (60 * 60)) {
			return floor($timeDifference / 60) . " minutes ago";
		}
		else if ($timeDifference >= (60 * 60) && $timeDifference < (60 * 60 * 2)) {
			return "about an hour ago";
		}
		else if ($timeDifference >= (60 * 60 * 2) && $timeDifference < (60 * 60 * 24)) {
			return floor($timeDifference / (60 * 60)) . " hours ago";
		}
		else if ($timeDifference >= (60 * 60 * 24) && $timeDifference < (60 * 60 * 24 * 2)) {
			return "a day ago";
		}
		else if ($timeDifference >= (60 * 60 * 24 * 2) && $timeDifference < (60 * 60 * 24 * 30)) {
			return floor($timeDifference / (60 * 60 * 24)) . " days ago";
		}
		else if ($timeDifference >= (60 * 60 * 24 * 30) && $timeDifference < (60 * 60 * 24 * 30 * 2)) {
			return "about a month ago";
		}
		else if ($timeDifference >= (60 * 60 * 24 * 30 * 2) && $timeDifference < (60 * 60 * 24 * 30 * 12)) {
			return floor($timeDifference / (60 * 60 * 24 * 30)) . " months ago";
		}
	}
}
