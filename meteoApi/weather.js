let web_url = null;

/************************************************************************************************/
//Initializing map
//source: https://leafletjs.com/examples/quick-start/

var mymap = L.map("map").setView([44.8430557, -0.575], 10);

L.tileLayer(
  "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
  {
    attribution:
      'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: "mapbox/streets-v11",
    tileSize: 512,
    zoomOffset: -1,
    accessToken:
      "pk.eyJ1IjoiYm91cmhhbm1hbW9kIiwiYSI6ImNrdmZhYng1aDVjYjEybnF3dGR6Mm14cTYifQ.SCv93OFffNmBG4qf5F_-dg",
  }
).addTo(mymap);

/************************************************************************************************/
var marker = L.marker([51.5, -0.09]).addTo(mymap);

/************************************************************************************************/

function getJsonFromInput() {
  web_url =
    "https://www.prevision-meteo.ch/services/json/" +
    document.getElementById("input").value;
  updateWebData(web_url);
}

/************************************************************************************************/

function getJsonFromMap(latlong) {
  lat = latlong.lat;
  long = latlong.lng;
  console.log(lat);
  console.log(long);

  web_url =
    "https://www.prevision-meteo.ch/services/json/lat=" + lat + "lng=" + long;

  updateWebData(web_url, 0);
}

/************************************************************************************************/

function updateWebData(web_url) {
  fetch(web_url)
    .then((res) => res.json())
    .then((data) => {
      let cityname = data.city_info.name;
      let country = data.city_info.country;
      let sunrise = data.city_info.sunrise;
      let sunset = data.city_info.sunset;
      let date = data.current_condition.date;
      let hour = data.current_condition.hour;
      let wind_speed = data.current_condition.wnd_spd;
      let description = data.current_condition.condition;
      let temp = data.current_condition.tmp;

      document.getElementById("city").innerHTML =
        cityname + "," + " " + country;
      document.getElementById("sunrise").innerHTML =
        "Levé du Soleil: " + sunrise;
      document.getElementById("sunset").innerHTML =
        "Coucher du Soleil: " + sunset;

      document.getElementById("date").innerHTML = "Date: " + date;

      document.getElementById("hour").innerHTML = hour;
      document.getElementById("wind").innerHTML = wind_speed + "km/h";

      document.getElementById("temp").innerHTML = temp + "°C";
      document.getElementById("desc").innerHTML = description;

      let longitude = data.city_info.longitude;
      let latitude = data.city_info.latitude;

      // Update marker position
      marker = marker.setLatLng([latitude, longitude]).update();

      //Update Map View
      mymap = mymap.setView([latitude, longitude], 10);
      document.getElementById("meteo_icon").src =
        data.current_condition.icon_big;

      //Getting Random Image corresponding to the city.
      let background_url =
        "url('https://source.unsplash.com/1600x900/?" + cityname + "')";
      console.log(background_url);

      //Updating HTML & CSS
      document.body.style.backgroundImage = background_url;
      document.getElementsByClassName("weather")[0].style.backgroundColor =
        "black";
      document.getElementsByClassName(
        "future_predictions"
      )[0].style.backgroundColor = "black";

      let hour_prediction = document.getElementsByClassName("hour_prediction");
      for (let i = 0; i < hour_prediction.length; i = i + 1) {
        hour_prediction[i].style.border = "solid #fff";
      }

      let btns = document.getElementsByClassName("bt");
      let day_pref = "fcst_day_";
      for (let i = 0; i < btns.length; i = i + 1) {
        btns[i].style.display = "flex";
        if (i > 0) {
          let d = day_pref + i;
          btns[i].innerHTML = data[d].day_long;
        }
      }

      hourInformation(data, 0);
    });
}

/************************************************************************************************/

document
  .getElementById("input")
  .addEventListener("keyup", () => getJsonFromInput());
/************************************************************************/

function onMapClick(e) {
  getJsonFromMap(e.latlng, 0);
}

mymap.on("click", onMapClick);

/************************************************************************************************/

function hourInformation(data, day) {
  let day_pref = "fcst_day_";
  let hour_id = "hour";
  let temp_id = "temp";
  let meteo_id = "meteo_icon";
  let desc_id = "desc";

  let day_2 = day_pref + day;
  // console.log(day);

  for (let j = 1; j < 24; j = j + 2) {
    let hourJson = j + "H00";

    let h = hour_id + j;
    let t = temp_id + j;
    let m = meteo_id + j;
    let d = desc_id + j;
    // console.log(hourJson);
    let x = data[day_2].hourly_data[hourJson];

    document.getElementById(h).innerHTML = hourJson;
    document.getElementById(t).innerHTML = x.TMP2m + "°C";
    document.getElementById(m).src = x.ICON;
    document.getElementById(d).innerHTML = x.CONDITION;
  }
}

/************************************************************************************************/

function update_future_predictions(web_url, day) {
  fetch(web_url)
    .then((res) => res.json())
    .then((data) => {
      hourInformation(data, day);
    });
}

/************************************************************************************************/

for (let i = 0; i < 5; i = i + 1) {
  let id = "j+" + i;
  document
    .getElementById(id)
    .addEventListener("click", () => update_future_predictions(web_url, i));
}

/************************************************************************************************/
