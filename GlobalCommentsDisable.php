<?php

namespace ideasonpurpose;

class GlobalCommentsDisable()
{
    public function __construct()
    {
        add_action('admin_init', [$this, 'postTypeSupport']);
    }

    public function postTypeSupport()
    {
        $types = get_post_types();
        error_log(print_r($types, true));
        foreach ($types as $type) {
            if (post_type_supports($type, 'comments')) {
                remove_post_type_support($type, 'comments');
                remove_post_type_support($type, 'trackbacks');
            }
        }
    }
}
