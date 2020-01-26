<?php
    require_once 'EntityInterface.php';
    class UserCLass implements EntityInterface{
        protected $id=0;
        protected $login = "";
        protected $password = "";
        protected $role = null;
        protected $userName = "";
        protected $userInfo = "";
        protected $photo = "";
        protected $email = "";
        protected $userPhone = "";
        protected $rank = 0;

        public function getID(){
            return $this->id;
            // TODO: Implement getID() method.
        }

        public function __construct(
            $id,
            $rank,
//            $login,
            $email,
//            $password,
            $photo,
            $role,
            $userInfo,
            $userName,
            $userPhone
        ){
            $this->id = $id;
            $this->rank = $rank;
            $this->email = $email;
            $this->photo = $photo;
            $this->role = $role;
            $this->userInfo = $userInfo;
            $this->userName = $userName;
            $this->userPhone = $userPhone;
        }

        /**
         * @return int
         */
        public function getRank(){
            return $this->rank;
        }

        /**
         * @param int $rank
         */
        public function setRank($rank){
            $this->rank = $rank;
        }
        /**
         * @param int $id
         */
        public function setId($id){
            $this->id = $id;
        }

        /**
         * @param string $login
         */
        public function setLogin($login){
            $this->login = $login;
        }

        /**
         * @param string $password
         */
        public function setPassword($password){
            $this->password = $password;
        }
        /**
         * @return null
         */
        public function getRole(){
            return $this->role;
        }

        public function getName(){
            return $this->userName;
        }

        public function getPhone(){
            return $this->userPhone;
        }

        public function getPhoto(){
            if ($this->photo == ""){
                $this->photo = "./photo/userPhoto/empty.jpg";
            }
            return $this->photo;
        }

        /**
         * @return string
         */
        public function getEmail(){
            return $this->email;
        }

        /**
         * @return string
         */
        public function getLogin(){
            return $this->login;
        }

        /**
         * @return string
         */
        public function getPassword(){
            return $this->password;
        }

        /**
         * @return string
         */
        public function getInfo(){
            return $this->userInfo;
        }

        /**
         * @param string $email
         */
        public function setEmail($email){
            $this->email = $email;
        }

        /**
         * @param string $photo
         */
        public function setPhoto($photo){
            $this->photo = $photo;
        }

        /**
         * @param string $userInfo
         */
        public function setUserInfo($userInfo){
            $this->userInfo = $userInfo;
        }

        /**
         * @param string $userName
         */
        public function setUserName($userName){
            $this->userName = $userName;
        }

        /**
         * @param string $userPhone
         */
        public function setUserPhone($userPhone){
            $this->userPhone = $userPhone;
        }
    }
?>