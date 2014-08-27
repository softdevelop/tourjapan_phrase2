$(function(){
    	
    	function closeMap(){
    		
            $('#smap').mapster('unbind');
    		$('#smap').mapster({	
    fillOpacity : 1,
    singleSelect : true,
    clickNavigate : true,
    render_highlight :{ altImage :'theme/Front/img/map_on.jpg'},
    mapKey: 'region'
			});
    }
 
    	
       //open
        $("#area_hokkaido").click(function(){
            $("#show_hokkaido").fadeIn(100);
        });
        
    	  $("#area_tohoku").click(function(){
            $("#show_tohoku").fadeIn(100);
        });
    
    	  $("#area_kitakanto").click(function(){
            $("#show_kitakanto").fadeIn(100);
        });
    
    	  $("#area_minamikanto").click(function(){
            $("#show_minamikanto").fadeIn(100);
        });
    
    	 $("#area_koshinetsu").click(function(){
            $("#show_koshinetsu").fadeIn(100);
        });
    
    
    	 $("#area_hokuriku").click(function(){
            $("#show_hokuriku").fadeIn(100);
        });
     $("#area_tokai").click(function(){
            $("#show_tokai").fadeIn(100);
        });
       $("#area_kinki").click(function(){
            $("#show_kinki").fadeIn(100);
        });
    
    $("#area_sanin").click(function(){
            $("#show_sanin").fadeIn(100);
        });
        
           $("#area_okinawa").click(function(){
            $("#show_okinawa").fadeIn(100);
        });
        
         
           $("#area_kyushu").click(function(){
            $("#show_kyushu").fadeIn(100);
        });
        
              $("#area_shikoku").click(function(){
            $("#show_shikoku").fadeIn(100);
        });
        
        
    
    	//close
        $("#close_hokkaido").click(function(){
            $("#show_hokkaido").fadeOut(100);
            closeMap();
            
        });
        
         $("#close_tohoku").click(function(){
            $("#show_tohoku").fadeOut(100);
            closeMap();
            
        });
        
          $("#close_kitakanto").click(function(){
            $("#show_kitakanto").fadeOut(100);
            closeMap();
            
        });
                  $("#close_minamikanto").click(function(){
            $("#show_minamikanto").fadeOut(100);
            closeMap();
            
        });
        
                   $("#close_koshinetsu").click(function(){
            $("#show_koshinetsu").fadeOut(100);
            closeMap();
            
        });
        
        
                   $("#close_hokuriku").click(function(){
            $("#show_hokuriku").fadeOut(100);
            closeMap();
            
        });
        
          $("#close_tokai").click(function(){
            $("#show_tokai").fadeOut(100);
            closeMap();
            
        });
        
           $("#close_kinki").click(function(){
            $("#show_kinki").fadeOut(100);
            closeMap();
            
        });
        
           $("#close_sanin").click(function(){
            $("#show_sanin").fadeOut(100);
            closeMap();
            
        });
        
        
           $("#close_okinawa").click(function(){
            $("#show_okinawa").fadeOut(100);
            closeMap();
            
        });
        
             $("#close_kyushu").click(function(){
            $("#show_kyushu").fadeOut(100);
            closeMap();
            
        });
        
           $("#close_shikoku").click(function(){
            $("#show_shikoku").fadeOut(100);
            closeMap();
            
        });
        
          $("#close_area").click(function(){
            $("#show_area").fadeOut(100);
            $('#sharea').empty();
            
        });
        
        
   $('.show_area').click(function(){
		   	 $("#show_area").fadeIn(100);
		   	var id = $(this).attr('id');
				jQuery.ajax({
					url : 'http://<?php echo $_SERVER["SERVER_NAME"];?>/areas/getArea/' + id,
					type: 'POST',
					'data' : {id : id},
					dataType: 'json',
					success: function(data) {
						var st = "<ul>";
//						var Url = 
						jQuery.each(data, function(i, v){
							st += "<li id='" + i + "' class='btnarea'><a href='/filters/area/"  + i + "' >" + v + "</a></li>";
						});
						jQuery('#sharea').empty();
						jQuery('#sharea').append(st);
					}

				});
			
		});

});
    
   
      
    
    