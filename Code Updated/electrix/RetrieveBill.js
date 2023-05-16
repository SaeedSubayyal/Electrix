
function RetreiveBill() {
    console.log("RetreiveBill function called");

    let RefNum = document.getElementById('ReferenceNo').value;

    $.ajax({
      url: 'Setting.php',
      type: 'POST',
      data: {functionname: 'RetreiveBill', arguments: [ReferenceNum]},
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