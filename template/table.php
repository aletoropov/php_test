<section>
    <h1 class="main_header">Таблица с данными</h1>
</section>

<section>
    <table>
        <tr>
            <th>№ п\п</th>
            <th>Номер протокола</th>
            <th>Дата выдачи</th>
            <th>Ответственный</th>
            <th>Соответствие</th>
        </tr>
        <?php
        foreach ($protocols as $row): ?>
            <tr>
                <td><?=htmlspecialchars($row['id']);?></td>
                <td><?=htmlspecialchars($row['number']);?></td>
                <td><?=htmlspecialchars($row['date']);?></td>
                <td><?=htmlspecialchars($row['person']);?></td>
                <td><?=htmlspecialchars($row['sign']);?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

<section class="navigation">
    <a class="button button-submit" href="add.php">Добавить протокол</a>
</section>