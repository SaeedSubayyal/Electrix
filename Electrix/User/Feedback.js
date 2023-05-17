const sign_in_btn = document.querySelector("#feedback-form");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("feedback-form");
});
RegisterLink.addEventListener('click',()=> {
    LoginBox.classList.add('active');
});
function FeedbackForm() {

    let responseTime = document.getElementById('ResponseTime').value === "yes" ? 1 : 0;
    let linemanProfession = document.getElementById('LinemanProfession').value === "yes" ? 1 : 0;
    let bribe = document.getElementById('Bribe').value === "yes" ? 1 : 0;
    let connection = document.getElementById('Connection').value === "yes" ? 1 : 0;
    let price = document.getElementById('Price').value === "yes" ? 1 : 0;
    let complaints = document.getElementById('Complaints').value;
    let username = document.getElementById('Username').value;
     console.log(username);
    $.ajax({
        url: 'feedback.php',
        type: 'POST',
        data:{
            responseTime,linemanProfession,bribe,connection,price,complaints,username},
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
}
