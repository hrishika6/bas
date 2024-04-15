function alert(type, message){
    let bs_class = (type == "success") ? "alert-success" : "alert-danger";
    let element = document.createElement("div");
    element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">${message}</strong>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>    
        </div>`;
    // setTimeout(removeAlert, 3000);
}

// function removeAlert(){
//     document.getElementsByClassName("alert")[0].remove();
// }

function setActive(){
    let navbar = document.getElementById("navbar");
    let anchorTag = navbar.getElementsByTagName("a");

    for(let i=0; i<anchorTag.length; i++){
        let file = anchorTag[i].href.split("/").pop();
        let fileName = file.split(".")[0];

        if(document.location.href.indexOf(fileName) >= 0){
            anchorTag[i].classList.add("active");
        }
    }
}
setActive();