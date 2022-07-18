<?php 

    require_once '../config/config.php'; 

    if(isset($_POST['cadastrar'])){

    	$reg = new Acme\Models\DependenteModel;

      $regEncontrado = $reg->findBy('nm_dependente','"'.$_POST['nm_dependente'].'"');

      if(isset($regEncontrado->id)) { 
           $mensagem = '<div class="ui negative message">
                           <div class="header">
                                Dependente '.$_POST['nm_dependente'].' já cadastrado!
                           </div>
                        </div>';
    	}
      else{ 
            $cadastrado = $reg->create(
                [
                    'id_colaborador' => $_POST['id_colaborador'],
                    'nm_dependente' => $_POST['nm_dependente'],
                    'tp_sexo' => (isset($_POST['tp_sexo'])) ? $_POST['tp_sexo'] : 'F',
                    'dt_nasc' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_nasc']))),
                    'id_parentesco' => $_POST['id_parentesco'],
                    'nm_local_nasc' => $_POST['nm_local_nasc'],
                    'st_vacina' => (isset($_POST['st_vacina'])) ? $_POST['st_vacina'] : 'y',
                    'st_sal_familia' => (isset($_POST['st_sal_familia'])) ? $_POST['st_sal_familia'] : 'n',
                    'st_seguro_vida' => (isset($_POST['st_seguro_vida'])) ? $_POST['st_seguro_vida'] : 'n',
                    'st_imposto_renda' => (isset($_POST['st_imposto_renda'])) ? $_POST['st_imposto_renda'] : 'n',
                    'dt_certidao' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_certidao'])))
                ]
            );


            $mensagem = '<div class="ui success message">
                               <div class="header">
                                  Dependente do Colaborador cadastrado com sucesso!
                               </div>
                             </div>';
      }
    }

 	//$user = new Acme\Models\UserModel;

    // cadastrar

 	// $attributes = [

 	//  'nome' => 'Victoria K',

 	//  'sobrenome' => 'Murace',

 	//  'senha' => 'vivik'

 	// ];

 	//$reg->create($attributes);

 	//$reg->delete('id',3);

 	//$reg->update(5,$attributes);

 	// $userEncontrado = $reg->findBy('id',1);

 	// dump($userEncontrado);

    if(isset($_POST['atualizar'])):

    	$reg = new Acme\Models\DependenteModel;

        $regfind = $reg->findBy('nm_dependente','"'.$_GET['nm_dependente'].'"');

		if(isset($regfind->id) && $regfind->id <> $_POST['id']) { 
		           $mensagem = '<div class="ui negative message">
		                           <div class="header">
		                                Dependente '.$_POST['nm_dependente'].' já cadastrado para outro Colaborador, verifique!
		                           </div>
		                        </div>';
    	}     
    	else{   
	    	$atualizado = $reg->update($_POST['id'],[
					                    'id_colaborador' => $_POST['id_colaborador'],
					                    'nm_dependente' => $_POST['nm_dependente'],
					                    'tp_sexo' => (isset($_POST['tp_sexo'])) ? $_POST['tp_sexo'] : 'F',
					                    'dt_nasc' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_nasc']))),
					                    'id_parentesco' => $_POST['id_parentesco'],
					                    'nm_local_nasc' => $_POST['nm_local_nasc'],
					                    'st_vacina' => (isset($_POST['st_vacina'])) ? $_POST['st_vacina'] : 'y',
					                    'st_sal_familia' => (isset($_POST['st_sal_familia'])) ? $_POST['st_sal_familia'] : 'n',
					                    'st_seguro_vida' => (isset($_POST['st_seguro_vida'])) ? $_POST['st_seguro_vida'] : 'n',
					                    'st_imposto_renda' => (isset($_POST['st_imposto_renda'])) ? $_POST['st_imposto_renda'] : 'n',
					                    'dt_certidao' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_certidao'])))
						    		]);

	    	if($atualizado == 1){

	    		$mensagemUpdate = '<div class="ui success message">
							          <div class="header">
							              Dependente do Colaborador atualizado com sucesso!
							          </div>
							          <p>Você acabou de atualizar Dados do Dependente '.$_POST['nm_dependente'].'</p>
							       </div>';

	    	};
	    }

    endif;	

    // deletar

    if(isset($_GET['excluir']) && $_GET['excluir'] == true):

		$reg = new Acme\Models\ColaboradorModel;

		$reg->delete('id',$_GET['id']);

		header('Location:/gravar/Index.php');

	endif;

 ?>
  <?php require 'menu_colaboradores.php'; ?>

  <div style="width: 700px; margin: -150px 0px 0px 300px;">

  <?php require (isset($_GET['p'])) ? ''.$_GET['p'].'.php' : 'cadastrar_sec_depend.php'; ?>

  </div>

  
