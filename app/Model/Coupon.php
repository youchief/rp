<?php

App::uses('AppModel', 'Model');

/**
 * Coupon Model
 *
 * @property Edition $Edition
 * @property Person $Person
 */
class Coupon extends AppModel {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'name';
        public $actsAs = array(
            'Uploader.Attachment' => array(
                // Do not copy all these settings, it's merely an example
                'img_1' => array(
                    'tempDir' => TMP,
                     'nameCallback' => 'formatName',
                    'transforms' => array(
                        'imageSmall' => array(
                            'class' => 'crop',
                            'self' => true,
                            'width' => 410,
                            'height' => 290,
                        ),
                    )
                ),
                'img_2' => array(
                    'tempDir' => TMP,
                     'nameCallback' => 'formatName',
                    'transforms' => array(
                        'imageSmall' => array(
                            'class' => 'crop',
                            'self' => true,
                            'width' => 410,
                            'height' => 290,
                        ),
                    )
                ),
                'img_3' => array(
                    'tempDir' => TMP,
                     'nameCallback' => 'formatName',
                    'transforms' => array(
                        'imageSmall' => array(
                            'class' => 'crop',
                            'self' => true,
                            'width' => 410,
                            'height' => 290,
                           
                        ),
                    )
                ),
            ),
        );

        public function formatName($name) {
                return sprintf('%s-%s', $name, time());
        }

        /**
         * Validation rules
         *
         * @var array
         */
        public $validate = array(
            'name' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'description' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'nb_available' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'edition_id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
        );

        //The Associations below have been created with all possible keys, those that are not needed can be removed

        /**
         * belongsTo associations
         *
         * @var array
         */
        public $belongsTo = array(
            'Edition' => array(
                'className' => 'Edition',
                'foreignKey' => 'edition_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            )
        );

        /**
         * hasMany associations
         *
         * @var array
         */
        public $hasMany = array(
            'Person' => array(
                'className' => 'Person',
                'foreignKey' => 'coupon_id',
                'dependent' => true,
                'conditions' => '',
                'fields' => '',
                'order' => 'Person.winner DESC',
                'limit' => '',
                'offset' => '',
                'exclusive' => '',
                'finderQuery' => '',
                'counterQuery' => ''
            )
        );

}
