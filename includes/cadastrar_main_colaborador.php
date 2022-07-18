<?php 

    require_once '../config/config.php'; 

    if(isset($_POST['cadastrar'])){

    	$reg = new Acme\Models\ColaboradorModel;

      $regEncontrado = $reg->findBy('nr_CPF','"'.$_POST['nr_CPF'].'"');

      if(isset($regEncontrado->id)) { 
           $mensagem = '<div class="ui negative message">
                           <div class="header">
                                CPF do Colaborador(a) '.$_POST['nm_colaborador'].' já cadastrado(a)!
                           </div>
                        </div>';
    	}
      else{ 
            $nr_CPF = str_replace('.', '', $_POST['nr_CPF']);
            $nr_CPF = str_replace('-', '', $nr_CPF);

            $cadastrado = $reg->create(
                [
                    'id' => $_POST['id'],
                    'nm_colaborador' => $_POST['nm_colaborador'],
                    'nm_apelido' => $_POST['nm_apelido'],
                    'tp_sexo' => (isset($_POST['tp_sexo'])) ? $_POST['tp_sexo'] : 'F',
                    'dt_nasc' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_nasc']))),
                    'nr_RG' => $_POST['nr_RG'],
                    'id_uf_RG' => $_POST['id_uf_RG'],
                    'nr_CPF' => $nr_CPF,
                    'id_estado_civil' => $_POST['id_estado_civil'],
                    'id_situacao' => $_POST['id_situacao'],
                    'nr_CTPS' => $_POST['nr_CTPS'],
                    'sr_CTPS' => $_POST['sr_CTPS'],
                    'id_uf_CTPS' => $_POST['id_uf_CTPS'],
                    'nr_PIS' => $_POST['nr_PIS'],
                    'dt_PIS' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_PIS']))), 
                    'id_banco_PIS' => $_POST['id_banco_PIS'],
                    'st_aposentado' => (isset($_POST['st_aposentado'])) ? $_POST['st_aposentado'] : 'n',
                    'dt_aposentadoria' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_aposentadoria']))),
                    'nr_opcao_FGTS' => $_POST['nr_opcao_FGTS'],
                    'dt_opcao_FGTS' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_opcao_FGTS']))),
                    'id_banco_FGTS' => $_POST['id_banco_FGTS'],
                    'nr_conta_FGTS' => $_POST['nr_conta_FGTS'],
                    'tp_sanguineo' => $_POST['tp_sanguineo'],
                    'st_ativo' => (isset($_POST['st_ativo'])) ? $_POST['st_ativo'] : 'y'
                ]
            );

            if($cadastrado){

                $mensagem = '<div class="ui success message">
                               <div class="header">
                                  Colaborador cadastrado com sucesso!
                               </div>
                               <p>Você acabou de registrar o Colaborador '.$_POST['nm_colaborador'].'</p>
                             </div>';
            }
      }
    }

    if(isset($_POST['atualizar'])):

    	$reg = new Acme\Models\ColaboradorModel;

    	$atualizado = $reg->update($_POST['id'],[
                    'nm_colaborador' => $_POST['nm_colaborador'],
                    'nm_apelido' => $_POST['nm_apelido'],
                    'tp_sexo' => $_POST['tp_sexo'],
                    'dt_nasc' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_nasc']))),
                    'nr_RG' => $_POST['nr_RG'],
                    'id_uf_RG' => $_POST['id_uf_RG'],
                    'nr_CPF' => $_POST['nr_CPF'],
                    'id_estado_civil' => $_POST['id_estado_civil'],
                    'id_situacao' => $_POST['id_situacao'],
                    'nr_CTPS' => $_POST['nr_CTPS'],
                    'sr_CTPS' => $_POST['sr_CTPS'],
                    'id_uf_CTPS' => $_POST['id_uf_CTPS'],
                    'nr_PIS' => $_POST['nr_PIS'],
                    'dt_PIS' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_PIS']))), 
                    'id_banco_PIS' => $_POST['id_banco_PIS'],
                    'st_aposentado' => $_POST['st_aposentado'],
                    'dt_aposentadoria' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_aposentadoria']))),
                    'nr_opcao_FGTS' => $_POST['nr_opcao_FGTS'],
                    'dt_opcao_FGTS' => date('y-m-d',strtotime(str_replace("/","-",$_POST['dt_opcao_FGTS']))), 
                    'id_banco_FGTS' => $_POST['id_banco_FGTS'],
                    'nr_conta_FGTS' => $_POST['nr_conta_FGTS'],
                    'tp_sanguineo' => $_POST['tp_sanguineo'],
                    'st_ativo' => $_POST['st_ativo']
					    		]);

    	if($atualizado == 1){

    		$mensagemUpdate = '<div class="ui success message">
						          <div class="header">
						              Colaborador atualizado com sucesso!
						          </div>
						          <p>Você acabou de atualizar o Colaborador '.$_POST['nm_colaborador'].'</p>
						       </div>';

    	};

    endif;	

    // deletar

    if(isset($_GET['excluir']) && $_GET['excluir'] == true):

		$reg = new Acme\Models\ColaboradorModel;

		$reg->delete('id',$_GET['id']);

		header('Location:/gravar/Index.php');

	endif;

 ?>
  <?php require 'menu_colaboradores.php'; ?>

  <div style="width: 700px; margin: -100px 0px 0px 300px;">

  <?php require (isset($_GET['p'])) ? ''.$_GET['p'].'.php' : 'cadastrar_sec_colaborador.php'; ?>

  </div>

  
