const sign_in_btn = document.querySelector("#requestmeter-form");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("requestmeter-form");
});
RegisterLink.addEventListener('click',()=> {
    LoginBox.classList.add('active');
});

function RequestNewMeter() {
    let Name = document.getElementById('FullName').value;
    let Email = document.getElementById('Email').value;
    let CNIC = document.getElementById('CNIC').value;
    let PhoneNum = document.getElementById('PhoneNum').value;
    let Address = document.getElementById('Address').value;

    $.ajax({
      url: 'process_RequestNewMeter.php',
      type: 'POST',
      data: {functionname: 'RequestNewMeter', arguments: [Name, Email,CNIC,PhoneNum,Address]},
      success: function(data) {
        // Handle the response data here
        if (data == 1) {
          alert("Request is Submitted");
        } else {
          alert( data);
        }
      }
    });
  }
  
  
  
  
  
  
