<?php
$serverName = 'MATEUS-PC';		
$connectionInfo = array("Database"=>"TccAcademia", "UID"=>"Usuario", "PWD"=>"123456789", "CharacterSet"=>"UTF-8");
$con = sqlsrv_connect($serverName, $connectionInfo);

/*if($con)
	{
		echo "Conexão OK";
	}
else
	{
		echo "Falha na conexão";
	}*/
?>