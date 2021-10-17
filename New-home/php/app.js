const myMap = L.map('map').setView([22.9074872, 79.07306671], 5);
const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const attribution =
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Coded by Team QuickPark';
const tileLayer = L.tileLayer(tileUrl, { attribution });
tileLayer.addTo(myMap);


function generateList() {
    
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(xhttp.readyState==4 && xhttp.status==200){
            var data = JSON.parse(xhttp.responseText);
            const form = document.querySelector('.list');
            data.forEach((shop) => {
                
                const radio = document.createElement('input');
                const a = document.createElement('a');
                const label = document.createElement('label');
                radio.setAttribute('type','radio');
                radio.setAttribute('name','radio');

                a.addEventListener('click', () => {
                    flyToStore(shop);
                });
                
                a.innerText = 'Show on Map';
                a.href = '#';
                
                
                radio.value = shop.address;
                label.innerText = shop.address;
                radio.setAttribute('id',shop.address);
                label.setAttribute('for',shop.address);
                radio.setAttribute('class','radio_btn');
                label.setAttribute('class','form_label');
                a.setAttribute('class','form_a');

                form.appendChild(radio);
                form.appendChild(a);
                form.appendChild(label);
                


                var myIcon = L.icon({
                    iconUrl: '../php/marker.png',
                    iconSize: [30, 40]
                });
                const marker = L.marker([shop.latitude,shop.longitude],{ icon: myIcon }).bindPopup(shop.address);
                marker.addTo(myMap)
            });

            const input = document.createElement('input');
                input.setAttribute('type','date');
                input.setAttribute('placeholder','YYYY-MM-DD');
                input.setAttribute('id','date');
                input.setAttribute('class','input--field');
                input.setAttribute('name','date');

                const input1 = document.createElement('input');
                input1.setAttribute('type','time');
                input1.setAttribute('id','start-time');
                input1.setAttribute('class','input--field');
                input1.setAttribute('name','start-time');

                const label1 = document.createElement('label');
                label1.setAttribute('for','start-time');
                label1.innerHTML = 'Start-Time';
                label1.setAttribute('class','form_label');

                const input2 = document.createElement('input');
                input2.setAttribute('type','time');
                input2.setAttribute('id','end-time');
                input2.setAttribute('class','input--field');
                input2.setAttribute('name','end-time');

                const label2 = document.createElement('label');
                label2.setAttribute('for','end-time');
                label2.innerHTML = 'End-Time';
                label2.setAttribute('class','form_label');


                
                const btn = document.createElement('button');
                btn.setAttribute('type','submit');
                btn.setAttribute('name','submit');
                btn.setAttribute('id','booking');
                btn.innerHTML = 'BOOK PARKING';

                
                form.appendChild(input);
                form.appendChild(label1);
                form.appendChild(input1);
                form.appendChild(label2);
                form.appendChild(input2);
                form.appendChild(btn);

        }
    }
    xhttp.open("GET","avail_parking.json",true);
    xhttp.send();
}

generateList();

function makePopupContent(shop) {
    return `
      <div>
          <p>${shop.address}</p>
          
      </div>
    `;
  }
  function onEachFeature(feature, layer) {
      layer.bindPopup(makePopupContent(feature), { closeButton: false, offset: L.point(0, -8) });
  }
  
  
  
  const shopsLayer = L.geoJSON(feature, {
      onEachFeature: onEachFeature
      
  });
  shopsLayer.addTo(myMap);

function flyToStore(store) {
    const lat = store.latitude;
    const lng = store.longitude;
    myMap.flyTo([lat, lng], 18, {
        duration: 3
    });
    setTimeout(() => {
        L.popup({closeButton: false, offset: L.point(0, -8)})
        .setLatLng([lat, lng])
        .setContent(makePopupContent(store))
        .openOn(myMap);
    }, 3000);
}






