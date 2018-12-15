<?php
$command = './finalPPL.py';
$cmd = $command." '".$_POST['req_username']."' '".$_POST['req_pass']."' '".$_POST['req_name']."' '".$_POST['req_alamat']."' '".$_POST['req_NRP']."' '/gambar/".$_POST['req_NRP']."' '".$_POST['req_bday']."' '".$_POST['req_noHP']."' '".$_POST['req_sie']."'";
$output = shell_exec($cmd);
echo $output;
?>