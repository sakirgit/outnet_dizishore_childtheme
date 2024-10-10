<?php
/**
 * @since 3.5.1
 *
 * @var $transactions array
 */

use WeDevs\Dokan\ReverseWithdrawal\Helper as ReverseWithdrawalHelper;

?>
<?php if ( is_wp_error( $transactions ) ) : ?>
    <div class="dokan-alert dokan-alert-danger">
        <strong><?php echo wp_kses_post( $transactions->get_error_message() ); ?></strong>
    </div>
<?php else : ?>
    <div class="dokan-responsive-table">
        <table class="dokan-table dokan-table-striped">
            <thead>
                <tr>
                    <th><?php esc_html_e( 'Transaction ID', 'dokan-lite' ); ?></th>
                    <th><?php esc_html_e( 'Date', 'dokan-lite' ); ?></th>
                    <th><?php esc_html_e( 'Transaction Type', 'dokan-lite' ); ?></th>
                    <th><?php esc_html_e( 'Note', 'dokan-lite' ); ?></th>
                    <th><?php esc_html_e( 'Debit', 'dokan-lite' ); ?></th>
                    <th><?php esc_html_e( 'Credit', 'dokan-lite' ); ?></th>
                    <th><?php esc_html_e( 'Balance', 'dokan-lite' ); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php
            // get current balance
            $current_balance = 0;
            // get items to be displayed
            $items[] = $transactions['balance'];
            $items   = ! empty( $transactions['items'] ) ? array_merge( $items, $transactions['items'] ) : $items;

            foreach ( $items as $transaction ) {
                $transaction = ReverseWithdrawalHelper::get_formated_transaction_data( $transaction, $current_balance, 'seller' )
                ?>
                <tr class="tr-collapse">
                    <td class="td-mobile-head" data-title="<?php esc_html_e( 'Transaction ID', 'dokan-lite' ); ?>">
                        <div class="">
                            <span class="dokan-hide transaction-text"><strong><?php esc_html_e( 'Transaction ID: ', 'dokan-lite' ); ?></strong></span>
                            <?php
                            // translators: 1) transaction url 2) transaction id
                            echo sprintf( '<a href="%1$s" target="_blank">%2$s</a>', $transaction['trn_url'], $transaction['trn_id'] )
                            ?>
                        </div>
                        <div class="td-head-mobile dokan-hide">
                            <span class="matico-icon"></span>
                        </div>
                    </td>
                    <td data-title="<?php esc_html_e( 'Date', 'dokan-lite' ); ?>"><?php echo esc_html( $transaction['trn_date'] ); ?></td>
                    <td data-title="<?php esc_html_e( 'Transaction Type', 'dokan-lite' ); ?>"><?php echo esc_html( $transaction['trn_type'] ); ?></td>
                    <td data-title="<?php esc_html_e( 'Note', 'dokan-lite' ); ?>"><?php echo esc_html( $transaction['note'] ); ?></td>
                    <td data-title="<?php esc_html_e( 'Debit', 'dokan-lite' ); ?>"><?php echo $transaction['debit'] === '' ? '--' : wc_price( $transaction['debit'] ); ?></td>
                    <td data-title="<?php esc_html_e( 'Credit', 'dokan-lite' ); ?>"><?php echo $transaction['credit'] === '' ? '--' : wc_price( $transaction['credit'] ); ?></td>
                    <td data-title="<?php esc_html_e( 'Balance', 'dokan-lite' ); ?>">
                        <?php echo $transaction['balance'] < 0 ? sprintf( '(%1$s)', wc_price( abs( $transaction['balance'] ) ) ) : wc_price( $transaction['balance'] ); ?>
                    </td>
                </tr>
                <?php
            }
            if ( count( $items ) > 1 ) {
                ?>
                <tr class="total-rev-withdraw-balance">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b><?php esc_html_e( 'Balance:', 'dokan-lite' ); ?></b></td>
                    <td data-title="<?php esc_html_e( 'Balance:', 'dokan-lite' ); ?>"><b><?php echo wc_price( $current_balance ); ?></b></td>
                </tr>
                <?php
            } else {
                ?>
                <tr>
                    <td colspan="7" class="no-trans-message">
                        <?php esc_html_e( 'No transactions found!', 'dokan-lite' ); ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
