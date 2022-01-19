<?php
// $id = $params['id'];
sessioncek();
$accounts = $db->query('SELECT * FROM akun')->fetchAll();

foreach ($accounts as $account) {
	echo $account['Auser'] . '<br>';
}