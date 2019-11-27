<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $name
 * @property int $role
 * @property int $master_id
 * @property bool $location
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Master $master
 * @property \App\Model\Entity\Position[] $positions
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'phone' => true,
        'name' => true,
        'role' => true,
        'master_id' => true,
        'location' => true,
        'news' => true,
        'created' => true,
        'master' => true,
        'positions' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
        if (strlen($value)) {
            //return md5($value);
            return (new DefaultPasswordHasher())->hash($value);
        }
    }
}
