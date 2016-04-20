<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    protected $items = [
        ['Главная', '<h2>Немного о нас</h2><p>- Доступность. Все кухни производятся в широком диапазоне цен: от бюджетных решений до элитных альтернатив. Искать для себя подходящий вариант - легко и увлекательно.</p><p>- Высокое качество. Выпуская мебель для кухни, специалисты фабрики Форема стремятся к западным стандартам. Это предполагает тщательный выбор сырья, безупречное соблюдение размеров, а также аккуратную сборку изделий.</p><p>- Широкий выбор. Продажа кухонной мебели включает в себя сотни различных вариантов: как по стилю, так и по основному материалу гарнитура, оформлению, цветовой гамме.</p><p>- Товары от производителя. Продукция поставляется от изготовителя, что обуславливает её доступность и возможность адаптировать решения под себя.</p><p>- Рассрочка. У Вас есть уникальная возможность купить кухонную мебель на условиях отсроченного платежа. Это отличное решение для молодых семей, студентов и тех, кто лишь недавно переехал в новую квартиру и не может позволить себе дорогую покупку.</p><p>Приобретая продукцию бренда, изготовленную под конкретные параметры помещения, Вы экономите площадь кухни. В состав гарнитура войдут те элементы, которые нужны именно Вам. Кухни под заказ от компании Форема отличаются безупречной точностью и великолепной геометрией. Покупать их гораздо выгоднее, нежели приобретать готовые решения. Заказчик также может выбрать оптимальный вид фурнитуры, выдвижные механизмы и другие элементы, которые впишутся в дизайн интерьера.</p>', 'Главная', 'главная', 'Страница которая главная'],
        ['О компании', '<p>Страничка о компании.</p>', 'О компании', 'о, компании', 'Страница которая о компании'],
        ['Как сделать заказ', '<p>Как сделать заказ.</p>', 'Как сделать заказ', 'как, сделать, заказ', 'Страница как сделать заказ'],
        ['Производство', '<p>Производство.</p>', 'Производство', 'производство', 'Страница производство'],
        ['Наши контакты', '<h1>Контакты</h1><p>Телефоны:</p><p>Email:</p><p>Факс:</p><p>Адрес:&nbsp;г.Москва, Алтуфьевское шоссе 33</p><script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=PdNukEKiJH7Di846x1nEfJmFgwZZqqd6&width=100%&height=400&lang=ru_RU&sourceType=constructor"></script>', 'Наши контакты', 'контакты', 'страница с контактами'],
        ['Замер и Дизайн', '<p>Замер и дизайн текст.</p>', 'Замер и Дизайн', 'замер, дизайн', 'Страница замер и дизайн'],
        ['Доставка', '<p>Доставка текст.</p>', 'Доставка', 'Доставка', 'Страница Доставка'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0, $iMax=count($this->items); $i<$iMax; $i++)
        {
            $row = array_combine(['name', 'text', 'title', 'keywords', 'description'], $this->items[$i]);

            Page::create($row);
        }
    }
}