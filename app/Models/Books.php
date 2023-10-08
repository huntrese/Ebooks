<?php


namespace App\Models;
class Books{
    
    public static function all()  {
        return[
            [   "id"=>1,
                "name"=>"good shit DDDDDDDD",
                "description"=>"I liked it",
                "tags"=>["gigel","mujik","class"]],
            [   "id"=>2,
                "name"=>"amazing shit DDDDDDDDD",
                "description"=>"I loved it",
                "tags"=>["bratan","mujik","bmw"]],
            [   "id"=>3,
                "name"=>"good stuff SSSSSSS",
                "description"=>"I adored it",
                "tags"=>["gigel","mujik","class"]],
        
            [   "id"=>4,
                "name"=>"good shit DDDDDDDDDD",
                "description"=>"I liked it",
                "tags"=>["gigel","mujik","class"]],
            [   "id"=>5,
                "name"=>"amazing shit ALHAMNDUAL",
                "description"=>"I loved it",
                "tags"=>["bratan","mujik","bmw"]],
            [   "id"=>6,
                "name"=>"good stuff DDDDDDDDDDDD",
                "description"=>"I adored it",
                "tags"=>["gigel","mujik","class"]],
            [   "id"=>7,
                "name"=>"good shit DDDDDDDDDD",
                "description"=>"I liked it",
                "tags"=>["gigel","mujik","class"]],
            [   "id"=>8,
                "name"=>"amazing shit ALHAMNDUAL",
                "description"=>"I loved it",
                "tags"=>["bratan","mujik","bmw"]],
            [   "id"=>9,
                "name"=>"good stuff DDDDDDDDDDDD",
                "description"=>"I adored it",
                "tags"=>["gigel","mujik","class"]],
            [   "id"=>10,
                "name"=>"good shit DDDDDDDDDD",
                "description"=>"I liked it",
                "tags"=>["gigel","mujik","class"]],
            [   "id"=>11,
                "name"=>"amazing shit ALHAMNDUAL",
                "description"=>"I loved it",
                "tags"=>["bratan","mujik","bmw"]],
            [   "id"=>12,
                "name"=>"good stuff DDDDDDDDDDDD",
                "description"=>"I adored it",
                "tags"=>["gigel","mujik","class"]],
            ];
    }
    public static function find($bookid){
        $books=self::all();
        foreach ($books as $book) {
            if ($book['id']==$bookid){
                return $book;
            }
        }
    }

}

?>