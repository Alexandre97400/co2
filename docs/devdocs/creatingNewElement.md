# Creation d'un nouvel Element

- /co2/assets/js/dynForm/elem.js 
- in ph initjs.php load usefull ressources 
```
var ressource = <?php echo json_encode( CO2::getContextList("ressource") ) ?>;
```
- add AppController if it's an App associated + views/app/page.php 
- add openForm btn views/element/profilesocial.php 
- add left menu link views/pod/menuLeftElement.php 
- ctk/models/Element.php add new Element Mappings
- if used as a directory add to GetDataDetailAction
- add to Document::generateProfilImages $allowedElements

# if needed a territorial search engine 
check directory.md documentation
ex : classified , places
- views/app/search.php 
```
if(@$type=="ressource")     { $page = "ressource"; }
```
- add to directory.Js line 1812
```
else if( $.inArray(params.type, ["citoyens","organizations","projects","poi","place","ressource"] )>=0) 
                  str += directory.elementPanelHtml(params);  
```