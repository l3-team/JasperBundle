Bundle Jaspersoft for Symfony2.

Allow generate a Jasper report

Installation
---
________

### composer.json
```
   "require": {
       ...
       "l3/jasper-bundle": "master"
   }
   
   ...
```

Add parameters in config.yml

```
    l3_jasper:
        host: http://rapport-jasper.univ-lille3.fr:8080
        user: theUser
        password: thePaswword
```


### app/AppKernel.php
```
$bundles = array(
    ...
    new l3\JasperBundle\l3JasperBundle(),
);
```        
### use with service.
```
...
use Symfony\Component\HttpFoundation\Response;

...


$reportEngine = $this->get('l3_jasper.report');
$report = $reportEngine->getReport('/reports/interactive/UIDparameter','html', array("UID" => array("7214","8548")));
return new Response($report);
```
