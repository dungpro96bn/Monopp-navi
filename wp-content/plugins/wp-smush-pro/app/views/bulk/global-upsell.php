<?php
/**
 * Show Unlimited upsell on Bulk Smush completed.
 * @var string $bulk_upgrade_url      Upgrade pro url.
 * @var string $global_upsell_desc    Upgrade pro notice description.
 */
?>
<div class="sui-box-body sui-margin-top wp-smush-global-upsell wp-smush-upsell-on-completed sui-hidden">
    <div class="smush-box-image">
        <img class="sui-image-icon" src="<?php echo esc_url( WP_SMUSH_URL . 'app/assets/images/bulk-smush/global-upsell-icon.png' ); ?>"
        srcset="<?php echo esc_url( WP_SMUSH_URL . 'app/assets/images/bulk-smush/global-upsell-icon@2x.png' ); ?> 2x"
        alt="<?php esc_html_e( 'Smush Upsell Icon', 'wp-smushit' ); ?>">
    </div>
    <div class="sui-box-content">
        <p>
            <?php echo esc_html( $global_upsell_desc ); ?>
        </p>
        <a href="<?php echo esc_url( $bulk_upgrade_url ); ?>" class="smush-upsell-link" target="_blank"><?php echo esc_html__( 'Upgrade to Pro and get 30% off', 'wp-smushit' ); ?></a>
    </div>
</div>