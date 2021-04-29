function getGeoLocation() {
    navigator.geolocation.getCurrentPosition(getArea);
}

function getArea(position) {
    require([
        "esri/layers/GeoJSONLayer"
    ], function (GeoJSONLayer) {
        const geojsonLayer = new GeoJSONLayer({
            url: "./jordan_neigh.geojson"
        });
        const point = {
            type: "point", // autocasts as new Point()
            longitude: position.coords.longitude,
            latitude: position.coords.latitude
        };
        const queryParams = geojsonLayer.createQuery();
        queryParams.geometry = point;
        geojsonLayer.queryFeatures(queryParams).then(function (results) {
            if(results.features.length > 0)
                $("[name='location']").val(results.features[0].attributes["Locality_English_Name"]);
        });
    });
}