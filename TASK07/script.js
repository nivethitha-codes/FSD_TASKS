function validateName(e){

let char = String.fromCharCode(e.which);

if(!/[a-zA-Z\s]/.test(char)){
e.preventDefault();
alert("Only letters allowed in name");
}

}

function updateCounter(){

let text = document.getElementById("feedback").value;
document.getElementById("charCount").innerText = text.length;

}

function submitFeedback(){

let name = document.getElementById("name").value;
let email = document.getElementById("email").value;
let feedback = document.getElementById("feedback").value;

let rating = document.querySelector('input[name="rating"]:checked');

if(name=="" || email=="" || feedback==""){
alert("Please fill all fields");
return;
}

if(!rating){
alert("Please select rating");
return;
}

let message = `
Thank you ${name}! <br>
Your rating: ⭐ ${rating.value} <br>
Feedback submitted successfully.
`;

document.getElementById("result").innerHTML = message;

document.getElementById("feedbackForm").reset();
document.getElementById("charCount").innerText = 0;

}