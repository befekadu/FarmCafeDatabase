<?php
$mydb = @mysql_connect("localhost", "3430-f15-team2", "900479113");
if( !$mydb)
{
    echo( "Connection to database server failed <br>");
    exit( );
}
?>
