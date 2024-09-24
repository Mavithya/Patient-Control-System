<?php include_once 'dbc.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JS Practrical Exam</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
    <div class="home">
    <div class="header">
        <h1>Patient Control System</h1>
    </div>
    <div class="btn2">
     <a href="#form">   <button type="submit" class="btn">Enter Patient Details</button></a>
      <a href="#home1">  <button type="submit" class="btn">View Patient Details</button></a>
    </div>
    <div class="pi">
    <div class="text">
        <p>Welcome to the Patient Control System. Here you can manage and view patient details efficiently and securely. Please use the buttons above to navigate through the system.</p>
    </div>
    <div class="img">
        <img src="https://getflywheel.com/layout/wp-content/uploads/2022/06/Healthcare_1280x680.png" alt="Patient Image">
    </div>
    </div>
    <footer>
        <p>&copy2024 Patient Control System </p>

        <p id="datetime"></p>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
            var now = new Date();
            var datetime = now.toLocaleString();
            function updateTime() {
                var now = new Date();
                var options = { 
                    weekday: 'long', 
                    year: 'numeric', 
                    month: 'long', 
                    day: 'numeric', 
                    hour: '2-digit', 
                    minute: '2-digit', 
                    second: '2-digit' 
                };
                var datetime = now.toLocaleString('en-US', options);
                document.getElementById("datetime").textContent = datetime;
            }
            updateTime();
            setInterval(updateTime, 1000);
            });
        </script>
    </footer>
    </div>
    </section>
    <section>
    
    <div id="home1">
        <div class="tws">
<table>
   
<thead>
<td>Patient ID</td>
<td>Patient Name</td>
<td>Patient age</td>
<td>Patient Contact No</td>
<td>Patient Email</td>
</thead>

<?php
    
    $sql = "SELECT * FROM patients";

    $result = mysqli_query($connect,$sql);

    $checkResult = mysqli_num_rows($result);

    if ($checkResult>0) {
       while ($row = mysqli_fetch_assoc($result)) {?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['age']; ?></td>
        <td><?php echo $row['contact_no']; ?></td>
        <td><?php echo $row['email']; ?></td>
    </tr>
    <?php }
    }
    
    ?>
       
</table>
<div class="ud">
<div class="delete">
<div style="display: flex; flex-direction: column; margin-left: 5%; border: 2px solid black;padding: 4.5%;">    
<div >
    <form action="register.php" method="POST">
    <label style="font-size: 20px;" for="deleterow">Enter Patient ID :</label>
    <input style="height: 24px;margin-bottom: 10px;width: 280px;" type="number" name="deleteid" placeholder="Enter ID You Want to Delete" min="1" required >
<div>
    <button type="submit">Delete</button>
</div>
    </form>   
    </div>
</div>
</div>
<div class="update">
<div style="display: flex; flex-direction: column;  border: 2px solid black;padding: 3%;">    
<div style="display: flex; flex-direction: column; ">
    <form action="register.php" method="POST">
   <div>
    <label style="font-size: 20px;" for="updaterow">Enter Patient ID :</label>
    <input style="height: 24px;margin-bottom: 10px;width: 280px;" type="number" name="updateid" placeholder="Enter ID You Want to Update" min="1" required >
   </div>
   <div>
    <label style="font-size: 20px;" for="updaterow">Enter Patient Age :</label>
    <input style="height: 24px;margin-bottom: 10px;width: 280px;" type="number" name="updateage" placeholder="Enter Age You Want to Update"  required >
   </div>
    <div>
    <button type="submit">Update</button>
</div>
    </form>   
    </div>
</div>
</div>
</div>
    </div>
    </section>

    <section>
        
    <div id="form">
        <div class="form">
            <form action="register.php" method="POST">
                <label for="id">Patient ID :</label>
                <input type="number" name="id"  required>
                <label for="name">Patient Name :</label>
                <input type="text" name="name"  required>
                <label for="age">Patient Age :</label>
                <input type="number" name="age" required>
                <label for="contact_no">Patient Contact No :</label>
                <input type="text" name="contact_no"  required>
                <label for="email">Patient Email :</label>
                <input type="email" name="email"  required>
                <button type="submit" class="fbtn">Submit</button>
            </form>
        </div>
    </div>
    </section>
    
</body>
</html>