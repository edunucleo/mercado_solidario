<?php

namespace MetForm\Core\Forms;

defined('ABSPATH') || exit;

class Auto_Increment_Entry
{
    use \MetForm\Traits\Singleton;

    private $id;
    protected $last_entry_key = 'metform_last_entry_serial_no';
    protected $entry_key = 'metform_entries_serial_no';

    public function __construct()
    {
        $this->id = get_option($this->last_entry_key);
        add_action('metform/after_load', [$this, 'update_previous_posts_entry_ids']);
    }


    public function update_previous_posts_entry_ids()
    {
        if (empty(get_option($this->last_entry_key))) {
            $all_post_ids = get_posts(array(
                'fields'          => 'ids',
                'posts_per_page'  => -1,
                'orderby' => 'ID',
                'order' => 'ASC',
                'post_type' => 'metform-entry'
            ));
            foreach ($all_post_ids as $key => $id) {
                update_post_meta($id, $this->entry_key, ++$key);
                $this->id = $key;
            }
            update_option($this->last_entry_key, $this->id);
        }
    }
}
