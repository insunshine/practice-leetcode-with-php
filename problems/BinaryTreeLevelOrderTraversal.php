<?php


namespace problems;

/**
 * Definition for a binary tree node.
 */
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

/**
 * source: https://leetcode-cn.com/problems/binary-tree-level-order-traversal/
 * Class BinaryTreeLevelOrderTraversal
 * @package problems
 */
class BinaryTreeLevelOrderTraversal
{
    public function solution($root)
    {
        if (!$root) return [];
        $pnodes = [$root];
        $index = 0;
        $res = [];
        while ($pnodes) {
            $nodes = [];
            foreach ($pnodes as $pnode) {
                !$pnode->left ?: $nodes[] = $pnode->left;
                !$pnode->right ?: $nodes[] = $pnode->right;
                //存在节点为0的情况，需要用全等
                $pnode->val === null ?: $res[$index][] = $pnode->val;
            }
            if (!count($nodes)) return $res;
            $pnodes = $nodes;
            $index++;
        }
    }
}

// s 构造二叉树
$node1 = new TreeNode(3);
$node2 = new TreeNode(9);
$node3 = new TreeNode(20);
$node4 = new TreeNode(null);
$node5 = new TreeNode(null);
$node6 = new TreeNode(15);
$node7 = new TreeNode(7);

$tree = $node1;
$node1->left = $node2;
$node1->right = $node3;
$node2->left = $node4;
$node2->right = $node5;
$node3->left = $node6;
$node3->right = $node7;
// e

$levelOrder = new BinaryTreeLevelOrderTraversal();
$res = $levelOrder->solution($tree);
var_dump($res);