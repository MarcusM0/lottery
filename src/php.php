<?php 
$words = array(
   '123', '唐太宗','唐朝', '推背图', '神秘', '天机', '袁天罡', '天机不可再泄'
);
class Trie {
    /**
     *
     * 节点数组。每个节点为二元组，依次为是否叶子节点，子节点.
     * @var array $nodes
     */
    protected $nodes;
    /**
     * 
     * @var array $words 关键词数组
     */
    function __construct($words) {
        $this->nodes = array(array(false, array())); //初始化，添加根节点
        $p = 1; //下一个要插入的节点号
        foreach ($words as $word) {
            $cur = 0; //当前节点号
            for ($len = mb_strlen($word,'UTF-8'), $i = 0; $i < $len; $i++) {
                //$c = $word[$i];
                $c = mb_substr($word, $i, 1, 'UTF-8');
                if (isset($this->nodes[$cur][1][$c])) { //已存在就下移
                    $cur = $this->nodes[$cur][1][$c];
                    continue;
                }
                $this->nodes[$p] = array(false, array()); //创建新节点
                $this->nodes[$cur][1][$c] = $p; //在父节点记录子节点号
                $cur = $p; //把当前节点设为新插入的
                $p++; //
            }
            $this->nodes[$cur][0] = true; //一个词结束，标记叶子节点
        }
    }


    function match($s) {
        $ret = '';
        $cur = 0; //当前节点，初始为根节点
        $i = 0; //字符串当前偏移
        $p = 0; //字符串回溯位置
        $len = mb_strlen($s,'UTF-8');
        while ($i < $len) {
            $c = mb_substr($s, $i, 1, 'UTF-8');
            if (isset($this->nodes[$cur][1][$c])) { //如果存在
                $cur = $this->nodes[$cur][1][$c]; //下移当前节点
                if ($this->nodes[$cur][0]) { //是叶子节点，单词匹配！
                    $word = mb_substr($s, $p, $i - $p + 1,'UTF-8');
                    $ret.= "<a style='color:red'>" . $word . '</a>'; //取出匹配位置和匹配的词
                    $p = $i + 1; //设置下一个回溯位置
                    $cur = 0; //重置当前节点为根节点
                }
            } else { //不匹配
                $ret.= mb_substr($s, $p, $i - $p + 1,'UTF-8');
                $cur = 0; //重置当前节点为根节点
                $i = $p; //把当前偏移设为回溯位置
                $p = $i + 1; //设置下一个回溯位置
            }
            $i++; //下一个字符
        }
        return $ret;
    }


}


$trie = new Trie($words);

$s = '中国奇书《推背图》是唐初司天监李淳风与术数大师袁天罡奉唐太宗之命合撰，因李淳风某日观天象，';

$found = $trie->match($s);

print_r($found);

 
?>