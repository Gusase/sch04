<?php
function connect(): mysqli
{
  $db_host = 'localhost';
  $db_name =  'gss_test';
  $db_user = 'root';
  $db_pass =  '';
  $db_port =  3316;

  try {
    return new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);
  } catch (\Throwable $e) {
    echo $e->getMessage();
  }
}
