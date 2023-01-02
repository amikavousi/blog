<?php

namespace PostApp\Models;

class testPost
{
    /**
     * @throws \Exception
     */
    public static function find ($slug)
    {
        $path = resource_path("/../resources/posts/{$slug}.html");
        if (!file_exists($path)) {
        abort(404);
        }
       return cache()->remember("posts.{slug}",3, function () use ($path){
//      var_dump('sasdad'); check cache works or not.
         return file_get_contents($path);
    });
    }
}
