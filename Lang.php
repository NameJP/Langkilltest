
<?php
class Langkill{
    private $player_num;
    private $seer_num;
    private $num=array();
    private $Langboy_num=array();
    private $Langboy_nums=4;
    private $people_num=array();
    public function Langkill($num){
        $this->player_num=$num;
        $this->setSeer();
        $this->setLang();
        $this->setCun();
    }   
    public function setSeer(){
        $this->seer_num=rand(1,$this->player_num);
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
    }
    public function setCun(){
        for($i=1;$i<=$this->player_num;$i++){
            if(!in_array($i,$this->num)){
                 $this->people_num[]=$i;
                 $this->num[]=$i;
            }
        }
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
$a=new Langkill(9);

$data=[];
$data['player_num']=$a->getPlayernum();
$data['seer']=$a->getSeer();
$data['Langboy_num']=$a->getLang();
$data['people_num']=$a->getCun();

echo json_encode($data);

// $b=$a->getLang();
//  $a->getSeer();
//   $c=$a->getCun();
//   print_r($c);
//   print_r($b);
?>



