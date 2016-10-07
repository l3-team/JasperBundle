<?php
namespace l3\JasperBundle\Report;

use Jaspersoft\Client\Client as Client;

/**
 * Description of Report
 *
 * @author bdelmotte
 */
class Report {
    
    private $host; 
    private $user;
    private $password;
    protected $client;
    
    /**
     * 
     * @param String $host
     */
    function setHost($host) {
        $this->host = $host;
    }

    /**
     * 
     * @param String $user
     */
    function setUser($user) {
        $this->user = $user;
    }

    /**
     * 
     * @param String $password
     */
    function setPassword($password) {
        $this->password = $password;
    }

        /**
     *  connexion au serveur Jasper
     */
    public function connector() {
        if(!$this->client instanceof Client) {
            
            if(is_null($this->host) || is_null($this->password) || is_null($this->user)) {
                throw new Exception("Impossibilité d'instancier avec des paramètres nuls");
            }
            
            $this->client = new Client($this->host, $this->user, $this->password);
        }
    }
    
    /**
     * initialiser avec les bons paramètres
     * @param mixed $newJasperConfig array des paramètres
     */
    public function setConfig($newJasperConfig) {
        $this->host = $newJasperConfig['host'];
        $this->user = $newJasperConfig['user'];
        $this->password = $newJasperConfig['password'];
    }
    
    /**
     * Générer un report
     * @param string $report le chemin du report
     * @param type $format le format html, pdf, csv...
     * @param type $parameters la liste des paramètres éventuels
     * @return Response
     */
    public function getReport($report,$format,$parameters=null) {
        $this->connector();
        $r = $this->client->reportService()->runReport($report,$format,null,null,$parameters);
        return $r;
    }      
}
