<?php
    class Usuario extends Conexao{
        private $Id;
        private $Login;
        private $Nome;
        private $Rg;
        private $Cpf;
        private $DataNasc;
        private $Estado;
        private $Cidade;
        private $Endereco;
        private $Telefone;
        private $Email;
        private $Senha;
        private $Imagem;
        private $Status;

        public function SetId($id){
            $this->Id = $id;
        }

        public function GetId(){
            return $this->Id;
        }

        public function SetLogin($login){
            $this->Login = $login;
        }

        public function GetLogin(){
            return $this->Login;
        }

        public function SetNome($nome){
            $this->Nome = $nome;
        }

        public function GetNome(){
            return $this->Nome;
        }

        public function SetRg($rg){
            $this->Rg = $rg;
        }

        public function GetRg(){
            return $this->Rg;
        }

        public function SetCpf($cpf){
            $this->Cpf = $cpf;
        }

        public function GetCpf(){
            return $this->Cpf;
        }

        public function SetDataNasc($dataNasc){
            $this->DataNasc = $dataNasc;
        }

        public function GetDataNasc(){
            return $this->DataNasc;
        }

        public function SetEstado($estado){
            $this->Estado = $estado;
        }

        public function GetEstado(){
            return $this->Estado;
        }

        public function SetCidade($cidade){
            $this->Cidade = $cidade;
        }

        public function GetCidade(){
            return $this->Cidade;
        }

        public function SetEndereco($endereco){
            $this->Endereco = $endereco;
        }

        public function GetEndereco(){
            return $this->Endereco;
        }

        public function SetTelefone($telefone){
            $this->Telefone = $telefone;
        }

        public function GetTelefone(){
            return $this->Telefone;
        }

        public function SetEmail($email){
            $this->Email = $email;
        }

        public function GetEmail(){
            return $this->Email;
        }

        public function SetSenha($senha){
            $this->Senha = $senha;
        }

        public function GetSenha(){
            return $this->Senha;
        }

        public function SetImagem($imagem){
            $this->Imagem = $imagem;
        }

        public function GetImagem(){
            return $this->Imagem;
        }

        public function SetStatus($status){
            $this->Status = $status;
        }

        public function GetStatus(){
            return $this->Status;
        }

        public function InsertUsuario(){
            try{
                date_default_timezone_set('America/Sao_Paulo');
                $dataAtual = date("Y-m-d H:i:s");

                $pdo = parent::getDB();

                $query = "INSERT INTO USUARIO(
                                    LOGIN
                                    ,NOME
                                    ,CIDADE
                                    ,ENDERECO
                                    ,ESTADO
                                    ,RG
                                    ,IMAGEM
                                    ,TELEFONE
                                    ,DATANASC
                                    ,SENHA
                                    ,DATA_INCLUSAO
                                    ,EMAIL
                                    ,CPF
                                    ,STATUS
                                    )
                                    VALUES
                                    (:LOGIN
                                    ,:NOME
                                    ,:CIDADE
                                    ,:ENDERECO
                                    ,:ESTADO
                                    ,:RG
                                    ,:IMAGEM
                                    ,:TELEFONE
                                    ,:DATANASC
                                    ,:SENHA
                                    ,:DATA_INCLUSAO
                                    ,:EMAIL
                                    ,:CPF
                                    ,:STATUS
                                    )";

                $stmt = $pdo->prepare($query);

                $stmt->execute(
                    array(
                        ':LOGIN' => $this->GetLogin()
                        ,':NOME' => $this->GetNome()
                        ,':CIDADE' => $this->GetCidade()
                        ,':ENDERECO' => $this->GetEndereco()
                        ,':ESTADO' => $this->GetEstado()
                        ,':RG' => $this->GetRg()
                        ,':IMAGEM' => $this->GetImagem()
                        ,':TELEFONE' => $this->GetTelefone()
                        ,':DATANASC' => $this->GetDataNasc()
                        ,':SENHA' => $this->GetSenha()
                        ,':DATA_INCLUSAO' => $dataAtual
                        ,':EMAIL' => $this->GetEmail()
                        ,':CPF' => $this->GetCpf()
                        ,':STATUS' => 1 //inserir com status de ativo
                    )
                    );
                
                return true;

            }
            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        public function GetUsuarioByCodigoUsuario($codigoUsuario){
            $where = "WHERE LOGIN = '$codigoUsuario'";

            return $this->GetUsuario($where);
        }

        public function GetUsuario($where){
            $pdo = parent::getDB();

            $query = "SELECT 
                    	USUARIO.ID
                        ,LOGIN
                        ,USUARIO.NOME
                        ,USUARIO.CIDADE
                        ,CIDADE.NOME CIDADE_NOME
                        ,ENDERECO
                        ,USUARIO.ESTADO
                        ,ESTADO.NOME ESTADO_NOME
                        ,RG
                        ,IMAGEM
                        ,FUNCAO
                        ,TELEFONE 
                        ,DATANASC
                        ,DATE_FORMAT(DATANASC, '%d/%m/%Y') AS DATANASC_FORMAT
                        ,SENHA
                        ,DATE_FORMAT(DATA_INCLUSAO, '%d/%m/%Y %H:%i:%s') AS DATA_INCLUSAO
                        ,CPF
                        ,EMAIL
                        ,STATUS
                    FROM
                        USUARIO
                    LEFT JOIN
                    	ESTADO
                    ON USUARIO.ESTADO = ESTADO.id
                    LEFT JOIN
                    	CIDADE
                    ON
                    	USUARIO.CIDADE = CIDADE.ID
                    $where";
            
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function UsuarioUpdate(){
            try{
                $pdo = parent::getDB();

                $query = "UPDATE USUARIO
                            SET LOGIN = :LOGIN
                                ,NOME = :NOME
                                ,CIDADE = :CIDADE
                                ,ENDERECO = :ENDERECO
                                ,ESTADO = :ESTADO
                                ,RG = :RG
                                ,TELEFONE = :TELEFONE
                                ,DATANASC = :DATANASC
                                ,EMAIL = :EMAIL
                                ,CPF = :CPF
                            WHERE ID = :ID
                            ";
                $stmt = $pdo->prepare($query);

                $stmt->execute(
                    array(
                        ':LOGIN' => $this->GetLogin()
                        ,':NOME' => $this->GetNome()
                        ,':CIDADE' => $this->GetCidade()
                        ,':ENDERECO' => $this->GetEndereco()
                        ,':ESTADO' => $this->GetEstado()
                        ,':RG' => $this->GetRg()
                        ,':TELEFONE' => $this->GetTelefone()
                        ,':DATANASC' => $this->GetDataNasc()
                        ,':EMAIL' => $this->GetEmail()
                        ,':CPF' => $this->GetCpf()
                        ,':ID' => $this->GetId() 
                    )
                );

                return $stmt->rowCount();
            }
            catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }

        public function UsuarioUpdateStatus(){
            try{
                $pdo = parent::getDB();

                $query = "UPDATE USUARIO
                            SET STATUS = :STATUS
                            WHERE ID = :ID";

                $stmt = $pdo->prepare($query);

                $stmt->execute(array(
                    ':STATUS' => $this->GetStatus()
                    ,':ID' => $this->GetId()
                ));

                return $stmt->rowCount();
            }
            catch(PDOException $e){
                echo 'Error: ' . $e->getMessage();
            }
        }
    }
?>