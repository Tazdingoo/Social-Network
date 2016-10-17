<!DOCTYPE html>
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <script type="text/javascript"    
        src="http://maps.google.com/maps/api/js?sensor=false&language=en"></script>    
    <script type="text/javascript">    
        var geocoder;    
        var map;       
        function initialize() {    
            geocoder = new google.maps.Geocoder();    
            var myOptions = {    
                zoom : 17,//缩放比例    
                //地图类型 •MapTypeId.ROADMAP •MapTypeId.SATELLITE     
                //•MapTypeId.HYBRID •MapTypeId.TERRAIN     
                mapTypeId : google.maps.MapTypeId.ROADMAP    
            }    
            map = new google.maps.Map(document.getElementById("map_canvas"),    
                    myOptions);    
            codeAddress();    
        }    
        function codeAddress() {    
            var address = document.getElementById("address").value;;    
            //地址解析    
            geocoder.geocode({    
                'address' : address    
            }, function(results, status) {    
                if (status == google.maps.GeocoderStatus.OK) {    
                    //依据解析的经度纬度设置坐标居中    
                    map.setCenter(results[0].geometry.location);    
                    var marker = new google.maps.Marker({    
                        map : map,    
                        position : results[0].geometry.location,    
                        title : address,    
                        //坐标动画效果    
                        animation : google.maps.Animation.DROP    
                    });  
                    var display = "<b>address: </b>" + results[0].formatted_address; 
                    var position =  results[0].geometry.location;   
                    var infowindow = new google.maps.InfoWindow({    
                        content : "<span style='font-size:11px'><b>name: </b>"    
                                + address + "<br>" + display + "<br/><b>location:</b>"+position+"</span>",    
                        //坐标偏移量，一般不用修改    
                        leftpixelOffset : 0,    
                        position : results[0].geometry.location     
        
                    });    
                    //默认打开信息窗口,点击做伴弹出信息窗口    
                    infowindow.open(map, marker);    
                    google.maps.event.addListener(marker, 'click', function() {    
                        infowindow.open(map, marker);    
                    });    
                } else {    
                    alert("Geocode was not successful for the following reason: " + status);    
                }    
            });    
        }    
    </script>    
  
</head> 
  
  
<body>  
 <body onload="initialize()">  
        <div id="map_canvas" style="width: 320px; height: 480px;"></div>  
 <div>  
    <input id="address" type="textbox" value="New York">  
    <input type="button" value="Encode" onclick="codeAddress()">  
  </div>  
    </body>  
</body>  
</html>

<!DOCTYPE html PUBLIC>
<html>
<head>
 <title> new document </title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>


<?php
 echo 'Create my location:(Latitude,Longitude,name)';
?>
 <form method="post" action="newlocation_2.php">
 <input type="text" name="lat" value="" />
 <input type="text" name="lng" value="" />
 <input type="text" name="name" value="" /> 
 <input type="submit" value="SUBMIT"/>
 </form>


