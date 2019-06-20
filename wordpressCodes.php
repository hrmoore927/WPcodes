<?php
//Don't use the previous php tag. Use everything from here down for library module numbers.

// create new column in et_pb_layout screen
add_filter( 'manage_et_pb_layout_posts_columns', 'ds_create_shortcode_column', 5 );
add_action( 'manage_et_pb_layout_posts_custom_column', 'ds_shortcode_content', 5, 2 );
// register new shortcode
add_shortcode('ds_layout_sc', 'ds_shortcode_mod');

// New Admin Column
function ds_create_shortcode_column( $columns ) {
$columns['ds_shortcode_id'] = 'Module Shortcode';
return $columns;
}

//Display Shortcode
function ds_shortcode_content( $column, $id ) {
if( 'ds_shortcode_id' == $column ) {
?>
<p>[ds_layout_sc id="<?php echo $id ?>"]</p>
<?php
}
}

// Create New Shortcode
function ds_shortcode_mod($ds_mod_id) {
extract(shortcode_atts(array('id' =>'*'),$ds_mod_id));
return do_shortcode('[et_pb_section global_module="'.$id.'"][/et_pb_section]');
}


//Add sitewide header to blog post
echo do_shortcode('[et_pb_section global_module="5944"][/et_pb_section]');