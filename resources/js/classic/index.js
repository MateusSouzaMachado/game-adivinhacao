import axios from 'axios';

getImage();

export function getImage(){
    axios.get("/classic/image",{

    }).then(res =>{
        const img = document.getElementById("guess-image");
        img.src = res.data.image;
    })
}