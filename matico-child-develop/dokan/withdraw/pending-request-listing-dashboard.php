<?php
/**
 * Dokan Withdraw Pending Request Listing Template for dashboard
 *
 * @since   3.3.1
 *
 * @package dokan
 */

if ( $withdraw_requests ) :
    ?>
    <div class="dokan-clearfix dokan-panel-inner-container">
        <div class="dokan-w12">
            <strong><?php esc_html_e( 'Pending Requests', 'dokan-lite' ); ?></strong>
            <div class="dokan-responsive-table">
                <table class="dokan-table dokan-table-striped withdraw-request-table">
                    <tr>
                        <th><?php esc_html_e( 'Amount', 'dokan-lite' ); ?></th>
                        <th><?php esc_html_e( 'Method', 'dokan-lite' ); ?></th>
                        <th><?php esc_html_e( 'Date', 'dokan-lite' ); ?></th>
                        <th><?php esc_html_e( 'Cancel', 'dokan-lite' ); ?></th>
                        <th><?php esc_html_e( 'Status', 'dokan-lite' ); ?></th>
                    </tr>

                    <?php foreach ( $withdraw_requests as $request ) : ?>
                        <tr>
                            <td data-title="<?php esc_html_e( 'Amount', 'dokan-lite' ); ?>"><?php echo wp_kses_post( wc_price( $request->amount ) ); ?></td>
                            <td data-title="<?php esc_html_e( 'Method', 'dokan-lite' ); ?>"><?php echo esc_html( dokan_withdraw_get_method_title( $request->method ) ); ?></td>
                            <td data-title="<?php esc_html_e( 'Date', 'dokan-lite' ); ?>"><?php echo esc_html( dokan_format_datetime( $request->date ) ); ?></td>
                            <td data-title="<?php esc_html_e( 'Cancel', 'dokan-lite' ); ?>">
                                <?php
                                $url = add_query_arg(
                                    [
                                        'dokan_handle_withdraw_request' => 'cancel',
                                        'id'                            => $request->id,
                                    ],
                                    dokan_get_navigation_url( 'withdraw-requests' )
                                );
                                ?>
                                <a href="<?php echo esc_url( wp_nonce_url( $url, 'dokan_cancel_withdraw' ) ); ?>">
                                    <?php esc_html_e( 'Cancel', 'dokan-lite' ); ?>
                                </a>
                            </td>
                            <td data-title="<?php esc_html_e( 'Status', 'dokan-lite' ); ?>">
                                <?php
                                if ( intval( $request->status ) === 0 ) {
                                    echo '<span class="label label-danger">' . esc_html__( 'Pending Review', 'dokan-lite' ) . '</span>';
                                } elseif ( intval( $request->status ) === 1 ) {
                                    echo '<span class="label label-warning">' . esc_html__( 'Accepted', 'dokan-lite' ) . '</span>';
                                }
                                ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>
    <?php
endif;
