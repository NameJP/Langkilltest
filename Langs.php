
<?php
 session_start();
class Langkill{
    private $player_num;
    private $seer_num;
    private $num=array();
    private $Langboy_num=array();
    private $Langboy_nums=4;
    private $people_num=array();
    private $home_num;
    private $player_type;
    public function Langkill($num,$home_num,$player_type){
        $this->player_num=$num;
        $this->home_num=$home_num;
        if($player_type==1){
            $this->setSeer();
            $this->setLang();
            $this->setCun();
        }
             return $_SESSION['home_num'.$this->home_num];
    }   
    public function setSeer(){
        $this->seer_num=rand(1,$this->player_num);
        $_SESSION['home_num'.$this->home_num]['seer']=$this->seer_num;
        $this->num[]=$this->seer_num;
    }
    public function getSeer(){
        return $this->seer_num;
    }
    public function setLang(){
        for($i=0;$i<$this->Langboy_nums;$i++){
            $a=rand(1,$this->player_num);
            while(true){
                if(in_array($a,$this->num)){
                      $a=rand(1,$this->player_num);
                }else{
                    break;
                }
              }
              $this->Langboy_num[]=$a;
              $this->num[]=$a;
        }    
        $_SESSION['home_num'.$this->home_num]['Langboy_num']=$this->Langboy_num; 
    }
    public function setCun(){
        for($i=1;$i<=$this->player_num;$i++){
            if(!in_array($i,$this->num)){
                 $this->people_num[]=$i;
                 $this->num[]=$i;
            }
        }
        $_SESSION['home_num'.$this->home_num]['people_num']=$this->people_num;
    }
    public function getCun(){
        return $this->people_num;
    }
    public function getLang(){
        return $this->Langboy_num;
    }
    public function getPlayernum(){
        return $this->player_num;
    }
}
$home_num=$_GET['home_num'];
$player_type=$_GET['player_type'];

new Langkill(9,$home_num,$player_type);
$t=$_SESSION['home_num'.$home_num];
echo json_encode($t);
?>



