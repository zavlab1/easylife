<?php
/*
 * Главный файл вида
*/

defined('_JEXEC') or die;

/*
 * Главный класс вида
 * в имени класса:
 * - Carousel - имя компонента
 * - View - класс вида
 * - Slides - имя вида
 */
class CarouselViewSlides extends JViewLegacy {

    protected $items; // список слайдов
    protected $pagination; // объект постраничной навигации

    // переопределяем метод display
    public function display($tpl = null) {

        $this->items = $this->get('Items'); // напрямую вызываем метод модели getItems()
        $this->pagination = $this->get('Pagination'); // getPagination()

        // добавляем панель управления
        $this->addToolbar();

        // родительский метод display подгрузит файл "tmpl/default.php" и отобразит шаблон вида
        parent::display($tpl);

        // дополнительные параметры для текущего документа
        $this->setDocument();
    }

    protected function addToolbar(){
        // устанавливаем заголовок панели управления
        JToolbarHelper::title( JText::_('COM_CAROUSEL'), 'Component Carousel' );

        // добавляем кнопку "Создать новый элемент"
        // где item - имя сабконтроллера
        // add - имя задачи
        JToolbarHelper::addNew('item.add');

        // кнопка редактирования
        JToolbarHelper::editList('item.edit');

        // кнопка удаления из списка элементов-слайдов
        // (используется сабконтроллер slides)
        JToolbarHelper::deleteList('', 'slides.delete');

        JToolbarHelper::custom('render', '', '', 'Поднять на позицию');
        JToolbarHelper::custom('render', '', '', 'Опустить на позицию');
    }

    protected function setDocument(){
        $document = JFactory::getDocument();

        // Изменяем заголовок документа
        $document->setTitle( JText::_('COM_CAROUSEL') );
    }
}

