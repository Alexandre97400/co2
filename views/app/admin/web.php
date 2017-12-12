<?php

 $cssAnsScriptFiles = array(
    '/assets/js/web.js',
    '/assets/css/circle.css',
    );
    HtmlHelper::registerCssAndScriptsFiles($cssAnsScriptFiles, Yii::app()->theme->baseUrl);       
?>

<h1 class="letter-"><i class="fa fa-grav letter-red"></i> Bonjour <span class="letter-red">Super Admin</span></h1>
<h5 class="letter-">
	<button class="btn btn-sm btn-superadmin" data-action="web" data-idres="#central-container"><i class="fa fa-refresh"></i> </button>
	Section : <i class="fa fa-search letter-red"></i> 
	<span class="font-blackoutM letter-red">web</span>
</h5>

<br>
<hr>
<br>


<style>
	.c100 > span{
		cursor:pointer;
	}

	#searchResults .moreResult,
	#searchResults .footerWebSearch,
	#searchResults #btn-new-search{
		display: none!important;
	}

</style>

<div class="">

	<h3 class="letter-red"><i class="fa fa-bar-chart"></i> Stats</h3>
	<h4>Total : <?php echo $urlsAllNb; ?></h4>

	<div class="col-md-4 text-center">
		<div class="c100 p<?php echo intval($urlsLockedNb*100/$urlsAllNb); ?> red small center">
		  <span data-status="locked"><?php echo intval($urlsLockedNb*100/$urlsAllNb); ?>%</span>
		  <div class="slice"> 
		  	<div class="bar"></div> <div class="fill"></div>
		  </div>
		</div>
		<h5>locked<br><small><?php echo $urlsLockedNb; ?></small></h5>
	</div>

	<div class="col-md-4 text-center">
		<div class="c100 p<?php echo intval($urlsUnreachableNb*100/$urlsAllNb); ?> red small center">
		  <span data-status="unreachable"><?php echo intval($urlsUnreachableNb*100/$urlsAllNb); ?>%</span>
		  <div class="slice"> 
		  	<div class="bar"></div> <div class="fill"></div>
		  </div>
		</div>
		<h5>unreachable<br><small><?php echo $urlsUnreachableNb; ?></small></h5>
	</div>

	<div class="col-md-4 text-center">
		<div class="c100 p<?php echo intval($urlsUncompletNb*100/$urlsAllNb); ?> orange small center">
		  <span data-status="uncomplet"><?php echo intval($urlsUncompletNb*100/$urlsAllNb); ?>%</span>
		  <div class="slice"> 
		  	<div class="bar"></div> <div class="fill"></div>
		  </div>
		</div>
		<h5>uncomplet<br><small><?php echo $urlsUncompletNb; ?></small></h5>
	</div>

	<div class="col-md-4 text-center">
		<div class="c100 p<?php echo intval($urlsValidatedNb*100/$urlsAllNb); ?> blue small center">
		  <span data-status="validated"><?php echo intval($urlsValidatedNb*100/$urlsAllNb); ?>%</span>
		  <div class="slice"> 
		  	<div class="bar"></div> <div class="fill"></div>
		  </div>
		</div>
		<h5>validated<br><small><?php echo $urlsValidatedNb; ?></small></h5>
	</div>


	<div class="col-md-4 text-center">
		<div class="c100 p<?php echo intval($urlsEditedNb*100/$urlsAllNb); ?> green small center">
		  <span data-status="edited"><?php echo intval($urlsEditedNb*100/$urlsAllNb); ?>%</span>
		  <div class="slice"> 
		  	<div class="bar"></div> <div class="fill"></div>
		  </div>
		</div>
		<h5>edited<br><small><?php echo $urlsEditedNb; ?></small></h5>
	</div>

	<div class="col-md-4 text-center">
		<div class="c100 p<?php echo intval($urlsUncategorizedNb*100/$urlsAllNb); ?> yellow small center">
		  <span data-status="uncategorized"><?php echo intval($urlsUncategorizedNb*100/$urlsAllNb); ?>%</span>
		  <div class="slice"> 
		  	<div class="bar"></div> <div class="fill"></div>
		  </div>
		</div>
		<h5>uncategorized<br><small><?php echo $urlsUncategorizedNb; ?></small></h5>
	</div>


	

	<div class="col-md-12">

	<hr>

		<!-- <a href="http://caledoweb.com/?page_id=14">http://caledoweb.com/?page_id=14</a><br>
		<button class="btn btn-sm btn-default btn-superadmin" data-action="scanlinks" data-idres="#res-scan">
			<i class="fa fa-terminal"></i> Scanner la page
		</button> 
		<i class="fa fa-check fa-2x letter-green"></i> 
		<hr>
		<div id="res-scan"></div>

		<hr> -->

		<div class="">
			<h3><i class="fa fa-terminal fa-2x"></i> Auto-scan</h3>
			<h4 class="letter-green">
				<?php echo sizeof($urlsUncomplet); ?> url 
				<span class="letter-red">uncomplet</span> in database
			</h4>
			<button class="btn btn-sm btn-default btn-start-scan" data-action="scanlinks" data-idres="#res-scan">
				<i class="fa fa-terminal"></i> Run scan
			</button> 
			<button class="btn btn-sm btn-default btn-stop-scan" data-action="scanlinks" data-idres="#res-scan">
				<i class="fa fa-square letter-red"></i> Stop scan
			</button>
		</div>

		<br>
		<hr>

		<div class="row" style="min-height:800px;" id="refStart">
			<div class="col-md-12 pull-left" id="searchResults"><hr></div>
			<div class="col-md-6 pull-right text-right" id="nb-auto-scan"></div>
			<div class="col-md-6 pull-right" id="res-auto-scan"></div>
		</div>
	</div>

</div>

<?php 
	//$layoutPath = 'webroot.themes.'.Yii::app()->theme->name.'.views.layouts.';
	$this->renderPartial('admin/modalEditUrl',  array( ) ); 
?>

<script type="text/javascript">

	var urlsLocked = <?php echo json_encode($urlsLocked); ?>;
	var urlsUncomplet = <?php echo json_encode($urlsUncomplet); ?>;
	var isWebAdmin = true;
	console.log("urlsUncomplet", urlsUncomplet);
	//alert("stop");
	//var urlsValidated = <?php //echo json_encode($urlsValidated); ?>;

	var autoScanProcessing = false;

	var currentCategory = "";

	jQuery(document).ready(function() {
		$(".btn-superadmin").off().click(function(){
			var action = $(this).data("action");
			var idres = $(this).data("idres");
			$(idres).html("<i class='fa fa-refresh fa-spin'></i>");
			getAjax(idres ,baseUrl+'/'+moduleId+"/app/superadmin/action/"+action,function(data){ //alert("yeh");
				$(idres).html(data);
			},"html");
		});

		$(".btn-start-scan").click(function(){
			autoScanProcessing = true;
			autoScan();
		});
		$(".btn-stop-scan").click(function(){
			autoScanProcessing = false;
		});

		$(".c100 > span").click(function(){
			var status = $(this).data("status");
			$("#res-auto-scan").html("");
			startWebSearch("", status);
		});

		$(window).unbind("scroll");

	});


	var triedUrl = "";
	var toTotal = <?php echo sizeof($urlsUncomplet); ?>;
	var total = 0;
	var totalEchec = 0;
	function autoScan(){ console.log("start autoScan", autoScanProcessing);

		$("#searchResults").html("<h4 class='letter-blue'>"+
									 "<i class='fa fa-spin fa-circle-o-notch'></i> SCAN'S RUNNING"+
								 "</h4><hr>");

		if(autoScanProcessing == false) {
			$("#status-ref").html("<span class='letter-red'><i class='fa fa-square'></i> stop</span>");
			return false;
		}

		var countScanDone = 0;
		$.each(urlsUncomplet, function(key, urlObj){ 
			
			var url = urlObj.url;
			
			//if(typeof url.hostname != "undefined")
			var path = (new URL(url)).pathname;
			//console.log("path :", path);

			if(path != "/")
			url = url.replace(path, "");
			
				
			pos = url.lastIndexOf("/");
			//console.log("pos :", pos, "length", url.length-1);
			if(pos == url.length-1){
				url = url.substr(0 , pos);				
			}

			//if(typeof host != "undefined")
			//	url = host;
			console.log("url :", url);
			//return;

			$("#form-url").val(url);
			$("#status-ref").html("<span class='letter-blue'><i class='fa fa-spin fa-refresh'></i> recherche en cours</span>");
			$("#refResult").addClass("hidden");
			$("#send-ref").addClass("hidden");

			urlValidated = "";
			//return;
		    $.ajax({ 
		    	url: "//cors-anywhere.herokuapp.com/"+url, // 'http://google.fr', 
		    	crossOrigin: true,
		    	timeout:10000,
		        success: function(data) {
						
					    var jq = $.parseHTML(data);
					    
					    var tempDom = $('<output>').append($.parseHTML(data));
					    var title = $('title', tempDom).html();
					    var stitle = "";

					    if(stitle=="" || stitle=="undefined")
					   		stitle = $('blockquote', tempDom).html();

					   	//console.log("STITLE", stitle);

						if(stitle=="" || stitle=="undefined")
					   		stitle = $('h2', tempDom).html();

						if(stitle=="" || stitle=="undefined")
					   		stitle = $('h3', tempDom).html();

						if(stitle=="" || stitle=="undefined")
					   		stitle = $('blockquote', tempDom).html();

						if(title=="" || title=="undefined")
					   		title = stitle;

					   	var favicon = $("link[rel*='icon']", tempDom).attr("href");
		                var hostname = (new URL(url)).origin;
		                var faviconSrc = "";
		                if(typeof favicon != "undefined"){
			                var faviconSrc = hostname+favicon;
			                if(favicon.indexOf("http")>=0) faviconSrc = favicon;
			            }
						var description = $(tempDom).find('meta[name=description]').attr("content");

						var keywords = $(tempDom).find('meta[name=keywords]').attr("content");
						//console.log("keywords", keywords);

						var arrayKeywords = new Array();
						if(typeof keywords != "undefined")
							arrayKeywords = keywords.split(",");

						//console.log("arrayKeywords", arrayKeywords);

						if(typeof arrayKeywords[0] != "undefined") $("#form-keywords1").val(arrayKeywords[0]); else $("#form-keywords1").val("");
						if(typeof arrayKeywords[1] != "undefined") $("#form-keywords2").val(arrayKeywords[1]); else $("#form-keywords2").val("");
						if(typeof arrayKeywords[2] != "undefined") $("#form-keywords3").val(arrayKeywords[2]); else $("#form-keywords3").val("");
						if(typeof arrayKeywords[3] != "undefined") $("#form-keywords4").val(arrayKeywords[3]); else $("#form-keywords4").val("");


						if(description=="" || description=="undefined")
					   		if(stitle=="" || stitle=="undefined")
					   			description = stitle;

						
						$("#form-title").val(title);
						$("#form-favicon").val(faviconSrc);
						$("#form-description").val(description);
						

						//color
						if($("#form-title").val() != "") $("#lbl-title").removeClass("letter-red").addClass("letter-green");
						else 							$("#lbl-title").removeClass("letter-green").addClass("letter-red");
					   	
					   	//color	
						if($("#form-description").val() != "") $("#lbl-description").removeClass("letter-red").addClass("letter-green");
						else 								   $("#lbl-description").removeClass("letter-green").addClass("letter-red");
					   		
					   	//color	
						if($("#form-keywords1").val() != "")   $("#lbl-keywords").removeClass("letter-red").addClass("letter-green");
						else 								   $("#lbl-keywords").removeClass("letter-green").addClass("letter-red");
					   		
					   	$("#form-title").off().keyup(function(){
					   		if($(this).val()!="")$("#lbl-title").removeClass("letter-red").addClass("letter-green");
							else 				 $("#lbl-title").removeClass("letter-green").addClass("letter-red");
							checkAllInfo();
					   	});
					   	$("#form-description").off().keyup(function(){
					   		if($(this).val()!="")$("#lbl-description").removeClass("letter-red").addClass("letter-green");
							else 				 $("#lbl-description").removeClass("letter-green").addClass("letter-red");
							checkAllInfo();
					   	});
					   	$("#form-keywords1").off().keyup(function(){
					   		if($(this).val()!="")$("#lbl-keywords").removeClass("letter-red").addClass("letter-green");
							else 				 $("#lbl-keywords").removeClass("letter-green").addClass("letter-red");
							checkAllInfo();
					   	});

					   	$("#status-ref").html("<span class='letter-green'><img src='"+faviconSrc+"' height=30> <i class='fa fa-check'></i> Nous avons trouvé votre page</span>");
		    			$("#refResult").removeClass("hidden");
					   
					   	$("#lbl-url").removeClass("letter-red").addClass("letter-green");
					   	urlValidated = url;

					    $('<output>').remove();
					    tempDom = "";

					    checkAllInfo();	

					    console.log("sendReferencement");
					    sendReferencementAuto(key);

					    total++;
					    $("#nb-auto-scan").html("<span class='letter-green'>"+ total + " / " + toTotal+"</span><br>"+
					    						"<span class='letter-red'>"+ totalEchec + " / " + toTotal+"</span>");
					    $("#res-auto-scan").prepend("<div class='col-md-12 text-left margin-bottom-15'>"+
					    							"<span class='siteurl_title letter-blue'><img src='"+faviconSrc+"' height=30> "+title+"</span><br>"+
					    							"<span class='siteurl_desc letter-green'>"+urlValidated+"</span><br>"+
					    							"<span class='siteurl_hostname letter-grey'>"+description+"</span><br>"+
					    							"</div>");

					    console.log("setTimeout autoScan");
					    delete urlsUncomplet[key];
					    setTimeout(function(){ autoScan(); }, 1000);		   
					},
				error:function(xhr, status, error){
					$("#lbl-url").removeClass("letter-green").addClass("letter-red");
					$("#status-ref").html("<span class='letter-red'><i class='fa fa-ban'></i> URL INNACCESSIBLE</span>");
					//if(triedUrl != url){ triedUrl = url; }
					//else{ 
						changeStatus(key, "unreachable");
						delete urlsLocked[key]; 
						totalEchec++;
					    $("#nb-auto-scan").html("<span class='letter-green'>"+ total + " / " + toTotal+"</span><br>"+
					    						"<span class='letter-red'>"+ totalEchec + " / " + toTotal+"</span>");
					    $("#res-auto-scan").prepend("<div class='col-md-12 text-right margin-bottom-15'>"+
					    							"<span class='siteurl_title letter-red'>404 "+url+"</span>"+
					    							"</div>");
						//alert("stop1");
					//}
					// autoScan();
					setTimeout(function(){ autoScan(); }, 1000);
				},
				statusCode:{
					// 404: function(){
					// $("#lbl-url").removeClass("letter-green").addClass("letter-red");
					// $("#status-ref").html("<span class='letter-red'><i class='fa fa-ban'></i> 404 : URL INTROUVABLE OU INACCESSIBLE</span>");
					// //if(triedUrl != url){ triedUrl = url; }
					// //else{ 
					// 	changeStatus(key, "unreachable");
					// 	delete urlsLocked[key]; 
					// 	totalEchec++;
					//     $("#nb-auto-scan").html("<span class='letter-green'>"+ total + " / " + toTotal+"</span><br>"+
					//     						"<span class='letter-red'>"+ totalEchec + " / " + toTotal+"</span>");
					//     $("#res-auto-scan").prepend("<div class='col-md-12 text-right margin-bottom-15'>"+
					//     							"<span class='siteurl_title letter-red'>404"+url+"</span>"+
					//     							"</div>");
					// 	//alert("stop2");
					// //}
					// // autoScan();
					// setTimeout(function(){ autoScan(); }, 1000);
					// }
				}
			});

			countScanDone++;
			return false;
		});

		if(countScanDone == 0){
			$("#searchResults").html("<div class='col-md-12 text-left margin-bottom-15'>"+
			    							"<h4 class='siteurl_title letter-green'>"+
			    								"<i class='fa fa-check'></i> SCAN DONE" +
			    							"</h4>"+
		    							"</div>");
		}
		
	}


function checkAllInfo(){
	if(	urlValidated != "" &&
		$("#form-keywords1").val() != "" && 
		$("#form-description").val() != "" && 
		$("#form-title").val() != "") 
   			$("#btn-validate-information").removeClass("hidden");
   	else 	$("#btn-validate-information").addClass("hidden");
}


function sendReferencementAuto(id){
	console.log("start referencement");

	var hostname = (new URL(urlValidated)).hostname;

	var title = $("#form-title").val();
	var favicon = $("#form-favicon").val();
	var description = $("#form-description").val();

	var keywords1 = $("#form-keywords1").val();
	var keywords2 = $("#form-keywords2").val();
	var keywords3 = $("#form-keywords3").val();
	var keywords4 = $("#form-keywords4").val();

	var keywords = new Array();

	if(notEmpty(keywords1)) keywords.push(keywords1);
	if(notEmpty(keywords2)) keywords.push(keywords2);
	if(notEmpty(keywords3)) keywords.push(keywords3);
	if(notEmpty(keywords4)) keywords.push(keywords4);
	
	//authorId *facultatif
	//categoriesSelected

	//if(urlValidated != "" && title != "" && description != "" && keywords.length > 0&& categoriesSelected.length > 0){

		var urlObj = {
                //collection: "url",
                //key: "url",
        		//url: urlValidated, 
        		//hostname: hostname, 
        		title: title, 
        		description: description,
        		tags: keywords,
        		//categories : categoriesSelected,
                status: "locked",
                favicon: favicon
        };

 		console.log("UPDATE THIS URL DATA ?", urlObj, id);
 		//alert("stop");
        //if(favicon!="")
		$.ajax({
	        type: "POST",
	        url: baseUrl+"/"+moduleId+"/app/superadmin/action/updateurlmetadata",
	        data: { "id" : id,
	        		"values" : urlObj },
	       	dataType: "json",
	    	success: function(data){
	    		if(data.valid == true) toastr.success("Votre demande a bien été enregistrée");
	    		//else toastr.error("Une erreur est survenue pendant le référencement");
	    		console.log("save referencement success");
	    	},
	    	error: function(data){
	    		toastr.error("Une erreur est survenue pendant l'envoi de votre demande", data);
	    		console.log("save referencement error");
	    	}
	    });
	//}else{
	//	toastr.error("Merci de remplir toutes les options");
	//}
}

//states = locked - unreachable - uncomplet - locked

function changeStatus(urlId, status){
	var urlObj = {
            status: status
    };

	console.log("change status", urlObj, urlId);
    //if(false)
	$.ajax({
        type: "POST",
        url: baseUrl+"/"+moduleId+"/app/superadmin/action/updateurlmetadata",
        data: { "id" : urlId,
        		"values" : urlObj },
       	dataType: "json",
    	success: function(data){
    		if(data.valid == true) toastr.success("Le changement de status a bien été enregistré");
    		startWebSearch("", "locked");
    		//else toastr.error("Une erreur est survenue pendant le référencement");
    		console.log("save referencement success");
    	},
    	error: function(data){
    		toastr.error("Une erreur est survenue pendant l'envoi de votre demande", data);
    		console.log("save referencement error");
    	}
    });
}



function startWebSearch(search, status){

    $("#second-search-bar").val(search);
    $("#searchResults").html("Recherche en cours. Merci de patienter quelques instants...");

    var params = {
        search:search,
        status:status,
        orderBy:"url"
    };

    if(status == "edited"){
    	params = {
	       search:search,
	       searchEdit:true,
	       orderBy:"url"
	    };
    }

    $.ajax({ 
        type: "POST",
        url: baseUrl+"/"+moduleId+"/app/websearch/",
        data: params,
        //dataType: "json",
        success:
            function(html) { 
                $("#searchResults").html(html); 
                $("#sectionSearchResults").removeClass("hidden");
                KScrollTo("#searchResults");
            },
        error:function(xhr, status, error){
            $("#searchResults").html("erreur");
        },
        statusCode:{
                404: function(){
                    $("#searchResults").html("not found");
            }
        }
    });
}


</script>