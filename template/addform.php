<section>
    <h1 class="main_header">Добавить протокол</h1>
</section>

<section>

    <?php if (is_array($result)): ?>
        <?php foreach ($result as $res): ?>
                <div class="error"><?=$res?></div>
        <?php endforeach; ?>
    <?php endif;?>

    <form class="form" method="post" action="add.php">
        <div class="form-group">
            <label class="field-group">
                <span class="field-label">Введите номер протокола</span>
                <input class="field" type="number" name="number" required>
            </label>
        </div>
        <div class="form-group">
            <label class="field-group">
                <span class="field-label">Выберете дату выдачи</span>
                <input class="field" type="date" name="date" required>
            </label>
        </div>
        <div class="form-group">
            <label class="field-group">
                <span class="field-label">Укажите ответственного (ФИО)</span>
                <input type="text" class="field" name="person" required>
            </label>
        </div>
        <div class="form-group">
            <label class="field-group">
                <span class="field-label">Соответствие</span>
                <select class="field" name="sign" required>
                    <option value="НЕТ" selected>НЕТ</option>
                    <option value="ДА">ДА</option>
                </select>
            </label>
        </div>
        <div class="form-group">
            <button class="button button-submit" type="submit">Сохранить</button>
        </div>
    </form>
</section>
