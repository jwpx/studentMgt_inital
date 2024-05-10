<?php
include "db_conn.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Check if all required fields are set
   if (isset($_POST["stdID"], $_POST["fname"], $_POST["lname"], $_POST["age"], $_POST["dob"])) {
       // Assign values from form to variables
       $StudentID = $_POST["stdID"];
       $FName = $_POST["fname"];
       $LName = $_POST["lname"];
       $Age = $_POST["age"];
       $DOB = $_POST["dob"];

       // SQL query to insert data into Student table
       $sql = "INSERT INTO Student (StudentID, FirstName, LastName, Age, DOB)
               VALUES ('$StudentID', '$FName', '$LName', '$Age', '$DOB')";

       // Execute the SQL query
       if ($con->query($sql) === TRUE) {
           echo "New record created successfully";
       } else {
           echo "Error: " . $sql . "<br>" . $con->error;
       }
   } else {
       echo "All fields are required";
   }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>PHP CRUD Application</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      Student Management CRUD Application
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Student</h3>
         <p class="text-muted">Complete the form below to add a new student</p>
      </div>

      <div class="container d-flex justify-content-center">
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="width:50vw; min-width:300px;">
      <div class="mb-3">
         <label class="form-label">Student ID:</label>
         <input type="text" class="form-control" name="stdID" placeholder="Student ID">
      </div>

      <div class="row mb-3">
         <div class="col">
            <label class="form-label">First Name:</label>
            <input type="text" class="form-control" name="fname" placeholder="First Name">
         </div>

         <div class="col">
            <label class="form-label">Last Name:</label>
            <input type="text" class="form-control" name="lname" placeholder="Last Name">
         </div>
      </div>

      <div class="mb-3">
         <label class="form-label">Age:</label>
         <input type="text" class="form-control" name="age" placeholder="Age">
      </div>

      <div class="mb-3">
         <label class="form-label">DOB:</label>
         <input type="date" class="form-control" name="dob">
      </div>
      <div>
         <button type="submit" class="btn btn-success" name="submit">Save</button>
         <a href="index.php" class="btn btn-danger">Cancel</a>
      </div>
   </form>
</div>

   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>