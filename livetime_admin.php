<?php
    if($_POST['livetime_hidden'] == 'Y') {
      $firstinfo = $_POST['firstinfo'];
      update_option('firstinfo', $firstinfo);

      $secondinfo = $_POST['secondinfo'];
      update_option('secondinfo', $secondinfo);

      $thirdinfo = $_POST['thirdinfo'];
      update_option('thirdinfo', $thirdinfo);
    } else {
      $firstinfo = get_option('firstinfo');
      $secondinfo = get_option('secondinfo');
      $thirdinfo = get_option('thirdinfo');
    }
?>



<div class="wrap">
<br>
<h1>The information goes here</h1>
<form name="livetime_form" method="post">
  <input type="hidden" name="livetime_hidden" value="Y">
  First:<br>
  <textarea name="firstinfo" rows="5" cols="100"><?php echo $firstinfo; ?></textarea><br>
  Second:<br>
  <textarea name="secondinfo" rows="5" cols="100"><?php echo $secondinfo; ?></textarea><br>
  Third:<br>
  <textarea name="thirdinfo" rows="5" cols="100"><?php echo $thirdinfo; ?></textarea>
  <p>Supports html tags. Shortcode [infotext id="1,2,3" align="horizontal/vertical/scroll"]</p>
  <p class="submit">
    <input type="submit" name="Submit" value="submitinfo" />
  </p>
</form>
</div>
