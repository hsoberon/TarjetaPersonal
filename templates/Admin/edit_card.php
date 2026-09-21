<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Card $card
 * @var iterable $themes
 * @var iterable $users
 * @var iterable $linkTypes
 */
$this->assign('title', 'Editar ' . $card->name);
$isAdmin = $isAdmin ?? false;
$links = $card->card_links ?: [];
$styleFields = [
    'style_bg' => 'Fondo',
    'style_grad_from' => 'Degradado inicio',
    'style_grad_to' => 'Degradado fin',
    'style_card' => 'Tarjeta',
    'style_heading' => 'Título',
    'style_text' => 'Texto',
    'style_link' => 'Enlaces',
    'style_link_hover' => 'Enlace hover',
];
?>
<div class="toolbar">
    <?= $this->Html->link('Volver al listado', ['action' => 'cards'], ['class' => 'btn-admin btn-ghost']) ?>
    <?= $this->Html->link('Ver tarjeta pública', ['controller' => 'Pages', 'action' => 'card', $card->url], ['class' => 'btn-admin', 'target' => '_blank']) ?>
</div>

<?php if ($card->getErrors()): ?>
    <div class="message error">
        No se pudieron guardar algunos campos.
        <?php
        $flatErrors = [];
        array_walk_recursive($card->getErrors(), function ($message, $key) use (&$flatErrors) {
            if (is_string($message)) {
                $flatErrors[] = $message;
            }
        });
        ?>
        <div><?= h(implode(' ', $flatErrors)) ?></div>
    </div>
<?php endif; ?>

<?= $this->Form->create($card, ['type' => 'file', 'class' => 'admin-form', 'id' => 'card-form']) ?>
<?php
$this->Form->unlockField('image_file');
$this->Form->unlockField('card_links');
?>
<ul class="nav edit-tabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-info" role="tab" aria-controls="tab-info" aria-selected="true">Información</button>
    </li>
    <li class="nav-item" role="presentation">
        <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-links" role="tab" aria-controls="tab-links" aria-selected="false">Enlaces</button>
    </li>
    <li class="nav-item" role="presentation">
        <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-style" role="tab" aria-controls="tab-style" aria-selected="false">Estilo</button>
    </li>
</ul>

<div class="tab-content admin-card edit-tabs-panel">
    <div class="tab-pane fade show active" id="tab-info">
        <?= $this->Form->control('active', ['type' => 'checkbox', 'label' => 'Tarjeta activa']) ?>
        <?= $this->Form->control('name', ['label' => 'Nombre']) ?>
        <?= $this->Form->control('url', ['label' => 'URL pública']) ?>
        <?= $this->Form->control('position', ['label' => 'Cargo / posición']) ?>
        <?= $this->Form->control('description', ['type' => 'textarea', 'label' => 'Descripción']) ?>
        <?= $this->Form->control('theme_id', ['options' => $themes, 'label' => 'Tema']) ?>
        <?php if ($isAdmin && $users): ?>
            <?= $this->Form->control('user_id', ['options' => $users, 'label' => 'Dueño']) ?>
        <?php endif; ?>
        <label>Imagen actual</label>
        <?php if ($card->image): ?>
            <div class="mb-3">
                <?= $this->Html->image('Modern.' . $card->image, [
                    'alt' => $card->name,
                    'style' => 'width:96px;height:96px;object-fit:cover;border-radius:50%;',
                ]) ?>
                <p class="text-muted"><?= h($card->image) ?></p>
            </div>
        <?php endif; ?>
        <label>Reemplazar imagen</label>
        <?= $this->Form->file('image_file', ['accept' => 'image/jpeg,image/png,image/gif,image/webp']) ?>
    </div>

    <div class="tab-pane fade" id="tab-links">
        <p class="text-muted">Teléfono, email y WhatsApp usan el campo contenido. Redes y web usan la URL. Generar contacto crea el archivo .vcf con el nombre, el cargo, la foto y los demás enlaces.</p>
        <button type="button" class="btn-admin btn-alt mb-3" id="add-link">Agregar enlace</button>
        <div id="links-wrap">
            <?php foreach ($links as $i => $link): ?>
                <div class="link-row">
                    <?= $this->Form->hidden("card_links.{$i}.id") ?>
                    <div class="row">
                        <div class="col-md-3">
                            <?= $this->Form->control("card_links.{$i}.type_id", [
                                'options' => $linkTypes,
                                'label' => 'Tipo',
                            ]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Form->control("card_links.{$i}.title", ['label' => 'Título']) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $this->Form->control("card_links.{$i}.priority", ['label' => 'Orden']) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $this->Form->control("card_links.{$i}.active", [
                                'type' => 'checkbox',
                                'label' => 'Activo',
                            ]) ?>
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <?= $this->Form->postLink('Quitar', ['action' => 'deleteLink', $link->id], [
                                'confirm' => '¿Eliminar este enlace?',
                                'class' => 'btn-admin btn-danger',
                                'block' => 'postLink',
                            ]) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control("card_links.{$i}.url", ['label' => 'URL']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control("card_links.{$i}.content", ['label' => 'Contenido']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <template id="link-template">
            <div class="link-row">
                <div class="row">
                    <div class="col-md-3">
                        <label>Tipo</label>
                        <select name="card_links[__i__][type_id]" class="form-select">
                            <?php foreach ($linkTypes as $id => $title): ?>
                                <option value="<?= (int)$id ?>"><?= h($title) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Título</label>
                        <input type="text" name="card_links[__i__][title]">
                    </div>
                    <div class="col-md-2">
                        <label>Orden</label>
                        <input type="number" name="card_links[__i__][priority]">
                    </div>
                    <div class="col-md-2">
                        <input type="hidden" name="card_links[__i__][active]" value="0">
                        <label class="switch">
                            <input type="checkbox" name="card_links[__i__][active]" value="1" checked>
                            Activo
                        </label>
                    </div>
                    <div class="col-md-6">
                        <label>URL</label>
                        <input type="text" name="card_links[__i__][url]">
                    </div>
                    <div class="col-md-6">
                        <label>Contenido</label>
                        <input type="text" name="card_links[__i__][content]">
                    </div>
                </div>
            </div>
        </template>
    </div>

    <div class="tab-pane fade" id="tab-style">
        <div class="row">
            <div class="col-lg-6">
                <?php foreach ($styleFields as $field => $label): ?>
                    <?php $value = $card->styleValue($field); ?>
                    <label><?= h($label) ?></label>
                    <div class="color-row">
                        <input type="color" value="<?= h($value) ?>" data-sync="<?= h($field) ?>">
                        <?= $this->Form->control($field, [
                            'label' => false,
                            'value' => $value,
                            'id' => $field,
                        ]) ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-6">
                <label>Vista previa</label>
                <div class="preview-card" id="style-preview">
                    <?php if ($card->image): ?>
                        <?= $this->Html->image('Modern.' . $card->image, ['alt' => $card->name]) ?>
                    <?php endif; ?>
                    <h3 id="preview-name"><?= h($card->name) ?></h3>
                    <p id="preview-text"><?= h($card->description ?: 'Texto de ejemplo') ?></p>
                    <a href="#" id="preview-link">Enlace de ejemplo</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <?= $this->Form->button('Guardar cambios', ['class' => 'btn-admin']) ?>
</div>
<?= $this->Form->end() ?>

<?php $this->Html->scriptBlock(<<<JS
(function () {
    var nextIndex = document.querySelectorAll('#links-wrap .link-row').length;
    var addBtn = document.getElementById('add-link');
    var wrap = document.getElementById('links-wrap');
    var tpl = document.getElementById('link-template');
    if (addBtn && wrap && tpl) {
        addBtn.addEventListener('click', function () {
            var html = tpl.innerHTML.replace(/__i__/g, String(nextIndex++));
            wrap.insertAdjacentHTML('beforeend', html);
            var row = wrap.lastElementChild;
            if (window.initAdminSelects && row) {
                window.initAdminSelects(row);
            }
        });
    }

    function hex(value) {
        return value || '#000000';
    }

    function syncPreview() {
        var preview = document.getElementById('style-preview');
        if (!preview) { return; }
        var bg = document.getElementById('style_bg');
        var from = document.getElementById('style_grad_from');
        var to = document.getElementById('style_grad_to');
        var card = document.getElementById('style_card');
        var heading = document.getElementById('style_heading');
        var text = document.getElementById('style_text');
        var link = document.getElementById('style_link');
        preview.style.background = 'linear-gradient(121deg, ' + hex(from && from.value) + ', ' + hex(to && to.value) + ')';
        preview.style.backgroundColor = hex(bg && bg.value);
        preview.style.boxShadow = 'inset 0 0 0 2000px ' + (card && card.value === '#000000' ? 'rgba(0,0,0,0.28)' : hex(card && card.value));
        var title = document.getElementById('preview-name');
        var p = document.getElementById('preview-text');
        var a = document.getElementById('preview-link');
        if (title) { title.style.color = hex(heading && heading.value); }
        if (p) { p.style.color = hex(text && text.value); }
        if (a) { a.style.color = hex(link && link.value); }
    }

    document.querySelectorAll('input[type=color][data-sync]').forEach(function (picker) {
        var field = document.getElementById(picker.getAttribute('data-sync'));
        picker.addEventListener('input', function () {
            if (field) { field.value = picker.value; }
            syncPreview();
        });
        if (field) {
            field.addEventListener('input', function () {
                if (/^#([0-9a-f]{3}|[0-9a-f]{6})$/i.test(field.value)) {
                    picker.value = field.value;
                }
                syncPreview();
            });
        }
    });
    syncPreview();
})();
JS, ['block' => 'script']); ?>
