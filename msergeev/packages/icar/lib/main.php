<?php

namespace MSergeev\Packages\Icar\Lib;

class Main
{
	public static function moneyFormat ($value=0,$input=false)
	{
		if ($input)
			return number_format($value,2,'.','');
		else
			return number_format($value,2,',',' ');
	}

	public static function mileageFormat ($value,$input=false)
	{
		if ($input)
			return number_format($value,1,'.','');
		else
			return number_format($value,1,',',' ');
	}

	public static function showChartsOdo ($from=null, $to=null, $xTitle='', $yTitle='', $chartWidth=1000, $chartHeight=500)
	{
		if ($xTitle=='')
		{
			$xTitle="Дата";
		}
		if ($yTitle=='')
		{
			$yTitle="Километраж";
		}
		if ($chartWidth<=0)
		{
			$chartWidth=1000;
		}
		if ($chartHeight<=0)
		{
			$chartHeight=500;
		}
		if (is_null($from) || is_null($to))
		{
			$nowYear = date('Y');
			$nowMonth = date('m');
			$nowDay = date('d');

			if (intval($$nowDay)>=1 && intval($$nowDay) <=9)
			{
				$to = '0'.$nowDay;
			}
			else
			{
				$to = $nowDay;
			}
			$from = '01.'.$nowMonth.'.'.$nowYear;
			$to .= '.'.$nowMonth.'.'.$nowYear;
		}

		$title = 'Данные за период: с '.$from.' по '.$to;
		$arData = array();

		if (!empty($arData))
		{
			$echo = "<div id=\"curve_chart\" style=\"width: ".$chartWidth."px; height: ".$chartHeight."px\"></div>\n";
			$echo .= "\t<script type=\"text/javascript\" src=\"https://www.google.com/jsapi?autoload={\n";
			$echo .= "\t\t'modules':[{\n\t\t'name':'visualization',\n\t\t'version':'1',\n\t\t'packages':['corechart']\n\t\t}]\n\t}\"></script>\n";
			$echo .= "\t<script type=\"text/javascript\">\n\tgoogle.setOnLoadCallback(drawChart);\n\n";
			$echo .= "\t\tfunction drawChart() {\n";
			$echo .= "\t\t\tvar data = google.visualization.arrayToDataTable([\n";
			$echo .= "\t\t\t\t['".$xTitle."', '".$yTitle."']";

			foreach ($arData as $x => $y)
			{
				$echo .= ",\n\t\t\t\t['".$x."',  ".$y."]";
			}

			$echo .= "\n\t\t\t]);\n";
			$echo .= "\t\t\tvar options = {\n";

			$echo .= "\t\t\t\ttitle: '".$title."',\n";
			$echo .= "\t\t\t\tcurveType: 'function',\n";
			$echo .= "\t\t\t\tlegend: { position: 'bottom' }\n";
			$echo .= "\t\t\t};\n\n";

			$echo .= "\t\t\tvar chart = new google.visualization.LineChart(document.getElementById('curve_chart'));\n";
			$echo .= "\t\t\tchart.draw(data, options);\n";
			$echo .= "\t\t}\n";
			$echo .= "\t</script>\n";

			return $echo;
		}
		else
		{
			return false;
		}

	}
}