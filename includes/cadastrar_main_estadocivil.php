<?php 
    require '../config/config.php';     

    if(isset($_POST['cadastrar'])){
    	$reg = new Acme\Models\EstadoCivilModel;

        $regEncontrado = $reg->findBy('ds_estado_civil','"'.$_POST['ds_estado_civil'].'"');

        if(isset($regEncontrado->ds_estado_civil)) { 
           $mensagem = '<div class="ui negative message">
                           <div class="header">
                                Estado civil '.$_POST['ds_estado_civil'].' já cadastrado!
                           </div>
                        </div>';
    	}
        elseif ($_POST['ds_estado_civil'] <> "") {
            
            $cadastrado = $reg->create(

                [
                    'ds_estado_civil' => $_POST['ds_estado_civil'],

                    'st_ativo' => isset($_POST['st_ativo']) ? $_POST['st_ativo'] : 'y'

                ]
            );

            if($cadastrado){

                $mensagem = '<div class="ui success message">
                               <div class="header">
                                  Estado civil cadastrado com sucesso!
                               </div>
                               <p>Você acabou de registrar o Estado civil '.$_POST['ds_estado_civil'].'</p>
                             </div>';
            }
        }
    }

 	//$reg = new Acme\Models\UserModel;

    // cadastrar

 	// $attributes = [

 	//  'nome' => 'Victoria K',

 	//  'sobrenome' => 'Murace',

 	//  'senha' => 'vivik'

 	// ];

 	//$reg->create($attributes);

 	//$reg->delete('id',3);

 	//$reg->update(5,$attributes);

 	// $regEncontrado = $reg->findBy('id',1);

 	// dump($regEncontrado);

    if(isset($_POST['atualizar'])):

    	$reg = new Acme\Models\EstadoCivilModel;

    	$atualizado = $reg->update($_POST['id'],[
					    			'ds_estado_civil' => $_POST['ds_estado_civil'],
					    			'st_ativo' => isset($_POST['st_ativo']) ? $_POST['st_ativo'] : 'y'
					    		]);

    	if($atualizado == 1){

    		$mensagemUpdate = '<div class="ui success message">
						          <div class="header">
						              Estado Civil atualizado com sucesso!
						          </div>
						          <p>Você acabou de atualizar o Estado civil '.$_POST['ds_estado_civil'].'</p>
						       </div>';

    	};

    endif;	

    // deletar

    if(isset($_GET['excluir']) && $_GET['excluir'] == true):

		$reg = new Acme\Models\EstadoCivilModel;

		$reg->delete('id',$_GET['id']);

		header('Location:/gravar/Index.php');

	endif;

 ?>

 <?php require 'menu_tabelas.php'; ?>

 <div style="width: 700px; margin: -400px 0px 0px 300px;">

  <?php 
    if(isset($_GET['q'])){
       require ''.$_GET['q'].'.php';
    }
    else {
          require (isset($_GET['p'])) ? ''.$_GET['p'].'.php' : 'cadastrar_sec_estadocivil.php'; 
    }
  ?>    

 </div>

 <script type="text/javascript" src="public/assets/js/semantic.min.js"></script>

