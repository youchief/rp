<?php

App::uses('AppModel', 'Model');

/**
 * Person Model
 *
 * @property Coupon $Coupon
 */
class Person extends AppModel {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'lastname';

        /**
         * Validation rules
         *
         * @var array
         */
        public $validate = array(
            'firstname' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'lastname' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'address' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'zip' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'city' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'email' => array(
                'email' => array(
                    'rule' => array('email'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'coupon_id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'captcha' => array(
                'rule' => array('matchCaptcha'),
                'message' => 'Failed validating human check.'
            ),
        );

        //The Associations below have been created with all possible keys, those that are not needed can be removed

        /**
         * belongsTo associations
         *
         * @var array
         */
        public $belongsTo = array(
            'Coupon' => array(
                'className' => 'Coupon',
                'foreignKey' => 'coupon_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            )
        );

        function matchCaptcha($inputValue) {
                return $inputValue['captcha'] == $this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
        }

        function setCaptcha($value) {
                $this->captcha = $value; //setting captcha value
        }

        function getCaptcha() {
                return $this->captcha; //getting captcha value
        }

}
