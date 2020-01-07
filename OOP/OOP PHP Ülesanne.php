<?php declare(strict_types=1);
class Burger{
    protected $nimetus;
    protected $liha;
    protected $sai;
    protected $hind;

    protected $lisand1 = '';
    protected $lisand1Hind = 0.0;
    protected $lisand2 = '';
    protected $lisand2Hind = 0.0;
    protected $lisand3 = '';
    protected $lisand3Hind = 0.0;
    protected $lisand4 = '';
    protected $lisand4Hind = 0.0;

    public function __construct(string $nimetus, string $liha, string $sai, float $hind)
    {
        $this -> nimetus = $nimetus;
        $this -> liha = $liha;
        $this -> sai = $sai;
        $this -> hind = $hind;
    }

    public function valiLisand1(string $lisand, float $hind){
        $this -> lisand1 = $lisand;
        $this -> lisand1Hind = $hind;
        return $this;
    }
    public function valiLisand2(string $lisand, float $hind){
        $this -> lisand2 = $lisand;
        $this -> lisand2Hind = $hind;
        return $this;
    }
    public function valiLisand3(string $lisand, float $hind){
        $this -> lisand3 = $lisand;
        $this -> lisand3Hind = $hind;
        return $this;
    }
    public function valiLisand4(string $lisand, float $hind){
        $this -> lisand4 = $lisand;
        $this -> lisand4Hind = $hind;
        return $this;
    }

    public function koostaBurger(){
        echo "<h2>Burger</h2><p>Nimetus: $this->nimetus <br>Burgeri hind: $this->hind <br>Sai: $this->sai <br>Liha: $this->liha";
        echo $this->lisand1Hind!==0.0?"<br>Lisand: $this->lisand1 Hind: $this->lisand1Hind":'';
        echo $this->lisand2Hind!==0.0?"<br>Lisand: $this->lisand2 Hind: $this->lisand2Hind":'';
        echo $this->lisand3Hind!==0.0?"<br>Lisand: $this->lisand3 Hind: $this->lisand3Hind":'';
        echo $this->lisand4Hind!==0.0?"<br>Lisand: $this->lisand4 Hind: $this->lisand4Hind":'';
        echo '<br>Hind kokku: '.($this->hind+$this->lisand1Hind+$this->lisand2Hind+$this->lisand3Hind+$this->lisand4Hind).'</p>';
    }
}

class TervislikBurger extends Burger{
    private $tervislikLisand1 = '';
    private $tervislikLisand1Hind = 0.0;
    private $tervislikLisand2 = '';
    private $tervislikLisand2Hind = 0.0;

    public function __construct(string $liha, float $hind){
        $this -> nimetus = "Tervislik Burger";
        $this -> liha = $liha;
        $this -> hind = $hind;
        $this -> sai = "Must teraleib";
    }

    public function valiTervislikLisand1(string $lisand, float $hind){
        $this -> tervislikLisand1 = $lisand;
        $this -> tervislikLisand1Hind = $hind;
        return $this;
    }
    public function valiTervislikLisand2(string $lisand, float $hind){
        $this -> tervislikLisand2 = $lisand;
        $this -> tervislikLisand2Hind = $hind;
        return $this;
    }

    public function koostaBurger(){
        echo "<h2>Burger</h2><p>Nimetus: $this->nimetus <br>Burgeri hind: $this->hind <br>Sai: $this->sai <br>Liha: $this->liha";
        echo $this->lisand1Hind!==0.0?"<br>Lisand: $this->lisand1 Hind: $this->lisand1Hind":'';
        echo $this->lisand2Hind!==0.0?"<br>Lisand: $this->lisand2 Hind: $this->lisand2Hind":'';
        echo $this->lisand3Hind!==0.0?"<br>Lisand: $this->lisand3 Hind: $this->lisand3Hind":'';
        echo $this->lisand4Hind!==0.0?"<br>Lisand: $this->lisand4 Hind: $this->lisand4Hind":'';
        echo $this->tervislikLisand1Hind!==0.0?"<br>Lisand: $this->tervislikLisand1 Hind: $this->tervislikLisand1Hind":'';
        echo $this->tervislikLisand2Hind!==0.0?"<br>Lisand: $this->tervislikLisand2 Hind: $this->tervislikLisand2Hind":'';
        echo '<br>Hind kokku: '.($this->hind+$this->lisand1Hind+$this->lisand2Hind+$this->lisand3Hind+$this->lisand4Hind+$this->tervislikLisand1Hind+$this->tervislikLisand2Hind).'</p>';
    }
}

class LuxBurger extends Burger{
    public function __construct()
    {
        $this -> nimetus = "Lux Burger";
        $this -> liha = "Lux Liha";
        $this -> sai = "Lux Sai";
        $this -> hind = 50.0;
        $this -> lisand1 = "Frii-kartul";
        $this -> lisand1Hind = 2.5;
        $this -> lisand2 = "Jook";
        $this -> lisand2Hind = 2.5;
    }

    public function valiLisand1(string $lisand, float $hind){
        echo "Lux Burgeril pole võimalik lisandeid muuta.";
        return $this;
    }
    public function valiLisand2(string $lisand, float $hind){
        echo "Lux Burgeril pole võimalik lisandeid muuta.";
        return $this;
    }
    public function valiLisand3(string $lisand, float $hind){
        echo "Lux Burgeril pole võimalik lisandeid muuta.";
        return $this;
    }
    public function valiLisand4(string $lisand, float $hind){
        echo "Lux Burgeril pole võimalik lisandeid muuta.";
        return $this;
    }
}

$burger1 = new Burger("Big Rits","Täitsa Loom", "Topelt", 3.99);
$burger1 -> valiLisand1("Juust",0.49) -> valiLisand2("Kurk", 0.09) -> valiLisand4("Tomat", 0.15) -> koostaBurger();
$burger2 = new tervislikBurger("Orgaaniline",5.99);
$burger2 -> valiLisand1("Salati leht", 0.59) -> valiTervislikLisand1("Orgaaniline juust", 0.99) -> koostaBurger();
$burger3 = new LuxBurger();
$burger3 ->valiLisand1("Midagi head", 0.01) ->koostaBurger();