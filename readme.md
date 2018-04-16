Photo album

Middleware

Requests

Redis

flushall
keys *
zadd trending_articles 1 'learn redis'
help zrange
zrange trending_articles 0 -1 (-1 the very last item)
zcard trending_articles // return the total
zrange trending_articles 0 -1 WITHSCORES
zincrby trending_articles 1 learn-html
zincrby trending_articles 10 learn-css
zrevrange trending_articles 0 -1 WITHSCORES

Route::get('articles/trending', function(){
    $trending = Redis::zrevrange('trending_articles', 0, 2);
    $trending = App\Article::hydrate(
        array_map('json_decode', $trending);
    );
    dd($treding);
});
Route::get('articles/{article}', function(App\Article $article){
    Redis::zincrby('trending_article', 1, $article);
    return $article;
});

Redis::zincrby('key', nr, $article);
Redis::zremrangebyrank('trending_article', 0, -4); //  retain only the top 3

use Console/Kernel to schedule a cron job
