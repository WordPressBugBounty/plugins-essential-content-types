<?php

// Exit if accessed directly
if (! defined('ABSPATH')) exit;

/**
 * Provide a admin area dashboard view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://catchplugins.com
 * @since      1.0.0
 *
 * @package    Essential_Content_Types
 * @subpackage Essential_Content_Types/admin/partials
 */
?>

<div id="essential-content-types" class="ect-main">
    <div class="content-wrapper">
        <div class="header">
            <h2><?php esc_html_e('Settings', 'essential-content-types'); ?></h2>
        </div> <!-- .Header -->
        <div class="content">

            <div class="module-container ect-options">
                <div class="module-wrap">
                    <div id="module-portfolio" class="catch-modules">
                        <?php
                        $essential_content_types_portfolio_options = get_option('ect_portfolio');
                        ?>
                        <div class="module-header <?php echo ! empty($essential_content_types_portfolio_options['status']) ? 'active' : 'inactive'; ?>">
                            <h3 class="module-title"><?php esc_html_e('Portfolios/Projects', 'essential-content-types'); ?></h3>
                            <div class="switch">
                                <input type="hidden" name="ect_nonce" id="ect_nonce" value="<?php echo esc_attr(wp_create_nonce('ect_nonce')); ?>" />
                                <input type="checkbox" id="ect_portfolio" class="input-switch" rel="ect_portfolio" <?php checked(true, ! empty($essential_content_types_portfolio_options['status'])); ?>>
                                <label for="ect_portfolio"></label>
                            </div>

                            <div class="loader"></div>
                        </div>

                        <div class="module-content">
                            <p><?php esc_html_e('Portfolio – Create and display your portfolio on your website.', 'essential-content-types'); ?></p>

                            <p><?php esc_html_e('Once enabled, Portfolio Post Type options will appear on Dashboard Menu', 'essential-content-types'); ?></p>

                            <p><?php printf(
                                    // Translators: %1$s and %2$s is an anchor tag with a URL of customizer
                                    esc_html__('%1$sClick here%2$s to view Portfolio Archive Options.', 'essential-content-types'),
                                    '<a href ="' . esc_url(admin_url('customize.php?autofocus[control]=jetpack_portfolio_title')) . '" target="_blank">',
                                    '</a>'
                                ); ?></p>

                            <p><?php
						printf(
							/* translators: %1$s and %2$s are anchor tag opening and closing for the shortcode documentation link. */
							esc_html__( 'For more information on How to use Portfolio Shortcodes, %1$sClick here%2$s', 'essential-content-types' ),
							'<a href="https://catchplugins.com/blog/essential-content-types-pro/#Portfolio" title="' . esc_attr__( 'Essential Content Type: Portfolio Shortcode', 'essential-content-types' ) . '" target="_blank">',
							'</a>'
						);
						?></p>
                        </div>
                    </div><!-- #module-portfolio -->
                </div><!-- .module-wrap -->

                <div class="module-wrap">
                    <div id="module-testimonial" class="catch-modules">
                        <?php
                        $essential_content_types_testimonial_options = get_option('ect_testimonial');
                        ?>
                        <div class="module-header <?php echo ! empty($essential_content_types_testimonial_options['status']) ? 'active' : 'inactive'; ?>">
                            <h3 class="module-title"><?php esc_html_e('Testimonials', 'essential-content-types'); ?></h3>
                            <div class="switch">
                                <input type="hidden" name="ect_nonce" id="ect_nonce" value="<?php echo esc_attr(wp_create_nonce('ect_nonce')); ?>" />
                                <input type="checkbox" id="ect_testimonial" class="input-switch" rel="ect_testimonial" <?php checked(true, ! empty($essential_content_types_testimonial_options['status'])); ?>>
                                <label for="ect_testimonial"></label>
                            </div>

                            <div class="loader"></div>
                        </div>

                        <div class="module-content">
                            <p><?php esc_html_e('Testimonials – Add customer testimonials to your website.', 'essential-content-types'); ?></p>

                            <p><?php esc_html_e('Once enabled, Testimonials Post Type options will appear on Dashboard Menu', 'essential-content-types'); ?></p>

                            <p><?php printf(
                                    // Translators: %1$s and %2$s is an anchor tag with a URL of testimonial customizer
                                    esc_html__('%1$sClick here%2$s to view Testimonial Archive Options.', 'essential-content-types'),
                                    '<a href ="' . esc_url(admin_url('customize.php?autofocus[control]=jetpack_testimonials[page-title]')) . '" target="_blank">',
                                    '</a>'
                                ); ?></p>

                            <p><?php
						printf(
							/* translators: %1$s and %2$s are anchor tag opening and closing for the shortcode documentation link. */
							esc_html__( 'For more information on How to use Testimonials Shortcodes, %1$sClick here%2$s', 'essential-content-types' ),
							'<a href="https://catchplugins.com/blog/essential-content-types-pro/#Testimonial" title="' . esc_attr__( 'Essential Content Type: Testimonial Shortcode', 'essential-content-types' ) . '" target="_blank">',
							'</a>'
						);
						?></p>
                        </div>
                    </div><!-- #module-testimonial -->
                </div><!-- .module-wrap -->

                <div class="module-wrap">
                    <div id="module-featured-content" class="catch-modules">
                        <?php
                        $essential_content_types_featured_content_options = get_option('ect_featured_content');
                        ?>
                        <div class="module-header <?php echo ! empty($essential_content_types_featured_content_options['status']) ? 'active' : 'inactive'; ?>">
                            <h3 class="module-title"><?php esc_html_e('Featured Content', 'essential-content-types'); ?></h3>

                            <div class="switch">
                                <input type="hidden" name="ect_nonce" id="ect_nonce" value="<?php echo esc_attr(wp_create_nonce('ect_nonce')); ?>" />
                                <input type="checkbox" id="ect_featured_content" class="input-switch" rel="ect_featured_content" <?php checked(true, ! empty($essential_content_types_featured_content_options['status'])); ?>>
                                <label for="ect_featured_content"></label>
                            </div>

                            <div class="loader"></div>
                        </div>

                        <div class="module-content">
                            <p><?php esc_html_e('Featured Content – Display the content you want as featured content to attract visitors\' attention.', 'essential-content-types'); ?></p>

                            <p><?php esc_html_e('Once enabled, Featured Content Post Type options will appear on Dashboard Menu', 'essential-content-types'); ?></p>

                            <p><?php printf(
                                    // Translators: %1$s and %2$s is an anchor tag with a URL of Featured content customizer
                                    esc_html__('%1$sClick here%2$s to view Featured Content Archive Options.', 'essential-content-types'),
                                    '<a href ="' . esc_url(admin_url('customize.php?autofocus[control]=featured_content_title')) . '" target="_blank">',
                                    '</a>'
                                ); ?></p>

                            <p><?php
						printf(
							/* translators: %1$s and %2$s are anchor tag opening and closing for the shortcode documentation link. */
							esc_html__( 'For more information on How to use Featured Content Shortcodes, %1$sClick here%2$s', 'essential-content-types' ),
							'<a href="https://catchplugins.com/blog/essential-content-types-pro/#FeaturedContent" title="' . esc_attr__( 'Essential Content Type: Featured Content Shortcode', 'essential-content-types' ) . '" target="_blank">',
							'</a>'
						);
						?></p>
                        </div>
                    </div><!-- #module-featured-content -->
                </div><!-- .module-wrap -->

                <div class="module-wrap">
                    <div id="module-service" class="catch-modules">
                        <?php
                        $essential_content_types_service_options = get_option('ect_service');
                        ?>
                        <div class="module-header <?php echo ! empty($essential_content_types_service_options['status']) ? 'active' : 'inactive'; ?>">
                            <h3 class="module-title"><?php esc_html_e('Services', 'essential-content-types'); ?></h3>

                            <div class="switch">
                                <input type="hidden" name="ect_nonce" id="ect_nonce" value="<?php echo esc_attr(wp_create_nonce('ect_nonce')); ?>" />
                                <input type="checkbox" id="ect_service" class="input-switch" rel="ect_service" <?php checked(true, ! empty($essential_content_types_service_options['status'])); ?>>
                                <label for="ect_service"></label>
                            </div>

                            <div class="loader"></div>
                        </div>

                        <div class="module-content">
                            <p><?php esc_html_e('Service – Create and display your service on your website.', 'essential-content-types'); ?></p>

                            <p><?php esc_html_e('Once enabled, Service Post Type options will appear on Dashboard Menu', 'essential-content-types'); ?></p>

                            <p><?php printf(
                                    // Translators: %1$s and %2$s is an anchor tag with a URL of Service customizer
                                    esc_html__('%1$sClick here%2$s to view Service Archive Options.', 'essential-content-types'),
                                    '<a href ="' . esc_url(admin_url('customize.php?autofocus[control]=ect_service_title')) . '" target="_blank">',
                                    '</a>'
                                ); ?></p>

                            <p><?php
						printf(
							/* translators: %1$s and %2$s are anchor tag opening and closing for the shortcode documentation link. */
							esc_html__( 'For more information on How to use Service Shortcodes, %1$sClick here%2$s', 'essential-content-types' ),
							'<a href="https://catchplugins.com/blog/essential-content-types-pro/#Service" title="' . esc_attr__( 'Essential Content Type: Service Shortcode', 'essential-content-types' ) . '" target="_blank">',
							'</a>'
						);
						?></p>
                        </div>
                    </div><!-- #module-service -->
                </div><!-- .module-wrap -->

                <?php
                $essential_content_types_food_menu_options = get_option('ect_food_menu');
                ?>
                <?php if (! empty($essential_content_types_food_menu_options['status'])) : ?>
                    <div class="module-wrap">
                        <div id="module-food-menu" class="catch-modules">

                            <div class="module-header active">
                                <h3 class="module-title"><?php esc_html_e('Food Menu', 'essential-content-types'); ?></h3>

                                <div class="switch">
                                    <input type="hidden" name="ect_nonce" id="ect_nonce" value="<?php echo esc_attr(wp_create_nonce('ect_nonce')); ?>" />
                                    <input type="checkbox" id="ect_food_menu" class="input-switch" rel="ect_food_menu" <?php checked(true, ! empty($essential_content_types_food_menu_options['status'])); ?>>
                                    <label for="ect_food_menu"></label>
                                </div>

                                <div class="loader"></div>
                            </div>

                            <div class="module-content">
                                <p><?php esc_html_e('Food Menu – Create and display your Food Menu items on your website.', 'essential-content-types'); ?></p>

                                <p><?php esc_html_e('Once enabled, Food Menu Items Post Type options will appear on Dashboard Menu', 'essential-content-types'); ?></p>

                                <p><?php
							printf(
								/* translators: %1$s and %2$s are anchor tag opening and closing for the shortcode documentation link. */
								esc_html__( 'For more information on How to use Food Menu Shortcodes, %1$sClick here%2$s', 'essential-content-types' ),
								'<a href="https://catchplugins.com/blog/essential-content-types-pro/#FoodMenu" title="' . esc_attr__( 'Essential Content Type: Food Menu Shortcode', 'essential-content-types' ) . '" target="_blank">',
								'</a>'
							);
							?></p>
                            </div>
                        </div><!-- #module-food-menu -->
                    </div><!-- .module-wrap -->
                <?php endif; ?>
            </div><!-- .module-container -->
        </div><!-- .content -->
    </div><!-- .content-wrapper -->
</div> <!-- .ect-main-->