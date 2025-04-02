<?php
// array_column 代替自作関数
function column(array $input, $column_key): array {
    $result = [];
    foreach ($input as $item) {
        if (isset($item[$column_key])) {
            $result[] = $item[$column_key];
        }
    }
    return $result;
}

// 変数を配列として初期化
$drug = []; // これにより、foreachでのエラーを回避
$liquid = array_fill(0, 10, 0); // 10要素の配列を0で初期化

// POSTデータの処理
if(isset($_POST["drug_selected_1"]) && isset($_POST["volume_1"]) && isset($_POST["drug_selected_2"]) && isset($_POST["volume_2"])
&& isset($_POST["drug_selected_3"]) && isset($_POST["volume_3"]) && isset($_POST["drug_selected_4"]) && isset($_POST["volume_4"])
&& isset($_POST["drug_selected_5"]) && isset($_POST["volume_5"]) && isset($_POST["drug_selected_6"]) && isset($_POST["volume_6"])
&& isset($_POST["drug_selected_7"]) && isset($_POST["volume_7"]) && isset($_POST["drug_selected_8"]) && isset($_POST["volume_8"])
&& isset($_POST["drug_selected_9"]) && isset($_POST["volume_9"]) && isset($_POST["drug_selected_10"]) && isset($_POST["volume_10"])){

	$drug1 = $_POST["drug_selected_1"];
	$liquid1 = $_POST["volume_1"] / 1000;

	$drug2 = $_POST["drug_selected_2"];
	$liquid2 = $_POST["volume_2"] / 1000;

	$drug3 = $_POST["drug_selected_3"];
	$liquid3 = $_POST["volume_3"] / 1000;

	$drug4 = $_POST["drug_selected_4"];
	$liquid4 = $_POST["volume_4"] / 1000;

	$drug5 = $_POST["drug_selected_5"];
	$liquid5 = $_POST["volume_5"] / 1000;

	$drug6 = $_POST["drug_selected_6"];
	$liquid6 = $_POST["volume_6"] / 1000;

	$drug7 = $_POST["drug_selected_7"];
	$liquid7 = $_POST["volume_7"] / 1000;

	$drug8 = $_POST["drug_selected_8"];
	$liquid8 = $_POST["volume_8"] / 1000;

	$drug9 = $_POST["drug_selected_9"];
	$liquid9 = $_POST["volume_9"] / 1000;

	$drug10 = $_POST["drug_selected_10"];
	$liquid10 = $_POST["volume_10"] / 1000;



function getDrugNameById($id) {
    $drugNames = [
        1 => 'ビタジェクト注キット',
        2 => '10％塩化ナトリウム注射液',
        3 => 'ラクテック注',
        4 => 'ラクテックG輸液',
        5 => 'リン酸ニカリウム補正液',
        6 => 'ネオアミュー輸液',
        7 => 'ビーフリード輸液',
        8 => 'イントラファット注10％',
        9 => 'イントラリポス輸液20％',
        10 => 'ネオMVI9',
        11 => 'メイロン静注7％',
        12 => 'MVI3',
        13 => '5％ブドウ糖',
        14 => '10％ブドウ糖',
        15 => '20％ブドウ糖',
        16 => '30％ブドウ糖',
        17 => '50％ブドウ糖',
        18 => 'KCL注',
        19 => 'アスパラカリウム注',
        20 => 'エレメンミック注',
        21 => 'ビタシミン注射液500mg',
        22 => 'ケイツーN静注10mg',
        23 => 'サヴィオゾール輸液',
        24 => 'フィジオ35輸液',
        25 => 'アリナミンF50注',
        26 => '塩カル注2％',
        27 => 'カルチコール注射液',
        28 => '生理食塩液',
        29 => 'パントール注射液500mg',
        30 => 'ビタメジン静注用',
        31 => 'ヒドロキソコバラミン注1000μg',
        32 => '硫酸Mg補正液',
        33 => '蒸留水',
        34 => 'ヒューマリンR',
        35 => 'ソリタT1号輸液',
        36 => 'ソリタT2号輸液',
        37 => 'ソリタT3号輸液',
        38 => 'ソリタT3号G輸液',
        39 => 'ソリタT4号輸液',
        40 => 'ハイカリックRF輸液',
        41 => 'フルカリック1号輸液',
        42 => 'フルカリック2号輸液',
        43 => 'フルカリック3号輸液',
        44 => 'ハイカリックNC-H輸液',
        45 => 'テルフィス点滴静注',
        46 => 'キドミン輸液',
        47 => 'ヴィーンF輸液',
        48 => 'ハルトマンD液',
        49 => 'フィジオ140輸液',
        50 => 'ビカーボン輸液',
        51 => 'アリナミンF10注',
        52 => 'エルネオパ2号輸液',
        53 => 'イセパラK注',
        54 => 'ソルデム1輸液',
        55 => 'ソルデム2輸液',
        56 => 'ソルデム3A輸液',
        57 => 'ソルデム3AG輸液',
        58 => 'ソルデム6輸液',
        59 => 'メドレニック注',
        60 => '強力ミノファーゲンシー',
        61 => 'アミパレン輸液',
        62 => 'フェジン静注40mg',
        63 => 'エルネオパNF1号輸液',
        64 => 'エルネオパNF2号輸液',
        65 => 'ビカネイト輸液',
        66 => 'ソルアセトF輸液',
        67 => 'ボルベン輸液6％',
        68 => 'イントラリポス輸液10％',
        69 => 'リン酸Na補正液',
        70 => 'マスブロン注1mg',
        71 => 'アセレンド注100μg',
    ];
    return isset($drugNames[$id]) ? $drugNames[$id] : '不明な薬品';
}



for ($i = 1; $i <= 10; $i++) {
    if (isset($_POST["drug_selected_$i"]) && $_POST["volume_$i"] > 0) {
        $drugName = getDrugNameById($_POST["drug_selected_$i"]); // 薬品IDから薬品名を取得
        $drug[] = $drugName;
        $liquid[$i - 1] = $_POST["volume_$i"] / 1000; // mLをLに変換
    }
}

$total = array();}


// 各輸液の組成・成分等が記載されたcsvファイルを読み込み、連想配列にする。

$file = 'tpn_dose-s.csv';
if (file_exists($file)) {
    $fp = fopen($file, 'r');
    if ($fp !== false) {
        stream_filter_prepend($fp, 'convert.iconv.cp932/utf-8', STREAM_FILTER_READ);
        $csv_bin = array();
$keys = null;  // $keysに値が何も代入されていない。

$handle = fopen('tpn_dose-s.csv', 'r');
stream_filter_append($handle, 'convert.iconv.CP932/UTF-8');

    } else {
        // ファイルオープン失敗のエラー処理
    }
} else {
    // ファイルが存在しない場合のエラー処理
}

//
//$file = 'tpn_dose-s.csv';  // 開くcsvファイルを指定する。file関数はファイルの内容を全て読み込み、1行を1つの要素とした配列に格納する。
//$fp = fopen($file, 'r');
//stream_filter_prepend($fp, 'convert.iconv.cp932/utf-8', STREAM_FILTER_READ);
//$csv_bin = array();
//$keys = null;  // $keysに値が何も代入されていない。

//$handle = fopen('tpn_dose-s.csv', 'r');
//stream_filter_append($handle, 'convert.iconv.CP932/UTF-8');
$csv = [];

while ($data = fgetcsv($fp, 1000,",")) {
    if ($keys === null) {
        $keys = $data;
    } else {
        $csv_bin[] = array_combine($keys, $data);
    }
}
fclose($handle);


$i = 0;
$j = 0;
foreach($csv_bin as $key1 => $val){
	foreach($val as $key2 => $val2){
		$csv[$i][$j] = $val2;
		$j++;
	}
	$i++;
	$j = 0;
}



// 薬品名で検索して配列に入れる
$total = array();
$cnt = 0;
foreach ($drug as $value){
$key = array_search($value, column($csv, 0));
$result = $csv[$key];
unset($result[0],$result[1],$result[2],$result[31],$result[32],$result[33],$result[34],$result[35]);
$keyskey = array_keys($result);
foreach($keyskey as $forkeys){
	// $result[$forkeys] と $liquid[$cnt] の値を浮動小数点数に変換して掛け算
$result[$forkeys] = floatval($result[$forkeys]) * floatval($liquid[$cnt]);

}
$other = $csv[$key];
$keyskey = array(0,1,2,31,32,33,34,35,36,63,70);
foreach($keyskey as $forkeys){
	$result = array_merge($result,array($forkeys => $other[$forkeys]));
}
$cnt++;
array_push($total, $result);
}





// 配列の各要素の総和を算出する
// $liquidが配列であることを確認し、それを利用しています
if (!empty($liquid)) {  // $liquidが空でないことを確認
$Glc = array_sum(column($total, 0));				// グルコース・・・以下はCSVファイルの項目順
$Ins = array_sum(column($total, 1));				// インスリン
$Fru = array_sum(column($total, 2));				// フルクトース
$Xyl = array_sum(column($total, 3));				// キシリトール
$Mal = array_sum(column($total, 4));				// マルトース
$Other_sugar = array_sum(column($total, 5));		// 糖質その他
$Sugar_cal = array_sum(column($total, 6));			// 合計カロリー糖質
$Lipid_cal = array_sum(column($total, 7));			// 合計カロリー脂質
$Ile = array_sum(column($total, 8));				// イソロイシン：分子量＝131.17 g/mol
$Arg = array_sum(column($total, 9));				// アルギニン
$Leu = array_sum(column($total, 10));				// ロイシン：分子量＝131.17 g/mol
$His = array_sum(column($total, 11));				// ヒスチジン
$Lys = array_sum(column($total, 12));				// リジン
$Ala = array_sum(column($total, 13));				// アラニン
$Met = array_sum(column($total, 14));				// メチオニン
$Asx = array_sum(column($total, 15));				// アスパラギン酸
$Phe = array_sum(column($total, 16));				// フェニルアラニン：分子量＝165.19 g/mol
$Glu = array_sum(column($total, 17));				// グルタミン酸
$Thr = array_sum(column($total, 18));				// トレオニン
$Pro = array_sum(column($total, 19));				// プロリン
$Trp = array_sum(column($total, 20));				// トリプトファン
$Ser = array_sum(column($total, 21));				// セリン
$Val = array_sum(column($total, 22));				// バリン：分子量＝117.151 g/mol
$Cys = array_sum(column($total, 23));				// システイン
$Tyr = array_sum(column($total, 24));				// チロジン,チロシン：分子量＝181.19 g/mol
$Gly = array_sum(column($total, 25));				// アミノ酢酸＝グリシン：必須アミノ酸ではない。電解質と呼ばれることもある。
$All_amino = array_sum(column($total, 26));			// 総遊離アミノ酸量
$All_N = array_sum(column($total, 27));				// 総窒素量
$Amino_cal = array_sum(column($total, 28));			// 合計カロリー,アミノ酸
$Na = array_sum(column($total, 29));				// Na+
$K = array_sum(column($total, 30));			    	// K+
$Ca2 = array_sum(column($total, 31));				// Ca2+
$Zn = array_sum(column($total, 32));				// Zn
$Mg2 = array_sum(column($total, 33));				// Mg2+
$P = array_sum(column($total, 34));				    // P
$Cl = array_sum(column($total, 35));				// Cl-
$Co = array_sum(column($total, 36));				// Co
$HPO42 = array_sum(column($total, 37));				// HPO42-
$Cu = array_sum(column($total, 38));				// Cu
$Lact = array_sum(column($total, 39));				// Lact-
$Fe = array_sum(column($total, 40));				// Fe
$SO42 = array_sum(column($total, 41));				// SO42-
$Mn = array_sum(column($total, 42));				// Mn
$CH3COO = array_sum(column($total, 43));			// CH3COO-
$I = array_sum(column($total, 44));			    	// I
$Gluconic = array_sum(column($total, 45));			// グルコン酸
$Citric = array_sum(column($total, 46));			// クエン酸
$Maleic = array_sum(column($total, 47));			// マレイン酸
$HCO3 = array_sum(column($total, 48));				// HCO3-
$VA = array_sum(column($total, 49));				// ビタミンA
$VB1 = array_sum(column($total, 50));				// ビタミンB1
$VD2 = array_sum(column($total, 51));				// ビタミンD2
$VB2 = array_sum(column($total, 52));				// ビタミンB2
$VB6 = array_sum(column($total, 53));				// ビタミンB6
$VE = array_sum(column($total, 54));				// ビタミンE
$VB12 = array_sum(column($total, 55));				// ビタミンB12
$VK1 = array_sum(column($total, 56));				// ビタミンK1
$VC = array_sum(column($total, 57));				// ビタミンC
$VK2 = array_sum(column($total, 58));				// ビタミンK2
$Nam = array_sum(column($total, 59));				// ニコチン酸アミド
$Pantothenic = array_sum(column($total, 60));		// パントテン酸
$Folic = array_sum(column($total, 61));				// 葉酸
$Biotin = array_sum(column($total, 62));			// ビオチン
// $E_NE = array_sum(column($total, 67));			// E/NE比・・・・合計値を算出するのは誤り：必須アミノ酸（E）と非必須アミノ酸（N）の重量比（E/N比）で算出すること！
// $BCAA = array_sum(column($total, 68));			// BCAA含有率・・・・合計値を算出するのは誤り：BCAA含有率＝（イソロイシン（g/L）＋ロイシン（g/L）＋バリン（g/L））÷総遊離アミノ酸量（g/L）*100で算出すべし！
// $NPC_N = array_sum(column($total, 69));			// 非タンパク性カロリー窒素比（NPC/N）＝（炭水化物 Kcal＋脂質 Kcal）／（アミノ酸 g ÷ 6.25）で算出すべし！
// $Fischer = array_sum(column($total, 70));			// Fischer比・・・・合計値を算出するのは誤り：分枝鎖アミノ酸（BCAA：イソロイシン・ロイシン・バリン）と芳香族アミノ酸（AAA：チロシン・フェニルアラニン）のモル比（BCAA／AAA）をフィッシャー比という。
$Se = array_sum(column($total, 63));				// Se(セレン)⇒($total, 72)の場合、合計カロリー（アミノ酸）と同じ結果が表示された。そこで、CSVファイルの中でビオチンの隣なので、63にしたら正しい計算結果が表示された！
$All_liquid = array_sum($liquid);
$ALL_sugar = $Glc + $Fru +$Xyl + $Mal + $Other_sugar;
} else {

    $liquid = array_fill(0, 10, 0);

}

if ($All_liquid > 0) {
    // 糖質濃度の計算
    $sugar_concentration = round($ALL_sugar / ($All_liquid * 1000) * 100, 2); // % 単位
} else {
    // 適切なエラー処理またはデフォルト値の設定
    $sugar_concentration = 0; // またはエラーメッセージの表示
}




?>

<HTML><!-- 以下は計算結果を表示するHTML -->
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
<meta name="Keywords" content="計算式,算出法,計算方法,多次元配列,配列要素,抜き出す,抽出,,,">
<TITLE>輸液処方支援システム：計算結果</TITLE>
</HEAD>
<BODY vLink="#800080" link="#0000ff" bgColor="#FFFFE0">

<STYLE TYPE="text/css">
<!--
#comment1 {font-size="11pt"; font-family="ＭＳ 明朝"; text-align:right; color:blue; font-weight:bold;}
#comment2 {font-size="11pt"; font-family="ＭＳ 明朝"; background-color :ccffff; color33ff00; font-weight:bold;}
#comment3 {font-size="13pt"; font-family="ＭＳ 明朝"; text-align:right; color:red; font-weight:bold;}
#comment4 {font-size="13pt"; font-family="ＭＳ 明朝"; text-align:center; color:red; font-weight:bold;}
-->
 a {text-decoration:none ;}
 a:link {color:blue;}
 a:hover {color:red;text-decoration:underline;}
</STYLE>

<A HREF="../tab4.html">
<IMG SRC="../../back1.jpg" onMouseDown="changeImage1()" onMouseUp="changeImage2()" name="back" align="right">
</A>

<BR>
<BR>
<BR>

<FORM NAME="myFORM">

<DIV ALIGN="center">
<TABLE WIDTH="1080" BORDER CELLPADDING="5">
 <TR BGCOLOR="#000066" HEIGHT="110">
  <TH><FONT FACE="ＭＳ 明朝" SIZE="7" COLOR="yellow"><B>輸液処方支援システム</B>
  <BR>
  <FONT FACE="ＭＳ 明朝" SIZE="3" COLOR="white">静岡県立静岡がんセンター<BR>薬剤部 医薬品情報室（内線2143）</FONT></TH>
 </TR>
</TABLE>
</DIV>

<?php
echo "<div align='center'>";
echo "<table border='1' cellspacing='0' width='1080'>";
echo "<tr><th colspan='2'>【 投与薬剤 】</th></tr>";

for ($i = 0; $i < 10; $i++) {
    $drugName = isset($total[$i][64]) ? htmlspecialchars($total[$i][64], ENT_QUOTES, 'UTF-8') : "不明";
    $liquidAmount = isset($liquid[$i]) ? htmlspecialchars($liquid[$i] * 1000, ENT_QUOTES, 'UTF-8') : "0";

    echo "<tr>";
    echo "<td>投与薬剤名：$drugName</td>";
    echo "<td>液量：$liquidAmount mL</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";
?>




  </TABLE>
 </TD></TR>
</TABLE>

<div style="display: flex; justify-content: center;">
  <table style="border: 1px solid #000; width:1080px;">
    <tr style="background-color: #FDF5E5;">
      <td>
        <table style="width: 100%;">
   <TR>
    <TD ALIGN="left" WIDTH='11%'><FONT COLOR="#000000">　　　総液量：<?php echo $All_liquid*1000; ?> mL</FONT></TD>
    <TD ALIGN="left" WIDTH='10%'><FONT COLOR="#000000">総カロリー：<?php echo round($Sugar_cal+$Lipid_cal+$Amino_cal); ?> kcal</FONT></TD>
    <TD ALIGN="left" WIDTH='15%'><FONT COLOR="#000000">カロリー比率（アミノ酸：脂質：糖質＝
    <?php
    if ($Amino_cal == 0 and $Lipid_cal == 0 and $Sugar_cal == 0) {
    echo "－：－：－";
    } else {
    echo round(($Amino_cal/($Sugar_cal+$Lipid_cal+$Amino_cal))*100); // アミノ酸のカロリー比率の算出
    ?>
    ：
    <?php echo round(($Lipid_cal/($Sugar_cal+$Lipid_cal+$Amino_cal))*100); // 脂質のカロリー比率の算出
    ?>
    ：
    <?php echo 100-(round(($Amino_cal/($Sugar_cal+$Lipid_cal+$Amino_cal))*100)+(round(($Lipid_cal/($Sugar_cal+$Lipid_cal+$Amino_cal))*100))); // 全カロリーからアミノ酸と脂質のカロリーの和を差し引くことで、糖質のカロリー比率を算出
    }
    ?>
    ）</FONT></TD>
    <!-- カロリー比率（アミノ酸：脂質：糖質）を表示 -->
    <TD ALIGN="left" WIDTH='2%'><FONT COLOR="#000000">　</FONT></TD>

   </TR>
  </table>
      </td>
    </tr>
  </table>
</div>

<div style="display: flex; justify-content: center;">
  <table style="border: 1px solid #000; width: 1080px;">
    <tr style="background-color: #FDF5E5;">
      <td>
        <table style="width: 100%;">
   <TR>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　糖質合計：<?php echo round(($ALL_sugar), 1); ?> g</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">（糖質濃度：<?php if ($All_liquid > 0) {
    echo round($ALL_sugar / ($All_liquid*1000)*100, 2); // %
} else {
    echo "0"; // 全液量が0の場合の糖質濃度は0%と表示
}
 ?> %）</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　　糖質の合計カロリー：<?php echo round($Sugar_cal); ?> kcal</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　　インスリン：<?php echo $Ins; ?> U</FONT></TD>
   </TR>
   </table>
      </td>
    </tr>
  </table>
</div>

<div style="display: flex; justify-content: center;">
  <table style="border: 1px solid #000; width: 1080px;">
    <tr style="background-color: #FDF5E5;">
      <td>
        <table style="width: 100%;">
   <TR>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　脂質の合計カロリー：<?php echo $Lipid_cal ?> kcal</FONT></TD>
   </TR>
</table>
      </td>
    </tr>
  </table>
</div>


<div style="display: flex; justify-content: center;">
  <table style="border: 1px solid #000; width: 1080px;">
    <tr style="background-color: #FDF5E5;">
      <td>
        <table style="width: 100%;">
   <TR>
    <TD ALIGN="left" WIDTH='9%'><FONT COLOR="#000000">　　　NPC/N：
    <?php
    if ($All_amino == 0) {
    echo "－";
    } else {
    echo round(($Sugar_cal + $Lipid_cal) / ($All_amino/6.25), 1);
    }
    ?>
     </FONT></TD>
    <!-- NPC/N ＝（ブドウ糖 Kcal＋脂質 Kcal）／（アミノ酸 g ÷ 6.25）-->

    <TD ALIGN="left" WIDTH='9%'><FONT COLOR="#000000">Fischer比：
    <?php
    if ($All_amino == 0) {
    echo "－";
    } else {
    echo round(((($Ile/131.17)+($Leu/131.17)+($Val/117.151))/(($Tyr/181.19)+($Phe/165.19))), 2);
    }
    ?>
     </FONT></TD>
    <!-- 分枝鎖アミノ酸（BCAA：イソロイシン・ロイシン・バリン）と芳香族アミノ酸（AAA：チロシン・フェニルアラニン）のモル比（BCAA／AAA）をフィッシャー比という -->

    <TD ALIGN="left" WIDTH='9%'><FONT COLOR="#000000">BCAA含有率：
    <?php
    if ($All_amino == 0) {
    echo "－";
    } else {
    echo substr(((($Ile+$Leu+$Val)/($All_amino))*100), 0, 4);
    }
    ?>
    ％</FONT></TD>

    <TD ALIGN="left" WIDTH='9%'><FONT COLOR="#000000">E/N比：
    <?php
    if ($All_amino == 0) {
    echo "－";
    } else {
    echo substr((($Ile+$Leu+$Lys+$Trp+$Met+$Phe+$Thr+$Val)/($Arg+$His+$Ala+$Asx+$Glu+$Pro+$Ser+$Cys+$Tyr+$Gly)), 0, 4);
    }
    ?>
     </FONT></TD>

   </TR>
  </table>
      </td>
    </tr>
  </table>
</div>

<div style="display: flex; justify-content: center;">
  <table style="border: 1px solid #000; width: 1080px;">
    <tr style="background-color: #FDF5E5;">
      <td>
        <table style="width: 100%;">
   <TR>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　総アミノ酸量：<?php echo round(($All_amino),1); ?> g</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">（アミノ酸濃度：<?php if ($All_liquid > 0) {
    echo substr($All_amino / ($All_liquid*1000)*100, 0, 5);
} else {
    echo "0"; // 全液量が0の場合のアミノ酸濃度は0%と表示するか、エラーメッセージを表示
} ?> %）</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　　　　総窒素：<?php echo round(($All_N), 2); ?> g</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　　　　　アミノ酸の合計カロリー：<?php echo round(($Amino_cal), 1); ?> kcal</FONT></TD>
    </table>
      </td>
    </tr>
  </table>
</div>

<div style="display: flex; justify-content: center;">
  <table style="border: 1px solid #000; width: 1080px;">
    <tr style="background-color: #FDF5E5;">
      <td>
        <table style="width: 100%;">
   <!--TR>
   <TD COLSPAN="5"><B>　【 電解質 】</B>　<FONT COLOR="#FF0000">
    <?php
    if (round($Na) >= 100 and round($K) >= 100) {
    echo "この輸液はナトリウムとカリウムともに100mEq以上含有しています！"; // ①輸液がナトリウムとカリウムのいずれも100mEq以上含有している場合、その旨の注意喚起を赤文字で表示する
    } elseif (round($Na) >= 100) {
    echo "この輸液はナトリウムを100mEq以上含有しています！"; // ②輸液がナトリウムを100mEq以上含有している場合、その旨の注意喚起を赤文字で表示する
    } elseif (round($K) >= 100) {
    echo "この輸液はカリウムを100mEq以上含有しています！"; // ③輸液がカリウムを100mEq以上含有している場合、その旨の注意喚起を赤文字で表示する
    } elseif (round($Na) < 100 and round($K) < 100) {
    echo " "; // ④輸液のナトリウム含有量とカリウム含有量がいずれも100mEq未満の場合、注意喚起は表示しない
    }
    ?>
    </FONT></TD>
    </TR-->

   <TR>
   <TD COLSPAN="5"><B>　【 電解質 】</B>　<FONT COLOR="#FF0000">
    <?php
if ($All_liquid > 0) {
    // $All_liquidが0より大きい場合のみ、カリウム濃度の計算を実行
    if (round($Na) >= 100 and round($K) >= 100 and round($K/$All_liquid) >=40) {
        echo "この輸液はナトリウムとカリウムともに100mEq以上含有し、カリウム濃度も40mEq/L以上となっています！";
    } else if (round($Na) >= 100 and round($K) >= 100 and round($K/$All_liquid) <40) {
        echo "この輸液はナトリウムとカリウムともに100mEq以上含有しています！";
    } else if (round($Na) >= 100 and round($K) < 100 and round($K/$All_liquid) >=40) {
        echo "この輸液はナトリウムを100mEq以上含有し、カリウム濃度が40mEq/L以上となっています！";
    } // 以下、他の条件分岐も同様に修正
} else {
    // $All_liquidが0の場合は、カリウム濃度の計算を行わず、必要に応じて適切なメッセージを表示
    echo "輸液量が0のため、カリウム濃度は計算できません。";
}
    ?>
    </FONT></TD>
    </TR>

<TR>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　Na<SUP>+</SUP>：<?php echo round($Na, 1); ?> mEq （NaCl換算：約<?php echo round($Na/17.1, 1); ?> g）</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　K<SUP>+</SUP>：<?php echo round($K, 1); ?> mEq （K<SUP>+</SUP>濃度：<?php
// $All_liquidが0より大きい場合のみ割り算を実行
if ($All_liquid > 0) {
    $K_concentration = round($K / $All_liquid, 1);
} else {
    $K_concentration = 0;
}
echo $K_concentration; ?> mEq/L）</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　Ca<SUP>2+</SUP>：<?php echo round($Ca2, 1); ?> mEq</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　Mg<SUP>2+</SUP>：<?php echo round($Mg2, 1); ?> mEq</FONT></TD>
</TR>


   <TR>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　Cl<SUP>-</SUP>：<?php echo round(($Cl), 1); ?> mEq</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　HPO<SUB>4</SUB><SUP>2-</SUP>：<?php echo round(($HPO42), 1); ?> mEq</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　Lact<SUP>-</SUP>：<?php echo round(($Lact), 1); ?> mEq</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　SO<SUB>4</SUB><SUP>2-</SUP>：<?php echo round(($SO42), 1); ?> mEq</FONT></TD>
   </TR>

   <TR>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　HCO<SUB>3</SUB><SUP>-</SUP>：<?php echo round(($HCO3), 1); ?> mEq</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　CH<SUB>3</SUB>COO<SUP>-</SUP>：<?php echo round(($CH3COO), 1); ?> mEq</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　グルコン酸：<?php echo round(($Gluconic), 1); ?> mEq</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　クエン酸：<?php echo round(($Citric), 1); ?> mEq</FONT></TD>
    <!--TD ALIGN="left"><FONT COLOR="#000000">　マレイン酸：<?php echo round(($Maleic), 1); ?> mEq</FONT></TD-->
   </TR>
  </table>
      </td>
    </tr>
  </table>
</div>

<div style="display: flex; justify-content: center;">
  <table style="border: 1px solid #000; width: 1080px;">
    <tr style="background-color: #FDF5E5;">
      <td>
        <table style="width: 100%;">
   <TR><TD><B>　【 微量元素 】</B></TD></TR>
   <TR>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　Zn：<?php echo substr($Zn, 0, 4); ?> μmoL</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　P：<?php echo substr($P, 0, 4); ?> mmoL</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　Co：<?php echo substr($Co, 0, 3); ?> μmoL</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　Cu：<?php echo substr($Cu, 0, 3); ?> μmoL</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　Fe：<?php echo substr($Fe, 0, 4); ?> mg</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　Mn：<?php echo substr($Mn, 0, 3); ?> μmoL</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　I：<?php echo substr($I, 0, 3); ?> μmoL</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　Se：<?php echo substr($Se, 0, 3); ?> μg</FONT></TD>
   </TR>
  </table>
      </td>
    </tr>
  </table>
</div>

<div style="display: flex; justify-content: center;">
  <table style="border: 1px solid #000; width: 1080px;">
    <tr style="background-color: #FDF5E5;">
      <td>
        <table style="width: 100%;">
   <TR><TD><B>　【 必須アミノ酸 】</B></TD></TR>
   <TR>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　イソロイシン：<?php echo substr($Ile, 0, 4); ?> g</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　ロイシン：<?php echo substr($Leu, 0, 4); ?> g</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　リジン：<?php echo substr($Lys, 0, 4); ?> g</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　トリプトファン：<?php echo substr($Trp, 0, 4); ?> g</FONT></TD>
   </TR>

   <TR>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　メチオニン：<?php echo substr($Met, 0, 4); ?> g</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　フェニルアラニン：<?php echo substr($Phe, 0, 4); ?> g</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　トレオニン：<?php echo substr($Thr, 0, 4); ?> g</FONT></TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　バリン：<?php echo substr($Val, 0, 4); ?> g</FONT></TD>
   </TR>
  </table>
      </td>
    </tr>
  </table>
</div>

<div style="display: flex; justify-content: center;">
  <table style="border: 1px solid #000; width: 1080px;">
    <tr style="background-color: #FDF5E5;">
      <td>
        <table style="width: 100%;">
   <TR><TD COLSPAN="5"><B>　【 非必須アミノ酸 】</B></TD></TR>
   <TR>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　アルギニン：<?php echo substr($Arg, 0, 4); ?> g</FONT>　</TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　ヒスチジン：<?php echo substr($His, 0, 4); ?> g</FONT>　</TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　アラニン：<?php echo substr($Ala, 0, 4); ?> g</FONT>　</TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　アスパラギン酸：<?php echo substr($Asx, 0, 4); ?> g</FONT>　</TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　グルタミン酸：<?php echo substr($Glu, 0, 4); ?> g</FONT>　</TD>
   </TR>

   <TR>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　プロリン：<?php echo substr($Pro, 0, 4); ?> g</FONT>　</TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　セリン：<?php echo substr($Ser, 0, 4); ?> g</FONT>　</TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　システイン：<?php echo substr($Cys, 0, 4); ?> g</FONT>　</TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　チロシン：<?php echo substr($Tyr, 0, 4); ?> g</FONT>　</TD>
    <TD ALIGN="left"><FONT COLOR="#000000">　　　アミノ酢酸：<?php echo substr($Gly, 0, 4); ?> g</FONT>　</TD>
   </TR>
   </table>
      </td>
    </tr>
  </table>
</div>

<div style="display: flex; justify-content: center;">
  <table style="border: 1px solid #000; width: 1080px;">
    <tr style="background-color: #FDF5E5;">
      <td>
        <table style="width: 100%;">
   <TR><TD COLSPAN="5"><B>　【 脂溶性ビタミン 】</B>　<FONT COLOR="#FF0000">
    <?php
    if ($VK1 > 0 or $VK2 > 0) {
    echo "この輸液はビタミンKを含有しています。ワルファリンとの相互作用に注意！"; // 輸液がビタミンK1もしくはビタミンK2のいずれかを含有している場合、ワルファリンとの相互作用の注意喚起を赤文字で表示する
    } else {
    echo " "; // 輸液がビタミンK1とビタミンK2のいずれも含有しない場合、注意喚起は表示しない
    }
    ?>
    </FONT></TD></TR>

   <TR>
    <TD ALIGN="left"   WIDTH='20%'><FONT COLOR="#000000">　　　ビタミンA：<?php echo substr($VA, 0, 4); ?> IU</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　　　ビタミンD2：<?php echo substr($VD2, 0, 4); ?> μg</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　　　ビタミンE：<?php echo substr($VE, 0, 4); ?> mg</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　　　ビタミンK1：<?php echo substr($VK1, 0, 4); ?> mg</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　　　ビタミンK2：<?php echo substr($VK2, 0, 4); ?> mg</FONT></TD>
   </TR>
  </table>
      </td>
    </tr>
  </table>
</div>

<div style="display: flex; justify-content: center;">
  <table style="border: 1px solid #000; width: 1080px;">
    <tr style="background-color: #FDF5E5;">
      <td>
        <table style="width: 100%;">
   <TR><TD COLSPAN="5"><B>　【 水溶性ビタミン 】</B>　<FONT COLOR="#FF0000">
    <?php
    if (round($VB1) == 0) {
    echo "この輸液はビタミンB1を含有していません！"; // 輸液がビタミンB1を含有していない場合、その旨の注意喚起を赤文字で表示する
    } else {
    echo " "; // 輸液がビタミンB1を含有している場合、注意喚起は表示しない
    }
    ?>
    </FONT></TD></TR>

   <TR>
    <TD ALIGN="left"   WIDTH='20%'><FONT COLOR="#000000">　　　ビタミンB1：<?php echo round($VB1); ?> mg</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　ビタミンB2：<?php echo round($VB2); ?> mg</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　ビタミンB6：<?php echo round($VB6); ?> mg</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　ビタミンB12：<?php echo round($VB12); ?> μg</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　</FONT></TD>
   </TR>

   <TR>
    <TD ALIGN="left"   WIDTH='20%'><FONT COLOR="#000000">　　　ビタミンC：<?php echo substr($VC, 0, 4); ?> mg</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　ニコチン酸アミド：<?php echo substr($Nam, 0, 4); ?> mg</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　パントテン酸：<?php echo substr($Pantothenic, 0, 4); ?> mg</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　葉酸：<?php echo substr($Folic, 0, 4); ?> mg</FONT></TD>
    <TD ALIGN="center" WIDTH='20%'><FONT COLOR="#000000">　ビオチン：<?php echo substr($Biotin, 0, 4); ?> mg</FONT></TD>
   </TR>
  </table>
      </td>
    </tr>
  </table>
</div>

</DIV>

<BR>

</FORM>
</BODY>
</HTML>
<!-- 作成者：篠  道弘＆沼津高専：竹内 睦人、電子制御工学科：川上  誠教授 --><!-- 2021年3月18日 -->
<!-- 作成者：篠  道弘：ビタミンB1含有/非含有で赤文字で注意喚起を表示する機能を追加 --><!-- 2021年5月24日 -->


