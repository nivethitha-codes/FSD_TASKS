document.addEventListener("DOMContentLoaded",()=>{
document.querySelectorAll(".card").forEach(card=>{
card.addEventListener("mouseover",()=>card.style.boxShadow="0 10px 20px rgba(0,0,0,0.3)");
card.addEventListener("mouseout",()=>card.style.boxShadow="none");
});
// Optional: smooth scroll or cart animation
document.addEventListener("DOMContentLoaded", ()=>{
    console.log("NiyuCart Loaded! Ready for shopping 😎");
});
});