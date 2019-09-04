<?php



namespace problems;


class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) {
        $this->val = $val;
    }
}

class AddTwoNumbers
{
    public function solution($l1, $l2)
    {
        $arr1 = self::object_2_array($l1);
        $arr2 = self::object_2_array($l2);

    }

    public function object_2_array($obj)
    {
        $num = [];
        if ($obj->val !== null) {
            $currentNode = $obj;
            $num[] = $currentNode->val;
            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
                $num[] = $currentNode->val;
            }
        }
        return $num;
    }
}
$node1=new ListNode(2);
$node2=new ListNode(4);
$node3=new ListNode(3);
$node4=new ListNode(5);
$node5=new ListNode(6);
$node6=new ListNode(4);

$l1 =$node1;
$l2 = $node4;

$node1->next=$node2;
$node2->next=$node3;

$node4->next=$node5;
$node5->next=$node6;

$addTwoNumbers=new AddTwoNumbers();
$depth = $addTwoNumbers->solution($l1, $l2);
var_dump($depth);