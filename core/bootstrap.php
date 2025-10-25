<?php

use core\App;
// require 'core/Router.php';
// require 'core/Request.php';
// require 'core/database/Connection.php';
// require 'core/database/QueryBuilder.php';
 require "core/functions.php";

 App::bind("config",require 'config.php');
// $config=require 'config.php';
App::bind("database",new QueryBuilder(
    Connection::make(App::get('config')['database'])
));
// $database=new QueryBuilder(
//     Connection::make($config['database'])
// );


// ဒီ $config နဲ့ $database တို့လိုဟာတွေကို ဒီတိုင်းထည့်ရင် 
// user က အဲ့ variable တွေကို တခြားနေရာမှာ ထပ်ကြေညာပြီးသုံးမိရင်  err တက်တာမျိုးဖြစ်နိုင်လို့ 
// ဒါမျိုးဟာကို Class ဆောက်ပြီးသိမ်းပြီး ပြုန်ထုတ်သုံးသင့် ဒါကြောင့် App Class ကို cord folder ထဲသိမ်း 