<!-- list section start -->
<div class="card">
    <div class=" " style="width: 100%;">
        <table class="piloto-list-table table table-sm table-responsive-lg" data-colum="{{count($colunas)}}">
            <thead class="thead-light">
                <tr>
                    @foreach($colunas as $key => $value)
                    <?php
                        $novoValule = $value;
                        switch ($value) {
                            case 'name':$novoValule = 'Nome do Aluno';break;
                            case 'use_perfil':$novoValule = 'Perfil';break;
                            case 'email':$novoValule = 'E-mail';break;
                            case 'use_status':$novoValule = 'Status';break;
                            case 'use_telefone':$novoValule = 'Telefone';break;
                            case 'use_rg':$novoValule = 'RG';break;
                            case 'use_cpf':$novoValule = 'CPF';break;
                            case 'use_sexo':$novoValule = 'Sexo';break;
                            case 'use_dt_nascimento':$novoValule = 'Data de Nascimento';break;
                            case 'use_cartao_sus':$novoValule = 'Cartão do SUS';break;                           
                            case 'mat_status':$novoValule = 'Status da Matrícula';break;
                            case 'mat_data_inicio':$novoValule = 'Data da Matrícula';break;                             
                            case 'hab_leite':$novoValule = 'Leite';break;
                            case 'hab_salsicha':$novoValule = 'Salsicha';break;                                                        
                            case 'hab_salgadinhos_doces':$novoValule = 'Salgadinhos e Doces';break;                                                        
                            case 'hab_queijo':$novoValule = 'Queijo';break;                                                        
                            case 'hab_verduras_legumes':$novoValule = 'Verduras e Legumes';break;                                                        
                            case 'hab_macarrao_instantaneo':$novoValule = 'Macarrão Instantaneo';break;                                                        
                            case 'hab_yakult':$novoValule = 'Yakult';break;                                                        
                            case 'hab_arroz_feijao_graos':$novoValule = 'Arroz, feijao e grãos';break;                                                        
                            case 'hab_figado_miudos':$novoValule = 'Figado e miudos';break;                                                        
                            case 'hab_bolacha':$novoValule = 'Bolacha';break;                                                        
                            case 'hab_macarrao_molho':$novoValule = 'Macarrao com molho';break;                                                        
                            case 'hab_danone':$novoValule = 'Danone';break;                                                        
                            case 'hab_canes':$novoValule = 'Carnes';break;                                                        
                            case 'hab_frutas':$novoValule = 'Frutas';break;                                                        
                            case 'hab_chocolate':$novoValule = 'Chocolate';break;                                                        
                            case 'hab_frango':$novoValule = 'Frango';break;                                                        
                            case 'hab_peixe':$novoValule = 'Peixe';break;                                                        
                            case 'hab_ovos':$novoValule = 'Ovos';break; 
                            case 'resp_nome':$novoValule = 'Nome do Responsável';break; 
                            case 'resp_telefone':$novoValule = 'Telefone';break; 
                            case 'resp_profissao':$novoValule = 'Profissão';break; 
                            case 'resp_autorizacao':$novoValule = 'Altorização';break; 
                            case 'resp_parentesco':$novoValule = 'Parentesco';break; 
                            case 'sau_sus':$novoValule = 'Número do SUS';break;

                            case 'sau_convenio':$novoValule = 'Convênio';break;     
                            case 'sau_tipo_sangue':$novoValule = 'Tipo do sangue';break;     
                            case 'sau_necessidades_especial':$novoValule = 'Necessidades Especiais';break;            
                            case 'sau_animais_qual':$novoValule = 'Animais';break;            
                            case 'sau_descricao_saude':$novoValule = 'Descrição da Saude';break;            
                            case 'sau_xixi_cama':$novoValule = 'Faz xixi na cama';break;            
                            case 'sau_medicamento_qual':$novoValule = 'Uso de Medicamento';break;            
                            case 'sau_tratamento_motivo':$novoValule = 'Tratamentos';break;            
                            case 'sau_internado_motivo':$novoValule = 'Internamentos';break;            
                            case 'sau_cirurgia_motivo':$novoValule = 'Cirurgias';break;            
                            case 'sau_cirurgia_motivo':$novoValule = 'Cirurgias';break;            
                            case 'sau_desmaios':$novoValule = 'Desmaios';break;            
                            case 'sau_convulsoes':$novoValule = 'Convulsões';break;            
                            case 'sau_intolerancia_outros':$novoValule = 'Intolerâncias Outros';break;            
                            case 'sau_intolerancia_glutem':$novoValule = 'Intolerância Glutem';break;            
                            case 'sau_intolerancia_lactose':$novoValule = 'Intolerância Lactose';break;            
                            case 'sau_alergia_detalhe':$novoValule = 'Alergias';break;            
                            case 'sau_parto':$novoValule = 'Parto Normal';break;            
                            case 'sau_sarampo':$novoValule = 'Sarampo';break;            
                            case 'sau_caxumba':$novoValule = 'Caxumba';break;            
                            case 'sau_coqueluche':$novoValule = 'Coqueluche';break;            
                            case 'sau_catapora':$novoValule = 'Catapora';break;            
                            case 'sau_rubeola':$novoValule = 'Rubeola';break;            
                            case 'sau_hepatite':$novoValule = 'Hepatite';break;            
                            case 'sau_bronquite':$novoValule = 'Bronquite';break;            
                            case 'sau_asma':$novoValule = 'Asma';break;            
                            case 'sau_anemia':$novoValule = 'Anemia';break;            
                            case 'sau_menigite':$novoValule = 'Menigite';break;            
                            case 'sau_outras':$novoValule = 'Outras doenças';break;    

                            case 'ser_nome':$novoValule = 'Nome da Série';break;
                            case 'ser_periodo':$novoValule = 'Período';break;                                                        
                            case 'ser_apelido':$novoValule = 'Apelido da Série';break; 
                            
                            case 'soc_tipo_residencia':$novoValule = 'Tipo de Residência';break;
                            case 'soc_residencia_comodos':$novoValule = 'Comodos na Residência';break;                                                        
                            case 'soc_residentes':$novoValule = 'Quantos Residentes';break;                               
                            case 'soc_agua_encanada':$novoValule = 'Água Encanada';break;                               
                            case 'soc_esgoto':$novoValule = 'Esgoto';break;                               
                            case 'soc_fossa':$novoValule = 'Foça';break;                               
                            case 'soc_luz_eletrica':$novoValule = 'Luz Eletrica';break;                               
                            case 'soc_internet':$novoValule = 'Internet';break;                               
                            case 'soc_computador':$novoValule = 'Computador';break;                               
                            case 'soc_veiculo':$novoValule = 'Veículo';break;                               
                            case 'soc_renda_familiar':$novoValule = 'Renda Familiar';break; 

                            case 'end_rua':$novoValule = 'Nome da Rua';break;
                            case 'end_numero':$novoValule = 'Número da Casa';break;                                                        
                            case 'end_complemento':$novoValule = 'Complemento';break;                               
                            case 'end_cep':$novoValule = 'CEP';break;                               
                            case 'end_cidade':$novoValule = 'Cidade';break;                               
                            case 'end_estado':$novoValule = 'Estado';break;                               
                            case 'end_pais':$novoValule = 'Pais';break;                               
                            case 'end_bairro':$novoValule = 'Bairro';break;  
                        }
                    ?>
                        <th>{{$novoValule}}</th>
                                         
                    @endforeach
                </tr>
            </thead>
            <TBOdy>
                @foreach($tabArray as $key => $tab) 
                    <?php
                        // dd($tab);
                    ?>               
                    <tr>
                        @foreach($colunas as $key => $colum)
                            <?php
                                $temp = $tab->$colum;
                                $dados = $tab->$colum;
                                
                                if($dados == ''){$dados = '-';}
                                if($dados == '0'){$dados = 'Não';}
                                if($dados == '1'){$dados = 'Sim';}
                                if($colum == 'use_dt_nascimento' || $colum == 'mat_data_inicio' ){$dados = date( 'd/m/Y' , strtotime($dados)); }
                            

                            ?>
                           <td>
                            @if($colum == 'name')
                                <a href="/usuario/detalhes/{{$tab->userId}}" target="_blank"  title="Entrar no prontuário"> {{$dados}} </a>
                                @else
                                {{$dados}}
                            @endif
                            </td>                   
                        @endforeach
                    </tr>
                @endforeach
            </TBOdy>
        </table>
    </div>
</div>
<!-- list section end -->