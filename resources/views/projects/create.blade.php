<!DOCTYPE html>
<html>
<head>
  <title>Create Project</title>
</head>
<body>

  <h1>Create a Project</h1>

  <form method="POST" action="/projects">
    
    <!-- We need CSRF to project agaisnt attacks -->
    {{ csrf_field() }}

    <div>
      <input type="text" name="title" placeholder="Project title">
    </div>

    <div>
      <textarea name="description" placeholder="Project Desc"></textarea>
    </div>

    <div>
      <button type="submit">Create Project</button>
    </div>
  </form>

</body>
</html>