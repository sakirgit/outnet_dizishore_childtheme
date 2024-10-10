<?php
/*
Template Name: Dizishore Forgot Password
*/

// Restrict access to logged-out users only
if ( is_user_logged_in() ) {
    wp_redirect( home_url() );
    exit;
}

get_header();

do_action( 'woocommerce_before_lost_password_form' ); ?>

<div class="u-columns col2-set wc-custom-login-form" id="customer_login">
    <form method="post" class="woocommerce-ResetPassword lost_reset_password woocommerce-form-register">
    <h2 class="register-from-title"><?php esc_html_e( 'Lost Password', 'woocommerce' ); ?></h2>
    <p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

    <p class="woocommerce-form-row woocommerce-form-row--first form-row">
        <label for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
        <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" aria-required="true" />
    </p>

    <div class="clear"></div>

    <?php do_action( 'woocommerce_lostpassword_form' ); ?>

    <p class="woocommerce-form-row form-row">
        <input type="hidden" name="wc_reset_password" value="true" />
        <button type="submit" class="woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
    </p>

    <?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

    </form>
</div>

<?php 
do_action( 'woocommerce_after_lost_password_form' );
get_footer();
?>