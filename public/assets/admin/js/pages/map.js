var map = L.map('mapid').setView([9.5506, 122.5164], 3);
var markersLayer = new L.FeatureGroup(); // NOTE: Layer is created here!

$(document).ready(function () {

    const list = []
    for(i in plots) {
        var { latitude, longitude, movingFrom, movingTo, popup} = plots[i];
        list.push(movingFrom)
        list.push(movingTo)
    }

    let listMax = Math.max.apply(null, list);

    // mofng from
    for(i in plots) {
        var { latitude, longitude, movingFrom, movingTo, popup} = plots[i];
        let radius = movingFrom / listMax * 50;
        var marker = L.circleMarker([latitude, longitude],
            {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                width: .5,
                radius: radius
              }
            ).bindPopup(popup);
        // add marker
        markersLayer.addLayer(marker);
    }
    // mofng to
    for(i in plots) {
        var { latitude, longitude, movingFrom, movingTo, popup} = plots[i];
        let radius = movingTo / listMax * 15;
        var marker = L.circleMarker([latitude, longitude],
            {
                color: '#8e5ea2',
                fillColor: '#8e5ea2',
                fillOpacity: 0.5,
                width: .5,
                radius: radius
              }
            ).bindPopup(popup);
        // add marker
        markersLayer.addLayer(marker);
    }

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    markersLayer.addTo(map);
    map.fitBounds(markersLayer.getBounds());
});