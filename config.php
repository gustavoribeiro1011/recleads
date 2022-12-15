<?php
/* 
  WEF Admin                
  @Build 07.12.2022                     
  @Developer: Gustavo Henrique Ribeiro  
 */

session_start();

$app_name = 'Rec Leads 1.0';

define('APP_NAME_URL', 'recleads');

$app_token = "a8RyjGZnxf94"; //Não pode conter caracteres especiais

/*----------------------------------------*
 *  # CAMINHO DO SERVER PARA O SISTEMA
 *--------------------------------------*/
if (!defined('BASEURL'))  define('BASEURL', '/recleads/');

if (!defined('URLSERVER')) define('URLSERVER', __DIR__ . '/recleads/');

/*----------------------------------------*
 *  # CONEXÃO MYSQL LOCALHOST
 *--------------------------------------*/

$whitelist = array(
  '127.0.0.1',
  '::1'
);

if (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
  // Definindo a conexão com o BD (Hostinger)
  define('DB_NAME', 'u904669542_wefadmin');
  define('DB_USER', 'u904669542_wefadmin');
  define('DB_PASS', 'g@8RxDyy');
  define('DB_HOST', 'localhost');
  
} else {
  // Definindo a conexão com o BD (Local)
  define('DB_NAME', 'u904669542_wefadmin');
  define('DB_USER', 'root');
  define('DB_PASS', 'usbw');
  define('DB_HOST', 'localhost');

}

/*----------------------------------------*
 *  #TIMEZONE
 *--------------------------------------*/
date_default_timezone_set('America/Sao_Paulo');
