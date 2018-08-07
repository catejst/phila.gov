<?php
/**
 * This class defines a custom "taxonomy" field type for Meta Box class.
 *
 * @package Meta Box
 * @see http://metabox.io/?post_type=docs&p=390
 */
if ( class_exists( 'RWMB_Field' ) ) {
  
  class RWMB_Unit_Field extends RWMB_Checkbox_List_Field {

    public static function filter_options( $field, $options ) {
      $current_cats = get_the_category();

      foreach($current_cats as $cat){
        $units = rwmb_meta( 'unit', array( 'object_type' => 'term' ), $cat->term_id );
      }

      $options = [];

      foreach ($units as $unit){
        $options[] = (object) array( 'value' => sanitize_title_with_dashes($unit['name']), 'label' => $unit['name'] );
      }

     	return $options;
     }
  }
}
