
function PayBill() {
    console.log("PayBill Function Called");

    let CNIC = document.getElementById('CNIC').value;
    let Name = document.getElementById('Name').value;
    let Email = document.getElementById('Email').value;
    let PhoneNum = document.getElementById('PhoneNum').value;

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