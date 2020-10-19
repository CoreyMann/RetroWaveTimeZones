<?php
  require_once('functions.php');
  
  if(isset($_POST['submit'])) {
    $from_month = $_POST['from_month'];
    $from_day = $_POST['from_day'];
    $from_year = $_POST['from_year'];
    $from_hour = $_POST['from_hour'];
    $from_minute = $_POST['from_minute'];
    
    $from_time = $from_year."/".$from_month."/".$from_day." ";
    $from_time .= $from_hour.":".$from_minute;
    
    $from_tz = $_POST['from_tz'];
    $to_tz = $_POST['to_tz'];
    
    $tz_idents = timezone_identifiers_list();
    if(in_array($from_tz, $tz_idents) && in_array($to_tz, $tz_idents)) {
      $from_tz_obj = new DateTimeZone($from_tz);
      $to_tz_obj = new DateTimeZone($to_tz);
      $converted_time = new DateTime($from_time, $from_tz_obj);
      $converted_time->setTimezone($to_tz_obj);
    }
  }
  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Time Zone Calculator</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    
  <div class="main-container">
    <div class="title">
      <h1>Retrowave Time Zones</h1>
      <h3>A part of the Retrowave Tool App</h3>
    </div>
      
    <div class="calc-container">
      <form action="" method="post">
        
        <dl>
          <dt>From Time:</dt>
          <dd>
            <select name="from_month">
              <?php echo month_select_options($from_month); ?>
            </select>
            <select name="from_day">
              <?php echo day_select_options($from_day); ?>
            </select>
            <select name="from_year">
              <?php echo year_select_options($from_year); ?>
            </select>
            -
            <select name="from_hour">
              <?php echo hour_select_options($from_hour); ?>
            </select>
            :
            <select name="from_minute">
              <?php echo minute_select_options($from_minute); ?>
            </select>
          </dd>
        </dl>
        <dl>
          <dt>From Time Zone:</dt>
          <dd>
            <select class="timezone" name="from_tz">
              <?php echo timezone_select_options($from_tz); ?>
            </select>
          </dd>
        </dl>
        <dl>
          <dt>To Time Zone:</dt>
          <dd>
            <select class="timezone" name="to_tz">
              <?php echo timezone_select_options($to_tz); ?>
            </select>
          </dd>
        </dl>
        
        <?php if(isset($converted_time)) { ?>
        <dl>
          <dt>Converted Time:</dt>
          <dd class="result">
            <?php echo $converted_time->format('F j, Y \a\t g:i a')?>
          </dd>
        </dl>
        <?php } ?>
        
        <br />
        <div class="button">
          <input type="submit" name="submit" value="Submit" />
        </div>
      </form>
    </div>
       <div class="footer">
          <ul class="social">
                <li><a href="https://www.github.com/CoreyMann"><i class="fa fa-github"></i></a></li>
                <li><a href="https://www.facebook.com/corey.mann.127"><i class="fa fa-facebook"></i></a></li>
                <li><a href="www.soundcloud.com/keithmannmusic"><i class="fa fa-soundcloud"></i></a></li>
                <li><a href="www.instagram.com/keithmannmusic" class="list-group-item"><i class="fa fa-instagram"></i></a></li>
          </ul> 
          <a class="copyright" href="www.coremann.com">www.coremann.com</a>
      </div>
        
    </div>
  </body>
</html>