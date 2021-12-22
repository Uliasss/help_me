<?php
require_once "include_db.php";

class Paintings{
    public $fields = [
        'name',
        'description',
        'dates',
        'authorId',
        'paintingId',
    ];

    /*public function Export(){
        $paintingsArray = [];
        $paintingsArray[] = $this->fields;

        while ($row = $mysql->fetch(PDO::FETCH_ASSOC)) {
            $line = [];
            foreach ($this->fields as $field) {
                $line[] = $row[$field];
            }
            $paintingsArray[] = $line;
        }
    }*/

    public function Import($filePath) : array{
        $response = [
            'status' => true,
            'errors' => [],
        ];

        $errors = [];

        if (!file_exists($filePath)) {
            $errors[] = "$filePath не найден";
        }

        if ('csv' !== substr(strrchr($filePath, '.'), 1)) {
            $errors[] = "Файл должен быть с расширением CSV";
        }

        if (!$errors) {
            $handle = fopen($filePath, 'r');
            $headers = fgetcsv($handle, 10000, ';');

            $fieldCheck = true;
            foreach ($headers as $key => $field) {
                if (isset($this->fields[$key])) {
                    if ($field !== $this->fields[$key]) {
                        $fieldCheck = false;
                    }
                } else {
                    $fieldCheck = false;
                }
            }

            if (!$fieldCheck) {
                $headersString = implode(';', $headers);
                $errors[] = "$headersString не соответствуют заголовкам таблицы в базе данных";
            }
        }

        if (!$errors) {
            while (false !== ($row = fgetcsv($handle, 10000, ';'))) {
                if (count($row) === count($this->fields)) {
                    $associativeRow = [];
                    foreach ($row as $key => $field) {
                        $associativeRow[$this->fields[$key]] = $field;
                    }

                    $queryResponse = $this->insertOrUpdate($associativeRow);
                    if (!$queryResponse) {
                        $rowString = implode(';', $row);
                        $errors[] = "Ошибка при добавлении $rowString";
                    }
                } else {
                    $rowString = implode(';', $row);
                    $errors[] = "$rowString имеет неверное кол-во полей";
                }
            }
        }

        if ($errors) {
            $response['status'] = false;
            $response['errors'] = $errors;
        } else {
            $count = $this->count();

            $response['model'] = [
                'result' => "Файл с данными получен из {$filePath} и обработан. Таблица {$this->modelName} обновлена. Количество записей в таблице: {$count}",
            ];
        }

        return $response;
    }

    public function insertOrUpdate($associativeRow): bool {
        $query = "SELECT *
            FROM " . $this->modelName . "
            WHERE p_guid = :p_guid
            LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(":p_guid", $associativeRow['p_guid']);

        if (!$stmt->execute()) {
            return false;
        }

        $updateOrInsert = false;

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $inputSumString = "";
            $currentSumString = "";
            foreach ($this->fields as $fieldName) {
                $inputSumString = $inputSumString . $associativeRow[$fieldName];
                $currentSumString = $currentSumString . $row[$fieldName];
            }

            $inputSum = crc32($inputSumString);
            $currentSum = crc32("$currentSumString");

            if ($inputSum !== $currentSum) {
                $query = "UPDATE " . $this->modelName . " 
                    SET 
                        name = :name,
                        description = :description,
                        yearOfCreation = :yearOfCreation,
                        authorId = :authorId,
                        paintingId = :paintingId
                        WHERE p_guid = :p_guid";

                $updateOrInsert = true;
            }
        } else {
            $query = "INSERT INTO " . $this->modelName . "
                SET
                    name = :name,
                    description = :description,
                    yearOfCreation = :yearOfCreation,
                    authorId = :authorId,
                    paintingId = :paintingId,
                    p_guid = :p_guid";

            $updateOrInsert = true;
        }

        if ($updateOrInsert) {
            $stmt = $this->conn->prepare( $query );

            foreach ($this->fields as $fieldName) {
                $stmt->bindParam(":{$fieldName}", $associativeRow[$fieldName]);
            }

            if ($stmt->execute()) {
                return true;
            }
        } else {
            return true;
        }

        return false;
    }
}