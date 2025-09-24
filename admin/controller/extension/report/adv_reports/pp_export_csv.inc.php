<?php
	ini_set("memory_limit","256M");
	
	$results = $export_data['results'];
	if ($results) {

	$csv_delimiter = strtr($export_csv_delimiter, array(
		'comma'			=> ",",
		'semi'			=> ";",
		'tab'			=> "\t"
	));
	$csv_enclosed = '"';
	$csv_row = "\n";

	if ($filter_report == 'all_products_with_without_orders' or $filter_report == 'products_without_orders') {	
	$export_csv = $csv_enclosed . $this->language->get('column_date_added') . $csv_enclosed;
	} elseif ($filter_report == 'products_shopping_carts' or $filter_report == 'products_wishlists') {
	$export_csv = $csv_enclosed . $this->language->get('column_date_start') . $csv_enclosed;					
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_date_end') . $csv_enclosed;		
	} else {
	if ($filter_group == 'year') {
	$export_csv = $csv_enclosed . $this->language->get('column_year') . $csv_enclosed;
	} elseif ($filter_group == 'quarter') {
	$export_csv = $csv_enclosed . $this->language->get('column_year') . $csv_enclosed;				
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_quarter') . $csv_enclosed;			
	} elseif ($filter_group == 'month') {
	$export_csv = $csv_enclosed . $this->language->get('column_year') . $csv_enclosed;			
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_month') . $csv_enclosed;	
	} elseif ($filter_group == 'day') {
	$export_csv = $csv_enclosed . $this->language->get('column_date') . $csv_enclosed;
	} elseif ($filter_group == 'order') {
	$export_csv = $csv_enclosed . $this->language->get('column_order_order_id') . $csv_enclosed;				
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_date_added') . $csv_enclosed;	
	} else {
	$export_csv = $csv_enclosed . $this->language->get('column_date_start') . $csv_enclosed;					
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_date_end') . $csv_enclosed;	
	}
	}
	
	if ($filter_report == 'products_shopping_carts' or $filter_report == 'products_wishlists') {
		
	in_array('scw_id', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_id') . $csv_enclosed : '';
	in_array('scw_name', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_pname') . $csv_enclosed : '';
	if ($filter_report == 'products_shopping_carts') {
	in_array('scw_name', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_poption') . $csv_enclosed : '';
	}
	in_array('scw_sku', $advpp_settings_scw_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sku') . $csv_enclosed : '';
	in_array('scw_upc', $advpp_settings_scw_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_upc') . $csv_enclosed : '';
	in_array('scw_ean', $advpp_settings_scw_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_ean') . $csv_enclosed : '';
	in_array('scw_jan', $advpp_settings_scw_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_jan') . $csv_enclosed : '';
	in_array('scw_isbn', $advpp_settings_scw_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_isbn') . $csv_enclosed : '';
	in_array('scw_mpn', $advpp_settings_scw_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_mpn') . $csv_enclosed : '';
	in_array('scw_model', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_model') . $csv_enclosed : '';
	in_array('scw_category', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_category') . $csv_enclosed : '';	
	in_array('scw_manufacturer', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_manufacturer') . $csv_enclosed : '';
	in_array('scw_attribute', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_attribute') . $csv_enclosed : '';	
	in_array('scw_status', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_status') . $csv_enclosed : '';	
	in_array('scw_location', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_location') . $csv_enclosed : '';	
	in_array('scw_tax_class', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_tax_class') . $csv_enclosed : '';	
	in_array('scw_viewed', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_viewed') . $csv_enclosed : '';
	in_array('scw_price', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_price') . $csv_enclosed : '';	
	in_array('scw_stock_quantity', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_stock_quantity') . $csv_enclosed : '';
	if ($filter_report == 'products_shopping_carts') {
	in_array('scw_cart_quantity', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_cart_quantity') . $csv_enclosed : '';		
	} elseif ($filter_report == 'products_wishlists') {
	in_array('scw_wishlist_quantity', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_wishlist_quantity') . $csv_enclosed : '';		
	}
	in_array('scw_customer_id', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customer_cust_id') . $csv_enclosed : '';
	in_array('scw_date_added', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customer_date_added') . $csv_enclosed : '';
	in_array('scw_customer_name', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_customer') . $csv_enclosed : '';
	in_array('scw_customer_email', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_email') . $csv_enclosed : '';
	in_array('scw_customer_telephone', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customer_telephone') . $csv_enclosed : '';
	in_array('scw_customer_group', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_order_customer_group') . $csv_enclosed : '';
	in_array('scw_billing_company', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_company') . $csv_enclosed : '';
	in_array('scw_billing_address_1', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_address_1') . $csv_enclosed : '';
	in_array('scw_billing_address_2', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_address_2') . $csv_enclosed : '';
	in_array('scw_billing_city', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_city') . $csv_enclosed : '';
	in_array('scw_billing_zone', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_region_state') . $csv_enclosed : '';
	in_array('scw_billing_postcode', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_postcode') . $csv_enclosed : '';
	in_array('scw_billing_country', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_country') . $csv_enclosed : '';

	} elseif ($filter_report == 'products_without_orders') {

	in_array('pnp_id', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_id') . $csv_enclosed : '';
	in_array('pnp_name', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_pname') . $csv_enclosed : '';
	in_array('pnp_sku', $advpp_settings_pnp_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sku') . $csv_enclosed : '';
	in_array('pnp_upc', $advpp_settings_pnp_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_upc') . $csv_enclosed : '';
	in_array('pnp_ean', $advpp_settings_pnp_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_ean') . $csv_enclosed : '';
	in_array('pnp_jan', $advpp_settings_pnp_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_jan') . $csv_enclosed : '';
	in_array('pnp_isbn', $advpp_settings_pnp_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_isbn') . $csv_enclosed : '';
	in_array('pnp_mpn', $advpp_settings_pnp_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_mpn') . $csv_enclosed : '';
	in_array('pnp_model', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_model') . $csv_enclosed : '';
	in_array('pnp_category', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_category') . $csv_enclosed : '';	
	in_array('pnp_manufacturer', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_manufacturer') . $csv_enclosed : '';	
	in_array('pnp_attribute', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_attribute') . $csv_enclosed : '';	
	in_array('pnp_status', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_status') . $csv_enclosed : '';	
	in_array('pnp_location', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_location') . $csv_enclosed : '';	
	in_array('pnp_tax_class', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_tax_class') . $csv_enclosed : '';	
	in_array('pnp_viewed', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_viewed') . $csv_enclosed : '';
	in_array('pnp_price', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_price') . $csv_enclosed : '';	
	in_array('pnp_stock_quantity', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_stock_quantity') . $csv_enclosed : '';
	
	} elseif ($filter_report == 'manufacturers' or $filter_report == 'categories') {
		
	if ($filter_report == 'manufacturers') {
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_manufacturer') . $csv_enclosed;
	} elseif ($filter_report == 'categories') {
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_category') . $csv_enclosed;	
	}
	in_array('cm_orders', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_orders') . $csv_enclosed : '';
	in_array('cm_customers', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customers') . $csv_enclosed : '';
	in_array('cm_sold_quantity', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_quantity') . $csv_enclosed : '';
	in_array('cm_sold_percent', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_percent') . $csv_enclosed : '';
	in_array('cm_total_excl_vat', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_excl_vat') . $csv_enclosed : '';
	in_array('cm_total_tax', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_total_tax') . $csv_enclosed : '';
	in_array('cm_total_incl_vat', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_incl_vat') . $csv_enclosed : '';
	in_array('cm_app', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_app') . $csv_enclosed : '';
	in_array('cm_refunds', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_product_refunds') . $csv_enclosed : '';
	in_array('cm_reward_points', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_product_reward_points') . $csv_enclosed : '';
	
	} elseif ($filter_report == 'products_options') {
		
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_option') . $csv_enclosed;
	in_array('mv_orders', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_orders') . $csv_enclosed : '';
	in_array('mv_customers', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customers') . $csv_enclosed : '';
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_quantity') . $csv_enclosed;
	$export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_percent') . $csv_enclosed;
	
	} else {
	
	in_array('mv_id', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_id') . $csv_enclosed : '';
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_pname') . $csv_enclosed : '';
	if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_poption') . $csv_enclosed : '';
	}
	in_array('mv_sku', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sku') . $csv_enclosed : '';
	in_array('mv_upc', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_upc') . $csv_enclosed : '';
	in_array('mv_ean', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_ean') . $csv_enclosed : '';
	in_array('mv_jan', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_jan') . $csv_enclosed : '';
	in_array('mv_isbn', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_isbn') . $csv_enclosed : '';
	in_array('mv_mpn', $advpp_settings_mv_columns) ?  $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_mpn') . $csv_enclosed : '';
	in_array('mv_model', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_model') . $csv_enclosed : '';
	in_array('mv_category', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_category') . $csv_enclosed : '';	
	in_array('mv_manufacturer', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_manufacturer') . $csv_enclosed : '';	
	in_array('mv_attribute', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_attribute') . $csv_enclosed : '';	
	in_array('mv_status', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_status') . $csv_enclosed : '';	
	in_array('mv_location', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_location') . $csv_enclosed : '';	
	in_array('mv_tax_class', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_tax_class') . $csv_enclosed : '';	
	in_array('mv_viewed', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_viewed') . $csv_enclosed : '';
	in_array('mv_price', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_price') . $csv_enclosed : '';	
	in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_stock_quantity') . $csv_enclosed : '';	
	in_array('mv_orders', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_orders') . $csv_enclosed : '';
	in_array('mv_customers', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_customers') . $csv_enclosed : '';
	in_array('mv_sold_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_quantity') . $csv_enclosed : '';
	in_array('mv_sold_percent', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_sold_percent') . $csv_enclosed : '';
	in_array('mv_total_excl_vat', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_excl_vat') . $csv_enclosed : '';
	in_array('mv_total_tax', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_total_tax') . $csv_enclosed : '';
	in_array('mv_total_incl_vat', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_prod_total_incl_vat') . $csv_enclosed : '';
	in_array('mv_app', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_app') . $csv_enclosed : '';
	in_array('mv_refunds', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_product_refunds') . $csv_enclosed : '';
	in_array('mv_reward_points', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $this->language->get('column_product_reward_points') . $csv_enclosed : '';
	}
	$export_csv .= $csv_row;

	foreach ($results as $result) {
	if ($filter_report == 'all_products_with_without_orders' or $filter_report == 'products_without_orders') {
	$export_csv .= $csv_enclosed . $result['date_added'] . $csv_enclosed;
	} elseif ($filter_report == 'products_shopping_carts' or $filter_report == 'products_wishlists') {
	$export_csv .= $csv_enclosed . $result['date_start'] . $csv_enclosed;					
	$export_csv .= $csv_delimiter . $csv_enclosed . $result['date_end'] . $csv_enclosed;
	} else {
	if ($filter_group == 'year') {				
	$export_csv .= $csv_enclosed . $result['year'] . $csv_enclosed;
	} elseif ($filter_group == 'quarter') {
	$export_csv .= $csv_enclosed . $result['year'] . $csv_enclosed;				
	$export_csv .= $csv_delimiter . $csv_enclosed . 'Q' . $result['quarter'] . $csv_enclosed;			
	} elseif ($filter_group == 'month') {
	$export_csv .= $csv_enclosed . $result['year'] . $csv_enclosed;			
	$export_csv .= $csv_delimiter . $csv_enclosed . $result['month'] . $csv_enclosed;	
	} elseif ($filter_group == 'day') {
	$export_csv .= $csv_enclosed . $result['date_start'] . $csv_enclosed;
	} elseif ($filter_group == 'order') {
	$export_csv .= $csv_enclosed . $result['order_id'] . $csv_enclosed;				
	$export_csv .= $csv_delimiter . $csv_enclosed . $result['date_start'] . $csv_enclosed;	
	} else {
	$export_csv .= $csv_enclosed . $result['date_start'] . $csv_enclosed;					
	$export_csv .= $csv_delimiter . $csv_enclosed . $result['date_end'] . $csv_enclosed;	
	}
	}
	
	if ($filter_report == 'products_shopping_carts' or $filter_report == 'products_wishlists') {

	in_array('scw_id', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['product_id'] . $csv_enclosed : '';
	in_array('scw_name', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['name'] . $csv_enclosed : '';
	if ($filter_report == 'products_shopping_carts') {	
	if ($result['option']) {	
	$options = '';
	foreach ($result['option'] as $option) {
	$options .= $option['name'].': '.$option['value'].'; ';
	}
	in_array('scw_name', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . rtrim($options, "; ") . $csv_enclosed : '';
	} else {
	in_array('scw_name', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';					
	}				
	}
	in_array('scw_sku', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['sku'] . $csv_enclosed : '';
	in_array('scw_upc', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['upc'] . $csv_enclosed : '';
	in_array('scw_ean', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['ean'] . $csv_enclosed : '';
	in_array('scw_jan', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['jan'] . $csv_enclosed : '';
	in_array('scw_isbn', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['isbn'] . $csv_enclosed : '';
	in_array('scw_mpn', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['mpn'] . $csv_enclosed : '';
	in_array('scw_model', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['model'] . $csv_enclosed : '';
	in_array('scw_category', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['categories'] !== NULL ? $result['categories'] : '') . $csv_enclosed : '';		
	in_array('scw_manufacturer', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['manufacturers'] !== NULL ? $result['manufacturers'] : '') . $csv_enclosed : '';
	in_array('scw_attribute', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode(str_replace('<br>','; ',$result['attribute'])) . $csv_enclosed : '';	
	in_array('scw_status', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['status'] . $csv_enclosed : '';	
	in_array('scw_location', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['location'] . $csv_enclosed : '';	
	in_array('scw_tax_class', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['tax_class'] . $csv_enclosed : '';	
	in_array('scw_viewed', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['viewed'] . $csv_enclosed : '';
	in_array('scw_price', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['price_raw'], 2)) . $csv_enclosed : '';	
	if ($filter_report == 'products_shopping_carts') {	
	if ($result['option']) {	
	$oquantity = '';
	foreach ($result['option'] as $option) {
	$oquantity .= $option['quantity'].'; ';
	}
	in_array('scw_stock_quantity', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['stock_quantity'] . " [" . rtrim($oquantity, "; ") . "]" . $csv_enclosed : '';				
	} else {
	in_array('scw_stock_quantity', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['stock_quantity'] . $csv_enclosed : '';
	}
	} else {
	in_array('scw_stock_quantity', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['stock_quantity'] . $csv_enclosed : '';
	}
	if ($filter_report == 'products_shopping_carts') {
	in_array('scw_cart_quantity', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['cart_quantity'] . $csv_enclosed : '';					
	}
	if ($filter_report == 'products_wishlists') {
	in_array('scw_wishlist_quantity', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['wishlist_quantity'] . $csv_enclosed : '';					
	}
	in_array('scw_customer_id', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_date_added', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_customer_name', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_customer_email', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_customer_telephone', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_customer_group', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_billing_company', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_billing_address_1', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_billing_address_2', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_billing_city', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_billing_zone', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_billing_postcode', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_billing_country', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	if ($result['customer']) {	
	foreach ($result['customer'] as $customer) {
	$export_csv .= $csv_row;
	$export_csv .= $csv_enclosed . '' . $csv_enclosed;					
	$export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed;		
	in_array('scw_id', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_name', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	if ($filter_report == 'products_shopping_carts') {	
	in_array('scw_name', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';					
	}
	in_array('scw_sku', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_upc', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_ean', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_jan', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_isbn', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_mpn', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_model', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_category', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_manufacturer', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_attribute', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('scw_status', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('scw_location', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('scw_tax_class', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('scw_viewed', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';
	in_array('scw_price', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';	
	in_array('scw_stock_quantity', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';		
	if ($filter_report == 'products_shopping_carts') {
	in_array('scw_cart_quantity', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';					
	}
	if ($filter_report == 'products_wishlists') {
	in_array('scw_wishlist_quantity', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';					
	}	
	in_array('scw_customer_id', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['customer_id'] . $csv_enclosed : '';
	in_array('scw_date_added', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['date_added'] . $csv_enclosed : '';
	in_array('scw_customer_name', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['customer_name'] . $csv_enclosed : '';
	in_array('scw_customer_email', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['email'] . $csv_enclosed : '';
	in_array('scw_customer_telephone', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['telephone'] . $csv_enclosed : '';
	in_array('scw_customer_group', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['customer_group'] . $csv_enclosed : '';
	in_array('scw_billing_company', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['company'] . $csv_enclosed : '';
	in_array('scw_billing_address_1', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['address_1'] . $csv_enclosed : '';
	in_array('scw_billing_address_2', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['address_2'] . $csv_enclosed : '';
	in_array('scw_billing_city', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['city'] . $csv_enclosed : '';
	in_array('scw_billing_zone', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['zone'] . $csv_enclosed : '';
	in_array('scw_billing_postcode', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['postcode'] . $csv_enclosed : '';
	in_array('scw_billing_country', $advpp_settings_scw_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $customer['country'] . $csv_enclosed : '';
	}
	}
	
	} elseif ($filter_report == 'products_without_orders') {

	in_array('pnp_id', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['product_id'] . $csv_enclosed : '';
	in_array('pnp_name', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['name'] . $csv_enclosed : '';
	in_array('pnp_sku', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['sku'] . $csv_enclosed : '';
	in_array('pnp_upc', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['upc'] . $csv_enclosed : '';
	in_array('pnp_ean', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['ean'] . $csv_enclosed : '';
	in_array('pnp_jan', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['jan'] . $csv_enclosed : '';
	in_array('pnp_isbn', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['isbn'] . $csv_enclosed : '';
	in_array('pnp_mpn', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['mpn'] . $csv_enclosed : '';
	in_array('pnp_model', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['model'] . $csv_enclosed : '';
	in_array('pnp_category', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['categories'] !== NULL ? $result['categories'] : '') . $csv_enclosed : '';		
	in_array('pnp_manufacturer', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['manufacturers'] !== NULL ? $result['manufacturers'] : '') . $csv_enclosed : '';
	in_array('pnp_attribute', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode(str_replace('<br>','; ',$result['attribute'])) . $csv_enclosed : '';	
	in_array('pnp_status', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['status'] . $csv_enclosed : '';	
	in_array('pnp_location', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['location'] . $csv_enclosed : '';	
	in_array('pnp_tax_class', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['tax_class'] . $csv_enclosed : '';	
	in_array('pnp_viewed', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['viewed'] . $csv_enclosed : '';
	in_array('pnp_price', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['price_raw'], 2)) . $csv_enclosed : '';	
	in_array('pnp_stock_quantity', $advpp_settings_pnp_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['stock_quantity'] . $csv_enclosed : '';

	} elseif ($filter_report == 'manufacturers' or $filter_report == 'categories') {

	if ($filter_report == 'manufacturers') {
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['manufacturers'] !== NULL ? $result['manufacturers'] : '') . $csv_enclosed;	
	} elseif ($filter_report == 'categories') {
	$export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['categories'] !== NULL ? $result['categories'] : '') . $csv_enclosed;
	}
	in_array('cm_orders', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['orders'] . $csv_enclosed : '';
	in_array('cm_customers', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['customers'] . $csv_enclosed : '';
	in_array('cm_sold_quantity', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['sold_quantity'] . $csv_enclosed : '';
	in_array('cm_sold_percent', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . ($result['sold_quantity'] != 0 ? round(100 * ($result['sold_quantity'] / $result['sold_quantity_total']), 2) : round((0), 2)) . '%' . $csv_enclosed : '';	
	in_array('cm_total_excl_vat', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_excl_vat_raw'], 2)) . $csv_enclosed : '';
	in_array('cm_total_tax', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_tax_raw'] !== NULL ? $result['total_tax_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('cm_total_incl_vat', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_incl_vat_raw'], 2)) . $csv_enclosed : '';
	in_array('cm_app', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['app_raw'], 2)) . $csv_enclosed : '';
	in_array('cm_refunds', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['refunds_raw'] !== NULL ? $result['refunds_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('cm_reward_points', $advpp_settings_cm_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['reward_points'] . $csv_enclosed : '';	
	
	} elseif ($filter_report == 'products_options') {
		
	$export_csv .= $csv_delimiter . $csv_enclosed . $result['option_name'] . $csv_enclosed;
	in_array('mv_orders', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['orders'] . $csv_enclosed : '';
	in_array('mv_customers', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['customers'] . $csv_enclosed : '';
	$export_csv .= $csv_delimiter . $csv_enclosed . $result['sold_quantity'] . $csv_enclosed;
	$export_csv .= $csv_delimiter . $csv_enclosed . ($result['sold_quantity'] != 0 ? round(100 * ($result['sold_quantity'] / $result['sold_quantity_total']), 2) : round((100), 2)) . '%' . $csv_enclosed;
	
	} else {
				
	in_array('mv_id', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['product_id'] . $csv_enclosed : '';
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['name'] . $csv_enclosed : '';
	if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {	
	if ($result['option']) {	
	$options = '';
	foreach ($result['option'] as $option) {
	$options .= $option['name'].': '.$option['value'].'; ';
	}
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . rtrim($options, "; ") . $csv_enclosed : '';
	} else {
	in_array('mv_name', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . '' . $csv_enclosed : '';					
	}	
	}
	in_array('mv_sku', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['sku'] . $csv_enclosed : '';
	in_array('mv_upc', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['upc'] . $csv_enclosed : '';
	in_array('mv_ean', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['ean'] . $csv_enclosed : '';
	in_array('mv_jan', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['jan'] . $csv_enclosed : '';
	in_array('mv_isbn', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['isbn'] . $csv_enclosed : '';
	in_array('mv_mpn', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['mpn'] . $csv_enclosed : '';	
	in_array('mv_model', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['model'] . $csv_enclosed : '';
	in_array('mv_category', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['categories'] !== NULL ? $result['categories'] : '') . $csv_enclosed : '';		
	in_array('mv_manufacturer', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode($result['manufacturers'] !== NULL ? $result['manufacturers'] : '') . $csv_enclosed : '';
	in_array('mv_attribute', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . html_entity_decode(str_replace('<br>','; ',$result['attribute'])) . $csv_enclosed : '';	
	in_array('mv_status', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['status'] . $csv_enclosed : '';	
	in_array('mv_location', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['location'] . $csv_enclosed : '';	
	in_array('mv_tax_class', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['tax_class'] . $csv_enclosed : '';	
	in_array('mv_viewed', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['viewed'] . $csv_enclosed : '';
	if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
	if ($result['option']) {	
	$oprice = '';
	foreach ($result['option'] as $option) {
	$oprice .= sprintf('%0.2f', round($option['price'], 2)).'; ';
	}
	in_array('mv_price', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['price_raw'], 2)) . " [" . rtrim($oprice, "; ") . "]" . $csv_enclosed : '';				
	} else {
	in_array('mv_price', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['price_raw'], 2)) . $csv_enclosed : '';	
	}
	} else {
	in_array('mv_price', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['price_raw'], 2)) . $csv_enclosed : '';	
	}	
	if ($filter_report == 'products_purchased_with_options' or $filter_report == 'products_abandoned_orders') {
	if ($result['option']) {	
	$oquantity = '';
	foreach ($result['option'] as $option) {
	$oquantity .= $option['quantity'].'; ';
	}
	in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['stock_quantity'] . " [" . rtrim($oquantity, "; ") . "]" . $csv_enclosed : '';				
	} else {
	in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['stock_quantity'] . $csv_enclosed : '';
	}
	} else {
	in_array('mv_stock_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['stock_quantity'] . $csv_enclosed : '';
	}
	in_array('mv_orders', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['orders'] . $csv_enclosed : '';
	in_array('mv_customers', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['customers'] . $csv_enclosed : '';
	in_array('mv_sold_quantity', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['sold_quantity'] . $csv_enclosed : '';
	in_array('mv_sold_percent', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . ($result['sold_quantity'] != 0 ? round(100 * ($result['sold_quantity'] / $result['sold_quantity_total']), 2) : round((0), 2)) . '%' . $csv_enclosed : '';
	in_array('mv_total_excl_vat', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_excl_vat_raw'] !== NULL ? $result['total_excl_vat_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('mv_total_tax', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_tax_raw'] !== NULL ? $result['total_tax_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('mv_total_incl_vat', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['total_incl_vat_raw'] !== NULL ? $result['total_incl_vat_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('mv_app', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['app_raw'] !== NULL ? $result['app_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('mv_refunds', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . sprintf('%0.2f', round($result['refunds_raw'] !== NULL ? $result['refunds_raw'] : 0, 2)) . $csv_enclosed : '';
	in_array('mv_reward_points', $advpp_settings_mv_columns) ? $export_csv .= $csv_delimiter . $csv_enclosed . $result['reward_points'] . $csv_enclosed : '';	
	}
	$export_csv .= $csv_row;
	}

	if (!isset($_GET['cron'])) {
		$filename = "products_report_".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A");
		header('Pragma: public');
		header('Expires: 0');
		header('Content-Description: File Transfer');
		header('Content-Type: text/csv; charset=utf-8');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');		
		header('Content-Disposition: attachment; filename='.$filename.".csv");
		print $export_csv;			
	} else if (isset($_GET['cron'])) {
		$file_path_parts = explode('/', $file_save_path);
		$file_path = dirname(DIR_APPLICATION);
		foreach ($file_path_parts as $file_path_part) {
			$file_path .= '/' . $file_path_part;
			if (!file_exists($file_path)) {
				mkdir($file_path, 0755);
				if (file_exists(DIR_DOWNLOAD . 'index.html')) {
					copy(DIR_DOWNLOAD  . 'index.html', $file_path . DIRECTORY_SEPARATOR . 'index.html');
				}
			}
		}
		
		if ($this->request->server['HTTPS']) {
			$server = HTTPS_CATALOG;
		} else {
			$server = HTTP_CATALOG;
		}
		
		$filename = $file_name."_".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".csv";
		$file_to_download = $server . $file_save_path . '/' . $file_name."_".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".csv";
		$file = $file_path . '/' . $file_name."_".date($this->config->get('advpp' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".csv";		
		
		file_put_contents($file, $export_csv);
		
		$message  = '<html dir="ltr" lang="en">' . "\n";
		$message .= '  <head>' . "\n";
		$message .= '    <title>' . $this->language->get('text_email_subject') . '</title>' . "\n";
		$message .= '    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">' . "\n";
		$message .= '  </head>' . "\n";
		$message .= '  <body>' . "\n";
		if ($export_file == 'save_on_server') {			
			$message .= '<p>' . $this->language->get('text_email_message_save_file') . ' <a href="' . $file_to_download . '">' . $filename . '</a>.</p><br />' . "\n";
		} else if ($export_file == 'send_to_email') {
			$message .= '<p>' . $this->language->get('text_email_message_send_file') . '</p><br />' . "\n";
		}
		$message .= '<p><b>' . $this->config->get('config_name') . '</b><br />' . "\n";
		$message .= $this->config->get('config_address') . '</p>' . "\n";			
		$message .= '</body>' . "\n";
		$message .= '</html>' . "\n";

		$mail = new Mail();
		$mail->protocol = $this->config->get('config_mail_protocol');
		$mail->parameter = $this->config->get('config_mail_parameter');
		$mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
		$mail->smtp_username = $this->config->get('config_mail_smtp_username');
		$mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
		$mail->smtp_port = $this->config->get('config_mail_smtp_port');
		$mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
		$mail->setTo($email);
		$mail->setFrom($this->config->get('config_email'));
		$mail->setSender(html_entity_decode($this->config->get('config_name'), ENT_QUOTES, 'UTF-8'));
		$mail->setSubject(html_entity_decode($this->language->get('text_email_subject'), ENT_QUOTES, 'UTF-8'));
		if ($export_file == 'save_on_server') {			
			$mail->setHtml($message);
		} else if ($export_file == 'send_to_email') {
			$mail->setHtml($message);
			$mail->addAttachment($file);
		}			
		$mail->send();
	}			
	exit;
	}
?>