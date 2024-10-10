<div class="footer-widgets">
    <div class="container">
        <div class="row">
            <div class="column-desktop-3 column-tablet-3 column-12">
                <?php 
                if(is_active_sidebar('footer_col_1')){ 
                    dynamic_sidebar('footer_col_1');  
                } 
                ?>
            </div>
            <div class="column-desktop-3 column-tablet-3 column-12">
                <?php 
                if(is_active_sidebar('footer_col_2')){ 
                    dynamic_sidebar('footer_col_2');  
                } 
                ?>
            </div>
            <div class="column-desktop-3 column-tablet-3 column-12">
                <?php 
                if(is_active_sidebar('footer_col_3')){ 
                    dynamic_sidebar('footer_col_3');  
                } 
                ?>
            </div>
            <div class="column-desktop-3 column-tablet-3 column-12">
			<?php
                if(is_active_sidebar('footer_col_4')){ 
                    dynamic_sidebar('footer_col_4');  
                }
            ?>
            </div>
        </div>
    </div>
</div>