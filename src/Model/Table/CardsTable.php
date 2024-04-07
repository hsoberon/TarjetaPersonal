<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cards Model
 *
 * @property \App\Model\Table\ThemesTable&\Cake\ORM\Association\BelongsTo $Themes
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Card newEmptyEntity()
 * @method \App\Model\Entity\Card newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Card> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Card get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Card findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Card patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Card> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Card|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Card saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Card>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Card>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Card>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Card> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Card>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Card>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Card>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Card> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CardsTable extends Table
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

        $this->setTable('cards');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Themes', [
            'foreignKey' => 'theme_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('CardLinks', [
            'foreignKey' => 'card_id',
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
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('image')
            ->maxLength('image', 250)
            ->allowEmptyFile('image');

        $validator
            ->scalar('url')
            ->maxLength('url', 250)
            ->requirePresence('url', 'create')
            ->notEmptyString('url');

        $validator
            ->scalar('description')
            ->maxLength('description', 250)
            ->allowEmptyString('description');

        $validator
            ->scalar('position')
            ->maxLength('position', 250)
            ->allowEmptyString('position');

        $validator
            ->integer('theme_id')
            ->notEmptyString('theme_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

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
        $rules->add($rules->existsIn(['theme_id'], 'Themes'), ['errorField' => 'theme_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
