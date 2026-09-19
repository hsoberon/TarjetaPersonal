<?php
/**
 * @var \App\View\AppView $this
 * @var int $totalVisits
 * @var int $homeVisits
 * @var int $cardVisits
 * @var int $todayVisits
 * @var int $weekVisits
 * @var array $dailyVisits
 * @var int $maxDaily
 * @var iterable<\App\Model\Entity\Card> $cardStats
 * @var iterable<\App\Model\Entity\Visit> $recentVisits
 */
$this->assign('title', 'Dashboard');
$isAdmin = $isAdmin ?? false;
?>
<div class="stat-grid">
    <div class="stat-card">
        <span>Visitas totales</span>
        <strong><?= $this->Number->format($totalVisits) ?></strong>
    </div>
    <?php if ($isAdmin): ?>
    <div class="stat-card">
        <span>Inicio</span>
        <strong><?= $this->Number->format($homeVisits) ?></strong>
    </div>
    <?php endif; ?>
    <div class="stat-card">
        <span>Tarjetas</span>
        <strong><?= $this->Number->format($cardVisits) ?></strong>
    </div>
    <div class="stat-card">
        <span>Hoy</span>
        <strong><?= $this->Number->format($todayVisits) ?></strong>
    </div>
    <div class="stat-card">
        <span>Últimos 7 días</span>
        <strong><?= $this->Number->format($weekVisits) ?></strong>
    </div>
</div>

<div class="admin-card">
    <h3>Visitas de los últimos 14 días</h3>
    <div class="chart">
        <?php foreach ($dailyVisits as $point): ?>
            <?php $height = $maxDaily > 0 ? max(6, (int)round(($point['total'] / $maxDaily) * 140)) : 6; ?>
            <div class="chart-col" title="<?= h($point['day']) ?>: <?= $point['total'] ?>">
                <div class="chart-bar" style="height: <?= $height ?>px"></div>
                <small><?= h($point['label']) ?><br><?= $point['total'] ?></small>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="admin-card">
    <h3>Visitas por tarjeta</h3>
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Tarjeta</th>
                    <th>URL</th>
                    <th>Visitas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cardStats as $card): ?>
                <tr>
                    <td><?= h($card->name) ?></td>
                    <td>/<?= h($card->url) ?></td>
                    <td><?= $this->Number->format((int)($card->visit_count ?? 0)) ?></td>
                    <td>
                        <?= $this->Html->link('Editar', ['action' => 'editCard', $card->id], ['class' => 'btn-admin btn-ghost']) ?>
                        <?= $this->Html->link('Ver', ['controller' => 'Pages', 'action' => 'card', $card->url], ['target' => '_blank', 'class' => 'btn-admin btn-ghost']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="admin-card">
    <h3>Visitas recientes</h3>
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Página</th>
                    <th>Origen</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($recentVisits->isEmpty()): ?>
                <tr>
                    <td colspan="3">Aún no hay visitas registradas. Abre el inicio o una tarjeta pública para generar datos.</td>
                </tr>
                <?php endif; ?>
                <?php foreach ($recentVisits as $visit): ?>
                <tr>
                    <td><?= h($visit->created) ?></td>
                    <td>
                        <?php if ($visit->card): ?>
                            <?= h($visit->card->name) ?>
                        <?php elseif ($visit->page_type === 'home'): ?>
                            Inicio
                        <?php else: ?>
                            <?= h($visit->path) ?>
                        <?php endif; ?>
                    </td>
                    <td><?= h($visit->referer ?: 'Directo') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
