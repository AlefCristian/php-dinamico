<div id="page_content">
    
    <div id="sidebar">
        <?php include"sidebars/sidebars.php";?>
    </div>
    <div id="page">
        <?php
        $pagi = $_GET['pagi'];
        $pagina_sql = mysql_query("select id, pagina, content from pagina where pagina = '$pagi'") or die(mysql_error());
        if (@mysql_num_rows($pagina_sql) == '0'){
            echo "$info_not";
        } else {
           while($res_pagina = mysql_fetch_array($pagina_sql)){
               $id = $res_pagina[0];
               $categoria = $res_pagina[1];
               $content = $res_pagina[2];
           }
        }
        ?>       
        <h1><?php echo $categoria;?></h1>
        <?php echo $content;?>
    </div>
</div>