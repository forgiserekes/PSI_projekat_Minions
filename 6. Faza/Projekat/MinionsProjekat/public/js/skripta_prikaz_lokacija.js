stars4 = document.querySelector(".prikaz5").children;
lokacija1 = document.querySelector("#lokacijaVal");

index4 = lokacija1.value;

for(let i=0;i<index4;i++){
    for(let j=0;j<stars4.length;j++){
        stars4[j].classList.remove("fa-star");
        stars4[j].classList.add("fa-star-o");
    }
    for(let j=0;j<=i;j++){
        stars4[j].classList.remove("fa-star-o");
        stars4[j].classList.add("fa-star");
    }
}


