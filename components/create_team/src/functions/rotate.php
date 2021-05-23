<?php
/**
 * Rotate array items according to the round-robin algorithm
 * 
 * @param array $items
 * @return void
 */
function rotate(array &$items)
{
    $itemCount = count($items);
    if($itemCount < 3) {
        return;
    }
    $lastIndex = $itemCount - 1;
    /**
     * Though not technically part of the round-robin algorithm, odd-even 
     * factor differentiation included to have intuitive behavior for arrays 
     * with an odd number of elements
     */
    $factor = (int) ($itemCount % 2 === 0 ? $itemCount / 2 : ($itemCount / 2) + 1);
    $topRightIndex = $factor - 1;
    $topRightItem = $items[$topRightIndex];
    $bottomLeftIndex = $factor;
    $bottomLeftItem = $items[$bottomLeftIndex];
    for($i = $topRightIndex; $i > 0; $i -= 1) {
        $items[$i] = $items[$i - 1];
    }
    for($i = $bottomLeftIndex; $i < $lastIndex; $i += 1) {
        $items[$i] = $items[$i + 1];
    }
    $items[1] = $bottomLeftItem;
    $items[$lastIndex] = $topRightItem;
}
