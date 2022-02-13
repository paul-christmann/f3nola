<?php
function register_f3_post_meta($meta_box_key) {
  $f3_mb_key="_f3nola_post_" . $meta_box_key;
  register_post_meta( 'post', $f3_mb_key, array(
    'show_in_rest' => true,
    'single' => true,
    'type' => 'string',
    'auth_callback' => function() {
        return true;
    }
  ));
}

register_f3_post_meta('qic');
register_f3_post_meta('pax');
register_f3_post_meta('workout_date');

function f3_table_row($title, $value) {
  return "<tr><td class='label' width=100><strong>" . $title . ":</strong></td><td class='value'>" . $value . "</td></tr>";
}

function f3_meta_listitem ($post, $meta_key, $title) {
  $f3_mb_key="_f3nola_post_" . $meta_key;
  $f3_mb_value = get_post_meta($post->ID, $f3_mb_key, true);
  if ( !empty( $f3_mb_value) ) {
    return f3_table_row($title, $f3_mb_value);
  }
}

function f3_post_meta_tags() {
	global $post;
  $workout_date = f3_meta_listitem($post, "workout_date", "Date");
  $workout_qic = f3_meta_listitem($post, "qic", "QIC");
  $workout_pax = f3_meta_listitem($post, "pax", "PAX");
?>
  <div class="f3nola_meta">
    <table>
      <?php echo $workout_date?>
      <?php echo $workout_qic?>
      <?php echo $workout_pax?>
    </table>
  </div>
<?php
  if ( !empty($workout_date) || !empty($workout_qic) || !empty($workout_pax) ) {
  }
}

add_action( 'cryout_singular_before_inner_hook',	'f3_post_meta_tags');

?>
