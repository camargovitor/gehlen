<?php

    class Estado extends Conexao{
        private $estado;

        public function setState($estado){
            $this->estado = $estado;
        }

        public function getState(){
            return $this->estado;
        }
        
        public function getStateList(){
            $pdo = parent::getDB();
            
            if(empty($this->estado)){
                $sql = $pdo->prepare("SELECT ID, NOME FROM ESTADO ORDER BY NOME ASC");
                $sql->execute();
                return $sql;
            }
            else{
                $sql = $pdo->prepare("SELECT id, nome, uf FROM estado WHERE id = ?");
                $sql->bindValue(1, $this->getState());
                $sql->execute();
                //if ($sql->rowCount() == 1):
                $dado = $sql->fetch(PDO::FETCH_OBJ);
                return $dado;        
            }
        }
            
    }

?>