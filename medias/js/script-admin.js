//Liste des evenements
let c1      = document.getElementById("c1");
let c2      = document.getElementById("c2");
let c3      = document.getElementById("c3");
let num     = document.getElementById("num");
let spanC1  = document.getElementById("spanC1");
let spanC2  = document.getElementById("spanC2");
let spanC3  = document.getElementById("spanC3");

//FonctionData
let FonctionData = (valueC) => {
    let xhr = new XMLHttpRequest();

    let data   = new FormData();
    console.log(data)
    data.append('reference', reference.value);
    
    data.append('c', valueC);

    xhr.open('POST', '/projets/trackingparcelapp/medias/php/envoyerMail.php');
    xhr.send(data);
}


//Switch 1
c1.addEventListener("change", function() {
    FonctionData(1);
    this.disabled = true;
    c2.disabled = false;
    spanC1.classList.add("orange");
    spanC1.innerText    = "Supported command";
});
//Switch 2
c2.addEventListener("change", function() {
    FonctionData(2);
    this.disabled = true;
    num.disabled = false;
    spanC2.classList.add("orange");
    spanC2.innerText = "Order packaged";
});
//Switch 3
num.addEventListener("change", function() {
    c3.disabled = false;
    c3.addEventListener("change", function() {
        FonctionData(3);
        this.disabled = true;
        spanC3.classList.add("orange");
        spanC3.innerText = "Parcel sent"
        num.disabled = true;
    });
});