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
            <div class="panel-heading">事業者</div>
            <div class="panel-body">
              <div class="text-right">
                <a href="#" class="btn btn-default btn-block">
                  事業者を追加する
                </a>
              </div>
            </div>
            <table class="table">
              <thead>
              <tr>
                <th>事業者名</th>
                <th>状態</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                @foreach($vendors as $vendor)
                  <tr>
                    <td><a href="{{ route('vendors.details', ['id' => $vendor->id]) }}">{{ $vendor->name }}</a></td>
                    <td>
                      <span class="label {{ $vendor->status_class}}">{{ $vendor->status_label }}</span>
                    </td>
                    <td><a href="#">編集</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>
