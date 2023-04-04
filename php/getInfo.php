<?php
error_reporting(0);
mysqli_report(MYSQLI_REPORT_OFF);
$mysqli = @new mysqli('localhost', 'root', 'root', 'abcTest');
if ($mysqli->connect_errno) {
    $output = ['flag' => 'error', 'type' => 'danger', 'message' => 'Нет подключения к БД'];
    exit(json_encode($output));
}


$percent = 30;
$inputDate = date_create($_POST['date']);
$defaultData = date_create('2021-01-13');

insertProductsInfo($mysqli, $inputDate, $defaultData, $percent);


//считаем цену на товар и его остаток
function getCalculateData ($mysqli, $inputDate){
    $supplyData = getSupplyData($mysqli, $inputDate);
    //Наполняем массив данными для вставки
    $calculateData = [];
    while ($row = mysqli_fetch_array($supplyData)) {
        foreach ($calculateData as $key => $array) {
            if ($array['product'] == $row['product']) {
                $newAmount = $calculateData[$key]['amount'] + $row['amount'];
                $newCost = $calculateData[$key]['cost'] + $row['cost'];
                $newPrice = $newCost / $newAmount;
                $calculateData[$key]['amount'] = $newAmount;
                $calculateData[$key]['cost'] = $newCost;
                $calculateData[$key]['price'] = $newPrice;
                goto end;
            }
        }
        array_push($calculateData,  array(
            "product" => $row['product'],
            "amount" => $row['amount'],
            "cost" =>  $row['cost'],
            "price" => $row['cost']/$row['amount']));
        end:
    }
    return $calculateData;
}


// Получение суммы чисел Фибинуччи в зависимости от количества дней
function getAmountOrder($inputDate, $defaultData){
    // Считаем количество дней
    $interval = date_diff($defaultData, $inputDate);
    $days = ($interval->format('%a'));

    // Считаем сумму числел фибинуччи до введенного дня
    $fb = [];
    $sumfb = 3;
    array_push( $fb, 1, 2);
    for ($i = 1; $i <= $days; $i++) {
        $fb[$i] = $fb[$i - 1] + $fb[$i - 2];
        $sumfb += $fb[$i];
    }
    return ($sumfb);
}

// Получить цену с учетом процента
function add_percent($price, $percent){
    return $price + ($price * $percent / 100);
}

// получить данные о поставках
function getSupplyData($mysqli, $inputDate){
    // Получаем данные о поставках
    $stmt = $mysqli->prepare("SELECT * FROM supplies WHERE date <= ?");
    $sqlFormatDate = date_format($inputDate, 'Y-m-d');
    $stmt->bind_param("s", $sqlFormatDate );
    $stmt->execute();
    $result = $stmt->get_result();

    // Проверяем дату на верноесть
    if (mysqli_num_rows($result)==0) {
        $output = ['flag' => 'error', 'type' => 'warning', 'message' => 'На ('.date_format($inputDate, 'd-m-Y').') товаров не найдено'];
        exit(json_encode($output));
    }
    return $result;
}

function insertProductsInfo($mysqli, $inputDate, $defaultData, $percent){

    // Подготавливаем данные к выводу
    $goods = [];
    foreach (getCalculateData($mysqli, $inputDate) as $row){;

        // Отнимаем колличество заказов на текущий и предыдущие дни
        // Сейчас это имитация, но в реальности должна быть таблица с предзаказами и таблица со списаниями
        // из которых мы должны формировать информацию о товаре
        if($row['product'] == "Левый носок") $row['amount'] = $row['amount'] - getAmountOrder($inputDate, $defaultData);
        if($row['amount'] <= 0) continue;

        //прибавляем к цене процент
        $row['price'] = add_percent($row['price'], $percent);

        array_push($goods,  array(
            "name" => $row['product'],
            "stock" => $row['amount'],
            "price" => round ($row['price'],2)));
    }
    $output = ['flag' => 'output', 'goods' => $goods];
    exit(json_encode($output));
}

//

?>

