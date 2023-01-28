<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //start codeing

   
    public function index()
    {  # code...

        $UserPosts =[ 
            [
            'id' => 1 ,
            'title'=> 'Laravel',
            'description' =>'This is your description',
            'posted_by' => 'Mahmoud',
            'created_at' => '2022-01-29 19:10:08'
            ],
            [
            'id' => 2,
            'title'=> 'JS',
            'description' =>'This is your description',
            'posted_by' => 'Hassan',
            'created_at' => '2022-01-30 18:20:18'
            ],
            [
                'id' => 3,
                'title'=> 'Node.JS',
                'description' =>'This is your description',
                'posted_by' => 'Diso',
                'created_at' => '2022-01-30 18:20:18'
            ],
            [
                'id' => 4,
                'title'=> 'Html',
                'description' =>'This is your description',
                'posted_by' => 'Ali',
                'created_at' => '2022-01-30 18:20:18'
                ]
        ];




        return view('posts.index',[
            'posts' => $UserPosts
        ]);
        // return "Welcome to your App sir";
    }

    public function create()
    {
        # code...

        return view(view: 'posts.create');
        // return "Welcome to your App sir";
    }

    public function show($Id)
    {
        # code...
        $UserPosts =[ 
            [
            'id' => 1 ,
            'title'=> 'Laravel',
            'description' =>'This is your description',
            'posted_by' => 'Mahmoud',
            'created_at' => '2022-01-29 19:10:08'
            ],
            [
            'id' => 2,
            'title'=> 'Node.JS',
            'description' =>'This is your description',
            'posted_by' => 'Hassan',
            'created_at' => '2022-01-30 18:20:18'
            ],
            [
                'id' => 3,
                'title'=> 'Node.JS',
                'description' =>'This is your description',
                'posted_by' => 'Diso',
                'created_at' => '2022-01-30 18:20:18'
            ],
            [
                'id' => 4,
                'title'=> 'Node.JS',
                'description' =>'This is your description',
                'posted_by' => 'Ali',
                'created_at' => '2022-01-30 18:20:18'
                ]
        ];
        $postone=[];
        foreach($UserPosts as $post){
                    if ($post['id']==$Id){
                    $postone = $post;
                    }
                }
    
   
   



    //     // $x=[];
    //     // 
    //     // $Id;
        return view('posts.show'
        ,[
            'post' => $postone
        ]
    );
           
    //         // 'post' => $x
    //     ]);
    //     // return "Welcome to your App sir";
    }
    


















}
