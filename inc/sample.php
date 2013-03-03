<?

$prefix = 'sample_';

$fields = array(
	array( // Text Input
		'label'	=> 'Text Input', // <label>
		'desc'	=> 'A description for the field.', // description
		'id'	=> $prefix.'text', // field id and name
		'type'	=> 'text' // type of field
	),
	array( // Textarea
		'label'	=> 'Textarea', // <label>
		'desc'	=> 'A description for the field.', // description
		'id'	=> $prefix.'textarea', // field id and name
		'type'	=> 'textarea' // type of field
	),
    array( 
        'label' => 'Gallery images', 
        'desc'  => 'A description for the field.', 
        'id'    => $prefix.'repeatable_image', 
        'type'  => 'repeatable', 
        'repeatable_fields' => array ( 
            'gallery' => array(
                'label' => 'Image',
                'id' => 'gallery',
                'type' => 'image'
            )

        )
    ),
    array( 
        'label' => 'Documents', 
        'desc'  => 'A description for the field.', 
        'id'    => $prefix.'repeatable_file', 
        'type'  => 'repeatable',
        'repeatable_fields' => array ( 
            'documents' => array(
                'label' => 'doc',
                'id' => 'document',
                'type' => 'file'
            )

        )
    )
	
);

/**
 * Instantiate the class with all variables to create a meta box
 * var $id string meta box id
 * var $title string title
 * var $fields array fields
 * var $page string|array post type to add meta box to
 * var $js bool including javascript or not
 */
$sample_box = new custom_add_meta_box( 'sample_box', 'Sample Box', $fields, 'post', true );
