<?php
    class TipoImovel extends Conexao{
        private $Name;

        public function SetNome($nome){
            $this->Name = $nome;
        }

        public function GetNome(){
            return $this->Name;
        }

        public function GetTipoImovelByNome($nome){
            $where = 'WHERE NOME = '. $nome;
            return $this->GetTipoImovel($where);
        }

        public function GetTipoImovel($where){
            try{
                $pdo = parent::getDB();

                $sql = 'SELECT * FROM TIPO_IMOVEL '. $where;

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