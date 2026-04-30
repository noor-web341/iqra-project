function sendMessage(event) {
    event.preventDefault();

    let name = document.getElementById("cName").value.trim();
    let email = document.getElementById("cEmail").value.trim();
    let messageText = document.getElementById("cMessage").value.trim();
    let msg = document.getElementById("contactMsg");

    msg.style.color = "red";

    if (!name || !email || !messageText) {
        msg.innerText = "Please fill all fields!";
        return;
    }

    fetch("save_message.php", {
        method: "POST",
        headers: {"Content-Type":"application/x-www-form-urlencoded"},
        body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&message=${encodeURIComponent(messageText)}`
    })
    .then(res => res.text())
    .then(data => {
        console.log("Server response:", data);

        if(data.includes("success")){
            msg.style.color = "green";
            msg.innerText = "Message sent successfully! ✅";

            // clear form
            document.getElementById("cName").value = "";
            document.getElementById("cEmail").value = "";
            document.getElementById("cMessage").value = "";
        } else {
            msg.style.color = "red";
            msg.innerText = "Something went wrong!";
        }
    })
    .catch(err => {
        msg.style.color = "red";
        msg.innerText = "Error sending message!";
        console.error(err);
    });
}

function goBack(){
    if(document.referrer !== ""){
        window.history.back();
    } else {
        window.location.href = "index.html"; // fallback
    }
}
