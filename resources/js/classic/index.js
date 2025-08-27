import axios from 'axios';

const appDiv = document.getElementById("app");
const dificuldade = appDiv.dataset.dificuldade;

const imageDiv = document.getElementById("image");
const imageId = imageDiv.dataset.image;

let tentativas = 0;
let codigo = "";

document.getElementById("guess-button").addEventListener("click", function () {
    let valor = document.getElementById("tecnologia-select").value;
    if (codigo == valor) {
        alert("Parabéns! Você acertou!");
        location.reload();
    } else if (tentativas < 5) {
        document.querySelector(".container-vidas span:not(.perdida)")
            .classList.add("perdida");

        tentativas++;
        getImage();
    } else {
        alert("Você perdeu! sem cafe para você :(");
        location.reload();
    }
});

getImage();


export function getImage() {
    axios.get("/classic/image", {
        params: {
            dificuldade: dificuldade,
            tentativas: tentativas,
            tecnologia: imageId
        }

    }).then(res => {
        const img = document.getElementById("guess-image");
        img.src = res.data.image;

        codigo = res.data.codigo;
    })
}