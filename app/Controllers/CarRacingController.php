<?php
require __DIR__ . '/JsonParse.php';
class CarRacingController {

    private array $data;
    public function __construct()
    {
        $jsonParse = new JsonParse();
        if (!empty($jsonParse->error)) {
            print_r($jsonParse->error);
            exit;
        }
        $this->data = $jsonParse->getRacing();
    }

    /**
     * Возвращает данные для главной таблицы
     *
     * @return array
     */
    public function getDataForMainTable (): array {
        $data = $this->dataPreparerForMainTable($this->data);
        return $this->dataSort($data, 'sum_attempts');
    }

    /**
     * Возвращает данные для таблиц заездов
     *
     * @return array
     */
    public function getDataForAttemptsTable (): array {
        $data = $this->dataPreparerForAttemptsTable($this->data);
        foreach ($data as $attempt) {
            $result[] = $this->dataSort($attempt, 'result');
        }
        return $result;
    }

    /**
     * Создаёт новый массив с распределёнными попытками по участникам
     *
     * @param array $data
     * @return array
     */
    private function dataPreparerForMainTable(array $data): array
    {
        $result = array_combine(array_column($data['cars'], 'id'), $data['cars']);

        foreach ($data['attempts'] as $attempt) {
            if (array_key_exists($attempt['id'], $result)) {
                if (!isset($result[$attempt['id']]['sum_attempts'])) {
                    $result[$attempt['id']]['sum_attempts'] = 0;
                }
                $result[$attempt['id']]['sum_attempts'] += $attempt['result'];
                $result[$attempt['id']]['attempts'][] = $attempt;
            }
        }
        return $result;
    }

    /**
     * Подготавливает данные в массиве для отображения результата заездов используя
     * данные на основании главной таблицы
     *
     * @param array $data
     * @return array
     */
    private function dataPreparerForAttemptsTable(array $data): array {
        $result = [];
        $data = $this->dataPreparerForMainTable($data);
        foreach ($data as $car) {
            foreach ($car['attempts'] as $key => $attempt) {
                $result[$key][] = array_merge($attempt, $car);
            }
        }
        return $result;
    }

    /**
     * Сортирует массив в порядке убывания по ключу
     *
     * @param array $data
     * @param string $keySort
     * @return array
     */
    private function dataSort(array $data, string $keySort): array {
        uasort($data, function($a, $b) use ($keySort) {
            return $b[$keySort] <=> $a[$keySort];
        });
        return $data;
    }
}
