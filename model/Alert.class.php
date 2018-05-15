<?php
    class Alert {

        public function Danger($title,$description){
            return $this->AlertHtml($title, $description, "alert-danger");
        }

        public function Success($title, $description){
            return $this->AlertHtml($title, $description, 'alert-success');
        }

        public function AlertHtml($title, $description, $alertName){
            $alert = '<div class="alert alert-dismissable '. $alertName .'">
						 
								<button class="close" aria-hidden="true" type="button" data-dismiss="alert">
								×
								</button>
								<h4> '
									. $title . 
								' </h4> '. $description .
                            '</div>';
                            
            return $alert;
        }

        public function AlertMessage($message){
            
            echo ('<script>alert("'.$message.'");</script>');
                  
        }
    }
?>
