let gerer       =   document.getElementById('gerer');
let h1Span      =   document.querySelector('#box h1 span');
let pSpan       =   document.querySelector('#box p span');
const box       =   document.getElementById('box');
const box2      =   document.getElementById('box2');
const loading2  =   document.getElementById('loading2');

//FonctionReponse3
let FonctionReponse3 = (reponse) => {
    let json = JSON.parse(reponse);

    if(json.vide) {
        box.classList.remove('active');
        box2.classList.remove('active');
    } else {
        box.classList.add('active');
        box2.classList.add('active');
        h1Span.innerText   =   json.ref;
        pSpan.innerText    =   json.date + ' by ' + json.prenom + ' ' + json.nom;

        if(json.numero) {
            num.value      = json.numero;  // VARIABLE DECLARED INTO THE FILE script-admin.js
        } else {
            num.value      = '';
        }


        switch(json.etat) {
            case '0' :
                c1.disabled = false; // VARIABLE DECLARED INTO THE FILE script-admin.js
                c1.checked  = false;
                c2.disabled = true; // VARIABLE DECLARED INTO THE FILE script-admin.js
                c2.checked  = false;
                num.disabled=true; // VARIABLE DECLARED INTO THE FILE script-admin.js
                c3.disabled = true; // VARIABLE DECLARED INTO THE FILE script-admin.js
                c3.checked  = false;
                spanC1.classList.remove("orange"); // VARIABLE DECLARED INTO THE FILE script-admin.js
                spanC1.innerText    = "Supported this command";
                spanC2.classList.remove("orange");
                spanC2.innerText    = "Package this order"; // VARIABLE DECLARED INTO THE FILE script-admin.js
                spanC3.classList.remove("orange");
                spanC3.innerText    = "Send the package"; // VARIABLE DECLARED INTO THE FILE script-admin.js
                break;
            case '1' :
                c1.disabled =   true; 
                c1.checked  =   true;
                c2.disabled = false;
                c2.checked  = false;
                num.disabled=true;
                c3.disabled = true;
                c3.checked  = false;
                spanC1.classList.add("orange"); 
                spanC1.innerText    = "Supported command";
                spanC2.classList.remove("orange");
                spanC2.innerText    = "Package this order"; // VARIABLE DECLARED INTO THE FILE script-admin.js
                spanC3.classList.remove("orange");
                spanC3.innerText    = "Send the package";
                break;
            case '2' :
                c1.disabled =   true; 
                c1.checked  =   true;
                c2.disabled =   true; 
                c2.checked  =   true;
                num.disabled=   false;
                if (num.value) {
                    c3.disabled = false;
                } else {
                    c3.disabled = true;
                }
                c3.checked  =   false;
                
                spanC1.classList.add("orange"); 
                spanC1.innerText    = "Supported command";
                spanC2.classList.add("orange");
                spanC2.innerText = "Package this order";
                spanC3.classList.remove("orange");
                spanC3.innerText    = "Send the package";
            break;
            case '3' :
                c1.disabled =   true;
                c1.checked  =   true;
                c2.disabled =   true;
                c2.checked  =   true;
                num.disabled = true;
                c3.disabled =   true;
                c3.checked  =   true;

                spanC1.classList.add("orange");
                spanC1.innerText    = "Supported command";

                spanC2.classList.add("orange");
                spanC2.innerText = "Order packaged";
                spanC3.classList.add("orange");
                spanC3.innerText = "Parcel sent"
        }
    }
    loading2.classList.remove('active');
    nav.classList.remove('active'); 
    open.classList.remove('active');
}

//FonctionData3
let FonctionData3 = () => {
    let xhr = new XMLHttpRequest();

    loading2.classList.add('active');

    let data3   = new FormData();

    data3.append('reference', reference.value);
    xhr.addEventListener('readystatechange', function() {
        if (this.readyState == 4 && this.status == 200) {
            FonctionReponse3(this.response);
        }
    });

    xhr.open('POST', '/projets/trackingparcelapp/medias/php/readCde.php');
    xhr.send(data3);
}

gerer.addEventListener('click', function(e) {
    e.preventDefault();
    FonctionData3(); 
});