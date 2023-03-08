    
   <?php if ( avo_option( 'avo_mode_switcher' ) =="on") { ?>
                        
    <!-- Dark mode switcher -->
    <div class="avo-mode-switcher cursor-as-pointer hidden-xs hidden-sm">
        <div class="avo-mode-switcher-item dark"><p class="avo-mode-switcher-item-state"><?php echo esc_html('Dark') ?></p></div>
        <div class="avo-mode-switcher-item auto"><p class="avo-mode-switcher-item-state"><?php echo esc_html('Auto') ?></p></div>
        <div class="avo-mode-switcher-item light"><p class="avo-mode-switcher-item-state"><?php echo esc_html('Light') ?></p></div>
        <div class="avo-mode-switcher-toddler">
            <div class="avo-mode-switcher-toddler-wrap">
                <div class="avo-mode-switcher-toddler-item dark"><p class="avo-mode-switcher-item-state"><?php echo esc_html('Dark') ?></p></div>
                <div class="avo-mode-switcher-toddler-item auto"><p class="avo-mode-switcher-item-state"><?php echo esc_html('Auto') ?></p></div>
                <div class="avo-mode-switcher-toddler-item light"><p class="avo-mode-switcher-item-state"><?php echo esc_html('Light') ?></p></div>
            </div>
        </div>
     </div>
     <?php }?>
 