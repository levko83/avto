var map;

AmCharts.ready(function() {
    map = new AmCharts.AmMap();
    map.pathToImages = "ammap/images/";
    map.areasSettings = {
        autoZoom: false,
        selectable: true
    };
    map.valueLegend = false;
    map.zoomControl = {
        zoomControlEnabled: false,
        panControlEnabled: false
    };

    var dataProvider = {
        mapVar: AmCharts.maps.ukraineHigh,
        areas: [
            {
                id: "UA-40",
                url: '/delivery/ar-krym.html'},
            {
                id: "UA-43",
                url: '/delivery/ar-krym.html'},
            {
                id: "UA-71",
                url: '/delivery/cherkasskaya-oblast.html'},
            {
                id: "UA-74",
                url: '/delivery/chernigovskaya-oblast.html'},
            {
                id: "UA-77",
                url: '/delivery/chernovickaya-oblast.html'},
            {
                id: "UA-12",
                url: '/delivery/dnepropetrovskaya-oblast.html'},
            {
                id: "UA-14",
                url: '/delivery/doneckaya-oblast.html'},
            {
                id: "UA-26",
                url: '/delivery/ivano-frankovskaya-oblast.html'},
            {
                id: "UA-63",
                url: '/delivery/harkovskaya-oblast.html'},
            {
                id: "UA-65",
                url: '/delivery/hersonskaya-oblast.html'},
            {
                id: "UA-68",
                url: '/delivery/hmelnickaya-oblast.html'},
            {
                id: "UA-30",
                url: '/delivery/kievskaya-oblast.html'},
            {
                id: "UA-32",
                url: '/delivery/kievskaya-oblast.html'},
            {
                id: "UA-35",
                url: '/delivery/kirovogradskaya-oblast.html'},
            {
                id: "UA-09",
                url: '/delivery/luganskaya-oblast.html'},
            {
                id: "UA-46",
                url: '/delivery/lvovskaya-oblast.html'},
            {
                id: "UA-48",
                url: '/delivery/nikolaevskaya-oblast.html'},
            {
                id: "UA-51",
                url: '/delivery/odesskaya-oblast.html'},
            {
                id: "UA-53",
                url: '/delivery/poltavskaya-oblast.html'},
            {
                id: "UA-56",
                url: '/delivery/rovenskaya-oblast.html'},
            {
                id: "UA-59",
                url: '/delivery/sumskaya-oblast.html'},
            {
                id: "UA-61",
                url: '/delivery/ternopolskaya-oblast.html'},
            {
                id: "UA-21",
                url: '/delivery/zakarpatskaya-oblast.html'},
            {
                id: "UA-05",
                url: '/delivery/vinnickaya-oblast.html'},
            {
                id: "UA-07",
                url: '/delivery/volynskaya-oblast.html'},
            {
                id: "UA-23",
                url: '/delivery/zaporozhskaya-oblast.html'},
            {
                id: "UA-18",
                url: '/delivery/zhitomirskaya-oblast.html'}]
    };

    map.dataProvider = dataProvider;
    map.write("mapdiv");
});