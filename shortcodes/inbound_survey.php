<?php
/**
 * Inbound Survey
 */

function hr_inbound_survey() {

    $string = populate_template_file('/shortcode/inbound_survey',
        [
            //
        ]
    );

    return $string;
}
add_shortcode( 'inbound_survey', 'hr_inbound_survey' );
