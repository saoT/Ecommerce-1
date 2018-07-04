
<div class="sidebar">
<h4>Derniers articles</h4>
</div>

<?php

try
                {
                    $db = new PDO('mysql:host=localhost;dbname=site1','root','');
                    $db -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                }
                catch(Exception $e){
                    echo'erreurr';
                    die();
                }
$select = $db ->prepare("SELECT * FROM products ORDER BY id DESC LIMIT 0,3");
         $select->execute();
        
    while ($s=$select->fetch(PDO::FETCH_OBJ)){
            ?>
<h2><?php echo $s->title; ?></h2>
<h3><?php echo $s->description; ?></h3>
<h4><?php echo $s->price; ?>euros</h4>
<?php      
}
?>
