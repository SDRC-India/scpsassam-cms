<?php
class Font extends FontLib\Font {
	// This is a namespace fix for $dompdf->render();
}

class SupsysticTablesPro_Exporter_Type_Pdf implements SupsysticTablesPro_Exporter_Interface
{
	/**
	 * @var string
	 */
	protected $domPdfPath;

	/**
	 * @param string $domPdfPath
	 */
	public function __construct($domPdfPath)
	{
		$this->domPdfPath = $domPdfPath;
	}

	public function getColorParams($current){
		$fullColor = '';
		$fullBgcolor = '';

		foreach($current as $colorParam){
			if (iconv_strlen($colorParam) == 9){
				$pattern_outer = '/^[a-z-]{3}[a-z0-9]{6}/';
				preg_match($pattern_outer, $colorParam, $matches, PREG_OFFSET_CAPTURE);
				$pattern_inner = '/[a-z0-9]{6}/';
				preg_match($pattern_inner, $matches[0][0], $bgcolor, PREG_OFFSET_CAPTURE);
				$fullBgcolor = "background-color:#".$bgcolor[0][0].";";
			}
			else if (iconv_strlen($colorParam) == 12){
				$pattern_outer = '/^[a-z-]{6}[a-z0-9]{6}/';
				preg_match($pattern_outer, $colorParam, $matches, PREG_OFFSET_CAPTURE);
				$pattern_inner = '/[a-z0-9]{6}/';
				preg_match($pattern_inner, $matches[0][0], $color, PREG_OFFSET_CAPTURE);
				$fullColor = "color:#".$color[0][0].";";
			}
		}
		return " style='vertical-align:middle;".$fullColor.$fullBgcolor."'";
	}

	/**
	 * {@inheritdoc}
	 */
	public function export(array $data)
	{
		$is_frontend = !empty($_REQUEST['pdf-table-data']) ? true : false;
		$html = '<html><head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8;"/>
				<style>
					@font-face {
					  font-family: DejaVu;
					  font-style: normal;
					  font-weight: bold;
					  src: url(fonts/DejaVuSans.ttf) format("truetype");
					}
					body {
						font-family: DejaVu, Arial, sans-serif !important;
						font-size:13px;
					}
					#wrapper table th, #wrapper table td {
						font-family: DejaVu, Arial, sans-serif !important;
						font-size: 13px;
						margin:0;
						padding: 10px 20px 5px 20px;
						vertical-align: middle;
						line-height: 30px;
						border:1px solid #ccc;
					}
				</style></head><body><div id="wrapper">';

		if ($is_frontend) {
			// Frontend Export
			$export_data = $_REQUEST['pdf-table-data'];
			$columns = !empty($_REQUEST['columns']) ? $_REQUEST['columns'] : 10;
			$hostnames = array(
				implode('', array('http', '://', $_SERVER['HTTP_HOST'])),
				implode('', array('https', '://', $_SERVER['HTTP_HOST'])),
				implode('', array('//', $_SERVER['HTTP_HOST']))
			);

			if (is_array($export_data)) {
				foreach ($export_data as $piece) {
					$htmlData = urldecode(base64_decode($piece));
					$html .= $htmlData;
				}
			} else {
				$html .= urldecode(base64_decode($export_data));
			}
			$html = str_replace($hostnames, '.', $html);
		} else {
			// Backend Export
			$columns = !empty($data) && !empty($data[0]['cells']) ? count($data[0]['cells']) : 10;
			$html .= '<table>';

			foreach ($data as $rowIndex => $row) {
				$html.="<tr>";
				foreach ($row['cells'] as $colIndex => $cell) {
					$html.="<td ".$this->getColorParams($cell['meta']).">";
					if (isset($cell['calculatedValue'])){
						$html.=nl2br($cell['calculatedValue']);
					} else {
						$html.=nl2br($cell['data']);
					}
					$html.="</td>";
				}
				$html.="</tr>";
			}
			$html.='</table>';
		}
		$html.='</div></body></html>';

		$memory_limit = false;
		$columns = (int) $columns;
		$paper_size = 'A4';

		if($columns > 5) {
			$paper_size = 'A3';
		}
		if($columns > 10) {
			$paper_size = 'A2';
		}
		if(strlen(ini_get('memory_limit')) < 4) {
			ini_set('memory_limit', '12000M');
		}

		$dompdf = new Dompdf();
		$dompdf->set_option('enable_html5_parser', true);
		if ($is_frontend) {
			$dompdf->set_option('temp_dir', get_temp_dir());
			$dompdf->set_base_path($_SERVER['DOCUMENT_ROOT']);
		}
		$dompdf->load_html($html);
		$dompdf->set_paper($paper_size, $_REQUEST['orientation']);
		@$dompdf->render();
		print $dompdf->output();
	}
}
