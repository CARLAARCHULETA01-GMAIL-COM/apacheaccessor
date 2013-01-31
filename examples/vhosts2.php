<?php
if (isset($_GET['serve']) && $_GET['serve'] === 'code'){
	header ("Content-Type: text/plain");
	readfile(__FILE__);
	exit();
}
?>
<HEAD>
<style type="text/css">
h3 {text-align: center;display: block;border: 1px solid; margin: 2px 0; background-color: #a88 }
div {margin: 0 10%}
table {border-collapse:collapse}
td {border:1px solid}
td.subdata {border: none;}
td.subdata table{margin-left: 20px}
td.directive { background-color: #88a }
td.args { background-color: #8a8 }
</style>
</HEAD>
<BODY>
<a href="<?=$_SERVER['PHP_SELF'] ?>?serve=code">Click here to see the PHP code</a><br/>
<div>
<H3>Apache Configuration page</H3>
<?php
	$fh = fopen ("php://output","w");
	$dir_filter = array_fill_keys(array('Options','Order'),NULL);
	$vhost_filter = array_fill_keys(array('ServerAdmin','DocumentRoot','Alias','ServerSignature'),NULL);
	$vhost_filter['Directory'] = $dir_filter;
	$arr = array('Directory' => $dir_filter,'VirtualHost' => $vhost_filter,'AddType' => NULL);
	apacheaccessor_dump_conf(0,$fh,$arr);
?>
</div>
</BODY>
