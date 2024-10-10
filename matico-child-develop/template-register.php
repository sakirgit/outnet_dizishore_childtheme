<?php
/*
Template Name: Dizishore Registration
*/

// Restrict access to logged-out users only
if ( is_user_logged_in() ) {
    wp_redirect( home_url() );
    exit;
}

get_header();

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="u-columns col2-set wc-custom-login-form" id="customer_login">
    <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

    <?php do_action( 'woocommerce_register_form_start' ); ?>
    <h2 class="register-from-title"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>
                &nbsp;<span class="required">*</span></label>
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="<?php esc_html_e( 'Enter your username...', 'woocommerce' ); ?>"/><?php // @codingStandardsIgnoreLine ?>
        </p>

    <?php endif; ?>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>
            &nbsp;<span class="required">*</span></label>
        <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" placeholder="<?php esc_html_e( 'Enter your email...', 'woocommerce' ); ?>"/><?php // @codingStandardsIgnoreLine ?>
    </p>

    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>
                &nbsp;<span class="required">*</span></label>
            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" placeholder="<?php esc_html_e( 'Enter your password...', 'woocommerce' ); ?>"/>
        </p>

    <?php else : ?>

        <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

    <?php endif; ?>

    <?php do_action( 'woocommerce_register_form' ); ?>

    <p class="woocommerce-FormRow form-row">
        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
        <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
    </p>

    <?php do_action( 'woocommerce_register_form_end' ); ?>

    </form>
</div>
<div class="register-now-trigger <?php echo isset($_GET['action']) && 'register' === $_GET['action'] ? 'deactive' : ''; ?>">
    <span><?php echo esc_html__("Already have an account?", "matico"); ?></span>
    <a href="<?php echo home_url(); ?>/login/"><?php echo esc_html__("Login Now", "matico"); ?></a>
</div>

<?php 
do_action( 'woocommerce_after_customer_login_form' ); 
get_footer();
?>