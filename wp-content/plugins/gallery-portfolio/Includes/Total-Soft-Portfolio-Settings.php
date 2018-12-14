<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	require_once(dirname(__FILE__) . '/Total-Soft-Portfolio-Install.php');
	global $wpdb;

	$table_name   = $wpdb->prefix . "totalsoft_fonts";
	$table_name2  = $wpdb->prefix . "totalsoft_portfolio_dbt";
	$table_name2_1 = $wpdb->prefix . "totalsoft_portfolio_dbt_1";
	$table_name2_2 = $wpdb->prefix . "totalsoft_portfolio_dbt_2";

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(check_admin_referer( 'edit-menu_'.$comment_id, 'TS_Portfolio_Nonce' ))
		{
			$TotalSoftPortfolio_SetName = sanitize_text_field($_POST['TotalSoftPortfolio_SetName']); $TotalSoftPortfolio_SetType = sanitize_text_field($_POST['TotalSoftPortfolio_SetType']);
			//Total Soft Portfolio
			$TotalSoft_PG_TG_01 = sanitize_text_field($_POST['TotalSoft_PG_TG_01']); $TotalSoft_PG_TG_03 = sanitize_text_field($_POST['TotalSoft_PG_TG_03']); $TotalSoft_PG_TG_04 = sanitize_text_field($_POST['TotalSoft_PG_TG_04']); $TotalSoft_PG_TG_05 = sanitize_text_field($_POST['TotalSoft_PG_TG_05']); $TotalSoft_PG_TG_06 = sanitize_text_field($_POST['TotalSoft_PG_TG_06']); $TotalSoft_PG_TG_07 = sanitize_text_field($_POST['TotalSoft_PG_TG_07']); $TotalSoft_PG_TG_08 = sanitize_text_field($_POST['TotalSoft_PG_TG_08']);
			//Elastic Grid
			$TotalSoft_PG_EG_01 = sanitize_text_field($_POST['TotalSoft_PG_EG_01']); $TotalSoft_PG_EG_02 = sanitize_text_field($_POST['TotalSoft_PG_EG_02']); $TotalSoft_PG_EG_04 = sanitize_text_field($_POST['TotalSoft_PG_EG_04']); $TotalSoft_PG_EG_14 = sanitize_text_field($_POST['TotalSoft_PG_EG_14']); $TotalSoft_PG_EG_15 = sanitize_text_field($_POST['TotalSoft_PG_EG_15']); $TotalSoft_PG_EG_18 = sanitize_text_field($_POST['TotalSoft_PG_EG_18']); $TotalSoft_PG_EG_19 = sanitize_text_field($_POST['TotalSoft_PG_EG_19']); $TotalSoft_PG_EG_20 = sanitize_text_field($_POST['TotalSoft_PG_EG_20']); $TotalSoft_PG_EG_21 = sanitize_text_field($_POST['TotalSoft_PG_EG_21']); $TotalSoft_PG_EG_22 = sanitize_text_field($_POST['TotalSoft_PG_EG_22']); $TotalSoft_PG_EG_27 = sanitize_text_field($_POST['TotalSoft_PG_EG_27']); $TotalSoft_PG_EG_28 = sanitize_text_field($_POST['TotalSoft_PG_EG_28']); $TotalSoft_PG_EG_34 = sanitize_text_field($_POST['TotalSoft_PG_EG_34']); $TotalSoft_PG_EG_35 = sanitize_text_field($_POST['TotalSoft_PG_EG_35']); $TotalSoft_PG_EG_38 = sanitize_text_field($_POST['TotalSoft_PG_EG_38']); $TotalSoft_PG_EG_39 = sanitize_text_field($_POST['TotalSoft_PG_EG_39']); $TotalSoft_PG_EG_56 = sanitize_text_field($_POST['TotalSoft_PG_EG_56']); $TotalSoft_PG_EG_60 = sanitize_text_field($_POST['TotalSoft_PG_EG_60']); $TotalSoft_PG_EG_64 = sanitize_text_field($_POST['TotalSoft_PG_EG_64']);
			if($TotalSoft_PG_EG_02 == 'on'){ $TotalSoft_PG_EG_02 = 'true'; }else{ $TotalSoft_PG_EG_02 = 'false'; }
			if($TotalSoft_PG_EG_04 == 'on'){ $TotalSoft_PG_EG_04 = 'true'; }else{ $TotalSoft_PG_EG_04 = 'false'; }
			//Filterable Grid
			$TotalSoft_PG_FG_01 = sanitize_text_field($_POST['TotalSoft_PG_FG_01']); $TotalSoft_PG_FG_02 = sanitize_text_field($_POST['TotalSoft_PG_FG_02']); $TotalSoft_PG_FG_03 = sanitize_text_field($_POST['TotalSoft_PG_FG_03']); $TotalSoft_PG_FG_04 = sanitize_text_field($_POST['TotalSoft_PG_FG_04']); $TotalSoft_PG_FG_05 = sanitize_text_field($_POST['TotalSoft_PG_FG_05']); $TotalSoft_PG_FG_11 = sanitize_text_field($_POST['TotalSoft_PG_FG_11']); $TotalSoft_PG_FG_12 = sanitize_text_field($_POST['TotalSoft_PG_FG_12']); $TotalSoft_PG_FG_16 = sanitize_text_field($_POST['TotalSoft_PG_FG_16']); $TotalSoft_PG_FG_17 = sanitize_text_field($_POST['TotalSoft_PG_FG_17']); $TotalSoft_PG_FG_19 = sanitize_text_field($_POST['TotalSoft_PG_FG_19']); $TotalSoft_PG_FG_20 = sanitize_text_field($_POST['TotalSoft_PG_FG_20']); $TotalSoft_PG_FG_21 = sanitize_text_field($_POST['TotalSoft_PG_FG_21']); $TotalSoft_PG_FG_22 = sanitize_text_field($_POST['TotalSoft_PG_FG_22']); $TotalSoft_PG_FG_41 = sanitize_text_field($_POST['TotalSoft_PG_FG_41']); $TotalSoft_PG_FG_55 = sanitize_text_field($_POST['TotalSoft_PG_FG_55']); $TotalSoft_PG_FG_57 = sanitize_text_field($_POST['TotalSoft_PG_FG_57']); $TotalSoft_PG_FG_62 = sanitize_text_field($_POST['TotalSoft_PG_FG_62']); $TotalSoft_PG_FG_64 = sanitize_text_field($_POST['TotalSoft_PG_FG_64']); $TotalSoft_PG_FG_69 = sanitize_text_field($_POST['TotalSoft_PG_FG_69']); $TotalSoft_PG_FG_71 = sanitize_text_field($_POST['TotalSoft_PG_FG_71']); $TotalSoft_PG_FG_72 = sanitize_text_field($_POST['TotalSoft_PG_FG_72']);
			if($TotalSoft_PG_FG_05 == 'on'){ $TotalSoft_PG_FG_05 = 'true'; }else{ $TotalSoft_PG_FG_05 = 'false'; }
			//Content Popup
			$TotalSoft_PG_CP_01 = sanitize_text_field($_POST['TotalSoft_PG_CP_01']); $TotalSoft_PG_CP_02 = sanitize_text_field($_POST['TotalSoft_PG_CP_02']); $TotalSoft_PG_CP_03 = sanitize_text_field($_POST['TotalSoft_PG_CP_03']); $TotalSoft_PG_CP_04 = sanitize_text_field($_POST['TotalSoft_PG_CP_04']); $TotalSoft_PG_CP_05 = sanitize_text_field($_POST['TotalSoft_PG_CP_05']); $TotalSoft_PG_CP_15 = sanitize_text_field($_POST['TotalSoft_PG_CP_15']); $TotalSoft_PG_CP_19 = sanitize_text_field($_POST['TotalSoft_PG_CP_19']); $TotalSoft_PG_CP_20 = sanitize_text_field($_POST['TotalSoft_PG_CP_20']); $TotalSoft_PG_CP_21 = sanitize_text_field($_POST['TotalSoft_PG_CP_21']); $TotalSoft_PG_CP_22 = sanitize_text_field($_POST['TotalSoft_PG_CP_22']); $TotalSoft_PG_CP_23 = sanitize_text_field($_POST['TotalSoft_PG_CP_23']); $TotalSoft_PG_CP_24 = sanitize_text_field($_POST['TotalSoft_PG_CP_24']); $TotalSoft_PG_CP_25 = sanitize_text_field($_POST['TotalSoft_PG_CP_25']); $TotalSoft_PG_CP_27 = sanitize_text_field($_POST['TotalSoft_PG_CP_27']); $TotalSoft_PG_CP_28 = sanitize_text_field($_POST['TotalSoft_PG_CP_28']); $TotalSoft_PG_CP_29 = sanitize_text_field($_POST['TotalSoft_PG_CP_29']); $TotalSoft_PG_CP_30 = sanitize_text_field($_POST['TotalSoft_PG_CP_30']); $TotalSoft_PG_CP_33 = sanitize_text_field($_POST['TotalSoft_PG_CP_33']); $TotalSoft_PG_CP_38 = sanitize_text_field($_POST['TotalSoft_PG_CP_38']); $TotalSoft_PG_CP_41 = sanitize_text_field($_POST['TotalSoft_PG_CP_41']); $TotalSoft_PG_CP_42 = sanitize_text_field($_POST['TotalSoft_PG_CP_42']); $TotalSoft_PG_CP_45 = sanitize_text_field($_POST['TotalSoft_PG_CP_45']); $TotalSoft_PG_CP_48 = sanitize_text_field($_POST['TotalSoft_PG_CP_48']); $TotalSoft_PG_CP_51 = sanitize_text_field($_POST['TotalSoft_PG_CP_51']); $TotalSoft_PG_CP_53 = sanitize_text_field($_POST['TotalSoft_PG_CP_53']); $TotalSoft_PG_CP_55 = sanitize_text_field($_POST['TotalSoft_PG_CP_55']); $TotalSoft_PG_CP_57 = sanitize_text_field($_POST['TotalSoft_PG_CP_57']); $TotalSoft_PG_CP_58 = sanitize_text_field($_POST['TotalSoft_PG_CP_58']); $TotalSoft_PG_CP_64 = sanitize_text_field($_POST['TotalSoft_PG_CP_64']); $TotalSoft_PG_CP_65 = sanitize_text_field($_POST['TotalSoft_PG_CP_65']);
			if($TotalSoft_PG_CP_57 == 'on'){ $TotalSoft_PG_CP_57 = 'true'; }else{ $TotalSoft_PG_CP_57 = 'false'; }
			//Slider Portfolio
			$TotalSoft_PG_SP_03 = sanitize_text_field($_POST['TotalSoft_PG_SP_03']); $TotalSoft_PG_SP_04 = sanitize_text_field($_POST['TotalSoft_PG_SP_04']); $TotalSoft_PG_SP_05 = sanitize_text_field($_POST['TotalSoft_PG_SP_05']); $TotalSoft_PG_SP_06 = sanitize_text_field($_POST['TotalSoft_PG_SP_06']); $TotalSoft_PG_SP_07 = sanitize_text_field($_POST['TotalSoft_PG_SP_07']); $TotalSoft_PG_SP_08 = sanitize_text_field($_POST['TotalSoft_PG_SP_08']); $TotalSoft_PG_SP_16 = sanitize_text_field($_POST['TotalSoft_PG_SP_16']); $TotalSoft_PG_SP_17 = sanitize_text_field($_POST['TotalSoft_PG_SP_17']); $TotalSoft_PG_SP_24 = sanitize_text_field($_POST['TotalSoft_PG_SP_24']); $TotalSoft_PG_SP_25 = sanitize_text_field($_POST['TotalSoft_PG_SP_25']); $TotalSoft_PG_SP_28 = sanitize_text_field($_POST['TotalSoft_PG_SP_28']); $TotalSoft_PG_SP_29 = sanitize_text_field($_POST['TotalSoft_PG_SP_29']); $TotalSoft_PG_SP_32 = sanitize_text_field($_POST['TotalSoft_PG_SP_32']); $TotalSoft_PG_SP_33 = sanitize_text_field($_POST['TotalSoft_PG_SP_33']); $TotalSoft_PG_SP_34 = sanitize_text_field($_POST['TotalSoft_PG_SP_34']);
			if($TotalSoft_PG_SP_24 == 'on'){ $TotalSoft_PG_SP_24 = 'true'; }else{ $TotalSoft_PG_SP_24 = 'false'; }
			// Gallery Album Animation
			$TotalSoft_PG_GA_03 = sanitize_text_field($_POST['TotalSoft_PG_GA_03']); $TotalSoft_PG_GA_05 = sanitize_text_field($_POST['TotalSoft_PG_GA_05']); $TotalSoft_PG_GA_06 = sanitize_text_field($_POST['TotalSoft_PG_GA_06']); $TotalSoft_PG_GA_07 = sanitize_text_field($_POST['TotalSoft_PG_GA_07']); $TotalSoft_PG_GA_08 = sanitize_text_field($_POST['TotalSoft_PG_GA_08']); $TotalSoft_PG_GA_09 = sanitize_text_field($_POST['TotalSoft_PG_GA_09']); $TotalSoft_PG_GA_11 = sanitize_text_field($_POST['TotalSoft_PG_GA_11']); $TotalSoft_PG_GA_13 = sanitize_text_field($_POST['TotalSoft_PG_GA_13']); $TotalSoft_PG_GA_15 = sanitize_text_field($_POST['TotalSoft_PG_GA_15']); $TotalSoft_PG_GA_21 = sanitize_text_field($_POST['TotalSoft_PG_GA_21']); $TotalSoft_PG_GA_29 = sanitize_text_field($_POST['TotalSoft_PG_GA_29']); $TotalSoft_PG_GA_36 = sanitize_text_field($_POST['TotalSoft_PG_GA_36']);
			if($TotalSoft_PG_GA_03 == 'on'){ $TotalSoft_PG_GA_03 = 'true'; }else{ $TotalSoft_PG_GA_03 = 'false'; }
			if($TotalSoft_PG_GA_08 == 'on'){ $TotalSoft_PG_GA_08 = 'true'; }else{ $TotalSoft_PG_GA_08 = 'false'; }
			if($TotalSoft_PG_GA_13 == 'on'){ $TotalSoft_PG_GA_13 = 'true'; }else{ $TotalSoft_PG_GA_13 = 'false'; }
			// Portfolio / Hover Effects
			$TotalSoft_PG_PH_01 = sanitize_text_field($_POST['TotalSoft_PG_PH_01']); $TotalSoft_PG_PH_02 = sanitize_text_field($_POST['TotalSoft_PG_PH_02']); $TotalSoft_PG_PH_03 = sanitize_text_field($_POST['TotalSoft_PG_PH_03']); $TotalSoft_PG_PH_07 = sanitize_text_field($_POST['TotalSoft_PG_PH_07']); $TotalSoft_PG_PH_14 = sanitize_text_field($_POST['TotalSoft_PG_PH_14']); $TotalSoft_PG_PH_21 = sanitize_text_field($_POST['TotalSoft_PG_PH_21']); $TotalSoft_PG_PH_22 = sanitize_text_field($_POST['TotalSoft_PG_PH_22']); $TotalSoft_PG_PH_33 = sanitize_text_field($_POST['TotalSoft_PG_PH_33']); $TotalSoft_PG_PH_35 = sanitize_text_field($_POST['TotalSoft_PG_PH_35']); $TotalSoft_PG_PH_36 = sanitize_text_field($_POST['TotalSoft_PG_PH_36']); $TotalSoft_PG_PH_37 = sanitize_text_field($_POST['TotalSoft_PG_PH_37']); $TotalSoft_PG_PH_43 = sanitize_text_field($_POST['TotalSoft_PG_PH_43']); $TotalSoft_PG_PH_45 = sanitize_text_field($_POST['TotalSoft_PG_PH_45']); $TotalSoft_PG_PH_46 = sanitize_text_field($_POST['TotalSoft_PG_PH_46']);
			if($TotalSoft_PG_PH_02 == 'on'){ $TotalSoft_PG_PH_02 = 'true'; }else{ $TotalSoft_PG_PH_02 = 'false'; }
			if($TotalSoft_PG_PH_33 == 'on'){ $TotalSoft_PG_PH_33 = 'true'; }else{ $TotalSoft_PG_PH_33 = 'false'; }

			if(isset($_POST['Total_Soft_Portfolio_Update_Option']))
			{
				$Total_SoftPortfolio_Update=sanitize_text_field($_POST['Total_SoftPortfolio_Update']);

				$wpdb->query($wpdb->prepare("UPDATE $table_name2 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s WHERE id = %d", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $Total_SoftPortfolio_Update));

				if($TotalSoftPortfolio_SetType=='Total Soft Portfolio')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name2_1 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_PG_1_01 = %s, TotalSoft_PG_1_03 = %s, TotalSoft_PG_1_04 = %s, TotalSoft_PG_1_05 = %s, TotalSoft_PG_1_06 = %s, TotalSoft_PG_1_07 = %s, TotalSoft_PG_1_08 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_PG_TG_01, $TotalSoft_PG_TG_03, $TotalSoft_PG_TG_04, $TotalSoft_PG_TG_05, $TotalSoft_PG_TG_06, $TotalSoft_PG_TG_07, $TotalSoft_PG_TG_08, $Total_SoftPortfolio_Update));
				}
				else if($TotalSoftPortfolio_SetType=='Elastic Grid')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name2_1 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_PG_1_01 = %s, TotalSoft_PG_1_02 = %s, TotalSoft_PG_1_04 = %s, TotalSoft_PG_1_14 = %s, TotalSoft_PG_1_15 = %s, TotalSoft_PG_1_18 = %s, TotalSoft_PG_1_19 = %s, TotalSoft_PG_1_20 = %s, TotalSoft_PG_1_21 = %s, TotalSoft_PG_1_22 = %s, TotalSoft_PG_1_27 = %s, TotalSoft_PG_1_28 = %s, TotalSoft_PG_1_34 = %s, TotalSoft_PG_1_35 = %s, TotalSoft_PG_1_38 = %s, TotalSoft_PG_1_39 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_PG_EG_01, $TotalSoft_PG_EG_02, $TotalSoft_PG_EG_04, $TotalSoft_PG_EG_14, $TotalSoft_PG_EG_15, $TotalSoft_PG_EG_18, $TotalSoft_PG_EG_19, $TotalSoft_PG_EG_20, $TotalSoft_PG_EG_21, $TotalSoft_PG_EG_22, $TotalSoft_PG_EG_27, $TotalSoft_PG_EG_28, $TotalSoft_PG_EG_34, $TotalSoft_PG_EG_35, $TotalSoft_PG_EG_38, $TotalSoft_PG_EG_39, $Total_SoftPortfolio_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name2_2 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_PG_2_17 = %s, TotalSoft_PG_2_21 = %s, TotalSoft_PG_2_25 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_PG_EG_56, $TotalSoft_PG_EG_60, $TotalSoft_PG_EG_64, $Total_SoftPortfolio_Update));
				}
				else if($TotalSoftPortfolio_SetType=='Filterable Grid')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name2_1 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_PG_1_01 = %s, TotalSoft_PG_1_02 = %s, TotalSoft_PG_1_03 = %s, TotalSoft_PG_1_04 = %s, TotalSoft_PG_1_05 = %s, TotalSoft_PG_1_11 = %s, TotalSoft_PG_1_12 = %s, TotalSoft_PG_1_16 = %s, TotalSoft_PG_1_17 = %s, TotalSoft_PG_1_19 = %s, TotalSoft_PG_1_20 = %s, TotalSoft_PG_1_21 = %s, TotalSoft_PG_1_22 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_PG_FG_01, $TotalSoft_PG_FG_02, $TotalSoft_PG_FG_03, $TotalSoft_PG_FG_04, $TotalSoft_PG_FG_05, $TotalSoft_PG_FG_11, $TotalSoft_PG_FG_12, $TotalSoft_PG_FG_16, $TotalSoft_PG_FG_17, $TotalSoft_PG_FG_19, $TotalSoft_PG_FG_20, $TotalSoft_PG_FG_21, $TotalSoft_PG_FG_22, $Total_SoftPortfolio_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name2_2 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_PG_2_02 = %s, TotalSoft_PG_2_16 = %s, TotalSoft_PG_2_18 = %s, TotalSoft_PG_2_23 = %s, TotalSoft_PG_2_25 = %s, TotalSoft_PG_2_30 = %s, TotalSoft_PG_2_32 = %s, TotalSoft_PG_2_33 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_PG_FG_41, $TotalSoft_PG_FG_55, $TotalSoft_PG_FG_57, $TotalSoft_PG_FG_62, $TotalSoft_PG_FG_64, $TotalSoft_PG_FG_69, $TotalSoft_PG_FG_71, $TotalSoft_PG_FG_72, $Total_SoftPortfolio_Update));
				}
				else if($TotalSoftPortfolio_SetType=='Gallery Portfolio/Content Popup')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name2_1 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_PG_1_01 = %s, TotalSoft_PG_1_02 = %s, TotalSoft_PG_1_03 = %s, TotalSoft_PG_1_04 = %s, TotalSoft_PG_1_05 = %s, TotalSoft_PG_1_15 = %s, TotalSoft_PG_1_19 = %s, TotalSoft_PG_1_20 = %s, TotalSoft_PG_1_21 = %s, TotalSoft_PG_1_22 = %s, TotalSoft_PG_1_23 = %s, TotalSoft_PG_1_24 = %s, TotalSoft_PG_1_25 = %s, TotalSoft_PG_1_27 = %s, TotalSoft_PG_1_28 = %s, TotalSoft_PG_1_29 = %s, TotalSoft_PG_1_30 = %s, TotalSoft_PG_1_33 = %s, TotalSoft_PG_1_38 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_PG_CP_01, $TotalSoft_PG_CP_02, $TotalSoft_PG_CP_03, $TotalSoft_PG_CP_04, $TotalSoft_PG_CP_05, $TotalSoft_PG_CP_15, $TotalSoft_PG_CP_19, $TotalSoft_PG_CP_20, $TotalSoft_PG_CP_21, $TotalSoft_PG_CP_22, $TotalSoft_PG_CP_23, $TotalSoft_PG_CP_24, $TotalSoft_PG_CP_25, $TotalSoft_PG_CP_27, $TotalSoft_PG_CP_28, $TotalSoft_PG_CP_29, $TotalSoft_PG_CP_30, $TotalSoft_PG_CP_33, $TotalSoft_PG_CP_38, $Total_SoftPortfolio_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name2_2 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_PG_2_02 = %s, TotalSoft_PG_2_03 = %s, TotalSoft_PG_2_06 = %s, TotalSoft_PG_2_09 = %s, TotalSoft_PG_2_12 = %s, TotalSoft_PG_2_14 = %s, TotalSoft_PG_2_16 = %s, TotalSoft_PG_2_18 = %s, TotalSoft_PG_2_19 = %s, TotalSoft_PG_2_25 = %s, TotalSoft_PG_2_26 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_PG_CP_41, $TotalSoft_PG_CP_42, $TotalSoft_PG_CP_45, $TotalSoft_PG_CP_48, $TotalSoft_PG_CP_51, $TotalSoft_PG_CP_53, $TotalSoft_PG_CP_55, $TotalSoft_PG_CP_57, $TotalSoft_PG_CP_58, $TotalSoft_PG_CP_64, $TotalSoft_PG_CP_65, $Total_SoftPortfolio_Update));
				}
				else if($TotalSoftPortfolio_SetType=='Slider Portfolio')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name2_1 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_PG_1_03 = %s, TotalSoft_PG_1_04 = %s, TotalSoft_PG_1_05 = %s, TotalSoft_PG_1_06 = %s, TotalSoft_PG_1_07 = %s, TotalSoft_PG_1_08 = %s, TotalSoft_PG_1_16 = %s, TotalSoft_PG_1_17 = %s, TotalSoft_PG_1_24 = %s, TotalSoft_PG_1_25 = %s, TotalSoft_PG_1_28 = %s, TotalSoft_PG_1_29 = %s, TotalSoft_PG_1_32 = %s, TotalSoft_PG_1_33 = %s, TotalSoft_PG_1_34 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_PG_SP_03, $TotalSoft_PG_SP_04, $TotalSoft_PG_SP_05, $TotalSoft_PG_SP_06, $TotalSoft_PG_SP_07, $TotalSoft_PG_SP_08, $TotalSoft_PG_SP_16, $TotalSoft_PG_SP_17, $TotalSoft_PG_SP_24, $TotalSoft_PG_SP_25, $TotalSoft_PG_SP_28, $TotalSoft_PG_SP_29, $TotalSoft_PG_SP_32, $TotalSoft_PG_SP_33, $TotalSoft_PG_SP_34, $Total_SoftPortfolio_Update));
				}
				else if($TotalSoftPortfolio_SetType=='Gallery Album Animation')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name2_1 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_PG_1_03 = %s, TotalSoft_PG_1_05 = %s, TotalSoft_PG_1_06 = %s, TotalSoft_PG_1_07 = %s, TotalSoft_PG_1_08 = %s, TotalSoft_PG_1_09 = %s, TotalSoft_PG_1_11 = %s, TotalSoft_PG_1_13 = %s, TotalSoft_PG_1_15 = %s, TotalSoft_PG_1_21 = %s, TotalSoft_PG_1_29 = %s, TotalSoft_PG_1_36 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_PG_GA_03, $TotalSoft_PG_GA_05, $TotalSoft_PG_GA_06, $TotalSoft_PG_GA_07, $TotalSoft_PG_GA_08, $TotalSoft_PG_GA_09, $TotalSoft_PG_GA_11, $TotalSoft_PG_GA_13, $TotalSoft_PG_GA_15, $TotalSoft_PG_GA_21, $TotalSoft_PG_GA_29, $TotalSoft_PG_GA_36, $Total_SoftPortfolio_Update));
				}
				else if($TotalSoftPortfolio_SetType=='Portfolio / Hover Effects')
				{
					$wpdb->query($wpdb->prepare("UPDATE $table_name2_1 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_PG_1_01 = %s, TotalSoft_PG_1_02 = %s, TotalSoft_PG_1_03 = %s, TotalSoft_PG_1_07 = %s, TotalSoft_PG_1_14 = %s, TotalSoft_PG_1_21 = %s, TotalSoft_PG_1_22 = %s, TotalSoft_PG_1_33 = %s, TotalSoft_PG_1_35 = %s, TotalSoft_PG_1_36 = %s, TotalSoft_PG_1_37 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_PG_PH_01, $TotalSoft_PG_PH_02, $TotalSoft_PG_PH_03, $TotalSoft_PG_PH_07, $TotalSoft_PG_PH_14, $TotalSoft_PG_PH_21, $TotalSoft_PG_PH_22, $TotalSoft_PG_PH_33, $TotalSoft_PG_PH_35, $TotalSoft_PG_PH_36, $TotalSoft_PG_PH_37, $Total_SoftPortfolio_Update));
					$wpdb->query($wpdb->prepare("UPDATE $table_name2_2 set TotalSoftPortfolio_SetName = %s, TotalSoftPortfolio_SetType = %s, TotalSoft_PG_2_04 = %s, TotalSoft_PG_2_06 = %s, TotalSoft_PG_2_07 = %s WHERE TotalSoftPortfolio_SetID = %s", $TotalSoftPortfolio_SetName, $TotalSoftPortfolio_SetType, $TotalSoft_PG_PH_43, $TotalSoft_PG_PH_45, $TotalSoft_PG_PH_46, $Total_SoftPortfolio_Update));
				}
			}
		}
	    else
	    {
	        wp_die('Security check fail'); 
	    }
	}			

	$TotalSoft_PG_O = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d", 0));
	$TotalSoftFontCount = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id>%d", 0));
?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
<form method="POST" oninput="TotalSoft_Portfolio_Out()">
	<?php wp_nonce_field( 'edit-menu_'.$comment_id, 'TS_Portfolio_Nonce' );?>
	<div class="Total_Soft_Portfolio_AMD">
		<a href="http://total-soft.pe.hu/gallery-portfolio/" target="_blank" title="Click to Buy">
			<div class="Full_Version"><i class="totalsoft totalsoft-cart-arrow-down"></i>Get The Full Version</div>
		</a>
		<div class="Full_Version_Span">
			This is the free version of the plugin.
		</div>
		<div class="Support_Span">
			<a href="https://wordpress.org/support/plugin/gallery-portfolio/" target="_blank" title="Click Here to Ask">
				<i class="totalsoft totalsoft-comments-o"></i><span style="margin-left:5px;">If you have any questions click here to ask it to our support.</span>
			</a>
		</div>
		<div class="Total_Soft_Portfolio_AMD1"></div>
		<div class="Total_Soft_Portfolio_AMD2">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Creating New Portfolio Setting"></i>
			<input type="button" name="" value="New Option (Pro)" class="Total_Soft_Portfolio_AMD2_But" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()">
		</div>
		<div class="Total_Soft_Portfolio_AMD3">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Canceling"></i>
			<input type="button" value="Cancel" class="Total_Soft_Portfolio_AMD2_But" onclick='TotalSoft_Reload()'>
			<i class="Total_Soft_Portfolio_Update_Option Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Updating Settings"></i>
			<input type="submit" name="Total_Soft_Portfolio_Update_Option" value="Update" class="Total_Soft_Portfolio_Update_Option Total_Soft_Portfolio_AMD2_But">
			<input type="text" style="display:none" name="Total_SoftPortfolio_Update" id="Total_SoftPortfolio_Update">
		</div>
	</div>
	<table class="Total_Soft_PortfolioTMMTable">
		<tr class="Total_Soft_PortfolioTMMTableFR">
			<td>No</td>
			<td>Setting Title</td>
			<td>Portfolio Type</td>
			<td>Actions</td>
		</tr>
	</table>

	<table class="Total_Soft_PortfolioTMOTable">
	 	<?php for($i=0;$i<count($TotalSoft_PG_O);$i++){ ?> 
	 		<tr id="Total_Soft_PortfolioTMOTable_tr_<?php echo $TotalSoft_PG_O[$i]->id;?>">
				<td><?php echo $i+1;?></td>
				<td><?php echo $TotalSoft_PG_O[$i]->TotalSoftPortfolio_SetName;?></td>
				<td><?php echo $TotalSoft_PG_O[$i]->TotalSoftPortfolio_SetType;?></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftPortfolio_Clone_Option(<?php echo $TotalSoft_PG_O[$i]->id;?>)"></i></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftPortfolio_Edit_Option(<?php echo $TotalSoft_PG_O[$i]->id;?>)"></i></td>
				<td>
					<i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftPortfolio_Del_Option(<?php echo $TotalSoft_PG_O[$i]->id;?>)"></i>
					<span class="Total_Soft_Portfolio_Del_Span">
						<i class="Total_Soft_Portfolio_Del_Span_Yes totalsoft totalsoft-check" onclick="Total_Soft_Portfolio_Opt_AMD2_But1()"></i>
						<i class="Total_Soft_Portfolio_Del_Span_No totalsoft totalsoft-times" onclick="TotalSoftPortfolio_Del_Opt_No(<?php echo $TotalSoft_PG_O[$i]->id;?>)"></i>
					</span>
				</td>
			</tr>
	 	<?php }?>
	</table>
	<table class="Total_Soft_AMSet_Table">
		<tr>
			<td>Setting Title <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write your Portfolio’s name."></i></td>
			<td>
				<input type="text" name="TotalSoftPortfolio_SetName" id="TotalSoftPortfolio_SetName" class="Total_Soft_Select" required placeholder=" * Required">
			</td>
			<td>Portfolio Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the one from this options."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftPortfolio_SetType" id="TotalSoftPortfolio_SetType">
					<option value="Total Soft Portfolio">            Total Soft Portfolio            </option>
					<option value="Elastic Grid">                    Elastic Grid                    </option>
					<option value="Filterable Grid">                 Filterable Grid                 </option>
					<option value="Gallery Portfolio/Content Popup"> Gallery Portfolio/Content Popup </option>
					<option value="Slider Portfolio">                Slider Portfolio                </option>
					<option value="Gallery Album Animation">         Gallery Album Animation         </option>
					<option value="Portfolio / Hover Effects">       Portfolio / Hover Effects       </option>
				</select>
			</td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_1">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Container Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the size of the main Portfolio Gallery, where placed your all photos."></i></td>
			<td>			
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_TG_01" id="TotalSoft_PG_TG_01" min="400" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_TG_01_Output" for="TotalSoft_PG_TG_01"></output>
			</td>
			<td>Background Image <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background image for the gallery, also your portfolio can be without a background image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_TG_02">
					<option value="">          No Background </option>
					<option value="bg_1.png">  Background 1  </option>
					<option value="bg_2.png">  Background 2  </option>
					<option value="bg_3.png">  Background 3  </option>
					<option value="bg_4.png">  Background 4  </option>
					<option value="bg_5.png">  Background 5  </option>
					<option value="bg_6.png">  Background 6  </option>
					<option value="bg_7.png">  Background 7  </option>
					<option value="bg_8.png">  Background 8  </option>
					<option value="bg_9.png">  Background 9  </option>
					<option value="bg_10.png"> Background 10 </option>
					<option value="bg_11.png"> Background 11 </option>
					<option value="bg_12.png"> Background 12 </option>
				</select>
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Image Options</td>			
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image and it is all responsive in portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_TG_03" id="TotalSoft_PG_TG_03" min="400" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_TG_03_Output" for="TotalSoft_PG_TG_03"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preffered height of the image and it is all responsive in portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_TG_04" id="TotalSoft_PG_TG_04" min="400" max="1200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_TG_04_Output" for="TotalSoft_PG_TG_04"></output>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the borders of individual images."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_TG_05" id="TotalSoft_PG_TG_05" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_TG_05_Output" for="TotalSoft_PG_TG_05"></output>
			</td>
			<td>Border Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the frame style for image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_TG_06" id="TotalSoft_PG_TG_06">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the border color."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_TG_07" id="TotalSoft_PG_TG_07" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border radius of the image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangeper" name="TotalSoft_PG_TG_08" id="TotalSoft_PG_TG_08" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_TG_08_Output" for="TotalSoft_PG_TG_08"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Navigation Options</td>			
		</tr>
		<tr>
			<td>Size <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the size of navigation in the gallery of the portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_TG_09" min="5" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_TG_09_Output" for="TotalSoft_PG_TG_09"></output>
			</td>
			<td>Radius <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the radius borders for navigation."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_TG_10" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_TG_10_Output" for="TotalSoft_PG_TG_10"></output>
			</td>			
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the general navigation."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_TG_11" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Current Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for current navigation at the main gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_TG_12" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a moving navigation color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_TG_13" class="Total_Soft_Port_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Options</td>			
		</tr>
		<tr>
			<td>Choose Icon <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose the right and left icons, which will change the photos in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_TG_14">
					<option value="1">  Angle Double   </option>
					<option value="2">  Angle          </option>
					<option value="3">  Arrow Circle   </option>
					<option value="4">  Arrow Circle O </option>
					<option value="5">  Arrow          </option>
					<option value="6">  Caret          </option>
					<option value="7">  Caret Square O </option>
					<option value="8">  Chevron Circle </option>
					<option value="9">  Chevron        </option>
					<option value="10"> Hand O         </option>
					<option value="11"> Long Arrow     </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color, which is designed to change the images."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_TG_15" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Size <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select that size, which would be more relevant for portfolio. It is responsive too."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_TG_16" min="8" max="70" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_TG_16_Output" for="TotalSoft_PG_TG_16"></output>
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_2">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Text to Show All <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write name that will be appear in the line of menu bar. Here will be included all albums."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_EG_01" id="TotalSoft_PG_EG_01" class="Total_Soft_Select" placeholder=" * Required" value="">
			</td>
			<td>Show Menu <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu should appear or not by Yes or No via buttons."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_EG_02" name="TotalSoft_PG_EG_02">
		            <label for="TotalSoft_PG_EG_02" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Filter Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the Effect , which should be applied by images to changing albums or by clicking on the images to see the description."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_EG_03">
					<option value="popup">           Popup           </option>
					<option value="moveup">          Moveup          </option>
					<option value="scaleup">         Scaleup         </option>
					<option value="fallperspective"> Fallperspective </option>
					<option value="fly">             Fly             </option>
					<option value="flip">            Flip            </option>
					<option value="helix">           Helix           </option>
				</select>
			</td>
			<td>Hover Effect <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select there is a need to Hover Effect or not."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_EG_04" name="TotalSoft_PG_EG_04">
		            <label for="TotalSoft_PG_EG_04" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Hover Delay <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="The next step is to create a delay function when you hold the mouse on the picture."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_EG_05" min="0" max="10" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_05_Output" for="TotalSoft_PG_EG_05"></output>
			</td>
			<td>Hover Inverse <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Mark gallery hover effect appear on the reverse side or not."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_EG_06" name="">
		            <label for="TotalSoft_PG_EG_06" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Expanding Speed <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the speed when clicking on the picture will open the lightbox."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_EG_07" min="0" max="10" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_07_Output" for="TotalSoft_PG_EG_07"></output>
			</td>
			<td>Expanding Height <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the height of Lightbox."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_EG_08" min="200" max="900" step="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_08_Output" for="TotalSoft_PG_EG_08"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Navigation Menu Options</td>			
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Identify gallery portfolio’s main menu background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_09" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Current Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu background color for gallery navigation, which all the categories displayed in the main menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_10" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Current Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu text color for gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_11" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color for navigation menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_12" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the menu font color. When Portfolio separated with options."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_13" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine your preferred font size for menu."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_EG_14" id="TotalSoft_PG_EG_14" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_14_Output" for="TotalSoft_PG_EG_14"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="For the menu text choose the font family."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_EG_15" id="TotalSoft_PG_EG_15">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for hover."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_16" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu font color when the portfolio is separated by categories."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_17" class="Total_Soft_Port_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line After Menu</td>			
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Show dividing line. Select the width which divides the menu title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_EG_18" id="TotalSoft_PG_EG_18" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_18_Output" for="TotalSoft_PG_EG_18"></output>
			</td>
			<td>Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select dividing line style between the menu and the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_EG_19" id="TotalSoft_PG_EG_19">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select dividing line color between the menu and the title."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_EG_20" id="TotalSoft_PG_EG_20" class="Total_Soft_Port_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Image Options</td>			
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image for gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_EG_21" id="TotalSoft_PG_EG_21" min="100" max="900" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_21_Output" for="TotalSoft_PG_EG_21"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify your preferred height of the image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_EG_22" id="TotalSoft_PG_EG_22" min="100" max="900" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_22_Output" for="TotalSoft_PG_EG_22"></output>
			</td>
		</tr>
		<tr>
			<td>Border Radius <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the radius border for image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_EG_23" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_23_Output" for="TotalSoft_PG_EG_23"></output>
			</td>
			<td>Box Shadow Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the box shadow color for image."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_24" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferred hover background color for the image in the gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_25" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Title Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the name of the color image for the gallery portfolio."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_26" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Title Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_EG_27" id="TotalSoft_PG_EG_27" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_27_Output" for="TotalSoft_PG_EG_27"></output>
			</td>
			<td>Title Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_EG_28" id="TotalSoft_PG_EG_28">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line After Title</td>			
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width for line after title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_EG_29" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_29_Output" for="TotalSoft_PG_EG_29"></output>
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for line after title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_EG_30">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for line after title."></i></td>
			<td> 
				<input type="text" name="" id="TotalSoft_PG_EG_31" class="Total_Soft_Port_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>			
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Clicking on the image opens a popup, select your preferable background color for popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_32" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Title Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Clicking on the image opens a popup, select your preferable title color for popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_33" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Title Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Clicking on the image opens a popup, choose your preferable font size for popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_EG_34" id="TotalSoft_PG_EG_34" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_34_Output" for="TotalSoft_PG_EG_34"></output>
			</td>
			<td>Title Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable Font Family for popup title, Gallery Portfolio has a font base."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_EG_35" id="TotalSoft_PG_EG_35">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link In Popup</td>			
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color, which is designed for Link button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_36" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the button, which you will see in Popup, under the description."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_37" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size for Gallery Popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_EG_38" id="TotalSoft_PG_EG_38" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_38_Output" for="TotalSoft_PG_EG_38"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select that font family, which will make your portfolio more beautiful."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_EG_39" id="TotalSoft_PG_EG_39">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_EG_40" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_40_Output" for="TotalSoft_PG_EG_40"></output>
			</td>
			<td>Border Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border style."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_EG_41">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color, which is in the Lightbox portfolio."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_42" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Border Radius <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Install the border radius for Gallery link."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_EG_43" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_43_Output" for="TotalSoft_PG_EG_43"></output>
			</td>
		</tr>
		<tr>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select hover background color for link in the Gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_44" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" Select hover color for link in the Gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_45" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Line Before Thumbnails</td>			
		</tr>
		<tr>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width of the line in Lightbox, between the title and pictures."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_EG_46" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_46_Output" for="TotalSoft_PG_EG_46"></output>
			</td>
			<td>Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a line style in Lightbox, between the title and pictures."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_EG_47">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_48" class="Total_Soft_Port_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Thumbnail Options</td>			
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the preferred background color of the thumbnails in the gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_49" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Box Shadow Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the box shadow color for Thumbnails."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_50" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Image Height <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the preferred image height for thambnail in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_EG_51" min="50" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_51_Output" for="TotalSoft_PG_EG_51"></output>
			</td>
			<td>Border Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the preferred border width for thumbnail."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_EG_52" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_52_Output" for="TotalSoft_PG_EG_52"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a style to apply to the thumbnail border in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_EG_53">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the preferred color for the border."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_54" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border radius in your gallery miniature."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_EG_55" min="0" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_55_Output" for="TotalSoft_PG_EG_55"></output>
			</td>
			<td>Current Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the current color of the border."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_EG_56" id="TotalSoft_PG_EG_56" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Options </td>			
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_EG_57">
					<option value="1">  Angle Double   </option>
					<option value="2">  Angle          </option>
					<option value="3">  Arrow Circle   </option>
					<option value="4">  Arrow Circle O </option>
					<option value="5">  Arrow          </option>
					<option value="6">  Caret          </option>
					<option value="7">  Caret Square O </option>
					<option value="8">  Chevron Circle </option>
					<option value="9">  Chevron        </option>
					<option value="10"> Hand O         </option>
					<option value="11"> Long Arrow     </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the size of the arrow icon. "></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_EG_60" id="TotalSoft_PG_EG_60" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_60_Output" for="TotalSoft_PG_EG_60"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change Thumbnail's pictures."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_61" class="Total_Soft_Port_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Close Icon Options </td>			
		</tr>
		<tr>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets in lightbox to close the portfolio."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_EG_62">
					<option value="1"> Times          </option>
					<option value="3"> Times Circle   </option>
					<option value="2"> Times Circle O </option>					
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose in the gallery for the close box which size is approriate."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_EG_64" id="TotalSoft_PG_EG_64" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_EG_64_Output" for="TotalSoft_PG_EG_64"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for closing the Thumbnail images in gallery portfolio."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_EG_65" class="Total_Soft_Port_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_3">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Text to Show All <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter here the text, in which should be included all Images of Portfolio."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_FG_01" id="TotalSoft_PG_FG_01" class="Total_Soft_Select" placeholder=" * Required" value="">
			</td>
			<td>Images Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the pictures border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_02" id="TotalSoft_PG_FG_02" min="0" max="10" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_02_Output" for="TotalSoft_PG_FG_02"></output>
			</td>
		</tr>
		<tr>			
			<td>Images Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border color."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_FG_03" id="TotalSoft_PG_FG_03" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Place Between Images <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery, set the space between the images."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_04" id="TotalSoft_PG_FG_04" min="0" max="15" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_04_Output" for="TotalSoft_PG_FG_04"></output>
			</td>
		</tr>
		<tr>				
			<td>Different Size Images <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select, the images in gallery should be the different sizes or not, Each picture will be appropriate to the size by portfolio, or all in one size."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_FG_05" name="TotalSoft_PG_FG_05">
		            <label for="TotalSoft_PG_FG_05" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Navigation Menu Options</td>			
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu main background color for gallery navigation, which includes the names of all categories portfolio."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_06" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Current Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu background color for gallery navigation, which all the categories displayed in the main menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_07" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Current Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu text color for gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_08" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color for navigation menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_09" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the menu font color. When Portfolio separated with options."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_10" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size of navigation in the gallery of the portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_11" id="TotalSoft_PG_FG_11" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_11_Output" for="TotalSoft_PG_FG_11"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="For the menu text choose the font family."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_FG_12" id="TotalSoft_PG_FG_12">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for hover."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_13" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a moving navigation color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_14" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Effect Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of hover effect."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_FG_19" id="TotalSoft_PG_FG_19">
					<option value="Effect 1"> Default  </option>
					<option value="Effect 2"> Effect 1 </option>
					<option value="Effect 3"> Effect 2 </option>
					<option value="Effect 4"> Effect 3 </option>
					<option value="Effect 5"> Effect 4 </option>
					<option value="Effect 6"> Effect 5 </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Options</td>			
		</tr>
		<tr>			
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color of image title in the gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_15" class="Total_Soft_Port_Color" value="">
			</td>	
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the image title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_16" id="TotalSoft_PG_FG_16" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_16_Output" for="TotalSoft_PG_FG_16"></output>
			</td>		
		</tr>
		<tr>			
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font family for the image title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_FG_17" id="TotalSoft_PG_FG_17">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Description Options</td>			
		</tr>
		<tr>
			<td>Show Description <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the description in gallery or not."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_FG_18" name="">
		            <label for="TotalSoft_PG_FG_18" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title & Description Area</td>			
		</tr>
		<tr>
			<td>Background Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the background color for the text container for portfolio."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_FG_20" id="TotalSoft_PG_FG_20" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the border width for the text container in the gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_21" id="TotalSoft_PG_FG_21" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_21_Output" for="TotalSoft_PG_FG_21"></output>
			</td>
		</tr>
		<tr>			
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select preferable color for border."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_FG_22" id="TotalSoft_PG_FG_22" class="Total_Soft_Port_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Overlay Option</td>			
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a color for the overlay on the image as you hold the mouse arrow on it."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_25" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Effect Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of hover effect."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_26">
					<option value="hoverDivPort1">  Effect 1  </option>
					<option value="hoverDivPort2">  Effect 2  </option>
					<option value="hoverDivPort3">  Effect 3  </option>
					<option value="hoverDivPort4">  Effect 4  </option>
					<option value="hoverDivPort5">  Effect 5  </option>
					<option value="hoverDivPort6">  Effect 6  </option>
					<option value="hoverDivPort7">  Effect 7  </option>
					<option value="hoverDivPort8">  Effect 8  </option>
					<option value="hoverDivPort9">  Effect 9  </option>
					<option value="hoverDivPort10"> Effect 10 </option>
					<option value="hoverDivPort11"> Effect 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_FG_27" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_27_Output" for="TotalSoft_PG_FG_27"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Line 1 Option</td>			
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the lines in image."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_28" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width for the lines in image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_FG_29" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_29_Output" for="TotalSoft_PG_FG_29"></output>
			</td>
		</tr>
		<tr>
			
			<td>Effect Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define time of line effect for gallery portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_FG_31" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_31_Output" for="TotalSoft_PG_FG_31"></output>
			</td>
			<td>Effect Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of line effect for gallery portfolio."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_30">
					<option value="HovLine1_4">  Effect 1 </option>
					<option value="HovLine1_5">  Effect 2 </option>
					<option value="HovLine1_6">  Effect 3 </option>
					<option value="HovLine1_7">  Effect 4 </option>
					<option value="HovLine1_8">  Effect 5 </option>
					<option value="HovLine1_9">  Effect 6 </option>
					<option value="HovLine1_10"> Effect 7 </option>
				</select>
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Line 2 Option</td>			
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the lines in image."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_32" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width for the lines in image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_FG_33" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_33_Output" for="TotalSoft_PG_FG_33"></output>
			</td>
		</tr>
		<tr>
			<td>Effect Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define time of line effect for gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_FG_36" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_36_Output" for="TotalSoft_PG_FG_36"></output>
			</td>
			<td>Effect Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of line effect for gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_35">
					<option value="HovLine2_4">  Effect 1 </option>
					<option value="HovLine2_5">  Effect 2 </option>
					<option value="HovLine2_6">  Effect 3 </option>
					<option value="HovLine2_7">  Effect 4 </option>
					<option value="HovLine2_8">  Effect 5 </option>
					<option value="HovLine2_9">  Effect 6 </option>
					<option value="HovLine2_10"> Effect 7 </option>
				</select>
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Round Option</td>			
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for the overlay on the image, as you keep the mouse arrow on it. The effects are very beautiful and they are very suitable in the gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_37" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Effect Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of hover effect."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_38">
					<option value="hovRound1"> Effect 1 </option>
					<option value="hovRound2"> Effect 2 </option>
					<option value="hovRound3"> Effect 3 </option>
					<option value="hovRound4"> Effect 4 </option>
					<option value="hovRound5"> Effect 5 </option>
					<option value="hovRound6"> Effect 6 </option>
					<option value="hovRound7"> Effect 7 </option>
					<option value="hovRound8"> Effect 8 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define time of hover effect for gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_FG_39" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_39_Output" for="TotalSoft_PG_FG_39"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Icon Option</td>			
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Alter the size of the icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_41" id="TotalSoft_PG_FG_41" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_41_Output" for="TotalSoft_PG_FG_41"></output>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify preferable background color of the icons."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_42" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the border color for icon in the gallery popup container."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_43" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Border Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width for popup icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_FG_44" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_44_Output" for="TotalSoft_PG_FG_44"></output>
			</td>
		</tr>
		<tr>
			<td>Effect Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the effect type of different and beautifully designed sets."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_45">
					<option value="IconForPopup1"> Effect 1 </option>
					<option value="IconForPopup2"> Effect 2 </option>
					<option value="IconForPopup3"> Effect 3 </option>
					<option value="IconForPopup4"> Effect 4 </option>
					<option value="IconForPopup5"> Effect 5 </option>
					<option value="IconForPopup6"> Effect 6 </option>
					<option value="IconForPopup7"> Effect 7 </option>
					<option value="IconForPopup8"> Effect 8 </option>
					<option value="IconForPopup9"> Effect 9 </option>
				</select>
			</td>
			<td>Effect Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time to increase the icon effect on the gallery. When you hover the mouse over the image you can see the icons effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_FG_46" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_46_Output" for="TotalSoft_PG_FG_46"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color of the icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_40" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icons for image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_34">
					<option value="1"> File Image O </option>
					<option value="2"> Eye          </option>
					<option value="3"> Camera Retro </option>
					<option value="4"> Picture O    </option>
					<option value="5"> Search Plus  </option>
					<option value="6"> Expand       </option>
					<option value="7"> Gratipay     </option>
					<option value="8"> Search       </option>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Icon Option</td>			
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link color which is in the image"></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_23" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define a background color which is intended for the link button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_24" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the image container."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_47" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Effect Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the effect type of different and beautifully designed sets."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_48">
					<option value="IconForLink1"> Effect 1 </option>
					<option value="IconForLink2"> Effect 2 </option>
					<option value="IconForLink3"> Effect 3 </option>
					<option value="IconForLink4"> Effect 4 </option>
					<option value="IconForLink5"> Effect 5 </option>
					<option value="IconForLink6"> Effect 6 </option>
					<option value="IconForLink7"> Effect 7 </option>
					<option value="IconForLink8"> Effect 8 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time to increase the icon effect on the gallery. When you hover the mouse over the image you can see the icons effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_FG_49" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_49_Output" for="TotalSoft_PG_FG_49"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Option</td>			
		</tr>
		<tr>
			<td>OverLay Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a color for the overlay."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_50" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Start Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time interval for the opening of the gallery in milliseconds in the lightbox."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_FG_51" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_51_Output" for="TotalSoft_PG_FG_51"></output>
			</td>
		</tr>
		<tr>
			<td>Stop Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set stop time for change of image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_FG_52" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_52_Output" for="TotalSoft_PG_FG_52"></output>
			</td>
			<td>Time Effect Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the time for effect which should be applied by images to changing albums or by clicking on the images to see the description."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_53">
					<option value="linear">         Linear            </option>
					<option value="ease">           Ease              </option>
					<option value="in">             In                </option>
					<option value="out">            Out               </option>
					<option value="in-out">         In Out            </option>
					<option value="snap">           Snap              </option>
					<option value="easeOutCubic">   Ease Out Cubic    </option>
					<option value="easeInOutCubic"> Ease In Out Cubic </option>
					<option value="easeInCirc">     Ease In Circ      </option>
					<option value="easeOutCirc">    Ease Out Circ     </option>
					<option value="easeInOutCirc">  Ease In Out Circ  </option>
					<option value="easeInExpo">     Ease In Expo      </option>
					<option value="easeOutExpo">    Ease Out Expo     </option>
					<option value="easeInOutExpo">  Ease In Out Expo  </option>
					<option value="easeInQuad">     Ease In Quad      </option>
					<option value="easeOutQuad">    Ease Out Quad     </option>
					<option value="easeInOutQuad">  Ease In Out Quad  </option>
					<option value="easeInQuart">    Ease In Quart     </option>
					<option value="easeOutQuart">   Ease Out Quart    </option>
					<option value="easeInOutQuart"> Ease In Out Quart </option>
					<option value="easeInQuint">    Ease In Quint     </option>
					<option value="easeOutQuint">   Ease Out Quint    </option>
					<option value="easeInOutQuint"> Ease In Out Quint </option>
					<option value="easeInSine">     Ease In Sine      </option>
					<option value="easeOutSine">    Ease Out Sine     </option>
					<option value="easeInOutSine">  Ease In Out Sine  </option>
					<option value="easeInBack">     Ease In Back      </option>
					<option value="easeOutBack">    Ease Out Back     </option>
					<option value="easeInOutBack">  Ease In Out Back  </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the effect which will be applied to the images in the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_54">
					<option value="fade">                 Fade                   </option>
					<option value="scaleIn">              Scale In               </option>
					<option value="scaleOut">             Scale Out              </option>
					<option value="flipX">                Flip X                 </option>
					<option value="flipY">                Flip Y                 </option>
					<option value="slide">                Slide                  </option>
					<option value="translateLeft">        Translate Left         </option>
					<option value="translateRight">       Translate Right        </option>
					<option value="translateTop">         Translate Top          </option>
					<option value="translateBottom">      Translate Bottom       </option>
					<option value="translateTopLeft">     Translate Top Left     </option>
					<option value="translateTopRight">    Translate Top Right    </option>
					<option value="translateBottomRight"> Translate Bottom Right </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Image Option</td>			
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image for lightbox and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_55" id="TotalSoft_PG_FG_55" min="100" max="1000" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_55_Output" for="TotalSoft_PG_FG_55"></output>
			</td>
			<td>Border Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the borders of images."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_FG_56" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_56_Output" for="TotalSoft_PG_FG_56"></output>
			</td>
		</tr>
		<tr>			
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the image border color which is in the gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_59" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Carousel Image Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preffered height of the carousel image and it is all responsive in portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_57" id="TotalSoft_PG_FG_57" min="30" max="100" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_57_Output" for="TotalSoft_PG_FG_57"></output>
			</td>
		</tr>
		<tr>			
			<td>Carousel Image Border Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the borders of carousel images."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_FG_58" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_58_Output" for="TotalSoft_PG_FG_58"></output>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Carousel Option</td>			
		</tr>
		<tr>			
			<td>Pause Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set time interval for change of photos."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_FG_60" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_60_Output" for="TotalSoft_PG_FG_60"></output>
			</td>
			<td>Icon Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for slideshow in the carousel images."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_61" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>			
			<td>Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size, regardless of the container. The plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_62" id="TotalSoft_PG_FG_62" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_62_Output" for="TotalSoft_PG_FG_62"></output>
			</td>
			<td>Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the left and right icons for the gallery. In which the image should be placed for slide."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_63">
					<option value="1">  Angle Double   </option>
					<option value="2">  Angle          </option>
					<option value="3">  Arrow Circle   </option>
					<option value="4">  Arrow Circle O </option>
					<option value="5">  Arrow          </option>
					<option value="6">  Caret          </option>
					<option value="7">  Caret Square O </option>
					<option value="8">  Chevron Circle </option>
					<option value="9">  Chevron        </option>
					<option value="10"> Hand O         </option>
					<option value="11"> Long Arrow     </option>
				</select>
			</td>
		</tr>
		<tr>			
			<td>Close Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose in the gallery for the close box which size is approriate."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_64" id="TotalSoft_PG_FG_64" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_64_Output" for="TotalSoft_PG_FG_64"></output>
			</td>
			<td>Close Icon Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for close the images in gallery portfolio."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_65" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>			
			<td>Close Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets in portfolio to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_66">
					<option value="1"> Times          </option>
					<option value="3"> Times Circle   </option>
					<option value="2"> Times Circle O </option>
				</select>
			</td>
			<td>Close Icon Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the close icon background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_67" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>			
			<td>Carousel Icon Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change images."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_68" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Carousel Icon Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the size of the arrow icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_69" id="TotalSoft_PG_FG_69" min="10" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_69_Output" for="TotalSoft_PG_FG_69"></output>
			</td>
		</tr>
		<tr>			
			<td>Carousel Icon Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the right and the left icons for lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_FG_70">
					<option value="1">  Angle Double   </option>
					<option value="2">  Angle          </option>
					<option value="3">  Arrow Circle   </option>
					<option value="4">  Arrow Circle O </option>
					<option value="5">  Arrow          </option>
					<option value="6">  Caret          </option>
					<option value="7">  Caret Square O </option>
					<option value="8">  Chevron Circle </option>
					<option value="9">  Chevron        </option>
					<option value="10"> Hand O         </option>
					<option value="11"> Long Arrow     </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Image Title Option</td>			
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="This function is for the popup window. You can select font size for title. For each screen or mobile version will be its size for responsiveness."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_FG_71" id="TotalSoft_PG_FG_71" min="12" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_FG_71_Output" for="TotalSoft_PG_FG_71"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font family for the title, used with image in a popup window."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_FG_72" id="TotalSoft_PG_FG_72">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In gallery it is necessary to choose the color for image titles which is in the popup window."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_73" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color which is designed for lightbox title."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_FG_74" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>		
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_4">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image and it is all responsive in gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_01" id="TotalSoft_PG_CP_01" min="100" max="500" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_01_Output" for="TotalSoft_PG_CP_01"></output>
			</td>
			<td>Place Between <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the distance between each image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_02" id="TotalSoft_PG_CP_02" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_02_Output" for="TotalSoft_PG_CP_02"></output>
			</td>
		</tr>
		<tr>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow value for the image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_03" id="TotalSoft_PG_CP_03" min="0" max="20" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_03_Output" for="TotalSoft_PG_CP_03"></output>
			</td>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select shadow color which allows to show the shadow color of the image."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_CP_04" id="TotalSoft_PG_CP_04" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the preferred width of the border for image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_05" id="TotalSoft_PG_CP_05" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_05_Output" for="TotalSoft_PG_CP_05"></output>
			</td>
			<td>Border Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Identify the basic style of the image border and you can change it at any time. Select 4 different types of borders: Solid, Dotted, Dashed, Double."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_CP_06">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the image border color which is in the gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_07" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Border Radius <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border radius in your gallery image."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_CP_08" min="0" max="200" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_08_Output" for="TotalSoft_PG_CP_08"></output>
			</td>
		</tr>
		<tr>
			<td>Zoom Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select the type of scaling of different and beautifully designed sets from the image."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_CP_09">
					<option value="TotPortImgHov1"> Effect 1 </option>
					<option value="TotPortImgHov2"> Effect 2 </option>
					<option value="TotPortImgHov3"> Effect 3 </option>
					<option value="TotPortImgHov4"> Effect 4 </option>
					<option value="TotPortImgHov5"> Effect 5 </option>
					<option value="TotPortImgHov6"> Effect 6 </option>
					<option value="TotPortImgHov7"> Effect 7 </option>
				</select>
			</td>
			<td>Zoom Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the time to increase the effect on the gallery. When you hover the mouse over the image you can see the zoom effect."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_CP_10" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_10_Output" for="TotalSoft_PG_CP_10"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Overlay Option</td>			
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a background color for the overlay on the image as you keep the mouse arrow on it. The effects are very beautiful and they are very suitable in the gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_11" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Effect Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the Hover Effect type. There are 13 effects type in lightbox gallery. They are all differenet from each other."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_CP_12">
					<option value="TotPortImgOv1">  Effect 1  </option>
					<option value="TotPortImgOv2">  Effect 2  </option>
					<option value="TotPortImgOv3">  Effect 3  </option>
					<option value="TotPortImgOv4">  Effect 4  </option>
					<option value="TotPortImgOv5">  Effect 5  </option>
					<option value="TotPortImgOv6">  Effect 6  </option>
					<option value="TotPortImgOv7">  Effect 7  </option>
					<option value="TotPortImgOv8">  Effect 8  </option>
					<option value="TotPortImgOv9">  Effect 9  </option>
					<option value="TotPortImgOv10"> Effect 10 </option>
					<option value="TotPortImgOv11"> Effect 11 </option>
					<option value="TotPortImgOv12"> Effect 12 </option>
					<option value="TotPortImgOv13"> Effect 13 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_CP_13" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_13_Output" for="TotalSoft_PG_CP_13"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Option</td>			
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the text container."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_14" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the font size for the image title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_15" id="TotalSoft_PG_CP_15" min="10" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_15_Output" for="TotalSoft_PG_CP_15"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color for your title which will be seen in gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_16" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Hover Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine preferable type of your hover effects."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_CP_17">
					<option value="TotPortHovTit1">  Effect 1  </option>
					<option value="TotPortHovTit2">  Effect 2  </option>
					<option value="TotPortHovTit3">  Effect 3  </option>
					<option value="TotPortHovTit4">  Effect 4  </option>
					<option value="TotPortHovTit5">  Effect 5  </option>
					<option value="TotPortHovTit6">  Effect 6  </option>
					<option value="TotPortHovTit7">  Effect 7  </option>
					<option value="TotPortHovTit8">  Effect 8  </option>
					<option value="TotPortHovTit9">  Effect 9  </option>
					<option value="TotPortHovTit10"> Effect 10 </option>
					<option value="TotPortHovTit11"> Effect 11 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_CP_18" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_18_Output" for="TotalSoft_PG_CP_18"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for the title. Gallery has a basic Google font."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_CP_19" id="TotalSoft_PG_CP_19">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Hover Line Option</td>			
		</tr>
		<tr>
			<td>Line Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the line width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_20" id="TotalSoft_PG_CP_20" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_20_Output" for="TotalSoft_PG_CP_20"></output>
			</td>
			<td>Line Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the style to be applied to the line."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_CP_21" id="TotalSoft_PG_CP_21">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Line Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferred color to show the line of separation."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_CP_22" id="TotalSoft_PG_CP_22" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Effect Type <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="There are 7 different line effect types in gallery."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_CP_23" id="TotalSoft_PG_CP_23">
					<option value="TotPortHovLine1"> Effect 1 </option>
					<option value="TotPortHovLine2"> Effect 2 </option>
					<option value="TotPortHovLine3"> Effect 3 </option>
					<option value="TotPortHovLine4"> Effect 4 </option>
					<option value="TotPortHovLine5"> Effect 5 </option>
					<option value="TotPortHovLine6"> Effect 6 </option>
					<option value="TotPortHovLine7"> Effect 7 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Effect Time <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover line effect for gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="TotalSoft_PG_CP_24" id="TotalSoft_PG_CP_24" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_24_Output" for="TotalSoft_PG_CP_24"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Option</td>			
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the link button."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_25" id="TotalSoft_PG_CP_25" min="10" max="36" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_25_Output" for="TotalSoft_PG_CP_25"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the button which you will see in image."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_26" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border color which is in the image container."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_CP_27" id="TotalSoft_PG_CP_27" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border width which is in the image container."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_28" id="TotalSoft_PG_CP_28" min="0" max="5" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_28_Output" for="TotalSoft_PG_CP_28"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the link border style."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_CP_29" id="TotalSoft_PG_CP_29">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Link Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in link button. When you have created a gallery in each box has URL."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_CP_30" id="TotalSoft_PG_CP_30" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine preferable link type of your hover effects."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_CP_31">
					<option value="TotPortHovLink1"> Effect 1 </option>
					<option value="TotPortHovLink2"> Effect 2 </option>
					<option value="TotPortHovLink3"> Effect 3 </option>
					<option value="TotPortHovLink4"> Effect 4 </option>
					<option value="TotPortHovLink5"> Effect 5 </option>
					<option value="TotPortHovLink6"> Effect 6 </option>
					<option value="TotPortHovLink7"> Effect 7 </option>
					<option value="TotPortHovLink8"> Effect 8 </option>
					<option value="TotPortHovLink9"> Effect 9 </option>
				</select>
			</td>
			<td>Hover Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select time of hover effect for gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_CP_32" min="1" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_32_Output" for="TotalSoft_PG_CP_32"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the preferred font family for the link button. Gallery has a basic Google font."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_CP_33" id="TotalSoft_PG_CP_33">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Option</td>			
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose your preferable background color for popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_34" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Border Width <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the width of the border for the container in a popup window."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_CP_35" min="0" max="10" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_35_Output" for="TotalSoft_PG_CP_35"></output>
			</td>
		</tr>
		<tr>
			<td>Border Style <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the style for the border of the popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_CP_36">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>
			<td>Border Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine border color which is in the popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_37" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the popup window it is possible to give a border radius. You can specify the radius of the pixels. In gallery it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_38" id="TotalSoft_PG_CP_38" min="0" max="50" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_38_Output" for="TotalSoft_PG_CP_38"></output>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title in Popup Option</td>			
		</tr>
		<tr>
			<td>Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the title or not in popup."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_CP_39" name="">
		            <label for="TotalSoft_PG_CP_39" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Text Align <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose text align for title (left, center and right)."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_CP_40">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the image title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_41" id="TotalSoft_PG_CP_41" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_41_Output" for="TotalSoft_PG_CP_41"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font family for the image title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_CP_42" id="TotalSoft_PG_CP_42">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery set the color for the image title."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_43" class="Total_Soft_Port_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Play Icon Option</td>			
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_CP_44">
					<option value="play">          Play          </option>
					<option value="play-circle">   Play Circle   </option>
					<option value="play-circle-o"> Play Circle O </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the size of the play icon."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_45" id="TotalSoft_PG_CP_45" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_45_Output" for="TotalSoft_PG_CP_45"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change images."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_46" class="Total_Soft_Port_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Close Icon Option</td>			
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can choose icons from different beautifully designed sets in portfolio to close the lightbox."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_CP_47">
					<option value="times">          Times          </option>
					<option value="times-circle">   Times Circle   </option>
					<option value="times-circle-o"> Times Circle O </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose in the gallery for the close box which size is approriate."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_48" id="TotalSoft_PG_CP_48" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_48_Output" for="TotalSoft_PG_CP_48"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color for close the popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_49" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Text <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Enter the text that should be in close button."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_50" maxlength="10" class="Total_Soft_Select" value="">
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select your preferable font family for close button."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_CP_51" id="TotalSoft_PG_CP_51">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Option</td>			
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the right and the left icons for popup which are for change the images by sequence."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_CP_52">
					<option value="angle-double">   Angle Double   </option>
					<option value="angle">          Angle          </option>
					<option value="arrow-circle">   Arrow Circle   </option>
					<option value="arrow-circle-o"> Arrow Circle O </option>
					<option value="arrow">          Arrow          </option>
					<option value="caret">          Caret          </option>
					<option value="caret-square-o"> Caret Square O </option>
					<option value="chevron-circle"> Chevron Circle </option>
					<option value="chevron">        Chevron        </option>
					<option value="hand-o">         Hand O         </option>
					<option value="long-arrow">     Long Arrow     </option>
				</select>
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Change the icon size regardless of the container. The gallery portfolio plugin allows to get most suitable navigation arrows that are most appropriate for your site."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_53" id="TotalSoft_PG_CP_53" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_53_Output" for="TotalSoft_PG_CP_53"></output>
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change the image."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_54" class="Total_Soft_Port_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Numbers Option</td>			
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Note the size of the numbers. It is fully responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_55" id="TotalSoft_PG_CP_55" min="8" max="48" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_55_Output" for="TotalSoft_PG_CP_55"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color of the numbers."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_56" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Navigation Menu Options</td>			
		</tr>
		<tr>
			<td>Show Menu <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu should appear or not by Yes or No via buttons."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_CP_57" name="TotalSoft_PG_CP_57">
		            <label for="TotalSoft_PG_CP_57" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Text to Show All <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write name that will be appear in the line of menu bar. Here will be included all albums."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_CP_58" id="TotalSoft_PG_CP_58" class="Total_Soft_Select" placeholder=" * Required" value="">
			</td>
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu main background color for gallery navigation which includes the names of all categories portfolio."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_59" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Current Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu background color for gallery navigation which all the categories displayed in the main menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_60" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Current Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu current color for gallery navigation which all the categories displayed in the main menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_61" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color for navigation menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_62" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the menu font color. When portfolio separated with options."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_63" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the font size of navigation in the gallery of the portfolio."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_CP_64" id="TotalSoft_PG_CP_64" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_CP_64_Output" for="TotalSoft_PG_CP_64"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="For the menu text choose the font family."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_CP_65" id="TotalSoft_PG_CP_65">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for hover."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_66" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu font color when the portfolio is separated by categories."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_CP_67" class="Total_Soft_Port_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_5">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>SlideShow Button <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the slideshow button in gallery or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_SP_47" name="">
		            <label for="TotalSoft_PG_SP_47" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>AutoPlay <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="If this parameter is not specified autoplay for slideshow will be disabled."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_SP_01" name="">
		            <label for="TotalSoft_PG_SP_01" data-on="Yes" data-off="No"></label>
		        </div>
			</td>			
		</tr>
		<tr>
			<td>Pause Time <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set time interval for change of photos."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_SP_02" min="1" max="20" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_SP_02_Output" for="TotalSoft_PG_SP_02"></output>
			</td>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the slider and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangeper" name="TotalSoft_PG_SP_03" id="TotalSoft_PG_SP_03" min="40" max="100" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_SP_03_Output" for="TotalSoft_PG_SP_03"></output>
			</td>			
		</tr>
		<tr>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height of the slider and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_SP_04" id="TotalSoft_PG_SP_04" min="150" max="1000" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_SP_04_Output" for="TotalSoft_PG_SP_04"></output>
			</td>
			<td>Position <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the slider: center, right, left."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_SP_05" id="TotalSoft_PG_SP_05">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>			
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_SP_06" id="TotalSoft_PG_SP_06" min="0" max="10" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_SP_06_Output" for="TotalSoft_PG_SP_06"></output>
			</td>
			<td>Border Style <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the frame style for slider."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_SP_07" id="TotalSoft_PG_SP_07">
					<option value="none">   None   </option>
					<option value="solid">  Solid  </option>
					<option value="dashed"> Dashed </option>
					<option value="dotted"> Dotted </option>
				</select>
			</td>			
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border color for slider."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_SP_08" id="TotalSoft_PG_SP_08" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Tooltips <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the tooltips in slider or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_SP_09" name="">
		            <label for="TotalSoft_PG_SP_09" data-on="Yes" data-off="No"></label>
		        </div>
			</td>			
		</tr>
		<tr>
			<td>Transition Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the desired transition effect from the list."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_SP_10">
					<option value="random">                                         Random                                               </option>
					<option value="rotateSlideOut_rotateSlideIn">                   Rotate Slide Out Rotate Slide In                     </option>
					<option value="rotateSidesOut_rotateSidesInDelay">              Rotate Sides Out Rotate Sides In Delay               </option>
					<option value="rotateCarouselBottomOut_rotateCarouselBottomIn"> Rotate Carousel Bottom Out Rotate Carousel Bottom In </option>
					<option value="rotateCarouselTopOut_rotateCarouselTopIn">       Rotate Carousel Top Out Rotate Carousel Top In       </option>
					<option value="rotateCarouselRightOut_rotateCarouselRightIn">   Rotate Carousel Right Out Rotate Carousel Right In   </option>
					<option value="rotateCarouselLeftOut_rotateCarouselLeftIn">     Rotate Carousel Left Out Rotate Carousel Left In     </option>
					<option value="rotateCubeBottomOut_rotateCubeBottomIn">         Rotate Cube Bottom Out Rotate Cube Bottom In         </option>
					<option value="rotateCubeTopOut_rotateCubeTopIn">               Rotate Cube Top Out Rotate Cube Top In               </option>
					<option value="rotateCubeRightOut_rotateCubeRightIn">           Rotate Cube Right Out Rotate Cube Right In           </option>
					<option value="rotateCubeLeftOut_rotateCubeLeftIn">             Rotate Cube Left Out Rotate Cube Left In             </option>
					<option value="rotateRoomBottomOut_rotateRoomBottomIn">         Rotate Room Bottom Out Rotate Room Bottom In         </option>
					<option value="rotateRoomTopOut_rotateRoomTopIn">               Rotate Room Top Out Rotate Room Top In               </option>
					<option value="rotateRoomRightOut_rotateRoomRightIn">           Rotate Room Right Out Rotate Room Right In           </option>
					<option value="rotateRoomLeftOut_rotateRoomLeftIn">             Rotate Room Left Out Rotate Room Left In             </option>
					<option value="moveToTopFade_rotateUnfoldBottom">               Move To Top Fade Rotate Unfold Bottom                </option>
					<option value="moveToBottomFade_rotateUnfoldTop">               Move To Bottom Fade Rotate Unfold Top                </option>
					<option value="moveToLeftFade_rotateUnfoldRight">               Move To Left Fade Rotate Unfold Right                </option>
					<option value="moveToRightFade_rotateUnfoldLeft">               Move To Right Fade Rotate Unfold Left                </option>
					<option value="rotateFoldBottom_moveFromTopFade">               Rotate Fold Bottom Move From Top Fade                </option>
					<option value="rotateFoldTop_moveFromBottomFade">               Rotate Fold Top Move From Bottom Fade                </option>
					<option value="rotateFoldRight_moveFromLeftFade">               Rotate Fold Right Move From Left Fade                </option>
					<option value="rotateFoldLeft_moveFromRightFade">               Rotate Fold Left Move From Right Fade                </option>
					<option value="rotatePushBottom_page">                          Rotate Push Bottom Page                              </option>
					<option value="rotatePushTop_rotatePullBottom">                 Rotate Push Top Rotate Pull Bottom                   </option>
					<option value="rotatePushRight_rotatePullLeft">                 Rotate Push Right Rotate Pull Left                   </option>
					<option value="rotatePushLeft_rotatePullRight">                 Rotate Push Left Rotate Pull Right                   </option>
					<option value="rotatePushBottom_moveFromTop">                   Rotate Push Bottom Move From Top                     </option>
					<option value="rotatePushTop_moveFromBottom">                   Rotate Push Top Move From Bottom                     </option>
					<option value="rotatePushRight_moveFromLeft">                   Rotate Push Right Move From Left                     </option>
					<option value="rotatePushLeft_moveFromRight">                   Rotate Push Left Move From Right                     </option>
					<option value="rotateOutNewspaper_rotateInNewspaper">           Rotate Out Newspaper Rotate In Newspaper             </option>
					<option value="rotateFall_scaleUp">                             Rotate Fall Scale Up                                 </option>
					<option value="flipOutBottom_flipInTop">                        Flip Out Bottom Flip In Top                          </option>
					<option value="flipOutTop_flipInBottom">                        Flip Out Top Flip In Bottom                          </option>
					<option value="flipOutLeft_flipInRight">                        Flip Out Left Flip In Right                          </option>
					<option value="flipOutRight_flipInLeft">                        Flip Out Right Flip In Left                          </option>
					<option value="rotateBottomSideFirst_moveFromBottom">           Rotate Bottom Side First Move From Bottom            </option>
					<option value="rotateTopSideFirst_moveFromTop">                 Rotate Top Side First Move From Top                  </option>
					<option value="rotateLeftSideFirst_moveFromLeft">               Rotate Left Side First Move From Left                </option>
					<option value="rotateRightSideFirst_moveFromRight">             Rotate Right Side First Move From Right              </option>
					<option value="scaleDownCenter_scaleUpCenter">                  Scale Down Center Scale Up Center                    </option>
					<option value="moveToBottom_scaleUp">                           Move To Bottom Scale Up                              </option>
					<option value="moveToTop_scaleUp">                              Move To Top Scale Up                                 </option>
					<option value="moveToRight_scaleUp">                            Move To Right Scale Up                               </option>
					<option value="moveToLeft_scaleUp">                             Move To Left Scale Up                                </option>
					<option value="scaleDownUp_scaleUp">                            Scale Down Up Scale Up                               </option>
					<option value="scaleDown_scaleUpDown">                          Scale Down Scale Up Down                             </option>
					<option value="scaleDown_moveFromTop">                          Scale Down Move From Top                             </option>
					<option value="scaleDown_moveFromBottom">                       Scale Down Move From Bottom                          </option>
					<option value="scaleDown_moveFromLeft">                         Scale Down Move From Left                            </option>
					<option value="scaleDown_moveFromRight">                        Scale Down Move From Right                           </option>
					<option value="moveToBottomEasing_moveFromTop">                 Move To Bottom Easing Move From Top                  </option>
					<option value="moveToTopEasing_moveFromBottom">                 Move To Top Easing Move From Bottom                  </option>
					<option value="moveToRightEasing_moveFromLeft">                 Move To Right Easing Move From Left                  </option>
					<option value="moveToLeftEasing_moveFromRight">                 Move To Left Easing Move From Right                  </option>
					<option value="moveToBottomFade_moveFromTopFade">               Move To Bottom Fade Move From Top Fade               </option>
					<option value="moveToTopFade_moveFromBottomFade">               Move To Top Fade Move From Bottom Fade               </option>
					<option value="moveToRightFade_moveFromLeftFade">               Move To Right Fade Move From Left Fade               </option>
					<option value="moveToLeftFade_moveFromRightFade">               Move To Left Fade Move From Right Fade               </option>
					<option value="fade_moveFromTop">                               Fade Move From Top                                   </option>
					<option value="fade_moveFromBottom">                            Fade Move From Bottom                                </option>
					<option value="fade_moveFromLeft">                              Fade Move From Left                                  </option>
					<option value="fade_moveFromRight">                             Fade Move From Right                                 </option>
					<option value="moveToBottom_moveFromTop">                       Move To Bottom From Top                              </option>
					<option value="moveToTop_moveFromBottom">                       Move To Top From Bottom                              </option>
					<option value="moveToRight_moveFromLeft">                       Move To Right From Left                              </option>
					<option value="moveToLeft_moveFromRight">                       Move To Left From Right                              </option>
				</select>
			</td>
			<td>Backward Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the desired backward effect from the list."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_SP_11">
					<option value="random">                                         Random                                               </option>
					<option value="rotateSlideOut_rotateSlideIn">                   Rotate Slide Out Rotate Slide In                     </option>
					<option value="rotateSidesOut_rotateSidesInDelay">              Rotate Sides Out Rotate Sides In Delay               </option>
					<option value="rotateCarouselBottomOut_rotateCarouselBottomIn"> Rotate Carousel Bottom Out Rotate Carousel Bottom In </option>
					<option value="rotateCarouselTopOut_rotateCarouselTopIn">       Rotate Carousel Top Out Rotate Carousel Top In       </option>
					<option value="rotateCarouselRightOut_rotateCarouselRightIn">   Rotate Carousel Right Out Rotate Carousel Right In   </option>
					<option value="rotateCarouselLeftOut_rotateCarouselLeftIn">     Rotate Carousel Left Out Rotate Carousel Left In     </option>
					<option value="rotateCubeBottomOut_rotateCubeBottomIn">         Rotate Cube Bottom Out Rotate Cube Bottom In         </option>
					<option value="rotateCubeTopOut_rotateCubeTopIn">               Rotate Cube Top Out Rotate Cube Top In               </option>
					<option value="rotateCubeRightOut_rotateCubeRightIn">           Rotate Cube Right Out Rotate Cube Right In           </option>
					<option value="rotateCubeLeftOut_rotateCubeLeftIn">             Rotate Cube Left Out Rotate Cube Left In             </option>
					<option value="rotateRoomBottomOut_rotateRoomBottomIn">         Rotate Room Bottom Out Rotate Room Bottom In         </option>
					<option value="rotateRoomTopOut_rotateRoomTopIn">               Rotate Room Top Out Rotate Room Top In               </option>
					<option value="rotateRoomRightOut_rotateRoomRightIn">           Rotate Room Right Out Rotate Room Right In           </option>
					<option value="rotateRoomLeftOut_rotateRoomLeftIn">             Rotate Room Left Out Rotate Room Left In             </option>
					<option value="moveToTopFade_rotateUnfoldBottom">               Move To Top Fade Rotate Unfold Bottom                </option>
					<option value="moveToBottomFade_rotateUnfoldTop">               Move To Bottom Fade Rotate Unfold Top                </option>
					<option value="moveToLeftFade_rotateUnfoldRight">               Move To Left Fade Rotate Unfold Right                </option>
					<option value="moveToRightFade_rotateUnfoldLeft">               Move To Right Fade Rotate Unfold Left                </option>
					<option value="rotateFoldBottom_moveFromTopFade">               Rotate Fold Bottom Move From Top Fade                </option>
					<option value="rotateFoldTop_moveFromBottomFade">               Rotate Fold Top Move From Bottom Fade                </option>
					<option value="rotateFoldRight_moveFromLeftFade">               Rotate Fold Right Move From Left Fade                </option>
					<option value="rotateFoldLeft_moveFromRightFade">               Rotate Fold Left Move From Right Fade                </option>
					<option value="rotatePushBottom_page">                          Rotate Push Bottom Page                              </option>
					<option value="rotatePushTop_rotatePullBottom">                 Rotate Push Top Rotate Pull Bottom                   </option>
					<option value="rotatePushRight_rotatePullLeft">                 Rotate Push Right Rotate Pull Left                   </option>
					<option value="rotatePushLeft_rotatePullRight">                 Rotate Push Left Rotate Pull Right                   </option>
					<option value="rotatePushBottom_moveFromTop">                   Rotate Push Bottom Move From Top                     </option>
					<option value="rotatePushTop_moveFromBottom">                   Rotate Push Top Move From Bottom                     </option>
					<option value="rotatePushRight_moveFromLeft">                   Rotate Push Right Move From Left                     </option>
					<option value="rotatePushLeft_moveFromRight">                   Rotate Push Left Move From Right                     </option>
					<option value="rotateOutNewspaper_rotateInNewspaper">           Rotate Out Newspaper Rotate In Newspaper             </option>
					<option value="rotateFall_scaleUp">                             Rotate Fall Scale Up                                 </option>
					<option value="flipOutBottom_flipInTop">                        Flip Out Bottom Flip In Top                          </option>
					<option value="flipOutTop_flipInBottom">                        Flip Out Top Flip In Bottom                          </option>
					<option value="flipOutLeft_flipInRight">                        Flip Out Left Flip In Right                          </option>
					<option value="flipOutRight_flipInLeft">                        Flip Out Right Flip In Left                          </option>
					<option value="rotateBottomSideFirst_moveFromBottom">           Rotate Bottom Side First Move From Bottom            </option>
					<option value="rotateTopSideFirst_moveFromTop">                 Rotate Top Side First Move From Top                  </option>
					<option value="rotateLeftSideFirst_moveFromLeft">               Rotate Left Side First Move From Left                </option>
					<option value="rotateRightSideFirst_moveFromRight">             Rotate Right Side First Move From Right              </option>
					<option value="scaleDownCenter_scaleUpCenter">                  Scale Down Center Scale Up Center                    </option>
					<option value="moveToBottom_scaleUp">                           Move To Bottom Scale Up                              </option>
					<option value="moveToTop_scaleUp">                              Move To Top Scale Up                                 </option>
					<option value="moveToRight_scaleUp">                            Move To Right Scale Up                               </option>
					<option value="moveToLeft_scaleUp">                             Move To Left Scale Up                                </option>
					<option value="scaleDownUp_scaleUp">                            Scale Down Up Scale Up                               </option>
					<option value="scaleDown_scaleUpDown">                          Scale Down Scale Up Down                             </option>
					<option value="scaleDown_moveFromTop">                          Scale Down Move From Top                             </option>
					<option value="scaleDown_moveFromBottom">                       Scale Down Move From Bottom                          </option>
					<option value="scaleDown_moveFromLeft">                         Scale Down Move From Left                            </option>
					<option value="scaleDown_moveFromRight">                        Scale Down Move From Right                           </option>
					<option value="moveToBottomEasing_moveFromTop">                 Move To Bottom Easing Move From Top                  </option>
					<option value="moveToTopEasing_moveFromBottom">                 Move To Top Easing Move From Bottom                  </option>
					<option value="moveToRightEasing_moveFromLeft">                 Move To Right Easing Move From Left                  </option>
					<option value="moveToLeftEasing_moveFromRight">                 Move To Left Easing Move From Right                  </option>
					<option value="moveToBottomFade_moveFromTopFade">               Move To Bottom Fade Move From Top Fade               </option>
					<option value="moveToTopFade_moveFromBottomFade">               Move To Top Fade Move From Bottom Fade               </option>
					<option value="moveToRightFade_moveFromLeftFade">               Move To Right Fade Move From Left Fade               </option>
					<option value="moveToLeftFade_moveFromRightFade">               Move To Left Fade Move From Right Fade               </option>
					<option value="fade_moveFromTop">                               Fade Move From Top                                   </option>
					<option value="fade_moveFromBottom">                            Fade Move From Bottom                                </option>
					<option value="fade_moveFromLeft">                              Fade Move From Left                                  </option>
					<option value="fade_moveFromRight">                             Fade Move From Right                                 </option>
					<option value="moveToBottom_moveFromTop">                       Move To Bottom From Top                              </option>
					<option value="moveToTop_moveFromBottom">                       Move To Top From Bottom                              </option>
					<option value="moveToRight_moveFromLeft">                       Move To Right From Left                              </option>
					<option value="moveToLeft_moveFromRight">                       Move To Left From Right                              </option>
				</select>
			</td>			
		</tr>
		<tr>
			<td>Transition Cols <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the number of transition cols which will be shown."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range" name="" id="TotalSoft_PG_SP_12" min="1" max="20" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_SP_12_Output" for="TotalSoft_PG_SP_12"></output>
			</td>
			<td>Transition Rows <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the number of transition rows which will be shown."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range" name="" id="TotalSoft_PG_SP_13" min="1" max="20" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_SP_13_Output" for="TotalSoft_PG_SP_13"></output>
			</td>			
		</tr>	
		<tr>
			<td>Transition Duration <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Duration of transition between slides."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangesec" name="" id="TotalSoft_PG_SP_14" min="1" max="50" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_SP_14_Output" for="TotalSoft_PG_SP_14"></output>
			</td>
			<td>Swipe Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the swipe effect in slider or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_SP_15" name="">
		            <label for="TotalSoft_PG_SP_15" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>	
		<tr class="Total_Soft_Titles">
			<td colspan="4">Album Title</td>			
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the album title. It is also designed for menu."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_SP_16" id="TotalSoft_PG_SP_16" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_SP_16_Output" for="TotalSoft_PG_SP_16"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font family for the album title. It is also designed for menu."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_SP_17" id="TotalSoft_PG_SP_17">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for the album title."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_18" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the color for the title."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_19" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Albums Select Menu</td>			
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose your preferable color for select menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_20" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose your preferable background color for select menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_21" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu font color when the portfolio is separated by categories."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_22" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" Select the menu background color when the portfolio is separated by categories."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_23" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Image Title</td>			
		</tr>
		<tr>
			<td>Show Title <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the title in slider or no for image."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_SP_24" name="TotalSoft_PG_SP_24">
		            <label for="TotalSoft_PG_SP_24" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Position <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Make a choice among the 3 positions for the slider: center, right, left."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_SP_25" id="TotalSoft_PG_SP_25">
					<option value="false"> Standard </option>
					<option value="true">  On Image </option>
				</select>
			</td>			
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the title."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_26" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the title."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_27" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>	
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine your preferred font size for image title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_SP_28" id="TotalSoft_PG_SP_28" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_SP_28_Output" for="TotalSoft_PG_SP_28"></output>
			</td>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font family for the title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_SP_29" id="TotalSoft_PG_SP_29">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Thumbnails</td>			
		</tr>
		<tr>
			<td>Width in Full Screen <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the width of the full screen view in lightbox."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_SP_32" id="TotalSoft_PG_SP_32" min="100" max="200" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_SP_32_Output" for="TotalSoft_PG_SP_32"></output>
			</td>
			<td>Height in Full Screen <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the height of the full screen view in lightbox."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_SP_33" id="TotalSoft_PG_SP_33" min="100" max="200" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_SP_33_Output" for="TotalSoft_PG_SP_33"></output>
			</td>
		</tr>
		<tr>
			<td>Position <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose position for the thumbnail."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_SP_34" id="TotalSoft_PG_SP_34">
					<option value="top">    Top    </option>
					<option value="bottom"> Bottom </option>
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
				</select>
			</td>
			<td>Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select one of this three options for thumbnails view."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_SP_35">
					<option value="image">  Image  </option>
					<option value="square"> Square </option>
					<option value="number"> Number </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the thumbnails."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_36" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the thumbnails."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_37" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Area Background <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose area background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_38" class="Total_Soft_Port_Color" value="">				
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Icons Settings</td>			
		</tr>	
		<tr>
			<td>Zoom Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the zoom icon in slider or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_SP_40" name="">
		            <label for="TotalSoft_PG_SP_40" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Zoom Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the zoom icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_41" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Full Screen Show <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose to show the full screen icon in slider or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_SP_39" name="">
		            <label for="TotalSoft_PG_SP_39" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Full Screen Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the full screen icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_42" class="Total_Soft_Port_Color1" value="">
			</td>			
		</tr>
		<tr>
			<td>Play/Pause Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for the play/pause icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_43" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Album Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color for the album icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_44" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>		
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrow Settings</td>			
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="You can select icons from a variety of beautifully designed sets for the slider."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_SP_45">
					<option value="angle-double">   Angle Double   </option>
					<option value="angle">          Angle          </option>
					<option value="arrow-circle">   Arrow Circle   </option>
					<option value="arrow-circle-o"> Arrow Circle O </option>
					<option value="arrow">          Arrow          </option>
					<option value="caret">          Caret          </option>
					<option value="caret-square-o"> Caret Square O </option>
					<option value="chevron-circle"> Chevron Circle </option>
					<option value="chevron">        Chevron        </option>
					<option value="hand-o">         Hand O         </option>
					<option value="long-arrow">     Long Arrow     </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the icon color to change pictures slider."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_SP_46" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_6">
		<tr class="Total_Soft_Titles">
			<td colspan="4">Album Options</td>			
		</tr>
		<tr>
			<td>Hover Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose type of hover effect."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_GA_01">
					<option value="Effect 1"> Effect 1 </option>
					<option value="Effect 2"> Effect 2 </option>
					<option value="Effect 3"> Effect 3 </option>
					<option value="Effect 4"> Effect 4 </option>
					<option value="Effect 5"> Effect 5 </option>
				</select>
			</td>
			<td>Album/Description Position <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the Position for Albums and Descriptions."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_GA_02">
					<option value="Position 1"> Left/Right </option>
					<option value="Position 2"> Top/Bottom </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Position Reverse <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Mark gallery albums and descriptions positions reverse or not."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_GA_03" name="TotalSoft_PG_GA_03">
		            <label for="TotalSoft_PG_GA_03" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Hover Overlay Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose a color for the overlay."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_04" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred width of the image albums and it is all responsive."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_GA_05" id="TotalSoft_PG_GA_05" min="0" max="1200" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_GA_05_Output" for="TotalSoft_PG_GA_05"></output>
			</td>
			<td>Height <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It allows you to specify the preferred height of the image albums."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_GA_06" id="TotalSoft_PG_GA_06" min="0" max="800" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_GA_06_Output" for="TotalSoft_PG_GA_06"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Album Title Options</td>			
		</tr>
		<tr>
			<td>Border Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the album title border color which is in the gallery."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_GA_07" id="TotalSoft_PG_GA_07" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Border Radius <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the border radius in your gallery image for the album title."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_GA_08" name="TotalSoft_PG_GA_08">
		            <label for="TotalSoft_PG_GA_08" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Border Width <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the border width."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_GA_09" id="TotalSoft_PG_GA_09" min="0" max="10" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_GA_09_Output" for="TotalSoft_PG_GA_09"></output>
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color for the album title text."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_10" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font size for the album title by pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_GA_11" id="TotalSoft_PG_GA_11" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_GA_11_Output" for="TotalSoft_PG_GA_11"></output>
			</td>
			<td>Font Family <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the font family for the album title."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_GA_12">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Box Shadow <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose you want the shadow for the album title or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_GA_13" name="TotalSoft_PG_GA_13">
		            <label for="TotalSoft_PG_GA_13" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Shadow Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title=" Select shadow type."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_GA_14" name="">
		            <label for="TotalSoft_PG_GA_14" data-on="1" data-off="2"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Shadow Color <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the box shadow color for album title."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_GA_15" id="TotalSoft_PG_GA_15" class="Total_Soft_Port_Color" value="">				
			</td>
			<td>Background Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Specify the background type: transparent, color or gradient."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_GA_16">
					<option value="Type 1"> Transparent </option>
					<option value="Type 2"> Color       </option>
					<option value="Type 3"> Gradient 1  </option>
					<option value="Type04"> Gradient 2  </option>
					<option value="Type05"> Gradient 3  </option>
					<option value="Type06"> Gradient 4  </option>
					<option value="Type07"> Gradient 5  </option>
					<option value="Type08"> Gradient 6  </option>
					<option value="Type09"> Gradient 7  </option>
					<option value="Type10"> Gradient 8  </option>
					<option value="Type11"> Gradient 9  </option>
					<option value="Type12"> Gradient 10 </option>
					<option value="Type13"> Gradient 11 </option>
					<option value="Type14"> Gradient 12 </option>
					<option value="Type15"> Gradient 13 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Background Color 1 <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the background color of the album title."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_17" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Background Color 2 <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose second background color for gradient effect."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_18" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Icon For Opening Popup</td>			
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon for opening the popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_GA_19">
					<option value="">     None         </option>
					<option value="f030"> Camera       </option>
					<option value="f083"> Camera Retro </option>
					<option value="f06e"> Eye          </option>
					<option value="f08a"> Heart O      </option>
					<option value="f03e"> Picture O    </option>
					<option value="f002"> Search       </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color, which is designed to open the popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_20" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select that size, which would be more relevant for portfolio. It is responsive too."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_GA_21" id="TotalSoft_PG_GA_21">
					<option value="Size 1"> Small    </option>
					<option value="Size 2"> Medium 1 </option>
					<option value="Size 3"> Medium 2 </option>
					<option value="Size 4"> Big      </option>
				</select>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_22" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose you want border radius for the icon container or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_GA_23" name="">
		            <label for="TotalSoft_PG_GA_23" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the icon hover background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_24" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the icon hover color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_25" class="Total_Soft_Port_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Options</td>			
		</tr>
		<tr>
			<td>Overlay Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the popup overlay color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_26" class="Total_Soft_Port_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Arrows Options</td>			
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the right and the left icons for portfolio, which are for changing images by sequence."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_GA_27">
					<option value="angle-double">   Angle Double   </option>
					<option value="angle">          Angle          </option>
					<option value="arrow-circle">   Arrow Circle   </option>
					<option value="arrow-circle-o"> Arrow Circle O </option>
					<option value="arrow">          Arrow          </option>
					<option value="caret">          Caret          </option>
					<option value="caret-square-o"> Caret Square O </option>
					<option value="chevron-circle"> Chevron Circle </option>
					<option value="chevron">        Chevron        </option>
					<option value="hand-o">         Hand O         </option>
					<option value="long-arrow">     Long Arrow     </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select a color of the left and right icons."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_28" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set a size of the left and right icons."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_GA_29" id="TotalSoft_PG_GA_29">
					<option value="Size 1"> Small    </option>
					<option value="Size 2"> Medium 1 </option>
					<option value="Size 3"> Medium 2 </option>
					<option value="Size 4"> Big      </option>
				</select>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the arrows."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_30" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose you want border radius for the arrows container or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_GA_31" name="">
		            <label for="TotalSoft_PG_GA_31" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the arrows hover background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_32" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the arrows hover color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_33" class="Total_Soft_Port_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Icon For Closing Popup</td>			
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon for closing the popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_GA_34">
					<option value="">     None    </option>
					<option value="f00d"> Times   </option>
					<option value="f015"> Home    </option>
					<option value="f112"> Reply   </option>
					<option value="f021"> Refresh </option>
				</select>
			</td>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the icon color, which is designed to close the popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_35" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select that size, which would be more relevant for portfolio. It is responsive too."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_GA_36" id="TotalSoft_PG_GA_36">
					<option value="Size 1"> Small    </option>
					<option value="Size 2"> Medium 1 </option>
					<option value="Size 3"> Medium 2 </option>
					<option value="Size 4"> Big      </option>
				</select>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the background color for the icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_37" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Border Radius <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose you want border radius for the icon container or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_GA_38" name="">
		            <label for="TotalSoft_PG_GA_38" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the icon hover background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_39" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the icon hover color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_GA_40" class="Total_Soft_Port_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<table class="Total_Soft_AMSetTable" id="Total_Soft_AMSetTable_7">
		<tr class="Total_Soft_Titles">
			<td colspan="4">General Options</td>			
		</tr>
		<tr>
			<td>Text To Show All <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write name that will be appear in the line of menu bar. Here will be included all albums."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_PH_01" id="TotalSoft_PG_PH_01" class="Total_Soft_Select" placeholder=" * Required" value="">
			</td>
			<td>Show Menu <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the menu should appear or not by Yes or No via buttons."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_PH_02" name="TotalSoft_PG_PH_02">
		            <label for="TotalSoft_PG_PH_02" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Icons Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the size for the link and popup icons."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_PH_03" id="TotalSoft_PG_PH_03">
					<option value="Size1"> Small    </option>
					<option value="Size2"> Medium 1 </option>
					<option value="Size3"> Medium 2 </option>
					<option value="Size4"> Big      </option>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Navigation Menu</td>			
		</tr>
		<tr>
			<td>Main Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Identify gallery portfolio navigation main menu background color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_04" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine the background color for the album titles in navigation menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_05" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the menu font color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_06" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine your preferred font size for menu."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_PH_07" id="TotalSoft_PG_PH_07" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_PH_07_Output" for="TotalSoft_PG_PH_07"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="For the menu text choose the font family."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_PH_08">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Hover Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the hover effect type for the navigation menu."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_PH_09">
					<option value="effect01"> Effect 1  </option>
					<option value="effect02"> Effect 2  </option>
					<option value="effect03"> Effect 3  </option>
					<option value="effect04"> Effect 4  </option>
					<option value="effect05"> Effect 5  </option>
					<option value="effect06"> Effect 6  </option>
					<option value="effect07"> Effect 7  </option>
					<option value="effect08"> Effect 8  </option>
					<option value="effect09"> Effect 9  </option>
					<option value="effect10"> Effect 10 </option>
					<option value="effect11"> Effect 11 </option>
					<option value="effect12"> Effect 12 </option>
					<option value="effect13"> Effect 13 </option>
					<option value="effect14"> Effect 14 </option>
					<option value="effect15"> Effect 15 </option>
					<option value="effect16"> Effect 16 </option>
					<option value="effect17"> Effect 17 </option>
					<option value="effect18"> Effect 18 </option>
					<option value="effect19"> Effect 19 </option>
					<option value="effect20"> Effect 20 </option>
					<option value="effect21"> Effect 21 </option>
					<option value="effect22"> Effect 22 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Effect Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color for the hover effect."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_10" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Hover Text Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the text color for hovering the menu."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_11" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Shadow Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select shadow type for the navigation menu."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_PH_12">
					<option value="none">     None      </option>
					<option value="shadow01"> Shadow 1  </option>
					<option value="shadow02"> Shadow 2  </option>
					<option value="shadow03"> Shadow 3  </option>
					<option value="shadow04"> Shadow 4  </option>
					<option value="shadow05"> Shadow 5  </option>
					<option value="shadow06"> Shadow 6  </option>
					<option value="shadow07"> Shadow 7  </option>
					<option value="shadow08"> Shadow 8  </option>
					<option value="shadow09"> Shadow 9  </option>
					<option value="shadow10"> Shadow 10 </option>
					<option value="shadow11"> Shadow 11 </option>
					<option value="shadow12"> Shadow 12 </option>
					<option value="shadow13"> Shadow 13 </option>
					<option value="shadow14"> Shadow 14 </option>
					<option value="shadow15"> Shadow 15 </option>
				</select>
			</td>
			<td>Shadow Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the shadow color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_13" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Image Option</td>			
		</tr>
		<tr>
			<td>Column Count <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select how many images you want to be in one row."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Range" name="TotalSoft_PG_PH_14" id="TotalSoft_PG_PH_14" min="2" max="4" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_PH_14_Output" for="TotalSoft_PG_PH_14"></output>
			</td>
			<td>Standard Height <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose you want fixed height for each image or no."></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_PH_15" name="">
		            <label for="TotalSoft_PG_PH_15" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
		</tr>
		<tr>
			<td>Height <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the fixed height for the images in your gallery."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="" id="TotalSoft_PG_PH_16" min="100" max="800" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_PH_16_Output" for="TotalSoft_PG_PH_16"></output>
			</td>
			<td>Hover Effect <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select type of hover effect for images."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_PH_17">
					<option value="effect01"> Effect 1  </option>
					<option value="effect02"> Effect 2  </option>
					<option value="effect03"> Effect 3  </option>
					<option value="effect04"> Effect 4  </option>
					<option value="effect05"> Effect 5  </option>
					<option value="effect06"> Effect 6  </option>
					<option value="effect07"> Effect 7  </option>
					<option value="effect08"> Effect 8  </option>
					<option value="effect09"> Effect 9  </option>
					<option value="effect10"> Effect 10 </option>
					<option value="effect11"> Effect 11 </option>
					<option value="effect12"> Effect 12 </option>
					<option value="effect13"> Effect 13 </option>
					<option value="effect14"> Effect 14 </option>
					<option value="effect15"> Effect 15 </option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Hover Color 1 <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the color for hover effects."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_18" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Hover Color 2 <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select second color for hover effects."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_19" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Title Option</td>			
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the image title color in gallery."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_20" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Determine your preferred font size for image title."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_PH_21" id="TotalSoft_PG_PH_21" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_PH_21_Output" for="TotalSoft_PG_PH_21"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="For the image title text choose the font family."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_PH_22" id="TotalSoft_PG_PH_22">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Link Icon</td>			
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the type of link icon."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_PH_23">
					<option value="link">                 Link                 </option>
					<option value="external-link">        External Link        </option>
					<option value="external-link-square"> External Link Square </option>
					<option value="paperclip">            Paperclip            </option>
				</select>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for link icon container."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_24" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color for the link icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_25" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the hover background color for the link icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_26" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the hover color for the link icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_27" class="Total_Soft_Port_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Icon</td>			
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the type of popup icon."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_PH_28">
					<option value="camera-retro"> Camera Retro </option>
					<option value="camera">       Camera       </option>
					<option value="eye">          Eye          </option>
					<option value="heart-o">      Heart O      </option>
					<option value="picture-o">    Picture O    </option>
					<option value="search">       Search       </option>
				</select>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for the popup icon container."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_29" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color for the popup icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_30" class="Total_Soft_Port_Color" value="">
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the hover background color for the popup icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_31" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the hover color for the popup icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_32" class="Total_Soft_Port_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Option</td>			
		</tr>
		<tr>
			<td>Open Popup <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose you want to open popup or no. "></i></td>
			<td>
				<div class="switch">
		            <input class="cmn-toggle cmn-toggle-yes-no" type="checkbox" id="TotalSoft_PG_PH_33" name="TotalSoft_PG_PH_33">
		            <label for="TotalSoft_PG_PH_33" data-on="Yes" data-off="No"></label>
		        </div>
			</td>
			<td>Image Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for the image container in popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_34" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Title</td>			
		</tr>
		<tr>
			<td>Text Align <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose text align for title in popup (left, center and right)."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_PH_35" id="TotalSoft_PG_PH_35">
					<option value="left">   Left   </option>
					<option value="right">  Right  </option>
					<option value="center"> Center </option>
				</select>
			</td>
			<td>Font Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Define the font size for the image title in popup."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_PH_36" id="TotalSoft_PG_PH_36" min="8" max="48" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_PH_36_Output" for="TotalSoft_PG_PH_36"></output>
			</td>
		</tr>
		<tr>
			<td>Font Family <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose the font family for the image title in popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_PH_37" id="TotalSoft_PG_PH_37">
					<?php foreach ($TotalSoftFontCount as $Font_Family) :?>
						<option value='<?php echo $Font_Family->Font;?>'><?php echo $Font_Family->Font;?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the backgrounf color for the title and description container in popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_38" class="Total_Soft_Port_Color" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="In the gallery set the color for the image title in popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_39" class="Total_Soft_Port_Color" value="">
			</td>
			<td colspan="2"></td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Arrow</td>			
		</tr>
		<tr>
			<td>Type <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the right and the left icons for portfolio, which are for changing images by sequence."></i></td>
			<td>
				<select class="Total_Soft_Select" name="" id="TotalSoft_PG_PH_40">
					<option value="angle-double">   Angle Double   </option>
					<option value="angle">          Angle          </option>
					<option value="arrow-circle">   Arrow Circle   </option>
					<option value="arrow-circle-o"> Arrow Circle O </option>
					<option value="arrow">          Arrow          </option>
					<option value="caret">          Caret          </option>
					<option value="caret-square-o"> Caret Square O </option>
					<option value="chevron-circle"> Chevron Circle </option>
					<option value="chevron">        Chevron        </option>
					<option value="hand-o">         Hand O         </option>
					<option value="long-arrow">     Long Arrow     </option>
				</select>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for the left and right icons in popup. "></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_41" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the color for the left and right icons in popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_42" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose hover background color for the arrows in popup."></i></td>
			<td>
				<input type="text" name="TotalSoft_PG_PH_43" id="TotalSoft_PG_PH_43" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose arrows hover color in popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_44" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the size for the arrows in popup by pixels."></i></td>
			<td>
				<input type="range" class="TotalSoft_Port_Range TotalSoft_Port_Rangepx" name="TotalSoft_PG_PH_45" id="TotalSoft_PG_PH_45" min="8" max="72" step="1" value="">
				<output class="TotalSoft_Out" name="" id="TotalSoft_PG_PH_45_Output" for="TotalSoft_PG_PH_45"></output>
			</td>
		</tr>
		<tr class="Total_Soft_Titles">
			<td colspan="4">Popup Close Icon</td>			
		</tr>
		<tr>
			<td>Size <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the size for the icon which is for closing the popup."></i></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoft_PG_PH_46" id="TotalSoft_PG_PH_46">
					<option value="Size1"> Small    </option>
					<option value="Size2"> Medium 1 </option>
					<option value="Size3"> Medium 2 </option>
					<option value="Size4"> Big      </option>
				</select>
			</td>
			<td>Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the background color for the popup close icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_47" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the icon color."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_48" class="Total_Soft_Port_Color1" value="">
			</td>
			<td>Hover Background Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Set the hover background color for the popup close icon."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_49" class="Total_Soft_Port_Color1" value="">
			</td>
		</tr>
		<tr>
			<td>Hover Color <span class="TS_Free_version_Span">(Pro)</span> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Choose close icon hover color in popup."></i></td>
			<td>
				<input type="text" name="" id="TotalSoft_PG_PH_50" class="Total_Soft_Port_Color1" value="">
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
</form>