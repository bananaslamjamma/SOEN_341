<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\User_like;

class UserLikeController extends Controller
{
  public function like(){
    $user_like=new User_like;
    $user_like->movie_id=$_POST['movie_id'];
    $user_like->user_id=$_POST['user_id'];
    echo "Liked!";
    $user_like->save();
  }

  public function unlike(){
    $movie_id = $_POST['movie_id'];
    $user_id = $_POST['user_id'];
    $user_like=User_like::where([['movie_id',$movie_id],['user_id',$user_id]])->first();
    echo "Unliked";
    $user_like->delete();
  }
}
