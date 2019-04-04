<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Do System</title>
    @yield('styles')
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <nav class="my-navbar">
            <a class="my-navbar-brand" href="/">Do System</a>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col col-md-4">
                    <!-- 何か -->
                </div>
                <div class="column col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    @yield('scripts')
</body>
</html>
