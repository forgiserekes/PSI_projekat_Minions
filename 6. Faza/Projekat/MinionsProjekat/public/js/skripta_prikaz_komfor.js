stars2 = document.querySelector(".prikaz2").children;
komfor1 = document.querySelector("#komforVal");

index2 = komfor1.value;

for(let i=0;i<komfor1.value;i++){
    for(let j=0;j<stars2.length;j++){
        stars2[j].classList.remove("fa-star");
        stars2[j].classList.add("fa-star-o");
    }
    for(let j=0;j<=i;j++){
        stars2[j].classList.remove("fa-star-o");
        stars2[j].classList.add("fa-star");
    }
}


