const sign_in_btn = document.querySelector("#PayBill-form");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("PayBill-form");
});
RegisterLink.addEventListener('click',()=> {
    LoginBox.classList.add('active');
});
function PayBill() {
    console.log("PayBill Function Called");

    let ReferenceNum = document.getElementById('ReferenceNum').value;
    let CNIC = document.getElementById('CNIC').value;
    let BillAmount = document.getElementById('BillAmount').value;
    let Email = document.getElementById('Email').value;
    let CreditCard = document.getElementById('CreditCard').value;
    $.ajax({
      url: 'PayBill.php',
      type: 'POST',
      data: {functionname: 'PayBillUser', arguments: [ReferenceNum,CNIC,BillAmount,CreditCard,Email]},
      success: function(data) {
        // Handle the response data here
        if (data == 1) {
          alert("Bill Paid Successfully!");
        } else {
          alert( data);
        }
      }
    });
  }