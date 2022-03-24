let refCde     = document.querySelector('#box2 p strong');
let dateCde    = document.querySelector('#box2 p span');
let numCde     = document.querySelector('#section3 span');

const section1 = document.getElementById('section1');
const section2 = document.getElementById('section2');
const section3 = document.getElementById('section3');
const loading2 = document.getElementById('loading2');

//FonctionReponse5
let FonctionReponse5 = (reponse) => {
    let json = JSON.parse(reponse);

    refCde.innerText = json.ref;
    dateCde.innerText = json.date + ' by ' + json.prenom + ' ' + json.nom;

    switch(json.etat) {
        case '1' :
            section1.classList.add('active');
            break;
        case '2' :
            section1.classList.add('active');
            section2.classList.add('active');
            break;
        case '3' :
            section1.classList.add('active');
            section2.classList.add('active');
            section3.classList.add('active');
            numCde.innerText = 'Your package number: ' + json.numero;
            break;
    }
    loading2.classList.remove('active');
}

//FonctionData5
let FonctionData5 = () => {
    let href = window.location.href;
    let url  = new URL(href);
    let ref  = url.searchParams.get ('ref');
    
    let xhr = new XMLHttpRequest();

    loading2.classList.add('active');

    let data   = new FormData();
    data.append('reference', ref);

    xhr.addEventListener('readystatechange', function() {
        if (this.readyState == 4 && this.status == 200) {
            FonctionReponse5(this.response);
            //console.log(this.response);
        }
    });

    xhr.open('POST', '/projets/trackingparcelapp/medias/php/suivi.php');
    xhr.send(data);
}

window,addEventListener('load', function() {
    FonctionData5();
});