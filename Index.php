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
    </head>

    <body>
        <div class="container rounded mx-auto mt-5 fundo-principal">
             <div>
                <div class="row">
                    <div class="col-3 rounded fundo-principal">
                        <div class="btn-group mt-1">
                            <button class="btn fundo-principal btn-lg dropdown-toggle text-white" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </button>
                            <div class="dropdown-menu bg-dark fundo-principal">
                                <a class="dropdown-item bg-dark fundo-principal text-white" href="Index.php?opc=H">Home</a>
                                <a class="dropdown-item bg-dark fundo-principal text-white" href="Index.php?opc=C">Catálogo</a>
                                <a class="dropdown-item bg-dark fundo-principal text-white" href="Index.php?opc=N">Novo</a>
                            </div>
                        </div>
                    </div>
                    <div class="fundo-principal text-center col-6">
                        <img src="Imagens/iflix1.png" class="mx-auto mt-1" height="60px" alt="iflix">
                    </div>
                    <div class="fundo-principal col-3 rounded">
                    </div>  
                </div>
            </div>
            
            <?php
            
            include 'DB.php';
            
            $opc = 'H';
            if (isset($_GET["opc"])) $opc = $_GET["opc"];    
            
            if ($opc == 'H')
            {
                 echo '
                        <div id="carouselseries" class="carousel slide mt-5 mb-5" data-ride="carousel" data-interval="2000">
                            <div class="carousel-inner">';
                
                //query no BD para retornar as imagens
                                
                        for($i = 1; $i < 11; $i++)
                        {
                            if($i == 1)
                            {
                                echo'
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="Imagens/1.png" alt="img'.$i.'">
                                </div>
                                ';
                            }
                            
                            else
                            {
                               echo'
                                
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="Imagens/'.$i.'.png" alt=>
                                </div>
                                '; 
                            }
                        }
                        
                        echo '
                                </div>
                            </div>
                                                        
                            <h1 class = "p2- m-2 text-white text-center f1">Séries para todos os gostos</h1>
                            
                            </br>
                        ';
                   
                }

            else if($opc == 'C')
            {
                $total = 0; //total de registros no BD
                
               echo' 
               <div class="row m-3">';
               
                while ($total < 12)
                {
                    for ($i = 1; $i < 5; $i++)
                    {
                        echo '
                        <div class="col-6 col-sm-3 mb-5 border">
                        
                            <h3 class="text-white">Dexter</h3>
                            
                            <img class="d-block w-100" src="Imagens/3.png" alt="img3.png">
                            
                            <div class="container">
                                <div class="row mt-1 p-1 bg-dark">
                                    <div class="col-sm-8">
                                        <p class="text-white mt-1">Genero</p>
                                    </div>
                                    <div class="col-sm-2 text-white">

                                        <div class="d-flex justify-content-start">
                                            <img class="mh-100 mt-1" style="width: 24px; height: 24px;" src="Imagens/ed.png" alt="editar.png">
                                        </div>

                                    </div>
                                    <div class="col-sm-2 text-white">

                                        <div class="ml-4 d-flex justify-content-end">
                                            <img class="mh-100 mt-1" style="width: 24px; height: 24px;" src="Imagens/ex.png" alt="excluir.png">                                        
                                        </div>

                                    </div>
                                </div>
                            </div>
                            </br>
                        </div>';
                        $total+=1;
                    }
                    
                    echo '<div class="w-100"></div>';
                }
               
                echo'</div></br></br>';

            }
            
            else if($opc == 'N')
            {
                echo '
                <div class="container mt-5 mx-auto text-center">
                    <h3 class="bg-dark text-white rounded mb-4">Cadastrar</h4>
                    <form action="Index.php?opc=I" method="post">
										
				        <p class="text-white">Nome:
				            <input type="text" name="nome" size="60">
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
                            <input type="text" name="img" value="Imagens/Fotos/" size="60">
                        </p>

                        <p class="text-white">Trailer:
                            <input type="text" name="video" value="https://www.youtube.com/watch?v=" size="60">
                        </p>
                        
                        <p class="text-white">Descrição:</br>
                            <textarea name="desc" rows="10" cols="100" wrap="hard">
                            
                            </textarea> 
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
                    
                }
                
                else
				{
				    echo '
				        <div class="container mt-4 bg-warning">
				            <h5 class="text-bold">ERRO!!! As informações inseridas não são válidas</h5>
				        </div>

				        <a href="Index.php?opc=N"> <button class="btn bg-info text-white mb-4">Voltar</button> </a>

				    ';
				}
            }
                
            ?>
            
        </div>
        <div class="container m-4 mx-auto">
            <p class="text-center text-white">Desenvolvido por GU3002284</p>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>