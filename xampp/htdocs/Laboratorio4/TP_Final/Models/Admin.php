<?php

    namespace Models;

    class Admin extends Person {
        private $description;

        public function __construct() {
        }

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->email = $description;
            return $this;
        }
    }

?>