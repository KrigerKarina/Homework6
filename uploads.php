<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Форма загрузки файла(6 домашнее задание)</title>
    </head>
    <body>
        <?php if (!isset($_FILES['upload']['tmp_name'])) : ?>
            <!-- Данная форма будет показана, если не было загрузок -->
            <form method="POST" enctype="multipart/form-data">
                <input name="upload" type="file">
                <br><br>
                <input type="submit" value="Отправить">
            </form>
        <?php else: ?>
            <?php
                $newFilename = $_SERVER['DOCUMENT_ROOT']. '/newFile';
                $uploadInfo = $_FILES['upload'];
                //Проверяем тип загруженного файла и дописываем расширение
                switch ($uploadInfo['type']) {
                    case 'image/jpeg':
                        $newFilename .= '.jpg';
                        break;

                    case 'image/png':
                        $newFilename .= '.png';
                        break;

                    default:
                        echo 'Файл неподдерживаемого типа';
                        exit;
                }
                //Перемещаем файл из временной папки в указанную
                if (!move_uploaded_file($uploadInfo['tmp_name'], $newFilename)) {
                    echo 'Не удалось осуществить сохранение файла';
                }
            ?>
        <?php endif; ?>
    </body>
</html>
