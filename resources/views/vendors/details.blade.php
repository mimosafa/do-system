<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">ToDo App</a>
  </nav>
</header>
<main>
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
          <!-- 何か -->
      </div>
      <div class="column col-md-8">
          <div class="panel panel-default">
            <div class="panel-heading">{{ $vendor->name }}</div>
            <div class="panel-body">
              <div class="text-right">
                <a href="#" class="btn btn-default btn-block">
                  事業者を編集する
                </a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>
