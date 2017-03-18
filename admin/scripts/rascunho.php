<?php            
            if(isset($_POST['cadastrar_post']) && $_POST['cadastrar_post'] == 'cad'){
                print("Botão apertado");
                $img = $_FILES['thumb'];
                $titulo = strip_tags(trim($_POST['titulo']));
                $texto = $_POST['texto'];
                $categoria = (trim($_POST['categoria']));
                $data = strip_tags(trim($_POST['data']));
                $autor = $_POST['autor'] ;
                $valor_real = (trim($_POST['valor_real']));
                $valor_pag = (trim($_POST['valor_pagseguro']));
                print("Valores do formulario setados");

                $pasta = "../uploads/$categoria";
                $permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');
                print("Configuraçoes de pasta concluidos");
                
                require("scripts/funcao_upload.php");
                $nome = $img['name'];
                $tmp = $img['tmp_name'];
                $type = $img['type'];
                
                print("Variaveis de imagens setadas");
		 
                $entrada = trim("$data");
                if(strstr($entrada, "/")){
                    $aux = explode("/", $entrada); 
                    $aux2 = date('H:i:s');
                    $aux3 = $aux[2] . "-" . $aux[1] . "-" . $aux[0] . " " . $aux2;
                 }
                print("Hora cortada para melhor visualização");
                if(!empty($nome) && in_array($type, $permitido)){
                    $name = md5(uniqid(rand(), true)).".jpg";
                    Redimensionar($tmp, $nome, 500, $pasta);
                    print"Pronto para executar a query mysql";
				    	
	               $cadastrar_noticias = mysql_query("INSERT INTO posts (thumb, titulo, texto, categoria, data, autor, valor_real, valor_pagseguro, visitas)
											VALUES ('$name', '$titulo', '$texto', '$categoria', '$aux3', '$autor', '$valor_real', '$valor_pag', '1')")
		                              or die(mysql_error());
									  
				if($cadastrar_noticias >= '1'){
					echo "<div class=\"ok\">Seu tópico foi cadastrado com sucesso!</div>";
				}else{
					echo "<div class=\"no\">Erro ao cadastrar o tópico</div>";
                }
                }
            }
            ?>