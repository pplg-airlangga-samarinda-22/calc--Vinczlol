<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];
    $error = "";
    
    // Validasi input tidak boleh kosong dan harus angka
    if ($num1 === "" || $num2 === "") {
        $error = "Input tidak boleh kosong.";
    } elseif (!is_numeric($num1) || !is_numeric($num2)) {
        $error = "Input harus berupa angka.";
    } else {
        $num1 = floatval($num1);
        $num2 = floatval($num2);
        
        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 == 0) {
                    $error = "Tidak dapat membagi dengan nol.";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                $error = "Operasi tidak valid.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <h2>Kalkulator Sederhana</h2>
    <form method="post">
        <input type="text" name="num1" placeholder="Masukkan angka pertama" value="<?= isset($num1) ? $num1 : '' ?>" required>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="text" name="num2" placeholder="Masukkan angka kedua" value="<?= isset($num2) ? $num2 : '' ?>" required>
        <button type="submit">Hitung</button>
    </form>
    
    <?php if (isset($result)): ?>
        <h3>Hasil: <?= $result ?></h3>
    <?php endif; ?>
    
    <?php if (!empty($error)): ?>
        <p style="color: red;">Error: <?= $error ?></p>
    <?php endif; ?>
</body>
</html>