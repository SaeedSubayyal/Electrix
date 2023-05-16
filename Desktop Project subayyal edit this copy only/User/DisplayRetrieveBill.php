<?php
include("RetrieveBill.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Retrieve Bill</title>
     <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="RetrieveBill.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
    function redirectToPage() {
      // Redirect to another page using the PHP header function
      window.location.href = "PayBill.html";
    }
  </script>
</head>
<body>
<nav>
<style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    th,
    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    button {
      padding: 6px 12px;
      background-color: #4285F4;
      color: white;
      border: none;
      cursor: pointer;
    }
    h1 {
      color: blue;
      font-size: 24px;
      font-weight: bold;
      font: Times New Roman;
      text-align: center;
      text-decoration: underline;
    }
  </style>
        <div class = "sidebar-top">
            <span class = "shrink-btn">
                <i class='bx bx-chevron-left'></i>
            </span>
            <img src = "G:\My Drive\University\Semester 4\DBMS Lab\DB Project\Project\White_LogoPNG.png" class="logo" alt="" href = "DashBoard.html">
            <span class = "hide" href = "Dashboard.html">
            <h3 class = "hide">Electrix</h3>
            </span>
        </div>

        <div class="sidebar-links">
            <ul>
                <div class="active-tab"></div>
                <li class="tooltip-element" data-tooltip="0">
                    <a href="Dashboard.html" class="active" data-active="0">
                        <div class="icon">
                            <i class='bx bx-tachometer'></i>
                            <i class='bx bxs-tachometer'></i>
                        </div>
                        <span class="link hide">Dashboard</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="RequestNewMeter.html" data-active="1">
                        <div class="icon">
                            <i class='bx bx-folder'></i>
                            <i class='bx bxs-folder'></i>
                        </div>
                        <span class="link hide">Request New Meter</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="2">
                    <a href="RetrieveBill.html" data-active="2">
                        <div class="icon">
                            <i class='bx bx-message-square-detail'></i>
                            <i class='bx bxs-message-square-detail'></i>
                        </div>
                        <span class="link hide">Retrieve Bill</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="3">
                    <a href="Feedback.html" data-active="3">
                        <div class="icon">
                            <i class='bx bx-bar-chart-square'></i>
                            <i class='bx bxs-bar-chart-square'></i>
                        </div>
                        <span class="link hide">Feedback</span>
                    </a>
                </li>
                <div class="tooltip">
                    <span class="show">DashBoard</span>
                    <span>Request New Meter</span>
                    <span>Retrieve Bill</span>
                    <span>Feedback</span>
                </div>
            </ul>

            <h4 class="hide">Shortcuts</h4>

            <ul>
                <li class="tooltip-element" data-tooltip="0">
                    <a href="Help.html" data-active="4">
                        <div class="icon">
                            <i class='bx bx-help-circle'></i>
                            <i class='bx bxs-help-circle'></i>
                        </div>
                        <span class="link hide">Help</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="Setting.html" data-active="5">
                        <div class="icon">
                                <i class='bx bx-cog'></i>
                                <i class='bx bxs-cog'></i>
                        </div>
                        <span class="link hide">Settings</span>
                    </a>
                </li>
                <div class="tooltip">
                    <span>Help</span>
                    <span>Settings</span>
                </div>
            </ul>
        </div>

        <div class="sidebar-footer">
            <a href="#" class="account tooltip-element" data-tooltip="0">
                <i class='bx bx-user'></i>
            </a>
            <div class="admin-user tooltip-element" data-tooltip="1">
                <div class="admin-profile hide">
                    <img src="./img/face-1.png" alt="">
                    <div class="admin-info">
                        <h3>Logout</h3>
                    </div>
                </div>
                <a href="LoginPage.html" class="log-out">
                    <i class='bx bx-log-out'></i>
                </a>
            </div>
            <div class="tooltip">
               
                <span>Logout</span>
            </div>
        </div>
    </nav>

    <main>
        <div>
        <h2> Bill Details </h2>
</div>
    </main>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class = "center">
      <table >
       <thead>
        <tr><th>S.N</th>
         <th>FullName</th>
         <th>CNIC</th>
         <th>ReferenceNum</th>
         <th>Bill Month</th>
         <th>TotalBill</th>
         <th>Payable Date</th>
    </thead>
    <tbody>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    parse_str(file_get_contents("php://input"), $requestData);
  }
      if(is_array($fetchData)){    
      $sn=1;
      foreach($fetchData as $data){
         if ($requestData["ReferenceNo"] == $data["ReferenceNum"]){
     //   var_dump($data);
    ?>
       <tbody>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['FullName']??''; ?></td>
      <td><?php echo $data['CNIC']??''; ?></td>
      <td><?php echo $data['ReferenceNum']??''; ?></td>
      <td><?php echo $data['Bill_Month']??''; ?></td>
      <td><?php echo $data['TotalBill']??''; ?></td>
      <td><?php echo $data['Payable_Date']??''; ?></td>
      <td><button type="submit" onclick= redirectToPage()> Pay</button></td>
      <!-- <button type="submit" onclick = RetreiveBill()> Pay</button> -->

     </tr>
     </tbody>
     <?php
      $sn++;}}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>
</body>
</html>