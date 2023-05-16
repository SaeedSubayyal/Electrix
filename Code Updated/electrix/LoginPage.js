const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

RegisterLink.addEventListener('click',()=> {
    LoginBox.classList.add('active');
});

LoginLink.addEventListener('click',()=> {
    LoginBox.classList.remove('active');
});
function AdminSignUp() {
    console.log("AdminSignUp function called");

    let Name = document.getElementById('Username').value;
    let Email = document.getElementById('Email').value;
    let Password = document.getElementById('Password').value;
    let CNIC = document.getElementById('CNIC').value;
    let PhoneNum = document.getElementById('PhoneNum').value;
    let Address = document.getElementById('Address').value;

    $.ajax({
      url: 'process_SignupPage.php',
      type: 'POST',
      data: {functionname: 'AdminSignUp', arguments: [Name, Email, Password,CNIC,PhoneNum,Address]},
      success: function(data) {
        // Handle the response data here
        if (data == 1) {
          alert("Email Registered Successfully!");
        } else {
          alert( data);
        }
      }
    });
  }
  
  
  
  
  
  
