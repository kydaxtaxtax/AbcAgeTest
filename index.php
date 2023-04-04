<html lang="ru" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тестовое AbcAge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>

    </style>
</head>
<body>

    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h4 class="fw-bold mb-0 fs-2 text-center">Получение остатка и цены изделия</h4>
                </div>
                <div class="modal-body p-5 pb-4 pt-0">
                   <form name="form" class="p-2 mb-2 bg-dark border-bottom border-dark was-validated" action="php/getInfo.php" method="post">
                       <label for="date" class="form-label">Введите дату</label>
                       <input type="date" name="date" value="2021-01-13" id="date" class="mb-3 form-control bg-dark is-valid" autocomplete="true" placeholder="Type to filter..."required>
                       <button class="w-100 mb-3 btn btn-lg rounded-3 btn-success" id="send" type="submit">Получить</button>
                        <div class="modal-body pb-0" id="result"></div>
                   </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/ajax.js"></script>
    <script src="js/toltip.js" id="runscript"></script>
</body>
</html>


