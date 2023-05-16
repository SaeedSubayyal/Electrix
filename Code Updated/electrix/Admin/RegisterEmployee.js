function RegisterEmployee() {
    let Name = document.getElementById('FullName').value;
    let CNIC = document.getElementById('CNIC').value;
    let PhoneNum = document.getElementById('PhoneNum').value;
    let Address = document.getElementById('Address').value;

    $.ajax({
      url: 'RegisterEmployee.php',
      type: 'POST',
      data: {functionname: 'RegisterEmployee', arguments: [Name,CNIC,PhoneNum,Address]},
      success: function(data) {
        // Handle the response data here
        if (data == 1) {
          alert("Lineman Added Successfully!");
        } else {
          alert( data);
        }
      }
    });
  }
  