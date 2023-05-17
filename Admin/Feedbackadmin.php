<?php
include("displayfeedbacktable.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="FeedbackAdmin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
 <nav>
        <div class = "sidebar-top">
            <span class = "shrink-btn">
                <i class='bx bx-chevron-left'></i>
            </span>
            <img src = "G:\My Drive\University\Semester 4\DBMS Lab\DB Project\Project\White_LogoPNG.png" class="logo" alt="Electra" href = "DashBoard.html">
            <span class = "hide" href = "DashboardAdmin.html">
            <h3 class = "hide">Electra</h3>
            </span>
        </div>

        <div class="sidebar-links">
            <ul>
                <div class="active-tab"></div>
                <li class="tooltip-element" data-tooltip="0">
                    <a href="DashboardAdmin.html" class="active" data-active="0">
                        <div class="icon">
                            <i class='bx bx-tachometer'></i>
                            <i class='bx bxs-tachometer'></i>
                        </div>
                        <span class="link hide">Dashboard</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="MeterRequestAdmin.php" data-active="1">
                        <div class="icon">
                            <i class='bx bx-folder'></i>
                            <i class='bx bxs-folder'></i>
                        </div>
                        <span class="link hide">Meter Requests</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="2">
                    <a href="RegisterLineman.html" data-active="2">
                        <div class="icon">
                            <i class='bx bx-message-square-detail'></i>
                            <i class='bx bxs-message-square-detail'></i>
                        </div>
                        <span class="link hide">Register Employee</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="3">
                    <a href="Feedbackadmin.php" data-active="3">
                        <div class="icon">
                            <i class='bx bx-bar-chart-square'></i>
                            <i class='bx bxs-bar-chart-square'></i>
                        </div>
                        <span class="link hide">Feedback</span>
                    </a>
                </li>
                <div class="tooltip">
                    <span class="show">DashBoard</span>
                    <span>Meter Requests</span>
                    <span>Register Employee</span>
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
                    <a href="SettingAdmin.html" data-active="5">
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
            <a href="Account.html" class="account tooltip-element" data-tooltip="0">
                <i class='bx bx-user'></i>
            </a>
            <div class="admin-user tooltip-element" data-tooltip="1">
                <div class="admin-profile hide">
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
        <h1>Feedback</h1>
        <h3 class = "Formprompt"> Line Man Ratings<br></h3>
        
    </main>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered">
       <thead><tr><th>S.N</th>

         <th>Full Name</th>
         <th>Phone Number</th>
         <th>Rating</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['FullName']??''; ?></td>
      <td><?php echo $data['Phone_Number']??''; ?></td>
      <td><?php echo $data['Rating']??''; ?></td>

     </tr>
     <?php
      $sn++;}}else{ ?>
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