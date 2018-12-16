<?php
$command = './finalPPL.py';
$cmd = $command." '".$_POST['req_username']."' '".$_POST['req_pass']."' '".$_POST['req_name']."' '".$_POST['req_alamat']."' '".$_POST['req_NRP']."' '/gambar/".$_POST['req_NRP']."' '".$_POST['req_bday']."' '".$_POST['req_noHP']."' '".$_POST['req_sie']."'";
$output = shell_exec($cmd);
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Request - Kamzin</title>
  <link rel="stylesheet" type="text/css" href="assets/semantic/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/calendar.min.css">
  <script src="assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="assets/semantic/semantic.min.js" type="text/javascript"></script>
  <script src="assets/js/calendar.min.js" type="text/javascript"></script>

  <style type="text/css">
    body {
        background-color:#f1f1f1;
        background-image:url('assets/noise.png');
        background-repeat:repeat;
        background-position:top left;
        background-attachment:fixed;
    }
    
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
  <script>
  $(document).ready(function() {
      $('.ui.selection.dropdown').dropdown();
      $('#dpsemantic').calendar({
        monthFirst: false,
        formatter: {
          date: function (date, settings) {
            if (!date) return '';
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            return month + '/' + day + '/' + year;
          }
        }
      });
      $('#dpsemantic2').calendar({
        monthFirst: false,
        formatter: {
          date: function (date, settings) {
            if (!date) return '';
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            return month + '/' + day + '/' + year;
          }
        }
      });
  });
  </script>
</head>
<body>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <img src="assets/logo_blue.png" class="image">
      <div class="content" style="color: #8e0000">
        Login
      </div>
    </h2>
    <br>
    <br>
    <form class="ui large form" method="POST" action="controller.php">
    <a class="ui left grid" href="/"><i class="chevron left icon"></i> Back</a>
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="req_username" placeholder="Masukan Username Anda">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="key icon"></i>
            <input type="password" name="req_pass" placeholder="Masukan Password Anda">
          </div>
        </div>
        </br>
        <div><?php echo $output; ?></div>
        <br />
        <input type="submit" class="fluid ui red button" value="Login">
      </div>
      <div class="ui error message"></div>
    </form>
  </div>
</div>

</body>

</html>