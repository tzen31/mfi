<!DOCTYPE html>
<HTML>
<HEAD><title>MFI</title></HEAD>
<BODY>
    <?php
        include 'connect.php';
        //include 'peaks.php';

        //$peak = readPeak(1);
       //echo $peak['name'];

    ?>
    Liste des sommets :
    <?php
        $result = $mysqli->query("SELECT * from peaks");
        echo "<table name='Table_peaks' border=1>";      
        echo "<th>nom</th>";         
        while($obj = $result->fetch_object())
        {
            $name=$obj->name;            
            echo "<tr><td>$name</td></tr>";
        } 
        echo "</table>"; 
    ?>           
    <br><br>
    Lien vers la documentation : <a href="documentation.docx">doc</a>
    <br><br>

    <form name="formulaire" method="get">
        Nom du sommet :
        <input type='search' name="search">
        <input type='submit' value='Rechercher'>
    </form>

    <div id="resultat_recherche">
       <?php
          $search="";

          if (isset($_GET['search']))
          {
               include 'connect.php';   
               $search=$_GET['search'];
               echo "<br>Vous avez recherché le sommet : <b><i>" . $search . "</i></b><br>";
               echo "Voici les informations du ou des sommet(s) recherchés : <br>";

               $result = $mysqli->query("SELECT * from peaks where name like '%$search%'");
               echo "<table name='Table_peaks' border=1>";      
               echo "<th>ID</th><th>latitude</th><th>longitude</th><th>altitude</th>";         
               while($obj = $result->fetch_object())
               {
                   $id=$obj->id;
                   $lat=$obj->lat;
                   $lon=$obj->lon;
                   $altitude=$obj->altitude; 

                   echo "<tr><td>$id</td><td>$lat</td><td>$lon</td><td>$altitude</td></tr>";
               } 
               echo "</table>";
          }

       ?>
    </div>
</BODY>
</HTML>