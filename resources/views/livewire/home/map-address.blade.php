<div class="w-64 h-64 rounded-lg" id="map_address"></div>


<script type="text/javascript">
    function initMap() {
        const myLatLng = [{ lat: 14.583430240351765, lng:-90.52251772105124}];

        const map = new google.maps.Map(
            document.getElementById("map_address"),
            {
            zoom: 17,
            center: myLatLng[0],
            }
        );

        new google.maps.Marker({
            position: myLatLng[0],
            map,
        });
    }
    window.initMap = initMap;
</script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCPBMMcd2C8UcxwA_QfvH3K9ZSEJ5yTdlg&callback=initMap" ></script>