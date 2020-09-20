<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'content', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
    	return $this->belongsToMany(Category::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function excerpt()
    {
        $content = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $this->content);
        $start = strpos($content, '<p>');
        $end = strpos($content, '</p>');

        return substr(strip_tags(substr($content, $start, $end-$start+4)), 0, 35).'...';
    }

    public function img()
    {
        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $this->content, $img);
        return $img ? $img['src'] : img('no-post.png');
    }
}
