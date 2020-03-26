<?php

namespace Linky;

class DataHelper
{
    /**
     * @param array|null $data
     * @param string     $dataset
     * @param array|null $newData
     */
    public static function merge(?array &$data, string $dataset, ?array $newData)
    {
        if ($data[$dataset] !== null) {
            if ($newData !== null) {
                foreach ($newData as $k => $v) {
                    if (array_key_exists($k, $data[$dataset]) && $data[$dataset][$k] !== null && $data[$dataset][$k] > $v) {
                        continue;
                    }

                    $data[$dataset][$k] = $v;
                }
            }
        } else {
            $data[$dataset] = $newData;
        }

        ksort($data[$dataset]);
    }
}
