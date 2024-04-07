<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Themes Model
 *
 * @property \App\Model\Table\CardsTable&\Cake\ORM\Association\HasMany $Cards
 *
 * @method \App\Model\Entity\Theme newEmptyEntity()
 * @method \App\Model\Entity\Theme newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Theme> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Theme get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Theme findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Theme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Theme> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Theme|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Theme saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Theme>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Theme>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Theme>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Theme> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Theme>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Theme>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Theme>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Theme> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ThemesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('themes');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Cards', [
            'foreignKey' => 'theme_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('title')
            ->maxLength('title', 250)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->boolean('actibe')
            ->notEmptyString('actibe');

        return $validator;
    }
}
