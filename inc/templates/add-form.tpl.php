<form class="form" action="" method="post">
    <div class="form__element">
        <label class="form__label" for="title">Titre</label>
        <input class="form__input" type="text" name="title" id="title" required>
    </div>
    <div class="form__element">
        <label class="form__label" for="date">Date de publication</label>
        <input class="form__input" type="date" name="date" id="date" placeholder="YYYY-MM-DD" required>
    </div>
    <div class="form__element">
        <label class="form__label" for="author">Auteur</label>
        <select class="form__input" id="author" name="author" required>
            <option>-</option>
            <?php foreach ($authorsList as $authorId => $author) : ?>
                <option value="<?= $authorId ?>"><?= $author->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form__element">
        <label class="form__label" for="category">Catégorie</label>
        <select class="form__input" id="category" name="category" required>
            <option>-</option>
            <?php foreach ($categoriesList as $categoryId => $category) : ?>
                <option value="<?= $categoryId ?>"><?= $category->getName(); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form__element">
        <label class="form__label" for="content">Contenu</label>
        <textarea class="form__textarea" id="content" name="content"></textarea>
    </div>
    <div class="form__buttons">
        <button type="submit">Ajouter</button>
    </div>
</form>