<?php
namespace MetForm\Core\Forms;
defined( 'ABSPATH' ) || exit;
Class Hooks{

  use \MetForm\Traits\Singleton;

  public function Init(){
    add_filter( 'the_content', [ $this, 'get_form_content_on_preview' ] );
    add_action( 'admin_init', [ $this, 'add_author_support' ], 10 );
    add_filter( 'manage_metform-form_posts_columns', [ $this, 'set_columns' ] );
    add_action( 'manage_metform-form_posts_custom_column', [ $this, 'render_column' ], 10, 2 );
  }

  public function get_form_content_on_preview($content) {

    if (isset($GLOBALS['post']) && $GLOBALS['post']->post_type == 'metform-form') {
      return \MetForm\Utils\Util::render_form_content($content, get_the_ID());
    }
    return $content;
  }

  public function add_author_support(){
    add_post_type_support( 'metform-form', 'author' );
  }

  public function set_columns( $columns ) {

    $date_column = $columns['date'];
    $author_column = $columns['author'];

    unset( $columns['date'] );
    unset( $columns['author'] );

    $columns['shortcode'] = esc_html__( 'Shortcode', 'metform' );
    $columns['count'] = esc_html__( 'Entries', 'metform' );
    $columns['views_conversion'] = esc_html__( 'Views/ Conversion', 'metform' );
    $columns['author']      = esc_html( $author_column );
    $columns['date']      = esc_html( $date_column );

    return $columns;
  }

  public function render_column( $column, $post_id ) {
    switch ( $column ) {
      case 'shortcode':
        echo '<input class="wp-ui-text-highlight code" type="text" onfocus="this.select();" readonly="readonly" value="'.esc_attr('[metform form_id="'.$post_id.'"]').'" style="width:99%">';
        break;
      case 'count':
        $count = \MetForm\Core\Entries\Action::instance()->get_entry_count($post_id);

        global $wp;
        $current_url = admin_url();
        $current_url .="edit.php?post_type=metform-entry&mf_form_id=".esc_attr($post_id);

        $rest_url = get_rest_url();
        $mf_ex_nonce = wp_create_nonce('wp_rest');
        $url = $rest_url."metform/v1/entries/export/".$post_id;
        $export_url = \MetForm\Utils\Util::add_param_url($url, "_wpnonce", $mf_ex_nonce);
        
        echo "<a data-metform-form-id=".esc_attr($post_id)." class='attr-btn attr-btn-primary mf-entry-filter' href=".esc_url($current_url).">".esc_html($count)."</a>";
        echo "<a class='attr-btn attr-btn-info mf-entry-export-csv' href=".esc_url($export_url).">".esc_html__('Export CSV', 'metform')."</a>";
        break;
      case 'views_conversion':
        $views = \MetForm\Core\Forms\Action::instance()->get_count_views($post_id);
        $views = (int)$views;

        $count = \MetForm\Core\Entries\Action::instance()->get_entry_count($post_id);
        $count = (int)$count;

        if($views != 0){
          $conversion = ($count*100)/$views;
          $conversion = round($conversion, 2);
        }else{
          $conversion = 0;
        }
        echo esc_html($views."/ ".$conversion."%");
      break;
    }
  }
  
}
