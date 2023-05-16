
function UpdateSettingUser() {
    console.log("UpdateSettingsAdmin function called");

    let CNIC = document.getElementById('CNIC').value;
    let Name = document.getElementById('Name').value;
    let Email = document.getElementById('Email').value;
    let PhoneNum = document.getElementById('PhoneNum').value;

    $.ajax({
      url: 'Setting.php',
      type: 'POST',
      data: {functionname: 'UpdateSettingUser', arguments: [Name,Email,PhoneNum,CNIC,Password]},
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