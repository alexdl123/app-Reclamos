@extends('layouts.admin')
@section('content')

    <div class="row">
       <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
          <strong>Opciones:</strong>
           <select name="opciones1" id="opcion1" class="form-control selectpicker" data-live-search="true">
                <option value="uv">UV</option>
                <option value="distrito">Distrito</option>
                <option value="municipio">Municipio</option>
           </select>
        </div>
    </div>
     <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
          <strong>Opciones:</strong>
           <select name="opciones2" id="opcion2" class="form-control selectpicker" data-live-search="true">
                
           </select>
        </div>
    </div> 
    </div>
    
    <div id="map"></div>

    @section('javascript')
    <script>

        function clearMarkers() {
            setMapOnAll(null);
        }   
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: -17.7868376, lng: -63.181643},
              zoom: 12
            });
           
            /*
            $.ajax({
                url:"localhost/appReclamos/public/getReclamos",
                method: "get",

            }); 
            */
            $.get("getReclamos", function(data, status){
                    console.log(data);
                    for (var i = data.length - 1; i >= 0; i--) {
                        var obj = {lat:parseFloat(data[i].latitud),lng:parseFloat(data[i].longitud)};
                        var marker = new google.maps.Marker({
                            position: obj, 
                            map: map,
                            label: data[i].titulo
                        });
                          
                    }
                });
            
        }


        
        //Para actualizar los markers
        $("#map").click(function(){
            $.get("getReclamos",function(data,status){
                console.log(data);
                for (var i = data.length - 1; i >= 0; i--) {
                    var obj = {
                        lat: parseFloat(data[i].latitud),
                        lng: parseFloat(data[i].longitud)
                    };
                    var marker = new google.maps.Marker({
                        position: obj,
                        map: map,
                        label: data[i].titulo
                    });     
                }
            })
        });

        
        $("#opcion1").change(function(){
            
            var opcion = $("#opcion1").val();
            var datos = [];
            if(opcion === "uv"){
                $.get("getUvs",function(data,status){
                    $("#opciones2").append(
                        
                        );
                });
            }
            console.log("datos");
            console.log(datos);

        })
            
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdGQpDx8wXal0Iq6fhA94z2EihU2lkgdc&callback=initMap"
        async defer></script>
    @endsection    
@endsection