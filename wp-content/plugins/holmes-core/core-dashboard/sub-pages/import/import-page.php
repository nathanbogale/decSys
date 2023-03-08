<?php

if ( ! function_exists( 'holmes_core_add_import_sub_page_to_list' ) ) {
	function holmes_core_add_import_sub_page_to_list( $sub_pages ) {
		$sub_pages[] = 'HolmesCoreImportPage';
		return $sub_pages;
	}
	
	add_filter( 'holmes_core_filter_add_sub_page', 'holmes_core_add_import_sub_page_to_list', 11 );
}

if ( class_exists( 'HolmesCoreSubPage' ) ) {
	class HolmesCoreImportPage extends HolmesCoreSubPage {
		
		public function __construct() {
			parent::__construct();
		}
		
		public function add_sub_page() {
			$this->set_base( 'import' );
			$this->set_title( esc_html__('Import', 'holmes-core'));
			$this->set_atts( $this->set_atributtes());
		}

		public function set_atributtes(){
			$params = array();

			$iparams = HolmesCoreDashboard::get_instance()->get_import_params();
			if(is_array($iparams) && isset($iparams['submit'])) {
				$params['submit'] = $iparams['submit'];
			}

			return $params;
		}
	}
}