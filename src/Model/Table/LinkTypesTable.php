<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LinkTypes Model
 *
 * @method \App\Model\Entity\LinkType newEmptyEntity()
 * @method \App\Model\Entity\LinkType newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\LinkType> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LinkType get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\LinkType findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\LinkType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\LinkType> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LinkType|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\LinkType saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\LinkType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LinkType>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LinkType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LinkType> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LinkType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LinkType>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\LinkType>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\LinkType> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LinkTypesTable extends Table
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

        $this->setTable('link_types');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->maxLength('description', 250)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('icon')
            ->maxLength('icon', 250)
            ->allowEmptyString('icon');

        return $validator;
    }
}
