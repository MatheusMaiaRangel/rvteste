<?php
    $imagem=$_POST['image'];
    $nome=$_POST['nome'];
    $cpf=$_POST['cpf'];
    $nascimento=$_POST['nascimento'];
    $sangue=$_POST['tipo-sanguineo'];
    $nome_contato=$_POST['nome-contato'];
    $n_contato_e=$_POST['contato-emergencia'];
    $peso=$_POST['peso'];
    $altura=$_POST['altura'];
    $alcool=$_POST['alcool'];
    $doacao=$_POST['doacao'];
    $transplante=$_POST['transplante'];
    $alergia_m=$_POST['alergiaMedicamento'];
    $onr=$_POST['onr'];
    $tabagismo=$_POST['tabagismo'];
    $alteracao_c=$_POST['alteracoesCardiacas'];
    $marcapasso=$_POST['portadorMarcapasso'];
    $plano_saude=$_POST['planoSaude'];
    $q_plano=$_POST['planoSaudeDetalhes'];
    $restricao_re=$_POST['restricaoReligiosa'];
    $q_restricao_re=$_POST['q_restricao_r'];
    $a_fisica=$_POST['atividadeFisica'];
    $q_a_fisica=$_POST['q_a_fisica'];
    $doenca_p_existente=$_POST['doencaPreExistente'];
    $q_d_p_existente=$_POST['q_d_p_existente'];
    $medicamento=$_POST['usoMedicamento'];
    $q_medicamento=$_POST['q_medicamento'];
    $cirurgia=$_POST['cirurgiaAnterior'];
    $q_cirurgia=$_POST['q_cirurgia'];
    $senha = isset($_POST['confirmar-senha']) ? password_hash($_POST['confirmar-senha'], PASSWORD_DEFAULT) : '';
    $q_transplante=$_POST['q_transplante'];
    $q_alergia_m=$_POST['q_alergia'];


    $sevidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname="rv";
    
    $strcon = mysqli_connect($sevidor, $usuario, $senha, $dbname) or die('Erro ao conectar ao banco de dados');
    
    $strincluir = "INSERT INTO paciente (cpf, senha_paci, nome_paci, nascimento_paci, tipo_s_paci, nome_contato_e_paci, contato_e_paci, peso_paci, altura_paci, alcool_paci, doa_paci, org_tra_paci, qual_org_tra_paci, ale_med_paci, qual_ale_med_paci, onr_paci, tabaco_paci, alteracao_c_paci, marcap_paci, plano_s_paci, qual_pla_s_paci, rest_re_paci, qual_rest_re_paci, ativi_paci, qual_ativ_paci, doe_pre_exi_paci, qual_doe_pre_exi_paci, medic_paci, qual_medic_paci, cirurgia_paci, qual_ciru_paci) 
    VALUES ('$cpf', '$senha', '$nome', '$nascimento', '$sangue', '$nome_contato', '$n_contato_e', '$peso', '$altura', '$alcool', '$doacao', '$transplante', '$q_transplante', '$alergia_m', '$q_alergia_m', '$onr', '$tabagismo', '$alteracao_c', '$marcapasso', '$plano_saude', '$q_plano', '$restricao_re', '$q_restricao_re', '$a_fisica', '$q_a_fisica', '$doenca_p_existente', '$q_d_p_existente', '$medicamento', '$q_medicamento', '$cirurgia', '$q_cirurgia')" or die ("Erro ao cadastrar");
    
    mysqli_query($strcon, $strincluir);
    mysqli_close($strcon);
    
    if (isset($_POST['submit'])) {
        // Definir o diretório de upload
        $uploadDir = '../../uploads/';  // Certifique-se de que o caminho esteja correto
        $fileName = $_FILES['image']['name'];  // Nome original da imagem
        $uploadFile = $uploadDir . basename($fileName);  // Caminho completo
    
        
        // Verificar se o diretório existe, se não, criar
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
    
        // Arquivo temporário
        $fileTemp = $_FILES['image']['tmp_name'];
        
        // Nome do arquivo original
        $fileName = $_FILES['image']['name'];
        
        // Caminho completo para salvar o arquivo
        $uploadFile = $uploadDir . basename($fileName);
        
        // Verificar se a imagem foi carregada corretamente
        if (move_uploaded_file($fileTemp, $uploadFile)) {
            echo "Imagem carregada com sucesso!";
            
            // Exibir a imagem
            echo "$uploadFile";
        } else {
            echo "Erro ao carregar a imagem!";
        }
    }
    
    session_start();
    $_SESSION['cpf'] = $cpf;
    $_SESSION['image'] = $uploadFile;

    header("Location: ../PHP/index.php");
    exit();
?>