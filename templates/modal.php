<?php
/**
 * The Template for displaying modal wrapper
 *
 * This template can be overridden by copying it to your-theme/bf-modal-plugin/templates/modal.php.
 */

use bfModalPlugin\config\BFModalConfig;
?>
<div class="c-bfml-modal <?php echo BFModalConfig::get_modal_js_class(); ?>"></div>