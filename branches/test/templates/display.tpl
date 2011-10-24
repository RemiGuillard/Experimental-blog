<section>
    
    <h2>L'exil d'un Troll</h2>
    
    <footer>
        {foreach item=page from=$indentation}
            {$page}
        {/foreach}
    </footer>
    
    {foreach item=article from=$listArticle}
    <article>
        <header>
            <h3><a href="blog.php?articleId={$article.article_id}">{$article.titre}</a></h3>
        </header>
        <p>{$article.contenu}</p>
        <small><time datetime={$article.datetime}>{$article.pubdate}</time></small>
    </article>
    {/foreach}
    
    <footer>
        {foreach item=page from=$indentation}
            {$page}
        {/foreach}
    </footer>
    
</section>