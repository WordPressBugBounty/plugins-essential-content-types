<?php

// Exit if accessed directly
if (! defined('ABSPATH')) exit;

/**
 * The template for displaying food_menu items
 *
 * @package Foodie_World
 */
?>

<?php
$essential_content_types_cat_list = array();

$essential_content_types_menu_categories = essential_content_food_menu_get_menus();

foreach ($essential_content_types_menu_categories as $essential_content_types_category) {
	if (false != $atts['include_type']) {
		if (in_array($essential_content_types_category->slug, $atts['include_type'])) {
			$essential_content_types_cat_list[] = $essential_content_types_category->term_id;
		}
	} else {
		$essential_content_types_cat_list[] = $essential_content_types_category->term_id;
	}
}
?>
<div id="tabs" class="tabs">
	<div class="tabs-nav">
		<ul class="ui-tabs-nav menu-tabs-nav">
			<?php
			$essential_content_types_taxonomy = 'ect_food_menu';

			$essential_content_types_i = 0;
			foreach ($essential_content_types_cat_list as $essential_content_types_cat) :
				$essential_content_types_term_obj = get_term_by('id', absint($essential_content_types_cat), $essential_content_types_taxonomy);
				if ($essential_content_types_term_obj) {
					$essential_content_types_term_name = $essential_content_types_cat_name[] = $essential_content_types_term_obj->name;

					$essential_content_types_class = 'ui-tabs-tab menu-tabs-tab';

					if (0 === $essential_content_types_i) {
						$essential_content_types_class .= ' ui-state-active';
					}

			?>
					<li class="<?php echo esc_attr($essential_content_types_class); ?>"><a href="#tab-<?php echo esc_attr($essential_content_types_i + 1); ?>" class="ui-tabs-anchor"><?php echo esc_html($essential_content_types_term_obj->name); ?></a></li>
			<?php
				}
				$essential_content_types_i++;
			endforeach;
			?>
		</ul>
	</div><!-- .tabs-nav -->

	<?php
	$essential_content_types_i = 0;
	foreach ($essential_content_types_cat_list as $essential_content_types_cat) :
		if (isset($essential_content_types_cat_name)) {
	?>

			<div class="ui-tabs-panel-wrap">
				<h4 class="menu-nav-collapse ui-nav-collapse<?php echo (0 === $essential_content_types_i) ? ' ui-state-active' : ''; ?>"><a href="#tab-<?php echo esc_attr($essential_content_types_i + 1); ?>" class="ui-tabs-anchor"><?php echo esc_html($essential_content_types_cat_name[$essential_content_types_i]); ?></a></h4>
				<div id="tab-<?php echo esc_attr($essential_content_types_i + 1); ?>" class="menu-tabs-panel ui-tabs-panel<?php echo (0 === $essential_content_types_i) ? ' active-tab' : ''; ?>">
					<?php

					$essential_content_types_args              = array();
					$essential_content_types_args['post_type'] = Essential_Content_Food_Menu::MENU_ITEM_POST_TYPE;

					$essential_content_types_tax_query = array(
						array(
							'taxonomy' => Essential_Content_Food_Menu::MENU_TAX,
							'terms'    => absint($essential_content_types_cat),
							'field'    => 'term_id',
						),
					);

					$essential_content_types_args['tax_query'] = $essential_content_types_tax_query; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query -- necessary for filtering by food menu category.

					if (false != $atts['include_tag']) {
						array_push(
							$essential_content_types_args['tax_query'],
							array(
								'taxonomy' => Essential_Content_Food_Menu::MENU_ITEM_LABEL_TAX,
								'field'    => 'slug',
								'terms'    => $atts['include_tag'],
							)
						);
					}

					if (false != $atts['include_type'] && false != $atts['include_tag']) {
						$essential_content_types_args['tax_query']['relation'] = 'AND';
					}

					$essential_content_types_loop = new WP_Query($essential_content_types_args);
					if ($essential_content_types_loop->have_posts()) :
						while ($essential_content_types_loop->have_posts()) :
							$essential_content_types_loop->the_post();
							ect_get_template_part('content', 'menu', $atts);
						endwhile;
					endif;
					wp_reset_postdata();
					?>
				</div><!-- #tab-1 -->
			</div><!-- .ui-tabs-panel-wrap -->

	<?php
		}
		$essential_content_types_i++;
	endforeach;
	?>
</div><!-- .tabs -->
