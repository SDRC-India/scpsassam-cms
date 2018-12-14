<?php

/**
 * Class SupsysticTablesPro_Diagram_Model_Diagrams
 */
class SupsysticTablesPro_Diagram_Model_Diagrams extends SupsysticTables_Core_BaseModel
{
    /**
     * Returns diagrams by table id.
     * @param int $tableId
     * @return array
     */
    public function getByTableId($tableId)
    {
        $query = $this->getQueryBuilder()
            ->select('*')
            ->from($this->getTable())
            ->where('table_id', '=', (int)$tableId);

        $diagrams = $this->db->get_results($query->build());

        if ($this->db->last_error) {
            throw new RuntimeException($this->db->last_error);
        }

        return $diagrams;
    }

    /**
     * Converts table data array to the raw table values matrix.
     * @param array $data
     * @return array
     */
    public function prepareTableData(array $data)
    {
        $prepared = array();

        if (count($data) === 0) {
            return $prepared;
        }

        foreach ($data as $row => $columns) {
            foreach ($columns['cells'] as $col => $cell) {
                if (!array_key_exists($row, $prepared) || !is_array($prepared[$row])) {
                    $prepared[$row] = array();
                }

                $value = $cell['data'];

                if (array_key_exists('calculatedValue', $cell) && $this->isFormula($value)) {
                    $value = $cell['calculatedValue'];
                }

                $prepared[$row][$col] = $value;
            }
        }

        return $prepared;
    }

    /**
     * Returns the table data with specific range.
     * @param array $data Table data
     * @param array $from From range
     * @param array $to To range
     * @throws InvalidArgumentException
     * @return array
     */
    public function getSelectedRange($data, array $from, array $to)
    {
        if (!$this->isValidRange($from) || !$this->isValidRange($to)) {
            throw new InvalidArgumentException(
                $this->environment->translate('Invalid range specified.')
            );
        }

        $data = $this->prepareTableData($data);
        $range = array();

        foreach ($data as $row => $columns) {
            if ($row < (int)$from['row'] || $row > (int)$to['row']) {
                continue;
            }

            foreach ($columns as $col => $value) {
                if ($col < (int)$from['col'] || $col > (int)$to['col']) {
                    continue;
                }

                if (!array_key_exists($row, $range)) {
                    $range[$row] = array();
                }

                $range[$row][] = $value;
            }
        }

        // Reset array keys
        $range = array_values($range);

        return $range;
    }

    /**
     * @param array $range
     * @return bool
     */
    protected function isValidRange(array $range)
    {
        return array_key_exists('row', $range) && array_key_exists(
            'col',
            $range
        );
    }

    /**
     * @param string $value
     * @return bool
     */
    protected function isFormula($value)
    {
        return $value && $value[0] === '=';
    }
}