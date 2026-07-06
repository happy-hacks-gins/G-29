<html lang="en">
<head>
    <style>
    
    
    *, *::before, *::after {
  box-sizing: border-box;
}

.vertical-form {
  display: flex;
  flex-direction: column; 
  gap: 5px;              
  max-width: 300px;       
}

.vertical-form input,
.vertical-form button {
  height: 45px;           
  padding: 0 15px;
  font-size: 16px;
  width: 100%;            
}
.floating-card {
  background-color: #ffffff;
  border-radius: 12px;        
  padding: 24px;
  width: 400px;
  max-width: 100%;align-self: flex-start;margin bottom:100px;
  justify-content: flex-start; 
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08); 
  transition: transform 0.3s ease, box-shadow 0.3s ease; 
}
.submit-btn {
  background-color: #007bff; 
  color: #ffffff;            
  border: none;            
  box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.1), 0 2px 4px -1px rgba(37, 99, 235, 0.06);          
  border-radius: 6px;        
  padding: 12px 24px;        
  font-size: 16px;
  font-weight: 600;          
  cursor: pointer;           
  transition: background-color 0.2s ease; 
}


.submit-btn:hover {
  background-color: #0056b3; 
}



</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
</head>
<body style="background-color: #f7efef; display: flex; justify-content: center; align-items: center; min-height: 100vh; height:auto;">

@auth
<p>Congrats you are logged in</p><br>
<form action="/logout"method="POST">
  @csrf
  <button>log out</button>
</form>
<div style="border: 3px solid #ccc; padding: 20px; " class="floating-card">
<h2>Create a new post</h2>
<form action="/create-posts" method="POST">
  
    @csrf
    <label for="title">Title:</label><br>
    <input type="text" name="title" style="border-radius:3px;"><br>
    
    <label for="body">Body:</label><br>
    <textarea name="body" rows="4" cols="50" style="border-radius:3px;"placeholder="Enter post content here..."></textarea><br>

    
    <button class="submit-btn" type="submit">Create Post</button>
</form>

</div>
<div>
  <h2>all posts</h2>
  @foreach($posts as $post)
    <div style="border: 3px solid #/ccc; padding: 20px; " class="floating-card">
      <h3>{{ $post->title }}</h3>
      {{ $post->body }}
      <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
      <form action="/delete-post/{{ $post->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
      </form>
    </div>
  @endforeach
</div>

 @else   
<div style="border: 3px solid #ccc; padding: 20px; " class="floating-card">
    <img src="" alt="SDF Logo" style="width: 200px; height: auto;"><br><br>
        <h1>Welcome to SDF</h1><br>

    <form action="/login" method="POST" class="vertical-form"class="vertical-form">
        @csrf
        <label for="name">Username:</label><br>
       <input type="text" name="loginname" style="border-radius:3px;"><br>
        
        <label for="password">Password:</label><br>
        <input type="password" name="loginpassword" placeholder="Password"style="border-radius:3px;"><br>

        
        <button class="submit-btn" type="submit">login</button>
    </form>
    <p>Don't have an account ? <a href="/register"> register</a></p>
</div>
@endauth


</body>
</html>