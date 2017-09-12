<?= $nav; ?>

<section class="lot-item container">
    <h2><?= $lots_list[$lot_id]['name']; ?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="<?= $lots_list[$lot_id]['image']?>" width="730" height="548" alt="<?= $lots_list[$lot_id]['name']; ?>">
            </div>
            <p class="lot-item__category">Категория: <span><?= $lots_list[$lot_id]['category']; ?></span></p>
            <p class="lot-item__description"><?= $lots_list[$lot_id]['description']?></p>
        </div>
        <div class="lot-item__right">
            <div class="lot-item__state">
                <div class="lot-item__timer timer">
                    <?= $lots_list[$lot_id]['due-date']; ?>
                </div>
                <div class="lot-item__cost-state">
                    <div class="lot-item__rate">
                        <span class="lot-item__amount">Текущая цена</span>
                        <span class="lot-item__cost"><?= $lots_list[$lot_id]['price']; ?></span>
                    </div>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span><?= $lots_list[$lot_id]['step']; ?></span>
                    </div>
                </div>
                <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
                    <p class="lot-item__form-item">
                        <label for="cost">Ваша ставка</label>
                        <input id="cost" type="number" name="cost" placeholder="<?= $lots_list[$lot_id]['step']; ?>">
                    </p>
                    <button type="submit" class="button">Сделать ставку</button>
                </form>
            </div>
            <div class="history">
                <h3>История ставок (<span>4</span>)</h3>

                <?php foreach ($bets as $key) : ?>

                    <table class="history__list">
                        <tr class="history__item">
                            <td class="history__name"><?= $key['name']; ?></td>
                            <td class="history__price"><?= $key['price']; ?> р</td>
                            <td class="history__time"><?= getTime($key['ts']); ?></td>
                        </tr>
                    </table>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>
