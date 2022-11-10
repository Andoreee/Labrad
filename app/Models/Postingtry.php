<?php

namespace App\Models;

use Psy\TabCompletion\Matcher\FunctionsMatcher;

class Posting 
{
   private static $postingan =[
        [
            "tittle" => "postingan tes",
            "slug" => "postingan1",
            "type" => "test",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur maxime in nam quasi porro voluptas quibusdam nemo ut deserunt eaque saepe, placeat consequuntur id quae cupiditate quia inventore reprehenderit? Laboriosam quaerat, modi commodi, exercitationem a temporibus expedita vero id explicabo voluptas quisquam suscipit porro? Aperiam voluptates voluptatibus vel exercitationem beatae odit quam soluta perferendis nihil ipsum esse, pariatur dignissimos culpa quia inventore quo ipsa dolor! Eius, hic esse similique neque libero, dolorem eveniet atque recusandae quam consequatur ipsam mollitia! Reiciendis doloremque exercitationem beatae provident magni non cumque repellendus facere dicta ratione earum fuga quam, ipsum veniam alias architecto nobis."
        ],

        [
                "tittle" => "postingan tes 2",
                "slug" => "postingan2",
                "type" => "test2",
                "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur maxime in nam quasi porro voluptas quibusdam nemo ut deserunt eaque saepe, placeat consequuntur id quae cupiditate quia inventore reprehenderit? Laboriosam quaerat, modi commodi, exercitationem a temporibus expedita vero id explicabo voluptas quisquam suscipit porro? Aperiam voluptates voluptatibus vel exercitationem beatae odit quam soluta perferendis nihil ipsum esse, pariatur dignissimos culpa quia inventore quo ipsa dolor! Eius, hic esse similique neque libero, dolorem eveniet atque recusandae quam consequatur ipsam mollitia! Reiciendis doloremque exercitationem beatae provident magni non cumque repellendus facere dicta ratione earum fuga quam, ipsum veniam alias architecto nobis."
        ],
    ];

    public static function all()
    {
        return collect(self::$postingan);
    }

    public static function find($slug)
    {
        $posting = static::all();
        return $posting->firstWhere('slug' , $slug);
    }
    
    public static function post()
    {
        $posting = static::all();
        return $posting->first();
    }
    
}