<?php



namespace explore\tree;


class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) {
        $this->val = $value;
    }
}
class MaxDepth
{
    public function solution($root)
    {
        if(!$root) return 0;
        $depth = 1;
        $pnodes = [$root];
        while($pnodes){
            $nodes = [];
            foreach($pnodes as $pnode){
                if($pnode->left){
                    $nodes[] = $pnode->left;
                }
                if($pnode->right){
                    $nodes[] = $pnode->right;
                }
            }
            if(!count($nodes)) return $depth;
            $pnodes = $nodes;
            $depth++;
        }
    }
}
$node1=new TreeNode(3);
$node2=new TreeNode(9);
$node3=new TreeNode(20);
$node4=new TreeNode(null);
$node5=new TreeNode(null);
$node6=new TreeNode(15);
$node7=new TreeNode(7);
$tree=$node1;
$node1->left=$node2;
$node1->right=$node3;
$node2->left=$node4;
$node2->right=$node5;
$node3->right=$node6;
$node3->left=$node7;
var_dump($tree);
$maxDepth=new MaxDepth();
$depth = $maxDepth->solution($tree);
var_dump($depth);
//sss