<?php

session_start();
?>
<h1>Bienvenue,
    <?php echo $_SESSION['username']; ?>
</h1>

<a href="?action=add">Ajouter un produit</a>  <!--variable de type get!-->
<a href="?action=modifyanddelete">Modifier /Supprimer un produit</a>


<?php
                try
                {
                    $db = new PDO('mysql:host=localhost;dbname=site','root','');
                    $db -> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                }
                catch(Exception $e){
                    echo'erreurr';
                    die();
                }

    if(isset($_SESSION['username'])){
    if(isset($_GET['action'])){   //verif le get
    if($_GET['action']=='add'){
        if(isset($_POST['submit'])){
          $title=$_POST['title'];
        $description =$_POST['description'];
        $price=$_POST['price'];
          
            if($title&&$description&&$price){
                
                $insert = $db->prepare("INSERT INTO products (title, description, price) VALUES('$title', '$description', '$price')");
                $insert->execute();
                
            }else{
                echo 'Veuillez remplir';
            }
        }



        ?>



<form action="" method="post">
<h3>Titre produit</h3>
    <input type="text" name="title"/>
    <h3>Description du produit:</h3>
    <textarea type="text" name="description"></textarea> <!--formulaire produit!-->
    <h3>Prix</h3>
    <input type="text" name="price"/><br/>
    <h3> Importer une image</h3>
    <input type="file" name="file"/><br/><br/>
    <input type="submit" name="submit"/>
    </form>


      <?php
        }else if($_GET['action']=='modifyanddelete'){
        
         $select = $db ->prepare("SELECT * FROM products");
         $select->execute();
        
        while ($s=$select->fetch(PDO::FETCH_OBJ)){
            echo $s->title;
?>
<a href="?action=modify&amp;id=<?php echo $s->id; ?>" > Modifier  </a> 
<a href="?action=delete&amp;id=<?php echo $s->id; ?>" > X </a> <br/> <br/>
<?php
        }
        
    }else if($_GET['action']=='modify'){
        
       
        $id=$_GET['id'];
        
        $select = $db ->prepare("SELECT * FROM products WHERE id=$id");
         $select->execute();
        
        $data = $select ->fetch(PDO::FETCH_OBJ); //recup les info 
        
       ?>

<form action="" method="post">
<h3>Titre produit</h3>
    <input value="<?php echo $data->title; ?>" type="text" name="title"/>
    <h3>Description du produit:</h3>
    <textarea name="description"><?php echo $data->description; ?></textarea> <!--formulaire produit!-->
    <h3>Prix</h3>
    <input value="<?php echo $data->price; ?>"type="text" name="price"/><br/>
    <input type="submit" name="submit"/>
    </form>

<?php
         if(isset($_POST['submit'])){
             
        $title=$_POST['title'];
        $description =$_POST['description'];
        $price=$_POST['price'];
             
             $update = $db->prepare("UPDATE products SET title='$title' , description='$description', price='$price' WHERE id=$id");
             $update->execute();
             
             header('location: admin.php?action=modifyanddelete');
            
        }
        
        
    } else if($_GET['action']=='delete'){
        
        $id=$_GET['id'];
        $delete = $db ->prepare("DELETE FROM products WHERE id=$id");
         $delete->execute();
        
        
    } else{
        die('erreur');
    }
    }else{
    }
        
}else{
    header('location:indexadmin.php');
}
?>
 
