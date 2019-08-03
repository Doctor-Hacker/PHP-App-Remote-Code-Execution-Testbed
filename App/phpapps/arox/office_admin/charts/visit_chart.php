<?php
      //include charts.php in your script
      include "charts.php";
      
      //send the new chart data to the charts.swf flash file
if (isset($_GET['disp']) && $_GET['disp']=="visit"){
	$cont_data = $_GET['content'];
	$expdata   = explode("$", $cont_data);
	
	for ($m=0; $m<count($expdata); $m++){
		 $chart['chart_data'][] = explode("*",$expdata[$m]);
	}
	
	$chart[ 'axis_category' ] = array ( 'size'=>12, 'color'=>"0055E3", 'alpha'=>50, 'font'=>"verdana", 'bold'=>true, 'skip'=>0 ,'orientation'=>"horizontal" ); 
	$chart[ 'axis_ticks' ] = array ( 'value_ticks'=>false, 'category_ticks'=>false );
	$chart[ 'axis_value' ] = array ( 'alpha'=>0 );
	
	$chart[ 'chart_border' ] = array ( 'top_thickness'=>0, 'bottom_thickness'=>0, 'left_thickness'=>0, 'right_thickness'=>0 );
	$chart[ 'chart_grid_h' ] = array ( 'thickness'=>0 );
	$chart[ 'chart_pref' ] = array ( 'rotation_x'=>rand(20,40), 'rotation_y'=>rand(20,40) ); 
	$chart[ 'chart_rect' ] = array ( 'x'=>-60, 'y'=>70, 'width'=>600, 'height'=>280, 'positive_alpha'=>0, 'negative_alpha'=>25 );
	$chart[ 'chart_type' ] = "3d column" ;
	$chart[ 'chart_value' ] = array ( 'hide_zero'=>true, 'color'=>"000000", 'alpha'=>80, 'size'=>10, 'position'=>"over", 'prefix'=>"", 'suffix'=>"", 'decimals'=>0, 'separator'=>"", 'as_percentage'=>true );
	
	$chart[ 'legend_label' ] = array ( 'layout'=>"vertical", 'font'=>"verdana", 'bold'=>true, 'size'=>12, 'color'=>"621118", 'alpha'=>100 ); 
	$chart[ 'legend_rect' ] = array ( 'x'=>30, 'y'=>10, 'width'=>50, 'height'=>40, 'margin'=>5, 'fill_color'=>"000066", 'fill_alpha'=>0, 'line_color'=>"000000", 'line_alpha'=>0, 'line_thickness'=>0 ); 
	
	$chart[ 'live_update' ] = array ( 'url'=>"php/Gallery_3D_Column_1.php?time=".time(), 'delay'=>5 );
	
	$chart[ 'series_color' ] = array ("90000A","EFAE88" ); 
	$chart[ 'series_gap' ] = array ( 'bar_gap'=>10, 'set_gap'=>20) ; 
  }
  
  if (isset($_GET['disp']) && $_GET['disp']=="browser"){
		$cont_data = $_GET['content'];
		$expdata = explode("$", $cont_data);
		
		for ($m=0;$m<count($expdata);$m++){
			 $chart['chart_data'][] = explode("*",$expdata[$m]);
		}
		
		$chart[ 'chart_grid_h' ] = array ( 'thickness'=>0 );
		$chart[ 'chart_pref' ] = array ( 'rotation_x'=>60 ); 
		$chart[ 'chart_rect' ] = array ( 'x'=>160, 'y'=>50, 'width'=>300, 'height'=>200, 'positive_alpha'=>0 );
		$chart[ 'chart_transition' ] = array ( 'type'=>"spin", 'delay'=>.5, 'duration'=>.75, 'order'=>"category" );
		$chart[ 'chart_type' ] = "3d pie";
		$chart[ 'chart_value' ] = array ( 'color'=>"000000", 'alpha'=>65, 'font'=>"arial", 'bold'=>true, 'size'=>10, 'position'=>"inside", 'prefix'=>"", 'suffix'=>"", 'decimals'=>0, 'separator'=>"", 'as_percentage'=>true );
		
		$chart[ 'draw' ] = array ( array ( 'type'=>"text", 'color'=>"000000", 'alpha'=>4, 'size'=>40, 'x'=>-50, 'y'=>260, 'width'=>500, 'height'=>50, 'text'=>"56789012345678901234", 'h_align'=>"center", 'v_align'=>"middle" )) ;
		
		$chart[ 'legend_label' ] = array ( 'layout'=>"horizontal", 'bullet'=>"circle", 'font'=>"arial", 'bold'=>true, 'size'=>12, 'color'=>"ffffff", 'alpha'=>85 ); 
		$chart[ 'legend_rect' ] = array ( 'x'=>0, 'y'=>45, 'width'=>50, 'height'=>210, 'margin'=>10, 'fill_color'=>"ffffff", 'fill_alpha'=>10, 'line_color'=>"000000", 'line_alpha'=>0, 'line_thickness'=>0 );  
		$chart[ 'legend_transition' ] = array ( 'type'=>"dissolve", 'delay'=>0, 'duration'=>1 );
		
		$chart[ 'series_color' ] = array ( "00ff88", "ffaa00","44aaff", "aa00ff" ); 
		$chart[ 'series_explode' ] = array ( 25, 75, 0, 0 );
  }
  SendChartData ( $chart );
?>
