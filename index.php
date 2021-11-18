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
    Peaks List :
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
    Documentation link : <a href="documentation.docx">doc</a>
    <br><br>

    <form name="formulaire" method="get">
        <table>
            <tr><td>Peak name :</td><td><input type='search' name="search"></td></tr>        
            <tr><td>Latitude Min : </td><td><input type='search' name="latMinSearch" size=5></td><td>Latitude Max : </td><td><input type='search' name="latMaxSearch" size=5></td></tr>
            <tr><td>Longitude Min : </td><td><input type='search' name="lonMinSearch" size=5></td><td>Longitude Max : </td><td><input type='search' name="lonMaxSearch" size=5></td></tr>
            <tr><td colspan=2><input type='submit' value='Rechercher'></td></tr>
        </table>
    </form>

    <div id="resultat_recherche">
       <?php
          $search="";
          $latMinSearch="";
          $lonMinSearch="";

          if (isset($_GET['search']) || (isset($_GET['latMinSearch']) && isset($_GET['latMaxSearch'])) || (isset($_GET['lonMinSearch']) && isset($_GET['lonMaxSearch'])) )
          {
               include 'connect.php';   
               $search=$_GET['search'];

               $latMinSearch=$_GET['latMinSearch']; $latMaxSearch=$_GET['latMaxSearch'];
               $lonMinSearch=$_GET['lonMinSearch']; $lonMaxSearch=$_GET['lonMaxSearch'];
               
               $sql="SELECT * from peaks where name like '%$search%'";
               if ($latMinSearch!="") $sql.=" and lat between $latMinSearch and $latMaxSearch";
               if ($lonMinSearch!="") $sql.=" and lon between $lonMinSearch and $lonMaxSearch";
               $result = $mysqli->query($sql);
               if ($result)
               {
                    if ($search!="") echo "<br>Pick searched : <b><i>" . $search . "</i></b><br>";
                    if ($latMinSearch!="") echo "You have searched latitude between : <b><i>" . $latMinSearch . "</i></b> and <b><i>" . $latMaxSearch . "</i></b><br>";
                    if ($lonMinSearch!="") echo "You have searched longitude between : <b><i>" . $lonMinSearch . "</i></b> and <b><i>" . $lonMaxSearch . "</i></b> <br>";
                    echo "Peak(s) informations searched : <br>";
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
               else {
                   echo "No results found";
               }         
          }
       ?>
    </div>
</BODY>
</HTML>