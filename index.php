<!doctype html>
    <html>
    <head>
        <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
    <script src="dpass.js"></script>
    </head>
    <body>
    <?php
include 'dpass-config.php';
if(!$configured)die("Please edit dpass-config.php file</body></head>");
function gethash($s){
    return sha1($s.idate("z"));
}
function testentry($field){
    if(strpos($field,",")!==false||strpos($field,'"')!==false||strpos($field,"&")!==false)
        return false;
    return true;
}
function inputtype($index,$header){
    /*
    * sends the input tag type for a field
    */
        switch($header[$index]){
            case "Password":
            case "Card Number":
                echo "password";
            return;
            case "Email Address":
            case "Email":
            echo "email";
                    return;
            case "URL":
                echo "url";
                return;
            case "Phone Number":
                echo "tel";
                return;
            case "Zip Code":
            case "CVC":
                echo "number";
                return;
        }
        echo "text";
    }
if(((strlen($_POST['m'].$_GET['m'])>0)&&(($password!=$_GET['m'].$_POST['m'])))&&($_GET['m'].$_POST['m']!=gethash($sha1prefix.$password)))echo 'Bad Password or logged out';
    $myvault=file($csvdb);
$csvline=explode(",",$myvault[0]);
$csvhead=explode(",",$myvault[0]);
if($_POST['m'].$_GET['m']==$password&&strlen($_GET['del.x'].$_GET['del_x'].$_POST['del.x'].$_POST['del_x'])>0){
$fvault= fopen(".htmyvault","w");
    $erased=0;
for($i=0;$i<count($myvault);$i++)
    if(strlen($_POST['s'.$i].$_GET['s'.$i])==0){
        fwrite($fvault,$myvault[$i]);
       } else {
            $erased++;
        }
    
echo "Deleted ".$erased." item(s) in the database.";        
fclose($fvault);
copy(".htmyvault",$csvdb);
    $myvault=file($csvdb);
}
?>
       <form method="post">
<table class="tg">
<thead>
  <tr>
    <th class="tg-0lax">Selected</th>
    <?php for($i=0;$i<count($csvline);$i++){?>
    <th class="tg-0lax"><?php echo $csvline[$i];?></th>
<?php }?>
   </tr>
</thead>
<tbody>
<?php if($_GET['m'].$_POST['m']==$password||$_POST['m'].$_GET['m']==gethash($sha1prefix.$password)){
              $newmodified=0;for($i=0;$i<count($csvhead);$i++){$newmodified=$newmodified+strlen($_GET['new'.$i].$_POST['new'.$i]);if(!testentry($_GET['new'.$i].$_POST['new'.$i]))
                  die('</tbody></table>Not allowed symbols where found in one of the fields</body></html>');}
               if($newmodified>0&&strlen($_GET['save_x'].$_POST['save.x'].$_POST['save_x'].$_GET['save.x'])>0){
         copy($csvdb,".htmyvault");
            $fvault=fopen(".htmyvault","a");
                   $fields=PHP_EOL;
            for($i=0;$i<count($csvhead);$i++)$fields.=$_GET['new'.$i].$_POST['new'.$i].",";
            $written=fwrite($fvault,$fields,strlen($fields)-1);fclose($fvault);rename($csvdb,$csvdb.".old");rename(".htmyvault",$csvdb);
            echo "<tr><td>".$written." bytes written</td></tr>";
           }
    if($newmodified==0&&strlen($_GET['save_x'].$_POST['save.x'].$_POST['save_x'].$_GET['save.x'])>0){
        $fvault=fopen(".htmyvault","w");
        $fields="";
        $updated=0;
        for($i=0;$i<count($csvhead);$i++)
            $fields.=$csvhead[$i].",";
        fwrite($fvault,$fields,strlen($fields)-1);
        for($i=1;$i<count($myvault);$i++)
            if(strlen($_POST['s'.$i].$_GET['s'.$i])>0){
                $fields=PHP_EOL;
                for($j=0;$j<count($csvhead);$j++)
                    $fields.=$_GET['f'.$i."_".$j].$_POST['f'.$i."_".$j].",";
               fwrite($fvault,$fields,strlen($fields)-1);
                $updated++;
            } else {
                $fields=PHP_EOL;
               $csvline=explode(",",$myvault[$i]);
                for($j=0;$j<count($csvline);$j++)
                    $fields.=$csvline[$j].",";
                fwrite($fvault,$fields,strlen($fields)-1);
            }
        fclose($fvault);
        copy($csvdb,$csvdb.".old");
        copy(".htmyvault",$csvdb);
        echo "<tr><td>".$updated." entries were updated</td></tr>";
 }
         for($i=1;$i<count($myvault);$i++){
        if(stripos($myvault[$i],$_GET['q'].$_POST['q'])!==false&&strlen($_GET['q'].$_POST['q'])>0){?>
        <tr><td><input type="checkbox" name="s<?php echo $i;?>" value="1"></td><?php
        $csvline=explode(",",$myvault[$i]);
        for($j=0;$j<count($csvline);$j++){?>
      <td><input type="<?php inputtype($j,$csvhead);?>" id="ta<?php echo $i."_".$j;?>" name="f<?php echo $i."_".$j;?>" value="<?php echo str_replace(
"\n","/n",str_replace("\r","/r",$csvline[$j]));?>">
            <input type="button" value="G" onclick="generatePassword(<?php echo $i.",".$j;?>)">
          <input type="button" value="PW" onclick="togglePW(<?php echo $i.",".$j;?>)">
          <input type="button" value="C" onclick="copyToClipboard(<?php echo $i.",".$j;?>)"></td>
       <?php }?></tr><tr><?php }}}echo "<td>Blank Entry</td>";
if($_POST['m'].$_GET['m']==$password||$_POST['m'].$_GET['m']==gethash($sha1prefix.$password))
               for($j=0;$j<count($csvline);$j++){?>
      <td><input type="<?php inputtype($j,$csvhead);?>" id="new<?php echo $j;?>" name="new<?php echo $j;?>">
            <input type="button" value="G" onclick="generatePassword(-2,<?php echo $j;?>)">
          <input type="button" value="PW" onclick="togglePW(-2,<?php echo $j;?>)">
          <input type="button" value="C" onclick="copyToClipboard(-2,<?php echo $j;?>)"></td>
       <?php }?></tr>
</tbody>
</table>
<?php if($_GET['m'].$_POST['m']!=$password&&$_GET['m'].$_POST['m']!=gethash($sha1prefix.$password)){?>
Master Password:<input type="password" name="m" id="mp">
    <input type="image" name="login" src="login.png">
    <input type="button" value="Show/hide" onclick="togglePW(-1,-1)">
<?php } else {?>
<br>Search:<input type="text" name="q">
    <input type="image" name="search" src="search.png">
    <?php if(strlen($_GET['m'].$_POST['m'])==40){?>
          <input type="hidden" name="m" value="<?php echo $_GET['m'].$_POST['m'];?>">
        <?php } else {?>
          <input type="hidden" name="m" value="<?php echo gethash($sha1prefix.$_GET['m'].$_POST['m']);?>">
<?php } ?>
        <input type="image" name="save" src="save.png">
    <input type="image" name="del" src="delete.png">
<?php }?>
    </form>
    <?php if($showdonate){?><p>
        <a href="https://cash.app/delphijustin" title="Donate via Cash App">
        <img src="https://1000marcas.net/wp-content/uploads/2021/06/Cash-App-logo-500x281.png" height="128px" width="128px">
        </a>
        <a href="https://paypal.me/delphijustin?country.x=US&locale.x=en_US" title="Donate via PayPal">
        <img src="https://www.paypalobjects.com/webstatic/icon/pp196.png" height="64px" width="64px">
        </a>
        </p>
        <?php } ?>
    </body>
    </html>
