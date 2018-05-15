<?php
    class Propriedade extends Conexao{
        private $Id;
        private $Nome;
        private $Descricao;
        private $Cliente;
        private $Valor;
        private $Area;
        private $UsuarioCadastro;
        private $Status;
        private $Dormitorio;
        private $Banheiro;
        private $Garagem;
        private $Cidade;
        private $Estado;
        private $Avaliacao;
        private $StatusPropriedade;
        private $TipoImovel;

        public function SetId($id){
            $this->Id = $id;
        }

        public function GetId(){
            return $this->Id;
        }

        public function SetNome($nome){
            $this->Nome = $nome;
        }

        public function GetNome(){
            return $this->Nome;
        }

        public function SetValor($valor){
            $this->Valor = $valor;
        }

        public function GetValor(){
            return $this->Valor;
        }

        public function SetDescricao($descricao){
            $this->Descricao = $descricao;
        }

        public function GetDescricao(){
            return $this->Descricao;
        }

        public function SetCliente($cliente){
            $this->Cliente = $cliente;
        }

        public function GetCliente(){
            return $this->Cliente;
        }


        public function SetArea($area){
            $this->Area = $area;
        }

        public function GetArea(){
            return $this->Area;
        }


        public function SetUsuarioCadastro($usuarioCadastro){
            $this->UsuarioCadastro = $usuarioCadastro;
        }

        public function GetUsuarioCadastro(){
            return $this->UsuarioCadastro;
        }

        public function SetStatus($status){
            $this->Status = $status;
        }

        public function GetStatus(){
            return $this->Status;
        }

        public function SetDormitorio($dormitorio){
            $this->Dormitorio = $dormitorio;
        }

        public function GetDormitorio(){
            return $this->Dormitorio;
        }

        public function SetBanheiro($banheiro){
            $this->Banheiro = $banheiro;
        }

        public function GetBanheiro(){
            return $this->Banheiro;
        }

        public function SetGaragem($garagem){
            $this->Garagem = $garagem;
        }

        public function GetGaragem(){
            return $this->Garagem;
        }

        public function SetCidade($cidade){
            $this->Cidade = $cidade;
        }

        public function GetCidade(){
            return $this->Cidade;
        }

        public function SetEstado($estado){
            $this->Estado = $estado;
        }

        public function GetEstado(){
            return $this->Estado;
        }

        public function SetAvaliacao($avaliacao){
            $this->Avaliacao = $avaliacao;
        }

        public function GetAvaliacao(){
            return $this->Avaliacao;
        }

        public function SetStatusPropriedade($statusPropriedade){
            $this->StatusPropriedade = $statusPropriedade;
        }

        public function GetStatusPropriedade(){
            return $this->StatusPropriedade;
        }

        public function SetTipoimovel($tipoImovel){
            $this->TipoImovel = $tipoImovel;
        }

        public function GetTipoImovel(){
            return $this->TipoImovel;
        }

        

        public function StartConection(){
            $pdo = parent::getDB();

            return $pdo;
        }
        
        
        public function Insert(){
            try{
                date_default_timezone_set('America/Sao_Paulo');
                $dataAtual = date("Y-m-d H:i:s");

                $pdo = parent::getDB();

                $sql = "INSERT INTO PROPRIEDADE 
                                    (NOME
                                     ,DESCRICAO
                                     ,CLIENTE
                                     ,VALOR
                                     ,AREA_M2
                                     ,USUARIO_CADASTRO
                                     ,DATA_CADASTRO
                                     ,STATUS
                                     ,DORMITORIO
                                     ,BANHEIRO
                                     ,GARAGEM
                                     ,CIDADE
                                     ,ESTADO
                                     ,AVALIACAO
                                     ,STATUS_PROPRIEDADE
                                     ,TIPO_IMOVEL
                                     )
                                     VALUES
                                     (:NOME
                                     ,:DESCRICAO
                                     ,:CLIENTE
                                     ,:VALOR
                                     ,:AREA_M2
                                     ,:USUARIO_CADASTRO
                                     ,:DATA_CADASTRO
                                     ,:STATUS
                                     ,:DORMITORIO
                                     ,:BANHEIRO
                                     ,:GARAGEM
                                     ,:CIDADE
                                     ,:ESTADO
                                     ,:AVALIACAO
                                     ,:STATUS_PROPRIEDADE
                                     ,:TIPO_IMOVEL
                                     )";

                $stmt = $pdo->prepare($sql);

                $stmt->execute(
                    array(
                        ':NOME'                 => $this->GetNome()
                        ,':DESCRICAO'           => $this->GetDescricao()
                        ,':CLIENTE'             => $this->GetCliente()
                        ,':VALOR'               => $this->GetValor()
                        ,':AREA_M2'             => $this->GetArea()
                        ,':USUARIO_CADASTRO'    => $this->GetUsuarioCadastro()
                        ,':DATA_CADASTRO'       => $dataAtual
                        ,':STATUS'              => $this->GetStatus()
                        ,':DORMITORIO'          => $this->GetDormitorio()
                        ,':BANHEIRO'            => $this->GetBanheiro()
                        ,':GARAGEM'             => $this->GetGaragem()
                        ,':CIDADE'              => $this->GetCidade()
                        ,':ESTADO'              => $this->GetEstado()
                        ,':AVALIACAO'           => $this->GetAvaliacao()
                        ,':STATUS_PROPRIEDADE'  => $this->GetStatusPropriedade()
                        ,':TIPO_IMOVEL'         => $this->GetTipoImovel()
                    )
                );

                return $stmt->rowCount();
            }
            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }

        }

        public function UpdatePropriedade($pdo){
            try{
                $sql = "UPDATE PROPRIEDADE SET
                                NOME                = :NOME
                                ,DESCRICAO          = :DESCRICAO
                                ,CLIENTE            = :CLIENTE
                                ,VALOR              = :VALOR
                                ,AREA_M2            = :AREA_M2
                                ,DORMITORIO         = :DORMITORIO
                                ,BANHEIRO           = :BANHEIRO
                                ,GARAGEM            = :GARAGEM
                                ,CIDADE             = :CIDADE
                                ,ESTADO             = :ESTADO
                                ,AVALIACAO          = :AVALIACAO
                                ,STATUS_PROPRIEDADE = :STATUS_PROPRIEDADE 
                                ,TIPO_IMOVEL        = :TIPO_IMOVEL
                                WHERE ID = :ID";

                $stmt = $pdo->prepare($sql);

                $stmt->execute(
                    array(
                        ':NOME'                 => $this->GetNome()
                        ,':DESCRICAO'           => $this->GetDescricao()
                        ,':CLIENTE'             => $this->GetCliente()
                        ,':VALOR'               => $this->GetValor()
                        ,':AREA_M2'             => $this->GetArea()
                        ,':DORMITORIO'          => $this->GetDormitorio()
                        ,':BANHEIRO'            => $this->GetBanheiro()
                        ,':GARAGEM'             => $this->GetGaragem()
                        ,':CIDADE'              => $this->GetCidade()
                        ,':ESTADO'              => $this->GetEstado()
                        ,':AVALIACAO'           => $this->GetAvaliacao()
                        ,':STATUS_PROPRIEDADE'  => $this->GetStatusPropriedade()
                        ,':ID'                  => $this->GetId()
                        ,':TIPO_IMOVEL'         => $this->GetTipoImovel()
                    )
                );

                return $stmt->rowCount();
            }
            catch(PDOException $e){
                throw new Exception($e);
            }
        }

        public function DeletePropriedade($pdo){
            try{
                $sql = "UPDATE PROPRIEDADE
                        SET STATUS = 0
                        WHERE ID = :ID";

                $stmt = $pdo->prepare($sql);

                $stmt->execute(
                    array(
                        ':ID' => $this->GetId()
                    )
                );

                return $stmt->rowCount();
            }
            catch(PDOException $e){
                throw new Exception($e);
            }
        }

        public function GetPropriedadeByStatus($status){
            $where = ("WHERE PRO.STATUS = ". $status);
            return $this->GetPropriedade($where);
        }

        public function GetPropriedadeById($id){
            $where = "WHERE PRO.ID = $id";

            return $this->GetPropriedade($where); 
        }

        public function GetPropriedadeByOrdemAndLimit($ordem,$limit){
            $where = "WHERE PRO.STATUS = 1 ORDER BY $ordem LIMIT $limit";
            return $this->GetPropriedade($where);
        }

        public function GetPropriedades(
            $maxValue,
            $minValue,
            $cidade,
            $status,
            $bairro,
            $areaMin,
            $areaMax,
            $banheiroMin,
            $banheiroMax,
            $dormitorioMin,
            $dormitorioMax,
            $tipoImovel,
            $ordem,
            $limit
        ){
            $where = "WHERE 
                            PRO.BANHEIRO    >= $banheiroMin
                        AND PRO.BANHEIRO    <= $banheiroMax
                        AND PRO.DORMITORIO  >= $dormitorioMin
                        AND PRO.DORMITORIO  <= $dormitorioMax
                        AND PRO.AREA_M2     >= $areaMin
                        AND PRO.AREA_M2     <= $areaMax"
                        ." AND PRO.STATUS = 1"
                        ;

            if (!empty($minValue))
                $where = $where." AND PRO.VALOR >= $minValue";

            if (!empty($maxValue))
                $where = $where." AND PRO.VALOR <= $maxValue";
            
            if (!empty($cidade))
                $where = $where." AND PRO.CIDADE = $cidade";

            if (!empty($bairro))
                $where = $where." AND PRO.BAIRRO LIKE '%$bairro%'";
            
            if (!empty($status))
                $where = $where. " AND PRO.STATUS_PROPRIEDADE = '$status'";
            if (!empty($tipoImovel))
                $where = $where." AND PRO.TIPO_IMOVEL = ". $tipoImovel; 
                
            if (!empty($ordem))
                $where = $where. " ORDER BY $ordem";
            
            if (!empty($limit))
                $where = $where. " LIMIT $limit";

            return $this->GetPropriedade($where);
        }

        public function GetPropriedade($where){
            try{
                $pdo = parent::getDB();

                $sql = "SELECT " .
                        "PRO.ID " .
                        ",PRO.NOME " .
                        ",PRO.DESCRICAO " .
                        ",PRO.CLIENTE " .
                        ",CLI.NOME AS NOME_CLIENTE " .
                        ",PRO.VALOR " .
                        ",PRO.AREA_M2 " .
                        ",PRO.USUARIO_CADASTRO " .
                        ",PRO.DATA_CADASTRO " .
                        ",PRO.STATUS " .
                        ",PRO.DORMITORIO " .
                        ",PRO.BANHEIRO " .
                        ",PRO.GARAGEM " .
                        ",PRO.CIDADE " .
                        ",CID.NOME AS NOME_CIDADE " .
                        ",PRO.ESTADO " .
                        ",EST.NOME AS NOME_ESTADO " .
                        ",PRO.AVALIACAO " .
                        ",PRO.STATUS_PROPRIEDADE " .
                        ",PRO.TIPO_IMOVEL " .
                        ",TIMOVEL.NOME AS DESCRICAO_TIPO_IMOVEL ".
                    "FROM " .
                        "PROPRIEDADE PRO " .
                    "LEFT JOIN " .
                        "CLIENTE CLI ON CLI.ID_CLIENTE = PRO.CLIENTE " .
                    "LEFT JOIN " .
                        "CIDADE CID " .
                    "ON " .
                        "CID.ID = PRO.CIDADE " .
                    "LEFT JOIN " .
                        "ESTADO EST " .
                    "ON " .
                        "EST.ID = PRO.ESTADO " . 
                    "LEFT JOIN " .
                        "TIPO_IMOVEL TIMOVEL " .
                    "ON " .
                        "TIMOVEL.ID = PRO.TIPO_IMOVEL ".
                    $where ;

                $stmt = $pdo->prepare($sql);                   
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e){
                echo 'Error: ' . $e->getMessage();
            }
            
        }
    }
?>