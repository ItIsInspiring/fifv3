<div class="entry-author-info">
    <h4>&Agrave; propos de l'auteur.e</h4>
    <p>
        <img src="https://www.gravatar.com/avatar/{{ md5(get_the_author_meta('email')) }}?s=180" width="90" height="90"
            class="img-circle alignleft" alt="">
        {{ get_the_author_meta('description') }}
    </p>
</div>