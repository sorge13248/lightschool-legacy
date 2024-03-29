<?php include_once "base.php";
if($_SESSION['Username'] != ''){
?>
<html>
  <head>
    <title><?= $TRAD_school ?> - LightSchool</title>
    <?php include_once "style_$USER_skin.php"; ?>
    <script type="text/javascript">
      $(document).ready(function(){
	$("#schools").on("mouseenter", ".cards", function(e){
	  $(this).children(".caption").attr("style", "top: -155px; bottom: auto; height: 132px;");
	});
	$("#schools").on("mouseleave", ".cards", function(e){
	  $(this).children(".caption").attr("style", "");
	});
	$("area").click(function(){
	  var title = $(this).attr("title");
	  window.location.href = "<?= $MY_MAIN_DIRECTORY ?>/schools?regione="+title;
	});
	$("#schools").on("click", ".info_button_school", function(e){
	  $('#details_dialog').html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	  var card_id = $(this).attr("id");
	  $("#dialog_overlay").fadeIn(200);
	  $("#details_dialog").fadeIn(200);
	  $('#details_dialog').load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=school_card&id=' + card_id);
	});
	
	$("#search_sc").click(function(e){
	  var value = $('.q2').val();
	  window.current_search = value;
	  $('#load_schools').html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_loading ?>");
	  $('#load_schools').load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=schools&regione=<?= $_GET['regione'] ?>&school=' + value);
	  return false;
	});
      });
      
      function join_leave_school(id){
	$.ajax({
	  type: "POST",
	  url: "<?= $MY_MAIN_DIRECTORY ?>/formpost.php?type=join_leave_school",
	  data: "id="+id,
	  success: function(html){
	    if(html.indexOf("scuola") > -1){
	      $(".toast").css("background-color", "darkgreen");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/tick.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	      
	      $('#load_schools').load('<?= $MY_MAIN_DIRECTORY ?>/view_management.php?SQL_type=schools&regione=<?= $_GET['regione'] ?>&school=' + window.current_search);
	    }else{
	      $(".toast").css("background-color", "red");
	      $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set1.'/cross.png' ?>' style='width: 14px; height: 14px; margin-right: 5px' />"+html);
	    }
	  },
	  beforeSend:function(){
	    $(".toast").css('background-color', 'orange');
	    $(".toast").html("<img src='<?= $IMAGES_MAIN_DIRECTORY.'/'.$USER_icon_set2.'/loading.gif' ?>' style='width: 14px; height: 14px; margin-right: 5px' /><?= $TRAD_executing ?>");
	  }
	});
	$(".toast").slideDown(400);
      }
    </script>
    <style type="text/css">
      area{
	cursor: pointer;
      }
    </style>
    <div class="details_dialog" id="details_dialog"></div>
  </head>
  <body>
    <?php include "menu.php"; ?>
    <div class="content" id="schools">
      <?php if($_GET['regione'] == "Abruzzo" or $_GET['regione'] == "Basilicata" or $_GET['regione'] == "Calabria" or $_GET['regione'] == "Emilia_Romagna" or $_GET['regione'] == "Friuli_Venezia_Giulia" or $_GET['regione'] == "Lazio" or $_GET['regione'] == "Liguria" or $_GET['regione'] == "Lombardia" or $_GET['regione'] == "Marche" or $_GET['regione'] == "Molise" or $_GET['regione'] == "Piemonte" or $_GET['regione'] == "Puglia" or $_GET['regione'] == "Sardegna" or $_GET['regione'] == "Sicilia" or $_GET['regione'] == "Toscana" or $_GET['regione'] == "Trentino_Alto_Adige" or $_GET['regione'] == "Umbria" or $_GET['regione'] == "Valle d'Aosta" or $_GET['regione'] == "Veneto" or $_GET['outside'] == "y"){
	$text_regione = str_replace("_", " ", $_GET['regione']);
	if($_GET['outside'] == "y"){ ?>
	  <h2><?= $TRAD_outside_school ?></h2>
	<?php }else{ ?>
	  <h2><?= $TRAD_school_region ?> <?php echo($text_regione); ?></h2>
	<?php } ?>
	<form method="post" action="">
	  <input type="text" id="q2" class="q2" name="school" placeholder="<?= $TRAD_school_search ?>" style="width: calc(100% - 150px) !important; max-width: 700px !important" value="<?= $_GET['school'] ?>" /><input type="submit" style="margin-left: 20px" id="search_sc" value="<?= $TRAD_search2 ?>" />
	</form>
	<div id="load_schools"></div>
      <?php }else{ ?>
	<h2><?= $TRAD_school_welcome ?></h2>
	<div class="state_italy">
	  <img id="Image-Maps-Com-image-maps-2015-07-25-073908" src="<?= $IMAGES_MAIN_DIRECTORY ?>/italia.png" border="0" style="width: 100%; height: auto; margin-top: -20px" usemap="#image-maps-2015-07-25-073908" alt="" />
	  <map name="image-maps-2015-07-25-073908" id="ImageMapsCom-image-maps-2015-07-25-073908">
	    <area alt="" title="Valle d'Aosta" shape="poly" coords="274,353,244,342,229,338,208,354,194,353,180,358,171,369,164,360,148,350,149,363,118,372,119,397,134,410,147,408,149,441,163,451,191,445,211,433,233,432,248,436,268,434,283,420,284,402,273,380" style="outline: none" target="_self" />
	    <area alt="" title="Piemonte" shape="poly" coords="287,336,279,355,273,381,281,402,278,423,266,434,240,435,221,430,212,430,203,442,193,443,177,450,163,452,173,465,164,477,166,499,155,501,125,522,113,516,91,523,98,547,105,547,111,567,133,582,148,584,159,611,148,615,144,625,136,642,127,649,139,668,131,679,149,712,167,722,199,731,245,725,254,736,284,744,289,731,303,728,303,705,311,690,317,676,327,667,340,657,349,668,361,655,393,658,403,656,415,646,427,641,428,627,448,628,464,642,471,639,476,605,462,594,455,589,451,571,443,572,442,563,426,551,427,546,396,546,388,521,372,517,375,499,366,478,372,474,387,476,395,496,400,484,402,471,422,469,395,419,399,412,385,399,380,375,380,358,399,332,400,311,382,295,361,271,365,236,351,234,339,248,327,268,317,272,307,278,320,295,302,315" style="outline: none" target="_self" />
	    <area alt="" title="Lombardia" shape="poly" coords="399,311,401,331,382,361,379,384,399,410,396,422,412,447,422,471,411,469,400,490,386,484,373,476,363,486,373,498,378,516,385,538,433,546,432,558,443,562,444,575,459,591,476,621,492,621,490,600,497,581,485,574,504,535,522,531,526,522,539,524,544,532,555,534,559,529,568,533,578,528,578,521,594,525,601,535,644,554,666,562,686,568,703,551,707,563,738,571,744,565,779,562,812,565,794,548,785,537,775,537,775,527,758,526,751,520,744,518,744,512,714,487,695,490,699,470,707,459,696,459,692,442,720,373,684,379,676,373,670,369,665,360,671,353,665,342,668,332,680,309,682,276,680,262,691,252,697,238,662,225,655,216,636,209,639,197,608,202,606,242,618,240,624,252,616,264,626,280,605,289,610,274,601,273,599,257,590,254,559,260,552,274,544,274,525,260,517,228,489,225,487,240,491,262,463,307,450,329,450,350,462,358,453,374,435,370,436,355,431,342,420,332,425,322,419,311" style="outline: none" target="_self" />
	    <area alt="" title="Trentino_Alto_Adige" shape="poly" coords="658,217,695,240,676,260,683,274,678,310,669,329,668,348,666,367,681,381,718,375,729,375,729,404,750,406,766,402,770,387,781,375,783,353,798,357,803,340,821,339,827,332,838,343,854,336,853,314,890,305,885,280,874,270,871,259,878,237,874,230,881,221,894,218,905,201,913,183,935,204,969,188,949,160,941,141,933,142,921,116,936,101,935,92,864,120,841,115,819,117,769,127,755,167,711,161,695,145,673,150,662,170,655,189" style="outline: none" target="_self" />
	    <area alt="" title="Veneto" shape="poly" coords="722,369,689,436,708,461,696,481,705,486,749,509,752,527,772,523,776,533,788,536,796,547,812,564,842,575,868,564,892,561,914,560,937,564,943,580,960,591,978,571,980,554,946,508,932,491,923,471,941,451,985,430,987,445,1050,412,1064,414,1051,391,1046,362,1030,372,1015,368,1003,375,977,370,976,358,957,347,973,306,957,287,954,268,981,234,999,225,994,218,1012,213,1008,194,967,185,954,201,936,200,910,186,896,221,881,224,872,231,878,242,869,273,887,281,885,308,851,313,851,341,836,347,824,332,814,339,800,341,799,354,789,350,772,398,747,404,735,410,720,399,731,374" style="outline: none" target="_self" />
	    <area alt="" title="Friuli_Venezia_Giulia" shape="poly" coords="1007,192,1015,210,991,220,998,231,983,235,962,253,951,276,968,287,972,309,960,347,981,368,1017,368,1043,371,1046,367,1047,388,1064,415,1077,402,1061,396,1077,384,1106,392,1109,402,1132,397,1132,386,1155,400,1164,412,1158,420,1185,425,1196,411,1169,392,1154,382,1141,373,1145,356,1146,339,1127,340,1123,327,1152,297,1138,291,1116,285,1107,270,1116,257,1138,242,1157,239,1156,223,1125,216,1110,210,1092,215,1074,204,1052,203,1032,202,1020,191" style="outline: none" target="_self" />
	    <area alt="" title="Liguria" shape="poly" coords="251,738,249,756,243,763,232,776,219,789,226,804,265,799,300,792,319,774,324,758,336,733,366,717,366,702,397,680,429,672,455,679,477,693,485,689,519,713,550,730,573,746,582,743,598,751,605,737,588,729,581,725,577,716,570,720,569,707,563,698,553,684,546,683,546,671,509,679,508,673,521,650,511,644,503,640,494,644,483,635,467,642,457,633,447,630,442,621,429,628,427,642,417,646,408,655,403,655,391,662,370,651,346,664,340,654,321,673,312,683,306,696,304,725,289,731,287,737,268,741" style="outline: none" target="_self" />
	    <area alt="" title="Emilia_Romagna" shape="poly" coords="558,681,586,658,599,675,640,704,654,703,687,735,713,732,738,740,749,730,771,739,782,738,782,729,798,718,811,715,834,730,838,736,853,734,850,760,858,787,878,803,912,815,920,801,921,781,935,779,951,768,971,762,981,775,977,789,994,794,1012,785,1014,770,1016,766,984,745,958,707,947,667,936,616,941,580,941,565,912,559,881,557,852,569,828,572,821,565,805,567,794,558,732,563,730,569,714,562,710,549,679,571,665,561,642,555,622,544,607,543,598,536,590,518,578,518,575,528,570,538,564,533,559,530,553,542,550,536,544,527,536,521,524,520,524,531,516,530,505,536,499,545,499,555,494,563,489,572,489,582,487,600,490,612,484,615,476,623,476,636,493,638,509,641,520,646,512,675,543,669,547,681" style="outline: none" target="_self" />
	    <area alt="" title="Toscana" shape="poly" coords="599,751,608,738,591,727,583,729,581,719,573,722,572,708,554,685,559,669,586,661,602,681,637,703,651,701,690,738,711,734,737,747,747,731,756,741,777,741,777,732,794,720,808,716,815,726,837,731,858,735,847,758,853,783,870,801,897,812,920,813,930,800,951,812,952,827,944,820,927,830,928,846,920,857,922,865,911,871,907,881,923,898,939,902,933,908,915,920,907,920,885,934,888,957,884,998,859,1008,863,1026,861,1042,833,1056,838,1079,816,1085,816,1093,788,1087,774,1095,761,1093,764,1086,775,1081,775,1060,766,1055,748,1038,750,1026,715,1013,714,990,695,975,682,977,677,983,670,968,682,954,681,918,671,902,664,874,647,864,641,838,636,816,636,797,635,786,623,771,616,757" style="outline: none" target="_self" />
	    <area alt="" title="Marche" shape="poly" coords="912,809,917,789,926,777,949,766,964,781,978,773,978,788,992,793,1018,786,1014,769,1029,772,1121,841,1128,840,1146,851,1189,988,1151,1010,1128,1007,1121,1021,1098,1036,1091,1024,1075,1023,1086,1004,1090,996,1076,996,1063,985,1051,990,1044,979,1039,975,1026,939,1027,928,1017,899,1014,892,1010,871,984,879,971,860,952,862,950,843,932,846,928,832,943,821,948,831,950,821,947,808,939,809,935,801,928,805,927,817" style="outline: none" target="_self" />
	    <area alt="" title="Umbria" shape="poly" coords="879,1002,892,1018,887,1032,908,1039,919,1032,941,1073,962,1073,967,1086,979,1107,988,1096,991,1081,1001,1084,1011,1069,1018,1067,1020,1056,1042,1043,1066,1036,1081,1025,1086,998,1069,994,1062,986,1052,992,1047,985,1040,983,1030,954,1024,936,1027,925,1018,902,1010,891,1010,877,1001,878,992,881,980,882,968,861,946,859,954,848,950,841,930,843,917,856,926,863,904,873,924,904,933,900,938,909,911,921,908,918,885,931,893,955,888,976,890,991" style="outline: none" target="_self" />
	    <area alt="" title="Lazio" shape="poly" coords="817,1093,821,1083,833,1083,837,1068,829,1064,835,1053,857,1044,862,1030,853,1016,859,1007,875,1004,895,1014,886,1025,905,1042,921,1030,943,1069,958,1069,966,1089,983,1103,990,1090,990,1081,1002,1085,1011,1070,1020,1063,1034,1045,1079,1033,1085,1021,1111,1040,1106,1053,1081,1049,1072,1071,1067,1078,1087,1115,1105,1127,1096,1147,1086,1144,1084,1149,1075,1141,1058,1152,1058,1171,1076,1173,1091,1182,1112,1193,1104,1204,1143,1220,1152,1214,1169,1220,1189,1227,1204,1248,1202,1273,1181,1290,1187,1316,1166,1326,1152,1322,1140,1325,1136,1332,1124,1328,1106,1317,1079,1317,1066,1326,1051,1307,1009,1287,995,1281,969,1247,928,1222,923,1189,891,1165,878,1167,860,1134,840,1106" style="outline: none" target="_self" />
	    <area alt="" title="Abruzzo" shape="poly" coords="1187,986,1157,1008,1135,1005,1122,1025,1105,1032,1110,1043,1097,1053,1087,1051,1073,1064,1070,1080,1078,1094,1086,1118,1102,1126,1101,1139,1095,1148,1072,1142,1057,1153,1056,1171,1069,1170,1088,1179,1098,1189,1105,1199,1128,1219,1146,1221,1155,1214,1166,1219,1182,1227,1191,1226,1206,1251,1203,1280,1210,1293,1221,1291,1220,1275,1257,1280,1278,1260,1285,1249,1267,1244,1279,1226,1277,1222,1292,1207,1313,1175,1321,1154,1312,1137,1285,1125,1273,1106,1256,1092,1241,1085,1225,1064,1204,1032" style="outline: none" target="_self" />
	    <area alt="" title="Molise" shape="poly" coords="1257,1286,1306,1298,1316,1278,1328,1281,1351,1270,1348,1239,1363,1244,1380,1229,1366,1215,1378,1185,1317,1155,1304,1185,1290,1199,1275,1219,1268,1244,1283,1254,1266,1267,1267,1264,1280,1256" style="outline: none" target="_self" />
	    <area alt="" title="Campania" shape="poly" coords="1171,1328,1208,1406,1184,1419,1181,1433,1199,1428,1226,1413,1254,1407,1272,1425,1252,1446,1254,1455,1307,1447,1312,1438,1334,1458,1355,1497,1341,1521,1352,1530,1377,1540,1397,1558,1392,1564,1416,1569,1433,1559,1459,1562,1462,1527,1474,1519,1471,1504,1462,1503,1460,1486,1428,1456,1424,1441,1412,1426,1407,1405,1411,1396,1425,1394,1439,1373,1430,1355,1409,1352,1399,1353,1385,1321,1375,1312,1364,1300,1365,1289,1347,1273,1330,1280,1316,1280,1300,1297,1272,1293,1241,1280,1218,1271,1214,1294,1201,1294,1200,1283,1185,1288" style="outline: none" target="_self" />
	    <area alt="" title="Puglia" shape="poly" coords="1373,1185,1365,1221,1378,1228,1361,1245,1349,1241,1343,1272,1361,1283,1362,1300,1371,1313,1393,1316,1388,1351,1417,1354,1446,1357,1488,1346,1509,1362,1496,1373,1525,1384,1531,1383,1539,1402,1581,1431,1594,1421,1603,1428,1609,1440,1610,1456,1613,1470,1628,1483,1636,1492,1674,1467,1691,1483,1683,1492,1720,1502,1765,1512,1787,1518,1805,1543,1806,1562,1808,1582,1860,1605,1870,1583,1884,1552,1869,1520,1856,1495,1838,1477,1817,1463,1808,1441,1786,1434,1754,1414,1732,1413,1709,1388,1699,1376,1673,1363,1640,1351,1614,1337,1586,1328,1555,1314,1538,1306,1504,1288,1494,1272,1490,1245,1511,1232,1522,1224,1533,1214,1533,1199,1521,1184,1509,1178,1473,1187,1453,1188,1443,1185,1427,1190,1398,1190" style="outline: none" target="_self" />
	    <area alt="" title="Basilicata" shape="poly" coords="1453,1557,1465,1526,1473,1521,1473,1505,1459,1502,1455,1488,1431,1472,1419,1436,1407,1411,1408,1392,1426,1391,1439,1371,1436,1359,1480,1344,1509,1362,1497,1377,1527,1388,1534,1384,1544,1407,1579,1428,1585,1419,1605,1423,1611,1448,1611,1471,1623,1479,1630,1493,1611,1540,1589,1538,1573,1543,1564,1561,1555,1580,1542,1582,1515,1587,1507,1579,1507,1570,1486,1567,1474,1566,1467,1584" style="outline: none" target="_self" />
	    <area alt="" title="Calabria" shape="poly" coords="1468,1584,1476,1564,1501,1572,1508,1579,1537,1585,1553,1578,1563,1561,1575,1541,1596,1539,1599,1558,1598,1578,1577,1615,1585,1624,1589,1637,1617,1644,1645,1667,1678,1689,1674,1712,1672,1747,1685,1762,1670,1776,1649,1780,1620,1785,1602,1793,1590,1811,1587,1845,1592,1878,1562,1893,1547,1904,1527,1938,1519,1956,1501,1973,1459,1975,1452,1949,1453,1910,1482,1895,1493,1852,1479,1833,1509,1813,1531,1813,1541,1782,1523,1762,1509,1711,1494,1671,1478,1646,1472,1615,1468,1613,1469,1610" style="outline: none" target="_self" />
	    <area alt="" title="Sicilia" shape="poly" coords="1066,1920,1062,1938,1038,1950,1026,1942,1013,1918,1007,1932,997,1938,980,1947,971,1956,969,1970,963,1984,965,1996,972,2013,982,2023,1003,2036,1035,2039,1050,2047,1078,2050,1089,2067,1115,2079,1151,2101,1172,2118,1214,2128,1240,2131,1264,2156,1274,2175,1290,2188,1309,2193,1334,2200,1348,2201,1375,2209,1368,2179,1378,2165,1393,2151,1399,2144,1396,2128,1390,2116,1385,2102,1392,2099,1376,2088,1369,2078,1370,2050,1382,2034,1382,2012,1386,1997,1441,1912,1437,1895,1398,1915,1390,1901,1367,1931,1350,1920,1324,1920,1301,1923,1300,1937,1277,1945,1250,1950,1225,1950,1200,1945,1180,1956,1152,1955,1134,1945,1130,1933,1112,1937,1107,1914,1093,1911" style="outline: none" target="_self" />
	    <area alt="" title="Sardegna" shape="poly" coords="424,1786,452,1761,451,1740,462,1718,471,1725,484,1720,521,1737,529,1743,535,1732,535,1719,541,1705,536,1698,543,1684,548,1666,546,1657,550,1640,550,1616,551,1602,552,1583,556,1566,558,1553,550,1540,544,1530,542,1518,546,1507,564,1491,572,1470,558,1442,558,1428,552,1400,552,1390,528,1384,553,1372,529,1357,532,1343,524,1337,510,1338,520,1327,513,1316,500,1330,488,1334,484,1320,471,1319,472,1339,455,1345,442,1354,432,1365,424,1378,413,1386,395,1394,382,1404,362,1405,348,1401,334,1392,335,1371,340,1360,348,1356,347,1347,340,1346,330,1362,322,1375,328,1393,317,1422,328,1440,317,1455,339,1457,349,1473,354,1501,367,1514,372,1556,353,1564,360,1594,380,1588,376,1622,364,1618,369,1650,356,1670,359,1685,352,1689,362,1707,353,1718,361,1739,349,1742,360,1770,366,1753,378,1750,382,1767,388,1778,393,1786" style="outline: none" target="_self" />
	  </map>
	</div>
	<script type="text/javascript">
	  /*
	  * rwdImageMaps jQuery plugin v1.5
	  *
	  * Allows image maps to be used in a responsive design by recalculating the area coordinates to match the actual image size on load and window.resize
	  *
	  * Copyright (c) 2013 Matt Stow
	  * https://github.com/stowball/jQuery-rwdImageMaps
	  * http://mattstow.com
	  * Licensed under the MIT license
	  */
	  ;(function(a){a.fn.rwdImageMaps=function(){var c=this;var b=function(){c.each(function(){if(typeof(a(this).attr("usemap"))=="undefined"){return}var e=this,d=a(e);a("<img />").load(function(){var g="width",m="height",n=d.attr(g),j=d.attr(m);if(!n||!j){var o=new Image();o.src=d.attr("src");if(!n){n=o.width}if(!j){j=o.height}}var f=d.width()/100,k=d.height()/100,i=d.attr("usemap").replace("#",""),l="coords";a('map[name="'+i+'"]').find("area").each(function(){var r=a(this);if(!r.data(l)){r.data(l,r.attr(l))}var q=r.data(l).split(","),p=new Array(q.length);for(var h=0;h<p.length;++h){if(h%2===0){p[h]=parseInt(((q[h]/n)*100)*f)}else{p[h]=parseInt(((q[h]/j)*100)*k)}}r.attr(l,p.toString())})}).attr("src",d.attr("src"))})};a(window).resize(b).trigger("resize");return this}})(jQuery);

	  $(document).ready(function(e) {
	    $('img[usemap]').rwdImageMaps();
	  });
	</script>
      <?php } ?>
    </div>
  </body>
</html>
<?php }else{
  include_once "login.php";
} ?>