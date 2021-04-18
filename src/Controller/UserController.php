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
     * 首页
     */
    public function index() {

        //$this->set();
    }
    /**
     * 登录
     */
    public function login() {

        if ($this->request->is('post')) {
            $this->render(false);

            $validator = new Validator();
            $password = $this->request->getData('password');

            $validator
                ->requirePresence('email')
                ->notEmptyString('email', 'Please fill this email')
                ->add('email', 'validFormat', [
                    'rule' => 'email',
                    'message' => 'E-mail must be valid'
                ])
                ->requirePresence('password')
                ->notEmptyString('password', 'Please fill this password');

            // Prior to 3.9 use $validator->errors()
            $errors = $validator->validate($this->request->getData());
            if (empty($errors)) {
                $res = array(
                    'code' => 0,
                    'result' => [],
                    'msg' => ''
                );
            } else {
                $res = array(
                    'code' => 1,
                    'result' => $errors,
                    'msg' => array_values($errors)[0][key(array_values($errors)[0])]
                );
            }

            echo json_encode($res);exit;

        }

    }
    /**
     * 注册
     */
    public function reg() {

        if ($this->request->is('post')) {
        	$this->render(false);
        	
            $validator = new Validator();
            $password = $this->request->getData('password');
            $password_confirm = $this->request->getData('password_confirm');
			//var_dump($password_confirm);echo "<br />";var_dump($password);
        	$validator
			    ->requirePresence('email')
                ->notEmptyString('email', 'Please fill this email')
			    ->add('email', 'validFormat', [
			        'rule' => 'email',
			        'message' => 'E-mail must be valid'
			    ])
			    ->requirePresence('password')
			    ->notEmptyString('password', 'Please fill this password')
                ->add('password', '﻿isPasswd', [
                    'rule' => function ($password) {
                        $res = preg_match('/^(?=.*[A-Z])[a-zA-Z0-9]+$/', $password);
		                if (!$res) return false;
			            return true;
                    },
                    'message' => 'The password contains at least one capital letter'
                ])
			    ->requirePresence('password_confirm')
                ->notEmptyString('password_confirm', 'Please fill this password_confirm')
			    ->add('password_confirm', 'custom', [
			        'rule' => function ($password_confirm, $password) {
				        if($password_confirm == $password ) {
				            return false;
				        } 
				        return true;
				    },
			        'message' => 'Passwords Do Not Match'
			    ]);

			// Prior to 3.9 use $validator->errors()
			$errors = $validator->validate($this->request->getData());
			//var_dump($errors);exit;
			if (empty($errors)) {
				$res = array(
					'code' => 0,
					'result' => [],
					'msg' => ''
				);
			} else {
				//print_r(array_values($errors)[0][key(array_values($errors)[0])]);
				$res = array(
					'code' => 1,
					'result' => $errors,
					//'result' => array_slice(array_values($errors), 0, 1),
					//'result' => array_values($errors)[0],
					'msg' => array_values($errors)[0][key(array_values($errors)[0])]
				);
			}
			
			echo json_encode($res);exit;

        }
        
        //$this->set();
    }

    /**
     * 注册
     */
    public function reg2() {
		
		if ($this->request->is('post')) {
        	$this->render(false);
        	
            $validator = new Validator();
		// Prior to 3.9 use $validator->errors()
			$errors = $validator->validate($this->request->getData());
			//var_dump($errors);exit;
			if (empty($errors)) {
				$res = array(
					'code' => 0,
					'result' => [],
					'msg' => ''
				);
			} else {
				//print_r(array_values($errors)[0][key(array_values($errors)[0])]);
				$res = array(
					'code' => 1,
					'result' => $errors,
					//'result' => array_slice(array_values($errors), 0, 1),
					//'result' => array_values($errors)[0],
					'msg' => array_values($errors)[0][key(array_values($errors)[0])]
				);
			}
			
			echo json_encode($res);exit;
		}
    }

    /**
     * 注册
     */
    public function reg3() {
    	
    	if ($this->request->is('post')) {
        	$this->render(false);
        	
            $validator = new Validator();
            
		// Prior to 3.9 use $validator->errors()
			$errors = $validator->validate($this->request->getData());
			//var_dump($errors);exit;
			if (empty($errors)) {
				$res = array(
					'code' => 0,
					'result' => [],
					'msg' => ''
				);
			} else {
				//print_r(array_values($errors)[0][key(array_values($errors)[0])]);
				$res = array(
					'code' => 1,
					'result' => $errors,
					//'result' => array_slice(array_values($errors), 0, 1),
					//'result' => array_values($errors)[0],
					'msg' => array_values($errors)[0][key(array_values($errors)[0])]
				);
			}
			
			echo json_encode($res);exit;
    	}
    	
    }

}