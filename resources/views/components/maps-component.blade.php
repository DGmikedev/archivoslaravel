
<head>
    <!-- CSS OPEN STREET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <title>Mapa</title>
</head>
<style>
    #map {
      height: 500px;
      width: 50%;
    }
  </style>
<body>
    <div id="map"></div>
    {{ $target }}
 <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>

  
  // Crear el mapa y establecer la vista inicial
  var map = L.map("map").setView([40.4168, -3.7038], 13); // Coordenadas de Madrid

  // Cargar los tiles de OpenStreetMap
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
  }).addTo(map);

  // Añadir un marcador
  var marker = L.marker([40.4168, -3.7038]).addTo(map)
    .bindPopup('tienda 1')
    .openPopup();
</script>
</body>
