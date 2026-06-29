<html lang="en">
<head>
    <style>
    
    
    *, *::before, *::after {
  box-sizing: border-box;
}

.vertical-form {
  display: flex;
  flex-direction: column; /* Stacks form elements vertically */
  gap: 5px;              /* Equal gaps between elements */
  max-width: 300px;       /* Sets a uniform width constraint */
}

.vertical-form input,
.vertical-form button {
  height: 45px;           /* Forces precise vertical sizes */
  padding: 0 15px;
  font-size: 16px;
  width: 100%;            /* Makes them occupy the same horizontal space */
}/* Card container */
.floating-card {
  background-color: #ffffff;
  border-radius: 12px;        
  padding: 24px;
  width: 400px;
  max-width: 100%;
  justify-content: flex-start; /* Aligns content to the top of the card */
  
  
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); 
  
  
  transition: transform 0.3s ease, box-shadow 0.3s ease; 
}
.submit-btn {
  background-color: #007bff; 
  color: #ffffff;            
  border: none;              
  border-radius: 6px;        
  padding: 12px 24px;        
  font-size: 16px;
  font-weight: 600;          
  cursor: pointer;           
  
  
  transition: background-color 0.2s ease; 
}

/* Hover state: Makes the blue slightly darker when user pointer interacts */
.submit-btn:hover {
  background-color: #0056b3; 
}



</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
</head>
<body style="background-color: #e7cece; display: flex; justify-content: center; align-items: center; height: 100vh;">



<div style="border: 3px solid #ccc; padding: 20px;" class="floating-card">
    <img src="" alt="SDF Logo" style="width: 200px; height: auto;"><br><br>
        <h1>Welcome to SDF</h1><br>

    <form action="" method="POST" class="vertical-form"class="vertical-form">
        @csrf
        <label for="email">Username:</label><br>
       <input type="text" name="email" placeholder="you@domain.com"style="border-radius:3px;"><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" placeholder="Password"style="border-radius:3px;"><br>

        
        <button class="submit-btn" type="submit">login</button>
    </form>
    <p>Already have an account? <a href="/login">Login here</a></p>
</div>
</body>
</html>