<?php
/**
 * Created by PhpStorm.
 * User: mars
 * Date: 2021/4/18
 * Time: 03:05
 */

namespace App\Controller;

use Cake\Validation\Validator;

class UserController extends AppController {

    /**
     * 登录
     */
    public function login() {

        //$this->set();
    }

    /**
     * 注册
     */
    public function reg() {


        //﻿$article = $this->Articles->newEmptyEntity();
        //$this->Authorization->authorize($article);

        if ($this->request->is('post')) {
            $validator = new Validator();

            $validator
                ->requirePresence('email')
                ->notEmptyString('email', 'Please fill this email')
                ->email('email')
                ->add('email', [
                    'length' => [
                        'rule' => ['minLength', 50],
                        'message' => 'Titles need to be at least 50 characters long',
                    ]
                ])
                ->requirePresence('password')
                ->notEmptyString('password', 'Please fill this password')
                ->requirePresence('﻿password_confirm')
                ->add('﻿password_confirm', 'length', [
                    'rule' => ['minLength', 50],
                    'message' => 'Articles must have a substantial body.'
                ]);

            $this->Flash->success(__('Your article has been saved.'));
            return $this->redirect(['action' => 'index']);

            $this->Flash->error(__('Unable to add your article.'));
        }
        //$this->set();
    }
}