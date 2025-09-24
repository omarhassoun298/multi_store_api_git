<?php
	ini_set("memory_limit","256M");
	require(DIR_SYSTEM . 'library/PhpSpreadsheet/vendor/autoload.php');
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	
	$results = $export_data['results']; 
	if ($results) {

	$this->load->model('extension/report/adv_sales_profit');	
	if ($filter_details == 'all_details_products') {
	if (in_array('all_prod_option', $advsop_settings_all_columns)) {	
	$option_names = $this->model_extension_report_adv_sales_profit->getOrderOptionsNames();
	}
	}
	$tax_names = $this->model_extension_report_adv_sales_profit->getOrderTaxNames();
	
	// Custom Fields
	$filter_data = array(
		'sort'  => 'cf.sort_order',
		'order' => 'ASC',
	);
	if (in_array('all_custom_fields', $advsop_settings_all_columns)) {	
	$custom_fields_name = $this->model_extension_report_adv_sales_profit->getCustomFieldsNames($filter_data);	
	}

	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setTitle('ADV Sales Profit Report');
	$spreadsheet->getProperties()->setCreator("ADV Reports & Statistics")
								 	   ->setLastModifiedBy("ADV Reports & Statistics")
									   ->setTitle("ADV Sales Profit Report")
									   ->setSubject("ADV Sales Profit Report")
									   ->setDescription("ADV Sales Profit Report with All Details")
									   ->setKeywords("office 2007 excel")
									   ->setCategory("www.opencartreports.com");	
	
	$export_logo_criteria ? $this->mainCounter = 2 : $this->mainCounter = 1;
	if ($export_logo_criteria ? $this->mainCounter = 2 : $this->mainCounter = 1) {
		 $j = 1;

		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_order_id'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);
		 $sheet->getColumnDimension($col)->setAutoSize(true);

		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_date_added'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	

		 if (in_array('all_order_inv_no', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_inv_no'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_customer_name', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_customer'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_order_email', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_email'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_order_customer_group', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_customer_group'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if ($filter_details == 'all_details_products') {
		 if (in_array('all_prod_id', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_id'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_sku', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);		 
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_sku'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_model', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_model'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_name', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_name'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);		
		 }
		 
		 if (in_array('all_prod_option', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_option'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 
		 $n = 0;
		 if ($option_names) {
		 foreach ($option_names as $option_name) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $option_name['name']);
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 $n++;
		 }		 
		 }
		 }

		 if (in_array('all_prod_attributes', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_attributes'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_category', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_category'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }
		 
		 if (in_array('all_prod_manu', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_manu'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_supplier', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_supplier'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }
		 }
		
 		 if ($filter_details == 'all_details_products' or $filter_details == 'all_details_orders') {
		 if (in_array('all_prod_currency', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_currency'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }
		 }
		 
		 if ($filter_details == 'all_details_products') {
		 if (in_array('all_prod_price', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_price'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);	
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_quantity', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_quantity'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_total_excl_vat', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_total_excl_vat'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_tax', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_tax'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_total_incl_vat', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_total_incl_vat'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_discount', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_discount'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_qty_refund', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_qty_refunded'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_refund', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_refunded'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_reward_points', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_reward_points'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_sales', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_sales'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_cost', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_cost'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_profit', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_profit'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_prod_profit_margin', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_profit_margin'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);		 
		 }

		 if (in_array('all_prod_profit_markup', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_prod_profit_markup'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);		
		 }
		 }

		 if (in_array('all_sub_total', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_sub_total'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_handling', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_handling'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_loworder', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_loworder'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_shipping'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_reward', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_reward'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_reward_points', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_earned_reward_points'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_reward_points', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_used_reward_points'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_coupon', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_coupon'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_coupon_name', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_coupon_name'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_coupon_code', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_coupon_code'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }
		 
		 if (in_array('all_order_tax', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_tax'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);	
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);			 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 $t = 0;
		 if ($tax_names) {
		 foreach ($tax_names as $tax_name) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $tax_name['title']);
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);	
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);			 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 $t++;
		 }		 
		 }			 
		 }

		 if (in_array('all_credit', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_credit'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_voucher', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_voucher'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_voucher_code', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_voucher_code'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_discount', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_discount'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_value', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_value'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_refund', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_refund'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_sales', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_sales'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_prod_costs', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_prod_costs'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_commission', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_commission'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_payment_cost', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_payment_cost'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_shipping_cost', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_shipping_cost'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_extra_cost', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_extra_cost'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_return_cost', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_return_cost'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping_balance', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_shipping_balance'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_costs', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_costs'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_profit', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_profit'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_profit_prc', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_margin'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);			 
		 }

		 if (in_array('all_order_shipping_method', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_shipping_method'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_payment_method', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_payment_method'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_status', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_status'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_store', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_store'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_campaign_name', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_campaign_name'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_campaign_code', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_campaign_code'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }
		 
		 if (in_array('all_customer_cust_id', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_customer_cust_id'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);	
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_custom_fields', $advsop_settings_all_columns)) {
		 if ($custom_fields_name) {
 		 foreach ($custom_fields_name as $custom_field_name) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $custom_field_name['name']);
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }
		 }
		 }
		
		 if (in_array('all_billing_first_name', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_first_name')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_last_name', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_last_name')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_company', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_company')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_address_1', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_address_1')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_address_2', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_address_2')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_city', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_city')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_zone', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_zone')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_zone_id', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_zone_id')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_zone_code', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_zone_code')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_postcode', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_postcode')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_country', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_country')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_country_id', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_country_id')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_billing_country_code', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_billing_country_code')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_customer_telephone', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_customer_telephone'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping_first_name', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_first_name')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping_last_name', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_last_name')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping_company', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_company')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping_address_1', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_address_1')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping_address_2', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_address_2')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping_city', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_city')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping_zone', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_zone')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping_zone_id', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_zone_id')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_shipping_zone_code', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_zone_code')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_shipping_postcode', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_postcode')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping_country', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_country')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_shipping_country_id', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_country_id')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_shipping_country_code', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, strip_tags($this->language->get('column_shipping_country_code')));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);
		 }

		 if (in_array('all_order_weight', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_weight'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getStyle($col . $this->mainCounter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }

		 if (in_array('all_order_comment', $advsop_settings_all_columns)) {
		 $col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		 $sheet->setCellValue($col . $this->mainCounter, $this->language->get('column_order_comment'));
		 $sheet->getStyle($col . $this->mainCounter)->getFont()->setBold(true);		 
		 $sheet->getColumnDimension($col)->setAutoSize(true);	
		 }
		 
		 if ($export_logo_criteria) {
			$sheet->insertNewRowBefore(1,1);
			$sheet->insertNewRowBefore(1,1);
			$sheet->insertNewRowBefore(1,1);
			$lastCell = $sheet->getHighestColumn();
			$lastRow = $sheet->getHighestRow();
			
			$sheet->getRowDimension('1')->setRowHeight(15);
			$sheet->mergeCells('A1:B1');
			$sheet->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('DBE5F1');	
			$sheet->setCellValue('C1', $this->language->get('text_report_date').": ".date($this->config->get('advsop' . $user_id . '_hour_format') == '24' ? "Y-m-d H:i:s" : "Y-m-d h:i:s A"));
			$sheet->getStyle('C1')->getFont()->setSize(10);
			$sheet->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('C1:' . $lastCell . '1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$sheet->getStyle('C1:' . $lastCell . '1')->getFill()->getStartColor()->setRGB('DBE5F1');
			$sheet->mergeCells('C1:' . $lastCell . '1');
				
			//Add logo to header
			$objDrawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$objDrawing->setName($this->config->get('config_name'));
			$objDrawing->setDescription($this->config->get('config_name'));
			$objDrawing->setPath($logo);
			$objDrawing->setCoordinates('A2');
			$objDrawing->setWidth(155);
			$objDrawing->setOffsetX(5);
			$objDrawing->setOffsetY(20);
			$objDrawing->setResizeProportional(true);
			$objDrawing->setWorksheet($sheet);
			
			$sheet->getRowDimension('2')->setRowHeight(50);
			$sheet->mergeCells('A2:B2');
			$sheet->getStyle('A2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$sheet->getStyle('A2')->getFill()->getStartColor()->setRGB('DBE5F1');	
			$sheet->setCellValue('C2', $this->language->get('adv_ext_name'));
			$sheet->getStyle('C2')->getFont()->setSize(24);
			$sheet->getStyle('C2')->getFont()->setBold(true);
			$sheet->getStyle('C2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('C2:' . $lastCell . $lastRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
			$sheet->getStyle('C2:' . $lastCell . '2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$sheet->getStyle('C2:' . $lastCell . '2')->getFill()->getStartColor()->setRGB('DBE5F1');
			$sheet->mergeCells('C2:' . $lastCell . '2');
			
			$sheet->getRowDimension('3')->setRowHeight(30);
			$sheet->mergeCells('A3:B3');
			$sheet->getStyle('A3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$sheet->getStyle('A3')->getFill()->getStartColor()->setRGB('DBE5F1');	
			$sheet->setCellValue('C3', $this->config->get('config_name').", ".$this->config->get('config_address').", ".$this->language->get('text_email')."".$this->config->get('config_email').", ".$this->language->get('text_telephone')."".$this->config->get('config_telephone'));
			$sheet->getStyle('C3')->getFont()->setSize(14);
			$sheet->getStyle('C3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('C3:' . $lastCell . $lastRow)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
			$sheet->getStyle('C3:' . $lastCell . '3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$sheet->getStyle('C3:' . $lastCell . '3')->getFill()->getStartColor()->setRGB('DBE5F1');
			$sheet->mergeCells('C3:' . $lastCell . '3');
			
			$sheet->getRowDimension('4')->setRowHeight(40);
			$sheet->mergeCells('A4:B4');
			$sheet->setCellValue('A4', $this->language->get('text_report_criteria'));
			$sheet->getStyle('A4')->getFont()->setSize(10);
			$sheet->getStyle('A4')->getFont()->setBold(true);
			$sheet->getStyle('A4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
			$sheet->getStyle('A4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
			$sheet->getStyle('A4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$sheet->getStyle('A4')->getFill()->getStartColor()->setRGB('DBE5F1');				
			$sheet->mergeCells('C4:' . $lastCell . '4');
			$filter_criteria = "";
			if ($filter_report) {	
				if ($filter_report == 'sales_summary') {
					$filter_report_name = $this->language->get('text_sales_summary');
				} elseif ($filter_report == 'day_of_week') {
					$filter_report_name = $this->language->get('text_day_of_week');
				} elseif ($filter_report == 'hour') {
					$filter_report_name = $this->language->get('text_hour');
				} elseif ($filter_report == 'store') {
					$filter_report_name = $this->language->get('text_store');
				} elseif ($filter_report == 'currency') {
					$filter_report_name = $this->language->get('text_currency');
				} elseif ($filter_report == 'customer_group') {
					$filter_report_name = $this->language->get('text_customer_group');
				} elseif ($filter_report == 'tax') {
					$filter_report_name = $this->language->get('text_tax');
				} elseif ($filter_report == 'country') {
					$filter_report_name = $this->language->get('text_country');
				} elseif ($filter_report == 'postcode') {
					$filter_report_name = $this->language->get('text_postcode');
				} elseif ($filter_report == 'region_state') {
					$filter_report_name = $this->language->get('text_region_state');
				} elseif ($filter_report == 'city') {
					$filter_report_name = $this->language->get('text_city');
				} elseif ($filter_report == 'payment_method') {
					$filter_report_name = $this->language->get('text_payment_method');
				} elseif ($filter_report == 'shipping_method') {
					$filter_report_name = $this->language->get('text_shipping_method');					
				} elseif ($filter_report == 'coupon') {
					$filter_report_name = $this->language->get('text_coupons');					
				} elseif ($filter_report == 'voucher') {
					$filter_report_name = $this->language->get('text_gift_vouchers');					
				} elseif ($filter_report == 'abandoned_orders') {
					$filter_report_name = $this->language->get('text_abandoned_orders');			
				}	
				$filter_criteria .= $this->language->get('entry_report')." ".$filter_report_name."; ";
			}
			if ($filter_details) {
				if ($filter_details == 'no_details') {
					$filter_details_name = $this->language->get('text_no_details');
				} elseif ($filter_details == 'basic_details') {
					$filter_details_name = $this->language->get('text_basic_details');
				} elseif ($filter_details == 'all_details_products') {
					$filter_details_name = $this->language->get('text_all_details')." ".$this->language->get('text_all_details_products');				
				} elseif ($filter_details == 'all_details_orders') {
					$filter_details_name = $this->language->get('text_all_details')." ".$this->language->get('text_all_details_orders');		
				}					
				$filter_criteria .= $this->language->get('entry_show_details')." ".$filter_details_name."; ";
			}
			if ($filter_group) {	
				if ($filter_group == 'year') {
					$filter_group_name = $this->language->get('text_year');
				} elseif ($filter_group == 'quarter') {
					$filter_group_name = $this->language->get('text_quarter');	
				} elseif ($filter_group == 'month') {
					$filter_group_name = $this->language->get('text_month');
				} elseif ($filter_group == 'week') {
					$filter_group_name = $this->language->get('text_week');
				} elseif ($filter_group == 'day') {
					$filter_group_name = $this->language->get('text_day');
				} elseif ($filter_group == 'order') {
					$filter_group_name = $this->language->get('text_order');					
				}				
				$filter_criteria .= $this->language->get('entry_group')." ".$filter_group_name."; ";
			}
			if ($filter_sort) {	
				if ($filter_sort == 'report_type') {			
					if ($filter_report == 'sales_summary' or $filter_report == 'abandoned_orders' or $filter_report == 'tax' or $filter_report == 'coupon' or $filter_report == 'voucher') {
						$filter_sort_name = $this->language->get('column_date');
					} elseif ($filter_report == 'day_of_week') {
						$filter_sort_name = $this->language->get('column_day_of_week');
					} elseif ($filter_report == 'hour') {
						$filter_sort_name = $this->language->get('column_hour');
					} elseif ($filter_report == 'store') {
						$filter_sort_name = $this->language->get('column_store');
					} elseif ($filter_report == 'currency') {
						$filter_sort_name = $this->language->get('column_currency');
					} elseif ($filter_report == 'customer_group') {
						$filter_sort_name = $this->language->get('column_customer_group');
					} elseif ($filter_report == 'country') {
						$filter_sort_name = $this->language->get('column_country');
					} elseif ($filter_report == 'postcode') {
						$filter_sort_name = $this->language->get('column_postcode');
					} elseif ($filter_report == 'region_state') {
						$filter_sort_name = $this->language->get('column_region_state');
					} elseif ($filter_report == 'city') {
						$filter_sort_name = $this->language->get('column_city');
					} elseif ($filter_report == 'payment_method') {
						$filter_sort_name = $this->language->get('column_payment_method');
					} elseif ($filter_report == 'shipping_method') {
						$filter_sort_name = $this->language->get('column_shipping_method');
					}
					
				}
				if ($filter_report == 'tax') {
				if ($filter_sort == 'tax_name') {
					$filter_sort_name = $this->language->get('column_tax_title');
				} elseif ($filter_sort == 'tax_rate') {
					$filter_sort_name = $this->language->get('column_tax_rate');
				} elseif ($filter_sort == 'tax_orders') {
					$filter_sort_name = $this->language->get('column_orders');
				} elseif ($filter_sort == 'tax_total') {
					$filter_sort_name = $this->language->get('column_tax_total');
				}					
				} elseif ($filter_report == 'coupon') {
				if ($filter_sort == 'coupon_name') {
					$filter_sort_name = $this->language->get('column_coupon_name');
				} elseif ($filter_sort == 'coupon_code') {
					$filter_sort_name = $this->language->get('column_coupon_code');
				} elseif ($filter_sort == 'coupon_discount') {
					$filter_sort_name = $this->language->get('column_coupon_discount');
				} elseif ($filter_sort == 'coupon_type') {
					$filter_sort_name = $this->language->get('column_coupon_type');
				} elseif ($filter_sort == 'coupon_status') {
					$filter_sort_name = $this->language->get('column_coupon_status');
				} elseif ($filter_sort == 'coupon_date_added') {
					$filter_sort_name = $this->language->get('column_coupon_date_added');
				} elseif ($filter_sort == 'coupon_last_used') {
					$filter_sort_name = $this->language->get('column_coupon_last_used');
				} elseif ($filter_sort == 'coupon_amount') {
					$filter_sort_name = $this->language->get('column_coupon_amount');	
				} elseif ($filter_sort == 'coupon_orders') {
					$filter_sort_name = $this->language->get('column_orders');
				} elseif ($filter_sort == 'coupon_total') {
					$filter_sort_name = $this->language->get('column_total');					
				}	
				} elseif ($filter_report == 'voucher') {
				if ($filter_sort == 'voucher_code') {
					$filter_sort_name = $this->language->get('column_voucher_code');
				} elseif ($filter_sort == 'voucher_from_name') {
					$filter_sort_name = $this->language->get('column_voucher_from_name');
				} elseif ($filter_sort == 'voucher_from_email') {
					$filter_sort_name = $this->language->get('column_voucher_from_email');
				} elseif ($filter_sort == 'voucher_to_name') {
					$filter_sort_name = $this->language->get('column_voucher_to_name');
				} elseif ($filter_sort == 'voucher_to_email') {
					$filter_sort_name = $this->language->get('column_voucher_to_email');
				} elseif ($filter_sort == 'voucher_theme') {
					$filter_sort_name = $this->language->get('column_voucher_theme');
				} elseif ($filter_sort == 'voucher_status') {
					$filter_sort_name = $this->language->get('column_voucher_status');
				} elseif ($filter_sort == 'voucher_date_added') {
					$filter_sort_name = $this->language->get('column_voucher_date_added');
				} elseif ($filter_sort == 'voucher_amount') {
					$filter_sort_name = $this->language->get('column_voucher_amount');	
				} elseif ($filter_sort == 'voucher_used_value') {
					$filter_sort_name = $this->language->get('column_voucher_used_value');	
				} elseif ($filter_sort == 'voucher_remaining_value') {
					$filter_sort_name = $this->language->get('column_voucher_remaining_value');						
				} elseif ($filter_sort == 'voucher_orders') {
					$filter_sort_name = $this->language->get('column_orders');
				} elseif ($filter_sort == 'voucher_total') {
					$filter_sort_name = $this->language->get('column_total');					
				}
				} else {
				if ($filter_sort == 'orders') {
					$filter_sort_name = $this->language->get('column_orders');
				} elseif ($filter_sort == 'customers') {
					$filter_sort_name = $this->language->get('column_customers');
				} elseif ($filter_sort == 'products') {
					$filter_sort_name = $this->language->get('column_products');	
				} elseif ($filter_sort == 'sub_total') {
					$filter_sort_name = $this->language->get('column_sub_total');
				} elseif ($filter_sort == 'shipping') {
					$filter_sort_name = $this->language->get('column_shipping');
				} elseif ($filter_sort == 'reward') {
					$filter_sort_name = $this->language->get('column_reward');
				} elseif ($filter_sort == 'earned_reward_points') {
					$filter_sort_name = $this->language->get('column_earned_reward_points');	
				} elseif ($filter_sort == 'used_reward_points') {
					$filter_sort_name = $this->language->get('column_used_reward_points');
				} elseif ($filter_sort == 'coupon') {
					$filter_sort_name = $this->language->get('column_coupon');	
				} elseif ($filter_sort == 'tax') {
					$filter_sort_name = $this->language->get('column_taxes');
				} elseif ($filter_sort == 'credit') {
					$filter_sort_name = $this->language->get('column_credit');
				} elseif ($filter_sort == 'voucher') {
					$filter_sort_name = $this->language->get('column_voucher');
				} elseif ($filter_sort == 'discount') {
					$filter_sort_name = $this->language->get('column_discount');	
				} elseif ($filter_sort == 'total') {
					$filter_sort_name = $this->language->get('column_total');
				} elseif ($filter_sort == 'aov') {
					$filter_sort_name = $this->language->get('column_aov');	
				} elseif ($filter_sort == 'refunds') {
					$filter_sort_name = $this->language->get('column_refunds');
				} elseif ($filter_sort == 'total_sales') {
					$filter_sort_name = $this->language->get('column_total_sales');
				} elseif ($filter_sort == 'prod_costs') {
					$filter_sort_name = $this->language->get('column_product_costs');
				} elseif ($filter_sort == 'commission') {
					$filter_sort_name = $this->language->get('column_commission');	
				} elseif ($filter_sort == 'pay_costs') {
					$filter_sort_name = $this->language->get('column_payment_cost');
				} elseif ($filter_sort == 'ship_costs') {
					$filter_sort_name = $this->language->get('column_shipping_cost');	
				} elseif ($filter_sort == 'extra_cost') {
					$filter_sort_name = $this->language->get('column_extra_cost');
				} elseif ($filter_sort == 'return_cost') {
					$filter_sort_name = $this->language->get('column_return_cost');
				} elseif ($filter_sort == 'ship_balance') {
					$filter_sort_name = $this->language->get('column_shipping_balance');
				} elseif ($filter_sort == 'total_costs') {
					$filter_sort_name = $this->language->get('column_total_costs');	
				} elseif ($filter_sort == 'total_profit') {
					$filter_sort_name = $this->language->get('column_total_profit');
				} elseif ($filter_sort == 'total_profit_prc') {
					$filter_sort_name = $this->language->get('column_total_profit') . ' [%]';					
				}
				}
				if ($filter_order == 'asc') {
					$filter_order_name = $this->language->get('text_asc');
				} elseif ($filter_order == 'desc') {
					$filter_order_name = $this->language->get('text_desc');
				}				
				$filter_criteria .= $this->language->get('entry_sort_by')." ".$filter_sort_name." ".$filter_order_name."; ";
			}
			if ($filter_limit) {	
				$filter_criteria .= $this->language->get('entry_limit')." ".$filter_limit."; ";
			}	
			$filter_criteria .= "\r";
			if ($filter_range) {	
				if ($filter_range == 'custom') {
					$filter_range_name = $this->language->get('stat_custom');
				} elseif ($filter_range == 'today') {
					$filter_range_name = $this->language->get('stat_today');
				} elseif ($filter_range == 'yesterday') {
					$filter_range_name = $this->language->get('stat_yesterday');	
				} elseif ($filter_range == 'week') {
					$filter_range_name = $this->language->get('stat_week');
				} elseif ($filter_range == 'month') {
					$filter_range_name = $this->language->get('stat_month');
				} elseif ($filter_range == 'quarter') {
					$filter_range_name = $this->language->get('stat_quarter');
				} elseif ($filter_range == 'year') {
					$filter_range_name = $this->language->get('stat_year');	
				} elseif ($filter_range == 'current_week') {
					$filter_range_name = $this->language->get('stat_current_week');
				} elseif ($filter_range == 'current_month') {
					$filter_range_name = $this->language->get('stat_current_month');	
				} elseif ($filter_range == 'current_quarter') {
					$filter_range_name = $this->language->get('stat_current_quarter');
				} elseif ($filter_range == 'current_year') {
					$filter_range_name = $this->language->get('stat_current_year');
				} elseif ($filter_range == 'last_week') {
					$filter_range_name = $this->language->get('stat_last_week');
				} elseif ($filter_range == 'last_month') {
					$filter_range_name = $this->language->get('stat_last_month');	
				} elseif ($filter_range == 'last_quarter') {
					$filter_range_name = $this->language->get('stat_last_quarter');
				} elseif ($filter_range == 'last_year') {
					$filter_range_name = $this->language->get('stat_last_year');
				} elseif ($filter_range == 'all_time') {
					$filter_range_name = $this->language->get('stat_all_time');					
				}				
				$filter_criteria .= $this->language->get('entry_range')." ".$filter_range_name;
				if ($filter_date_start) {	
					$filter_criteria .= " [".$this->language->get('entry_date_start')." ".$filter_date_start;
				}
				if ($filter_date_end) {	
					$filter_criteria .= ", ".$this->language->get('entry_date_end')." ".$filter_date_end."]";
				}
				$filter_criteria .= "; ";
			}
			if ($filter_order_status_id) {	
				$filter_criteria .= $this->language->get('entry_status')." ".$filter_order_status_id;
				if ($filter_status_date_start) {	
					$filter_criteria .= " [".$this->language->get('entry_date_start')." ".$filter_status_date_start;
				}
				if ($filter_status_date_end) {	
					$filter_criteria .= ", ".$this->language->get('entry_date_end')." ".$filter_status_date_end."]";
				}
				$filter_criteria .= "; ";				
			}
			if ($filter_order_id_from or $filter_order_id_to) {
				$filter_criteria .= $this->language->get('entry_order_id').": ".$filter_order_id_from."-".$filter_order_id_to."; ";
			}
			if ($filter_order_value_min or $filter_order_value_max) {
				$filter_criteria .= $this->language->get('entry_order_value').": ".$filter_order_value_min."-".$filter_order_value_max."; ";
			}
			$filter_criteria .= "\r";
			if ($filter_store_id) {	
				$filter_criteria .= $this->language->get('entry_store')." ".$filter_store_id."; ";
			}
			if ($filter_currency) {	
				$filter_criteria .= $this->language->get('entry_currency')." ".$filter_currency."; ";
			}
			if ($filter_taxes) {	
				$filter_criteria .= $this->language->get('entry_tax')." ".$filter_taxes."; ";
			}
			if ($filter_tax_classes) {	
				$filter_criteria .= $this->language->get('entry_tax_classes')." ".$filter_tax_classes."; ";
			}
			if ($filter_geo_zones) {	
				$filter_criteria .= $this->language->get('entry_geo_zone')." ".$filter_geo_zones."; ";
			}
			if ($filter_customer_group_id) {	
				$filter_criteria .= $this->language->get('entry_customer_group')." ".$filter_customer_group_id."; ";
			}		
			if ($filter_customer_name) {	
				$filter_criteria .= $this->language->get('entry_customer_name')." ".$filter_customer_name."; ";
			}
			if ($filter_customer_email) {	
				$filter_criteria .= $this->language->get('entry_customer_email')." ".$filter_customer_email."; ";
			}
			if ($filter_customer_telephone) {	
				$filter_criteria .= $this->language->get('entry_customer_telephone')." ".$filter_customer_telephone."; ";
			}
			if ($filter_ip) {	
				$filter_criteria .= $this->language->get('entry_ip')." ".$filter_ip."; ";
			}
			if ($filter_payment_company) {	
				$filter_criteria .= $this->language->get('entry_payment_company')." ".$filter_payment_company."; ";
			}
			if ($filter_payment_address) {	
				$filter_criteria .= $this->language->get('entry_payment_address')." ".$filter_payment_address."; ";
			}
			if ($filter_payment_city) {	
				$filter_criteria .= $this->language->get('entry_payment_city')." ".$filter_payment_city."; ";
			}
			if ($filter_payment_zone) {	
				$filter_criteria .= $this->language->get('entry_payment_zone')." ".$filter_payment_zone."; ";
			}
			if ($filter_payment_postcode) {	
				$filter_criteria .= $this->language->get('entry_payment_postcode')." ".$filter_payment_postcode."; ";
			}
			if ($filter_payment_country) {	
				$filter_criteria .= $this->language->get('entry_payment_country')." ".$filter_payment_country."; ";
			}
			if ($filter_payment_method) {	
				$filter_criteria .= $this->language->get('entry_payment_method')." ".$filter_payment_method."; ";
			}
			if ($filter_shipping_company) {	
				$filter_criteria .= $this->language->get('entry_shipping_company')." ".$filter_shipping_company."; ";
			}
			if ($filter_shipping_address) {	
				$filter_criteria .= $this->language->get('entry_shipping_address')." ".$filter_shipping_address."; ";
			}
			if ($filter_shipping_city) {	
				$filter_criteria .= $this->language->get('entry_shipping_city')." ".$filter_shipping_city."; ";
			}
			if ($filter_shipping_zone) {	
				$filter_criteria .= $this->language->get('entry_shipping_zone')." ".$filter_shipping_zone."; ";
			}
			if ($filter_shipping_postcode) {	
				$filter_criteria .= $this->language->get('entry_shipping_postcode')." ".$filter_shipping_postcode."; ";
			}
			if ($filter_shipping_country) {	
				$filter_criteria .= $this->language->get('entry_shipping_country')." ".$filter_shipping_country."; ";
			}
			if ($filter_shipping_method) {	
				$filter_criteria .= $this->language->get('entry_shipping_method')." ".$filter_shipping_method."; ";
			}
			if ($filter_category) {	
				$filter_criteria .= $this->language->get('entry_category')." ".$filter_category."; ";
			}
			if ($filter_manufacturer) {	
				$filter_criteria .= $this->language->get('entry_manufacturer')." ".$filter_manufacturer."; ";
			}
			if ($filter_supplier) {	
				$filter_criteria .= $this->language->get('entry_supplier')." ".$filter_supplier."; ";
			}				
			if ($filter_sku) {	
				$filter_criteria .= $this->language->get('entry_sku')." ".$filter_sku."; ";
			}
			if ($filter_product_name) {	
				$filter_criteria .= $this->language->get('entry_product')." ".$filter_product_name."; ";
			}
			if ($filter_model) {	
				$filter_criteria .= $this->language->get('entry_model')." ".$filter_model."; ";
			}
			if ($filter_option) {	
				$filter_criteria .= $this->language->get('entry_option')." ".$filter_option."; ";
			}	
			if ($filter_attribute) {	
				$filter_criteria .= $this->language->get('entry_attributes')." ".$filter_attribute."; ";
			}			
			if ($filter_location) {	
				$filter_criteria .= $this->language->get('entry_location')." ".$filter_location."; ";
			}	
			if ($filter_coupon_name) {	
				$filter_criteria .= $this->language->get('entry_coupon_name')." ".$filter_coupon_name."; ";
			}		
			if ($filter_coupon_code) {	
				$filter_criteria .= $this->language->get('entry_coupon_code')." ".$filter_coupon_code."; ";
			}	
			if ($filter_voucher_code) {	
				$filter_criteria .= $this->language->get('entry_voucher_code')." ".$filter_voucher_code."; ";
			}	
			if ($filter_campaign_name) {	
				$filter_criteria .= $this->language->get('entry_campaign_name')." ".$filter_campaign_name."; ";
			}		
			if ($filter_campaign_code) {	
				$filter_criteria .= $this->language->get('entry_campaign_code')." ".$filter_campaign_code."; ";
			}		
			$sheet->setCellValue('C4', $filter_criteria);
			$sheet->getStyle('C4')->getAlignment()->setWrapText(true);
			$sheet->getStyle('C4')->getFont()->setSize(10);
			$sheet->getStyle('C4')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
			$sheet->getStyle('C4:' . $lastCell . '4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
			$sheet->getStyle('C4:' . $lastCell . '4')->getFill()->getStartColor()->setRGB('DBE5F1');				
		 }	
		 
		$freeze = ($export_logo_criteria ? 'C6' : 'C2');
		$sheet->freezePane($freeze);
	}
	
	$counter = ($export_logo_criteria ? $this->mainCounter+4 : $this->mainCounter+1);
		
	foreach ($results as $result) {
		$j = 1;

		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);	
		$sheet->setCellValue($col . $counter, $result['order_id']);

		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['date_added']);

		if (in_array('all_order_inv_no', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['invoice']);
		}

		if (in_array('all_order_customer_name', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['name']);
		}

		if (in_array('all_order_email', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['email']);
		}

		if (in_array('all_order_customer_group', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, html_entity_decode($result['cust_group'], ENT_COMPAT, 'UTF-8'));
		}

		if ($filter_details == 'all_details_products') {
		if (in_array('all_prod_id', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);	
		$sheet->setCellValue($col . $counter, $result['product_id']);
		}

		if (in_array('all_prod_sku', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
		$sheet->setCellValue($col . $counter, $result['product_sku']);
		}

		if (in_array('all_prod_model', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);		
		$sheet->setCellValue($col . $counter, $result['product_model']);
		}

		if (in_array('all_prod_name', $advso_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, html_entity_decode($result['product_name'], ENT_COMPAT, 'UTF-8'));
		}

		if (in_array('all_prod_option', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, html_entity_decode($result['product_options'], ENT_COMPAT, 'UTF-8'));
		
		$o = $j;	
		if ($result['product_option']) {
		foreach ($option_names as $option_name) {	
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
		foreach ($result['product_option'] as $product_option) {
		if ($product_option['name'] == $option_name['name']) {		
		$sheet->setCellValue($col . $counter, $product_option['value']);
		//$sheet->setCellValue($col . $counter, $product_option['name'].': '.$product_option['value']);
		}
		}
		}	
		} else {
		foreach ($option_names as $option_name) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, '');
		}
		}
		$j=$o+$n;
		}

		if (in_array('all_prod_attributes', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, html_entity_decode($result['product_attributes'], ENT_COMPAT, 'UTF-8'));
		}

		if (in_array('all_prod_category', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, html_entity_decode($result['product_category'] !== NULL ? $result['product_category'] : '', ENT_COMPAT, 'UTF-8'));		
		}
		
		if (in_array('all_prod_manu', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, html_entity_decode($result['product_manu'] !== NULL ? $result['product_manu'] : '', ENT_COMPAT, 'UTF-8'));
		}

		if (in_array('all_prod_supplier', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, html_entity_decode($result['product_supplier'] !== NULL ? $result['product_supplier'] : '', ENT_COMPAT, 'UTF-8'));
		}
		}
		
 		if ($filter_details == 'all_details_products' or $filter_details == 'all_details_orders') {
		if (in_array('all_prod_currency', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['currency_code']);
		}
		}
		 
		if ($filter_details == 'all_details_products') {
		if (in_array('all_prod_price', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['product_price_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_prod_quantity', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['product_quantity']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_prod_total_excl_vat', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['product_total_excl_vat_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_prod_tax', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['product_tax_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_prod_total_incl_vat', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['product_total_incl_vat_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_prod_discount', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['product_discount_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_prod_qty_refund', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['product_qty_refund']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_prod_refund', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		if ($this->config->get('advsop' . $user_id . '_formula_6')) {	
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, -$result['product_refund_raw'] != NULL ? -$result['product_refund_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		} else {
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['product_refund_raw'] != NULL ? $result['product_refund_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}
		}

		if (in_array('all_prod_reward_points', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['product_reward_points']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_prod_sales', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['product_sales_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_prod_cost', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, -$result['product_cost_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_prod_profit', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['product_profit_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_prod_profit_margin', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		if ($result['product_sales_raw'] > 0) {
		$sheet->getStyle($col . $counter)->getNumberFormat()->applyFromArray(array('code' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_PERCENTAGE_00));	
		$sheet->getStyle($col . $counter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);	
		$sheet->setCellValue($col . $counter, $result['product_profit_margin']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		} else {
		$sheet->getStyle($col . $counter)->getNumberFormat()->applyFromArray(array('code' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_PERCENTAGE_00));
		$sheet->getStyle($col . $counter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);	
		$sheet->setCellValue($col . $counter, '0');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}
		}

		if (in_array('all_prod_profit_markup', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		if ($result['product_cost_raw'] > 0) {
		$sheet->getStyle($col . $counter)->getNumberFormat()->applyFromArray(array('code' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_PERCENTAGE_00));		
		$sheet->getStyle($col . $counter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);	
		$sheet->setCellValue($col . $counter, $result['product_profit_markup']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		} else {
		$sheet->getStyle($col . $counter)->getNumberFormat()->applyFromArray(array('code' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_PERCENTAGE_00));	
		$sheet->getStyle($col . $counter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);	
		$sheet->setCellValue($col . $counter, '0');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}
		}
		}

		if (in_array('all_sub_total', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_sub_total_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_handling', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_handling_raw'] != NULL ? $result['order_handling_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_loworder', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_low_order_fee_raw'] != NULL ? $result['order_low_order_fee_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_shipping', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_shipping_raw'] != NULL ? $result['order_shipping_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_reward', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_reward_raw'] != NULL ? $result['order_reward_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_reward_points', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['order_earned_points']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_reward_points', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['order_used_points']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_coupon', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_coupon_raw'] != NULL ? $result['order_coupon_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_coupon_name', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);			
		$sheet->setCellValue($col . $counter, $result['order_coupon_name']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_coupon_code', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);			
		$sheet->setCellValue($col . $counter, $result['order_coupon_code']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}
		
		if (in_array('all_order_tax', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_tax_raw'] != NULL ? $result['order_tax_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		$x = $j;	
		if ($result['order_taxes']) {
		foreach ($tax_names as $tax_name) {			
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		foreach ($result['order_taxes'] as $order_tax) {
		if ($order_tax['title'] == $tax_name['title']) {	
		$sheet->setCellValue($col . $counter, $order_tax['value'] != NULL ? $order_tax['value'] : '0.00');
		}
		}
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}	
		} else {
		foreach ($tax_names as $tax_name) {	
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, '');
		}
		}
		$j=$x+$t;	
		}

		if (in_array('all_credit', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_credit_raw'] != NULL ? $result['order_credit_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_voucher', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_voucher_raw'] != NULL ? $result['order_voucher_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_voucher_code', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['order_voucher_code']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_discount', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_discount_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_order_value', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_value_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_refund', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		if ($this->config->get('advsop' . $user_id . '_formula_6')) {	
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, -$result['order_refund_raw'] != NULL ? -$result['order_refund_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		} else {
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_refund_raw'] != NULL ? $result['order_refund_raw'] : '0.00');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}
		}

		if (in_array('all_order_sales', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_sales_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_order_prod_costs', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, -$result['order_product_costs_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_order_commission', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, -$result['order_commission_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_order_payment_cost', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, -$result['order_payment_cost_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_order_shipping_cost', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, -$result['order_shipping_cost_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_order_extra_cost', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, -$result['order_extra_cost_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_order_return_cost', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, -$result['order_return_cost_raw']);	
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_shipping_balance', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_ship_balance_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_order_costs', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, -$result['order_costs_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_order_profit', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode('0.00');
		$sheet->setCellValue($col . $counter, $result['order_profit_raw']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_order_profit_prc', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		if ($result['order_sales_raw'] > 0) {
		$sheet->getStyle($col . $counter)->getNumberFormat()->applyFromArray(array('code' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_PERCENTAGE_00));
		$sheet->getStyle($col . $counter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);	
		$sheet->setCellValue($col . $counter, $result['order_profit_prc']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		} else {
		$sheet->getStyle($col . $counter)->getNumberFormat()->applyFromArray(array('code' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_PERCENTAGE_00));	
		$sheet->getStyle($col . $counter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);	
		$sheet->setCellValue($col . $counter, '0');
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}
		}

		if (in_array('all_order_shipping_method', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['shipping_method']);
		}

		if (in_array('all_order_payment_method', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['payment_method']);
		}

		if (in_array('all_order_status', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['order_status']);
		}

		if (in_array('all_order_store', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, html_entity_decode($result['store_name'], ENT_COMPAT, 'UTF-8'));
		}

		if (in_array('all_campaign_name', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);			
		$sheet->setCellValue($col . $counter, $result['order_campaign_name']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}

		if (in_array('all_campaign_code', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);			
		$sheet->setCellValue($col . $counter, $result['order_campaign_code']);
		if ($filter_report == 'abandoned_orders') {
		$sheet->getStyle($col . $counter)->getFont()->applyFromArray(array('strike' => true));
		}			
		}
		
		if (in_array('all_customer_cust_id', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);	
		$sheet->setCellValue($col . $counter, $result['customer_id']);
		}

		if (in_array('all_custom_fields', $advsop_settings_all_columns)) {
		if ($result['custom_fields']) {
		foreach ($result['custom_fields'] as $custom_field) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);		
		$sheet->setCellValue($col . $counter, $custom_field['value']);
		}
		} else {
		foreach ($custom_fields_name as $custom_field_name) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);		
		$sheet->setCellValue($col . $counter, '');
		}
		}
		}

		if (in_array('all_billing_first_name', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['payment_firstname']);
		}

		if (in_array('all_billing_last_name', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['payment_lastname']);
		}

		if (in_array('all_billing_company', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['payment_company']);
		}

		if (in_array('all_billing_address_1', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['payment_address_1']);
		}

		if (in_array('all_billing_address_2', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['payment_address_2']);
		}

		if (in_array('all_billing_city', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['payment_city']);
		}

		if (in_array('all_billing_zone', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['payment_zone']);
		}

		if (in_array('all_billing_zone_id', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
		$sheet->setCellValue($col . $counter, $result['payment_zone_id']);
		}

		if (in_array('all_billing_zone_code', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['payment_zone_code']);
		}

		if (in_array('all_billing_postcode', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);		
		$sheet->setCellValue($col . $counter, $result['payment_postcode']);
		}

		if (in_array('all_billing_country', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['payment_country']);
		}

		if (in_array('all_billing_country_id', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
		$sheet->setCellValue($col . $counter, $result['payment_country_id']);
		}

		if (in_array('all_billing_country_code', $advsop_settings_all_columns)) {		
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);		
		$sheet->setCellValue($col . $counter, $result['payment_country_code']);
		}

		if (in_array('all_customer_telephone', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);		
		$sheet->setCellValue($col . $counter, $result['telephone']);
		}

		if (in_array('all_shipping_first_name', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['shipping_firstname']);
		}

		if (in_array('all_shipping_last_name', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['shipping_lastname']);
		}

		if (in_array('all_shipping_company', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['shipping_company']);
		}

		if (in_array('all_shipping_address_1', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['shipping_address_1']);
		}

		if (in_array('all_shipping_address_2', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['shipping_address_2']);
		}

		if (in_array('all_shipping_city', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['shipping_city']);
		}

		if (in_array('all_shipping_zone', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['shipping_zone']);
		}

		if (in_array('all_shipping_zone_id', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
		$sheet->setCellValue($col . $counter, $result['shipping_zone_id']);
		}

		if (in_array('all_shipping_zone_code', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['shipping_zone_code']);
		}

		if (in_array('all_shipping_postcode', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);			
		$sheet->setCellValue($col . $counter, $result['shipping_postcode']);
		}

		if (in_array('all_shipping_country', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['shipping_country']);
		}

		if (in_array('all_shipping_country_id', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
		$sheet->setCellValue($col . $counter, $result['shipping_country_id']);
		}

		if (in_array('all_shipping_country_code', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, $result['shipping_country_code']);
		}

		if (in_array('all_order_weight', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->getStyle($col . $counter)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
		$sheet->setCellValue($col . $counter, $result['order_weight']);
		}

		if (in_array('all_order_comment', $advsop_settings_all_columns)) {
		$col = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($j++);
		$sheet->setCellValue($col . $counter, html_entity_decode($result['order_comment'], ENT_COMPAT, 'UTF-8'));
		}
		
		$counter++;
		$this->mainCounter++;
	}
	
	if (!isset($_GET['cron'])) {
		$filename = "sales_profit_report_all_details_".date($this->config->get('advsop' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A");
		header('Expires: 0');
		header('Cache-control: private');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=UTF-8; encoding=UTF-8');
		header('Content-Disposition: attachment;filename='.$filename.".xlsx");
		header('Content-Transfer-Encoding: UTF-8');
		header('Cache-Control: max-age=0');

		// ob_clean();
		// ob_start();
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
		// ob_end_flush();	
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
		
		$filename = $file_name."_".date($this->config->get('advsop' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".xlsx";
		$file_to_download = $server . $file_save_path . '/' . $file_name."_".date($this->config->get('advsop' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".xlsx";
		$file = $file_path . '/' . $file_name."_".date($this->config->get('advsop' . $user_id . '_hour_format') == '24' ? "Y-m-d_H-i-s" : "Y-m-d_h-i-s-A").".xlsx";		
		
		// ob_clean();
		// ob_start();
		$writer = new Xlsx($spreadsheet);
		$writer->save($file);
		
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
	exit();
	}
?>