<?= $nav; ?>

<form class="form form--add-lot container <?= !empty($add_lot_error) ? 'form--invalid' : ''; ?>" action="../../add-lot.php" method="post"  enctype="multipart/form-data" > <!-- form--invalid -->
    <h2>Добавление лота</h2>

    <div class="form__container-two">
        <div class="form__item <?= (in_array('name', $add_lot_error)) ? 'form__item--invalid' : ''; ?>"> <!-- form__item--invalid -->
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="name" placeholder="Введите наименование лота" value="<?= isset($lot_item['name']) ? $lot_item['name'] : ''; ?>">
            <span class="form__error"><?= $add_lot_error_message['name']; ?></span>
        </div>

        <div class="form__item <?= !empty($add_lot_error) ? 'form__item--invalid' : ''; ?>">
            <label for="category">Категория</label>
            <select id="category" name="category">
                <option>Выберите категорию</option>

                <?php foreach ($lot_category as $key) : ?>

                <option><?= $key; ?></option>

                <?php endforeach; ?>
            </select>
            <span class="form__error"><?= $add_lot_error_message['category']; ?></span>
        </div>
    </div>

    <div class="form__item form__item--wide <?= (in_array('description', $add_lot_error)) ? 'form__item--invalid' : ''; ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="description" placeholder="<?= isset($lot_item['description']) ? $lot_item['description'] : 'Напишите описание лота'; ?>"></textarea>
        <span class="form__error"><?= $add_lot_error_message['description']; ?></span>
    </div>

    <div class="form__item form__item--file <?= (in_array('image', $add_lot_error)) ? 'form__item--invalid' : ''; ?>"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="../../img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" name="image" type="file" id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
            <span class="form__error"><?= $add_lot_error_message['image']; ?></span>
        </div>
    </div>

    <div class="form__container-three">
        <div class="form__item form__item--small <?= (in_array('price', $add_lot_error)) ? 'form__item--invalid' : ''; ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" name="price" placeholder="0" value="<?= isset($lot_item['price']) ? $lot_item['price'] : ''; ?>">
            <span class="form__error"><?= $add_lot_error_message['price']; ?></span>
        </div>

        <div class="form__item form__item--small <?= (in_array('step', $add_lot_error)) ? 'form__item--invalid' : ''; ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" name="step" placeholder="0" value="<?= isset($lot_item['step']) ? $lot_item['step'] : ''; ?>">
            <span class="form__error"><?= $add_lot_error_message['step']; ?></span>
        </div>

        <div class="form__item <?= (in_array('due-date', $add_lot_error)) ? 'form__item--invalid' : ''; ?>">
            <label for="lot-date">Дата завершения</label>
            <input class="form__input-date" id="due-date" type="text" name="due-date" placeholder="20.05.2017" value="<?= isset($lot_item['due-date']) ? $lot_item['due-date'] : ''; ?>">
            <span class="form__error"><?= $add_lot_error_message['due-date']; ?></span>
        </div>
    </div>

    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" name="add-lot" class="button">Добавить лот</button>
</form>
