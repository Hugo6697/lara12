<?php

namespace App\Livewire;

use App\Events\PruebaEvent;
use App\Models\Post;
use App\Models\User;
use App\Notifications\PostNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreatePost extends Component
{
    public $title, $body;

    public function getListeners()
    {
        $userId = Auth::user()->id;
        return [
            "echo-private:users.{$userId},.Illuminate\\Notifications\\Events\\BroadcastNotificationCreated" => 'LoadData',
        ];
    }

    public function LoadData($event)
    {
        dd($event);
    }
    public function save(){
        $user_id = Auth::user()->id;
        $post = Post::create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => $user_id,
        ]);
        $this->reset();
       $this->dispatch('render');
       PruebaEvent::dispatch($post, $user_id);
       User::find(1)->notify(new PostNotification($post, $user_id));
    }
    public function render()
    {
        $post = Post::all();
        return view('livewire.create-post', [
            'posts' => $post,
        ]);
    }
}
