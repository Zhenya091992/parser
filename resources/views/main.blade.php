<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>parser</title>

    <!-- Только CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-light">

<div class="container">
    <main>
        <div class="row g-5">
                <form action="{{route('parse')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="url" class="form-label">Refer</label>
                        <input type="text" class="form-control" id="url" name="url">
                    </div>
                    <div class="mb-3">
                        <label for="xpath" class="form-label">xPath</label>
                        <input type="text" class="form-control" id="xpath" name="xPath">
                    </div>
                    <button type="submit" class="btn btn-primary">send</button>
                </form>
        </div>
    </main>
</div>

<!-- Пакет JavaScript с Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>

</body>
</html>

