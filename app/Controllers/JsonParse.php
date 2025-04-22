<?php

class JsonParse {

    private array $racing;
    public array $error;

    public function __construct () {
        $config = [
            'attempts' => $_SERVER['DOCUMENT_ROOT'] . '/storage/json/data_attempts.json',
            'cars' => $_SERVER['DOCUMENT_ROOT'] . '/storage/json/data_cars.json',
        ];

        if (!file_exists($config['attempts']) || !file_exists($config['cars'])) {
            $this->error[] = 'Error file not found';
            return;
        }

        $json['attempts'] = file_get_contents($config['attempts']);
        $json['cars']  = file_get_contents($config['cars']);

        if (in_array(false, $json)) {
            $this->error[] = 'Error read file';
            return;
        }
        $this->racing['attempts'] = $this->jsonValidateAndConvert($json['attempts']);
        $this->racing['cars'] = $this->jsonValidateAndConvert($json['cars']);

        if (empty($this->racing['attempts']) || empty($this->racing['cars'])) {
            $this->error[] = 'Error file empty';
        }
    }

    /**
     * Возвращает массив данных или ошибку в случае проблем с файлами
     *
     * @return array
     */
    public function getRacing (): array {
        return isset($this->error) ? ['error' => $this->error] : $this->racing;
    }

    /**
     * Валидирует и преобразовывает json в массив
     *
     * @param string $json
     * @return array
     */
    private function jsonValidateAndConvert (string $json): array {
        $array = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error[] = 'Error parsing JSON: ' . json_last_error_msg();
        }
        return $array ?? [];
    }
}
