<?php 
 $cssAnsScriptFilesModule = array(
    '/js/default/directory.js',
  );
  HtmlHelper::registerCssAndScriptsFiles($cssAnsScriptFilesModule, $this->module->assetsUrl);

  HtmlHelper::registerCssAndScriptsFiles( array('/css/default/directory.css', ) , 
                                          Yii::app()->theme->baseUrl. '/assets');

?>  
  <style>


.favElBtn, .favAllBtn{
  padding: 5px 8px;
  font-weight: 300;
  margin-bottom:5px;
}
#searchBarTextJS{
  margin-bottom: 15px;
}
.btn-open-filliaire{
  font-weight: 700;
  text-transform: uppercase;
}

#col-btn-type-directory .btn-directory-type,
#sub-menu-left .btn-select-type-anc{
  margin-bottom:5px;
  /*font-weight: 700;*/
  text-transform: uppercase;
  background-color: transparent;
}

#col-btn-type-directory .btn-directory-type .btn-all{
  /*background-color: #F2F2F2;*/
}

.btn-select-filliaire:hover{
  background-color: #F2F2F2;
}
@media (max-width: 768px) {
  #col-btn-type-directory{
    text-align: center!important;
  }
}


/* ANNONCES MENU*/
<?php 
  $btnAnc = array("blue"    =>array("color1"=>"#4285f4", 
                      "color2"=>"#1c6df5"),

          "green"   =>array("color1"=>"#34a853", 
                      "color2"=>"#2b8f45"),

          "red"   =>array("color1"=>"#ea4335", 
                      "color2"=>"#cc392d"),

          "yellow"  =>array("color1"=>"#fbbc05", 
                      "color2"=>"#e3a800"),
          );
?>

<?php foreach($btnAnc as $color => $params){ ?>
.btn-anc-color-<?php echo $color; ?>{
    background-color: <?php echo $params["color1"]; ?>;
    border-color: <?php echo $params["color1"]; ?>!important;
    color: #fff!important;
}

.btn-anc-color-<?php echo $color; ?>:hover{
    background-color: <?php echo $params["color2"]; ?>!important;
    border-color: <?php echo $params["color1"]; ?>!important;
}
.btn-anc-color-<?php echo $color; ?>.active{ 
  background-color:#fff!important;
  color:<?php echo $params["color1"]; ?>!important;
}
.btn-anc-color-<?php echo $color; ?>.active:hover{
    background-color: #fff;
    color: <?php echo $params["color1"]; ?>;
}
<?php } ?>

.keycat:hover,
.keycat.active,
.btn-select-category-1:hover,
.btn-select-category-1.active{
  background-color: #2C3E50!important;
    color: #fff!important;
    border-color:transparent!important;
}


#sub-menu-left.subsub .btn{
  width:95%;    
  text-align: left;
  background-color: white;
    border-color: white;
  color:#4285f4;
}
#sub-menu-left.subsub{
  min-width: 180px;
}

.btn-menu-left-add{
  background-color: transparent !important;
    border-color: transparent !important;
}

#photoAddNews{
  text-align: left;
}

.tagstags, .form-actions{
  /*display: none!important;*/
}


@media (max-width: 768px) {
  .btn-select-type-anc.col-xs-5{
    width:48%!important;
  }
}

  @media screen and (min-width: 768px) and (max-width: 1024px) {
    .btn-select-type-anc.col-xs-5{
    font-size:0.8em;
  }
}

  </style>
 

  <div class="container-result-search">

      <?php if(@$_GET['type']!="") { ?>
        <?php $typeSelected = $_GET['type']; ?>
        <?php if($typeSelected == "persons") $typeSelected = "citoyens" ; ?>
        <?php $spec = Element::getElementSpecsByType($typeSelected); ?>
        <h4 class="text-left pull-left subtitle-search" style="margin-left:10px; margin-top:15px; width:100%;">
          <span class="subtitle-search text-<?php echo $spec["text-color"]; ?> homestead">
            <?php 
              $typeName = Yii::t("common",$_GET['type']); 
              if($_GET['type'] == "vote") $typeName = "propositions";
              if($_GET['type'] == "cities") $typeName = "communes";
            ?>
            <i class="fa fa-<?php echo $spec["icon"]; ?>"></i> <?php echo $typeName; ?><br>
            <i class="fa fa-angle-down"></i> 
            
          </span>
        </h4>
     <?php } ?>

     <?php if($typeSelected == "cities"){ ?>   
      <p class="text-center bold"> Recherchez une commune à laquelle vous communecter.<br>
          Une fois communecté, toutes vos recherches seront automatiquement filtrées en fonction de la commune choisie.
      </p>
    <?php }?>


        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden text-center subsub" id="sub-menu-filliaire">
        <!-- <h5>Recherche thématique<br><i class='fa fa-chevron-down'></i></h5> -->
        <?php $filliaireCategories = CO2::getContextList("filliaireCategories"); 
              //var_dump($categories); exit;
              foreach ($filliaireCategories as $key => $cat) { 
          ?>
              <?php if(is_array($cat)) { ?>
              <div class="col-md-2 col-sm-3 col-sm-6 no-padding">
                <button class="btn btn-default col-md-12 col-sm-12 padding-10 bold text-dark elipsis margin-bottom-5 btn-select-filliaire" 
                        data-fkey="<?php echo $key; ?>"
                        style="border-radius:0px; border-color: transparent; text-transform: uppercase;" 
                        data-keycat="<?php echo $cat["name"]; ?>">
                  <i class="fa <?php echo $cat["icon"]; ?> fa-2x hidden-xs"></i><br><?php echo $cat["name"]; ?>
                </button>
              </div>
                <?php //foreach ($cat as $key2 => $cat2) { ?>
                  <!-- <button class="btn btn-default text-dark margin-bottom-5 margin-left-15 hidden keycat keycat-<?php //echo $key; ?>">
                    <i class="fa fa-angle-right"></i> <?php //echo $cat2; ?>
                  </button><br class="hidden"> -->
                <?php //} ?>
              <?php } ?>
            </button>
          <?php } ?>
          <hr class="col-md-12 col-sm-12 col-xs-12 no-padding" id="before-section-result">
        </div>

        <?php if($typeSelected != "events"  && 
                   $typeSelected != "vote"    && 
                   $typeSelected != "cities"  && 
                   $typeSelected != "classified"){ 
          ?>   
          
        <div class="col-sm-2 col-md-2 col-xs-12 text-right margin-top-15 no-padding" id="col-btn-type-directory">

          <button class="btn text-black bg-dark btn-open-filliaire">
              <i class="fa fa-th"></i> 
              <span class="hidden-xs">Thématiques</span>
          </button><hr class="hidden-xs">
          <button class="btn text-black bg-white btn-directory-type btn-all" data-type="all">
              <i class="fa fa-search"></i> 
              <span class="hidden-xs">Tous</span>
          </button><hr class="hidden-xs">
          <button class="btn text-yellow btn-directory-type" data-type="persons">
              <i class="fa fa-user"></i> 
              <span class="hidden-xs">Citoyens</span>
          </button><hr class="hidden-xs">
          <button class="btn text-green  btn-directory-type" data-type="NGO">
              <i class="fa fa-group"></i> 
              <span class="hidden-xs">Associations</span>
          </button><br class="hidden-xs">
          <button class="btn text-azure  btn-directory-type" data-type="LocalBusiness">
              <i class="fa fa-industry"></i> 
              <span class="hidden-xs">Entreprises</span>
          </button><br class="hidden-xs">
          <button class="btn text-turq btn-directory-type" data-type="Group">
              <i class="fa fa-circle-o"></i> 
              <span class="hidden-xs">Groupes</span>
          </button><br class="hidden-xs">
          <button class="btn text-purple btn-directory-type" data-type="projects">
              <i class="fa fa-lightbulb-o"></i> 
              <span class="hidden-xs">Projets</span>
          </button>
          <hr class="hidden-sm hidden-md hidden-lg">
        </div>
        
        <?php } else if( $typeSelected == "vote" ){?>

          <div class="col-sm-2 col-md-2 col-xs-12 text-right margin-top-15 no-padding" id="col-btn-type-directory">
            <button class="btn text-black bg-azure btn-directory-type" data-type="vote">
              <i class="fa fa-gavel"></i> 
              <span class="hidden-xs">Propositions</span>
            </button>
            <button class="btn text-black bg-azure btn-directory-type" data-type="actions">
              <i class="fa fa-cogs"></i> 
              <span class="hidden-xs">Actions</span>
            </button>
          </div>

        <?php } else if( $typeSelected == "events" ){?>

          <div class="col-sm-2 col-md-2 col-xs-12 text-right margin-top-15 no-padding" id="col-btn-type-directory">
            
          </div>

          <?php }else if($typeSelected == "classified"){ ?>

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 padding-10 text-right" id="sub-menu-left">
              <?php 
                  $freedomSections = CO2::getContextList("freedomSections");
                  $currentSection = 1;
                  foreach ($freedomSections as $key => $section) { ?>
                    <?php if($section["section"] > $currentSection){ $currentSection++; ?>
                    <hr>
                    <?php } ?>
                    <button class="btn margin-bottom-5 margin-left-5 btn-select-type-anc btn-directory-type letter-<?php echo @$section["color"]; ?>" 
                            data-type-anc="<?php echo @$section["key"]; ?>">
                      <i class="fa fa-<?php echo @$section["icon"]; ?>"></i> 
                      <span class="hidden-xs hidden-sm"><?php echo @$section["label"]; ?></span>
                    </button>
                    <br>  
              <?php } ?>   
            </div>

            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-8 margin-top-15 text-left subsub" id="sub-menu-left">
              <!-- <h4 class="text-dark padding-bottom-5"><i class="fa fa-angle-down"></i> Catégories</h4>
              <hr> -->
              <h4 class="margin-top-5 padding-bottom-10 letter-azure label-category" id="title-sub-menu-category">
                <i class="fa fa-money"></i> A vendre
              </h4>
              <hr>
              <?php $categories = CO2::getContextList("classifiedCategories"); 
                  foreach ($categories as $key => $cat) {
              ?>
                  <?php if(is_array($cat)) { ?>
                    <button class="btn btn-default text-dark margin-bottom-5 btn-select-category-1" style="margin-left:-5px;" data-keycat="<?php echo $key; ?>">
                      <i class="fa fa-<?php echo @$cat["icon"]; ?> hidden-xs"></i> <?php echo $key; ?>
                    </button><br>
                    <?php foreach ($cat["subcat"] as $key2 => $cat2) { ?>
                      <button class="btn btn-default text-dark margin-bottom-5 margin-left-15 hidden keycat keycat-<?php echo $key; ?>">
                        <i class="fa fa-angle-right"></i> <?php echo $cat2; ?>
                      </button><br class="hidden">
                    <?php } ?>
                  <?php } ?>
                </button>
              <?php } ?>
            </div>

          
          <?php } ?>

        <?php if($typeSelected == "classified"){ ?>
          <div class="col-md-6 col-sm-6 col-xs-10 padding-10" id="dropdown_search"></div>
        <?php }else{ ?>
          <div class="col-md-8 col-sm-8 col-xs-10 padding-10" id="dropdown_search"></div>
        <?php } ?>

      <div id="listTags" class="col-sm-2 col-md-2 hidden-xs hidden-sm text-left"></div>
      
  </div>

<?php //$this->renderPartial(@$path."first_step_directory"); ?> 
<?php $city = (@$_GET['lockCityKey'] ? City::getByUnikey($_GET['lockCityKey']) : null);

      if($city == null && @$_GET['insee'])
        $city = City::getCityByInsee($_GET['insee']);
      
      $cityName = (($city!=null) ? $city["name"]. (@$city["cp"]? ", ".$city["cp"] : "") : "");
?>

<script type="text/javascript">

var headerParams = {
  "persons"       : { color: "yellow",  icon: "user",         name: "citoyens" },
  "organizations" : { color: "green",   icon: "group",        name: "organisations" },
  "NGO"           : { color: "green",   icon: "group",        name: "associations" },
  "LocalBusiness" : { color: "azure",   icon: "industry",     name: "entreprises" },
  "Group"         : { color: "black",   icon: "circle-o",     name: "Groupes" },
  "projects"      : { color: "purple",  icon: "lightbulb-o",  name: "projets" },
  "events"        : { color: "orange",  icon: "calendar",     name: "événements" },
  "vote"          : { color: "azure",   icon: "gavel",        name: "Propositions, Questions, Votes" },
  "actions"       : { color: "lightblue2",    icon: "cogs",   name: "actions" },
  "cities"        : { color: "red",     icon: "university",   name: "communes" },
  "poi"       	  :	{ color: "black",   icon: "map-marker",   name: "points d'intérêts" },
  "classified"    : { color: "lightblue2",   icon: "bullhorn",   name: "Annonces" }
}

if( typeof themeObj != "undefined" && typeof themeObj.headerParams != "undefined" )
{
  $.each(themeObj.headerParams,function(k,v) 
  { 
    headerParams[k] = v;
  });
}

function setHeaderDirectory(type){
 
  var params = new Array();
  if(typeof headerParams[type] == "undefined") return;
  params = headerParams[type];
  $(".subtitle-search").html( '<span class="text-'+params.color+'">'+
                                '<i class="fa fa-angle-down"></i> <i class="fa fa-'+params.icon+'"></i> '+
                                params.name+
                              //  " <i class='fa fa-angle-right'></i> "+
                              // "<a href='javascript:directory.showFilters()' class='btn btn-default btn-sm'> "+
                              //  "<i class='fa fa-search'></i> Recherche avancée</a>"+
                              '</span>' );

  $(".lbl-info-search .lbl-info").addClass("hidden");
  $(".lbl-info-search .lbl-info.lbl-info-"+type).removeClass("hidden");

  $("#dropdown_search").html("");

  if(type == "cities") { 
    $("#searchBarText").attr("placeholder", "rechercher une ville, un code postal..."); 
    $("#scopeListContainer, #btn-slidup-scopetags").hide(200);
  }else{ 
    $("#searchBarText").attr("placeholder", "rechercher par #tag ou mots clés..."); 
    $("#scopeListContainer, #btn-slidup-scopetags").show(200);
  }

  $(".menu-left-container #menu-extend .menu-button-left").removeClass("selected");
  $(".menu-left-container #menu-extend #menu-btn-"+type).addClass("selected");

  $(".my-main-container").scrollTop(0);

  if(typeof globalTheme != "undefined" && globalTheme=="CO2"){
    $('html, body').stop().animate({
          scrollTop: 0
      }, 800, '');
  }

  Sig.clearMap();

}

var searchType = [ "persons" ];
var allSearchType = [ "persons", "organizations", "projects", "events", "vote", "cities" ];

var personCOLLECTION = "<?php echo Person::COLLECTION ?>";
var userId = '<?php echo isset( Yii::app()->session["userId"] ) ? Yii::app() -> session["userId"] : null; ?>';
var lockCityKey = <?php echo (@$_GET['lockCityKey']) ? "'".$_GET['lockCityKey']."'" : "null" ?>;
var cityNameLocked = "<?php echo $cityName; ?>";
var typeSelected = <?php echo (@$_GET['type']) ? "'".$_GET['type']."'" : "null" ?>;

var filliaireCategories = <?php echo json_encode($filliaireCategories); ?>;

jQuery(document).ready(function() {

	
	currentTypeSearchSend = "search";


  $("#btn-slidup-scopetags").click(function(){
    slidupScopetagsMin();
  });


  searchType = (typeSelected == null) ? [ "persons" ] : [ typeSelected ];
  allSearchType = [ "persons", "organizations", "projects", "events", "events", "vote", "cities","poi" ];
	topMenuActivated = true;
	hideScrollTop = true; 
  loadingData = false;

	checkScroll();
  var timeoutSearch = setTimeout(function(){ }, 100);
  
  setTimeout(function(){ $("#input-communexion").hide(300); }, 300);

	//setTitle("<span id='main-title-menu'>Moteur de recherche</span>","search","Moteur de recherche");
	
  $('.tooltips').tooltip();

  setHeaderDirectory(typeSelected);  

  //showTagsScopesMin("#scopeListContainer");

  // if(lockCityKey != null){
  //   lockScopeOnCityKey(lockCityKey, cityNameLocked);
  // }else{
  //   rebuildSearchScopeInput();
  // }


  $(".btn-open-filliaire").click(function(){
      if($("#sub-menu-filliaire").hasClass("hidden"))
        $("#sub-menu-filliaire").removeClass("hidden");
      else
        $("#sub-menu-filliaire").addClass("hidden");
  });

  $(".btn-select-filliaire").click(function(){
      var fKey = $(this).data("fkey");
      myMultiTags = {};
      $.each(filliaireCategories[fKey]["tags"], function(key, tag){
        addTagToMultitag(tag);
      });
      console.log("myMultiTags", myMultiTags);
      
      startSearch(0, indexStepInit, searchCallback);
      KScrollTo("#content-social");
      //KScrollTo("#before-section-result");
  });
  
  /*  $(".searchIcon").removeClass("fa-search").addClass("fa-file-text-o");
  $(".searchIcon").attr("title","Mode Recherche ciblé (ne concerne que cette page)");*/
  $('.tooltips').tooltip();
  searchPage = true;

  <?php if(!@$_GET["nopreload"]){ ?>
    //initBtnScopeList();
    indexStepInit = 100;
    startSearch(0, indexStepInit, searchCallback);
  <?php } ?>
});




</script>







