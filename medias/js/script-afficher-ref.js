let reference   = document.getElementById('reference');
let open        = document.getElementById('open');
let loading     = document.getElementById('loading');
let nav         = document.querySelector('#boxRef nav');


//FonctionReponse2
let FonctionReponse2 = (reponse) => {
    reference.innerHTML = '<option value="0">List of references</option>';
    let json = JSON.parse(reponse);
    if (json.ref == 'vide') {
        reference.innerHTML =  '<option value="0">No reference available</option>';
    } else {
        for (let i = 0; i < json.length; i++) {
            reference.innerHTML += '<option value="'+json[i].ref+'">'+json[i].ref+'</option>';
        }
    }
    loading.classList.remove('active');
}

//FonctionData2
let FonctionData2 = () => {
    let xhr = new XMLHttpRequest();

    loading.classList.add('active');

    xhr.addEventListener('readystatechange', function() {
        if (this.readyState == 4 && this.status == 200) {
            FonctionReponse2(this.response);
            //console.log(this.response);
        }
    });

    xhr.open('GET', '/projets/trackingparcelapp/medias/php/readAllRef.php');
    xhr.send();
}

/* window.addEventListener('load', function() {
    FonctionData2();
}); */

//Ouvrir et fermer la zone nav
open.addEventListener('click', function() {
    //this fait reference a l'element open
    this.classList.toggle('active');
    nav.classList.toggle('active');
    FonctionData2();
});