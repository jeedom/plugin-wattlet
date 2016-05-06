<?php

/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */



require_once dirname(__FILE__) . "/../../../../core/php/core.inc.php";

if (isset($argv)) {
	foreach ($argv as $arg) {
		$argList = explode('=', $arg);
		if (isset($argList[0]) && isset($argList[1])) {
			$_REQUEST[$argList[0]] = $argList[1];
		}
	}
}
/*
if (!jeedom::apiAccess(init('apikey', init('api')))) {
	connection::failed();
	throw new Exception('Clé API non valide (ou vide) . Demande venant de :' . getClientIp() . '. Clé API : ' . secureXSS(init('apikey') . init('api')));
}
connection::success('api');
echo 'ripatoo';

 */
wattlet::updateValues();

/*
$message = '';
foreach ($_GET as $key => $value) {
    $message .= $key . '=>' . $value . ' ';
}
log::add('wattlet', 'event', 'Evenement : ' . $message);
//log::add('wattlet', 'event', 'tableau 2: ' . json_encode($values_arr));
$wattlet_all = eqLogic::byTypeAndSearhConfiguration('wattlet',$_GET['address']);
if(count($wattlet_all) == 0){
	log::add('wattlet', 'info', 'impossible de trouver le device', 'config');
	return;
}
foreach ($wattlet_all as $wattlet) {
	foreach ($wattlet->getCmd('info') as $cmd) {
			$cmd->event($_GET['state']);
	}
}
*/


