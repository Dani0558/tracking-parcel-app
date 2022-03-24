//FonctionData4
let FonctionData4 = () => {
    let xhr = new XMLHttpRequest();

    let data   = new FormData();
    data.append('reference', reference.value);
    
    data.append('num', num.value);

    xhr.open('POST', '/projets/trackingparcelapp/medias/php/insertNumColis.php');
    xhr.send(data);
}

//VARIABLE DECLARED INTO THE FILE script-admin.js
num.addEventListener('blur', function() {
    FonctionData4();
});