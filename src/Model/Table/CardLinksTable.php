<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CardLinks Model
 *
 * @property \App\Model\Table\LinkTypesTable&\Cake\ORM\Association\BelongsTo $LinkTypes
 *
 * @method \App\Model\Entity\CardLink newEmptyEntity()
 * @method \App\Model\Entity\CardLink newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CardLink> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CardLink get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CardLink findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CardLink patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CardLink> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CardLink|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CardLink saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CardLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CardLink>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CardLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CardLink> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CardLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CardLink>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CardLink>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CardLink> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CardLinksTable extends Table
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

        $this->setTable('card_links');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cards', [
            'foreignKey' => 'card_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('LinkTypes', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER',
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
            ->notEmptyString('active');
            
        $validator
            ->integer('card_id')
            ->notEmptyString('card_id');

        $validator
            ->integer('type_id')
            ->notEmptyString('type_id');

        $validator
            ->integer('priority')
            ->allowEmptyString('priority');

        $validator
            ->scalar('title')
            ->maxLength('title', 250)
            ->allowEmptyString('title');

        $validator
            ->scalar('url')
            ->maxLength('url', 250)
            ->allowEmptyString('url');

        $validator
            ->scalar('content')
            ->maxLength('content', 250)
            ->allowEmptyString('content');

        $validator
            ->scalar('css')
            ->allowEmptyString('css');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['card_id'], 'Cards'), ['errorField' => 'card_id']);
        $rules->add($rules->existsIn(['type_id'], 'LinkTypes'), ['errorField' => 'type_id']);

        return $rules;
    }
}
