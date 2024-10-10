<?php
/*
Template Name: Dizishore Login
*/

// Restrict access to logged-out users only
if ( is_user_logged_in() ) {
    wp_redirect( home_url() );
    exit;
}

get_header();

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="u-columns col2-set wc-custom-login-form" id="customer_login">
    <form class="woocommerce-form woocommerce-form-login" method="post">
        <?php do_action( 'woocommerce_login_form_start' ); ?>
        <div class="woocommerce-form-login-wrap">
            <h2 class="login-form-title"><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>
                    &nbsp;<span class="required">*</span></label>
                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="<?php esc_html_e( 'Enter your username or email address...', 'woocommerce' ); ?>"/><?php // @codingStandardsIgnoreLine ?>
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>
                    &nbsp;<span class="required">*</span></label>
                <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" placeholder="<?php esc_html_e( 'Enter your password...', 'woocommerce' ); ?>"/>
            </p>
            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"/>
                <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
            </label>
            <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

            <p class="woocommerce-LostPassword lost_password">
                <a href="<?php echo esc_url( get_home_url() . '/lost-password/' ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
            </p>
            <?php do_action( 'woocommerce_login_form' ); ?>
            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
        </div>
        <?php do_action( 'woocommerce_login_form_end' ); ?>
    </form>
</div>
<div class="register-now-trigger <?php echo isset($_GET['action']) && 'register' === $_GET['action'] ? 'deactive' : ''; ?>">
    <span><?php echo esc_html__("Don't have an account?", "matico"); ?></span>
    <a href="<?php echo home_url(); ?>/register/"><?php echo esc_html__("Create Your Account", "matico"); ?></a>
</div>

<?php 
do_action( 'woocommerce_after_customer_login_form' ); 
get_footer();
?>