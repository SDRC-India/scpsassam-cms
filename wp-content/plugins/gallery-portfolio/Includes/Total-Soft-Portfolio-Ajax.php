<?php 
	//Admin menu
	add_action( 'wp_ajax_TotalSoftPortfolio_Del', 'TotalSoftPortfolio_Del_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolio_Del', 'TotalSoftPortfolio_Del_Callback' );

	function TotalSoftPortfolio_Del_Callback()
	{
		$Portfolio_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name4 = $wpdb->prefix . "totalsoft_portfolio_manager";
		$table_name5 = $wpdb->prefix . "totalsoft_portfolio_albums";
		$table_name6 = $wpdb->prefix . "totalsoft_portfolio_images";

		$wpdb->query($wpdb->prepare("DELETE FROM $table_name4 WHERE id=%d", $Portfolio_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name5 WHERE Portfolio_ID=%s", $Portfolio_ID));
		$wpdb->query($wpdb->prepare("DELETE FROM $table_name6 WHERE Portfolio_ID=%s", $Portfolio_ID));
		die();
	}

	add_action( 'wp_ajax_TotalSoftPortfolio_Edit', 'TotalSoftPortfolio_Edit_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolio_Edit', 'TotalSoftPortfolio_Edit_Callback' );

	function TotalSoftPortfolio_Edit_Callback()
	{
		$Portfolio_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name4 = $wpdb->prefix . "totalsoft_portfolio_manager";
		$table_name5 = $wpdb->prefix . "totalsoft_portfolio_albums";
		$table_name6 = $wpdb->prefix . "totalsoft_portfolio_images";

		$Total_Soft_PortfolioManager=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%s", $Portfolio_ID));

		print_r($Total_Soft_PortfolioManager);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPortfolio_Edit_Album', 'TotalSoftPortfolio_Edit_Album_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolio_Edit_Album', 'TotalSoftPortfolio_Edit_Album_Callback' );

	function TotalSoftPortfolio_Edit_Album_Callback()
	{
		$Portfolio_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name4 = $wpdb->prefix . "totalsoft_portfolio_manager";
		$table_name5 = $wpdb->prefix . "totalsoft_portfolio_albums";
		$table_name6 = $wpdb->prefix . "totalsoft_portfolio_images";

		$Total_Soft_PortfolioAlbums=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE Portfolio_ID=%s order by id", $Portfolio_ID));

		for($i = 0; $i < count($Total_Soft_PortfolioAlbums); $i++)
		{
			$Total_Soft_PortfolioAlbums[$i]->TotalSoftPortfolio_ATitle = html_entity_decode($Total_Soft_PortfolioAlbums[$i]->TotalSoftPortfolio_ATitle);
		}
		
		print_r($Total_Soft_PortfolioAlbums);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPortfolio_Edit_Images', 'TotalSoftPortfolio_Edit_Images_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolio_Edit_Images', 'TotalSoftPortfolio_Edit_Images_Callback' );

	function TotalSoftPortfolio_Edit_Images_Callback()
	{
		$Portfolio_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;

		$table_name4 = $wpdb->prefix . "totalsoft_portfolio_manager";
		$table_name5 = $wpdb->prefix . "totalsoft_portfolio_albums";
		$table_name6 = $wpdb->prefix . "totalsoft_portfolio_images";

		$Total_Soft_PortfolioImages=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Portfolio_ID=%s order by id", $Portfolio_ID));

		for($i = 0; $i < count($Total_Soft_PortfolioImages); $i++)
		{
			$Total_Soft_PortfolioImages[$i]->TotalSoftPortfolio_IT = html_entity_decode($Total_Soft_PortfolioImages[$i]->TotalSoftPortfolio_IT);
			$Total_Soft_PortfolioImages[$i]->TotalSoftPortfolio_IDesc = html_entity_decode($Total_Soft_PortfolioImages[$i]->TotalSoftPortfolio_IDesc);
		}
		print_r($Total_Soft_PortfolioImages);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPortfolio_Clone', 'TotalSoftPortfolio_Clone_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolio_Clone', 'TotalSoftPortfolio_Clone_Callback' );

	function TotalSoftPortfolio_Clone_Callback()
	{
		$Portfolio_ID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name3 = $wpdb->prefix . "totalsoft_portfolio_id";
		$table_name4 = $wpdb->prefix . "totalsoft_portfolio_manager";
		$table_name5 = $wpdb->prefix . "totalsoft_portfolio_albums";
		$table_name6 = $wpdb->prefix . "totalsoft_portfolio_images";

		$Total_Soft_PortfolioManager = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id=%d", $Portfolio_ID));
		$Total_Soft_PortfolioAlbums = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name5 WHERE Portfolio_ID=%s order by id", $Portfolio_ID));
		$Total_Soft_PortfolioImages = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Portfolio_ID=%s order by id", $Portfolio_ID));

		$New_Portfolio_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d order by id desc limit 1",0));
		$New_Total_SoftPortID=$New_Portfolio_ID[0]->Portfolio_ID + 1;

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Portfolio_ID) VALUES (%d, %s)", '', $New_Total_SoftPortID));
		
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoftPortfolio_Title, TotalSoftPortfolio_Option, TotalSoftPortfolio_AlbumCount) VALUES (%d, %s, %s, %s)", '', $Total_Soft_PortfolioManager[0]->TotalSoftPortfolio_Title, $Total_Soft_PortfolioManager[0]->TotalSoftPortfolio_Option, $Total_Soft_PortfolioManager[0]->TotalSoftPortfolio_AlbumCount));

		for($i = 0; $i < $Total_Soft_PortfolioManager[0]->TotalSoftPortfolio_AlbumCount; $i++)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoftPortfolio_ATitle, Portfolio_ID) VALUES (%d, %s, %s)", '', $Total_Soft_PortfolioAlbums[$i]->TotalSoftPortfolio_ATitle, $New_Total_SoftPortID));
		}
		for($j = 0; $j < count($Total_Soft_PortfolioImages); $j++)
		{
			$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, TotalSoftPortfolio_IT, TotalSoftPortfolio_IA, TotalSoftPortfolio_IURL, TotalSoftPortfolio_IDesc, TotalSoftPortfolio_ILink, TotalSoftPortfolio_IONT, Portfolio_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s)", '', $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_IT, $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_IA, $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_IURL, $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_IDesc, $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_ILink, $Total_Soft_PortfolioImages[$j]->TotalSoftPortfolio_IONT, $New_Total_SoftPortID));
		}
		die();
	}
	//General Options
	add_action( 'wp_ajax_TotalSoftPortfolioOpt_Edit', 'TotalSoftPortfolioOpt_Edit_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolioOpt_Edit', 'TotalSoftPortfolioOpt_Edit_Callback' );

	function TotalSoftPortfolioOpt_Edit_Callback()
	{
		$Portfolio_OptID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name2_1 = $wpdb->prefix . "totalsoft_portfolio_dbt_1";

		$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2_1 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));

		print_r($Total_Soft_PortfolioSet);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPortfolioOpt_Edit1', 'TotalSoftPortfolioOpt_Edit1_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolioOpt_Edit1', 'TotalSoftPortfolioOpt_Edit1_Callback' );

	function TotalSoftPortfolioOpt_Edit1_Callback()
	{
		$Portfolio_OptID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name2_2 = $wpdb->prefix . "totalsoft_portfolio_dbt_2";

		$Total_Soft_PortfolioSet=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2_2 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));

		print_r($Total_Soft_PortfolioSet);
		die();
	}

	add_action( 'wp_ajax_TotalSoftPortfolioOpt_Clone', 'TotalSoftPortfolioOpt_Clone_Callback' );
	add_action( 'wp_ajax_nopriv_TotalSoftPortfolioOpt_Clone', 'TotalSoftPortfolioOpt_Clone_Callback' );

	function TotalSoftPortfolioOpt_Clone_Callback()
	{
		$Portfolio_OptID = sanitize_text_field($_POST['foobar']);
		global $wpdb;
		$table_name2  = $wpdb->prefix . "totalsoft_portfolio_dbt";
		$table_name2_1 = $wpdb->prefix . "totalsoft_portfolio_dbt_1";
		$table_name2_2 = $wpdb->prefix . "totalsoft_portfolio_dbt_2";

		$Total_Soft_PortfolioName=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id=%d", $Portfolio_OptID));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2 (id, TotalSoftPortfolio_SetName, TotalSoftPortfolio_SetType) VALUES (%d, %s, %s)", '', $Total_Soft_PortfolioName[0]->TotalSoftPortfolio_SetName, $Total_Soft_PortfolioName[0]->TotalSoftPortfolio_SetType));

		$TotalSoftPortfolio_SetNameID = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d order by id desc limit 1", 0));
		$Total_Soft_PortfolioSet1 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2_1 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));
		$Total_Soft_PortfolioSet2 = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2_2 WHERE TotalSoftPortfolio_SetID=%s", $Portfolio_OptID));

		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2_1 (id, TotalSoftPortfolio_SetID, TotalSoftPortfolio_SetName, TotalSoftPortfolio_SetType, TotalSoft_PG_1_01, TotalSoft_PG_1_02, TotalSoft_PG_1_03, TotalSoft_PG_1_04, TotalSoft_PG_1_05, TotalSoft_PG_1_06, TotalSoft_PG_1_07, TotalSoft_PG_1_08, TotalSoft_PG_1_09, TotalSoft_PG_1_10, TotalSoft_PG_1_11, TotalSoft_PG_1_12, TotalSoft_PG_1_13, TotalSoft_PG_1_14, TotalSoft_PG_1_15, TotalSoft_PG_1_16, TotalSoft_PG_1_17, TotalSoft_PG_1_18, TotalSoft_PG_1_19, TotalSoft_PG_1_20, TotalSoft_PG_1_21, TotalSoft_PG_1_22, TotalSoft_PG_1_23, TotalSoft_PG_1_24, TotalSoft_PG_1_25, TotalSoft_PG_1_26, TotalSoft_PG_1_27, TotalSoft_PG_1_28, TotalSoft_PG_1_29, TotalSoft_PG_1_30, TotalSoft_PG_1_31, TotalSoft_PG_1_32, TotalSoft_PG_1_33, TotalSoft_PG_1_34, TotalSoft_PG_1_35, TotalSoft_PG_1_36, TotalSoft_PG_1_37, TotalSoft_PG_1_38, TotalSoft_PG_1_39) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPortfolio_SetNameID[0]->id, $Total_Soft_PortfolioSet1[0]->TotalSoftPortfolio_SetName, $Total_Soft_PortfolioSet1[0]->TotalSoftPortfolio_SetType, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_01, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_02, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_03, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_04, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_05, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_06, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_07, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_08, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_09, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_10, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_11, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_12, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_13, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_14, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_15, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_16, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_17, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_18, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_19, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_20, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_21, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_22, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_23, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_24, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_25, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_26, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_27, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_28, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_29, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_30, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_31, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_32, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_33, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_34, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_35, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_36, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_37, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_38, $Total_Soft_PortfolioSet1[0]->TotalSoft_PG_1_39));
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name2_2 (id, TotalSoftPortfolio_SetID, TotalSoftPortfolio_SetName, TotalSoftPortfolio_SetType, TotalSoft_PG_2_01, TotalSoft_PG_2_02, TotalSoft_PG_2_03, TotalSoft_PG_2_04, TotalSoft_PG_2_05, TotalSoft_PG_2_06, TotalSoft_PG_2_07, TotalSoft_PG_2_08, TotalSoft_PG_2_09, TotalSoft_PG_2_10, TotalSoft_PG_2_11, TotalSoft_PG_2_12, TotalSoft_PG_2_13, TotalSoft_PG_2_14, TotalSoft_PG_2_15, TotalSoft_PG_2_16, TotalSoft_PG_2_17, TotalSoft_PG_2_18, TotalSoft_PG_2_19, TotalSoft_PG_2_20, TotalSoft_PG_2_21, TotalSoft_PG_2_22, TotalSoft_PG_2_23, TotalSoft_PG_2_24, TotalSoft_PG_2_25, TotalSoft_PG_2_26, TotalSoft_PG_2_27, TotalSoft_PG_2_28, TotalSoft_PG_2_29, TotalSoft_PG_2_30, TotalSoft_PG_2_31, TotalSoft_PG_2_32, TotalSoft_PG_2_33, TotalSoft_PG_2_34, TotalSoft_PG_2_35, TotalSoft_PG_2_36, TotalSoft_PG_2_37, TotalSoft_PG_2_38, TotalSoft_PG_2_39) VALUES (%d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPortfolio_SetNameID[0]->id, $Total_Soft_PortfolioSet2[0]->TotalSoftPortfolio_SetName, $Total_Soft_PortfolioSet2[0]->TotalSoftPortfolio_SetType, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_01, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_02, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_03, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_04, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_05, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_06, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_07, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_08, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_09, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_10, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_11, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_12, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_13, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_14, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_15, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_16, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_17, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_18, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_19, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_20, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_21, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_22, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_23, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_24, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_25, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_26, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_27, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_28, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_29, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_30, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_31, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_32, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_33, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_34, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_35, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_36, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_37, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_38, $Total_Soft_PortfolioSet2[0]->TotalSoft_PG_2_39));
		die();
	}
?>