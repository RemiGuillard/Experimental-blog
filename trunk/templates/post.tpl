<section>
    <article>
        {if $status}
        <p>{$status}</p>
        {/if}
        <form method="post" action="">
            <p>
                <label for="newsTitle">Titre :</label>
                <input type="text" name="newsTitle" id="newsTitle"  /><br />
                
                <label for="newsContent">Contenu de  l'article:</label><br />
                <textarea name="newsContent" id="newsContent" rows="10" cols="50"></textarea><br />
                <input type="submit" />
            </p>
        </form>
    </article>
</section>