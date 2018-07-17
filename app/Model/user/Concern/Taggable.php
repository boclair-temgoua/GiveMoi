<?php
/**
 * Created by IntelliJ IDEA.
 * User: boclairtemgoua
 * Date: 15/07/18
 * Time: 02:08
 */

namespace App\Model\user\Concern;


use App\Model\user\tag;

trait Taggable
{


    public function saveTags(string $tags)
    {
        // Recuperation des tags associer a l'article
        $tags = array_filter(array_unique(array_map(function ($item){
            return trim($item);
        }, explode(',',$tags))),function ($item){
            return !empty($item);
        });

        //Recuperation des tags qui sont en base de donnees
        $persisted_tags = Tag::whereIn('name', $tags)->get();


        //Je trouve les nouvel tags et je les insert en base dans la base donnees

        $tags_to_create = array_diff($tags, $persisted_tags->pluck('name')->all());
        $tags_to_create = array_map(function ($tag){
            return [
                'name' => $tag,
                'slug' => $tag,

            ];
        }, $tags_to_create);
        $created_tags = $this->tags()->createMany($tags_to_create);
        $persisted_tags = $persisted_tags->merge($created_tags);
        $this->tags()->sync($persisted_tags);


    }

    public function getTagsListAttribute()
    {
        return $this->tags()->pluck('name')->implode(',');
    }
}