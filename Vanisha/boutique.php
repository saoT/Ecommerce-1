<?php
require_once('includes/header.php');
require_once('includes/sidebar.php');
try
                {
                    $db = new PDO('mysql:host=localhost;dbname=site1','root','');
                    $db -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                }
                catch(Exception $e){
                    echo'erreurr';
                    die();
                }

$select = $db ->prepare("SELECT * FROM products");
         $select->execute();
        
    while ($s=$select->fetch(PDO::FETCH_OBJ)){
            ?>
<h2><?php echo $s->title; ?></h2>
<h3><?php echo $s->description; ?></h3>
<h4><?php echo $s->price; ?>euros</h4>
<?php      
}
?>
