stars3 = document.querySelector(".prikaz3").children;
kvalitet1 = document.querySelector("#kvalitetVal");

index3 = kvalitet1.value;

for(let i=0;i<index3;i++){
    for(let j=0;j<stars3.length;j++){
        stars3[j].classList.remove("fa-star");
        stars3[j].classList.add("fa-star-o");
    }
    for(let j=0;j<=i;j++){
        stars3[j].classList.remove("fa-star-o");
        stars3[j].classList.add("fa-star");
    }
}


