<?php

if (function_exists('classlist')) return;

function classlist() : string {
	$classlist = implode(' ', tokens(func_get_args()));
	return htmlspecialchars($classlist, ENT_QUOTES, 'UTF-8');
}

function tokenlist() : array {
	return tokens(func_get_args());
}

function tokens($token) : array {
	if (empty($token)) return [];
	if (is_string($token)) return [trim($token)];
	if (is_numeric($token)) return [(string) $token];
	if (is_object($token)) $token = (array) $token;
	if (is_array($token)) {
		$tokens = [];
		foreach((array) $token as $key => $value) {
			if (is_int($key)) $tokens = array_merge($tokens, tokens($value));
			if (is_string($key) && !empty($value)) $tokens[] = trim($key);
		}
		return $tokens;
	}
	if (method_exists($token, '__toString')) return [trim((string) $token)];
	return [];
}