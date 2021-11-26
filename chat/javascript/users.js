const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
    // console.log("clicou")
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    } else{
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest(); //criando objeto xml
    xhr.open("POST", "./php/search.php", true );
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
            }   
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    xhr.send("searchTerm=" + searchTerm); 
}

//retornar todas as mensagens em 'tempo real'
setInterval(() => {
    let xhr = new XMLHttpRequest(); //criando objeto xml
    xhr.open("GET", "./php/users.php", true );
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!searchBar.classList.contains("active")){ //se ativo, não vai ter a barra de pesquisa e vai adicionar esse parte
                    usersList.innerHTML = data;
                }
            }   
        }
    }
    xhr.send();
}, 500);