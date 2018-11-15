<!DOCTYPE html>
<html>
    <head>
        <title>IFLIX</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="icon" href="Imagens/ifi.png"/>
        <link rel="stylesheet" href="custom.css">
        <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway+Dots" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
    </head>

    <body>
        <div class="container rounded mx-auto mt-5 fundo-principal">
             <div>
                <div class="row">
                    <div class="col-3 rounded fundo-principal">
                        <div class="btn-group mt-1">
                            <button class="btn bg-dark btn-lg dropdown-toggle text-white mt-3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </button>
                            <div class="dropdown-menu bg-dark fundo-principal">
                                <a class="dropdown-item bg-dark fundo-principal text-white" href="Index.php?opc=H">Home</a>
                                <a class="dropdown-item bg-dark fundo-principal text-white" href="Index.php?opc=C&genero=Todos os Generos">Catálogo</a>
                                <a class="dropdown-item bg-dark fundo-principal text-white" href="Index.php?opc=N">Novo</a>
                            </div>
                        </div>
                    </div>
                    <div class="fundo-principal text-center col-6">
                        <img src="Imagens/iflix1.png" class="mx-auto mt-3" height="60px" alt="iflix">
                    </div>
                    <div class="fundo-principal col-3 rounded w-100">
                        <div class="rounded mt-4 mr-4 d-flex justify-content-end">
                            <form action="Index.php?opc=X" method="post">
                                
                                 <input type="text" name="nome" class="rounded" size="12">
                                
                                <button type="submit" class="btn bg-dark"><img style="width: 24px; height: 24px;" src="Imagens/sr.png" alt="search.png"></button>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
            
            <?php
            
            include 'DB.php';
            
            $opc = 'H';
            if (isset($_GET["opc"])) $opc = $_GET["opc"];    
            
            if ($opc == 'H')
            {
                $series = listar("Todos os Generos");
                
                 echo '
                        <div id="carouselseries" class="carousel slide mt-5 mb-5" data-ride="carousel" data-interval="2000">
                            <div class="carousel-inner">';
                
                //query no BD para retornar as imagens
                                
                        for($i = 0; $i < count($series); $i++)
                        {
                            if($i == 0)
                            {
                                echo'
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="'.$series[$i]["FOTO"].'" alt="img'.$i.'">
                                </div>
                                ';
                            }
                            
                            else
                            {
                               echo'
                                
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="'.$series[$i]["FOTO"].'" alt=>
                                </div>
                                '; 
                            }
                        }
                        
                        echo '
                                </div>
                            </div>
                                                        
                            <h1 class = "p-2 m-2 text-white text-center f1">Séries para todos os gostos</h1>
                            
                            </br>
                        ';
                   
                }

            else if($opc == 'C')
            {
                $total = 0; //total de registros no BD
                $todos = "Todos os Generos";
                $genero = $_GET["genero"];
                if($genero == "Todos") $genero = "Todos os Generos";
                $series = listar($genero);
                
               echo' 
               
               <div class="row container">
               
                    <div class="col-3 mt-4 bg-dark">
                    </div>
                    <div class="fundo-principal text-center col-6  mt-4 bg-dark">
                        <h2 class="text-white mt-2 f3"> Series de '.$genero.'</h2>
                    </div>
                    <div class="fundo-principal col-3 mt-4 bg-dark container d-flex">
                        <div class="justify-content-end mt-3">
                            <p class="text-white">Genero:
                                <select name="genero" onchange="location = this.value;">
                                    <option selected disable>Selecione...</option>
                                    <option value=Index.php?opc=C&genero=Todos>Todos</option>
                                    <option value=Index.php?opc=C&genero=Drama>Drama</option>
                                    <option value=Index.php?opc=C&genero=Suspense>Suspense</option>
                                    <option value=Index.php?opc=C&genero=Crime>Crime</option>
                                    <option value=Index.php?opc=C&genero=Terror>Terror</option>
                                    <option value=Index.php?opc=C&genero=Fantasia>Fantasia</option>
                                    <option value=Index.php?opc=C&genero=Ação>Ação</option>
                                    <option value=Index.php?opc=C&genero=Aventura>Aventura</option>
                                    <option value=Index.php?opc=C&genero=Fantasia>Fantasia</option>
                                    <option value=Index.php?opc=C&genero=Comédia>Comédia</option>
                                    <option value=Index.php?opc=C&genero=Romance>Romance</option>
                                </select>
                            </p>
                        </div>
                    </div>  
               </div>
               
               <div class="row m-3">';
                
                if(count($series) > 0)
                {
                    while ($total < count($series))
                    {
                        for ($i = 0; $i < 4; $i++)
                        {
                            echo '
                            <div class="col-3 mb-5">
                                <div class="container d-flex h-25">
                                    <div class="row justify-content-center align-self-center mx-auto">
                                        <h5 class="text-white text-center">'.$series[$total]["NOME"].'</h5>     
                                    </div>
                                                               
                                    
                                </div>

                                <a href="Index.php?opc=X&i='.$series[$total]["CODIGO"].'"><img class="d-block w-100" src="'.$series[$total]["FOTO"].'" alt="img'.$total.'.png"></a>

                                <div class="container">
                                    <div class="row mt-1 bg-dark">
                                        <div class="col-8">
                                            <p class="text-white mt-1">'.$series[$total]["GENERO"].'</p>
                                        </div>
                                        <div class="col-4 text-white container">                        
                                            <div class="d-flex justify-content">                                                
                                                <a href="Index.php?opc=A&i='.$series[$total]["CODIGO"].'"><img class="mt-1 ml-1" style="width: 24px; height: 24px;" src="Imagens/ed.png" alt="editar.png"></a>
                                                <a href="Index.php?opc=D&i='.$series[$total]["CODIGO"].'"><img class="mt-1 ml-1" style="width: 24px; height: 24px;" src="Imagens/ex.png" alt="excluir.png"></a>                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </br>
                            </div>';
                            $total+=1;
                            if($total == count($series)) break;
                        }

                        echo '<div class="w-100"></div>';
                    }

                    echo'</div></br></br>'; 
                }
                
                else
                {
                    echo '
				        <div class="container mt-4 bg-dark">
				            <h5 class="text-bold text-center text-white">Não Consta nenhuma serie deste genero no cadastro!!!</h5>
				        </div>
                        </div></br></br>
				    ';
                }
            }
            
            else if($opc == 'N')
            {
                echo '
                <div class="container mt-5 mx-auto text-center">
                    <h3 class="bg-dark text-white rounded mb-4">Cadastrar</h4>
                    <form action="Index.php?opc=I" method="post">
										
				        <p class="text-white">Nome:
				            <input type="text" name="nome" size="24">
				        </p>
										
				        <p class="text-white">Genero:
                            <select name="genero">
                                <option selected disabled>Selecione...</option>
                                <option value="Drama">Drama</option>
								<option value="Suspense">Suspense</option>
								<option value="Crime">Crime</option>
                                <option value="Terror">Terror</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Ação">Ação</option>
                                <option value="Aventura">Aventura</option>
                                <option value="Fantasia">Fantasia</option>
                                <option value="Comédia">Comédia</option>
                                <option value="Romance">Romance</option>
                            </select></p>
                            
                        <p class="text-white">Temporadas:
                            <input type="number" name="temporadas" min="1" max="40"> 
                        </p>
                        
                        <p class="text-white">Faixa Etária:
                            <input type="number" name="censura" min="1" max="18"> 
                        </p>
                        
                        
                        <p class="text-white">Capa: 
                            <input type="text" name="img" value="Imagens/Capas/" size="60">
                        </p>

                        <p class="text-white">Trailer:
                            <input type="text" name="video" value="https://www.youtube.com/embed/" size="60">
                        </p>
                        
                        <p class="text-white">Descrição:</br>
                            <textarea name="desc" rows="10" cols="100"></textarea> 
                        </p>

                        <button type="submit" class="btn bg-dark text-white mb-4">Cadastrar</button>

                    </form>
                </div>
                
                ';
            }
            
            else if($opc == 'I')
            {
                if(isset($_POST["nome"]) && isset($_POST["genero"]) && isset($_POST["temporadas"]) && isset($_POST["censura"]) && isset($_POST["img"]) && isset($_POST["video"]) && isset($_POST["desc"]))
                {
                    $nome = $_POST["nome"];
                    $genero = $_POST["genero"];
                    $censura = $_POST["censura"];
                    $temp = $_POST["temporadas"];
                    $desc = $_POST["desc"];
                    $img = $_POST["img"];
                    $video = ''.$_POST["video"].'?rel=0';
                    
                    $sucesso = inserir($nome, $genero, $censura, $temp, $desc, $img, $video);
                        
                    if($sucesso == true)
                    {
                        echo '
				        <div class="container mt-4 bg-dark">
				            <h5 class="text-bold text-center text-white">Registro Inserido com sucesso!!!</h5>
                        </div></br>
                        <a href="Index.php?opc=C&genero=Todos os Generos"> <button class="btn bg-dark text-white mb-4">Voltar</button> </a>
				    ';
                    }
                    
                    else
                    {
                        echo '
				        <div class="container mt-4 bg-dark">
				            <h5 class="text-bold text-center text-white">ERRO!!! Não foi possivel adcionar a serie</h5>
                        </div></br>
                        <a href="Index.php?opc=C&genero=Todos os Generos"> <button class="btn bg-dark text-white mb-4">Voltar</button> </a>
				    ';
                    }
                }
                
                else
				{
				    echo '
				        <div class="container mt-4 bg-dark">
				            <h5 class="text-bold text-center text-white">ERRO!!! As informações inseridas não são válidas</h5>
				        </div></br>
				        <a href="Index.php?opc=N"> <button class="btn bg-dark text-white mb-4">Voltar</button> </a>

				    ';
				}
            }
            
            else if($opc == 'D')
            {
                $cod = $_GET["i"];
                
                $serie = deletar($cod);
                
                if($serie)
                {
                    echo '
				        <div class="container mt-4 bg-dark">
				            <h5 class="text-bold text-center text-white">Registro Deletado com sucesso!!!</h5>
                        </div></br>
                        <a href="Index.php?opc=C&genero=Todos os Generos"> <button class="btn bg-dark text-white mb-4">Voltar</button> </a>
				    ';
                }
                
                else
                {
                    echo '
				        <div class="container mt-4 bg-dark">
				            <h5 class="text-bold text-center text-white">Não foi possível Deletar a serie!!!</h5>
                        </div></br>
                        <a href="Index.php?opc=C&genero=Todos os Generos"> <button class="btn bg-dark text-white mb-4">Voltar</button> </a>
				    ';
                }
            }
            
            else if($opc == 'A')
            {
                $cod = $_GET["i"];
                $serie = buscarCod($cod);
                $sinopse = (string) $serie[0]["DESCRICAO"];
                
                echo '
                    <div class="container mt-5 mx-auto text-center">
                        <h3 class="bg-dark text-white rounded mb-4">Alterar</h4>
                        <form action="Index.php?opc=U&i='.$cod.'" method="post">

                            <p class="text-white">Nome:
                                <input type="text" name="nome" value="'.$serie[0]["NOME"].'" size="24">
                            </p>
                                
                            <p class="text-white">Genero:
                                <select name="genero">
                                    <option value="Drama"'; if($serie[0]["GENERO"] == "Drama") echo'selected'; echo'>Drama</option>';
                                    echo '<option value="Suspense"'; if($serie[0]["GENERO"] == "Suspense") echo'selected'; echo'>Suspense</option>';
                                    echo '<option value="Crime"'; if($serie[0]["GENERO"] == "Crime") echo'selected'; echo'>Crime</option>';
                                    echo '<option value="Terror"'; if($serie[0]["GENERO"] == "Terror") echo'selected'; echo'>Terror</option>';
                                    echo '<option value="Fantasia"'; if($serie[0]["GENERO"] == "Fantasia") echo'selected'; echo'>Fantasia</option>';
                                    echo '<option value="Ação"'; if($serie[0]["GENERO"] == "Ação") echo'selected'; echo'>Ação</option>';
                                    echo '<option value="Aventura"'; if($serie[0]["GENERO"] == "Aventura") echo'selected'; echo'>Aventura</option>';
                                    echo '<option value="Fantasia"'; if($serie[0]["GENERO"] == "Fantasia") echo'selected'; echo'>Fantasia</option>';
                                    echo '<option value="Comédia"'; if($serie[0]["GENERO"] == "Comédia") echo'selected'; echo'>Comédia</option>';
                                    echo '<option value="Romance"'; if($serie[0]["GENERO"] == "Romance") echo'selected'; echo'>Romance</option>
                                </select></p>';
                            
                        echo'
                            <p class="text-white">Temporadas:
                                <input type="number" name="temporadas" value="'.$serie[0]["TEMPORADAS"].'" min="1" max="40"> 
                            </p>

                            <p class="text-white">Faixa Etária:
                                <input type="number" name="censura" value="'.$serie[0]["CENSURA"].'" min="1" max="18"> 
                            </p>


                            <p class="text-white">Capa: 
                                <input type="text" name="img" value="'.$serie[0]["FOTO"].'" size="60">
                            </p>

                            <p class="text-white">Trailer:
                                <input type="text" name="video" value="'.$serie[0]["TRAILER"].'" size="60">
                            </p>

                            <p class="text-white">Descrição:</br>
                                <textarea name="desc" rows="10" cols="100">'.$sinopse.'</textarea> 
                            </p>

                            <button type="submit" class="btn bg-dark text-white mb-4">Alterar</button>

                        </form>
                    </div>
                ';
                
            }
            
            else if($opc == 'U')
            {
                if(isset($_POST["nome"]) && isset($_POST["genero"]) && isset($_POST["temporadas"]) && isset($_POST["censura"]) && isset($_POST["img"]) && isset($_POST["video"]) && isset($_POST["desc"]))
                {
                    $id = $_GET["i"];
                    $nome = $_POST["nome"];
                    $genero = $_POST["genero"];
                    $censura = $_POST["censura"];
                    $temp = $_POST["temporadas"];
                    $desc = $_POST["desc"];
                    $img = $_POST["img"];
                    $video = $_POST["video"];
                    
                    $sucesso = atualizar($nome, $genero, $censura, $temp, $desc, $img, $video, $id);
                        
                    if($sucesso == true)
                    {
                        echo '
				        <div class="container mt-4 bg-dark">
				            <h5 class="text-bold text-center text-white">Registro alterado com sucesso!!!</h5>
                        </div></br>
                        <a href="Index.php?opc=C&genero=Todos os Generos"> <button class="btn bg-dark text-white mb-4">Voltar</button> </a>
				    ';
                    }
                    
                    else
                    {
                        echo '
				        <div class="container mt-4 bg-dark">
				            <h5 class="text-bold text-center text-white">ERRO!!! Não foi possivel alterar a serie</h5>
                        </div></br>
                        <a href="Index.php?opc=C&genero=Todos os Generos"> <button class="btn bg-dark text-white mb-4">Voltar</button> </a>
				    ';
                    }
                }
                
                else
				{
				    echo '
				        <div class="container mt-4 bg-dark">
				            <h5 class="text-bold text-center text-white">ERRO!!! As informações inseridas não são válidas</h5>
				        </div></br>
				        <a href="Index.php?opc=N"> <button class="btn bg-dark text-white mb-4">Voltar</button> </a>

				    ';
				}
            }
            
            else if($opc == 'X')
            {
                $existe = true;
                
                if(isset($_GET["i"]))
                {
                    $cod = $_GET["i"];
                    $serie = buscarCod($cod); 
                }
                
                else
                {
                    $nome = $_POST["nome"];
                    $serie = buscarNome($nome);
                    
                    if($serie == NULL)
                    {
                        echo '
                            <div class="container mt-4 bg-dark">
                                <h5 class="text-bold text-center text-white">A serie "'.$nome.'" não foi encontrada!!! </h5>
                            </div></br>
                            <a href="Index.php?opc=H"> <button class="btn bg-dark text-white mb-4">Voltar</button> </a>

				        '; 
                        
                        $existe = false;
                    } 
                }
                     
                
                if($existe)
                {
                    $sinopse = (string) $serie[0]["DESCRICAO"];
                                
                    echo'
                        <div class="container">
                            <div class="container">
                                <div class="row container">
                                    <div class="col-2 text-white mt-5 mb-2">

                                    </div>
                                    <div class="col-8 text-center text-white mt-5 mb-2">
                                        <h2 class="bg-dark">'.$serie[0]["NOME"].'</h2>
                                    </div>
                                    <div class="col-2 text-white d-flex justify-content-end mt-5 mb-2">
                                        <h4 class="f2 mt-2">'.$serie[0]["CENSURA"].'+</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="'.$serie[0]["TRAILER"].'" allowfullscreen></iframe>
                            </div>
                            <div class="container">
                                <div class="row bg-dark mt-2">
                                    <div class="col-8">
                                        <h4 class="text-white" >Sinopse:</h4>
                                    </div>

                                    <div class="col-4 d-flex justify-content-end">
                                        <p class="text-white bold">Genero: '.$serie[0]["GENERO"].'</p>
                                    </div>
                                </div>

                                <p class="text-white border mt-3 p-3">'.$sinopse.'</p>
                            </div></br>

                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn bg-dark text-white mb-4" onClick="history.go(-1)">Voltar</button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <a href="Index.php?opc=A&i='.$serie[0]["CODIGO"].'"> <button class="btn bg-dark text-white mb-4 mr-2">Alterar</button> </a>
                                        <a href="Index.php?opc=D&i='.$serie[0]["CODIGO"].'"> <button class="btn bg-dark text-white mb-4 mr-2">Deletar</button> </a>
                                    </div>
                            </div>
                        </div>
                        </div>
                    '; 
                }
            }
                
            ?>
            
        </div>
        <br/>
        <div class="container m-4 mx-auto">
            <p class="text-center text-white">Desenvolvido por GU3002284</p>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>