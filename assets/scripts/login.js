// Const _________________________________
let formLogin = document.getElementById("log-in");
let divError = document.getElementsByClassName("error")[0];

// functions _____________________________
function xhr(option){

    return new Promise(function(resolve) {

        let xhr = new XMLHttpRequest();

        xhr.open(option.type, option.url);
        xhr.send(option.data);
    
        xhr.onreadystatechange = function(){
                
            if (this.readyState == 4 && this.status == 200) {
                let response = xhr.response;
                console.log(response);
                return resolve(response);
            }
    
        };
    });
}

// Events ________________________________
// Form connexion
formLogin.addEventListener("submit", (e) => {
    e.preventDefault();

    let form = new FormData(formLogin);

    let option = {
        "type": "POST",
        "url": "connexion-login",
        "data": form,
    }
    
    async function getJSON (option) {
        
        let xhrJSON = await xhr(option).then(JSON.parse);
        
        if(xhrJSON === true){
            window.location = document.URL;
        }else{
            divError.children[0].innerHTML = "Adresse mail ou mot de passe incorrect";
            divError.classList.add("false");
            divError.classList.remove("hidden");
            // console.log(divError);
        }
    } 
    
    getJSON(option);
})