<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notification Entity
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property bool $options
 * @property int $response
 * @property int $sender_id
 * @property int $receiver_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Sender $sender
 * @property \App\Model\Entity\Receiver $receiver
 */
class Notification extends Entity
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
        'title' => true,
        'body' => true,
        'options' => true,
        'response' => true,
        'sender_id' => true,
        'receiver_id' => true,
        'created' => true,
        'sender' => true,
        'receiver' => true
    ];
}
