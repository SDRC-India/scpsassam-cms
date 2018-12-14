<?php
	if(!current_user_can('manage_options'))
	{
		die('Access Denied');
	}
	require_once(dirname(__FILE__) . '/Total-Soft-Portfolio-Install.php');
	global $wpdb;
	wp_enqueue_media();
	wp_enqueue_script( 'custom-header' );
	add_filter( 'upload_size_limit', 'PBP_increase_upload' );
	function PBP_increase_upload(  )
	{
	 	return 20480000; // 20MB
	}

	$table_name1 = $wpdb->prefix . "totalsoft_portfolio_settings";
	$table_name2 = $wpdb->prefix . "totalsoft_portfolio_dbt";
	$table_name3 = $wpdb->prefix . "totalsoft_portfolio_id";
	$table_name4 = $wpdb->prefix . "totalsoft_portfolio_manager";
	$table_name5 = $wpdb->prefix . "totalsoft_portfolio_albums";
	$table_name6 = $wpdb->prefix . "totalsoft_portfolio_images";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		if(check_admin_referer( 'edit-menu_'.$comment_id, 'TS_Portfolio_Nonce' ))
		{
			$TotalSoftPortfolio_Title = sanitize_text_field($_POST['TotalSoftPortfolio_Title']);
			$TotalSoftPortfolio_Option = sanitize_text_field($_POST['TotalSoftPortfolio_Option']);
			$TotalSoftPortfolio_AlbumCount = sanitize_text_field($_POST['TotalSoftPortfolio_AlbumCount']);
			$TotalSoftPortfolio_ATitle = array();
			$TotalSoftPortfolio_IT = array();
			$TotalSoftPortfolio_IA = array();
			$TotalSoftPortfolio_IURL = array();
			$TotalSoftPortfolio_IDesc = array();
			$TotalSoftPortfolio_ILink = array();
			$TotalSoftPortfolio_IONT = array();
			for($i=1;$i<=$TotalSoftPortfolio_AlbumCount;$i++)
			{
				$TotalSoftPortfolio_ATitle[$i] = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoftPortfolio_ATitle' . $i])));
			}

			$TotalSoftHidNum = sanitize_text_field($_POST['TotalSoftHidNum']);

			for($j=1;$j<=$TotalSoftHidNum;$j++)
			{
				$TotalSoftPortfolio_IT[$j] = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoftPortfolio_IT_' . $j])));
				$TotalSoftPortfolio_IA[$j] = sanitize_text_field($_POST['TotalSoftPortfolio_IA_' . $j]);
				$TotalSoftPortfolio_IURL[$j] = sanitize_text_field($_POST['TotalSoftPortfolio_IURL_' . $j]);
				$TotalSoftPortfolio_IDesc[$j] = str_replace("\&","&", sanitize_text_field(esc_html($_POST['TotalSoftPortfolio_IDesc_' . $j])));
				$TotalSoftPortfolio_ILink[$j] = sanitize_text_field($_POST['TotalSoftPortfolio_ILink_' . $j]);
				$TotalSoftPortfolio_IONT[$j] = sanitize_text_field($_POST['TotalSoftPortfolio_IONT_' . $j]);
			}
			if(isset($_POST['Total_Soft_Portfolio_Save']))
			{
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name4 (id, TotalSoftPortfolio_Title, TotalSoftPortfolio_Option, TotalSoftPortfolio_AlbumCount) VALUES (%d, %s, %s, %s)", '', $TotalSoftPortfolio_Title, $TotalSoftPortfolio_Option, $TotalSoftPortfolio_AlbumCount));

				$New_Portfolio_ID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d order by id desc limit 1",0));
				$New_Total_SoftPortID=$New_Portfolio_ID[0]->Portfolio_ID + 1;
				$wpdb->query($wpdb->prepare("INSERT INTO $table_name3 (id, Portfolio_ID) VALUES (%d, %s)", '', $New_Total_SoftPortID));
				// $New_Portfolio_ID2=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d order by id desc limit 1",0));
				// $New_Total_SoftPortID=$New_Portfolio_ID2[0]->id;

				for($i=1;$i<=$TotalSoftPortfolio_AlbumCount;$i++)
				{
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoftPortfolio_ATitle, Portfolio_ID) VALUES (%d, %s, %s)", '', $TotalSoftPortfolio_ATitle[$i], $New_Total_SoftPortID));
				}

				for($j=1;$j<=$TotalSoftHidNum;$j++)
				{
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, TotalSoftPortfolio_IT, TotalSoftPortfolio_IA, TotalSoftPortfolio_IURL, TotalSoftPortfolio_IDesc, TotalSoftPortfolio_ILink, TotalSoftPortfolio_IONT, Portfolio_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPortfolio_IT[$j], $TotalSoftPortfolio_IA[$j], $TotalSoftPortfolio_IURL[$j], $TotalSoftPortfolio_IDesc[$j], $TotalSoftPortfolio_ILink[$j], $TotalSoftPortfolio_IONT[$j], $New_Total_SoftPortID));
				}
			}
			else if(isset($_POST['Total_Soft_Portfolio_Update']))
			{
				$Total_SoftPortfolio_Update=sanitize_text_field($_POST['Total_SoftPortfolio_Update']);

				$wpdb->query($wpdb->prepare("UPDATE $table_name4 set TotalSoftPortfolio_Title=%s, TotalSoftPortfolio_Option=%s, TotalSoftPortfolio_AlbumCount=%s WHERE id=%d", $TotalSoftPortfolio_Title, $TotalSoftPortfolio_Option, $TotalSoftPortfolio_AlbumCount, $Total_SoftPortfolio_Update));

				$wpdb->query($wpdb->prepare("DELETE FROM $table_name5 WHERE Portfolio_ID=%s", $Total_SoftPortfolio_Update));
				$wpdb->query($wpdb->prepare("DELETE FROM $table_name6 WHERE Portfolio_ID=%s", $Total_SoftPortfolio_Update));

				for($i=1;$i<=$TotalSoftPortfolio_AlbumCount;$i++)
				{
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name5 (id, TotalSoftPortfolio_ATitle, Portfolio_ID) VALUES (%d, %s, %s)", '', $TotalSoftPortfolio_ATitle[$i], $Total_SoftPortfolio_Update));
				}

				for($j=1;$j<=$TotalSoftHidNum;$j++)
				{
					$wpdb->query($wpdb->prepare("INSERT INTO $table_name6 (id, TotalSoftPortfolio_IT, TotalSoftPortfolio_IA, TotalSoftPortfolio_IURL, TotalSoftPortfolio_IDesc, TotalSoftPortfolio_ILink, TotalSoftPortfolio_IONT, Portfolio_ID) VALUES (%d, %s, %s, %s, %s, %s, %s, %s)", '', $TotalSoftPortfolio_IT[$j], $TotalSoftPortfolio_IA[$j], $TotalSoftPortfolio_IURL[$j], $TotalSoftPortfolio_IDesc[$j], $TotalSoftPortfolio_ILink[$j], $TotalSoftPortfolio_IONT[$j], $Total_SoftPortfolio_Update));
				}
			}
		}
	    else
	    {
	        wp_die('Security check fail'); 
	    }
	}

	$TotalSoftPortfolioOptions=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id>%d", 0));
	$TotalSoftPortfolio=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name4 WHERE id>%d", 0));
	$TotalSoftPortfolioShortID=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name3 WHERE id>%d order by id desc limit 1",0));
?>
<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('../CSS/totalsoft.css',__FILE__);?>">
<form method="POST" enctype="multipart/form-data">
	<script src='<?php echo plugins_url('../JS/tinymce.js',__FILE__);?>'></script>
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
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Creating New Portfolio"></i>
			<input type="button" name="" value="New Portfolio" class="Total_Soft_Portfolio_AMD2_But" onclick="Total_Soft_Portfolio_AMD2_But1(<?php echo $TotalSoftPortfolioShortID[0]->id+1;?>)">
		</div>
		<div class="Total_Soft_Portfolio_AMD3">
			<i class="Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Canceling"></i>
			<input type="button" value="Cancel" class="Total_Soft_Portfolio_AMD2_But" onclick='TotalSoft_Reload()'>
			<i class="Total_Soft_Portfolio_Save Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Saving Settings"></i>
			<input type="submit" name="Total_Soft_Portfolio_Save" value="Save" class="Total_Soft_Portfolio_Save Total_Soft_Portfolio_AMD2_But">
			<i class="Total_Soft_Portfolio_Update Total_Soft_Help totalsoft totalsoft-question-circle-o" title="Click for Updating Settings"></i>
			<input type="submit" name="Total_Soft_Portfolio_Update" value="Update" class="Total_Soft_Portfolio_Update Total_Soft_Portfolio_AMD2_But">
			<input type="text" style="display:none" name="Total_SoftPortfolio_Update" id="Total_SoftPortfolio_Update">
		</div>
	</div>
	<table class="Total_Soft_PortfolioAMMTable">
		<tr class="Total_Soft_PortfolioTMMTableFR">
			<td>No</td>
			<td>Portfolio Name</td>
			<td>Portfolio Option</td>
			<td>Albums/Images</td>
			<td>Actions</td>
		</tr>
	</table>

	<table class="Total_Soft_PortfolioAMOTable">
	 	<?php for($i=0;$i<count($TotalSoftPortfolio);$i++){
	 		$TotalSoftPortfolioImages=$wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name6 WHERE Portfolio_ID=%s", $TotalSoftPortfolio[$i]->id));
	 		?> 
	 		<tr id="Total_Soft_PortfolioAMOTable_tr_<?php echo $TotalSoftPortfolio[$i]->id;?>">
				<td><?php echo $i+1;?></td>
				<td><?php echo $TotalSoftPortfolio[$i]->TotalSoftPortfolio_Title;?></td>
				<td><?php echo $TotalSoftPortfolio[$i]->TotalSoftPortfolio_Option;?></td>
				<td><?php echo $TotalSoftPortfolio[$i]->TotalSoftPortfolio_AlbumCount;?>/<?php echo count($TotalSoftPortfolioImages);?></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-file-text" onclick="TotalSoftPortfolio_Clone(<?php echo $TotalSoftPortfolio[$i]->id;?>)"></i></td>
				<td><i class="Total_Soft_icon totalsoft totalsoft-pencil" onclick="TotalSoftPortfolio_Edit(<?php echo $TotalSoftPortfolio[$i]->id;?>)"></i></td>
				<td>
					<i class="Total_Soft_icon totalsoft totalsoft-trash" onclick="TotalSoftPortfolio_Del(<?php echo $TotalSoftPortfolio[$i]->id;?>)"></i>
					<span class="Total_Soft_Portfolio_Del_Span">
						<i class="Total_Soft_Portfolio_Del_Span_Yes totalsoft totalsoft-check" onclick="TotalSoftPortfolio_Del_Yes(<?php echo $TotalSoftPortfolio[$i]->id;?>)"></i>
						<i class="Total_Soft_Portfolio_Del_Span_No totalsoft totalsoft-times" onclick="TotalSoftPortfolio_Del_No(<?php echo $TotalSoftPortfolio[$i]->id;?>)"></i>
					</span>
				</td>
			</tr>
	 	<?php }?> 
	</table>
	<table class="Total_Soft_AMShortTable">
		<tr style="text-align:center">
			<td>Shortcode</td>
			<td>Templete Include</td>
		</tr>
		<tr style="text-align:center">
			<td>Copy & paste the shortcode directly into any WordPress post or page.</td>
			<td>Copy & paste this code into a template file to include the portfolio within your theme.</td>
		</tr>
		<tr>
			<td class="Total_Soft_Portfolio_ID"></td>
			<td class="Total_Soft_Portfolio_TID"></td>
		</tr>
	</table>
	<table class="Total_Soft_PortfolioAMTable">
		<tr>
			<td>Portfolio Title <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write your Gallery Portfolio’s name. Every time for create new one , must complete this line."></i></td>
			<td>Portfolio Option <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select the option that you previously created in General Option section."></i></td>
			<td>Albums Count <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select for Gallery several Portfolio options will be."></i></td>
		</tr>
		<tr>
			<td><input type="text" name="TotalSoftPortfolio_Title" id="TotalSoftPortfolio_Title" class="Total_Soft_Select" required placeholder=" * Required"></td>
			<td>
				<select class="Total_Soft_Select" name="TotalSoftPortfolio_Option" id="TotalSoftPortfolio_Option">
					<?php for($i=0;$i<count($TotalSoftPortfolioOptions);$i++){?>
						<option value="<?php echo $TotalSoftPortfolioOptions[$i]->TotalSoftPortfolio_SetName;?>"><?php echo $TotalSoftPortfolioOptions[$i]->TotalSoftPortfolio_SetName;?></option>
					<?php }?>
				</select>
			</td>
			<td>
				<select name="TotalSoftPortfolio_AlbumCount" id="TotalSoftPortfolio_AlbumCount" onchange="TotalSoftPortfolio_ACount()">
					<?php for($i=1;$i<20;$i++){?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
					<?php }?>
				</select>
				<input type="text" style="display:none;" id="TotalSoftPortfolio_AlbumCountHid" value="1">
			</td>
		</tr>
		<tr>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td> Album Title 1 <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write a title of the album.It is also designed for Menu."></i></td>
			<td colspan="2"><input type="text" name="TotalSoftPortfolio_ATitle1" id="TotalSoftPortfolio_ATitle1" class="Total_Soft_Select" placeholder=" * Required"></td>
		</tr>
		<?php for($i=2;$i<20;$i++){?>
			<tr class="TotalSoftHiddenRows" id="TotalSoftHiddenRows_<?php echo $i;?>">
				<td> Album Title <?php echo $i;?> <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write a title of the album.It is also designed for Menu."></i></td>
				<td colspan="2"><input type="text" name="TotalSoftPortfolio_ATitle<?php echo $i;?>" id="TotalSoftPortfolio_ATitle<?php echo $i;?>" class="Total_Soft_Select" placeholder=" * Required"></td>
			</tr>
		<?php }?>
		<tr>
			<td colspan="3"></td>
		</tr>
		<tr>
			<td colspan="3">Add Image</td>
		</tr>
		<tr>
			<td>Image Title <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Name your image , which also will be heading."></i></td>
			<td colspan="2"><input type="text" name="TotalSoftPortfolio_ImTitle" id="TotalSoftPortfolio_ImTitle" class="Total_Soft_Select" placeholder=" * Required"></td>
		</tr>
		<tr>
			<td>Select Album <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Select that album in which you want to be your entitled own picture and description."></i></td>
			<td colspan="2">
				<select class="Total_Soft_Select" name="TotalSoftPortfolio_ImAlbum" id="TotalSoftPortfolio_ImAlbum">
					<?php for($i=1;$i<20;$i++){?>
						<option value="<?php echo $i?>" class="TotalSoftPortfolio_ImAlbum" id="TotalSoftPortfolio_ImAlbum_<?php echo $i?>">Album Title <?php echo $i?></option>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td> 
				<div id="wp-content-media-buttons" class="wp-media-buttons" >													
					<a href="#" class="button insert-media add_media" style="border:1px solid #009491; color:#009491; background-color:#f4f4f4" data-editor="TotalSoftPortfolio_ImURL_1" title="Add Image" id="TotalSoftPortfolio_ImURL" onclick="TotalSoftPortfolio_ImURL_Clicked()">
						<span class="wp-media-buttons-icon"></span>Add Image
					</a>
				</div>
				<input type="text" style="display:none;" id="TotalSoftPortfolio_ImURL_1">	
			</td>
			<td colspan="2"><input type="text" id="TotalSoftPortfolio_ImURL_2" class="Total_Soft_Select" readonly></td>
		</tr>
		<tr>
			<td></td>
			<td>Image Description <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="Write some information about Gallery content."></i></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="3">
				<textarea class="Total_Soft_Select Total_Soft_Desc" name="TotalSoftPortfolio_ImDesc" id="TotalSoftPortfolio_ImDesc"></textarea>
			</td>
		</tr>
		<tr>
			<td>Link <i class="Total_Soft_Help1 totalsoft totalsoft-question-circle-o" title="It is instended for referance. Tick for opening the link in the new page or in the same page."></i></td>
			<td><input type="text" name="TotalSoftPortfolio_ImLink" id="TotalSoftPortfolio_ImLink" class="Total_Soft_Select"></td>
			<td>New Tab   <input type="checkbox" class="Total_Soft_Check" checked="check" id="TotalSoftPortfolio_ImONT" name="TotalSoftPortfolio_ImONT"></td>
		</tr>
		<tr>
			<td colspan="3">
				<input type="button" class="Total_Soft_Portfolio_Image_But" onclick="Total_Soft_Portfolio_Img_Res()" value="Reset">
				<input type="button" class="Total_Soft_Portfolio_Image_But" id="Total_Soft_Portfolio_SavIm" onclick="Total_Soft_Portfolio_Img_Sav()" value="Save Image">
				<input type="button" class="Total_Soft_Portfolio_Image_But" id="Total_Soft_Portfolio_UpdIm" onclick="Total_Soft_Portfolio_Img_Update()" value="Update Image">
				<input type="text" style="display:none;" id="TotalSoftHidNum" name="TotalSoftHidNum" value="0">
				<input type="text" style="display:none;" id="TotalSoftHidUpdate" value="0">
			</td>
		</tr>
	</table>

	<table class="Total_Soft_AMImageTable">
		<tr>
			<td>No</td>
			<td>Image Title</td>
			<td>Image Album</td>
			<td>Image</td>
			<td>Edit</td>
			<td>Delete</td>
		</tr>		
	</table>	
	<ul id="TotalSoftPortfolioUl" onclick="TotalSoftPortfolioUlSort()">
		
	</ul>
</form>