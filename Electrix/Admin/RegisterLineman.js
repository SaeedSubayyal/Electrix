
function RegisterLineman() {
  console.log("RegisterLineman function called");

  let CNIC = document.getElementById('CNIC').value;
  let Name = document.getElementById('Name').value;
  let Email = document.getElementById('Email').value;
  let PhoneNum = document.getElementById('PhoneNum').value;

  $.ajax({
    url: 'RegisterLineman.php',
    type: 'POST',
    data: {functionname: 'RegisterLineman', arguments: [Name, Email,PhoneNum,CNIC]},
    success: function(data) {
      // Handle the response data here
      if (data == 1) {
        alert("Lineman Registered Successfully!");
      } else {
        alert( data);
      }
    }
  });
}