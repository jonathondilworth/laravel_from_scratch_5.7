<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <ul>
    @foreach($projects as $project)
      <li>{{ $project->title }}</li>
    @endforeach
  </ul>
</body>
</html>