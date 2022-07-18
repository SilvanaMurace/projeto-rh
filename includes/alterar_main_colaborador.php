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

      $nr_CPF = str_replace('.', '', $_POST['nr_CPF']);
      $nr_CPF = str_replace('-', '', $nr_CPF);

      $atualizado = $reg->update($_POST['id'],[
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

    if(isset($_POST['atualizarcompl'])):

      $reg = new Acme\Models\ColaboradorComplModel;

      $atualizado = $reg->update($_POST['id'],[
                    'nr_cep' => $_POST['nr_cep'],
                    'ds_endereco' => $_POST['ds_endereco'],
                    'ds_bairro' => $_POST['ds_bairro'],
                    'nr_tel_fixo' => $_POST['nr_tel_fixo'],
                    'nr_tel_celular' => $_POST['nr_tel_celular'],
                    'nr_tel_celular2' => $_POST['nr_tel_celular2'],
                    'ds_email' => $_POST['ds_email'],
                    'nm_local_nasc' => $_POST['nm_local_nasc'],
                    'id_uf_nasc' => $_POST['id_uf_nasc'],
                    'id_nacionalidade' => $_POST['id_nacionalidade'],
                    'nr_ano_chegada' => $_POST['nr_ano_chegada'],
                    'id_grau_instrucao' => $_POST['id_grau_instrucao'],
                    'nm_pai' => $_POST['nm_pai'],
                    'id_nacionalidade_pai' => $_POST['id_nacionalidade_pai'],
                    'nm_mae' => $_POST['nm_mae'],
                    'id_nacionalidade_mae' => $_POST['id_nacionalidade_mae'],
                    'nr_titulo_eleitor' => $_POST['nr_titulo_eleitor'],
                    'nr_registro' => $_POST['nr_registro'],
                    'nr_CNH' => $_POST['nr_CNH'],
                    'nr_categ_CNH' => $_POST['nr_categ_CNH'],
                    'nr_cart_reserva' => $_POST['nr_cart_reserva'],
                    'ds_categ_reserva' => $_POST['ds_categ_reserva'],
                    'id_banco_deposito' => $_POST['id_banco_deposito'],
                    'nr_agencia_deposito' => $_POST['nr_agencia_deposito'],
                    'nr_conta_deposito' => $_POST['nr_conta_deposito'],
                    'id_vinculo_empregaticio' => $_POST['id_vinculo_empregaticio'],
                    'cd_categoria' => $_POST['cd_categoria'],
                    'cd_ocorrencia' => $_POST['cd_ocorrencia']
                  ]);

      if($atualizado == 1){

        $mensagemUpdate = '<div class="ui success message">
                      <div class="header">
                          Informações complementares do Colaborador atualizado com sucesso!
                      </div>
                      <p>Você acabou de atualizar Dados do Colaborador '.$_POST['nm_colaborador'].'</p>
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

  <div style="width: 700px; margin: -150px 0px 0px 300px;">

  <?php  /*require (isset($_GET['p'])) ? ''.$_GET['p'].'.php' : 'alterar_sec_colaborador.php'; */
        if(isset($_GET['p'])){
           require ''.$_GET['p'].'.php';
        }
        else if(isset($_GET['q'])){
           require ''.$_GET['q'].'.php';
        }
        else {
               require 'alterar_sec_colaborador.php';
        }
  ?>

  </div>

