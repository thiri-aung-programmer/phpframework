<?php

class Post{
    public $title;
    public $isPublish;

    public function __construct($title,$isPublish){
        $this->title=$title;
        $this->isPublish=$isPublish;
    }

}
$posts=[
    new Post("first Post",true),
    new Post("second Post",true),
    new Post("third Post",true),
    new Post("fourth Post",false)
];

//publish မလုပ်ရသေးတဲ့ကောင်ကို ထုတ်မယ် 
//arrayfilter က array ကိုအရင်လက်ခံပြီး နောက်က function က array တခန်းချင်း looping ပတ်လုပ်မှာ

$unPublish=array_filter($posts,function($post){
    return !$post->isPublish;
});


//title တွေချည်းထုတ်ချင်တာ ( Map က arraysize မပြောင်းဘူး ။ သူက function အရင်လာတာ)
 $titles=array_map(function($post){

    return $post->title;
 },$posts);

var_dump($unPublish);
var_dump($titles);
