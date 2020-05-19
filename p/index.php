<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-more.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<?php
$db_user = 'oystersio';
$db_password = 'Mikes1499!';
$db_host = 'oystersio.db.3543022.hostedresource.com';
$db_name = 'oystersio';

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

if(isset($_GET['oyster'])){
	$oyster_slug = $mysqli->real_escape_string(trim($_GET['oyster']));
	$q = sprintf("SELECT * FROM oysters WHERE slug = '%s'",$oyster_slug);
	$data = $mysqli->query($q);
	
	while($o = $data->fetch_assoc()){
		$oyster = $o;
	}
	
}
	

?>
<script type="text/javascript">
$(function () {

    $('#container').highcharts({

        chart: {
            polar: true,
            type: 'area'
        },

        title: {
            text: 'Taste Profile',
            x: -80
        },

        pane: {
            size: '80%'
        },

        xAxis: {
            categories: ['Metallic', 'Sweet', 'Salty', 'Fruity',
                    'Umami', 'Vegetal', 'Mineral', 'Chewy', 'Creamy'],
            tickmarkPlacement: 'on',
            lineWidth: 0
        },

        yAxis: {
            gridLineInterpolation: 'polygon',
            lineWidth: 0,
			endOnTick:false,
            min: 0
        },

        tooltip: {
            shared: true,
            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
        },

        legend: {
            enabled: 0,
            
        },

        series: [{
            
            data: [<?php echo $oyster['taste_metallic'];?>, <?php echo $oyster['taste_sweet'];?>, <?php echo $oyster['taste_salty'];?>, <?php echo $oyster['taste_fruity'];?>, <?php echo $oyster['taste_umami'];?>, <?php echo $oyster['taste_vegetal'];?>, <?php echo $oyster['taste_mineral'];?>,<?php echo $oyster['taste_chewy'];?>,<?php echo $oyster['taste_buttery'];?>],
            pointPlacement: 'on'
        }]

    });
});
</script>


<title>Oyster Taste Profile for <?php echo $oyster['name'];?> by <?php echo $oyster['farm'];?></title>
<style type="text/css">
<!--
body {
	background-image: url(../dark_wall.png);
	background-repeat: repeat;
	margin-left: 0px;
	margin-top: 0px;
}
body,td,th {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}
.style2 {font-size: 30px}
.style4 {font-size: 30px; color: #0066CC; }
-->
</style></head>

<body>
<br />
<table width="940" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center"><a href="../index.php"><img src="../title.png" alt="oyster.io - oyster tasting profile and grid" width="642" height="133" border="0" /></a></div></td>
  </tr>
</table>
<br/>
<table width="940" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="490" valign="top"><span class="style4"><?php echo $oyster['name'];?></span><br />
    <br />
    <?php echo $oyster['description'];?></td>
    <td width="50">&nbsp;</td>
    <td width="400" valign="top"><p><img src="../img/<?php echo $oyster['main_pic'];?>" width="400" border="0" /></p>
    </td>
  </tr>
</table>

<table width="940" height="50" border="0" align="center" cellpadding="0" cellspacing="0" background="../break.png">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="940" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="400"><div id="container" style="min-width: 400px; max-width: 400px; height: 400px; margin: 0 auto"></div></td>
    <td width="50">&nbsp;</td>
    <td width="490" valign="top"><span class="style4">Taste Profile </span><br />
    <br />
    Metallic: <?php echo $oyster['taste_metallic'];?><br />
    Sweet: <?php echo $oyster['taste_sweet'];?><br />
    Salty: <?php echo $oyster['taste_salty'];?><br />
    Fruity: <?php echo $oyster['taste_fruity'];?><br />
    Umami: <?php echo $oyster['taste_umami'];?><br />
    Vegetal: <?php echo $oyster['taste_vegetal'];?><br />
    Mineral: <?php echo $oyster['taste_mineral'];?><br />
    Firmness/Chewy: <?php echo $oyster['taste_chewy'];?><br />
    Creamy: <?php echo $oyster['taste_buttery'];?><br />
    <br />
    Other: <?php echo $oyster['taste_other'];?></td>
  </tr>
</table>
<table width="940" height="50" border="0" align="center" cellpadding="0" cellspacing="0" background="../break.png">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="940" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="450" valign="top"><span class="style4">Sight</span><br />
      <br />
Shell Roughness: <?php echo $oyster['sight_shell_roughness'];?><br />
Shell Deepness: <?php echo $oyster['sight_shell_depth'];?><br />
Fluted: <?php echo $oyster['sight_fluted'];?><br />
Shell Color: <?php echo $oyster['sight_shell_color'];?><br />
<br />
Other: <?php echo $oyster['sight_other'];?></td>
    <td width="40">&nbsp;</td>
    <td width="450" valign="top"><span class="style4">Nose</span><br />
    <br />
Fruity: <?php echo $oyster['nose_fruity'];?><br />
<br />
Other: <?php echo $oyster['nose_other'];?></p>
    </td>
  </tr>
</table>
<table width="940" height="50" border="0" align="center" cellpadding="0" cellspacing="0" background="../break.png">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="940" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="490" valign="top"><span class="style4">Details</span><br />
<br />
Farm: <?php echo $oyster['farm'];?><br />
Species: <?php echo $oyster['species'];?><br />
<br />
Region: <?php echo $oyster['region'];?><br />
Sub Region: <?php echo $oyster['sub_region'];?><br />
Micro Region: <?php echo $oyster['micro_region'];?><br />
<br />
Age: <?php echo $oyster['age'];?><br />
<br />
Culture Technique: <?php echo $oyster['culture_technique'];?><br />
<br />
Other: <?php echo $oyster['details_other'];?></td>
    <td width="50" valign="top"><p>&nbsp;</p>
    </td>
    <td width="400" valign="top"><?php echo $oyster['google_maps_embed'];?></td>
  </tr>
</table>

</body>
</html>
