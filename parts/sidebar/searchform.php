<?php



?>


<form action="<?php echo esc_url(home_url('/blog/')); ?>" method="get" class="search__form">
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="キーワードを入力" required />
    <button class="gradient__button" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="search__button__icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
    </button>
</form>