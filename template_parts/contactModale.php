<!-- Trigger/Open The Modal -->
<!-- <button id="myBtn">Open Modal</button> -->

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <img class="modal__logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/contact_header.png" alt="logo Contact">
        <?php echo do_shortcode('[wpforms id="45" title="false"]'); ?>
    </div>

</div>