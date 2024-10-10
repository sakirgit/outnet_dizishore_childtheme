<?php
/**
 * Dokan Withdraw Approved Request listing template
 *
 * @since   2.4
 *
 * @package dokan
 */
?>
<div class="dokan-responsive-table">
    <table class="dokan-table dokan-table-striped withdraw-request-table">
        <thead>
        <tr>
            <th><?php esc_html_e( 'Amount', 'dokan-lite' ); ?></th>
            <th><?php esc_html_e( 'Method', 'dokan-lite' ); ?></th>
            <th><?php esc_html_e( 'Date', 'dokan-lite' ); ?></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ( $requests as $row ) { ?>
            <tr>
                <td data-title="<?php esc_html_e( 'Amount', 'dokan-lite' ); ?>"><?php echo wp_kses_post( wc_price( $row->amount ) ); ?></td>
                <td data-title="<?php esc_html_e( 'Method', 'dokan-lite' ); ?>"><?php echo esc_html( dokan_withdraw_get_method_title( $row->method, $row ) ); ?> </td>
                <td data-title="<?php esc_html_e( 'Date', 'dokan-lite' ); ?>"><?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $row->date ) ) ); ?></td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
