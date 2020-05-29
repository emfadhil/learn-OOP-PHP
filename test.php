<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Geolocation</h1>
    <button onClick="getLocation()">Get Location</button>

    <div id="output"></div>
    
    <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

  <script>
      var x = document.getElementById('output');

      function getLocation(){
          if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition);
          }else{
              x.innerHTML = "Not Support";
          }
      }

      function showPosition(position){
        x.innerHTML = "Latitude = "+position.coords.latitude;
        x.innerHTML += "<br/>"
        x.innerHTML += "Longitude = "+position.coords.longitude;
      }
  </script>
 
</body>
</html>