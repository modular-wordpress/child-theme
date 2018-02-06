<?php
$registeredModules = [];

if(!function_exists("mwpm_register_module")) {
    function mwpm_register_module($data) {
        global $registeredModules;

        $key = $data["key"];

        $registeredModules[$key] = $data;
    }
}

// Find all ACF files and load them
$di = new RecursiveDirectoryIterator(__DIR__ . "/../content_modules");

foreach(new RecursiveIteratorIterator($di) as $filename => $file) {
    $basename = basename($filename);

    if($basename === "acf.php") {
        include_once $filename;
    }
}

if(function_exists('acf_add_local_field_group')):

acf_add_local_field_group(array(
	'key' => 'group_5a78af4381116',
	'title' => 'Page Content Modules',
	'fields' => array(
		array(
			'key' => 'field_5a78af6fac0b5',
			'label' => 'Content Modules',
			'name' => 'content_modules',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layouts' => $registeredModules,
			'button_label' => 'Add Row',
			'min' => '',
			'max' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'top_level',
			),
		),
		array(
			array(
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'parent',
			),
		),
		array(
			array(
				'param' => 'page_type',
				'operator' => '==',
				'value' => 'child',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'the_content',
	),
	'active' => 1,
	'description' => '',
));

endif;
