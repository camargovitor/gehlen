<?php
    class PropriedadeImagem extends Conexao{
        private $Id;
        private $IdPropriedade;
        private $Caminho;
        private $Status;
        private $UsuarioCadastro;
        private $DataCadastro;
        private $Descricao;


        public function GetId(){
            return $this->Id;
        }

        public function SetId($id){
            $this->Id = $id;
        }


        public function SetIdPropriedade($idPropriedade){
            $this->IdPropriedade = $idPropriedade;
        }

        public function GetIdPropriedade(){
            return $this->IdPropriedade;
        }

        public function SetCaminho($caminho){
            $this->Caminho = $caminho;
        }

        public function GetCaminho(){
            return $this->Caminho;
        }

        public function SetStatus($status){
            $this->Status = $status;
        }

        public function GetStatus(){
            return $this->Status;
        }

        public function SetUsuarioCadastro($usuarioCadastro){
            $this->UsuarioCadastro = $usuarioCadastro;
        }

        public function GetUsuarioCadastro(){
            return $this->UsuarioCadastro;
        }

        public function SetDataCadastro($dataCadastro){
            $this->DataCadastro = $dataCadastro;
        }

        public function GetDataCadastro(){
            return $this->DataCadastro;
        }

        public function SetDescricao($descricao){
            $this->Descricao = $descricao;
        }

        public function GetDescricao(){
            return $this->Descricao;
        }


        public function StartConection(){
            $pdo = parent::getDB();

            return $pdo;
        }

        public function Insert(){
            try{
                $pdo = parent::getDB();

                $pdo->beginTransaction();

                $sql = "INSERT INTO IMAGEM_PROPRIEDADE
                                    (ID_PROPRIEDADE
                                     ,CAMINHO
                                     ,STATUS
                                     ,USUARIO_CADASTRO
                                     ,DATA_CADASTRO
                                     ,DESCRICAO
                                     )
                                     VALUES
                                     (:ID_PROPRIEDADE
                                      ,:CAMINHO
                                      ,:STATUS
                                      ,:USUARIO_CADASTRO
                                      ,:DATA_CADASTRO
                                      ,:DESCRICAO
                                      )";

                $stmt = $pdo->prepare($sql);

                $stmt->execute(
                    array(
                        ':ID_PROPRIEDADE' => $this->GetIdPropriedade()
                        ,':CAMINHO' => $this->GetCaminho()
                        ,':STATUS' => $this->GetStatus()
                        ,':USUARIO_CADASTRO' => $this->GetUsuarioCadastro()
                        ,':DATA_CADASTRO' => $this->GetDataCadastro()
                        ,':DESCRICAO' => $this->GetDescricao()
                    )
                );

                $pdo->commit(); 
                
                //return $pdo->lastInsertId();
                return $stmt->rowCount();
            }
            catch(PDOException $e) {
                $pdo->rollback(); 

                echo 'Error: ' . $e->getMessage();
            }
        }

        public function UpdateCaminho($id, $Caminho){
            try{
                $pdo = parent::getDB();

                $pdo->beginTransaction();

                $sql = "UPDATE IMAGEM_PROPRIEDADE 
                        SET CAMINHO = :CAMINHO
                        WHERE
                            ID = :ID"
                            ;

                $stmt = $pdo->prepare($sql);

                $stmt->execute(
                    array(
                        ':CAMINHO' => $caminho 
                        ,':ID' => $id
                    )
                );

                $pdo->commit(); 

                return $stmt->rowCount();
            }
            catch(PDOException $e) {
                $pdo->rollback(); 

                echo 'Error: ' . $e->getMessage();
            }
        }

        public function UpdateStatusById($pdo){
            $sql = "UPDATE IMAGEM_PROPRIEDADE
                    SET STATUS = :STATUS
                    WHERE ID = :ID";
            
            $stmt = $pdo->prepare($sql);

            $stmt->execute(
                array(
                    ':STATUS' => $this->GetStatus()
                    ,':ID' => $this->GetId()
                )
            );

            return $stmt->rowCount();
        }

        public function GetImgPropriedadeByIdPropriedadeAndLimit($idPropriedade, $limit){
            $where = "WHERE ID_PROPRIEDADE = $idPropriedade LIMIT $limit";

            return $this->GetImgPropriedade($where);
        }

        public function GetImgPropriedadeByIdPropriedade($idPropriedade){
            $where = "WHERE ID_PROPRIEDADE = $idPropriedade";

            return $this->GetImgPropriedade($where);
        }

        public function GetImgPropriedadeByIdPropriedadeAndStatus($idPropriedade, $status){
            $where = "WHERE ID_PROPRIEDADE = $idPropriedade AND STATUS = $status";

            return $this->GetImgPropriedade($where);
        }

        public function GetImgPropriedade($where){
            try{
                $pdo = parent::getDB();

                $sql = "SELECT
                            ID
                            ,ID_PROPRIEDADE
                            ,CAMINHO
                            ,STATUS
                            ,USUARIO_CADASTRO
                            ,DATA_CADASTRO
                            ,DESCRICAO
                        FROM
                            IMAGEM_PROPRIEDADE
                        $where
                        ";

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