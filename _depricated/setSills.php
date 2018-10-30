<?php
session_start();

$sillIndex = $_POST['sillIndex']-1;
$sillsImageSrc = $_POST['sillsImageSrc'];
$sillLeft = $_POST['sillLeft'];
$sillRight = $_POST['sillRight'];
$sillUp = $_POST['sillUp'];
$sillDown = $_POST['sillDown'];


$_SESSION['Cart'][$sillIndex]['Sills'] = $sillsImageSrc;
$_SESSION['Cart'][$sillIndex]['SillLeft'] = $sillLeft;
$_SESSION['Cart'][$sillIndex]['SillRight'] = $sillRight;
$_SESSION['Cart'][$sillIndex]['SillUp'] = $sillUp;
$_SESSION['Cart'][$sillIndex]['SillDown'] = $sillDown;
$_SESSION['Cart'][$sillIndex]['ClearWidth'] = $_SESSION['Cart'][$sillIndex]['Width'] - $sillLeft - $sillRight;
$_SESSION['Cart'][$sillIndex]['ClearHeight'] = $_SESSION['Cart'][$sillIndex]['Height'] - $sillUp - $sillDown;;


$_SESSION['index'] = 0;


echo  $_SESSION['Cart'][$sillIndex]['Sills'];
