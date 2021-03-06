<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_carousel
 * 
 * Шаблон вида редактирования слайда
*/

defined('_JEXEC') or die;

JHtml::_('behavior.formvalidator');
?>
<!-- Создаем форму редактирования элемента Карусели -->
<!-- Атрибут id="adminForm" нужен для работы кнопок панели управления компонентом
выборка идет по данному идентификатору формы-->
<form action="index.php?option=com_carousel&layout=edit&id="<?php echo $this->item->id; ?> method="POST" id="adminForm" name="adminForm" class="form-validate">
    <div class="form-horizontal">
        <!-- Получаем массив всех групп полей формы -->
        <?php foreach( $this->form->getFieldsets() as $name => $fieldset ): ?>
            <fieldset class="adminform">
                <!-- Выводим название группы полей формы -->
                <legend><?php echo JText::_($fieldset->label); ?></legend>
                <div class="row-fluid">
                    <div class="span6">
                        <!--
                         Для каждой группы полей формы получаем конкретное поле $field
                         и выводим его заголовок "label" и соответсвующее поле ввода значения "input"
                         -->
                        <?php foreach( $this->form->getFieldset($name) as $field ): ?>
                            <div class="control-group">
                                <div class="control-label">
                                    <?php echo $field->label; ?>
                                </div>
                                <div class="controls">
                                    <?php echo $field->input; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </fieldset>
        <?php endforeach; ?>
    </div>

    <!-- Скрытое поле для передачи задачи -->
    <input type="hidden" name="task" value="item.edit"/>
    <!-- Скрытое поле для передачи текущего id -->
    <input type="hidden" name="id" value="<?php echo $this->item->id; ?>"/>
    
    <?php echo JHtml::_('form.token'); // безопасность ?>
</form>
