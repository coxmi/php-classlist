<?php


require_once __DIR__ . '/../src/classlist.php';


test('classlist', function() {

	$expected = "1 2 3 3.1415926535898 string string2 array array2 array3 level1 level2 level3 level4 arrayBoolTrue objectKeyTrue &#039;&quot;";

	$compare = $expected === classlist(
		// int
		0, 1, 2, 3,
		// float
		pi(),
		// strings
		'string', 'string2',
		// array
		['array', 'array2', 'array3'], 
		// flatten array
		['level1', ['level2', ['level3', ['level4']]]],
		// array with keys 
		['arrayBoolTrue' => true, 'arrayBoolFalse' => false],
		// object
		(object) ['objectKeyTrue' => true, 'objectKeyFalse' => false],
		// falsy
		false, null, [],
		// escaped quotes
		"'\"",
	);
    
    expect($compare)->toBeTrue();
});


test('tokenlist', function() {

	$expected = ['1', 'string', 'array', 'key1', 'key2'];
	$output = tokenlist(
		0, 1, 
		'string', 
		['array'], 
		['key1' => true], (object) ['key2' => true],
		['key3' => false]
	);
	
	$diff = array_diff($expected, $output);
	expect(empty($diff))->toBeTrue();
});