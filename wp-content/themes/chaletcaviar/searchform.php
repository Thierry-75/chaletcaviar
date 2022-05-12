

      <form class="d-flex" action="<?php echo esc_url(home_url('/')); ?>" >
        <input class="form-control mr-sm-2" name="s" type="search" 
        placeholder="Chercher" aria-label="Search" value=<?= get_search_query() ?>>
        <button class="btn btn-success" type="submit">Rechercher</button>
      </form>