stars1 = document.querySelector(".prikaz1").children;
cistoca1 = document.querySelector("#cistocaVal");

index1 = cistoca1.value;
for(let i=0;i<index1;i++){
    for(let j=0;j<stars1.length;j++){
        stars1[j].classList.remove("fa-star");
        stars1[j].classList.add("fa-star-o");
    }
    for(let j=0;j<=i;j++){
        stars1[j].classList.remove("fa-star-o");
        stars1[j].classList.add("fa-star");
    }
}


