const navOpen= document.querySelector(".nav_hanburger");
const navClose= document.querySelector(".close_toggle");


navOpen.addEventListener('click', ()=>{
    const navLeft =menu.getBoundingClientReact().left;

    if(navLeft <0)
    {
        menu.style.left="0";
        document.body.classList.add("active");

    }
    else{
        menu.style.left="-40rem";
        document.body.classList.remove("active");



    }
});