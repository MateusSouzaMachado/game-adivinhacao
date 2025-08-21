import axios from 'axios';

const appDiv = document.getElementById("app");
const dificuldade = appDiv.dataset.dificuldade;

const imageDiv = document.getElementById("image");
const imageId = imageDiv.dataset.image;

let tentativas = 0;

document.getElementById("guess-button").addEventListener("click", function(){
    tentativas++;
    getImage();
})

getImage();

export function getImage(){
    axios.get("/classic/image",{
       params:{
        dificuldade: dificuldade,
        tentativas: tentativas,
        tecnologia: imageId
       } 

    }).then(res =>{
        const img = document.getElementById("guess-image");
        img.src = res.data.image;
    })
}