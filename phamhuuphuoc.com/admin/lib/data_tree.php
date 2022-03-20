<?php

// 1. Phù hợp với database danh mục chỉ có 2 cấp
function data_tree($data = array(), $parent_id = 0, $level = 0)
{
    $result = array();
    if (!empty($data)) {
        foreach ($data as $item) {
            if ($item['parent_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
                unset($data[$item['cat_id']]);
                $child = data_tree($data, $item['cat_id'], $level + 1);
                $result = array_merge($result, $child);
            }
        }
    }
    return $result;
}


// 2. Phù hợp với database danh mục có nhiều cấp
// Máy tính & Laptop
// ------ Laptop
// ------ Màn hình
// ------ PC
// ------ ------- PC custom
// ------ ------- PC đồng bộ

function data_tree_ultra_level($data = array(), $parent_id = 0, $level = 0)
{
    $result = array();
    if (!empty($data)) {
        foreach ($data as $item) {
            if ($item['cat_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
            }else{
                $item['level'] = $level + 1;
                $result[] = $item;
            }
        }
    }
    return $result;
}