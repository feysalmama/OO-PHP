<?php

 class Parenthese{
    public $charactorArray = ['(',')','{','}','[',']'];
    public $stack = [];

    public function isValidClose($open){
      
        if($open=="(" || $open=="{" ||$open=="["){
            array_push($this->stack,$open);
          
        }else{
            if(count($this->stack)==0){
                return false;
            }
           
            if($open==")"){
                $removed = array_pop($this->stack);
                if($removed== "{" || $removed == "["){
                    return false;
                }
                
            }
            if($open=="]"){
                $removed = array_pop($this->stack);
                if($removed== "{" || $removed == "("){
                    return false;
                }
                
            }
            if($open=="}"){
                $removed = array_pop($this->stack);
                if($removed== "(" || $removed == "["){
                    return false;
                }
                
            }
        }

        return true;
        
    }

     public function isValid($s)
     {
         $string_array= str_split($s);
        if(strlen($s) >=1 && strlen($s) <=104 && strlen($s)%2==0){  
            for($i=0; $i < count($string_array);$i++){
                if(!in_array($string_array[$i],$this->charactorArray)){
                    return "wrong charctor, not valid";
                }
            }
            for($i=0; $i < count($string_array);$i++){
                if(!$this->isValidClose($string_array[$i])){
                   return "wrong openning and closing";
                }
            }

            return " is valid";
         }else{
            return " the string must be >=1 and <= 104, and also must be closed,not valid";
        }   
     }
 }
 $solution  = new Parenthese();
 echo $solution->isValid("[(){({})}]{}")

?>