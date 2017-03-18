<div id="noticias">
    <div id="destaque">        
        <div id="noticias_destaque">
            <?php
            $recuperar = 'destaque';
            include"scripts/noticias.php";
            ?>                          
        </div>
        <span id="pager" class="pager"></span>
    </div>   
            
    <div id="noticias_lista">
        <?php
        $recuperar = 'lista';
        include"scripts/noticias.php";                
        ?>
    </div>
</div>
    
<div id="cursos">
    <div id="cursos_lista">
        <?php
        $recuperar = 'cursos';
        include"scripts/noticias.php";
        ?>
    </div>
        
    <div id="cursos_shopping">
        <h1>Nossos Cursos</h1>
        <div class="carousel">            
            <?php
            $recuperar = 'produtos';
            include"scripts/noticias.php"?>       
        </div>
        <a href="index.php?pagina=nav/categoria&amp;cat=produtos"><div class="botao_cursos"></div></a>
    </div>
</div>
    
<div id="estudantes">
    <div id="estudantes_page">
        <h1>Venha estudar conosco!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis rhoncus leo laoreet leo interdum venenatis. Sed quis mi consequat, pharetra enim nec, placerat urna. Morbi quis eros sollicitudin, porta dolor congue, tristique sapien.</p>
        <p>Pellentesque eget faucibus arcu, at dictum ante. Cras elementum imperdiet rhoncus. Aenean gravida ipsum ac nulla pulvinar, vel ornare neque tempus.</p>
        <p>Mauris non ante vitae quam mattis viverra at eu est. Vestibulum hendrerit tristique augue at fermentum. Nam justo tortor, cursus bibendum cursus vel, consectetur vitae libero. Integer a condimentum lacus, non blandit dolor. In sodales maximus mi, at tincidunt ligula iaculis sit amet. Cras et lobortis purus.</p>
    </div>    
    <div id="estudantes_ilustra">
    </div>
</div>