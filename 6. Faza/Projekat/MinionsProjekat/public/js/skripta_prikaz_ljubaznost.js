stars5 = document.querySelector(".prikaz4").children;
ljubaznost1 = document.querySelector("#ljubaznostVal");

index5 = lokacija1.value;

for(let i=0;i<index5;i++){
    for(let j=0;j<stars5.length;j++){
        stars5[j].classList.remove("fa-star");
        stars5[j].classList.add("fa-star-o");
    }
    for(let j=0;j<=i;j++){
        stars5[j].classList.remove("fa-star-o");
        stars5[j].classList.add("fa-star");
    }
}



