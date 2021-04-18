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
                ->notEmptyString('password', 'Please fill this password')
                ->add('password', 'isPasswd', [
                    'rule' => function ($password) {
		                if (preg_match('/^(?=.*[A-Z])[a-zA-Z0-9]+$/', $password)) return true;
			            return false;
                    },
                    'message' => 'The password contains at least one capital letter'
                ]);

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
                ->add('password', 'isPasswd', [
                    'rule' => function ($password) {
                        if (preg_match('/^(?=.*[A-Z])[a-zA-Z0-9]+$/', $password)) return true;
			            return false;
                    },
                    'message' => 'The password contains at least one capital letter'
                ])
			    ->requirePresence('password_confirm')
                ->notEmptyString('password_confirm', 'Please fill this password_confirm')
			    ->add('password_confirm', 'custom', [
			        'rule' => function ($password_confirm, $arr) {
			        	//var_dump($password_confirm);echo "<br />";
			        	//var_dump($password);
				        if($password_confirm == $arr['data']['password'] ) {
				            return true;
				        } 
				        return false;
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
					'result' => $this->request->getData(),
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
            $validator
			    ->requirePresence('phone')
                ->notEmptyString('phone', 'Please fill this phone')
			    ->add('phone', 'isPhone', [
                    'rule' => function ($phone) {
                        if (preg_match('/^(([0\+]\d{2,3}-)?(0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/', $phone) || preg_match('/^(((1[345789]{1}))+\d{9})$/', $phone)) return true;
			            return false;
                    },
                    'message' => 'Please fill in the phone number correctly'
                ])
			    ->requirePresence('birth')
			    ->notEmptyString('birth', 'Please fill this birth')
                ->add('birth', 'isBirth', [
                    'rule' => function ($birth) {
                        if (preg_match('/^((?:19[2-9]\d{1})|(?:20(?:(?:0[0-9])|(?:1[0-8]))))((?:0?[1-9])|(?:1[0-2]))((?:0?[1-9])|(?:[1-2][0-9])|30|31)$/', $birth)) return true;
			            return false;
                    },
                    'message' => 'Please fill in the birth correctly'
                ])
			    ->requirePresence('country')
                ->notEmptyString('country', 'Please fill this country')
			    ->add('country', 'isCharNum', [
			        'rule' => function ($country) {
			        	if (preg_match('/^[a-zA-Z0-9]+$/', $country)) return true;
			            return false;
				    },
			        'message' => 'Please fill in the country correctly'
			    ])
			    ->requirePresence('state')
                ->notEmptyString('state', 'Please fill this state')
			    ->add('state', 'isCharNum', [
			        'rule' => function ($state) {
			        	if (preg_match('/^[a-zA-Z0-9]+$/', $state)) return true;
			            return false;
				    },
			        'message' => 'Please fill in the state correctly'
			    ])
			    ->requirePresence('city')
                ->notEmptyString('city', 'Please fill this city')
			    ->add('city', 'isCharNum', [
			        'rule' => function ($city) {
			        	if (preg_match('/^[a-zA-Z0-9]+$/', $city)) return true;
			            return false;
				    },
			        'message' => 'Please fill in the city correctly'
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